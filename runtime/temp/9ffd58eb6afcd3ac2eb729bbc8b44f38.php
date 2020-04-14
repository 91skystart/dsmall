<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:90:"/usr/local/var/www/dsmall/public/../application/admin/view/returnmanage/return_manage.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DSMall<?php echo \think\Lang::get('system_backend'); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo ADMIN_SITE_ROOT; ?>/css/admin.css">
        <link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.css">
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery-2.1.4.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.validate.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.cookie.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/common.js"></script>
        <script src="<?php echo ADMIN_SITE_ROOT; ?>/js/admin.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/perfect-scrollbar.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/layer/layer.js"></script>
        <script type="text/javascript">
            var BASESITEROOT = "<?php echo BASE_SITE_ROOT; ?>";
            var ADMINSITEROOT = "<?php echo ADMIN_SITE_ROOT; ?>";
            var BASESITEURL = "<?php echo BASE_SITE_URL; ?>";
            var HOMESITEURL = "<?php echo HOME_SITE_URL; ?>";
            var ADMINSITEURL = "<?php echo ADMIN_SITE_URL; ?>";
        </script>
    </head>
    <body>
        <div id="append_parent"></div>
        <div id="ajaxwaitid"></div>










<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3><?php echo \think\Lang::get('ds_return'); ?></h3>
            </div>
            <?php if($admin_item): ?>
<ul class="tab-base ds-row">
    <?php if(is_array($admin_item) || $admin_item instanceof \think\Collection || $admin_item instanceof \think\Paginator): if( count($admin_item)==0 ) : echo "" ;else: foreach($admin_item as $key=>$item): ?>
    <li><a href="<?php echo $item['url']; ?>" <?php if($item['name'] == $curitem): ?>class="current"<?php endif; ?>><span><?php echo $item['text']; ?></span></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php endif; ?>
        </div>
    </div>
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('returnmanage_help1'); ?></li>
        </ul>
    </div>
    <form method="get">
        <div class="ds-search-form">
            <dl>
                <dt>
                    <select name="type">
                        <option value="order_sn" <?php if(\think\Request::instance()->param('type') == 'order_sn'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('ds_order_sn'); ?></option>
                        <option value="refund_sn" <?php if(\think\Request::instance()->param('type') == 'refund_sn'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('ds_refund_sn'); ?></option>
                        <option value="store_name" <?php if(\think\Request::instance()->param('type') == 'store_name'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('ds_store_name'); ?></option>
                        <option value="goods_name" <?php if(\think\Request::instance()->param('type') == 'goods_name'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('ds_goods_name'); ?></option>
                        <option value="buyer_name" <?php if(\think\Request::instance()->param('type') == 'buyer_name'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('ds_buyer_name'); ?></option>
                    </select>
                </dt>
                <dd><input type="text" class="text" name="key" value="<?php echo \think\Request::instance()->param('key'); ?>" /></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('refund_order_add_time'); ?></dt>
                <dd><input class="txt date" type="text" value="<?php echo \think\Request::instance()->param('add_time_from'); ?>" id="add_time_from" name="add_time_from">
                    ~
                    <input class="txt date" type="text" value="<?php echo \think\Request::instance()->param('add_time_to'); ?>" id="add_time_to" name="add_time_to"/></dd>
            </dl>
            <div class="btn_group">
                <input type="submit" class="btn" value="<?php echo \think\Lang::get('ds_search'); ?>">
                <?php if($filtered): ?>
                <a href="<?php echo url('Returnmanage/return_manage'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </form>
    
    <table class="ds-default-table">
        <thead>
            <tr class="thead">
                <th><?php echo \think\Lang::get('ds_order_sn'); ?></th>
                <th><?php echo \think\Lang::get('return_order_returnsn'); ?></th>
                <th><?php echo \think\Lang::get('ds_store_name'); ?></th>
                <th><?php echo \think\Lang::get('ds_goods_name'); ?></th>
                <th><?php echo \think\Lang::get('ds_buyer_name'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('refund_buyer_add_time'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('seller_time'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('refund_order_refund'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('return_order_return'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <?php if(!(empty($return_list) || (($return_list instanceof \think\Collection || $return_list instanceof \think\Paginator ) && $return_list->isEmpty()))): ?>
        <tbody>
            <?php if(is_array($return_list) || $return_list instanceof \think\Collection || $return_list instanceof \think\Paginator): if( count($return_list)==0 ) : echo "" ;else: foreach($return_list as $key=>$val): ?>
            <tr class="bd-line" >
                <td><?php echo $val['order_sn']; ?></td>
                <td><?php echo $val['refund_sn']; ?></td>
                <td><?php echo $val['store_name']; ?></td>
                <td><?php echo $val['goods_name']; ?></td>
                <td><?php echo $val['buyer_name']; ?></td>
                <td class="align-center"><?php echo date("Y-m-d H:i:s",$val['add_time']); ?></td>
                <td class="align-center"><?php echo date("Y-m-d H:i:s",$val['seller_time']); ?></td>
                <td class="align-center"><?php echo $val['refund_amount']; ?></td>
                <td class="align-center"><?php if($val['return_type'] == 2): ?><?php echo $val['goods_num']; else: ?><?php echo \think\Lang::get('none'); endif; ?></td>
                <td class="align-center">
                    <a href="javascript:dsLayerOpen('<?php echo url('Returnmanage/edit',['refund_id'=>$val['refund_id']]); ?>','<?php echo \think\Lang::get('ds_view'); ?><?php echo \think\Lang::get('ds_order_sn'); ?>-<?php echo $val['order_sn']; ?>')" class="dsui-btn-add"><i class="iconfont"></i> <?php echo \think\Lang::get('ds_confirm_submit'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
        <?php else: ?>
        <tbody>
            <tr class="no_data">
                <td colspan="20"><?php echo \think\Lang::get('no_record'); ?></td>
            </tr>
        </tbody>
        <?php endif; ?>
    </table>
    <?php echo $show_page; ?>

<script type="text/javascript">
$(function(){
    $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
    $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>
