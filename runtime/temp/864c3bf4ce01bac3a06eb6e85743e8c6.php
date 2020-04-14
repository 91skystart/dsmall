<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:98:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellergroupbuy/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
<?php endif; if(isset($isPlatformStore) || config('groupbuy_price')==0): ?>
<a href="<?php echo url('Sellergroupbuy/groupbuy_add_vr'); ?>" style="right:100px"
   class="dssc-btn dssc-btn-green" title="<?php echo \think\Lang::get('new_virtual_goods_snap'); ?>"><i class="iconfont">&#xe6db;</i><?php echo \think\Lang::get('new_virtual_panic_buying'); ?></a>
<a href="<?php echo url('Sellergroupbuy/groupbuy_add'); ?>" class="dssc-btn dssc-btn-green"
   title="<?php echo \think\Lang::get('groupbuy_index_new_group'); ?>"><i
        class="iconfont">&#xe6db;</i><?php echo \think\Lang::get('groupbuy_index_new_group'); ?></a>
<?php else: if(!(empty($current_groupbuy_quota) || (($current_groupbuy_quota instanceof \think\Collection || $current_groupbuy_quota instanceof \think\Paginator ) && $current_groupbuy_quota->isEmpty()))): ?>

<a href="<?php echo url('Sellergroupbuy/groupbuy_add_vr'); ?>" style="right:200px"
   class="dssc-btn dssc-btn-green" title="<?php echo \think\Lang::get('new_virtual_goods_snap'); ?>"><i class="iconfont">&#xe6db;</i><?php echo \think\Lang::get('new_virtual_panic_buying'); ?></a>
<a href="<?php echo url('Sellergroupbuy/groupbuy_add'); ?>" style="right:100px"
   class="dssc-btn dssc-btn-green" title="<?php echo \think\Lang::get('groupbuy_index_new_group'); ?>"><i
        class="iconfont">&#xe6db;</i><?php echo \think\Lang::get('groupbuy_index_new_group'); ?></a>
<a class="dssc-btn dssc-btn-acidblue" href="<?php echo url('Sellergroupbuy/groupbuy_quota_add'); ?>"
   title="<?php echo \think\Lang::get('set_renewal'); ?>"><i class="iconfont">&#xe6a1;</i><?php echo \think\Lang::get('set_renewal'); ?></a>
<?php else: ?>
<a class="dssc-btn dssc-btn-acidblue" href="<?php echo url('Sellergroupbuy/groupbuy_quota_add'); ?>"
   title="<?php echo \think\Lang::get('purchase_plan'); ?>"><i class="iconfont">&#xe6a1;</i><?php echo \think\Lang::get('purchase_plan'); ?></a>
<?php endif; endif; ?>



        </div>
        <div style="padding: 20px;">
            <?php if(isset($store_closed) && $store_closed): ?>
            <div class="alert mt10"> <strong><?php echo \think\Lang::get('store_closed_reason'); ?>：<?php echo $store_closed; ?>。</strong> <?php echo \think\Lang::get('please_contact_admin'); ?>!</div>
            <?php endif; if(isset($isPlatformStore) || config('groupbuy_price')==0): ?>
<div class="alert alert-block mt10">
    <ul class="mt5">
        <li><?php echo \think\Lang::get('purchase_plan1'); ?></li>
        <li><?php echo \think\Lang::get('purchase_plan2'); ?></li>
    </ul>
</div>
<?php else: ?>
<div class="alert alert-block mt10">
    <?php if(!(empty($current_groupbuy_quota) || (($current_groupbuy_quota instanceof \think\Collection || $current_groupbuy_quota instanceof \think\Paginator ) && $current_groupbuy_quota->isEmpty()))): ?>
    <strong><?php echo \think\Lang::get('set_expiration_time'); ?><?php echo \think\Lang::get('ds_colon'); ?></strong><strong
        style="color: #F00;"><?php echo date("Y-m-d H:i:s",$current_groupbuy_quota['groupbuyquota_endtime']); ?></strong>
    <?php else: ?>
    <strong><?php echo \think\Lang::get('please_buy_package_first'); ?></strong>
    <?php endif; ?>
    <ul class="mt5">
        <li><?php echo \think\Lang::get('package_instructions1'); ?></li>
        <li><?php echo \think\Lang::get('package_instructions2'); ?></li>
        <li><?php echo \think\Lang::get('package_instructions3'); ?></li>
        <li>4、<strong style="color: red"><?php echo \think\Lang::get('package_instructions4'); ?></strong></li>
    </ul>
