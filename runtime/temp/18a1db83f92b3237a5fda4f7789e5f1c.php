<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:105:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellergroupbuy/groupbuy_add.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
    <form id="add_form" action="<?php echo url('Sellergroupbuy/groupbuy_save'); ?>" method="post" enctype="multipart/form-data">
        <dl>
            <dt><i class="required">*</i><?php echo \think\Lang::get('group_name'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w400 text" name="groupbuy_name" type="text" id="groupbuy_name" value="" maxlength="30"  />
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('group_name_tip'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('snap_up_subtitles'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w400 text" name="remark" type="text" id="remark" value="" maxlength="30"  />
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('snap_up_subtitle_word_limit'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><i class="required">*</i><?php echo \think\Lang::get('start_time'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input id="start_time" name="start_time" type="text" class="text w130" /><em class="add-on"><i class="iconfont">&#xe8d6;</i></em><span></span>
                <p class="hint"><?php echo \think\Lang::get('start_time_cannot_less_than'); ?><?php echo date("Y-m-d H:i",$groupbuy_starttime); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><i class="required">*</i><?php echo \think\Lang::get('end_time'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input id="end_time" name="end_time" type="text" class="text w130"/><em class="add-on"><i class="iconfont">&#xe8d6;</i></em><span></span>
                <p class="hint">
                    <?php if(!isset($isPlatformStore)): ?>
                    <?php echo \think\Lang::get('start_time_cannot_greater_than'); ?><?php echo date("Y-m-d H:i",$current_groupbuy_quota['groupbuyquota_endtime']); endif; ?>
                </p>
            </dd>
        </dl>
        <dl>
            <dt><i class="required">*</i><?php echo \think\Lang::get('groupbuy_goods'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <div dstype="groupbuy_goods_info" class="selected-group-goods " style="display:none;">
                    <div class="goods-thumb"><img id="groupbuy_goods_image" src=""/></div>
                    <div class="goods-name">
                        <a dstype="groupbuy_goods_href" id="groupbuy_goods_name" href="" target="_blank"></a>
                    </div>
                    <div class="goods-price"><?php echo \think\Lang::get('store_price'); ?>：￥<span dstype="groupbuy_goods_price"></span></div>
                </div>
                <a href="javascript:void(0);" id="btn_show_search_goods" class="dssc-btn dssc-btn-acidblue"><?php echo \think\Lang::get('groupbuy_index_choose_goods'); ?></a>
                <input id="groupbuy_goods_id" name="groupbuy_goods_id" type="hidden" value=""/>
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
                                <p class="hint"><?php echo \think\Lang::get('special_goods_not_allowed'); ?></p>
                            </td>
                        </tr>
                    </table>
                    <div id="div_goods_search_result" class="search-result" style="width:739px;"></div>
                    <a id="btn_hide_search_goods" class="close" href="javascript:void(0);">X</a>
                </div>
                <p class="hint"><?php echo \think\Lang::get('groupbuy_goods_explain'); ?></br><span class="red"><?php echo \think\Lang::get('implement_uniform_purchase_prices'); ?></span></p>
            </dd>
        </dl>
        <dl dstype="groupbuy_goods_info" style="display:none;">
            <dt><?php echo \think\Lang::get('groupbuy_index_store_price'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd> <?php echo \think\Lang::get('currency'); ?><span dstype="groupbuy_goods_price"></span><input id="input_groupbuy_goods_price" type="hidden"></dd>
        </dl>
        <dl>
            <dt><i class="required">*</i><?php echo \think\Lang::get('groupbuy_price'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w70 text" id="groupbuy_price" name="groupbuy_price" type="text" value=""/><em class="add-on"><i class="iconfont">&#xe65c;</i></em> <span></span>
                <p class="hint"><?php echo \think\Lang::get('groupbuy_price_tip'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><i class="required">*</i><?php echo \think\Lang::get('snap_up_photos'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <div class="dssc-upload-thumb groupbuy-pic">
                    <p><i class="iconfont">&#xe72a;</i>
                        <img dstype="img_groupbuy_image" style="display:none;" src=""/></p>
                </div>
                <input dstype="groupbuy_image" name="groupbuy_image" type="hidden" value="">
                <div class="dssc-upload-btn">
                    <a href="javascript:void(0);">
                        <span>
                            <input type="file" hidefocus="true" size="1" class="input-file" name="groupbuy_image" dstype="btn_upload_image"/>
                        </span>
                        <p><i class="iconfont">&#xe733;</i><?php echo \think\Lang::get('image_upload'); ?></p>
                    </a>
                </div>
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('group_pic_explain'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('snap_recommended_images'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <div class="dssc-upload-thumb groupbuy-commend-pic">
                    <p><i class="iconfont">&#xe72a;</i>
                        <img dstype="img_groupbuy_image" style="display:none;" src=""/></p>
                </div>
                <input dstype="groupbuy_image" name="groupbuy_image1" type="hidden" value="">
                <span></span>
                <div class="dssc-upload-btn">
                    <a href="javascript:void(0);">
                        <span>
                            <input type="file" hidefocus="true" size="1" class="input-file" name="groupbuy_image" dstype="btn_upload_image"/>
                        </span>
                        <p><i class="iconfont">&#xe733;</i><?php echo \think\Lang::get('image_upload'); ?></p>
                    </a>
                </div>
                <p class="hint"><?php echo \think\Lang::get('group_pic_explain2'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('groupbuy_class'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <select id="gclass_id" name="gclass_id" class="w80">
                    <option value="0"><?php echo \think\Lang::get('text_no_limit'); ?></option>
                </select>
                <select id="s_gclass_id" name="s_gclass_id" class="w80">
                    <option value="0"><?php echo \think\Lang::get('text_no_limit'); ?></option>
                </select>
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('groupbuy_class_tip'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('virtual_quantity'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w70 text" id="virtual_quantity" name="virtual_quantity" type="text" value="0"/>
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('virtual_quantity_explain'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('sale_quantity'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input class="w70 text" id="upper_limit" name="upper_limit" type="text" value="0"/>
                <span></span>
                <p class="hint"><?php echo \think\Lang::get('sale_quantity_explain'); ?></p>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('group_intro'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <?php echo build_editor(['name'=>'groupbuy_intro']); ?>
                <textarea name="groupbuy_intro" id="groupbuy_intro"></textarea>
                <p class="hr8"><a class="des_demo dssc-btn" href="<?php echo url('Selleralbum/pic_list','item=groupbuy'); ?>"><i class="iconfont">&#xe72a;</i><?php echo \think\Lang::get('store_goods_album_insert_users_photo'); ?></a></p>
                <p id="des_demo" style="display:none;"></p>
            </dd>
        </dl>
        <div class="bottom">
            <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>">
        </div>
    </form>
</div>
<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui-timepicker/jquery-ui-timepicker-addon.min.css">
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui-timepicker/jquery-ui-timepicker-addon.min.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui-timepicker/i18n/jquery-ui-timepicker-zh-CN.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-file-upload/jquery.fileupload.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.ajaxContent.pack.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#start_time').datetimepicker({dateFormat: 'yy-mm-dd'});
        $('#end_time').datetimepicker({dateFormat: 'yy-mm-dd'});

        $('#btn_show_search_goods').on('click', function() {
            $('#div_search_goods').show();
        });

        $('#btn_hide_search_goods').on('click', function() {
            $('#div_search_goods').hide();
        });

        //搜索商品
        $('#btn_search_goods').on('click', function() {
            var url = "<?php echo url('Sellergroupbuy/search_goods'); ?>";
             var  datas  =  $.param({goods_name: $('#search_goods_name').val()});
            $('#div_goods_search_result').load(url,datas);
        });

        $('#div_goods_search_result').on('click', '.pagination li a', function() {
            $('#div_goods_search_result').load($(this).attr('href'));
            return false;
        });

        //选择商品
        $('#div_goods_search_result').on('click', '[dstype="btn_add_groupbuy_goods"]', function() {
            var goods_commonid = $(this).attr('data-goods-commonid');
            $.get("<?php echo url('Sellergroupbuy/groupbuy_goods_info'); ?>", {goods_commonid: goods_commonid}, function(data) {
                if(data.result) {
                    $('#groupbuy_goods_id').val(data.goods_id);
                    $('#groupbuy_goods_image').attr('src', data.goods_image);
                    $('#groupbuy_goods_name').text(data.goods_name);
                    $('[dstype="groupbuy_goods_price"]').text(data.goods_price);
                    $('#input_groupbuy_goods_price').val(data.goods_price);
                    $('[dstype="groupbuy_goods_href"]').attr('href', data.goods_href);
                    $('[dstype="groupbuy_goods_info"]').show();
                    $('#div_search_goods').hide();
                } else {
                    layer.msg(data.message);
                }
            }, 'json');
        });

        //图片上传
        $('[dstype="btn_upload_image"]').fileupload({
            dataType: 'json',
            url: "<?php echo url('Sellergroupbuy/image_upload'); ?>",
            add: function(e, data) {
                $parent = $(this).parents('dd');
                $input = $parent.find('[dstype="groupbuy_image"]');
                $img = $parent.find('[dstype="img_groupbuy_image"]');
                data.formData = {old_groupbuy_image:$input.val()};
                $img.attr('src', "<?php echo HOME_SITE_ROOT; ?>/images/loading.gif");
                data.submit();
            },
            done: function (e,data) {
                var result = data.result;
                $parent = $(this).parents('dd');
                $input = $parent.find('[dstype="groupbuy_image"]');
                $img = $parent.find('[dstype="img_groupbuy_image"]');
                if(result.result) {
                    $img.prev('i').hide();
                    $img.attr('src', result.file_url);
                    $img.show();
                    $input.val(result.file_name);
                } else {
                    layer.msg(data.message);
                }
            }
        });

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

        jQuery.validator.methods.checkGroupbuyGoods = function(value, element) {
            var start_time = $("#start_time").val();
            var result = true;
            $.ajax({
                type:"GET",
                url:"<?php echo url('Sellergroupbuy/check_groupbuy_goods'); ?>",
                async:false,
                data:{start_time: start_time, goods_id: value},
                dataType: 'json',
                success: function(data){
                    if(!data.result) {
                        result = false;
                    }
                }
            });
            return result;
        };

        //页面输入内容验证
        $("#add_form").validate({
            errorPlacement: function(error, element){
                var error_td = element.parent('dd').children('span');
                error_td.append(error);
            },
            onfocusout: false,
            rules : {
                groupbuy_name: {
                    required : true
                },
                start_time : {
                    required : true,
                    greaterThanDate : "<?php echo date('Y-m-d H:i:s',$groupbuy_starttime); ?>"
                },
                end_time : {
                    required : true,
                    <?php if(!isset($isPlatformStore)): ?>
                        lessThanDate : "<?php echo date('Y-m-d H:i',$current_groupbuy_quota['groupbuyquota_endtime']); ?>",
                    <?php endif; ?>
                    greaterThanStartDate : true
                },
                groupbuy_goods_id: {
                    required : true,
                        checkGroupbuyGoods: true
                },
                groupbuy_price: {
                    required : true,
                        number : true,
                        lessThanGoodsPrice: false,
                        min : 0.01,
                        max : 1000000
                },
                virtual_quantity: {
                    required : true,
                        digits : true
                },
                upper_limit: {
                    required : true,
                        digits : true
                },
                groupbuy_image1: {
                    required : true
                }
        },
        messages : {
            groupbuy_name: {
                required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('group_name_error'); ?>'
            },
            start_time : {
                required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('start_time_cannot_empty'); ?>',
                    greaterThanDate : "<i class='iconfont'>&#xe64c;</i><?php echo \think\Lang::get('start_time_must_greater'); ?><?php echo date('Y-m-d H:i',$groupbuy_starttime); ?>"
            },
            end_time : {
                required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('end_snap_time_cannot_empty'); ?>',
                <?php if(!isset($isPlatformStore)): ?>
                lessThanDate : "<i class='iconfont'>&#xe64c;</i><?php echo \think\Lang::get('snap_must_less'); if(isset($current_groupbuy_quota)): ?><?php echo date('Y-m-d H:i',$current_groupbuy_quota['groupbuyquota_endtime']); endif; ?>",
                <?php endif; ?>
                greaterThanStartDate : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('must_greater_start_time'); ?>'
            },
            groupbuy_goods_id: {
                required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('group_goods_error'); ?>',
                    checkGroupbuyGoods: '<?php echo \think\Lang::get('product_participated_simultaneous_events'); ?>'
            },
            groupbuy_price: {
                required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('groupbuy_price_error'); ?>',
                    number : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('groupbuy_price_error'); ?>',
                    lessThanGoodsPrice: '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('price_must_less_price_goods'); ?>',
                    min : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('groupbuy_price_error'); ?>',
                    max : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('groupbuy_price_error'); ?>'
            },
            virtual_quantity: {
                required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('virtual_quantity_error'); ?>',
                    digits : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('virtual_quantity_error'); ?>'
            },
            upper_limit: {
                required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('sale_quantity_error'); ?>',
                    digits : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('sale_quantity_error'); ?>'
            },
            groupbuy_image1: {
                required : '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('snap_images_cannot_empty'); ?>'
            }
        }
    });

        $('#li_1').click(function(){
            $('#li_1').attr('class','active');
            $('#li_2').attr('class','');
            $('#demo').hide();
        });

        $('#goods_demo').click(function(){
            $('#li_1').attr('class','');
            $('#li_2').attr('class','active');
            $('#demo').show();
        });

        $('.des_demo').click(function(){
            if($('#des_demo').css('display') == 'none'){
                $('#des_demo').show();
            }else{
                $('#des_demo').hide();
            }
        });

        $('.des_demo').ajaxContent({
            event:'click', //mouseover
            loaderType:"img",
            loadingMsg:"<?php echo HOME_SITE_ROOT; ?>/images/loading.gif",
            target:'#des_demo'
        });
    });

    function insert_editor(file_path){
        ue.execCommand('insertimage', {src:file_path});
    }

    (function(data) {
        var s = '<option value="0"><?php echo \think\Lang::get('text_no_limit'); ?></option>';
        if (typeof data.children != 'undefined') {
            if (data.children[0]) {
                $.each(data.children[0], function(k, v) {
                    s += '<option value="'+v+'">'+data['name'][v]+'</option>';
                });
            }
        }
        $('#gclass_id').html(s).change(function() {
            var ss = '<option value="0"><?php echo \think\Lang::get('text_no_limit'); ?></option>';
            var v = this.value;
            if (parseInt(v) && data.children[v]) {
                $.each(data.children[v], function(kk, vv) {
                    ss += '<option value="'+vv+'">'+data['name'][vv]+'</option>';
                });
            }
            $('#s_gclass_id').html(ss);
        });
    })($.parseJSON('<?php echo json_encode($groupbuy_classes); ?>'));
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

