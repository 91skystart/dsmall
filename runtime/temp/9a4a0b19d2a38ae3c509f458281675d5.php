<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:92:"/usr/local/var/www/dsmall/public/../application/home/view/default/mall/search/goods_hot.html";i:1574757822;}*/ ?>
<div class="dsh-module dsh-module-style01">
    <div class="title">
        <h3><?php echo \think\Lang::get('hot_recommendations'); ?></h3>
    </div>
    <div class="content">
        <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): ?>
        <ul class="v_module_recommend">
            <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$value): ?>
            <li>
                <div class="goods-pic"><a href="<?php echo url('Goods/index',['goods_id'=>$value['goods_id']]); ?>" target="_blank"><img alt="<?php echo $value['goods_name']; ?>"  src="<?php echo goods_thumb($value); ?>"></a> </div>
                <dl class="goods-info">
                    <dt>
                    <a href="<?php echo url('Goods/index',['goods_id'=>$value['goods_id']]); ?>" title="<?php echo $value['goods_name']; ?>" target="_blank">
                        <?php if(config('groupbuy_allow') && $value['goods_promotion_type'] == 1): ?>
                        <span><?php echo \think\Lang::get('snap_up_goods'); ?></span>
                        <?php elseif(config('promotion_allow') && $value['goods_promotion_type'] == 2): ?>
                        <span><?php echo \think\Lang::get('limited_time_discount'); ?></span>
                        <?php endif; ?>

                        <?php echo $value['goods_name']; ?>
                    </a>
                    </dt>
                    <dd class="goods-price"><?php echo \think\Lang::get('goods_class_index_store_goods_price'); ?>：<em><?php echo \think\Lang::get('currency'); ?><?php echo $value['goods_promotion_price']; ?></em></dd>
                    <dd class="buy-btn"><a href="<?php echo url('Goods/index',['goods_id'=>$value['goods_id']]); ?>" target="_blank"><?php echo \think\Lang::get('snap_up_immediately'); ?></a></dd>
                </dl>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
