<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:97:"/usr/local/var/www/dsmall/public/../application/admin/view/stataftersale/aftersale_evalstore.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_stataftersale'); ?></h3>
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
<form method="get"  name="formSearch" id="formSearch">
    <input type="hidden" id="exporttype" name="exporttype" value=""/>
    <input type="hidden" id="orderby" name="orderby" value="<?php echo !empty($orderby)?$orderby:'avgdesccredit desc'; ?>"/>
    <div class="ds-search-form">
            <dl>
              <dd id="scategory">
                <select class="querySelect" name="store_class">
                  <option value="0"><?php echo \think\Lang::get('ds_please_choose'); ?>...</option>
                  <?php if(!(empty($class_list) || (($class_list instanceof \think\Collection || $class_list instanceof \think\Paginator ) && $class_list->isEmpty()))): if(is_array($class_list) || $class_list instanceof \think\Collection || $class_list instanceof \think\Paginator): if( count($class_list)==0 ) : echo "" ;else: foreach($class_list as $key=>$v): ?>
                  <option <?php if(\think\Request::instance()->param('store_class') == $v['storeclass_id']): ?>selected="selected"<?php endif; ?> value="<?php echo $v['storeclass_id']; ?>"><?php echo $v['storeclass_name']; ?></option>
                  <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </select>
              </dd>
              <dd>
              	<?php echo \think\Lang::get('ds_store_name'); ?><input type="text" name="storename" value="<?php if(isset($search_arr['storename'])): ?><?php echo $search_arr['storename']; endif; ?>"/>
              </dd>
            </dl>
        
              <div class="btn_group">
                <a href="javascript:void(0);" id="dssubmit" class="btn tooltip" ><?php echo \think\Lang::get('ds_query'); ?></a>
                <a href="<?php echo url('Stataftersale/evalstore'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <a class="btn" href="javascript:void(0);" id="export_btn"><?php echo \think\Lang::get('ds_export'); ?>Excel</a>
              </div>
    </div>
  </form>
   
   <div class="explanation" id="explanation">
       <div class="title" id="checkZoom">
           <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
           <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
       </div>
       <ul>
           <li><?php echo \think\Lang::get('stataftersale_evalstore_help1'); ?></li>
           <li><?php echo \think\Lang::get('stataftersale_evalstore_help2'); ?></li>
       </ul>
   </div>
  <table class="ds-default-table">
    <thead>
      <tr class="thead sortbar-array">
        <th class="align-center"><?php echo \think\Lang::get('ds_store_name'); ?></th>
        <th class="align-center">
          <a href="javascript:void(0);" ds_type="orderitem" data-param='{"orderby":"avgdesccredit"}' class=""><?php echo \think\Lang::get('avgdesccredit'); ?><i></i></a>
        </th>
        <th class="align-center"><a href="javascript:void(0);" ds_type="orderitem" data-param='{"orderby":"avgservicecredit"}' class=""><?php echo \think\Lang::get('avgservicecredit'); ?><i></i></a></th>
        <th class="align-center"><a href="javascript:void(0);" ds_type="orderitem" data-param='{"orderby":"avgdeliverycredit"}' class=""><?php echo \think\Lang::get('avgdeliverycredit'); ?><i></i></a></th>
      </tr>
    </thead>
    <tbody id="datatable">
    <?php if(!(empty($statlist) || (($statlist instanceof \think\Collection || $statlist instanceof \think\Paginator ) && $statlist->isEmpty()))): if(is_array($statlist) || $statlist instanceof \think\Collection || $statlist instanceof \think\Paginator): if( count($statlist)==0 ) : echo "" ;else: foreach($statlist as $key=>$v): ?>
          <tr class="hover">
            <td class="align-center"><?php echo $v['seval_storename']; ?></td>
            <td class="align-center"><?php echo $v['avgdesccredit']; ?></td>
            <td class="align-center"><?php echo $v['avgservicecredit']; ?></td>
            <td class="align-center"><?php echo $v['avgdeliverycredit']; ?></td>
          </tr>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
    <tr class="no_data">
        	<td colspan="4"><?php echo \think\Lang::get('no_record'); ?></td>
        </tr>
   <?php endif; ?>
    </tbody>
  </table>
   <?php echo $show_page; ?>
</div>
<script>
$(function () {
    $('#dssubmit').click(function(){
        $("#exporttype").val('');
        $('#formSearch').submit();
    });

    //导出图表
    $("#export_btn").click(function(){
        $("#exporttype").val('excel');
        $('#formSearch').submit();
    });

    $("[ds_type='orderitem']").click(function(){
        $("#exporttype").val('');
        var data_str = $(this).attr('data-param');
        eval( "data_str = "+data_str);
        if($(this).hasClass('desc')){
            $("#orderby").val(data_str.orderby + ' asc');
        } else {
            $("#orderby").val(data_str.orderby + ' desc');
        }
        $('#formSearch').submit();
    });
});
</script>