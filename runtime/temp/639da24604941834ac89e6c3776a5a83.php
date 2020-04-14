<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:94:"/usr/local/var/www/dsmall/public/../application/admin/view/stataftersale/aftersale_refund.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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

   <form method="get" name="formSearch" id="formSearch">
       <div class="ds-search-form">
           <dl>
               <dd>
                   <select name="search_type" id="search_type" class="querySelect">
                       <option value="day" <?php if(isset($search_arr['search_type']) && $search_arr['search_type'] == 'day'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('search_type_day'); ?></option>
                       <option value="week" <?php if(isset($search_arr['search_type']) && $search_arr['search_type'] == 'week'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('search_type_week'); ?></option>
                       <option value="month" <?php if(isset($search_arr['search_type']) && $search_arr['search_type'] == 'month'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('search_type_month'); ?></option>
                   </select>
               </dd>
               <dd id="searchtype_day" style="display:none;">
                   <input class="txt date" type="text" value="<?php echo date('Y-m-d',$search_arr['day']['search_time']); ?>" id="search_time" name="search_time">
               </dd>
               <dd id="searchtype_week" style="display:none;">
                   <select name="searchweek_year" class="querySelect">
                       <?php if(is_array($year_arr) || $year_arr instanceof \think\Collection || $year_arr instanceof \think\Paginator): if( count($year_arr)==0 ) : echo "" ;else: foreach($year_arr as $key=>$v): ?>
                       <option value="<?php echo $key; ?>" <?php echo $search_arr['week']['current_year']==$key?'selected':''; ?>><?php echo $v; ?></option>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                   <select name="searchweek_month" class="querySelect">
                       <?php if(is_array($month_arr) || $month_arr instanceof \think\Collection || $month_arr instanceof \think\Paginator): if( count($month_arr)==0 ) : echo "" ;else: foreach($month_arr as $key=>$v): ?>
                       <option value="<?php echo $key; ?>" <?php echo $search_arr['week']['current_month']==$key?'selected':''; ?>><?php echo $v; ?></option>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                   <select name="searchweek_week" class="querySelect">
                       <?php if(is_array($week_arr) || $week_arr instanceof \think\Collection || $week_arr instanceof \think\Paginator): if( count($week_arr)==0 ) : echo "" ;else: foreach($week_arr as $key=>$v): ?>
                       <option value="<?php echo $v['key']; ?>" <?php echo !empty($search_arr['week']['current_week'])?'selected':''; ?>><?php echo $v['val']; ?></option>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
               </dd>
               <dd id="searchtype_month" style="display:none;">
                   <select name="searchmonth_year" class="querySelect">
                       <?php if(is_array($year_arr) || $year_arr instanceof \think\Collection || $year_arr instanceof \think\Paginator): if( count($year_arr)==0 ) : echo "" ;else: foreach($year_arr as $key=>$v): ?>
                       <option value="<?php echo $key; ?>" <?php echo $search_arr['month']['current_year']==$key?'selected':''; ?>><?php echo $v; ?></option>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
                   <select name="searchmonth_month" class="querySelect">
                       <?php if(is_array($month_arr) || $month_arr instanceof \think\Collection || $month_arr instanceof \think\Paginator): if( count($month_arr)==0 ) : echo "" ;else: foreach($month_arr as $key=>$v): ?>
                       <option value="<?php echo $key; ?>" <?php echo $search_arr['month']['current_month']==$key?'selected':''; ?>><?php echo $v; ?></option>
                       <?php endforeach; endif; else: echo "" ;endif; ?>
                   </select>
               </dd>
           </dl>
           <div class="btn_group">
               <input type='text' style='display:none' name='t' value='<?php echo $searchtime; ?>'>
               <a href="javascript:void(0);" id="dssubmit" class="btn tooltip" ><?php echo \think\Lang::get('ds_query'); ?></a>
               <a href="<?php echo url('Stataftersale/refund'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
           </div>
       </div>
   </form>
<div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('stataftersale_refund_help1'); ?></li>
            <li><?php echo \think\Lang::get('stataftersale_refund_help2'); ?></li>
        </ul>
</div>
<div id="container" class="w100pre close_float" style="max-height:400px;margin-bottom:20px;"></div>
  <div id="statlist" class="w100pre close_float"></div>
</div>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/highcharts/highcharts.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/statistics.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.ajaxContent.pack.js" type="text/javascript"></script>
<script>
//展示搜索时间框
function show_searchtime(){
    s_type = $("#search_type").val();
    $("[id^='searchtype_']").hide();
    $("#searchtype_"+s_type).show();
}

$(function () {
    //统计数据类型
    var s_type = $("#search_type").val();
    $('#search_time').datepicker({dateFormat: 'yy-mm-dd'});

    show_searchtime();
    $("#search_type").change(function(){
        show_searchtime();
    });

    //更新周数组
    $("[name='searchweek_month']").change(function(){
        var year = $("[name='searchweek_year']").val();
        var month = $("[name='searchweek_month']").val();
        $("[name='searchweek_week']").html('');
        $.getJSON(ADMINSITEURL+'/Common/getweekofmonth',{y:year,m:month},function(data){
            if(data != null){
                for(var i = 0; i < data.length; i++) {
                    $("[name='searchweek_week']").append('<option value="'+data[i].key+'">'+data[i].val+'</option>');
                }
            }
        });
    });

    $('#container').highcharts(<?php echo $stat_json; ?>);
    $('#statlist').load(ADMINSITEURL+'/Stataftersale/refundlist?t=<?php echo $searchtime; ?>');

    $('#dssubmit').click(function(){
        $('#formSearch').submit();
    });
});
</script>