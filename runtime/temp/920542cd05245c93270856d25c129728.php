<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:117:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellergoodsadd/store_goods_list_offline.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
      <th><?php echo \think\Lang::get('store_goods_index_store_goods_class'); ?></th>
      <td class="w160"><select name="storegc_id" class="w150">
          <option value="0"><?php echo \think\Lang::get('ds_please_choose'); ?></option>
          <?php if(!(empty($store_goods_class) || (($store_goods_class instanceof \think\Collection || $store_goods_class instanceof \think\Paginator ) && $store_goods_class->isEmpty()))): if(is_array($store_goods_class) || $store_goods_class instanceof \think\Collection || $store_goods_class instanceof \think\Paginator): if( count($store_goods_class)==0 ) : echo "" ;else: foreach($store_goods_class as $key=>$val): ?>
          <option value="<?php echo $val['storegc_id']; ?>" <?php if(\think\Request::instance()->param('storegc_id') == $val['storegc_id']): ?>selected="selected"<?php endif; ?>><?php echo $val['storegc_name']; ?></option>
          <?php if(isset($val['child']) && count($val['child'])>0): if(is_array($val['child']) || $val['child'] instanceof \think\Collection || $val['child'] instanceof \think\Paginator): if( count($val['child'])==0 ) : echo "" ;else: foreach($val['child'] as $key=>$child_val): ?>
          <option value="<?php echo $child_val['storegc_id']; ?>" <?php if(\think\Request::instance()->param('storegc_id') == $child_val['storegc_id']): ?>selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $child_val['storegc_name']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; ?>
        </select></td>
      <th>
        <select name="search_type">
          <option value="0" <?php if(\think\Request::instance()->param('type') == '0'): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('store_goods_index_goods_name'); ?></option>
          <option value="1" <?php if(\think\Request::instance()->param('type') == '1'): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('store_goods_index_goods_no'); ?></option>
          <option value="2" <?php if(\think\Request::instance()->param('type') == '2'): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('platform_article_number'); ?></option>
        </select>
      </th>
      <td class="w160"><input type="text" class="text" name="keyword" value="<?php echo \think\Request::instance()->param('keyword'); ?>"/></td>
      <td class="tc w70">
          <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_search'); ?>" />
      </td>
    </tr>
  </table>
