<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:90:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/seller/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
            


<div class="dssc-index">
    <div class="top-container">
        <div class="basic-info">
            <dl class="dssc-seller-info">
                <dt class="store-logo">
                    <a href="<?php echo url('Sellersetting/setting'); ?>"><img src="<?php echo get_store_logo($store_info['store_avatar'],'store_avatar'); ?>"/></a>
                </dt>
                <dd class="seller-name">
                    <h3><?php echo \think\Session::get('seller_name'); ?></h3>
                </dd>
				<dd><?php echo \think\Lang::get('user_name'); ?>：<strong><?php echo \think\Session::get('member_name'); ?></strong></dd>
                <dd><?php echo \think\Lang::get('administrative_rights'); ?>：<strong><?php echo \think\Session::get('seller_group_name'); ?></strong></dd>
                <dd><?php echo \think\Lang::get('last_login'); ?>：<strong><?php echo \think\Session::get('seller_last_logintime'); ?></strong> </dd>
                <dd><?php echo \think\Lang::get('store_name'); ?><?php echo \think\Lang::get('ds_colon'); ?><a href="<?php echo url('Store/index',['store_id'=>\think\Session::get('store_id')]); ?>" ><?php echo $store_info['store_name']; ?></a></dd>
                <dd><?php echo \think\Lang::get('store_store_grade'); ?><?php echo \think\Lang::get('ds_colon'); ?><strong><?php echo $store_info['grade_name']; ?></strong></dd>
                <dd><?php echo \think\Lang::get('store_validity'); ?><?php echo \think\Lang::get('ds_colon'); ?>
                    <strong><?php echo $store_info['store_endtime_text']; if($store_info['reopen_tip']): ?>
                        <a href="<?php echo url('Sellerinfo/reopen'); ?>"><?php echo \think\Lang::get('immediate_renewal'); ?></a>
                        <?php endif; ?>
                    </strong>
                </dd>
            </dl>
            <?php if(!session('is_platform_store')): ?>
            <div class="detail-rate">
                <h5> <strong><?php echo \think\Lang::get('store_dynamic_evaluation'); ?><?php echo \think\Lang::get('ds_colon'); ?></strong> <?php echo \think\Lang::get('compared_industry'); ?> </h5>
                <ul>
                    <?php if(is_array($store_info['store_credit']) || $store_info['store_credit'] instanceof \think\Collection || $store_info['store_credit'] instanceof \think\Paginator): if( count($store_info['store_credit'])==0 ) : echo "" ;else: foreach($store_info['store_credit'] as $key=>$value): ?>
                    <li> <?php echo $value['text']; ?><span class="credit"><?php echo $value['credit']; ?> <?php echo \think\Lang::get('credit_unit'); ?></span> <span class="<?php echo (isset($value['percent_class']) && ($value['percent_class'] !== '')?$value['percent_class']:''); ?>"><i></i><?php echo (isset($value['percent_text']) && ($value['percent_text'] !== '')?$value['percent_text']:''); ?><em><?php echo (isset($value['percent']) && ($value['percent'] !== '')?$value['percent']:''); ?></em></span> </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
            <?php endif; ?>
        </div>
    </div>
  <div class="seller-cont">
      <div class="container type-a">
          <div class="hd">
              <i class="iconfont">&#xe649;</i>
              <h3><?php echo \think\Lang::get('store_owner_info'); ?></h3>
              <h5><?php echo \think\Lang::get('store_notice_info'); ?></h5>
          </div>
          <div class="content">
              <dl class="focus">
                  <dt><?php echo \think\Lang::get('store_product_release'); ?>：</dt>
                  <dd title="<?php echo \think\Lang::get('store_released'); ?>/<?php echo \think\Lang::get('store_publish_goods'); ?>"><em id="ds_goodscount">0</em>&nbsp;/&nbsp;
                      <?php if($store_info['grade_goodslimit'] != 0): ?>
                      <?php echo $store_info['grade_goodslimit']; else: ?>
                      <?php echo \think\Lang::get('store_unlimited'); endif; ?>
                  </dd>
                  <dt><?php echo \think\Lang::get('store_publish_album'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                  <dd><em id="ds_imagecount">0</em>&nbsp;/&nbsp;<?php if($store_info['grade_albumlimit'] >0): ?><?php echo $store_info['grade_albumlimit']; else: ?><?php echo \think\Lang::get('store_unlimited'); endif; ?></dd>
              </dl>
              <ul>
                  <li><a href="<?php echo url('Sellergoodsonline/index'); ?>"><?php echo \think\Lang::get('store_goods_selling'); ?> <strong id="ds_online"></strong></a></li>
                  <?php if(config('goods_verify')): ?>
                  <li><a href="<?php echo url('Sellergoodsoffline/index',['type'=>'wait_verify','verify'=>'10']); ?>" title="<?php echo \think\Lang::get('store_inform30'); ?>"><?php echo \think\Lang::get('release_pending_platform_audit'); ?> <strong id="ds_waitverify"></strong></a></li>
                  <li><a href="<?php echo url('Sellergoodsoffline/index',['type'=>'wait_verify','verify'=>'0']); ?>" title="<?php echo \think\Lang::get('store_inform30'); ?>"><?php echo \think\Lang::get('platform_audit_failed'); ?> <strong id="ds_verifyfail"></strong></a></li>
                  <?php endif; ?>
                  <li><a href="<?php echo url('Sellergoodsoffline/index'); ?>"> <?php echo \think\Lang::get('store_goods_storage'); ?><strong id="ds_offline"></strong></a></li>
                  <li><a href="<?php echo url('Sellergoodsoffline/index',['type'=>'lock_up']); ?>"> <?php echo \think\Lang::get('store_goods_show0'); ?><strong id="ds_lockup"></strong></a></li>
                  <li><a href="<?php echo url('Sellerconsult/index',['type'=>'to_reply']); ?>"><?php echo \think\Lang::get('store_to_consult'); ?> <strong id="ds_consult"></strong></a></li>
              </ul>
          </div>
      </div>
      <div class="container type-b">
          <div class="hd">
              <i class="iconfont">&#xe73b;</i>
              <h3><?php echo \think\Lang::get('merchant_help'); ?></h3>
              <h5></h5>
          </div>
          <div class="content">
              <ul>
                  <?php if(!(empty($help_list) || (($help_list instanceof \think\Collection || $help_list instanceof \think\Paginator ) && $help_list->isEmpty()))): if(is_array($help_list) || $help_list instanceof \think\Collection || $help_list instanceof \think\Paginator): if( count($help_list)==0 ) : echo "" ;else: foreach($help_list as $key=>$val): ?>
                  <li><i class="iconfont">&#xe73b;</i><a target="_blank" href="<?php echo url('Showhelp/index',['t_id'=>$val['helptype_id']]); ?>" title="<?php echo $val['helptype_name']; ?>"><?php echo $val['helptype_name']; ?></a></li>
                  <?php endforeach; endif; else: echo "" ;endif; endif; ?>
              </ul>
              <dl>
                  <dt><?php echo \think\Lang::get('store_site_info'); ?></dt>
                  <?php if(!(empty($phone_array) || (($phone_array instanceof \think\Collection || $phone_array instanceof \think\Paginator ) && $phone_array->isEmpty()))): if(is_array($phone_array) || $phone_array instanceof \think\Collection || $phone_array instanceof \think\Paginator): if( count($phone_array)==0 ) : echo "" ;else: foreach($phone_array as $key=>$val): ?>
                  <dd><?php echo \think\Lang::get('store_site_phone'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo $val; ?></dd>
                  <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                  <dd><?php echo \think\Lang::get('store_site_email'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo \think\Config::get('site_email'); ?></dd>
              </dl>
          </div>
      </div>
      <div class="container type-a">
          <div class="hd">
              <i class="iconfont">&#xe649;</i>
              <h3><?php echo \think\Lang::get('store_business'); ?></h3>
              <h5><?php echo \think\Lang::get('store_business_info'); ?></h5>
          </div>
          <div class="content">
              <dl class="focus">
                  <dt><?php echo \think\Lang::get('store_order_info'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                  <dd><a href="<?php echo url('Sellerorder/index'); ?>"> <?php echo \think\Lang::get('store_order_progressing'); ?><strong id="ds_progressing"></strong></a></dd>
                  <dt><?php echo \think\Lang::get('store_complain_info'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                  <dd><a href="<?php echo url('Sellercomplain/index',['select_complain_state'=>'1']); ?>"><?php echo \think\Lang::get('store_complain'); ?> <strong id="ds_complain"></strong></a></dd>
              </dl>
              <ul>
                  <li><a href="<?php echo url('Sellerorder/index',['state_type'=>'state_new']); ?>"><?php echo \think\Lang::get('store_order_pay'); ?> <strong id="ds_payment"></strong></a></li>
                  <li><a href="<?php echo url('Sellerorder/index',['state_type'=>'state_pay']); ?>"><?php echo \think\Lang::get('store_shipped'); ?> <strong id="ds_delivery"></strong></a></li>
                  <li><a href="<?php echo url('Sellerrefund/index',['lock'=>'2']); ?>"> <?php echo \think\Lang::get('pre_sale_refund'); ?><strong id="ds_refund_lock"></strong></a></li>
                  <li><a href="<?php echo url('Sellerrefund/index',['lock'=>'1']); ?>"> <?php echo \think\Lang::get('after_sale_refund'); ?><strong id="ds_refund"></strong></a></li>
                  <li><a href="<?php echo url('Sellerreturn/index',['lock'=>'2']); ?>"> <?php echo \think\Lang::get('return_before_sale'); ?><strong id="ds_return_lock"></strong></a></li>
                  <li><a href="<?php echo url('Sellerreturn/index',['lock'=>'1']); ?>"> <?php echo \think\Lang::get('return_after_sale'); ?><strong id="ds_return"></strong></a></li>
                  <li><a href="<?php echo url('Sellerbill/index',['bill_state'=>'1']); ?>"> <?php echo \think\Lang::get('bill_confirmed'); ?><strong id="ds_bill_confirm"></strong></a></li>
              </ul>
          </div>
      </div>
      <div class="container type-c">
          <div class="hd">
              <i class="iconfont">&#xe6a3;</i>
              <h3><?php echo \think\Lang::get('sales_statistics'); ?></h3>
              <h5><?php echo \think\Lang::get('statistics_store_order_quantity'); ?></h5>
          </div>
          <div class="content">
              <table class="dssc-default-table">
                  <thead>
                      <tr>
                          <th class="w50"><?php echo \think\Lang::get('store_item'); ?></th>
                          <th><?php echo \think\Lang::get('store_order_quantity'); ?></th>
                          <th class="w100"><?php echo \think\Lang::get('store_order_amount'); ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="bd-line">
                          <td><?php echo \think\Lang::get('store_yesterday_sales_volume'); ?></td>
                          <td><?php if(empty($daily_sales['ordernum'])): ?>--<?php else: ?><?php echo $daily_sales['ordernum']; endif; ?></td>
                          <td><?php if(empty($daily_sales['orderamount'])): ?>--<?php else: ?><?php echo $daily_sales['orderamount']; endif; ?></td>
                      </tr>
                      <tr class="bd-line">
                          <td><?php echo \think\Lang::get('monthly_sales'); ?></td>
                          <td><?php if(empty($monthly_sales['ordernum'])): ?>--<?php else: ?><?php echo $monthly_sales['ordernum']; endif; ?></td>
                          <td><?php if(empty($monthly_sales['orderamount'])): ?>--<?php else: ?><?php echo $monthly_sales['orderamount']; endif; ?></td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
      <div class="container type-c h500">
          <div class="hd">
              <i class="iconfont">&#xe6a3;</i>
              <h3><?php echo \think\Lang::get('single_product_sales_rank'); ?></h3>
              <h5><?php echo \think\Lang::get('grasp_supply_commodities'); ?></h5>
          </div>
          <div class="content">
              <table class="dssc-default-table">
                  <thead>
                      <tr>
                          <th><?php echo \think\Lang::get('store_ranking'); ?></th>
                          <th class="tl" colspan="2"><?php echo \think\Lang::get('commodity_information'); ?></th>
                          <th><?php echo \think\Lang::get('sales_volume'); ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): $i = 0; if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$val): $i++; ?>
                      <tr class="bd-line">
                          <td class="w50"><strong><?php echo $i; ?></strong></td>
                          <td class="w60"><div class="pic-thumb"><a href="<?php echo url('Goods/index',['goods_id'=>$val['goods_id']]); ?>" target="_blank"><img alt="<?php echo $val['goods_name']; ?>" src="<?php echo goods_thumb($val, '240'); ?>"></a></div></td>
                          <td><dl class="goods-name">
                                  <dt><a href="<?php echo url('Goods/index',['goods_id'=>$val['goods_id']]); ?>" target="_blank"><?php echo $val['goods_name']; ?></a></dt>
                              </dl></td>
                          <td class="w60"><?php echo $val['goodsnum']; ?></td>
                      </tr>
                      <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                  </tbody>
              </table>
          </div>
      </div>
      <div class="container type-d h500">
          <div class="hd">
              <i class="iconfont">&#xe704;</i>
              <h3><?php echo \think\Lang::get('store_market_info'); ?></h3>
              <h5><?php echo \think\Lang::get('promotions_boost_sales'); ?></h5>
          </div>
          <div class="content">
              <?php if(config('groupbuy_allow') == 1): ?>
              <dl class="bg-green10">
                  <dt class="left-icon">
                      <i class="iconfont">&#xe732;</i>
                  </dt>
                  <dd class="right-info">
                      <p class="p-name">
                          <a href="<?php echo url('Sellergroupbuy/index'); ?>"><?php echo \think\Lang::get('store_groupbuy'); ?></a>
                          <em>(<?php if(session('is_platform_store') || !empty($groupquota_info)): ?><?php echo \think\Lang::get('store_open'); else: ?><?php echo \think\Lang::get('store_not_open'); endif; ?>)</em>
                      </p>
                      <p class="p-info"><?php echo \think\Lang::get('store_groupbuy_info'); ?></p>
                      <?php if(!(empty($groupquota_info) || (($groupquota_info instanceof \think\Collection || $groupquota_info instanceof \think\Paginator ) && $groupquota_info->isEmpty()))): ?>
                      <p class="p-point">(<?php echo \think\Lang::get('store_renew_charge'); ?>：<?php echo date("Y-m-d",$groupquota_info['groupbuyquota_endtime']); ?>)</p>
                      <?php endif; ?>
                  </dd>
              </dl>
              <?php endif; if(intval(config('promotion_allow')) == 1): ?>
              <dl class="bg-pink3">
                  <dt class="left-icon">
                      <i class="iconfont">&#xe736;</i>
                  </dt>
                  <dd class="right-info">
                      <p class="p-name">
                          <a href="<?php echo url('Sellerpromotionxianshi/index'); ?>"><?php echo \think\Lang::get('store_xianshi'); ?></a>
                          <em>(<?php if(session('is_platform_store') || !empty($xianshiquota_info)): ?><?php echo \think\Lang::get('store_open'); else: ?><?php echo \think\Lang::get('store_not_open'); endif; ?>)</em>
                      </p>
                      <p class="p-info"><?php echo \think\Lang::get('store_xianshi_info'); ?></p>
                      <?php if(!(empty($xianshiquota_info) || (($xianshiquota_info instanceof \think\Collection || $xianshiquota_info instanceof \think\Paginator ) && $xianshiquota_info->isEmpty()))): ?>
                      <p class="p-point">(<?php echo \think\Lang::get('store_renew_charge'); ?>：<?php echo date("Y-m-d",$xianshiquota_info['xianshiquota_endtime']); ?>)</p>
                      <?php endif; ?>
                  </dd>
              </dl>
              <dl class="bg-red2">
                  <dt class="left-icon">
                      <i class="iconfont">&#xe753;</i>
                  </dt>
                  <dd class="right-info">
                      <p class="p-name">
                          <a href="<?php echo url('Sellerpromotionmansong/index'); ?>"><?php echo \think\Lang::get('store_mansong'); ?></a>
                          <em>(<?php if(session('is_platform_store') || !empty($mansongquota_info)): ?><?php echo \think\Lang::get('store_open'); else: ?><?php echo \think\Lang::get('store_not_open'); endif; ?>)</em>
                      </p>
                      <p class="p-info"><?php echo \think\Lang::get('store_mansong_info'); ?></p>
                      <?php if(!(empty($mansongquota_info) || (($mansongquota_info instanceof \think\Collection || $mansongquota_info instanceof \think\Paginator ) && $mansongquota_info->isEmpty()))): ?>
                      <p class="p-point">(<?php echo \think\Lang::get('store_renew_charge'); ?>：<?php echo date("Y-m-d",$mansongquota_info['mansongquota_endtime']); ?>)</p>
                      <?php endif; ?>
                  </dd>
              </dl>
              <dl class="bg-yellow4">
                  <dt class="left-icon">
                      <i class="iconfont">&#xe666;</i>
                  </dt>
                  <dd class="right-info">
                      <p class="p-name">
                          <a href="<?php echo url('Sellerpromotionbundling/index'); ?>"><?php echo \think\Lang::get('store_bundling'); ?></a>
                          <em>(<?php if(session('is_platform_store') || !empty($binglingquota_info)): ?><?php echo \think\Lang::get('store_open'); else: ?><?php echo \think\Lang::get('store_not_open'); endif; ?>)</em>
                      </p>
                      <p class="p-info"><?php echo \think\Lang::get('store_bundling_info'); ?></p>
                      <?php if(!(empty($binglingquota_info) || (($binglingquota_info instanceof \think\Collection || $binglingquota_info instanceof \think\Paginator ) && $binglingquota_info->isEmpty()))): ?>
                      <p class="p-point">(<?php echo \think\Lang::get('store_renew_charge'); ?>：<?php echo date("Y-m-d",$binglingquota_info['blquota_endtime']); ?>)</p>
                      <?php endif; ?>
                  </dd>
              </dl>
              <dl class="bg-purple3">
                  <dt class="left-icon">
                      <i class="iconfont">&#xe729;</i>
                  </dt>
                  <dd class="right-info">
                      <p class="p-name">
                          <a href="<?php echo url('Sellerpromotionbooth/index'); ?>"><?php echo \think\Lang::get('store_recommended_booth'); ?></a>
                          <em>(<?php if(session('is_platform_store') || !empty($boothquota_info)): ?><?php echo \think\Lang::get('store_open'); else: ?><?php echo \think\Lang::get('store_not_open'); endif; ?>)</em>
                      </p>
                      <p class="p-info"><?php echo \think\Lang::get('store_activity_info'); ?></p>
                      <?php if(!(empty($boothquota_info) || (($boothquota_info instanceof \think\Collection || $boothquota_info instanceof \think\Paginator ) && $boothquota_info->isEmpty()))): ?>
                      <p class="p-point">(<?php echo \think\Lang::get('store_renew_charge'); ?>：<?php echo date("Y-m-d",$boothquota_info['boothquota_endtime']); ?>)</p>
                      <?php endif; ?>
                  </dd>
              </dl>
              <?php endif; if(config('voucher_allow') == 1): ?>
              <dl class="bg-orange5">
                  <dt class="left-icon">
                      <i class="iconfont">&#xe65c;</i>
                  </dt>
                  <dd class="right-info">
                      <p class="p-name">
                          <a href="<?php echo url('Sellervoucher/templatelist'); ?>"><?php echo \think\Lang::get('store_voucher'); ?></a>
                          <em>(<?php if(session('is_platform_store') || !empty($voucherquota_info)): ?><?php echo \think\Lang::get('store_open'); else: ?><?php echo \think\Lang::get('store_not_open'); endif; ?>)</em>
                      </p>
                      <p class="p-info"><?php echo \think\Lang::get('store_voucher_info'); ?></p>
                      <?php if(!(empty($voucherquota_info) || (($voucherquota_info instanceof \think\Collection || $voucherquota_info instanceof \think\Paginator ) && $voucherquota_info->isEmpty()))): ?>
                      <p class="p-point">(<?php echo \think\Lang::get('store_renew_charge'); ?>：<?php echo date("Y-m-d",$voucherquota_info['voucherquota_endtime']); ?>)</p>
                      <?php endif; ?>
                  </dd>
              </dl>
              <?php endif; ?>
          </div>
      </div>
  </div>
</div>
<script>
$(function(){
	var timestamp=Math.round(new Date().getTime()/1000/60);//异步URL一分钟变化一次
    $.getJSON(HOMESITEURL+'/Seller/statistics.html?rand='+timestamp, null, function(data){
        if (data == null) return false;
        for(var a in data) {
            if(data[a] != 'undefined' && data[a] != 0) {
                var tmp = '';
                if (a != 'goodscount' && a != 'imagecount') {
                    $('#ds_'+a).parents('a').addClass('num');
                }
                $('#ds_'+a).html(data[a]);
            }
        }
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

