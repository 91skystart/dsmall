<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:106:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/selleraccountgroup/group_add.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
  <form id="add_form" action="<?php echo url('Selleraccountgroup/group_save',['group_id'=>$group_info['sellergroup_id']]); ?>" method="post">
    <dl>
      <dt><i class="required">*</i><?php echo \think\Lang::get('group_name'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd>
        <input class="w120 text" name="seller_group_name" type="text" id="seller_group_name" value="<?php if(!empty($group_info)): ?><?php echo $group_info['sellergroup_name']; endif; ?>" />
        <span></span>
        <p class="hint"><?php echo \think\Lang::get('set_permission_group_name'); ?></p>
      </dd>
    </dl>
    <dl id="function_list">
      <dt><i class="required">*</i><?php echo \think\Lang::get('permissions'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd>
        <div class="dssc-account-all">
          <input id="btn_select_all" name="btn_select_all" class="checkbox" type="checkbox" />
          <label for="btn_select_all"><?php echo \think\Lang::get('ds_select_all'); ?></label>
          <span></span>
        </div>
          <?php if(!(empty($seller_menu) || (($seller_menu instanceof \think\Collection || $seller_menu instanceof \think\Paginator ) && $seller_menu->isEmpty()))): if(is_array($seller_menu) || $seller_menu instanceof \think\Collection || $seller_menu instanceof \think\Paginator): if( count($seller_menu)==0 ) : echo "" ;else: foreach($seller_menu as $key=>$value): ?>
          <div class="dssc-account-container">
              <h4>
                  <input id="<?php echo $key; ?>" class="checkbox" dstype="btn_select_module" type="checkbox" />
                  <label for="<?php echo $key; ?>"><?php echo $value['text']; ?></label>
              </h4>
              <?php if(!(empty($value['submenu']) || (($value['submenu'] instanceof \think\Collection || $value['submenu'] instanceof \think\Paginator ) && $value['submenu']->isEmpty()))): ?>
              <ul class="dssc-account-container-list">
                  <?php if(is_array($value['submenu']) || $value['submenu'] instanceof \think\Collection || $value['submenu'] instanceof \think\Paginator): if( count($value['submenu'])==0 ) : echo "" ;else: foreach($value['submenu'] as $key=>$submenu_value): ?>
                  <li>
                      <input id="<?php echo $submenu_value['controller']; ?>" class="checkbox" name="limits[]" value="<?php echo $submenu_value['controller']; ?>" <?php if(!empty($group_limits)) {if(in_array($submenu_value['controller'], $group_limits)) { echo 'checked'; }}?> type="checkbox" />
                             <label for="<?php echo $submenu_value['controller']; ?>"><?php echo $submenu_value['text']; ?></label>
                  </li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
              <?php endif; ?>
          </div>
          <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <p class="hint"></p>
      </dd>
    </dl>
    <dl>
      <dt><i class="required"></i><?php echo \think\Lang::get('message_receiving_permissions'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd>
        <div class="dssc-account-all">
          <input id="smt_select_all" class="checkbox" type="checkbox" />
          <label for="smt_select_all"><?php echo \think\Lang::get('ds_select_all'); ?></label>
        </div>
        <div class="dssc-account-container">
          <?php if(!(empty($smt_list) || (($smt_list instanceof \think\Collection || $smt_list instanceof \think\Paginator ) && $smt_list->isEmpty()))): ?>
          <ul class="dssc-account-container-list" style=" width: 99%; padding-left: 1%;">
            <?php if(is_array($smt_list) || $smt_list instanceof \think\Collection || $smt_list instanceof \think\Paginator): if( count($smt_list)==0 ) : echo "" ;else: foreach($smt_list as $key=>$val): ?>
            <li style=" width: 25%;">
              <input id="<?php echo $val['storemt_code']; ?>" class="checkbox" name="smt_limits[]" value="<?php echo $val['storemt_code']; ?>" <?php if(!empty($smt_limits) && in_array($val['storemt_code'], $smt_limits)): ?>checked<?php endif; ?> type="checkbox" />
              <label for="<?php echo $val['storemt_code']; ?>"><?php echo $val['storemt_name']; ?></label>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
          </ul>
          <?php endif; ?>
        </div>
        <p class="hint"><?php echo \think\Lang::get('set_message_receiving_authority'); ?></p>
      </dd>
    </dl>
    <div class="bottom">
        <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?><?php echo \think\Lang::get('set'); ?>">
    </div>
  </form>
</div>
<script>
$(document).ready(function(){
    $('#btn_select_all').on('click', function() {
        if($(this).prop('checked')) {
            $(this).parents('dd').find('input:checkbox').prop('checked', true);
        } else {
            $(this).parents('dd').find('input:checkbox').prop('checked', false);
        }
    });
    $('[dstype="btn_select_module"]').on('click', function() {
        if($(this).prop('checked')) {
            $(this).parents('.dssc-account-container').find('input:checkbox').prop('checked', true);
        } else {
            $(this).parents('.dssc-account-container').find('input:checkbox').prop('checked', false);
        }
    });
    $('#smt_select_all').on('click', function() {
        if($(this).prop('checked')) {
            $(this).parents('dl').find('input:checkbox').prop('checked', true);
        } else {
            $(this).parents('dl').find('input:checkbox').prop('checked', false);
        }
    });
    jQuery.validator.addMethod("function_check", function(value, element) {       
        var count = $('#function_list').find('input:checkbox:checked').length;
        return count > 0;
    });    
    $('#add_form').validate({
        errorPlacement: function(error, element){
            element.nextAll('span').first().after(error);
        },
            submitHandler:function(form){
    		ds_ajaxpost('add_form', 'url', "<?php echo url('Selleraccountgroup/group_list'); ?>");
    	},
        rules : {
            seller_group_name: {
                required: true,
                maxlength: 50 
            },
            btn_select_all: {
                function_check: true 
            }
        },
        messages: {
            seller_group_name: {
                required: '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('group_name_cannot_empty'); ?>',
                maxlength: '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('group_name_limit'); ?>' 
            },
            btn_select_all: {
                function_check: '<?php echo \think\Lang::get('please_select_permission'); ?>'
            }
        }
    });

    // 商品相关权限关联选择
    $('#store_goods_add,#store_goods_online,#store_goods_offline').on('click', function() {
        if($(this).prop('checked')) {
            store_goods_select(true);
        } else {
            store_goods_select(false);
        }
    });

    function store_goods_select(state) {
        $('#store_goods_add').prop('checked', state);
        $('#store_goods_online').prop('checked', state);
        $('#store_goods_offline').prop('checked', state);
    }
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