</form>
<table class="dssc-default-table">
  <thead>
    <tr ds_type="table_header">
      <th class="w30"></th>
      <th class="w50"></th>
      <th><?php echo \think\Lang::get('store_goods_index_goods_name'); ?></th>
      <th class="w180"><?php echo \think\Lang::get('store_goods_index_show'); ?></th>
      <th class="w100"><?php echo \think\Lang::get('store_goods_index_price'); ?></th>
      <th class="w100"><?php echo \think\Lang::get('store_goods_index_stock'); ?></th>
      <th class="w100"><?php echo \think\Lang::get('ds_handle'); ?></th>
    </tr>
    <?php if(!empty($goods_list)): ?>
    <tr>
      <td class="tc"><input type="checkbox" id="all" class="checkall"/></td>
      <td colspan="10"><label for="all"><?php echo \think\Lang::get('ds_select_all'); ?></label>
        <a href="javascript:void(0);" class="dssc-btn-mini" ds_type="batchbutton" uri="<?php echo url('Sellergoodsonline/drop_goods'); ?>" name="commonid" confirm="<?php echo \think\Lang::get('ds_ensure_del'); ?>"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('ds_del'); ?></a>
        <a href="javascript:void(0);" class="dssc-btn-mini" ds_type="batchbutton" uri="<?php echo url('Sellergoodsoffline/goods_show'); ?>" name="commonid"><?php echo \think\Lang::get('store_goods_index_show'); ?></a>
    </tr>
    <?php endif; ?>
  </thead>
  <tbody>
    <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$val): ?>
    <tr>
      <th class="tc"><input type="checkbox" class="checkitem tc" value="<?php echo $val['goods_commonid']; ?>"/></th>
      <th colspan="20"><?php echo \think\Lang::get('platform_article_number'); ?>：<?php echo $val['goods_commonid']; ?></th>
    </tr>
    <tr>
      <td class="trigger"><i class="tip iconfont" dstype="ajaxGoodsList" data-comminid="<?php echo $val['goods_commonid']; ?>" title="<?php echo \think\Lang::get('click_check_goods'); ?>">&#xe6db;</i></td>
      <td>
          <div class="pic-thumb">
        <a href="<?php echo url('Goods/index',['goods_id'=>$storage_array[$val['goods_commonid']]['goods_id']]); ?>" target="_blank"><img src="<?php echo goods_thumb($val, 240); ?>"/></a>
          </div>
      </td>
      <td class="tl"><dl class="goods-name">
          <dt style="max-width: 450px !important;">
            <?php if($val['is_virtual'] ==1): ?>
            <span class="type-virtual" title="<?php echo \think\Lang::get('virtual_exchange'); ?>"><?php echo \think\Lang::get('virtual'); ?></span>
            <?php endif; if($val['is_goodsfcode'] ==1): ?>
            <span class="type-fcode" title="<?php echo \think\Lang::get('f_code_priority_goods'); ?>"><?php echo \think\Lang::get('sellergoodsadd_f_code'); ?></span>
            <?php endif; if($val['is_presell'] ==1): ?>
            <span class="type-presell" title="<?php echo \think\Lang::get('advance_sale'); ?>"><?php echo \think\Lang::get('sellergoodsadd_presell'); ?></span>
            <?php endif; if($val['is_appoint'] ==1): ?>
            <span class="type-appoint" title="<?php echo \think\Lang::get('book_sales_tips'); ?>"><?php echo \think\Lang::get('sellergoodsadd_make'); ?></span>
            <?php endif; ?>
            <a href="<?php echo url('Goods/index',['goods_id'=>$storage_array[$val['goods_commonid']]['goods_id']]); ?>" target="_blank"><?php echo $val['goods_name']; ?></a></dt>
          <dd><?php echo \think\Lang::get('store_goods_index_goods_no'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo $val['goods_serial']; ?></dd>
          <dd class="serve"> <span class="<?php if($val['goods_commend'] == 1): ?>open<?php endif; ?>" title="<?php echo \think\Lang::get('shop_recommendation'); ?>"><i class="commend"><?php echo \think\Lang::get('commend'); ?></i></span> <span class="<?php if($val['mobile_body'] !=''): ?>open<?php endif; ?>" title="<?php echo \think\Lang::get('details_products_mobile_phones'); ?>"><i class="iconfont">&#xe601;</i></span> <span class="" title="<?php echo \think\Lang::get('product_page_qr_code'); ?>"><i class="iconfont">&#xe72d;</i>
            <div class="QRcode"><a target="_blank" href="<?php echo goods_qrcode(array('goods_id' => $storage_array[$val['goods_commonid']]['goods_id'])); ?>"><?php echo \think\Lang::get('download_label'); ?></a>
              <p><img src="<?php echo goods_qrcode(array('goods_id' => $storage_array[$val['goods_commonid']]['goods_id'])); ?>"/></p>
            </div>
            </span> </dd>
        </dl></td>
      <td><a href="javascript:void(0)" onclick="ds_ajaxget_confirm('<?php echo url('Sellergoodsoffline/goods_show',['commonid'=>$val['goods_commonid']]); ?>','')" class="dssc-btn"><?php echo \think\Lang::get('store_goods_index_show'); ?></a></td>
      <td><span><?php echo \think\Lang::get('currency'); ?><?php echo $val['goods_price']; ?></span></td>
      <td><span><?php echo $storage_array[$val['goods_commonid']]['sum']; ?><?php echo \think\Lang::get('piece'); ?></span></td>
      <td class="dscs-table-handle"><span><a href="<?php echo url('Sellergoodsonline/edit_goods',['commonid'=>$val['goods_commonid']]); ?>" class="btn-blue"><i class="iconfont">&#xe731;</i><p><?php echo \think\Lang::get('ds_edit'); ?></p></a></span>
        <span><a href="javascript:void(0)" onclick="ds_ajaxget_confirm('<?php echo url('Sellergoodsonline/drop_goods',['commonid'=>$val['goods_commonid']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>');" class="btn-red"><i class="iconfont">&#xe725;</i><p><?php echo \think\Lang::get('ds_del'); ?></p></a></span></td>
    </tr>
    <tr style="display:none;"><td colspan="20"><div class="dssc-goods-sku ps-container"></div></td></tr>
    <?php endforeach; endif; else: echo "" ;endif; else: ?>
    <tr>
      <td colspan="20" class="norecord"><div class="warning-option"><i class="iconfont">&#xe64c;</i><span><?php echo \think\Lang::get('no_record'); ?></span></div></td>
    </tr>
    <?php endif; ?>
  </tbody>
    <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): ?>
  <tfoot>
    <tr>
      <th class="tc"><input type="checkbox" id="all2" class="checkall"/></th>
      <th colspan="10"><label for="all2"><?php echo \think\Lang::get('ds_select_all'); ?></label>
        <a href="javascript:void(0);" class="dssc-btn-mini" ds_type="batchbutton" uri="<?php echo url('Sellergoodsonline/drop_goods'); ?>" name="commonid" confirm="<?php echo \think\Lang::get('ds_ensure_del'); ?>"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('ds_del'); ?></a>
        <a href="javascript:void(0);" class="dssc-btn-mini" ds_type="batchbutton" uri="<?php echo url('Sellergoodsoffline/goods_show'); ?>" name="commonid"><?php echo \think\Lang::get('store_goods_index_show'); ?></a></th>
    </tr>
    <tr>
      <td colspan="20"><div class="pagination"><?php echo $show_page; ?></div></td>
    </tr>
  </tfoot>
  <?php endif; ?>
</table>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.poshytip.min.js"></script>
<script src="<?php echo HOME_SITE_ROOT; ?>/js/store_goods_list.js"></script> 
<script>
$(function(){
    //Ajax提示
    $('.tip').poshytip({
        className: 'tip-yellowsimple',
        showTimeout: 1,
        alignTo: 'target',
        alignX: 'center',
        alignY: 'top',
        offsetY: 5,
        allowTipHover: false
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

