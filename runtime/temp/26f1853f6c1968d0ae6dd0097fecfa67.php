<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:101:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellerinviter/goods_add.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
            
<div class="dssc-form-default">
    <form id="add_form" method="post">
        <?php if($inviter_return > 0): ?>
        <div class="alert alert-block mt10">
            <ul class="mt5">
                <li><?php echo \think\Lang::get('inviter_add_tip'); ?></li>
            </ul>
        </div>
        <?php endif; if(empty($goods_info) || (($goods_info instanceof \think\Collection || $goods_info instanceof \think\Paginator ) && $goods_info->isEmpty())): ?>
            <dl>
                <dt><i class="required">*</i><?php echo \think\Lang::get('inviter_goods'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                <dd>
                    <div dstype="inviter_goods_info" class="selected-group-goods " style="display:none;">
                        <div class="goods-thumb"><img id="inviter_goods_image" src=""/></div>
                        <div class="goods-name">
                            <a dstype="inviter_goods_href" id="inviter_goods_name" href="" target="_blank"></a>
                        </div>
                        <div class="goods-price"><?php echo \think\Lang::get('mall_price'); ?>：￥<span dstype="inviter_goods_price"></span></div>
                    </div>
                    <a href="javascript:void(0);" id="btn_show_search_goods" class="dssc-btn dssc-btn-acidblue"><?php echo \think\Lang::get('choose_goods'); ?></a>
                    <input id="inviter_goods_commonid" name="inviter_goods_commonid" type="hidden" />
                    <span></span>
                    <div id="div_search_goods" class="div-goods-select mt10" style="display: none;">
                        <table class="search-form">
                            <tr>
                                <th class="w150">
                                    <strong><?php echo \think\Lang::get('search_store_items'); ?></strong>
                                </th>
                                <td class="w160">
                                    <input id="search_goods_name" type="text w150" class="text" name="goods_name" value=""/>
                                </td>
                                <td class="w70 tc">
                                    <a href="javascript:void(0);" id="btn_search_goods" class="dssc-btn"/><i class="iconfont">&#xe718;</i><?php echo \think\Lang::get('ds_search'); ?></a></td>
                                <td class="w10"></td>
                                <td>
                                    <p class="hint"></p>
                                </td>
                            </tr>
                        </table>
                        <div id="div_goods_search_result" class="search-result" style="width:739px;"></div>
                        <a id="btn_hide_search_goods" class="close" href="javascript:void(0);">X</a>
                    </div>
                    <p class="hint"></p>
                </dd>
            </dl>
            <?php else: ?>
            <dl>
                <dt><?php echo \think\Lang::get('inviter_goods'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                <dd>
                    <?php echo $goods_info['goods_name']; ?>
                    <input id="inviter_goods_commonid" name="inviter_goods_commonid" type="hidden" value="<?php echo $goods_info['goods_commonid']; ?>" />
                </dd>
            </dl>
            <?php endif; ?>
            
            <dl>
                <dt><i class="required">*</i><?php echo \think\Lang::get('inviter_ratio_1'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                <dd>
                    <input id="inviter_ratio_1" name="inviter_ratio_1" type="text" class="text w130" value="<?php echo (isset($goods_info['inviter_ratio_1']) && ($goods_info['inviter_ratio_1'] !== '')?$goods_info['inviter_ratio_1']:''); ?>"/><?php echo \think\Lang::get('ds_percent'); ?><span></span>
                    <p class="hint"><?php echo \think\Lang::get('cannot_exceed'); ?><?php echo $config_inviter_ratio_1; ?><?php echo \think\Lang::get('ds_percent'); ?></p>
                </dd>
            </dl>
            <dl>
                <dt><i class="required">*</i><?php echo \think\Lang::get('inviter_ratio_2'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                <dd>
                    <input id="inviter_ratio_2" name="inviter_ratio_2" type="text" class="text w130" value="<?php echo (isset($goods_info['inviter_ratio_2']) && ($goods_info['inviter_ratio_2'] !== '')?$goods_info['inviter_ratio_2']:''); ?>"/><?php echo \think\Lang::get('ds_percent'); ?><span></span>
                    <p class="hint"><?php echo \think\Lang::get('cannot_exceed'); ?><?php echo $config_inviter_ratio_2; ?><?php echo \think\Lang::get('ds_percent'); ?></p>
                </dd>
            </dl>
            <dl>
                <dt><i class="required">*</i><?php echo \think\Lang::get('inviter_ratio_3'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                <dd>
                    <input id="inviter_ratio_3" name="inviter_ratio_3" type="text" class="text w130" value="<?php echo (isset($goods_info['inviter_ratio_3']) && ($goods_info['inviter_ratio_3'] !== '')?$goods_info['inviter_ratio_3']:''); ?>"/><?php echo \think\Lang::get('ds_percent'); ?><span></span>
                    <p class="hint"><?php echo \think\Lang::get('cannot_exceed'); ?><?php echo $config_inviter_ratio_3; ?><?php echo \think\Lang::get('ds_percent'); ?></p>
                </dd>
            </dl>

            <div class="bottom">
                <input id="submit_button" type="submit" class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>">
            </div>
        </form>
</div>
<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui-timepicker/jquery-ui-timepicker-addon.min.css">
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui-timepicker/jquery-ui-timepicker-addon.min.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui-timepicker/i18n/jquery-ui-timepicker-zh-CN.js"></script>
<script>
    $(function () {
        
        $('#btn_show_search_goods').on('click', function() {
            $('#div_search_goods').show();
        });

        $('#btn_hide_search_goods').on('click', function() {
            $('#div_search_goods').hide();
        });
        //搜索商品
        $('#btn_search_goods').on('click', function() {
            var url = "<?php echo url('Sellerinviter/search_goods'); ?>";
             var  datas  =  $.param({goods_name: $('#search_goods_name').val()});
            $('#div_goods_search_result').load(url,datas);
        });

        $('#div_goods_search_result').on('click', '.pagination li a', function() {
            $('#div_goods_search_result').load($(this).attr('href'));
            return false;
        });

        //选择商品
        $('#div_goods_search_result').on('click', '[dstype="btn_add_inviter_goods"]', function() {
            var goods_commonid = $(this).attr('data-goods-commonid');
            $.get("<?php echo url('Sellerinviter/inviter_goods_info'); ?>", {goods_commonid: goods_commonid}, function(data) {
                if(data.result) {
                    $('#inviter_goods_commonid').val(data.goods_commonid);
                    $('#inviter_goods_image').attr('src', data.goods_image);
                    $('#inviter_goods_name').text(data.goods_name);
                    $('[dstype="inviter_goods_price"]').text(data.goods_price);
                    $('[dstype="inviter_goods_href"]').attr('href', data.goods_href);
                    $('[dstype="inviter_goods_info"]').show();
                    $('#div_search_goods').hide();
                } else {
                    layer.msg(data.message);
                }
            }, 'json');
        });
        
    <?php if(empty($goods_info) || (($goods_info instanceof \think\Collection || $goods_info instanceof \think\Paginator ) && $goods_info->isEmpty())): ?>
    $('#start_time').datetimepicker({dateFormat: 'yy-mm-dd'});
    $('#end_time').datetimepicker({dateFormat: 'yy-mm-dd'});
    <?php endif; ?>
        
        jQuery.validator.methods.greaterThanDate = function(value, element, param) {
            var date1 = new Date(Date.parse(param.replace(/-/g, "/")));
            var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
            return date1 < date2;
        };

        jQuery.validator.methods.lessThanDate = function(value, element, param) {
            var date1 = new Date(Date.parse(param.replace(/-/g, "/")));
            var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
            return date1 > date2;
        };

        jQuery.validator.methods.greaterThanStartDate = function(value, element) {
            var start_date = $("#start_time").val();
            var date1 = new Date(Date.parse(start_date.replace(/-/g, "/")));
            var date2 = new Date(Date.parse(value.replace(/-/g, "/")));
            return date1 < date2;
        };

        jQuery.validator.methods.lessThanGoodsPrice= function(value, element) {
            var goods_price = $("#input_groupbuy_goods_price").val();
            return Number(value) < Number(goods_price);
        };
        
    //页面输入内容验证
    $("#add_form").validate({
            errorPlacement: function (error, element) {
                var error_td = element.parent('dd').children('span');
                error_td.append(error);
            },
            onfocusout: false,
            submitHandler: function (form) {
                ds_ajaxpost('add_form', 'url', "<?php echo url('Sellerinviter/goods_list'); ?>");
            },
                rules: {
                    inviter_goods_commonid: {
                        required: true
                    },
                    inviter_ratio_1: {
                        required: true,
                        number:true,
                        max : <?php echo $config_inviter_ratio_1; ?>
                    },
                    inviter_ratio_2: {
                        required: true,
                        number:true,
                        max : <?php echo $config_inviter_ratio_2; ?>
                    },
                    inviter_ratio_3: {
                        required: true,
                        number:true,
                        max : <?php echo $config_inviter_ratio_3; ?>
                    },
                },
                messages : {
                    inviter_goods_commonid : {
                        required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_goods_commonid_required'); ?>'
                    },
                    inviter_ratio_1: {
                        required: '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_1_required'); ?>',
                        number:'<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_1_number'); ?>',
                        max : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_1_max'); ?><?php echo $config_inviter_ratio_1; ?><?php echo \think\Lang::get('ds_percent'); ?>'
                    },
                    inviter_ratio_2: {
                        required: '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_2_required'); ?>',
                        number:'<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_2_number'); ?>',
                        max : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_2_max'); ?><?php echo $config_inviter_ratio_2; ?><?php echo \think\Lang::get('ds_percent'); ?>'
                    },
                    inviter_ratio_3: {
                        required: '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_3_required'); ?>',
                        number:'<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_3_number'); ?>',
                        max : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('inviter_ratio_3_max'); ?><?php echo $config_inviter_ratio_3; ?><?php echo \think\Lang::get('ds_percent'); ?>'
                    },
            }
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

