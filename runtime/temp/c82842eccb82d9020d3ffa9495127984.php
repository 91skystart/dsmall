<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:94:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellerlive/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php if(isset($html_title) && $html_title): ?><?php echo $html_title; else: ?><?php echo \think\Lang::get('store_callcenter'); endif; ?></title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta name="keywords" content="<?php echo (isset($seo_keywords) && ($seo_keywords !== '')?$seo_keywords:''); ?>" />
        <meta name="description" content="<?php echo (isset($seo_description) && ($seo_description !== '')?$seo_description:''); ?>" />
        <link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/common.css">
        <link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/seller.css">
        <link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.css">
        <script>
            var BASESITEROOT = "<?php echo BASE_SITE_ROOT; ?>";
            var HOMESITEROOT = "<?php echo HOME_SITE_ROOT; ?>";
            var BASESITEURL = "<?php echo BASE_SITE_URL; ?>";
            var HOMESITEURL = "<?php echo HOME_SITE_URL; ?>";
        </script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery-2.1.4.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/common.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.validate.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/additional-methods.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/layer/layer.js"></script>
        <script src="<?php echo HOME_SITE_ROOT; ?>/js/member.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
        <script>
            jQuery.browser={};(function(){jQuery.browser.msie=false; jQuery.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)./)){ jQuery.browser.msie=true;jQuery.browser.version=RegExp.$1;}})();
        </script>
    </head>
    <body>
        <div id="append_parent"></div>
        <div id="ajaxwaitid"></div>
        

<div class="seller_main">
    <div class="seller_left">
    <div class="seller_left_1">
        <div class="logo">
            <a href="<?php echo url('Seller/index'); ?>">
                <img src="<?php if(\think\Config::get('seller_center_logo') == ''): ?><?php echo BASE_SITE_ROOT; ?>/uploads/home/common/seller_center_logo.png<?php else: ?><?php echo BASE_SITE_ROOT; ?>/uploads/home/common/<?php echo \think\Config::get('seller_center_logo'); endif; ?>"/>
            </a>
        </div>
        <div class="sidebar">
            <a href="<?php echo url('Store/index',['store_id'=>\think\Session::get('store_id')]); ?>" target="_blank"><i class="iconfont">&#xe6da;</i><?php echo \think\Lang::get('ds_mystroe'); ?></a>
            <?php if(\think\Config::get('node_site_use') == '1'): ?>
            <a href="javascript:void(0);" id="chat_show_user"><i class="iconfont">&#xe71b;</i><?php echo \think\Lang::get('ds_chat'); ?></a>
            <?php endif; if(is_array($seller_menu) || $seller_menu instanceof \think\Collection || $seller_menu instanceof \think\Paginator): if( count($seller_menu)==0 ) : echo "" ;else: foreach($seller_menu as $menu_key=>$menu): ?>
            <a href="<?php echo $menu['url']; ?>" <?php if($menu_key == $curmenu): ?>class="active"<?php endif; ?>><i class="iconfont"><?php echo $menu['ico']; ?></i><?php echo $menu['text']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="mb">
            <a href="<?php echo url('Sellerlogin/logout'); ?>"><?php echo \think\Lang::get('exit'); ?></a>
        </div>
    </div>
    <div class="seller_left_2">
        <div class="mt">
            <?php if(is_array($seller_menu) || $seller_menu instanceof \think\Collection || $seller_menu instanceof \think\Paginator): if( count($seller_menu)==0 ) : echo "" ;else: foreach($seller_menu as $menu_key=>$menu): if($menu_key == $curmenu): ?><?php echo $menu['text']; endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="mc">
            <?php if(is_array($seller_menu) || $seller_menu instanceof \think\Collection || $seller_menu instanceof \think\Paginator): if( count($seller_menu)==0 ) : echo "" ;else: foreach($seller_menu as $menu_key=>$menu): if($menu_key == $curmenu): if(is_array($menu['submenu']) || $menu['submenu'] instanceof \think\Collection || $menu['submenu'] instanceof \think\Paginator): if( count($menu['submenu'])==0 ) : echo "" ;else: foreach($menu['submenu'] as $key=>$submenu): ?>
            <a href="<?php echo $submenu['url']; ?>" <?php if($submenu['name'] == $cursubmenu): ?>class="active"<?php endif; ?>><?php echo $submenu['text']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
    <div class="seller_right">
        <div class="seller_items">
        <?php if(!(empty($seller_item) || (($seller_item instanceof \think\Collection || $seller_item instanceof \think\Paginator ) && $seller_item->isEmpty()))): ?>
<ul>
    <?php if(is_array($seller_item) || $seller_item instanceof \think\Collection || $seller_item instanceof \think\Paginator): if( count($seller_item)==0 ) : echo "" ;else: foreach($seller_item as $key=>$item): ?>
    <li <?php if($item['name'] == $curitem): ?>class="current"<?php endif; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['text']; ?></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php endif; ?>
        
        </div>
        <div style="padding: 20px;">
            <?php if(isset($store_closed) && $store_closed): ?>
            <div class="alert mt10"> <strong><?php echo \think\Lang::get('store_closed_reason'); ?>：<?php echo $store_closed; ?>。</strong> <?php echo \think\Lang::get('please_contact_admin'); ?>!</div>
            <?php endif; ?>
            
