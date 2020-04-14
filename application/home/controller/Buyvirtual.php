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
class Buyvirtual extends BaseMember
{
    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        Lang::load(APP_PATH . 'home/lang/'.config('default_lang').'/buy.lang.php');
        //验证该会员是否禁止购买
        if(!session('is_buy')){
            $this->error(lang('cart_buy_noallow'));
        }
        if(config('member_auth') && $this->member_info['member_auth_state']!=3){
            $this->error(lang('cart_buy_noauth'));
        }
    }
    /**
     * 虚拟商品购买第一步
     */
    public function buy_step1() {
        $logic_buyvirtual = model('buyvirtual', 'logic');
        $result = $logic_buyvirtual->getBuyStep1Data(input('goods_id'), input('quantity'), session('member_id'));
        if (!$result['code']) {
            $this->error($result['msg']);
        }

        $this->assign('goods_info', $result['data']['goods_info']);
        $this->assign('store_info', $result['data']['store_info']);

        return $this->fetch($this->template_dir . 'buy_virtual_step1');
    }

    /**
     * 虚拟商品购买第二步
     */
    public function buy_step2() {
        $logic_buyvirtual = model('buyvirtual','logic');
        $result = $logic_buyvirtual->getBuyStep2Data(input('post.goods_id'), input('post.quantity'), session('member_id'));
        if (!$result['code']) {
            $this->error($result['msg']);
        }

        //处理会员信息
        $member_info = array_merge($this->member_info,$result['data']['member_info']);

       $this->assign('goods_info',$result['data']['goods_info']);
       $this->assign('store_info',$result['data']['store_info']);
       $this->assign('member_info',$member_info);
       
       //返回店铺可用的代金券
       $this->assign('store_voucher_list', $result['data']['store_voucher_list']);
        
       return $this->fetch($this->template_dir.'buy_virtual_step2');
    }

    /**
     * 虚拟商品购买第三步
     */
    public function buy_step3() {
        $logic_buyvirtual = model('buyvirtual','logic');
        $post = input('post.');
        $post['order_from'] = 1;
        $result = $logic_buyvirtual->buyStep3($post,session('member_id'));
        if (!$result['code']) {
           $this->error($result['msg']);
        }
        //转向到商城支付页面
        $this->redirect('buyvirtual/pay',['order_id'=>$result['data']['order_id']]);
    }

    /**
     * 下单时支付页面
     */
    public function pay() {
        $order_id	= intval(input('param.order_id'));
        if ($order_id <= 0){
            $this->error(lang('cart_order_pay_not_exists'),'membervrorder/index');
        }

        $vrorder_model = model('vrorder');
        //取订单信息
        $condition = array();
        $condition['order_id'] = $order_id;
        $order_info = $vrorder_model->getVrorderInfo($condition,'*');
        if (empty($order_info) || !in_array($order_info['order_state'],array(ORDER_STATE_NEW,ORDER_STATE_PAY))) {
            $this->error(lang('no_order_paid_was_found'),'memberorder/index');
        }

        //重新计算在线支付金额
        $pay_amount_online = 0;
        //订单总支付金额
        $pay_amount = 0;

        $payed_amount = floatval($order_info['rcb_amount']) + floatval($order_info['pd_amount']);

        //计算所需要支付金额
        $diff_pay_amount = ds_price_format(floatval($order_info['order_amount'])-$payed_amount);

        //显示支付方式与支付结果
        if ($payed_amount > 0) {
            $payed_tips = '';
            if (floatval($order_info['rcb_amount']) > 0) {
                $payed_tips = lang('card_has_been_paid').'：￥'.$order_info['rcb_amount'];
            }
            if (floatval($order_info['pd_amount']) > 0) {
                $payed_tips .= lang('prepaid_deposits_beenpaid').'：￥'.$order_info['pd_amount'];
            }
            $order_info['goods_price'] .= " ( {$payed_tips} )";
        }
       $this->assign('order_info',$order_info);

        //如果所需支付金额为0，转到支付成功页
        if ($diff_pay_amount == 0) {
            $this->redirect('buyvirtual/pay_ok',['order_sn'=>$order_info['order_sn'],'order_id'=>$order_info['order_id'],'order_amount'=>ds_price_format($order_info['order_amount'])]);
        }

       $this->assign('diff_pay_amount',ds_price_format($diff_pay_amount));

        //显示支付接口列表
        $payment_model = model('payment');
        $condition = array();
        $condition = array('payment_code'=>array('not in',array('predeposit','offline')));
        $condition['payment_platform'] = 'pc';
        $payment_list = $payment_model->getPaymentOpenList($condition);
        if (empty($payment_list)) {
            $this->error(lang('appropriate_payment_method'),'membervrorder/index');
        }
       $this->assign('payment_list',$payment_list);

       return $this->fetch($this->template_dir.'buy_virtual_step3');
    }

    /**
     * 支付成功页面
     */
    public function pay_ok() {
        $order_sn	= input('param.order_sn');
        if (!preg_match('/^\d{20}$/',$order_sn)){
            $this->error(lang('cart_order_pay_not_exists'),'membervrorder/index');
        }
       return $this->fetch($this->template_dir.'buy_virtual_step4');
    }
}