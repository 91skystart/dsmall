<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:98:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellercomplain/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
            
 <form method="get" action="">
            <table class="search-form">
                <tr>
                    <td>&nbsp;</td>
                    <th><?php echo \think\Lang::get('complain_datetime'); ?></th>
                    <td class="w240"><input name="add_time_from" id="add_time_from" type="text" class="text w70" value="<?php echo \think\Request::instance()->get('add_time_from'); ?>" /><label class="add-on"><i class="iconfont">&#xe8d6;</i></label> &#8211; <input name="add_time_to" id="add_time_to" type="text" class="text w70" value="<?php echo \think\Request::instance()->get('add_time_to'); ?>" /><label class="add-on"><i class="iconfont">&#xe8d6;</i></label></td>
                    <th class="w60"><?php echo \think\Lang::get('processing_status'); ?></th>
                    <td class="w80"><select name="state">
                        <option value="" <?php if(\think\Request::instance()->get('state') == ''): ?>selected<?php endif; ?>><?php echo \think\Lang::get('ds_all'); ?></option>
                        <option value="1" <?php if(\think\Request::instance()->get('state') == '1'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('complain_state_inprogress'); ?></option>
                        <option value="2" <?php if(\think\Request::instance()->get('state') == '2'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('complain_state_finish'); ?></option>
                    </select></td>
                    <td class="w70 tc">
                        <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_search'); ?>" />
                    </td>
                </tr>
            </table>
        </form>
<table class="dssc-default-table">
    <thead>
        <tr>
            <th class="w10"></th>
            <th class="w80 tl"><?php echo \think\Lang::get('complaint_number'); ?></th>
            <th class="tl" colspan="2"><?php echo \think\Lang::get('complaint_goods'); ?></th>
            <th class="tl"><?php echo \think\Lang::get('complain_subject_content'); ?></th>
            <th class="w160"><?php echo \think\Lang::get('complain_datetime'); ?></th>
            <th class="w80"><?php echo \think\Lang::get('complain_state'); ?></th>
            <th class="w100"><?php echo \think\Lang::get('ds_handle'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if($complain_list): if(is_array($complain_list) || $complain_list instanceof \think\Collection || $complain_list instanceof \think\Paginator): if( count($complain_list)==0 ) : echo "" ;else: foreach($complain_list as $key=>$val): $goods = $goods_list[$val['order_goods_id']]; ?>
        <tr class="bd-line">
            <td></td>
            <td class="tl"><?php echo $val['complain_id']; ?></td>
            <td class="w50"><div class="pic-thumb"><a target="_blank" href="<?php echo url('Goods/index',['goods_id'=>$goods['goods_id']]); ?>"><img src="<?php echo goods_thumb($goods, 240); ?>" /></a></div></td>
            <td class="tl"><dl class="goods-name">
                    <dt><a target="_blank" href="<?php echo url('Goods/index',['goods_id'=>$goods['goods_id']]); ?>"><?php echo $goods['goods_name']; ?></a></dt>
                    <dd><?php echo \think\Lang::get('complain_accuser'); ?>：<?php echo $val['accuser_name']; ?></dd>
                </dl></td>
            <td class="tl"><?php echo $val['complain_subject_content']; ?></td>
            <td class="goods-time"><?php echo date("Y-m-d H:i:s",$val['complain_datetime']); ?></td>
            <td>
                <?php if($val['complain_state'] == '10'): ?><?php echo \think\Lang::get('complain_state_new'); elseif($val['complain_state'] == '20'): ?><?php echo \think\Lang::get('complain_state_appeal'); elseif($val['complain_state'] == '30'): ?><?php echo \think\Lang::get('complain_state_talk'); elseif($val['complain_state'] == '40'): ?><?php echo \think\Lang::get('complain_state_handle'); elseif($val['complain_state'] == '99'): ?><?php echo \think\Lang::get('complain_state_finish'); endif; ?>
            </td>
            <td class="dscs-table-handle"><span><a href="<?php echo url('Sellercomplain/complain_show',['complain_id'=>$val['complain_id']]); ?>" class="btn-orange"><i class="iconfont">&#xe70b;</i>
                        <p><?php echo \think\Lang::get('complain_text_detail'); ?></p>
                    </a></span>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr>
            <td colspan="20" class="norecord"><div class="warning-option"><i class="iconfont">&#xe64c;</i><span><?php echo \think\Lang::get('no_record'); ?></span></div></td>
        </tr>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <?php if($complain_list): ?>
        <tr>
            <td colspan="20"><div class="pagination"><?php echo $show_page; ?></div></td>
        </tr>
        <?php endif; ?>
    </tfoot>
</table>

<script>
    $(function(){
        $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd'});
        $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd'});
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

