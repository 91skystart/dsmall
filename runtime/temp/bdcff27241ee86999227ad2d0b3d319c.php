<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:102:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellerinviter/goods_list.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
        
<a class="dssc-btn dssc-btn-green" href="<?php echo url('Sellerinviter/goods_add'); ?>"><i class="iconfont">&#xe6db;</i><?php echo \think\Lang::get('goods_add'); ?></a>



        </div>
        <div style="padding: 20px;">
            <?php if(isset($store_closed) && $store_closed): ?>
            <div class="alert mt10"> <strong><?php echo \think\Lang::get('store_closed_reason'); ?>：<?php echo $store_closed; ?>。</strong> <?php echo \think\Lang::get('please_contact_admin'); ?>!</div>
            <?php endif; ?>
            

<div class="alert alert-block mt10">
    <ul>
        <li><?php echo \think\Lang::get('sellerinviter_notice_1'); ?></li>
        <li><?php echo \think\Lang::get('sellerinviter_notice_2'); ?></li>
        <?php if(isset($isPlatformStore)): else: ?>
        <li><?php echo \think\Lang::get('sellerinviter_notice_3'); ?></li>
        <?php endif; ?>
    </ul>
</div>

<form method="get">
    <table class="search-form">
        <tr>
            <td>&nbsp;</td>
            <th class="w110"><?php echo \think\Lang::get('goods_name'); ?></th>
            <td class="w160"><input type="text" class="text w150" name="goods_name" value="<?php echo \think\Request::instance()->get('goods_name'); ?>"/></td>
            <td class="w70 tc">
                <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_search'); ?>"/>
            </td>
        </tr>
    </table>
</form>
<table class="dssc-default-table">
    <thead>
        <tr>
            <th class="w80"></th>
            <th class=""><?php echo \think\Lang::get('goods_name'); ?></th>
            <th class="w180"><?php echo \think\Lang::get('inviter_ratio'); ?></th>
            <th class="w80"><?php echo \think\Lang::get('goods_price'); ?></th>
            <th class="w80"><?php echo \think\Lang::get('inviter_total_quantity'); ?></th>
            <th class="w100"><?php echo \think\Lang::get('inviter_total_amount'); ?></th>
            <th class="w100"><?php echo \think\Lang::get('inviter_amount'); ?></th>
            
            <th class=""><?php echo \think\Lang::get('ds_handle'); ?></th>
        </tr>
    </thead>
    <tbody id="goods_list">
        <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$val): ?>
        <tr class="bd-line">
            <td><div class="pic-thumb"><a href="<?php echo url('Goods/index',['goods_id'=>$storage_array[$val['goods_commonid']]['goods_id']]); ?>" target="_blank"><img src="<?php echo goods_thumb($val, 240); ?>"/></a></div></td>
            <td><a href="<?php echo url('Goods/index',['goods_id'=>$storage_array[$val['goods_commonid']]['goods_id']]); ?>" target="_blank"><?php echo $val['goods_name']; ?></a></td>
            <td>
            <p><?php echo \think\Lang::get('inviter_ratio_1'); ?><?php echo $val['inviter_ratio_1']; ?><?php echo \think\Lang::get('ds_percent'); ?></p>
            <p><?php echo \think\Lang::get('inviter_ratio_2'); ?><?php echo $val['inviter_ratio_2']; ?><?php echo \think\Lang::get('ds_percent'); ?></p>
            <p><?php echo \think\Lang::get('inviter_ratio_3'); ?><?php echo $val['inviter_ratio_3']; ?><?php echo \think\Lang::get('ds_percent'); ?></p>
            </td>
            <td><?php echo \think\Lang::get('currency'); ?><?php echo $val['goods_price']; ?></td>
            <td><?php echo $val['inviter_total_quantity']; ?></td>
            <td><?php echo \think\Lang::get('currency'); ?><?php echo $val['inviter_total_amount']; ?></td>
            <td><?php echo \think\Lang::get('currency'); ?><?php echo $val['inviter_amount']; ?></td>
            <td class="dscs-table-handle tr">
                <span>
                    <a href="<?php echo url('Sellerinviter/goods_edit','goods_commonid='.$val['goods_commonid']); ?>" class="btn-blue">
                        <i class="iconfont">&#xe731;</i>
                        <p><?php echo \think\Lang::get('ds_edit'); ?></p>
                    </a>
                </span>
                <span>
                    <a href="javascript:;" dstype="btn_drop_inviter_goods" data-goods-commonid=<?php echo $val['goods_commonid']; ?> class="btn-red">
                        <i class="iconfont">&#xe725;</i>
                        <p><?php echo \think\Lang::get('ds_del'); ?></p>
                    </a>
                </span>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr id="goods_list_norecord">
            <td class="norecord" colspan="8">
                <div class="warning-option"><i class="iconfont">&#xe64c;</i><span><?php echo \think\Lang::get('no_record'); ?></span>
                </div>
            </td>
        </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): ?>
        <tr>
            <td colspan="8">
                <div class="pagination"><?php echo $show_page; ?></div>
            </td>
        </tr>
        <?php endif; ?>
    </tfoot>
</table>
<form id="submit_form" action="" method="post">
    <input type="hidden" id="goods_commonid" name="goods_commonid" value="">
</form>

<script type="text/javascript">
    $(document).ready(function () {
        $('[dstype="btn_drop_inviter_goods"]').on('click', function () {
            var action = "<?php echo url('Sellerinviter/goods_del'); ?>";
            var goods_commonid = $(this).attr('data-goods-commonid');
            layer.confirm('<?php echo \think\Lang::get('ds_ensure_del'); ?>', {
                btn: ['<?php echo \think\Lang::get('ds_ok'); ?>', '<?php echo \think\Lang::get('ds_cancel'); ?>'],
                title: false,
            }, function () {
                $('#submit_form').attr('action', action);
                $('#goods_commonid').val(goods_commonid);
                ds_ajaxpost('submit_form', 'url', "<?php echo url('Sellerinviter/goods_list'); ?>", 1000);
            });
        });
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

