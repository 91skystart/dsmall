<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"/usr/local/var/www/dsmall/public/../application/admin/view/bill/show_statis.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('bill_billing_list'); ?></h3>
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
                <dt><?php echo \think\Lang::get('ds_store_name'); ?>ID/<?php echo \think\Lang::get('bill_store_name'); ?></dt>
                <dd><input class="txt-short" type="text" value="<?php echo \think\Request::instance()->param('query_store'); ?>" name="query_store" id="query_store"/></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('bill_state'); ?></dt>
                <dd>
                    <select name="bill_state">
                        <option><?php echo \think\Lang::get('ds_please_choose'); ?></option>
                        <option <?php if(\think\Request::instance()->param('bill_state') == BILL_STATE_CREATE): ?>selected<?php endif; ?> value="<?php echo BILL_STATE_CREATE; ?>"><?php echo \think\Lang::get('bill_state_create'); ?></option>
                        <option <?php if(\think\Request::instance()->param('bill_state') == BILL_STATE_STORE_COFIRM): ?>selected<?php endif; ?> value="<?php echo BILL_STATE_STORE_COFIRM; ?>"><?php echo \think\Lang::get('bill_srate_store_cofirm'); ?></option>
                        <option <?php if(\think\Request::instance()->param('bill_state') == BILL_STATE_SUCCESS): ?>selected<?php endif; ?> value="<?php echo BILL_STATE_SUCCESS; ?>"><?php echo \think\Lang::get('bill_state_success'); ?></option>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <a href="<?php echo url('Bill/show_statis'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <a class="btn" href="javascript:export_xls('<?php echo url('Bill/export_zd_step1'); ?>')"><span><?php echo \think\Lang::get('ds_export'); ?>Excel</span></a>
            </div>
        </div>
  </form>
  <div class="explanation" id="explanation">
      <div class="title" id="checkZoom">
          <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
          <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
      </div>
      <ul>
          <li><?php echo \think\Lang::get('bill_show_statis_help1'); ?></li>
          <li><?php echo \think\Lang::get('bill_show_statis_help2'); ?></li>
      </ul>
  </div>
  <table class="ds-default-table">
    <thead>
      <tr class="thead">
        <th><?php echo \think\Lang::get('bill_ob_no'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_os_startdate'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_os_enddate'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('order_price_from'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('order_total_transport'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_print_commision'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_ob_order_return_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_os_commis_returntotals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ob_inviter_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_ob_vr_order_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_ob_vr_order_return_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_ob_vr_commis_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_ob_vr_commis_return_totals'); ?></th>
            <th class="align-center"><?php echo \think\Lang::get('bill_ob_vr_inviter_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_os_store_costtotals'); ?></th>
        
        <th class="align-center"><?php echo \think\Lang::get('bill_os_result_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_out_date'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('bill_state'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ds_store_name'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
      </tr>
    </thead>
    <tbody>
        <?php if(!(empty($bill_list) || (($bill_list instanceof \think\Collection || $bill_list instanceof \think\Paginator ) && $bill_list->isEmpty()))): if(is_array($bill_list) || $bill_list instanceof \think\Collection || $bill_list instanceof \think\Paginator): if( count($bill_list)==0 ) : echo "" ;else: foreach($bill_list as $key=>$bill_info): ?>
        <tr class="hover">
            <td><?php echo $bill_info['ob_no']; ?></td>
            <td class="nowrap align-center"><?php echo date('Y-m-d',$bill_info['ob_startdate']); ?></td>
            <td class="nowrap align-center"><?php echo date('Y-m-d',$bill_info['ob_enddate']); ?></td>
            <td class="align-center"><?php echo $bill_info['ob_order_totals']; ?></td>
            <td class="align-center"><?php echo $bill_info['ob_shipping_totals']; ?></td>
            <td class="align-center"><?php echo $bill_info['ob_commis_totals']; ?></td>        
            <td class="align-center"><?php echo $bill_info['ob_order_return_totals']; ?></td>        
            <td class="align-center"><?php echo $bill_info['ob_commis_return_totals']; ?></td> 
            <td class="align-center"><?php echo $bill_info['ob_inviter_totals']; ?></td>
            <td class="align-center"><?php echo $bill_info['ob_vr_order_totals']; ?></td>
            <td class="align-center"><?php echo $bill_info['ob_vr_order_return_totals']; ?></td>
            <td class="align-center"><?php echo $bill_info['ob_vr_commis_totals']; ?></td>
            <td class="align-center"><?php echo $bill_info['ob_vr_commis_return_totals']; ?></td>
            <td class="align-center"><?php echo $bill_info['ob_vr_inviter_totals']; ?></td>
            <td class="align-center"><?php echo $bill_info['ob_store_cost_totals']; ?></td>    
            
            <td class="align-center"><?php echo $bill_info['ob_result_totals']; ?></td>
            <td class="align-center"><?php echo date('Y-m-d',$bill_info['ob_createdate']); ?></td>
            <td class="align-center"><?php echo get_bill_state($bill_info['ob_state']); ?></td>
            <td class="align-center"><?php echo $bill_info['ob_store_name']; ?><br/>id:<?php echo $bill_info['ob_store_id']; ?></td>
            <td class="align-center">
                <a href="javascript:dsLayerOpen('<?php echo url('Bill/show_bill',['ob_no'=>$bill_info['ob_no']]); ?>','<?php echo \think\Lang::get('ds_view'); ?>-<?php echo $bill_info['ob_no']; ?>')" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_view'); ?></a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr class="no_data">
            <td colspan="19"><?php echo \think\Lang::get('ds_no_record'); ?></td>
        </tr>
        <?php endif; ?>
    </tbody>
    
  </table>
  <div><?php echo $show_page; ?></div>
</div>
<script type="text/javascript">
$(function(){
    $('#bill_month').datepicker({dateFormat:'yy-mm'});
});
</script> 
