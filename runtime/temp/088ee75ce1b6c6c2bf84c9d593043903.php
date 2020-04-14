<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:102:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellertaobaoimport/index.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
<script type="text/javascript">
function pre_submit()
{
	var sels=$("#gcategory").find("select");
	var i=0;
	var txt="";
	 sels.each(function(){
		 i++;
		 $(this).attr("name","cls_"+i);
		 var tmp=$(this).find("option:selected").text();
		 if(i!=3)tmp+="&gt;";
		 txt+=tmp;
		
	 });
	 $("#cate_name").val(txt);
	 return true;
}
</script>
<!-- S setp -->
<ul class="add-goods-step">
  <li style="width:32%;" class="<?php if($step==1): ?>current<?php endif; ?>"><i class="icon iconfont">&#xe600;</i>
    <h6>STIP.1</h6>
    <h2><?php echo \think\Lang::get('store_goods_import_step1'); ?></h2>
    <i class="arrow iconfont">&#xe687;</i> </li>
  <li style="width:32%;" class="<?php if($step==4): ?>current<?php endif; ?>"><i class="icon iconfont">&#xe6a2;</i>
    <h6>STIP.2</h6>
    <h2><?php echo \think\Lang::get('store_goods_import_step2'); ?></h2>
</ul>
<!--S 分类选择区域-->
<!--S 分类选择区域-->
<div class="alert mt15 mb5"><strong>操作提示：</strong>
  <ul>
    <li><?php echo \think\Lang::get('store_goods_import_csv_desc'); ?></li>
  </ul>
