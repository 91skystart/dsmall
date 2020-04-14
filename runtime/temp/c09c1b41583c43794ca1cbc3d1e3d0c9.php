<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:105:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/selleralbum/store_watermark.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
    <form method="post" enctype="multipart/form-data" action="" id="wm_form">
        <input type="hidden" name="swm_text_angle" value="0" />
        <dl>
            <dt><?php echo \think\Lang::get('store_watermark_pic'); ?></dt>
            <dd>
                <?php if(!(empty($store_wm_info['swm_image_name']) || (($store_wm_info['swm_image_name'] instanceof \think\Collection || $store_wm_info['swm_image_name'] instanceof \think\Paginator ) && $store_wm_info['swm_image_name']->isEmpty()))): ?>
                <div class="dssc-upload-thumb watermark-pic">
                    <p><img src="<?php echo BASE_SITE_ROOT; ?>/uploads/home/watermark/<?php echo $store_wm_info['swm_image_name']; ?>" id="imgView"/></p>
                    <a href="javascript:void(0);" id="del_image" title="<?php echo \think\Lang::get('store_watermark_del_pic'); ?>">X</a>
                    <input type="hidden" id="is_del_image" name="is_del_image" value=""/>
                </div>
                <?php else: ?>
                <div class="dssc-upload-thumb watermark-pic"><p><i class="iconfont">&#xe72a;</i></p></div>
                <?php endif; ?>
                <div class="dssc-upload-btn">
                    <a href="javascript:void(0);">
                        <span>
                            <input type="file" hidefocus="true" size="1" class="input-file" name="image" id="image" ds_type="logo"/>
                        </span>
                        <p><i class="iconfont">&#xe733;</i><?php echo \think\Lang::get('store_image_upload'); ?></p>
                    </a>
                </div>
                <p class="hint"><?php echo \think\Lang::get('store_watermark_choose_pic'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('swm_image_transition'); ?></dt>
            <dd>
                <input id="swm_image_transition" class="text w40"  type="text" name="swm_image_transition" value="<?php echo $store_wm_info['swm_image_transition']; ?>"/><em class="add-on">%</em>
                <p class="hint"><?php echo \think\Lang::get('swm_image_choose_transition'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_watermark_pic_pos'); ?></dt>
            <dd>
                <ul class="dssc-watermark-pos" id="wm_image_pos">
                    <li>
                        <input type="radio" name="swm_image_pos" value="1" <?php if($store_wm_info['swm_image_pos']==1): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos1'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_image_pos" value="2" <?php if($store_wm_info['swm_image_pos']==2): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos2'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_image_pos" value="3" <?php if($store_wm_info['swm_image_pos']==3): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos3'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_image_pos" value="4" <?php if($store_wm_info['swm_image_pos']==4): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos4'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_image_pos" value="5" <?php if($store_wm_info['swm_image_pos']==5): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos5'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_image_pos" value="6" <?php if($store_wm_info['swm_image_pos']==6): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos6'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_image_pos" value="7" <?php if($store_wm_info['swm_image_pos']==7): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos7'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_image_pos" value="8" <?php if($store_wm_info['swm_image_pos']==8): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos8'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_image_pos" value="9" <?php if($store_wm_info['swm_image_pos']==9): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_pic_pos9'); ?></label>
                    </li>
                </ul>
                <p class="hint"><?php echo \think\Lang::get('store_watermark_choose_pos'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_watermark_pic_quality'); ?></dt>
            <dd>
                <p>
                    <input id="swm_quality" class="text w40"  type="text" name="swm_quality" value="<?php echo $store_wm_info['swm_quality']; ?>"/><em class="add-on">%</em>
                </p>
                <p class="hint"><?php echo \think\Lang::get('store_watermark_pic_quality_max'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_watermark_text'); ?></dt>
            <dd>
                <p>
                    <textarea name="swm_text" class="textarea w180" ><?php echo $store_wm_info['swm_text']; ?></textarea>
                </p>
                <p class="hint"><?php echo \think\Lang::get('store_watermark_text_notice'); ?>,<?php echo \think\Lang::get('store_letters_numbers_recommended'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_watermark_text_size'); ?></dt>
            <dd><input id="swm_text_size" class="text w40"  type="text" name="swm_text_size" value="<?php echo $store_wm_info['swm_text_size']; ?>"/><em class="add-on">px</em>
                <p class="hint"><?php echo \think\Lang::get('store_watermark_text_size_notice'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_watermark_text_color'); ?></dt>
            <dd>
                <div class="w160 clearfix">
                    <input id="swm_text_color"  class="text w100"  type="text"  name="swm_text_color" value="<?php echo (isset($store_wm_info['swm_text_color']) && ($store_wm_info['swm_text_color'] !== '')?$store_wm_info['swm_text_color']:'#CCCCCC'); ?>"/>
                </div>
                <div id="colorpanel"></div>
                <p class="hint"><?php echo \think\Lang::get('store_watermark_text_color_notice'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_watermark_text_font'); ?></dt>
            <dd>
                <p>
                    <select name="swm_text_font" class="w80">
                        <?php if(is_array($file_list) || $file_list instanceof \think\Collection || $file_list instanceof \think\Paginator): if( count($file_list)==0 ) : echo "" ;else: foreach($file_list as $key=>$value): ?>
                        <option value="<?php echo $key; ?>" <?php if($store_wm_info['swm_text_font'] == $key): ?>selected="selected"<?php endif; ?>><?php echo $value; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </p>
                <p class="hint"><?php echo \think\Lang::get('store_watermark_text_font_notice'); ?>,<?php echo \think\Lang::get('store_installed_chinese_font'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('store_watermark_text_pos'); ?></dt>
            <dd>
                <ul class="dssc-watermark-pos" id="swm_text_pos">

                    <li>
                        <input type="radio" name="swm_text_pos" value="1" <?php if($store_wm_info['swm_text_pos']==1): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos1'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_text_pos" value="2" <?php if($store_wm_info['swm_text_pos']==2): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos2'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_text_pos" value="3" <?php if($store_wm_info['swm_text_pos']==3): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos3'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_text_pos" value="4" <?php if($store_wm_info['swm_text_pos']==4): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos4'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_text_pos" value="5" <?php if($store_wm_info['swm_text_pos']==5): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos5'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_text_pos" value="6" <?php if($store_wm_info['swm_text_pos']==6): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos6'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_text_pos" value="7" <?php if($store_wm_info['swm_text_pos']==7): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos7'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_text_pos" value="8" <?php if($store_wm_info['swm_text_pos']==8): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos8'); ?></label>
                    </li>
                    <li>
                        <input type="radio" name="swm_text_pos" value="9" <?php if($store_wm_info['swm_text_pos']==9): ?>checked<?php endif; ?>/>
                               <label><?php echo \think\Lang::get('store_watermark_text_pos9'); ?></label>
                    </li>
                </ul>
            </dd>
        </dl>
        <div class="bottom">
            <input type="submit" class="submit" value="<?php echo \think\Lang::get('store_watermark_submit'); ?>" />
        </div>
    </form>
</div>
<style type="text/css">
            .evo-color div { font-size: 12px; line-height: normal;}
            .evo-color span { font-size: 12px !important; line-height: normal !important;}
</style>
        <link href="<?php echo PLUGINS_SITE_ROOT; ?>/colorpicker/evol.colorpicker.css" rel="stylesheet" type="text/css">
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/colorpicker/evol.colorpicker.min.js"></script>
        <script>
            $(function () {
                $("div").cssRadio();
                $('#swm_text_color').colorpicker({showOn: 'both'});
                $('#swm_text_color').parent().css("width", '');
                $('#swm_text_color').parent().addClass("color");
                
                $('#del_image').click(function () {
                    var result = confirm('<?php echo \think\Lang::get('store_watermark_del_pic_confirm'); ?>');
                    if (result)
                    {
                        $('#image').css('display', 'none');
                        $('#del_image').css('display', 'none');
                        $('#is_del_image').val('ok');
                        $('#wm_form').submit();
                    }
                });
                $('#wm_form').validate({
                    errorPlacement: function(error, element){
                        var error_td = element.parents('dd');
                        error_td.append(error);
                    },
                    submitHandler: function (form) {
                        $('#wm_form').submit();
                    },
                    rules: {
                        swm_image_transition: {
                            required: true,
                            min:0,
                            max:100,
                            number: true
                        },
                        swm_quality: {
                            required: true,
                            min:0,
                            max:100,
                            number: true
                        },
                        swm_text_size: {
                            required: true,
                            number: true
                        },
                        swm_text_color: {
                            required: true,
                            maxlength: 7
                        }
                    },
                    messages: {
                        swm_image_transition: {
                            required: '<?php echo \think\Lang::get('store_watermark_transition_null'); ?>',
                            min: '<?php echo \think\Lang::get('store_watermark_transition_min'); ?>',
                            max: '<?php echo \think\Lang::get('store_watermark_transition_max'); ?>',
                            number: '<?php echo \think\Lang::get('store_watermark_transition_number'); ?>',
                        },
                        swm_quality: {
                            required: '<?php echo \think\Lang::get('store_watermark_pic_quality_null'); ?>',
                            min: '<?php echo \think\Lang::get('store_watermark_pic_quality_min'); ?>',
                            max: '<?php echo \think\Lang::get('store_watermark_pic_quality_max'); ?>',
                            number: '<?php echo \think\Lang::get('store_watermark_pic_quality_number'); ?>',
                        },
                        swm_text_size: {
                            required: '<?php echo \think\Lang::get('store_watermark_text_size_null'); ?>',
                            number: '<?php echo \think\Lang::get('store_watermark_text_size_number'); ?>'
                        },
                        swm_text_color: {
                            required: '<?php echo \think\Lang::get('store_watermark_text_color_null'); ?>',
                            maxlength: '<?php echo \think\Lang::get('store_watermark_text_color_max'); ?>'
                        }
                    }
                });
            });

            jQuery.fn.cssRadio = function () {
                $(":input[type=radio] + label").each(function () {
                    if ($(this).prev()[0].checked)
                        $(this).addClass("checked");
                }).hover(
                        function () {
                            $(this).addClass("over");
                        },
                        function () {
                            $(this).removeClass("over");
                        }
                ).click(function () {
                    var contents = $(this).parent().parent(); /*多组控制 关键*/
                    $(":input[type=radio] + label", contents).each(function () {
                        $(this).prev()[0].checked = false;
                        $(this).removeClass("checked");
                    });
                    $(this).prev()[0].checked = true;
                    $(this).addClass("checked");
                }).prev().hide();
            };
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

