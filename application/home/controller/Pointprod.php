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
class Pointprod extends BasePointShop {

    public function _initialize() {
        parent::_initialize(); // TODO: Change the autogenerated stub
        Lang::load(APP_PATH . 'home/lang/'.config('default_lang').'/pointprod.lang.php');
        //判断系统是否开启积分兑换功能
        if (config('pointprod_isuse') != 1) {
            $this->error(lang('pointprod_unavailable'), url('Index/index'));
        }
        $this->assign('index_sign', 'pointshop');
    }

    public function index() {
        $this->plist();
    }

    /**
     * 积分商品列表
     */
    public function plist() {
        //查询会员及其附属信息
        $result = parent::pointshopMInfo(true);
        $member_info = $result['member_info'];
        unset($result);

        $pointprod_model = model('pointprod');

        //展示状态
        $pgoodsshowstate_arr = $pointprod_model->getPgoodsShowState();
        //开启状态
        $pgoodsopenstate_arr = $pointprod_model->getPgoodsOpenState();

        $member_model = model('member');
        //查询会员等级
        $membergrade_arr = $member_model->getMemberGradeArr();
        $this->assign('membergrade_arr', $membergrade_arr);

        //查询兑换商品列表
        $where = array();
        $where['pgoods_show'] = $pgoodsshowstate_arr['show'][0];
        $where['pgoods_state'] = $pgoodsopenstate_arr['open'][0];
        //会员级别
        $level_filter = array();
        if (input('level')) {
            $level_filter['search'] = intval(input('level'));
        }
        if (intval(input('isable')) == 1) {
            $level_filter['isable'] = intval($member_info['level']);
        }
        if (count($level_filter) > 0) {
            if (isset($level_filter['search']) && isset($level_filter['isable'])) {
                $where['pgoods_limitmgrade'] = array(array('eq', $level_filter['search']), array('elt', $level_filter['isable']), 'and');
            } elseif (isset($level_filter['search'])) {
                $where['pgoods_limitmgrade'] = $level_filter['search'];
            } elseif (isset($level_filter['isable'])) {
                $where['pgoods_limitmgrade'] = array('elt', $level_filter['isable']);
            }
        }


        //查询仅我能兑换和所需积分
        $points_filter = array();
        if (intval(input('isable')) == 1) {
            $points_filter['isable'] = $member_info['member_points'];
        }
        if (intval(input('points_min')) > 0) {
            $points_filter['min'] = intval(input('points_min'));
        }
        if (intval(input('points_max')) > 0) {
            $points_filter['max'] = intval(input('points_max'));
        }
        if (count($points_filter) > 0) {
            asort($points_filter);
            if (count($points_filter) > 1) {
                $points_filter = array_values($points_filter);
                $where['pgoods_points'] = array('between', array($points_filter[0], $points_filter[1]));
            } else {
                if (isset($points_filter['min'])) {
                    $where['pgoods_points'] = array('egt', $points_filter['min']);
                } elseif (isset($points_filter['max'])) {
                    $where['pgoods_points'] = array('elt', $points_filter['max']);
                } elseif (isset($points_filter['isable'])) {
                    $where['pgoods_points'] = array('elt', $points_filter['isable']);
                }
            }
        }
        //排序
        $orderby = '';
        switch (input('orderby')) {
            case 'stimedesc':
                $orderby = 'pgoods_starttime desc,';
                break;
            case 'stimeasc':
                $orderby = 'pgoods_starttime asc,';
                break;
            case 'pointsdesc':
                $orderby = 'pgoods_points desc,';
                break;
            case 'pointsasc':
                $orderby = 'pgoods_points asc,';
                break;
        }
        $orderby .= 'pgoods_sort asc,pgoods_id desc';

        $pointprod_list = $pointprod_model->getPointProdList($where, '*', $orderby, '', 20);
        $this->assign('pointprod_list', $pointprod_list);
        $this->assign('show_page', $pointprod_model->page_info->render());

        //分类导航
        $nav_link = array(
            0 => array('title' => lang('homepage'), 'link' => HOME_SITE_URL),
            1 => array('title' => lang('integral_center'), 'link' => url('Pointshop/index')),
            2 => array('title' => lang('gift_redemption_list'))
        );
        $this->assign('nav_link_list', $nav_link);
        echo $this->fetch($this->template_dir . 'pointprod_list');exit;
    }

