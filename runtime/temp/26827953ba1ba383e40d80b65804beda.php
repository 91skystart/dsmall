<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:114:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellergoodsadd/store_goods_add_step1.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
        


<div class="seller_main w1200">
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
        <?php if(isset($edit_goods_sign)): else: ?>
        <ul class="add-goods-step">
            <li class="current"><i class="icon iconfont">&#xe600;</i>
                <h6>STEP.1</h6>
                <h2><?php echo \think\Lang::get('select_category'); ?></h2>
                <i class="arrow iconfont">&#xe687;</i> </li>
            <li><i class="icon iconfont">&#xe731;</i>
                <h6>STEP.2</h6>
                <h2><?php echo \think\Lang::get('fill_item_details'); ?></h2>
                <i class="arrow iconfont">&#xe687;</i> </li>
            <li><i class="icon iconfont">&#xe6a2;</i>
                <h6>STEP.3</h6>
                <h2><?php echo \think\Lang::get('store_goods_index_upload_goods_pic'); ?></h2>
                <i class="arrow iconfont">&#xe687;</i> </li>
            <li><i class="icon iconfont">&#xe64d;</i>
                <h6>STEP.4</h6>
                <h2><?php echo \think\Lang::get('store_goods_index_flow_chart_step3'); ?></h2>
            </li>
        </ul>
        <?php endif; ?>
<!--S 分类选择区域-->
<div class="wrapper_search">
  <div class="wp_sort">
    <div id="dataLoading" class="wp_data_loading">
      <div class="data_loading"><?php echo \think\Lang::get('store_goods_step1_loading'); ?></div>
    </div>
    <div class="sort_selector">
      <div class="sort_title"><?php echo \think\Lang::get('store_goods_step1_choose_common_category'); ?>
        <div class="text" id="commSelect">
            <div><?php echo \think\Lang::get('store_goods_step1_please_select'); ?></div>
            <div class="select_list" id="commListArea">
                <ul>
                    <?php if(!(empty($staple_array) || (($staple_array instanceof \think\Collection || $staple_array instanceof \think\Paginator ) && $staple_array->isEmpty()))): if(is_array($staple_array) || $staple_array instanceof \think\Collection || $staple_array instanceof \think\Paginator): if( count($staple_array)==0 ) : echo "" ;else: foreach($staple_array as $key=>$val): ?>
                    <li  data-param="{stapleid:<?php echo $val['staple_id']; ?>}">
                        <span dstype="staple_name"><?php echo $val['staple_name']; ?></span>
                        <a href="JavaScript:void(0);" dstype="del-comm-cate" title="<?php echo \think\Lang::get('ds_delete'); ?>">X</a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    <li id="select_list_no" <?php if(!(empty($staple_array) || (($staple_array instanceof \think\Collection || $staple_array instanceof \think\Paginator ) && $staple_array->isEmpty()))): ?>style="display: none;"<?php endif; ?>><span class="title"><?php echo \think\Lang::get('store_goods_step1_no_common_category'); ?></span></li>
                </ul>
            </div>
        </div>
        <i class="iconfont">&#xe689;</i>
      </div>
    </div>
    <div id="class_div" class="wp_sort_block">
      <div class="sort_list">
        <div class="wp_category_list">
          <div id="class_div_1" class="category_list">
              <ul>
                  <?php if(!(empty($goods_class) || (($goods_class instanceof \think\Collection || $goods_class instanceof \think\Paginator ) && $goods_class->isEmpty()))): if(is_array($goods_class) || $goods_class instanceof \think\Collection || $goods_class instanceof \think\Paginator): if( count($goods_class)==0 ) : echo "" ;else: foreach($goods_class as $key=>$val): ?>
                  <li class="" dstype="selClass" data-param="{gcid:<?php echo $val['gc_id']; ?>,deep:1,tid:<?php echo $val['type_id']; ?>}"> <a class="" href="javascript:void(0)"><i class="iconfont"></i><?php echo $val['gc_name']; ?></a></li>
                  <?php endforeach; endif; else: echo "" ;endif; endif; ?>
              </ul>
          </div>
        </div>
      </div>
      <div class="sort_list">
        <div class="wp_category_list blank">
          <div id="class_div_2" class="category_list">
            <ul>
            </ul>
          </div>
        </div>
      </div>
      <div class="sort_list sort_list_last">
        <div class="wp_category_list blank">
          <div id="class_div_3" class="category_list">
            <ul>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="alert">
    <dl class="hover_tips_cont">
      <dt id="commodityspan"><span style="color:#F00;"><?php echo \think\Lang::get('store_goods_step1_please_choose_category'); ?></span></dt>
      <dt id="commoditydt" style="display: none;" class="current_sort"><?php echo \think\Lang::get('store_goods_step1_current_choose_category'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd id="commoditydd"></dd>
    </dl>
  </div>
  <div class="wp_confirm">
      <form method="get" action="<?php if(isset($edit_goods_sign)): ?><?php echo url('Sellergoodsonline/edit_goods',['commonid'=>$commonid]); else: ?><?php echo url('Sellergoodsadd/add_step_two'); endif; ?>">
          <input type="hidden" name="class_id" id="class_id" value="" />
          <input type="hidden" name="t_id" id="t_id" value="" />
          <div class="bottom tc">
              <input disabled="disabled" dstype="buttonNextStep" value="<?php echo \think\Lang::get('store_goods_add_next'); ?>，<?php echo \think\Lang::get('fill_item_information'); ?>" type="submit" class="submit" />
          </div>
      </form>
  </div>
</div>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/mlselection.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.mousewheel.js"></script>
<script src="<?php echo HOME_SITE_ROOT; ?>/js/sellergoods_add_step1.js"></script> 
<script>
SEARCHKEY = '<?php echo \think\Lang::get('store_goods_step1_search_input_text'); ?>';
</script>

        
        
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
