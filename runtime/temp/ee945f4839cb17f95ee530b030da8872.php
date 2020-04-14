<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:100:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellercallcenter/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
            <div class="alert"><strong><?php echo \think\Lang::get('ds_explain'); ?><?php echo \think\Lang::get('ds_colon'); ?></strong><?php echo \think\Lang::get('store_callcenter_notes'); ?>
                </li>
            </div>
            <form method="post" action="<?php echo url('Sellercallcenter/save'); ?>" id="callcenter_form" class="dss-message">
                <dl dstype="pre">
                    <dt><?php echo \think\Lang::get('store_callcenter_presales_service'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                    <dd>
                        <div class="dss-message-title"><span class="name"><?php echo \think\Lang::get('store_callcenter_service_name'); ?></span><span class="tool"><?php echo \think\Lang::get('store_callcenter_service_tool'); ?></span><span class="number"><?php echo \think\Lang::get('store_callcenter_service_number'); ?></span></div>
                        <?php if(empty($storeinfo['store_presales']) || (($storeinfo['store_presales'] instanceof \think\Collection || $storeinfo['store_presales'] instanceof \think\Paginator ) && $storeinfo['store_presales']->isEmpty())): ?>
                        <div class="dss-message-list"><span class="name tip" title="<?php echo \think\Lang::get('store_callcenter_name_title'); ?>">
                                <input type="text" class="text w60" value="<?php echo \think\Lang::get('store_callcenter_presales'); ?>1" name="pre[1][name]" maxlength="10" />
                            </span><span class="tool tip" title="<?php echo \think\Lang::get('store_callcenter_tool_title'); ?>">
                                <select name="pre[1][type]">
                                    <option value="0"><?php echo \think\Lang::get('store_callcenter_please_choose'); ?></option>
                                    <option value="1">QQ</option>
                                    <option value="2"><?php echo \think\Lang::get('store_callcenter_wangwang'); ?></option>
                                    <option value="3"><?php echo \think\Lang::get('standing_im'); ?></option>
                                </select>
                            </span><span class="number tip" title="<?php echo \think\Lang::get('store_callcenter_number_title'); ?>">
                                <input name="pre[1][num]" type="text" class="text w180" maxlength="25" />
                            </span><span class="del"><a dstype="del" href="javascript:void(0);" class="dssc-btn" onclick="del_service(this)"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('ds_delete'); ?></a></span></div>
                        <?php else: if(is_array($storeinfo['store_presales']) || $storeinfo['store_presales'] instanceof \think\Collection || $storeinfo['store_presales'] instanceof \think\Paginator): if( count($storeinfo['store_presales'])==0 ) : echo "" ;else: foreach($storeinfo['store_presales'] as $key=>$val): ?>
                        <div class="dss-message-list"><span class="name tip" title="<?php echo \think\Lang::get('store_callcenter_name_title'); ?>">
                                <input type="text" class="text w60" value="<?php echo $val['name']; ?>" name="pre[<?php echo $key; ?>][name]" maxlength="10" />
                            </span><span class="tool tip" title="<?php echo \think\Lang::get('store_callcenter_tool_title'); ?>">
                                <select name="pre[<?php echo $key; ?>][type]">
                                    <option value="1" <?php if($val['type'] == 1): ?>selected="selected"<?php endif; ?>>QQ</option>
                                    <option value="2" <?php if($val['type'] == 2): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('store_callcenter_wangwang'); ?></option>
                                    <option value="3"<?php if($val['type'] == 3): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('standing_im'); ?></option>
                                </select>
                            </span><span class="number tip" title="<?php echo \think\Lang::get('store_callcenter_number_title'); ?>">
                                <input name="pre[<?php echo $key; ?>][num]" type="text" class="text w180" value="<?php echo $val['num']; ?>" maxlength="25" />
                            </span><span class="del"><a dstype="del" href="javascript:void(0);" class="dssc-btn" onclick="del_service(this)"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('ds_delete'); ?></a></span> </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <p><span><a href="javascript:void(0);" onclick="add_service('pre');" class="dssc-btn dssc-btn-acidblue mt10"><i class="iconfont">&#xe6db;</i><?php echo \think\Lang::get('store_callcenter_add_service'); ?></a></span></p>
                    </dd>
                </dl>
                <dl dstype="after" >
                    <dt><?php echo \think\Lang::get('store_callcenter_aftersales_service'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                    <dd>
                        <div class="dss-message-title"><span class="name"><?php echo \think\Lang::get('store_callcenter_service_name'); ?></span><span class="tool"><?php echo \think\Lang::get('store_callcenter_service_tool'); ?></span><span class="number"><?php echo \think\Lang::get('store_callcenter_service_number'); ?></span></div>
                        <?php if(empty($storeinfo['store_aftersales']) || (($storeinfo['store_aftersales'] instanceof \think\Collection || $storeinfo['store_aftersales'] instanceof \think\Paginator ) && $storeinfo['store_aftersales']->isEmpty())): ?>
                        <div class="dss-message-list"><span class="name tip" title="<?php echo \think\Lang::get('store_callcenter_name_title'); ?>">
                                <input type="text" class="text w60" value="<?php echo \think\Lang::get('store_callcenter_aftersales'); ?>1" name="after[1][name]" maxlength="10" />
                            </span><span class="tool tip" title="<?php echo \think\Lang::get('store_callcenter_tool_title'); ?>">
                                <select name="after[1][type]">
                                    <option value="0"><?php echo \think\Lang::get('store_callcenter_please_choose'); ?></option>
                                    <option value="1">QQ</option>
                                    <option value="2"><?php echo \think\Lang::get('store_callcenter_wangwang'); ?></option>
                                    <option value="3"><?php echo \think\Lang::get('standing_im'); ?></option>
                                </select>
                            </span><span class="number tip" title="<?php echo \think\Lang::get('store_callcenter_number_title'); ?>">
                                <input type="text" class="text w180" name="after[1][num]" maxlength="25" />
                            </span><span><a dstype="del" href="javascript:void(0);" class="dssc-btn" onclick="del_service(this)"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('ds_delete'); ?></a></span> </div>
                        <?php else: if(is_array($storeinfo['store_aftersales']) || $storeinfo['store_aftersales'] instanceof \think\Collection || $storeinfo['store_aftersales'] instanceof \think\Paginator): if( count($storeinfo['store_aftersales'])==0 ) : echo "" ;else: foreach($storeinfo['store_aftersales'] as $key=>$val): ?>
                        <div class="dss-message-list"><span class="name tip" title="<?php echo \think\Lang::get('store_callcenter_name_title'); ?>">
                                <input type="text" class="text w60" value="<?php echo $val['name']; ?>" name="after[<?php echo $key; ?>][name]" maxlength="10" />
                            </span><span class="tool tip" title="<?php echo \think\Lang::get('store_callcenter_tool_title'); ?>">
                                <select name="after[<?php echo $key; ?>][type]">
                                    <option value="1" <?php if($val['type'] == 1): ?>selected="selected"<?php endif; ?>>QQ</option>
                                    <option value="2" <?php if($val['type'] == 2): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('store_callcenter_wangwang'); ?></option>
                                    <option value="3" <?php if($val['type'] == 3): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('standing_im'); ?></option>
                                </select>
                            </span><span class="number tip" title="<?php echo \think\Lang::get('store_callcenter_number_title'); ?>">
                                <input type="text" class="text w180" name="after[<?php echo $key; ?>][num]" maxlength="25" value="<?php echo $val['num']; ?>" />
                            </span><span class="del"><a dstype="del" href="javascript:void(0);" class="dssc-btn" onclick="del_service(this)"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('ds_delete'); ?></a></span> </div>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        <p><span><a href="javascript:void(0);" onclick="add_service('after');" class="dssc-btn dssc-btn-acidblue mt10"><i class="iconfont">&#xe6db;</i><?php echo \think\Lang::get('store_callcenter_add_service'); ?></a></span></p>
                    </dd>
                </dl>
                <dl >
                    <dt><em class="pngFix"><?php echo \think\Lang::get('store_callcenter_working_time'); ?><?php echo \think\Lang::get('ds_colon'); ?></em></dt>
                    <dd>
                        <div class="dss-message-title"><span><?php echo \think\Lang::get('store_callcenter_working_time_title'); ?></span></div>
                        <div>
                            <textarea name="working_time" class="textarea w500 h50"><?php echo $storeinfo['store_workingtime']; ?></textarea>
                        </div>
                    </dd>
                </dl>
                <div class="bottom">
                    <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>" />
                </div>
            </form>
        </div>

<script>

    jQuery.browser={};(function(){jQuery.browser.msie=false; jQuery.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)./)){ jQuery.browser.msie=true;jQuery.browser.version=RegExp.$1;}})();
