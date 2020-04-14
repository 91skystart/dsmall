<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"/usr/local/var/www/dsmall/public/../application/admin/view/stattrade/stat_income.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_stattrade'); ?></h3>
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

 <form method="get" name="formSearch" id="formSearch">
     <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('search_year'); ?></dt>
                <dd>
                    <select name="search_year" id="search_year" class="querySelect">
                        <?php $__FOR_START_129990923__=2017;$__FOR_END_129990923__=2028;for($i=$__FOR_START_129990923__;$i < $__FOR_END_129990923__;$i+=1){ ?>
                        <option value="<?php echo $i; ?>" <?php echo \think\Request::instance()->param('search_year')==$i?'selected' : ''; ?>><?php echo $i; ?></option>
                        <?php } ?>
                    </select>
                </dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('search_month'); ?></dt>
                <dd>
                    <select name="search_month" id="search_month" class="querySelect">
                        <option value="01" <?php echo \think\Request::instance()->param('search_month')=='01'?'selected':''; ?>>1</option>
                        <option value="02" <?php echo \think\Request::instance()->param('search_month')=='02'?'selected':''; ?>>2</option>
                        <option value="03" <?php echo \think\Request::instance()->param('search_month')=='03'?'selected':''; ?>>3</option>
                        <option value="04" <?php echo \think\Request::instance()->param('search_month')=='04'?'selected':''; ?>>4</option>
                        <option value="05" <?php echo \think\Request::instance()->param('search_month')=='05'?'selected':''; ?>>5</option>
                        <option value="06" <?php echo \think\Request::instance()->param('search_month')=='06'?'selected':''; ?>>6</option>
                        <option value="07" <?php echo \think\Request::instance()->param('search_month')=='07'?'selected':''; ?>>7</option>
                        <option value="08" <?php echo \think\Request::instance()->param('search_month')=='08'?'selected':''; ?>>8</option>
                        <option value="09" <?php echo \think\Request::instance()->param('search_month')=='09'?'selected':''; ?>>9</option>
                        <option value="10" <?php echo \think\Request::instance()->param('search_month')=='10'?'selected':''; ?>>10</option>
                        <option value="11" <?php echo \think\Request::instance()->param('search_month')=='11'?'selected':''; ?>>11</option>
                        <option value="12" <?php echo \think\Request::instance()->param('search_month')=='12'?'selected':''; ?>>12</option>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:void(0);" id="dssubmit" class="btn tooltip" title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <a href="<?php echo url('Stattrade/income'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <input type="hidden" id="export_type" data-url="<?php echo url(request()->controller().'/'.request()->action()); ?>/exporttype/excel" name="export_type" data-param='{"url":"income?search_year=<?php echo intval(\think\Request::instance()->param('search_year')); ?>&search_month=<?php echo trim(\think\Request::instance()->param('search_month')); ?>&exporttype=excel"}' value="excel"/>
                <a class="btn" href="javascript:void(0);" id="export_btn"><?php echo \think\Lang::get('ds_export'); ?>Excel</a>
            </div>
        </div>
  </form>

<div class="stat-info">
  <span><?php echo \think\Lang::get('stattrade_order_amount_total'); ?>：<strong><?php echo number_format($plat_data['oot'],2); ?></strong><?php echo \think\Lang::get('currency_zh'); ?></span>
  <span><?php echo \think\Lang::get('stattrade_refund_total'); ?>：<strong><?php echo number_format($plat_data['oort'],2); ?></strong><?php echo \think\Lang::get('currency_zh'); ?></span>
  <span><?php echo \think\Lang::get('stattrade_income'); ?>：<strong><?php echo number_format($plat_data['oot']-$plat_data['oort'],2); ?></strong><?php echo \think\Lang::get('currency_zh'); ?></span>
  <span><?php echo \think\Lang::get('stattrade_commis_total'); ?>：<strong><?php echo number_format($plat_data['oct'],2); ?></strong><?php echo \think\Lang::get('currency_zh'); ?></span>
  <span><?php echo \think\Lang::get('ob_store_cost_totals'); ?>：<strong><?php echo number_format($plat_data['osct'],2); ?></strong><?php echo \think\Lang::get('currency_zh'); ?></span>
  <span><?php echo \think\Lang::get('stattrade_total'); ?>：<strong><?php echo number_format($plat_data['ort'],2); ?></strong><?php echo \think\Lang::get('currency_zh'); ?></span>
</div>
  <div id="container" class="w100pre close_float" style="height:50px"></div>
  <table class="ds-default-table">
    <thead>
      <tr class="thead">
        <th class="align-center"><?php echo \think\Lang::get('ds_store_name'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ds_seller_name'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('statstore_orderamount'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ob_commis_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ob_order_return_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ob_commis_return_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ob_store_cost_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ob_inviter_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ob_result_totals'); ?></th>
        <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
      </tr>
    </thead>
    <tbody id="datatable">
    <?php if(!(empty($store_list) || (($store_list instanceof \think\Collection || $store_list instanceof \think\Paginator ) && $store_list->isEmpty()))): if(is_array($store_list) || $store_list instanceof \think\Collection || $store_list instanceof \think\Paginator): if( count($store_list)==0 ) : echo "" ;else: foreach($store_list as $key=>$v): ?>
      <tr class="hover">
        <td class="align-center">
          <a href="<?php echo url('home/Store/index',['store_id'=>$v['ob_store_id']]); ?>" target="_blank"><?php echo $v['ob_store_name']; ?></a>
        </td>
        <td class="align-center"><?php echo $v['member_name']; ?></td>
        <td class="align-center"><?php echo $v['ob_order_totals']; ?></td>
        <td class="align-center"><?php echo $v['ob_commis_totals']; ?></td>
        <td class="align-center"><?php echo $v['ob_order_return_totals']; ?></td>
        <td class="align-center"><?php echo $v['ob_commis_return_totals']; ?></td>
        <td class="align-center"><?php echo $v['ob_store_cost_totals']; ?></td>
        <td class="align-center"><?php echo $v['ob_inviter_totals']; ?></td>
        <td class="align-center"><?php echo $v['ob_result_totals']; ?></td>
        <td class="align-center">
          <a href="<?php echo url('Stattrade/sale',['search_type'=>'month','search_time_month'=>\think\Request::instance()->param('search_month'),'search_time_year'=>\think\Request::instance()->param('search_year'),'store_name'=>$v['ob_store_name']]); ?>"><?php echo \think\Lang::get('ds_detail'); ?></a>
        </td>
      </tr>
     <?php endforeach; endif; else: echo "" ;endif; else: ?>
      <tr class="no_data">
        <td colspan="15"><?php echo \think\Lang::get('ds_no_record'); ?></td>
      </tr>
      <?php endif; ?>
    </tbody>
  </table>
  <?php echo $show_page; ?>
</div>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/highcharts/highcharts.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/statistics.js"></script>
<script>
$(function () {
    $('#dssubmit').click(function(){
        $('#formSearch').submit();
    });

    //导出图表
    $("#export_btn").click(function(){
        var item = $("#export_type");
        var type = $(item).val();
        if(type == 'excel'){
            export_xls(item.attr('data-url').replace('.html',''));
        }
    });

    $('#dsexport').click(function(){
        $('#formSearch').submit();
    });
});
</script>