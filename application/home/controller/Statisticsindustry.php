<?php
/**
 * 行业F分析
 */

namespace app\home\controller;

use think\Lang;

/**
 * ============================================================================
 * DSMall多用户商城
 * ============================================================================
 * 版权所有 2014-2028 长沙德尚网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.csdeshang.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 控制器
 */
class Statisticsindustry extends BaseSeller
{
    private $search_arr;//处理后的参数
    private $gc_arr;//分类数组
    private $choose_gcid;//选择的分类ID
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        Lang::load(APP_PATH.'home/lang/'.config('default_lang').'/statisticsindustry.lang.php');
        import('mall.statistics');
        import('mall.datehelper');

        $stat_model = model('stat');
        //存储参数
        $this->search_arr = $_REQUEST;
        //处理搜索时间
        $this->search_arr = $stat_model->dealwithSearchTime($this->search_arr);
        //获得系统年份
        $year_arr = getSystemYearArr();
        //获得系统月份
        $month_arr = getSystemMonthArr();
        //获得本月的周时间段
        $week_arr = getMonthWeekArr($this->search_arr['week']['current_year'], $this->search_arr['week']['current_month']);
        $this->assign('year_arr', $year_arr);
        $this->assign('month_arr', $month_arr);
        $this->assign('week_arr', $week_arr);
        $this->assign('search_arr', $this->search_arr);
        /**
         * 处理商品分类
         */
        $this->choose_gcid = ($t = intval(input('param.choose_gcid')))>0?$t:0;
        $gccache_arr = model('goodsclass')->getGoodsclassCache($this->choose_gcid,3);
        $this->gc_arr = $gccache_arr['showclass'];
        $this->assign('gc_json',json_encode($gccache_arr['showclass']));
        $this->assign('gc_choose_json',json_encode($gccache_arr['choose_gcid']));
    }

    /**
     * 行业排行
     */
    public function index(){
        $datanum = 30;
        if(!isset($this->search_arr['search_type'])){
            $this->search_arr['search_type'] = 'day';
        }
        $stat_model = model('stat');
        //获得搜索的开始时间和结束时间
        $searchtime_arr = $stat_model->getStarttimeAndEndtime($this->search_arr);
        $where = array();
        $where['order_isvalid'] = 1;//计入统计的有效订单
        $where['order_add_time'] = array('between',$searchtime_arr);
        $where['store_id'] = array('neq',session('store_id'));
        $gc_id_depth = @$this->gc_arr[$this->choose_gcid]['depth'];
        if ($this->choose_gcid > 0){
            $where['gc_parentid_'.$gc_id_depth] = $this->choose_gcid;
        }
        /**
         * 商品排行
         */
        $goods_stat_arr = array();
        //构造横轴数据
        for($i=1; $i<=$datanum; $i++){
            //数据
            $goods_stat_arr['series'][0]['data'][] = array('name'=>'','y'=>0);
            //横轴
            $goods_stat_arr['xAxis']['categories'][] = "$i";
        }
        $field = 'goods_id,goods_name,SUM(goods_num) as goodsnum';
        $goods_list = $stat_model->statByStatordergoods($where, $field, 0, $datanum, 'goodsnum desc,goods_id asc', 'goods_id');
        foreach ((array)$goods_list as $k=>$v){
            $goods_stat_arr['series'][0]['data'][$k] = array('name'=>strval($v['goods_name']),'y'=>floatval($v['goodsnum']));
        }
        //得到统计图数据
        $goods_stat_arr['series'][0]['name'] = lang('order_quantity');
        $goods_stat_arr['title'] = sprintf(lang('industry_products'),$datanum); 
        $goods_stat_arr['legend']['enabled'] = false;
        $goods_stat_arr['yAxis'] = lang('order_quantity');
        $goods_statjson = getStatData_Column2D($goods_stat_arr);

        $this->assign('goods_statjson',$goods_statjson);
        $this->assign('goods_list',$goods_list);
        $this->setSellerCurMenu('Statisticsindustry');
        $this->setSellerCurItem('hot');
       return $this->fetch($this->template_dir.'index');
    }
    /**
     * 价格分布
     */
    public function price(){
        if(!isset($this->search_arr['search_type'])){
            $this->search_arr['search_type'] = 'day';
        }
        $stat_model = model('stat');
        //获得搜索的开始时间和结束时间
        $searchtime_arr = $stat_model->getStarttimeAndEndtime($this->search_arr);
        $where = array();
        $where['order_isvalid'] = 1;//计入统计的有效订单
        $where['order_add_time'] = array('between',$searchtime_arr);
        $gc_id_depth = @$this->gc_arr[$this->choose_gcid]['depth'];
        if ($this->choose_gcid > 0){
            $where['gc_parentid_'.$gc_id_depth] = $this->choose_gcid;
        }
        $field = '*';
        $pricerange = ds_getvalue_byname('storeextend', 'store_id', session('store_id'), 'pricerange');
        $pricerange_arr = $pricerange?unserialize($pricerange):array();
        if ($pricerange_arr){
            $stat_arr['series'][0]['name'] = lang('order_quantity');
            //设置价格区间最后一项，最后一项只有开始值没有结束值
            $pricerange_count = count($pricerange_arr);
            if ($pricerange_arr[$pricerange_count-1]['e']){
                $pricerange_arr[$pricerange_count]['s'] = $pricerange_arr[$pricerange_count-1]['e'] + 1;
                $pricerange_arr[$pricerange_count]['e'] = '';
            }
            foreach ((array)$pricerange_arr as $k=>$v){
                $v['s'] = intval($v['s']);
                $v['e'] = intval($v['e']);
                //构造查询字段
                if ($v['e']){
                    $field .= " ,SUM(IF(goods_pay_price/goods_num > {$v['s']} and goods_pay_price/goods_num <= {$v['e']},goods_num,0)) as goodsnum_{$k}";
                } else {
                    $field .= " ,SUM(IF(goods_pay_price/goods_num > {$v['s']},goods_num,0)) as goodsnum_{$k}";
                }
            }
            $ordergooods_list = $stat_model->query('SELECT '.$field.' FROM '.config('database.prefix').'statordergoods WHERE order_isvalid='.$where['order_isvalid'].' AND order_add_time BETWEEN '.$searchtime_arr[0].' AND '.$searchtime_arr[1].($this->choose_gcid > 0?(' AND gc_parentid_'.$gc_id_depth.'='.$this->choose_gcid):''));
            if($ordergooods_list){
                $ordergooods_list= current($ordergooods_list);
                foreach ((array)$pricerange_arr as $k=>$v){
                    //横轴
                    if ($v['e']){
                        $stat_arr['xAxis']['categories'][] = $v['s'].'-'.$v['e'];
                    } else {
                        $stat_arr['xAxis']['categories'][] = $v['s'].lang('above');
                    }
                    //统计图数据
                    if (isset($ordergooods_list['goodsnum_'.$k])){
                        $stat_arr['series'][0]['data'][$k] = ($t = intval($ordergooods_list['goodsnum_'.$k]))?$t:0;
                    } else {
                        $stat_arr['series'][0]['data'][$k] = 0;
                    }
                }
            }
            //得到统计图数据
            $stat_arr['legend']['enabled'] = false;
            $stat_arr['title'] = lang('number_goods_ordered_trade_price');
            $stat_arr['yAxis'] = '';
            $stat_json = getStatData_LineLabels($stat_arr);
        } else {
            $stat_json = '';
        }
        $this->assign('stat_json',$stat_json);
        $this->setSellerCurMenu('Statisticsindustry');
        $this->setSellerCurItem('price');
       return $this->fetch($this->template_dir.'price');
    }

    /**
     * 用户中心右边，小导航
     *
     * @param string	$menu_type	导航类型
     * @param string 	$name	当前导航的name
     * @return
     */
    protected function getSellerItemList()
    {
        $menu_array	= array(
           array('name'=>'hot','text'=>lang('peer_selling'),'url'=>url('Statisticsindustry/index')),
            array('name'=>'price','text'=>lang('industry_price_distribution'),'url'=>url('Statisticsindustry/price')),
        );
        return $menu_array;
    }
}