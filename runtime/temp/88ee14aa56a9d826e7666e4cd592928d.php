<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:100:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/selleralbum/album_cate.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
        
<a uri="<?php echo url('Selleralbum/album_add'); ?>" ds_type="dialog" dialog_title="<?php echo \think\Lang::get('album_class_add'); ?>" class="dssc-btn dssc-btn-green" style="right: 100px;">
    <i class="iconfont">&#xe728;</i><?php echo \think\Lang::get('album_class_add'); ?>
</a>

<?php if(!(empty($aclass_info) || (($aclass_info instanceof \think\Collection || $aclass_info instanceof \think\Paginator ) && $aclass_info->isEmpty()))): ?>
<a id="open_uploader" href="JavaScript:void(0);" class="dssc-btn dssc-btn-acidblue"><i class="iconfont">&#xe733;</i><?php echo \think\Lang::get('album_class_list_img_upload'); ?></a>
<div class="upload-con" id="uploader" style="display: none;">
    <form method="post" action="" id="fileupload" enctype="multipart/form-data">
        <div class="upload-con-div"><?php echo \think\Lang::get('album_class_list_sel_img_class'); ?><?php echo \think\Lang::get('ds_colon'); ?>
            <select name="category_id" id="category_id" class="select w80">
                <?php if(is_array($aclass_info) || $aclass_info instanceof \think\Collection || $aclass_info instanceof \think\Paginator): if( count($aclass_info)==0 ) : echo "" ;else: foreach($aclass_info as $key=>$v): ?>
                <option value='<?php echo $v['aclass_id']; ?>' class="w80"><?php echo $v['aclass_name']; ?></option>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </select>
        </div>
        <div class="upload-con-div"><?php echo \think\Lang::get('store_select_file'); ?>：
            <div class="dssc-upload-btn"> <a href="javascript:void(0);"><span>
                        <input type="file" hidefocus="true" size="1" class="input-file" name="file" multiple="multiple"/>
                    </span>
                    <p><i class="iconfont">&#xe733;</i><?php echo \think\Lang::get('album_class_list_img_upload'); ?></p>
                </a> </div>
        </div>
        <div dstype="file_msg"></div>
        <div class="upload-pmgressbar" dstype="file_loading"></div>
        <div class="upload-txt"><span><?php echo \think\Lang::get('album_batch_upload_description'); ?><?php echo \think\Config::get('image_max_filesize'); ?>KB<?php echo \think\Lang::get('album_batch_upload_description_1'); ?></span> </div>
    </form>
</div>
<?php endif; ?>

        </div>
        <div style="padding: 20px;">
            <?php if(isset($store_closed) && $store_closed): ?>
            <div class="alert mt10"> <strong><?php echo \think\Lang::get('store_closed_reason'); ?>：<?php echo $store_closed; ?>。</strong> <?php echo \think\Lang::get('please_contact_admin'); ?>!</div>
            <?php endif; ?>
            