</div>
<form method="post" action="<?php echo url('SellerTaobaoImport/index'); ?>" enctype="multipart/form-data" id="goods_form" onsubmit="return pre_submit();">
  <div class="dssc-form-goods"  <?php if(($step != '1')): ?> style="display:none"<?php endif; ?>>
    <dl>
      <dt><i class="required">*</i>CSV文件：</dt>
      <dd>
        <div class="handle">
        <div class="dssc-upload-btn"> <a href="javascript:void(0);"><span>
          <input type="file" hidefocus="true" size="15"  name="csv" id="csv">
          </span></a></div>
          </div>
      </dd>
    </dl>
    <dl>
      <dt><i class="required">*</i><?php echo \think\Lang::get('store_goods_index_goods_class'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd id="gcategory"> <span dstype="gc1">
        <?php if((!empty($gc_list))): ?>
        <select dstype="gc" data-param="{deep:1}">
          <option><?php echo \think\Lang::get('ds_please_choose'); ?></option>
          <?php if(is_array($gc_list) || $gc_list instanceof \think\Collection || $gc_list instanceof \think\Paginator): if( count($gc_list)==0 ) : echo "" ;else: foreach($gc_list as $key=>$val): ?>
          <option value="<?php echo $val['gc_id']; ?>"><?php echo $val['gc_name']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <?php endif; ?>
        </span> <span dstype="gc2"></span> <span dstype="gc3"></span>
        <p>请选择商品分类（必须选到最后一级）</p>
        <input type="hidden" id="gc_id" name="gc_id" value="" class="mls_id" />
        <input type="hidden" id="cate_name" name="cate_name" value="" class="mls_names"/>
        </dd>
    </dl>
    
    <!--transport info begin-->
    
    <dl>
      <dt><?php echo \think\Lang::get('store_goods_index_goods_szd'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd>
        <input type="hidden" value="" name="region" id="region">
          <input type="hidden" value="" name="province_id" id="_area_1">
          <input type="hidden" value="" name="city_id" id="_area_2">
      </dd>
    </dl>
    <dl>
      <dt><?php echo \think\Lang::get('store_goods_index_store_goods_class'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd><span class="new_add"><a href="javascript:void(0)" id="add_sgcategory" class="dssc-btn"><?php echo \think\Lang::get('store_goods_index_new_class'); ?></a> </span>
        <?php if((!empty($store_class_goods))): if(is_array($store_class_goods) || $store_class_goods instanceof \think\Collection || $store_class_goods instanceof \think\Paginator): if( count($store_class_goods)==0 ) : echo "" ;else: foreach($store_class_goods as $key=>$v): ?>
        <select name="sgcate_id[]" class="sgcategory">
          <option value="0"><?php echo \think\Lang::get('ds_please_choose'); ?></option>
          <?php if(is_array($store_goods_class) || $store_goods_class instanceof \think\Collection || $store_goods_class instanceof \think\Paginator): if( count($store_goods_class)==0 ) : echo "" ;else: foreach($store_goods_class as $key=>$val): ?>
          <option value="<?php echo $val['storegc_id']; ?>" <?php if(($v==$val['storegc_id'])): ?>selected="selected"<?php endif; ?>><?php echo $val['storegc_name']; ?></option>
          <?php if((isset($val['child']) && count($val['child'])>0)): if(is_array($val['child']) || $val['child'] instanceof \think\Collection || $val['child'] instanceof \think\Paginator): if( count($val['child'])==0 ) : echo "" ;else: foreach($val['child'] as $key=>$child_val): ?>
          <option value="<?php echo $child_val['storegc_id']; ?>" <?php if(($v==$child_val['storegc_id'])): ?>selected="selected"<?php endif; ?>>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $child_val['storegc_name']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <select name="sgcate_id[]" class="sgcategory">
          <option value="0"><?php echo \think\Lang::get('ds_please_choose'); ?></option>
          <?php if((!empty($store_goods_class))): if(is_array($store_goods_class) || $store_goods_class instanceof \think\Collection || $store_goods_class instanceof \think\Paginator): if( count($store_goods_class)==0 ) : echo "" ;else: foreach($store_goods_class as $key=>$val): ?>
          <option value="<?php echo $val['storegc_id']; ?>"><?php echo $val['storegc_name']; ?></option>
          <?php if((isset($val['child']) && count($val['child'])>0)): if(is_array($val['child']) || $val['child'] instanceof \think\Collection || $val['child'] instanceof \think\Paginator): if( count($val['child'])==0 ) : echo "" ;else: foreach($val['child'] as $key=>$child_val): ?>
          <option value="<?php echo $child_val['storegc_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $child_val['storegc_name']; ?></option>
          <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; endif; ?>
        </select>
        <?php endif; ?>
        <p class="hint"><?php echo \think\Lang::get('store_goods_index_belong_multiple_store_class'); ?></p>
      </dd>
    </dl>
    <dl>
      <dt><?php echo \think\Lang::get('store_goods_import_unicode'); ?></dt>
      <dd>
        <p>unicode </p>
      </dd>
    </dl>
    <dl>
      <dt><?php echo \think\Lang::get('store_goods_import_file_type'); ?></dt>
      <dd>
        <p><?php echo \think\Lang::get('store_goods_import_file_csv'); ?></p>
      </dd>
    </dl>
    <dl>
      <dt>&nbsp;</dt>
      <dd>
        <input type="submit" class="submit" value="<?php echo \think\Lang::get('store_goods_import_submit'); ?>" />
      </dd>
    </dl>
    </ul>
  </div>


</form>
<!--step4-->
<iframe <?php if($step=='4'): ?>style="display:block"<?php else: ?>style="display:none"<?php endif; ?>  id="uploadwjc" src="<?php echo url('SellerTaobaoImport/import_image'); ?>" height="800" width='100%' frameborder="0" >
</iframe>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.ajaxContent.pack.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/mlselection.js"></script>
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/fileupload/jquery.iframe-transport.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/fileupload/jquery.ui.widget.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/fileupload/jquery.fileupload.js" charset="utf-8"></script>

<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.charCount.js"></script>


<!--[if lt IE 8]>
  <script src="<?php echo BASE_SITE_ROOT; ?>/js/json2.js"></script>
<![endif]-->
<script src="<?php echo HOME_SITE_ROOT; ?>/js/sellergoods_add_step2.js"></script>
<script>

$(function() {
$("#region").ds_region({show_deep:2,tip_type:1});

	
    // 查询下级分类，分类不存在显示当前分类绑定的规格
    $('select[dstype="gc"]').change(function(){
        $(this).parents('td:first').nextAll().html('');

        getClassSpec($(this));
    });
});

// ajax选择商品分类
function getClassSpec($this) {
    var id = parseInt($this.val());
    var data_str = ''; eval('data_str =' + $this.attr('data-param'));
    var deep = data_str.deep;
    if (isNaN(id)) {
        // 清理分类
        clearClassHtml(parseInt(deep)+1);
    }
	document.getElementById('gc_id').value=id;
    $.getJSON('<?php echo url("Sellerspec/ajax_class"); ?>?id=' + id + '&deep=' + deep, function(data){
  
        if (data) {
            if (data.type == 'class') {
                nextClass(data.data, data.deep);
            } 
        }
    });
	
}

// 下一级商品分类
function nextClass(data, deep) {
    $('span[dstype="gc' + deep + '"]').html('').append('<select data-param="{deep:' + deep + '}"></select>')
        .find('select').change(function(){
            getClassSpec($(this));
        }).append('<option><?php echo \think\Lang::get('ds_please_choose'); ?></option>');
    $.each(data, function(i, n){
        if (n != null) {
            $('span[dstype="gc' + deep + '"] > select').append('<option value="' + n.gc_id + '">' + n.gc_name + '</option>');
		
        }
			  document.getElementById('gc_id').value=n.gc_id;
    });
    // 清理分类
    clearClassHtml(parseInt(deep)+1);
	
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
