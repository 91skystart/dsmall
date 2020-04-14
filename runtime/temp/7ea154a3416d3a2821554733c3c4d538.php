<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:105:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellergroupbuy/search_goods.html";i:1574757822;}*/ ?>
<?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): ?>
<ul class="goods-list" style="width:760px;">
    <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$val): ?>
    <li>
        <div class="goods-thumb"><img src="<?php echo goods_thumb($val,240); ?>"/></div>
        <dl class="goods-info">
            <dt><?php echo $val['goods_name']; ?></dt>
            <dd><?php echo \think\Lang::get('sale_price'); ?>：<?php echo \think\Lang::get('currency'); ?><?php echo $val['goods_price']; ?></dd>
        </dl>
        <a dstype="btn_add_groupbuy_goods" data-goods-commonid="<?php echo $val['goods_commonid']; ?>" href="javascript:void(0);" class="dssc-btn-mini dssc-btn-green"><i class="iconfont ">&#xe64d;</i><?php echo \think\Lang::get('choose_snap_merchandise'); ?></a>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<div class="pagination"><?php echo $show_page; ?></div>
<?php else: ?>
<div><?php echo \think\Lang::get('no_record'); ?></div>
<?php endif; ?>