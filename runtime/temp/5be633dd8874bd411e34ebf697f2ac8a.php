<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:94:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellerspec/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
            
<div class="alert mt15 mb5"><strong><?php echo \think\Lang::get('operating_instructions'); ?>：</strong>
    <ul>
        <li><?php echo \think\Lang::get('sellerspec_tip1'); ?></li>
        <li><?php echo \think\Lang::get('sellerspec_tip2'); ?><font color="red"><?php echo \think\Lang::get('sellerspec_tip3'); ?></font><?php echo \think\Lang::get('sellerspec_tip4'); ?></li>
        <li><?php echo \think\Lang::get('sellerspec_tip5'); ?></li>
    </ul>
</div>

<table class="search-form">
    <tr>
        <td class="w20">&nbsp;</td>
        <td class="w120"><strong><?php echo \think\Lang::get('select_business_category'); ?></strong></td>
        <td>
            <span dstype="gc1">
                <?php if(!(empty($gc_list) || (($gc_list instanceof \think\Collection || $gc_list instanceof \think\Paginator ) && $gc_list->isEmpty()))): ?>
                <select dstype="gc" data-param="{deep:1}">
                    <option><?php echo \think\Lang::get('ds_please_choose'); ?></option>
                    <?php if(is_array($gc_list) || $gc_list instanceof \think\Collection || $gc_list instanceof \think\Paginator): if( count($gc_list)==0 ) : echo "" ;else: foreach($gc_list as $key=>$val): ?>
                    <option value="<?php echo $val['gc_id']; ?>"><?php echo $val['gc_name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
                <?php endif; ?>
            </span>
            <span dstype="gc2"></span>
            <span dstype="gc3"></span>
        </td>
        <td>&nbsp;</td>
    </tr>
</table>


<div dstype="class_spec" class="dssc-goods-spec">
    <div dstype="spec_ul" class="spec-tabmenu"></div>
    <div dstype="spec_iframe" class="spec-iframe">
        <div class="norecord tc">
            <div class="warning-option"><i class="iconfont">&#xe64c;</i><span><?php echo \think\Lang::get('no_record'); ?></span>
            </div>
        </div>
    </div>
</div>



<!--<script src="<?php echo PLUGINS_SITE_ROOT; ?>/mlselection.js"></script>
<script>
    $(function () {
        gcategoryInit("gcategory");
    });
</script>-->


<script>
    $(function() {
        // 查询下级分类，分类不存在显示当前分类绑定的规格
        $('select[dstype="gc"]').change(function() {
            $(this).parents('td:first').nextAll().html('');
            $('div[dstype="spec_ul"]').html('');
            $('div[dstype="spec_iframe"]').html('');
            getClassSpec($(this));
        });
    });

    // ajax选择商品分类
    function getClassSpec($this) {
        var id = parseInt($this.val());
        var data_str = '';
        eval('data_str =' + $this.attr('data-param'));
        var deep = data_str.deep;
        if (isNaN(id)) {
            // 清理分类
            clearClassHtml(parseInt(deep) + 1);
        }
        $.getJSON('ajax_class?id=' + id + '&deep=' + deep, function(data) {
            $('div[dstype="spec_iframe"]').empty();
            $('div[dstype="spec_ul"]').empty();
            if (data) {
                if (data.type == 'class') {
                    nextClass(data.data, data.deep);
                } else if (data.type == 'spec') {
                    specList(data.data, data.deep, data.gcid);
                }
            }
        });
    }

    // 下一级商品分类
    function nextClass(data, deep) {
        $('span[dstype="gc' + deep + '"]').html('').append('<select data-param="{deep:' + deep + '}"></select>')
                .find('select').change(function() {
            getClassSpec($(this));
        }).append('<option><?php echo \think\Lang::get('ds_please_choose'); ?></option>');
        $.each(data, function(i, n) {
            if (n != null) {
                $('span[dstype="gc' + deep + '"] > select').append('<option value="' + n.gc_id + '">' + n.gc_name + '</option>');
            }
        });
        // 清理分类
        clearClassHtml(parseInt(deep) + 1);
    }

    // 列出规格信息
    function specList(data, deep, gcid) {
        if (typeof(data) != 'undefined' && data != '') {
            var $_ul = $('<ul></ul>');
            $.each(data, function(i, n) {
                $_ul.append('<li><a href="javascript:void(0);" dstype="editSpec" data-param="{spid:' + n.sp_id + ',gcid:' + gcid + '}"><?php echo \think\Lang::get('ds_edit'); ?>' + n.sp_name + '<?php echo \think\Lang::get('specifications'); ?></a></li>');
            });
            $_ul.find('a').click(function() {
                $_ul.find('li').removeClass('selected');
                $(this).parents('li:first').addClass('selected');
                editSpecvalue($(this));
            });
            $_ul.find('a:first').click();
            $('div[dstype="spec_ul"]').append($_ul);
        } else {
            $('div[dstype="spec_ul"]').append('<div class="warning-option"><i class="iconfont">&#xe64c;</i><span><?php echo \think\Lang::get('category_cannot_add_specifications'); ?></span></div>');
        }
        // 清理分类
        clearClassHtml(deep);
    }

    // 清理二级分类信息
    function clearClassHtml(deep) {
        switch (deep) {
            case 2:
                $('span[dstype="gc2"]').empty();
            case 3:
                $('span[dstype="gc3"]').empty();
                break;
        }
    }

    // ajax编辑规格值
    function editSpecvalue(o) {
        $('div[dstype="spec_iframe"]').html('');
        var data_str = '';
        eval('data_str =' + o.attr('data-param'));
        $_iframe = $('<iframe id="iframepage" name="iframepage" frameBorder=0 scrolling=no width="100%" height="630px" ' + 'src="<?php echo url('Sellerspec/add_spec'); ?>?spid=' + data_str.spid + '&gcid=' + data_str.gcid + '" ></iframe>'
                )
                ;
        $('div[dstype="spec_iframe"]').append($_iframe);
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