<div class="alert alert-block mt10">
    <ul>
        <li><?php echo \think\Lang::get('activity_guidelines1'); ?></li>
        <li><?php echo \think\Lang::get('activity_guidelines2'); ?></li>
        <li><?php echo \think\Lang::get('activity_guidelines3'); ?></li>
    </ul>
</div>
<div class="dssc-form-default">
    <form id="add_form" action="<?php echo url('Sellerlive/index'); ?>" method="post">
        <dl>
            <dt><?php echo \think\Lang::get('conversion_code_generate'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w50 text" name="store_vrcode_prefix" type="text" maxlength="3" value="<?php echo $store['store_vrcode_prefix']; ?>" maxlength="30"  />
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('conversion_code_generate_interpretation'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('offline_store_name'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w200 text" name="live_store_name" type="text" id="live_store_name" value="<?php echo $store['live_store_name']; ?>" maxlength="30"  />
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('offline_store_name_interpretation'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('offline_shops'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w200 text" name="live_store_tel" type="text" id="live_store_tel" value="<?php echo $store['live_store_tel']; ?>" maxlength="30"  />
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('offline_shops_interpretation'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('offline_store_address'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class=" w500 text" name="live_store_address" type="text" id="live_store_address" value="<?php echo $store['live_store_address']; ?>" maxlength="30"  />
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('offline_store_address_interpretation'); ?></p>
                <div id="container" class="w500 h200 mt10"></div>

            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('offline_traffic_information'); ?>：</dt>
            <dd>
                <textarea class="textarea w500 h50" name="live_store_bus"><?php echo $store['live_store_bus']; ?></textarea>
                <p class="hint"><?php echo \think\Lang::get('offline_traffic_information_interpretation'); ?></p>
            </dd>
        </dl>
        <div class="bottom">
            <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>">
        </div>
    </form>
</div>

<script type="text/javascript">
var cityName = '';
var address = "<?php echo str_replace("'",'"',$store['live_store_address']); ?>";
var store_name = "<?php echo str_replace("'",'"',$store['live_store_name']); ?>";
var map = "";
var localCity = "";
var opts = {width : 150,height: 50,title : "<?php echo \think\Lang::get('store_name'); ?>"+store_name}
$(document).ready(function(){
    $('#add_form').validate({
        submitHandler:function(form){
            ds_ajaxpost('add_form');
        }
    });
});

function initialize() {
    map = new BMap.Map("container");
    localCity = new BMap.LocalCity();

    map.enableScrollWheelZoom();
    map.addControl(new BMap.NavigationControl());
    map.addControl(new BMap.ScaleControl());
    map.addControl(new BMap.OverviewMapControl());
    localCity.get(function(cityResult){
        if (cityResult) {
            var level = cityResult.level;
            if (level < 13) level = 13;
            map.centerAndZoom(cityResult.center, level);
            cityResultName = cityResult.name;
            if (cityResultName.indexOf(cityName) >= 0) cityName = cityResult.name;
            getPoint();
        }
    });
}

function loadScript() {
    var script = document.createElement("script");
    script.src = "<?php echo HTTP_TYPE; ?>api.map.baidu.com/api?v=2.0&ak=<?php echo $baidu_ak; ?>&callback=initialize";
    document.body.appendChild(script);
}
function getPoint(){
    var myGeo = new BMap.Geocoder();
    myGeo.getPoint(address, function(point){
        if (point) {
            setPoint(point);
        }
    }, cityName);
}
function setPoint(point){
    if (point) {
        map.centerAndZoom(point, 16);
        var marker = new BMap.Marker(point);
        var infoWindow = new BMap.InfoWindow("<?php echo \think\Lang::get('store_address'); ?>"+address, opts);
        marker.addEventListener("click", function(){
            this.openInfoWindow(infoWindow);
        });
        map.addOverlay(marker);
        marker.openInfoWindow(infoWindow);
    }
}
$(function(){
    loadScript();
});

</script>

        </div>
    </div>
</div>
<?php if(\think\Config::get('node_site_use') == '1' && !isset($wait) && request()->controller() != 'Payment' && request()->controller() != 'Showgroupbuy'): ?>
<?php echo get_chat(); endif; ?>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.cookie.js"></script>
<script src="<?php echo HOME_SITE_ROOT; ?>/js/compare.js"></script>
<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/perfect-scrollbar.min.css">
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/qtip/jquery.qtip.min.js"></script>
<link href="<?php echo PLUGINS_SITE_ROOT; ?>/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.lazyload.min.js"></script>
<script>
    //懒加载
    $("img.lazyload").lazyload({
//        placeholder : "<?php echo HOME_SITE_ROOT; ?>/images/loading.gif",
        effect: "fadeIn",
        skip_invisible : false,
        threshold : 200,
    });
</script>
<div class="footer-info">
    <div class="links w1200">
        <?php foreach($navs['footer'] as $nav): ?>
        <a href="<?php echo $nav['nav_url']; ?>" <?php if($nav['nav_new_open'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $nav['nav_title']; ?></a>|
        <?php endforeach; ?>
    </div>
    <p class="copyright"><?php echo \think\Config::get('flow_static_code'); ?></p>
</div>