</div>
<?php endif; ?>
<form method="get">
    <table class="search-form">
        <tr>
            <td>&nbsp;</td>
            <th><?php echo \think\Lang::get('snap_type'); ?></th>
            <td class="w100">
                <select name="groupbuy_vr" class="w90">
                    <option value=""><?php echo \think\Lang::get('ds_all'); ?></option>
                    <option value="0" <?php if(\think\Request::instance()->get('groupbuy_vr')=='0'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('online_rob'); ?></option>
                    <option value="1" <?php if(\think\Request::instance()->get('groupbuy_vr')=='1'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('virtual_rob'); ?></option>
                </select>
            </td>
            <th><?php echo \think\Lang::get('groupbuy_index_activity_state'); ?></th>
            <td class="w100"><select name="groupbuy_state" class="w90">
                    <?php if(!(empty($groupbuy_state_array) || (($groupbuy_state_array instanceof \think\Collection || $groupbuy_state_array instanceof \think\Paginator ) && $groupbuy_state_array->isEmpty()))): if(is_array($groupbuy_state_array) || $groupbuy_state_array instanceof \think\Collection || $groupbuy_state_array instanceof \think\Paginator): if( count($groupbuy_state_array)==0 ) : echo "" ;else: foreach($groupbuy_state_array as $key=>$val): ?>
                    <option value="<?php echo $key; ?>" <?php if($key== \think\Request::instance()->get('groupbuy_state')): ?>selected<?php endif; ?>><?php echo $val; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </select></td>
            <th><?php echo \think\Lang::get('group_name'); ?></th>
            <td class="w160">
                <input class="text" type="text" name="groupbuy_name" value="<?php echo \think\Request::instance()->get('groupbuy_name'); ?>"/>
            </td>
            <td class="w70 tc">
                <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_search'); ?>"/>
            </td>
        </tr>
    </table>
</form>
<table class="dssc-default-table">
    <thead>
        <tr>
            <th class="w10"></th>
            <th class="w50"></th>
            <th class="tl"><?php echo \think\Lang::get('group_name'); ?></th>
            <th class="w130"><?php echo \think\Lang::get('start_time'); ?></th>
            <th class="w130"><?php echo \think\Lang::get('end_time'); ?></th>
            <th class="w90"><?php echo \think\Lang::get('browse_number'); ?></th>
            <th class="w90"><?php echo \think\Lang::get('text_buy'); ?></th>
            <th class="w110"><?php echo \think\Lang::get('groupbuy_index_activity_state'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(!(empty($group) || (($group instanceof \think\Collection || $group instanceof \think\Paginator ) && $group->isEmpty()))): if(is_array($group) || $group instanceof \think\Collection || $group instanceof \think\Paginator): if( count($group)==0 ) : echo "" ;else: foreach($group as $key=>$group): ?>
        <tr class="bd-line">
            <td></td>
            <td>
                <div class="pic-thumb"><a href="<?php echo $group['groupbuy_url']; ?>" target="_blank"><img src="<?php echo groupbuy_thumb($group['groupbuy_image'],'small'); ?>"/></a></div>
            </td>
            <td class="tl">
                <dl class="goods-name">
                    <dt>
                        <?php if($group['groupbuy_is_vr']): ?>
                        <span title="<?php echo \think\Lang::get('virtual_exchange'); ?>" class="type-virtual"><?php echo \think\Lang::get('virtual_rob'); ?></span>
                        <?php endif; ?>
                        <a target="_blank" href="<?php echo $group['groupbuy_url']; ?>"><?php echo $group['groupbuy_name']; ?></a>
                    </dt>
                </dl>
            </td>
            <td><?php echo $group['start_time_text']; ?></td>
            <td><?php echo $group['end_time_text']; ?></td>
            <td><?php echo $group['groupbuy_views']; ?></td>
            <td><?php echo $group['groupbuy_buy_quantity']; ?></td>
            <td><?php echo $group['groupbuy_state_text']; ?></td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr>
            <td colspan="20" class="norecord">
                <div class="warning-option"><i class="iconfont">&#xe64c;</i><span><?php echo \think\Lang::get('no_record'); ?></span></div>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="20">
                <div class="pagination"><?php echo $show_page; ?></div>
            </td>
        </tr>
    </tfoot>
</table>



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