</script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.poshytip.min.js"></script>
<script>
    $(document).ready(function(){
        $('#callcenter_form').validate({
            submitHandler:function(form){
                ds_ajaxpost('callcenter_form','url',"<?php echo url('Sellercallcenter/index'); ?>")
            },
        });
    });

    var seller_option = '';
    <?php if(!(empty($seller_list) || (($seller_list instanceof \think\Collection || $seller_list instanceof \think\Paginator ) && $seller_list->isEmpty()))): if(is_array($seller_list) || $seller_list instanceof \think\Collection || $seller_list instanceof \think\Paginator): if( count($seller_list)==0 ) : echo "" ;else: foreach($seller_list as $key=>$val): ?>
            seller_option += '<option value="<?php echo $val['member_id']; ?>"><?php echo $val['seller_name']; ?></option>';
       <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    $('#callcenter_form').find('.tool select').on('change', function(){
        var obj = $(this).parent().parent();
        var input_obj = obj.find(".number input");
        var input_name = input_obj.attr("name");
        var input_val = input_obj.val();
        var select_val = $(this).val();
        if ( select_val == 3 ) {
            obj.find(".number").html('<input type="hidden" name="'+input_name+'" value="'+input_val+'" /><select name="'+
                input_name+'">'+seller_option+'</select>');
            obj.find(".number select").val(input_val);
        } else {
            obj.find(".number").html('<input class="text w180" type="text" name="'+input_name+'" value="'+input_val+'" />');
        }
    });
    $('#callcenter_form').find('.tool select').trigger("change");
    $(function(){
        titleTip();
    });
    function del_service(obj){
        $(obj).parents('div:first').remove();
    }
    function add_service(param){
        if(param == 'pre'){
            var text = '<?php echo \think\Lang::get('store_callcenter_presales'); ?>';
        }else if(param == 'after'){
            var text = '<?php echo \think\Lang::get('store_callcenter_aftersales'); ?>';
        }
        obj = $('dl[dstype="'+param+'"]').children('dd').find('p');
        len = $('dl[dstype="'+param+'"]').children('dd').find('div').length;
        key = 'k'+len+Math.floor(Math.random()*100);
        var add_html = '';
        add_html += '<div class="dss-message-list">';
        add_html += '<span class="name tip" title="<?php echo \think\Lang::get('store_callcenter_name_title'); ?>">';
        add_html += '<input type="text" class="text w60" value="'+text+len+'" name="'+param+'['+key+'][name]" /></span>';
        add_html += '<span class="tool tip" title="<?php echo \think\Lang::get('store_callcenter_tool_title'); ?>"><select name="'+param+'['+key+'][type]">';
        add_html += '<option class="" value="0"><?php echo \think\Lang::get('store_callcenter_please_choose'); ?></option><option value="1">QQ</option>';
        add_html += '<option value="2"><?php echo \think\Lang::get('store_callcenter_wangwang'); ?></option><option value="3"><?php echo \think\Lang::get('standing_im'); ?></option></select></span>';
        add_html += '<span class="number tip" title="<?php echo \think\Lang::get('store_callcenter_number_title'); ?>"><input class="text w180" type="text" name="'+param+'['+key+'][num]" /></span>';
        add_html += '<span class="del"><a dstype="del" href="javascript:void(0);" class="dssc-btn" onclick="del_service(this)"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('ds_delete'); ?></a></span>';
        add_html += '</div>';
        obj.before(add_html);
        titleTip();
    }
    function titleTip(){
        $('.tip').unbind().poshytip({
            className: 'tip-yellowsimple',
            showTimeout: 1,
            alignTo: 'target',
            alignX: 'center',
            alignY: 'top',
            offsetX: 5,
            offsetY: 0,
            allowTipHover: false
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

