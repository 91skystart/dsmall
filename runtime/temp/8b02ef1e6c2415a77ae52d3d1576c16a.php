<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:83:"/usr/local/var/www/dsmall/public/../application/admin/view/statgeneral/general.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_statgeneral'); ?></h3>
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

    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('stat_validorder_explain'); ?></li>
        </ul>
    </div>


    <table class="ds-default-table">
        <thead class="thead">
        <tr class="space">
            <th colspan="15"><?php echo date("Y-m-d",$stat_time); ?><?php echo \think\Lang::get('latest_news'); ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <?php echo \think\Lang::get('statstore_orderamount'); ?>&nbsp;<i title="<?php echo \think\Lang::get('statstore_orderamount_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['orderamount']; ?><?php echo \think\Lang::get('currency_zh'); ?></b>
            </td>
            <td>
                <?php echo \think\Lang::get('membernum'); ?>&nbsp;<i title="<?php echo \think\Lang::get('membernum_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['ordermembernum']; ?></b>
            </td>
            <td>
                <?php echo \think\Lang::get('statstore_ordernum'); ?>&nbsp;<i title="<?php echo \think\Lang::get('statstore_ordernum_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['ordernum']; ?></b>
            </td>
            <td>
                <?php echo \think\Lang::get('goodsnum'); ?>&nbsp;<i title="<?php echo \think\Lang::get('goodsnum_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['ordergoodsnum']; ?></b>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo \think\Lang::get('average_price'); ?>&nbsp;<i title="<?php echo \think\Lang::get('average_price_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['priceavg']; ?><?php echo \think\Lang::get('currency_zh'); ?></b>
            </td>
            <td>
                <?php echo \think\Lang::get('average_per_member_price'); ?>&nbsp;<i title="<?php echo \think\Lang::get('average_per_member_price_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['orderavg']; ?></b>
            </td>
            <td>
                <?php echo \think\Lang::get('stat_newmember'); ?>&nbsp;<i title="<?php echo \think\Lang::get('stat_newmember_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['newmember']; ?></b>
            </td>
            <td>
                <?php echo \think\Lang::get('user_total'); ?>&nbsp;<i title="<?php echo \think\Lang::get('user_total_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['membernum']; ?></b>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo \think\Lang::get('stat_newstore'); ?>&nbsp;<i title="<?php echo \think\Lang::get('stat_newstore_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['newstore']; ?></b></td>
            <td>
                <?php echo \think\Lang::get('store_total'); ?>&nbsp;<i title="<?php echo \think\Lang::get('store_total_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['storenum']; ?></b></td>
            <td>
                <?php echo \think\Lang::get('goods_add_total'); ?>&nbsp;<i title="<?php echo \think\Lang::get('goods_add_total_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['newgoods']; ?></b></td>
            <td>
                <?php echo \think\Lang::get('goods_total'); ?>&nbsp;<i title="<?php echo \think\Lang::get('goods_total_tips'); ?>" class="tip iconfont">&#xe66f;</i>
                <br><b><?php echo $statnew_arr['goodsnum']; ?></b></td>
        </tr>
        </tbody>
    </table>

    <table class="ds-default-table">
        <thead class="thead">
        <tr class="space">
            <th colspan="15"><?php echo date("Y-m-d",$stat_time); ?><?php echo \think\Lang::get('sale_trend'); ?></th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><div id="container" class="w100pre close_float" style="height:400px"></div></td>
        </tr>
        </tbody>
    </table>

    <div style="overflow: hidden;">
    <div class="w40pre floatleft">
        <table class="ds-default-table">
            <thead class="thead">
            <tr class="space">
                <th colspan="15"><?php echo \think\Lang::get('store_sale_top_30'); ?>&nbsp;<i title="<?php echo \think\Lang::get('store_sale_top_30_tips'); ?>" class="tip iconfont">&#xe66f;</i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo \think\Lang::get('statstore_number'); ?></td>
                <td><?php echo \think\Lang::get('ds_store_name'); ?></td>
                <td><?php echo \think\Lang::get('statstore_orderamount'); ?></td>
            </tr>
            <?php if(is_array($storetop30_arr) || $storetop30_arr instanceof \think\Collection || $storetop30_arr instanceof \think\Paginator): if( count($storetop30_arr)==0 ) : echo "" ;else: foreach($storetop30_arr as $key=>$v): ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $v['store_name']; ?></td>
                <td><?php echo $v['orderamount']; ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>

    <div class="w50pre floatleft" style="margin-left: 50px;">
        <table class="ds-default-table">
            <thead class="thead">
            <tr class="space">
                <th colspan="15"><?php echo \think\Lang::get('goods_sale_top_30'); ?>&nbsp;<i title="<?php echo \think\Lang::get('goods_sale_top_30_tips'); ?>" class="tip iconfont">&#xe66f;</i></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo \think\Lang::get('statstore_number'); ?></td>
                <td><?php echo \think\Lang::get('ds_goods'); ?></td>
                <td><?php echo \think\Lang::get('stat_storesale'); ?></td>
            </tr>
            <?php if(is_array($goodstop30_arr) || $goodstop30_arr instanceof \think\Collection || $goodstop30_arr instanceof \think\Paginator): if( count($goodstop30_arr)==0 ) : echo "" ;else: foreach($goodstop30_arr as $key=>$v): ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td class="alignleft"><a href="<?php echo url('home/Goods/index',['goods_id'=>$v['goods_id']]); ?>" target="_blank"><?php echo $v['goods_name']; ?></a></td>
                <td><?php echo $v['ordergoodsnum']; ?></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    </div>
    <div class="close_float"></div>
</div>
</div>
<script>
    jQuery.browser={};(function(){jQuery.browser.msie=false; jQuery.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)./)){ jQuery.browser.msie=true;jQuery.browser.version=RegExp.$1;}})();
</script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.poshytip.min.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/highcharts/highcharts.js"></script>
<script>
    $(function () {
        //Ajax提示
        $('.tip').poshytip({
            className: 'tip-yellowsimple',
            showTimeout: 1,
            alignTo: 'target',
            alignX: 'center',
            alignY: 'top',
            offsetY: 5,
            allowTipHover: false
        });
    });
    var chart = new Highcharts.Chart('container', <?php echo $stattoday_json; ?>);
</script>