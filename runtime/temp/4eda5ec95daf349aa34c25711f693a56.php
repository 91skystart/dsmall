<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:103:"/usr/local/var/www/dsmall/public/../application/home/view/default/mall/showgroupbuy/groupbuy_order.html";i:1574757822;}*/ ?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="dsg-buyer">
    <thead>
        <tr>
            <th width="25%"><?php echo \think\Lang::get('text_buyer'); ?></th>
            <th width="15%"><?php echo \think\Lang::get('text_buy_count'); ?></th>
            <th width="15%"><?php echo \think\Lang::get('text_unit_price'); ?></th>
            <th><?php echo \think\Lang::get('text_buy_time'); ?></th>
        </tr>
    </thead>
    <?php if(!(empty($order_goods_list) || (($order_goods_list instanceof \think\Collection || $order_goods_list instanceof \think\Paginator ) && $order_goods_list->isEmpty()))): ?>
    <tbody>
        <?php if(is_array($order_goods_list) || $order_goods_list instanceof \think\Collection || $order_goods_list instanceof \think\Paginator): if( count($order_goods_list)==0 ) : echo "" ;else: foreach($order_goods_list as $key=>$order): ?>
        <tr>
            <td>
                <?php if($order['buyer_name']): ?><?php echo $order['buyer_name']; else: ?><?php echo $order_list[$order['order_id']]['buyer_name']; endif; ?>
            </td>
            <td><?php echo $order['goods_num']; ?></td>
            <td><?php echo \think\Lang::get('currency'); ?><?php echo $order['goods_price']; ?></td>
            <td><?php echo $order['add_time'] ? date('Y-m-d H:i:s', $order['add_time']) : date('Y-m-d H:i:s', $order_list[$order['order_id']]['add_time']); ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="10">
                <div class="pagination"> <?php echo $show_page; ?></div>
            </td>
        </tr>
    </tfoot>
    <?php else: ?>
    <tbody>
        <tr><td colspan="20"><p class="no-buyer"><?php echo \think\Lang::get('no_purchase'); ?></p></td></tr>
    </tbody>
    <?php endif; ?>
</table>
<script type="text/javascript">
$(document).ready(function(){
    $('#groupbuy_order').find('ul.pagination li a').ajaxContent({
        event:'click',
        loaderType:"img",
        loadingMsg:"<?php echo HOME_SITE_ROOT; ?>/images/treetable/transparent.gif",
        target:'#groupbuy_order'
    });
});
</script>