<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/usr/local/var/www/dsmall/public/../application/home/view/default/member/member/order_info.html";i:1574757822;}*/ ?>
<div class="pt20">
        <div class="mc-title">
            <h3><?php echo \think\Lang::get('shopping_cart'); ?></h3>
        </div>
        <div class="goods-rolling relative" id="mc-rolling-history">
            <?php if(!(empty($cart_list) || (($cart_list instanceof \think\Collection || $cart_list instanceof \think\Paginator ) && $cart_list->isEmpty()))): ?>
            <ul class="grid-list clearfix">
                <?php if(is_array($cart_list) || $cart_list instanceof \think\Collection || $cart_list instanceof \think\Paginator): if( count($cart_list)==0 ) : echo "" ;else: foreach($cart_list as $key=>$cart_info): ?>
                <li class="grid-items">
                    <a class="thumb" target="_blank" href="<?php echo url('Goods/index',['goods_id'=>$cart_info['goods_id']]); ?>" title="<?php echo $cart_info['goods_name']; ?>">
                        <p class="grid-img">
                            <img src="<?php echo goods_thumb($cart_info,240); ?>" alt="<?php echo $cart_info['goods_name']; ?>"></p>
                        <h3 class="grid-title"><span><?php echo $cart_info['goods_name']; ?></span></h3>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="grid-btn btn-prev"><span class="iconfont">&#xe686;</span></div>
            <div class="grid-btn btn-next"><span class="iconfont">&#xe687;</span></div>
            <?php else: ?>
            <dl class="null-tip pt20 pb20">
                <dt class="iconfont">&#xe69a;</dt>
              <dd>
                <h4><?php echo \think\Lang::get('shopping_cart_still_empty'); ?></h4>
                <h5><?php echo \think\Lang::get('with_settlement'); ?></h5>
              </dd>
            </dl>
            <?php endif; ?>
        </div>
    </div>
<?php if(!(empty($cart_list) || (($cart_list instanceof \think\Collection || $cart_list instanceof \think\Paginator ) && $cart_list->isEmpty()))): ?>
<script>
//信息轮换
    $.getScript("<?php echo PLUGINS_SITE_ROOT; ?>/jquery.SuperSlide.2.1.1.js", function() {
        jQuery('#mc-rolling-history').slide({mainCell:"ul",effect:"left",prevCell:".btn-prev",nextCell:".btn-next",autoPlay:true,vis:4});
    });
</script>
<?php endif; ?>