<div id="pictureIndex" class="dssc-picture-folder">
        <table class="search-form">
            <tbody>
                <tr>
                    <td>&nbsp;</td>
                    <th><?php echo \think\Lang::get('album_sort'); ?></th>
                    <td class="w100">
                        <form name="select_sort" id="select_sort" class="sortord">
                            <select  name="sort" id="img_sort">
                                <option value="4" <?php if(\think\Request::instance()->param('sort') == '4'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('album_sort_desc'); ?></option>
                                <option value="5" <?php if(\think\Request::instance()->param('sort') == '5'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('album_sort_asc'); ?></option>
                                <option value="0" <?php if(\think\Request::instance()->param('sort') == '0'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('album_sort_time_desc'); ?></option>
                                <option value="1" <?php if(\think\Request::instance()->param('sort') == '1'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('album_sort_time_asc'); ?></option>
                                <option value="2" <?php if(\think\Request::instance()->param('sort') == '2'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('album_sort_class_name_desc'); ?></option>
                                <option value="3" <?php if(\think\Request::instance()->param('sort') == '3'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('album_sort_class_name_asc'); ?></option>
                            </select>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
        <?php if(!(empty($aclass_info) || (($aclass_info instanceof \think\Collection || $aclass_info instanceof \think\Paginator ) && $aclass_info->isEmpty()))): ?>
        <div class="dssc-album">
            <ul>
                <?php if(is_array($aclass_info) || $aclass_info instanceof \think\Collection || $aclass_info instanceof \think\Paginator): if( count($aclass_info)==0 ) : echo "" ;else: foreach($aclass_info as $key=>$v): ?>
                <li class="hidden">
                    <dl>
                        <dt>
                        <div class="covers">
                            <a href="<?php echo url('Selleralbum/album_pic_list',['id'=>$v['aclass_id']]); ?>">
                                <?php if($v['aclass_cover'] != ''): ?>
                                <img id="aclass_cover" src="<?php echo goods_cthumb($v['aclass_cover'], 240, session('store_id')); ?>">
                                <?php else: ?>
                                <i class="iconfont">&#xe6a2;</i>
                                <?php endif; ?>
                            </a>
                        </div>
                        <h3 class="title"><a href="<?php echo url('Selleralbum/album_pic_list',['id'=>$v['aclass_id']]); ?>"><?php echo $v['aclass_name']; ?></a></h3>
                        </dt>
                        <dd class="buttons"><span ds_type="dialog" dialog_title="<?php echo \think\Lang::get('album_class_deit'); ?>" dialog_id='album_<?php echo $v['aclass_id']; ?>' dialog_width="480" uri="<?php echo url('Selleralbum/album_edit',['id'=>$v['aclass_id']]); ?>"><a href="JavaScript:void(0);"><i class="iconfont">&#xe731;</i><?php echo \think\Lang::get('album_class_edit'); ?></a></span>
                            <?php if($v['aclass_isdefault'] != '1'): ?>
                            <a href="javascript:void(0)" onclick="ds_ajaxget_confirm('<?php echo url('Selleralbum/album_del',['id'=>$v['aclass_id']]); ?>','<?php echo \think\Lang::get('album_class_delete_confirm_message'); ?>');"><i class="iconfont">&#xe699;</i><?php echo \think\Lang::get('album_class_delete'); ?></a>
                            <?php endif; ?>
                        </dd>
                    </dl>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <?php else: ?>
        <div class="warning-option"><i class="iconfont">&#xe64c;&nbsp;</i><span><?php echo \think\Lang::get('no_record'); ?></span></div>
       <?php endif; ?>
    </div>
    <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script>
    <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script>
<script type="text/javascript">

$(function() {
    //鼠标触及区域li改变class
    $(".dssc-album ul li").hover(function() {
        $(this).addClass("hover");
    }, function() {
        $(this).removeClass("hover");
    });
    
    // ajax 上传图片
    var upload_num = 0; // 上传图片成功数量
    $('#fileupload').fileupload({
        dataType: 'json',
        url: "<?php echo url('Selleralbum/image_upload'); ?>",
        add: function (e,data) {
        	$.each(data.files, function (index, file) {
                $('<div dstype=' + file.name.replace(/\./g, '_') + '><p>'+ file.name +'</p><p class="loading"></p></div>').appendTo('div[dstype="file_loading"]');
            });
            data.submit();
        },
        done: function (e,data) {
            var param = data.result;
            $this = $('div[dstype="' + param.origin_file_name.replace(/\./g, '_') + '"]');
            $this.fadeOut(3000, function(){
                $(this).remove();
                if ($('div[dstype="file_loading"]').html() == '') {
                    setTimeout("window.location.reload()", 1000);
                }
            });
            if(param.state == 'true'){
                upload_num++;
                $('div[dstype="file_msg"]').html('<i class="iconfont">&#xe64d;</i>'+'<?php echo \think\Lang::get('album_upload_complete_one'); ?>'+upload_num+'<?php echo \think\Lang::get('album_upload_complete_two'); ?>');

            } else {
                $this.find('.loading').html(param.message).removeClass('loading');
            }
        }
    });

});

$(function(){
	$("#img_sort").change(function(){
		$('#select_sort').submit();
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

