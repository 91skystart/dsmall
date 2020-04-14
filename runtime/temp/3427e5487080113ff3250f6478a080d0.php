<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/usr/local/var/www/dsmall/public/../application/home/view/default/member/cart/cart_mini.html";i:1574757822;}*/ ?>
<ul class="cart-list">
    <?php if(!(empty($cart_list['list']) || (($cart_list['list'] instanceof \think\Collection || $cart_list['list'] instanceof \think\Paginator ) && $cart_list['list']->isEmpty()))): if(is_array($cart_list['list']) || $cart_list['list'] instanceof \think\Collection || $cart_list['list'] instanceof \think\Paginator): $_5e952bf88e44b = is_array($cart_list['list']) ? array_slice($cart_list['list'],0,9, true) : $cart_list['list']->slice(0,9, true); if( count($_5e952bf88e44b)==0 ) : echo "" ;else: foreach($_5e952bf88e44b as $key=>$v): ?>
    <li ds_type="cart_item_<?php echo $v['cart_id']; ?>">
        <div class="goods-pic"><a href="<?php echo $v['goods_url']; ?>" title="<?php echo $v['goods_name']; ?>" target="_blank";>
            <img src="<?php echo $v['goods_image']; ?>" alt="<?php echo $v['goods_name']; ?>"/></a></div>
        <dl>
            <dt class="goods-name"><a href="<?php echo $v['goods_url']; ?>" title="<?php echo $v['goods_name']; ?>" target="_blank";><?php echo $v['goods_name']; ?></a></dt>
            <dd><em class="goods-price"><?php echo \think\Lang::get('currency'); ?><?php echo $v['goods_price']; ?></em>×<?php echo $v['goods_num']; ?></dd>
        </dl>
        <a href="javascript:drop_topcart_item(<?php echo $v['cart_id']; ?>);" class="del" title="<?php echo \think\Lang::get('ds_delete'); ?>">X</a>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <script>
        $(function(){
            $('.head-user-menu .my-cart').append('<div class="addcart-goods-num"><?php echo $cart_list['cart_goods_num']; ?></div>');
            $('#rtoobar_cart_count').html(<?php echo $cart_list['cart_goods_num']; ?>).show();
        });
    </script>
    <?php else: ?>
    <li>
        <dl><dd style="text-align: center; font-size: 12px"><?php echo \think\Lang::get('ds_common_goods_null'); ?></dd></dl>
    </li>
    <script>
        $(function(){
            $('.addcart-goods-num').remove();
            $('#rtoobar_cart_count').html('').hide();
        });
    </script>
   <?php endif; ?>
</ul>
<div class="btn-box">
    <?php if(isset($cart_list['list'])): ?>
    
    <div dstype="rtoolbar_total_price" class="total-price">
        <p><?php echo \think\Lang::get('ds_goods_num_one'); ?><em class="goods-price" style="margin-left: 5px"><?php echo $cart_list['cart_goods_num']; ?></em><?php echo \think\Lang::get('goods'); ?></p>
        <p><?php echo \think\Lang::get('total'); ?>：<em class="goods-price">&yen;<?php echo $cart_list['cart_all_price']; ?></em></p>
    </div>
    <a href="javascript:void(0);" onclick="javascript:window.location.href='<?php echo url('Cart/index'); ?>'"><?php echo \think\Lang::get('shopping_cart_settlement'); ?></a>
    <?php endif; ?>
</div>