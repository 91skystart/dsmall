<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:99:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellersetting/setting.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
    <form method="post" enctype="multipart/form-data" id="my_store_form" >
        <dl>
            <dt><?php echo \think\Lang::get('store_setting_grade'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <p><?php echo $store_grade['storegrade_name']; ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_name'); ?>：</dt>
            <dd>
                <input type="text" value="<?php echo $store_info['store_name']; ?>" name="store_name" class="text w400">
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_setting_store_zy'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <textarea name="store_mainbusiness" rows="2" class="textarea w400"  maxlength="50" ><?php echo $store_info['store_mainbusiness']; ?></textarea>
                <p class="hint"><?php echo \think\Lang::get('store_create_store_zy_hint'); ?></p>
            </dd>
        </dl>

        <dl>
            <dt><?php echo \think\Lang::get('store_qr_code'); ?>：</dt>
            <dd>
                <p><img src="<?php echo store_qrcode($store_info['store_id']); ?>"  title="<?php echo \think\Lang::get('place_origin'); ?><?php echo url('Store/goods_all',['store_id'=>$store_info['store_id']]); ?>"></p>
                <p class="hint"><?php echo \think\Lang::get('generate_new_qr_code'); ?></p>
            </dd>
        </dl>
        <?php if($miniprogram_code!=''): ?>
        <dl>
            <dt><?php echo \think\Lang::get('store_code'); ?>：</dt>
            <dd>
                <p><img src="<?php echo $miniprogram_code; ?>" width="148"></p>
                <p class="hint"><?php echo \think\Lang::get('generate_new_applet'); ?></p>
            </dd>
        </dl>
        <?php endif; ?>

        <dl>
            <dt><?php echo \think\Lang::get('store_setting_change_label'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <div class="dssc-upload-thumb store-logo">
                    <p>
                        <img src="<?php if(!(empty($store_info['store_logo']) || (($store_info['store_logo'] instanceof \think\Collection || $store_info['store_logo'] instanceof \think\Paginator ) && $store_info['store_logo']->isEmpty()))): ?><?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_STORE; ?>/<?php echo \think\Session::get('store_id'); ?>/<?php echo $store_info['store_logo']; endif; ?>" id="img_store_logo" />
                    </p>
                </div>
                <div class="dssc-upload-btn"> 
                    <a href="javascript:void(0);">
                        <span><input type="file" hidefocus="true" size="1" class="input-file" name="store_logo" id="store_logo" /></span>
                        <p><i class="iconfont">&#xe733;</i><?php echo \think\Lang::get('image_upload'); ?></p>
                    </a>
                </div>
                <p class="hint"><?php echo \think\Lang::get('store_setting_label_tip'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_setting_change_banner'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <div class="dssc-upload-thumb store-banner">
                    <p>
                        <img src="<?php if(!(empty($store_info['store_banner']) || (($store_info['store_banner'] instanceof \think\Collection || $store_info['store_banner'] instanceof \think\Paginator ) && $store_info['store_banner']->isEmpty()))): ?><?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_STORE; ?>/<?php echo \think\Session::get('store_id'); ?>/<?php echo $store_info['store_banner']; endif; ?>" id="img_store_banner" />
                    </p>
                </div>
                <div class="dssc-upload-btn"> <a href="javascript:void(0);"><span>
                            <input type="file" hidefocus="true" size="1" class="input-file" name="store_banner" id="store_banner" />
                        </span>
                        <p><i class="iconfont">&#xe733;</i><?php echo \think\Lang::get('image_upload'); ?></p>
                    </a> </div>
                <p class="hint"><?php echo \think\Lang::get('store_setting_banner_tip'); ?></p>
            </dd>
        </dl>

        <dl>
            <dt><?php echo \think\Lang::get('store_setting_change_avatar'); ?><?php echo \think\Lang::get('ds_colon'); ?> </dt>
            <dd>
                <div class="dssc-upload-thumb store-avatar">
                    <p>
                        <img src="<?php if(!(empty($store_info['store_avatar']) || (($store_info['store_avatar'] instanceof \think\Collection || $store_info['store_avatar'] instanceof \think\Paginator ) && $store_info['store_avatar']->isEmpty()))): ?><?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_STORE; ?>/<?php echo \think\Session::get('store_id'); ?>/<?php echo $store_info['store_avatar']; endif; ?>" id="img_store_avatar" />
                    </p>
                </div>
                <div class="dssc-upload-btn"> 
                    <a href="javascript:void(0);">
                        <span><input type="file" hidefocus="true" size="1" class="input-file" name="store_avatar" id="store_avatar" /></span>
                        <p><i class="iconfont">&#xe733;</i><?php echo \think\Lang::get('image_upload'); ?></p>
                    </a>
                </div>
                <p class="hint"><?php echo \think\Lang::get('store_setting_sign_tip'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt>QQ<?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w200 text" name="store_qq" type="text"  id="store_qq" value="<?php echo $store_info['store_qq']; ?>" />
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_setting_wangwang'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="text w200" name="store_ww" type="text"  id="store_ww" value="<?php echo $store_info['store_ww']; ?>" />
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_phone'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="text w200" name="store_phone" maxlength="20" type="text"  id="store_phone" value="<?php echo $store_info['store_phone']; ?>" />
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_setting_seo_keywords'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <p>
                    <input class="text w400" name="seo_keywords" type="text"  value="<?php echo $store_info['store_keywords']; ?>" />
                </p>
                <p class="hint"><?php echo \think\Lang::get('store_setting_seo_keywords_help'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_setting_seo_description'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <p>
                    <textarea name="seo_description" rows="3" class="textarea w400" id="remark_input" ><?php echo $store_info['store_description']; ?></textarea>
                </p>
                <p class="hint"><?php echo \think\Lang::get('store_setting_seo_description_help'); ?></p>
            </dd>
        </dl>
        <div class="bottom">
            <input type="submit" class="submit" value="<?php echo \think\Lang::get('store_goods_class_submit'); ?>" />
        </div>
    </form>
</div>

<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/ajaxfileupload.js"></script> 
<script>

    $(function () {
        var url = '<?php echo url("Sellersetting/store_image_upload"); ?>';
        $('#my_store_form').find('input[type="file"]').unbind().change(function () {
            var id = $(this).attr('id');
            ajaxFileUpload(url, id);
        });
    });

    function ajaxFileUpload(url, id)
    {
        $(document).off('change', "#store_banner").on('change', function () {
            $.ajaxFileUpload({
                url: url,
                secureuri: false,
                fileElementId: id,
                dataType: 'json',
                data: {id: id},
                success: function (data)
                {
                    if (data.error) {
                        alert(data.error);
                    } else {
                        $("#img_" + id).attr('src', data.file_path);
                    }
                },
                error: function (data, status, e)
                {
                    console.error(data);
                }
            })
            return false;
        });
    }
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

