<?php

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
class Fleaclass extends BaseFlea {

    public function _initialize() {
        parent::_initialize(); // TODO: Change the autogenerated stub
        Lang::load(APP_PATH . 'home/lang/'.config('default_lang').'/flea.lang.php');
        Lang::load(APP_PATH . 'home/lang/'.config('default_lang').'/fleacommon.php');
    }

    /**
     * 闲置物品搜索列表
     */
    public function index() {
        //加载模型
        $flea_model = model('flea');
        $member_model = model('member');
        $fleaclass_model = model('fleaclass');
        $fleaarea_model = model('fleaarea');
        /**
         * 地区切换
         */
        $area_array = $fleaarea_model->fleaarea_show();
        $this->assign('area_one_level', $area_array['area_one_level']);
        $this->assign('area_two_level', $area_array['area_two_level']);
        /**
         * 查询模块
         */
        $condition = array();
        $condition_out = array();
        $area_id = intval(input('area_input'));
        /* 	如果有地区id传入	 */
        if ($area_id > 0) {
            /* 	查询父级id为传入id的所有结果	 */
            $area_result = $fleaarea_model->getFleaareaList(array('fleaarea_parent_id' => $area_id));

            /* 	增加当前选择地区的检索热度	 */
            $param['fleaarea_hot']['value'] = 1;
            $param['fleaarea_hot']['sign'] = 'increase';
            $fleaarea_model->editFleaarea(array('fleaarea_id'=>$area_id),$param);

            /* 	组合查询地区id	 */
            $condition['areaid'] = "'" . $area_id . "'";

            /* 	页面输出可选择地区列表	 */
            /* 传入的地区 */
            $area_current = $fleaarea_model->getOneFleaarea(array('fleaarea_id'=>$area_id));
            if ($area_result) {
                /* 	不是最后一级地区	 */
                foreach ($area_result as $val) {
                    $condition['areaid'] .= ',\'' . $val['fleaarea_id'] . '\'';
                }

                $this->assign('out_area', $area_result);
                $this->assign('area_main', $area_current);
            } else {
                $out_area = $fleaarea_model->getFleaareaList(array('fleaarea_parent_id' => $area_current['fleaarea_parent_id']));
                $area_main = $fleaarea_model->getOneFleaarea(array('fleaarea_id'=>$area_current['fleaarea_parent_id']));
                $this->assign('out_area', $out_area);
                $this->assign('area_main', $area_main);
            }
            $condition_out['area_input'] = $area_id;
        } else {
            $list_area = array();
            $list_area['fleaarea_deep'] = 2;
            $list_area['fleaarea_hot'] = array('gt',0);
            $result = $fleaarea_model->getFleaareaList($list_area,'fleaarea_name,fleaarea_id','fleaarea_hot desc','0,8');
            $this->assign('out_area', $result);
        }

        $cate_input = intval(input('cate_input'));
        if ($cate_input > 0) {
            $fc_result = $fleaclass_model->getNextLevelGoodsclassById($cate_input);
            $this->assign('out_class', $fc_result);
            /* 	组合查询分类id	 */
            $condition_out['cate_input'] = $cate_input;

            /* 	组合查询分类id	 */
            $fleaclass_result = $fleaclass_model->getChildClass($cate_input);
            $part = '';
            foreach ($fleaclass_result as $v) {
                $part .= '\'' . $v['fleaclass_id'] . '\',';
            }
            $condition['fleaclass_id_in'] = rtrim($part, ',');
        } else {

            $class_list = array();
            $class_list['fleaclass_parent_id'] = '0';
            $fc_result = $fleaclass_model->getFleaclassList($class_list,'fleaclass_name,fleaclass_id');
            $this->assign('out_class', $fc_result);
        }
        $condition_out['start_input'] = $condition['start_input'] = intval(input('start_input'));
        $condition_out['end_input'] = $condition['end_input'] = intval(input('end_input'));
        $condition_out['price_input'] = $condition['price_input'] = intval(input('price_input'));
        if ($condition_out['price_input'] > 0) {
            switch ($condition_out['price_input']) {
                case "35":
                    $condition['start_input'] = '20';
                    $condition['end_input'] = '50';
                    break;
                case "75":
                    $condition['start_input'] = '50';
                    $condition['end_input'] = '100';
                    break;
                case "150":
                    $condition['start_input'] = '100';
                    $condition['end_input'] = '200';
                    break;
                case "350":
                    $condition['start_input'] = '200';
                    $condition['end_input'] = '500';
                    break;
                case "750":
                    $condition['start_input'] = '500';
                    $condition['end_input'] = '1000';
                    break;
                case "1000":
                    $condition['start_input'] = '1000';
                    $condition['end_input'] = '';
                    break;
            }
        }

        $condition_out['quality_input'] = $condition['quality_input'] = intval(input('quality_input'));
        $condition_out['key_input'] = $condition['key_input'] = input('key_input');
        $condition_out['seller_input'] = $condition['seller_input'] = intval(input('seller_input'));
        $condition_out['rank_input'] = $condition['rank_input'] = intval(input('rank_input'));
        if ($condition['rank_input'] == 1) {
            $condition['order'] = 'goods_store_price desc';
        }
        if ($condition['rank_input'] == 2) {
            $condition['order'] = 'goods_store_price asc';
        }
        $condition_out['pic_input'] = $condition['pic_input'] = input('pic_input');
        if (!$condition['pic_input']) {
            $condition['pic_input'] = 2;
        }


        /* 	输出保留的前台查询条件	 */
        $this->assign('condition_out', $condition_out);
        /**
         * 闲置物品显示模块
         */
        $listgoods = $flea_model->getFleaList($condition, 10);
        if ($listgoods) {
            foreach ($listgoods as $replace_key => $replace_val) {
                $listgoods[$replace_key]['member_info'] = $flea_model->getFleaStatistic($replace_val['member_id']);
                if ($listgoods[$replace_key]['member_info']['member_avatar']) {
                    $listgoods[$replace_key]['member_info']['avatar'] = ATTACH_AVATAR . '/' . $listgoods[$replace_key]['member_info']['member_avatar'];
                } else {
                    $listgoods[$replace_key]['member_info']['avatar'] = HOME_SITE_ROOT . '/shop/common/default_user_portrait.gif';
                }
                if ($replace_val['goods_image']) {
                    $listgoods[$replace_key]['image_url'] = UPLOAD_SITE_URL . DS . ATTACH_MFLEA . '/' . session('member_id') . '/' . $replace_val['goods_image'];
                } else {
                    $listgoods[$replace_key]['image_url'] = HOME_SITE_ROOT . '/images/member/default_image.png';
                }
                $exge = '/<[^>]*>|\s+/';
                $listgoods[$replace_key]['explain'] = preg_replace($exge, '', $replace_val['goods_body']);
                $listgoods[$replace_key]['time'] = $this->time_comb(intval($replace_val['goods_addtime']));
                switch ($replace_val['flea_quality']) {
                    case 10:
                        $quality = lang('flea_index_new');
                        break;
                    case 9:
                        $quality = lang('flea_index_almost_new');
                        break;
                    case 8:
                        $quality = lang('flea_index_gently_used');
                        break;
                    default;
                        $quality = lang('flea_index_old');
                        break;
                }
                $listgoods[$replace_key]['quality'] = $quality;
            }
        }
        $this->assign('listgoods', $listgoods);
        $this->assign('show_page', $flea_model->page_info->render());
        /**
         * 刚刚发布模块
         */
        $pre_sale = $flea_model->getSaleFleaList(array());
        $this->assign('pre_sale', $pre_sale);
        /**
         * 关注模块
         */
        $attention = $flea_model->getFleaList(array('limit' => '0,8', 'order' => 'flea_collect_num desc'));
        $this->assign('attention', $attention);
        /**
         * 导航模块
         */
        $navigation = array(
            url('Fleaclass/index') => lang('flea_index_all')
        );
        /* 	卖家优先 */
        if ($condition['seller_input']) {
            $seller_info = $member_model->infoMember(array('member_id' => $condition['seller_input']));
            $key = HOME_SITE_URL.'/Fleaclass/index.html?seller_input=' . $condition['seller_input'];
            $navigation[$key] = $seller_info['member_name'];
        } elseif ($cate_input) {
            $class_info = $fleaclass_model->getFleaclassNow($cate_input);
            foreach ($class_info as $val) {
                $key = HOME_SITE_URL.'/Fleaclass/index.html?cate_input=' . $val['fleaclass_id'];
                $navigation[$key] = $val['name'];
            }
        }
        /* 	分类次之 */
        $this->assign('navigation', $navigation);

        /* 	页面显示所有商品总数	 */
        $all_num = $flea_model->getFleaList($condition);
        $this->assign('all_num', $all_num);
        /**
         * 页面输出
         */
        return $this->fetch($this->template_dir . 'flea_class');
    }

    /**
     * 查看成色的划分
     */
    public function quality_inner() {
        return $this->fetch($this->template_dir . 'quality_inner');
    }

    private function time_comb($goods_addtime) {
        $now_time = TIMESTAMP;
        $last_time = $now_time - $goods_addtime;
        if ($last_time > 2592000)
            return intval($last_time / 2592000) . lang('flea_index_mouth');
        if ($last_time > 86400)
            return intval($last_time / 86400) . lang('flea_index_day');
        if ($last_time > 3600)
            return intval($last_time / 3600) . lang('flea_index_hour');
        if ($last_time > 60)
            return intval($last_time / 60) . lang('flea_index_minute');
        return $last_time . lang('flea_index_seconds');
    }

}