    /**
     * 积分礼品详细
     */
    public function pinfo() {
        $pid = intval(input('id'));
        if (!$pid) {
            $this->error(lang('pointprod_parameter_error'), url('Pointshop/index'));
        }
        $pointprod_model = model('pointprod');
        //查询兑换礼品详细
        $prodinfo = $pointprod_model->getOnlinePointProdInfo(array('pgoods_id' => $pid));
        if (empty($prodinfo)) {
            $this->error(lang('pointprod_record_error'), url('Pointprod/plist'));
        }
        $this->assign('prodinfo', $prodinfo);

        //更新礼品浏览次数
        $tm_tm_visite_pgoods = cookie('tm_visite_pgoods');
        $tm_tm_visite_pgoods = $tm_tm_visite_pgoods ? explode(',', $tm_tm_visite_pgoods) : array();
        if (!in_array($pid, $tm_tm_visite_pgoods)) {//如果已经浏览过该商品则不重复累计浏览次数
            $result = $pointprod_model->editPointProdViewnum($pid);
            if ($result['state'] == true) {//累加成功则cookie中增加该商品ID
                $tm_tm_visite_pgoods[] = $pid;
                cookie('tm_visite_pgoods', implode(',', $tm_tm_visite_pgoods));
            }
        }

        //查询兑换信息
        $pointorder_model = model('pointorder');
        $pointorderstate_arr = $pointorder_model->getPointorderStateBySign();
        $where = array();
        $where['point_orderstate'] = array('neq', $pointorderstate_arr['canceled'][0]);
        $where['pointog_goodsid'] = $pid;
        $orderprod_list = $pointorder_model->getPointorderAndGoodsList($where, '*', 'pointsordergoods.pointog_recid desc');
        if ($orderprod_list) {
            $buyerid_arr = array();
            foreach ($orderprod_list as $k => $v) {
                $buyerid_arr[] = $v['point_buyerid'];
            }
            $memberlist_tmp = model('member')->getMemberList(array('member_id' => array('in', $buyerid_arr)), 'member_id,member_avatar');
            $memberlist = array();
            if ($memberlist_tmp) {
                foreach ($memberlist_tmp as $v) {
                    $memberlist[$v['member_id']] = $v;
                }
            }
            foreach ($orderprod_list as $k => $v) {
                $v['member_avatar'] = get_member_avatar_for_id($v['point_buyerid']);
                $orderprod_list[$k] = $v;
            }
        }
        $this->assign('orderprod_list', $orderprod_list);

        //热门积分兑换商品
        $recommend_pointsprod = $pointprod_model->getRecommendPointProd(5);
        $this->assign('recommend_pointsprod', $recommend_pointsprod);

        $seo_param = array();
        $seo_param['name'] = $prodinfo['pgoods_name'];
        $seo_param['key'] = $prodinfo['pgoods_keywords'];
        $seo_param['description'] = $prodinfo['pgoods_description'];
        $this->_assign_seo(model('seo')->type('point_content')->param($seo_param)->show());
        //分类导航
        $nav_link = array(
            0 => array('title' => lang('homepage'), 'link' => HOME_SITE_URL),
            1 => array('title' => lang('integral_center'), 'link' => url('Pointshop/index')),
            2 => array('title' => lang('gift_redemption_details'))
        );
        $this->assign('nav_link_list', $nav_link);
        return $this->fetch($this->template_dir . 'pointprod_info');
    }

}
