<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:86:"/usr/local/var/www/dsmall/public/../application/admin/view/vrorder/vr_order_index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_vrorder'); ?></h3>
                <h5></h5>
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
    <div class="fixed-empty"></div>
    <form method="get" action="" name="formSearch" id="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('ds_order_sn'); ?></dt>
                <dd><input class="txt2" type="text" name="order_sn" value="<?php echo \think\Request::instance()->param('order_sn'); ?>" /></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('ds_store_name'); ?></dt>
                <dd><input class="txt-short" type="text" name="store_name" value="<?php echo \think\Request::instance()->param('store_name'); ?>" /></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('order_state'); ?></dt>
                <dd><select name="order_state" class="querySelect">
                        <option value=""><?php echo \think\Lang::get('ds_please_choose'); ?></option>
                        <option value="10" <?php if(\think\Request::instance()->param('order_state') == '10'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('order_state_new'); ?></option>
                        <option value="20" <?php if(\think\Request::instance()->param('order_state') == '20'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('order_state_paid'); ?></option>
                        <option value="40" <?php if(\think\Request::instance()->param('order_state') == '40'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('order_state_success'); ?></option>
                        <option value="0" <?php if(\think\Request::instance()->param('order_state') == '0'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('order_state_cancel'); ?></option>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('order_time_from'); ?></dt>
                <dd><input class="txt date" type="text" value="<?php echo \think\Request::instance()->param('query_start_time'); ?>" id="query_start_time" name="query_start_time">
                    ~
                    <input class="txt date" type="text" value="<?php echo \think\Request::instance()->param('query_end_time'); ?>" id="query_end_time" name="query_end_time"/>

                </dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('ds_buyer_name'); ?></dt>
                <dd><input class="txt-short" type="text" name="buyer_name" value="<?php echo \think\Request::instance()->param('buyer_name'); ?>" /></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('ds_payment_code'); ?></dt>
                <dd>
                    <select name="payment_code" class="w100">
                        <option value=""><?php echo \think\Lang::get('ds_please_choose'); ?></option>
                        <?php foreach($payment_list as $val) { if ($val['payment_code'] == 'offline') continue;?>
                        <option <?php if(\think\Request::instance()->param('payment_code') == $val['payment_code']): ?>selected<?php endif; ?> value="<?php echo $val['payment_code']; ?>"><?php echo $val['payment_name']; ?></option>
                        <?php } ?>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <input type="submit" class="btn" value="<?php echo \think\Lang::get('ds_query'); ?>">
                <?php if($filtered): ?>
                <a href="<?php echo url('Vrorder/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <?php endif; ?>
                <a class="btn btn-mini" href="javascript:export_xls('<?php echo url('Vrorder/export_step1'); ?>')"><span><?php echo \think\Lang::get('ds_export'); ?>Excel</span></a>
            </div>
        </div>
    </form>
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('vrorder_index_help1'); ?></li>
            <li><?php echo \think\Lang::get('vrorder_index_help2'); ?></li>
            <li><?php echo \think\Lang::get('vrorder_index_help3'); ?></li>
        </ul>
    </div>
    <table class="ds-default-table">
        <colgroup>
            <col width="200">
            <col width="100">
            <col width="100">
            <col width="200">
            <col width="100">
            <col width="100">
            <col width="100">
            <col>
        </colgroup>
        <thead>
            <tr class="thead">
                <th><?php echo \think\Lang::get('ds_order_sn'); ?></th>
                <th><?php echo \think\Lang::get('ds_store_name'); ?></th>
                <th><?php echo \think\Lang::get('ds_buyer_name'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('order_time'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('order_total_price'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('ds_payment_code'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('order_state'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!(empty($order_list) || (($order_list instanceof \think\Collection || $order_list instanceof \think\Paginator ) && $order_list->isEmpty()))): if(is_array($order_list) || $order_list instanceof \think\Collection || $order_list instanceof \think\Paginator): if( count($order_list)==0 ) : echo "" ;else: foreach($order_list as $key=>$order): ?>
            <tr class="hover">
                <td><?php echo $order['order_sn']; ?></td>
                <td><?php echo $order['store_name']; ?></td>
                <td><?php echo $order['buyer_name']; ?></td>
                <td class="nowrap align-center"><?php echo date("Y-m-d H:i:s",$order['add_time']); ?></td>
                <td class="align-center"><?php echo $order['order_amount']; ?></td>
                <td class="align-center"><?php echo get_order_payment_name($order['payment_code']); ?></td>
                <td class="align-center"><?php echo $order['state_desc']; ?></td>
                <td class="w144 align-center">
                    
                    <a href="javascript:dsLayerOpen('<?php echo url('Vrorder/show_order',['order_id'=>$order['order_id']]); ?>','<?php echo \think\Lang::get('ds_view'); ?>-<?php echo $order['order_sn']; ?>')" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_view'); ?></a>
                    <!-- 取消订单 -->
                    <?php if($order['if_cancel']): ?>
                    <a href="javascript:dsLayerConfirm('<?php echo url('Vrorder/change_state',['state_type'=>'cancel','order_id'=>$order['order_id']]); ?>','<?php echo \think\Lang::get('order_confirm_cancel'); ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('order_change_cancel'); ?></a>
                    <?php endif; ?>
                    <!-- 收款 -->
                    <?php if($order['if_system_receive_pay']): ?>
                    <a href="javascript:dsLayerOpen('<?php echo url('Vrorder/change_state',['state_type'=>'receive_pay','order_id'=>$order['order_id']]); ?>','<?php echo \think\Lang::get('order_change_received'); ?>-<?php echo $order['order_sn']; ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('order_change_received'); ?></a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="15"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
        <tfoot>
            <tr class="tfoot">
                <td colspan="15" id="dataFuncs"><?php echo $show_page; ?></td>
            </tr>
        </tfoot>
    </table>
</div>
<script type="text/javascript">
    $(function () {
        $('#query_start_time').datepicker({dateFormat: 'yy-mm-dd'});
        $('#query_end_time').datepicker({dateFormat: 'yy-mm-dd'});
    });
</script> 
