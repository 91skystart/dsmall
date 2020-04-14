<?php

namespace app\admin\controller;
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
class Promotionbundling extends AdminControl
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        Lang::load(APP_PATH . 'admin/lang/'.config('default_lang').'/promotionbundling.lang.php');
    }


    /**
     * 套餐管理
     */
    public function bundling_quota()
    {
        //自动开启优惠套装
        if (intval(input('param.promotion_allow')) === 1) {
            $config_model = model('config');
            $update_array = array();
            $update_array['promotion_allow'] = 1;
            $config_model->editConfig($update_array);
        }

        $pbundling_model = model('pbundling');

        // 查询添加
        $where = array();
        if (input('param.store_name') != '') {
            $where['store_name'] = array('like', '%' . trim(input('param.store_name')) . '%');
        }
        if (is_numeric(input('param.state'))) {
            $where['blquota_state'] = intval(input('param.state'));
        }

        $bundlingquota_list = $pbundling_model->getBundlingQuotaList($where,10);
        $this->assign('show_page', $pbundling_model->page_info->render());

        // 状态数组
        $state_array = array(0 => lang('bundling_state_0'), 1 => lang('bundling_state_1'));
        $this->assign('state_array', $state_array);
        $this->setAdminCurItem('bundling_quota');
        $this->assign('bundlingquota_list', $bundlingquota_list);
        return $this->fetch();
    }


    /**
     * 活动管理
     */
    public function index()
    {
        $pbundling_model = model('pbundling');

        // 查询添加
        $where = '';
        if (input('param.bundling_name') != '') {
            $where['bl_name'] = array('like', '%' . trim(input('param.bundling_name')) . '%');
        }
        if (input('param.store_name') != '') {
            $where['store_name'] = array('like', '%' . trim(input('param.store_name')) . '%');
        }
        if (is_numeric(input('param.state'))) {
            $where['bl_state'] = input('param.state');
        }
        $pbundling_list = $pbundling_model->getBundlingList($where,'*','bl_id desc',10);
        $pbundling_list = array_under_reset($pbundling_list, 'bl_id');
        $this->assign('show_page', $pbundling_model->page_info->render());
        if (!empty($pbundling_list)) {
            $blid_array = array_keys($pbundling_list);
            $bgoods_array = $pbundling_model->getBundlingGoodsList(array( 'bl_id' => array('in', $blid_array)), 'bl_id,goods_id,count(*) as count', 'blgoods_appoint desc', 'bl_id');
            $bgoods_array = array_under_reset($bgoods_array, 'bl_id');
            foreach ($pbundling_list as $key => $val) {
                $pbundling_list[$key]['goods_id'] = isset($bgoods_array[$val['bl_id']]['goods_id'])?$bgoods_array[$val['bl_id']]['goods_id']:'';
                $pbundling_list[$key]['count'] = isset($bgoods_array[$val['bl_id']]['count'])?$bgoods_array[$val['bl_id']]['count']:'';
            }
        }
        $this->assign('pbundling_list', $pbundling_list);

        // 状态数组
        $state_array = array(0 => lang('bundling_state_0'), 1 => lang('bundling_state_1'));
        $this->assign('state_array', $state_array);


        // 输出自营店铺IDS
        // $this->assign('flippedOwnShopIds', array_flip(model('store')->getOwnShopIds()));
        $this->assign('flippedOwnShopIds', '');
        $this->setAdminCurItem('index');
        return $this->fetch();
    }

    /**
     * 设置
     */
    public function bundling_setting()
    {
        // 实例化模型
        $config_model = model('config');

        if (request()->isPost()) {
            // 验证
            $data = [
                'promotion_bundling_price' => input('post.promotion_bundling_price'),
                'promotion_bundling_sum' => input('post.promotion_bundling_sum'),
                'promotion_bundling_goods_sum' => input('post.promotion_bundling_goods_sum')
            ];
            $promotionbundling_validate = validate('promotionbundling');
            if (!$promotionbundling_validate->scene('bundling_setting')->check($data)){
                $this->error($promotionbundling_validate->getError());
            }

            $data['promotion_bundling_price'] = intval(input('post.promotion_bundling_price'));
            $data['promotion_bundling_sum'] = intval(input('post.promotion_bundling_sum'));
            $data['promotion_bundling_goods_sum'] = intval(input('post.promotion_bundling_goods_sum'));

            $return = $config_model->editConfig($data);
            if ($return) {
                $this->log(lang('ds_set') . lang('ds_promotion_bundling'));
                dsLayerOpenSuccess(lang('ds_common_op_succ'));
            }
            else {
                $this->error(lang('ds_common_op_fail'));
            }
        } else {
            $this->setAdminCurItem('bundling_setting');
            // 查询setting列表
            $setting = rkcache('config', true);
            $this->assign('setting', $setting);
            return $this->fetch();
        }
    }

    /**
     * 删除套餐活动
     */
    public function del_bundling()
    {
        $bl_id = intval(input('param.bl_id'));
        if ($bl_id <= 0) {
            $this->error(lang('param_error'));
        }
        $rs = model('pbundling')->delBundlingForAdmin(array('bl_id' => $bl_id));
        if ($rs) {
            ds_json_encode(10000, lang('ds_common_op_succ'));
        }
        else {
            ds_json_encode(10001, lang('ds_common_op_fail'));
        }
    }

    protected function getAdminItemList()
    {
        $menu_array = array(
            array(
                'name' => 'index',
                'text' => lang('bundling_list'), 
                'url' => url('Promotionbundling/index')
            ), array(
                'name' => 'bundling_quota',
                'text' => lang('bundling_quota'),
                'url' => url('Promotionbundling/bundling_quota')
            ), array(
                'name' => 'bundling_setting',
                'text' => lang('bundling_setting'),
                'url' => "javascript:dsLayerOpen('".url('Promotionbundling/bundling_setting')."','".lang('bundling_setting')."')"
            ),
        );
        return $menu_array;
    }
}