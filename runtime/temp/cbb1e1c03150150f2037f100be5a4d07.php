<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:96:"/usr/local/var/www/dsmall/public/../application/home/view/default/store/default/store/index.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/base_store.html";i:1574757822;s:74:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_top.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/store_header.html";i:1574757822;s:91:"/usr/local/var/www/dsmall/application/home/view/default/store/default/store/store_info.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_server.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo (isset($html_title) && ($html_title !== '')?$html_title:\think\Config::get('site_name')); ?></title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand" />
        <meta name="keywords" content="<?php echo (isset($seo_keywords) && ($seo_keywords !== '')?$seo_keywords:''); ?>" />
        <meta name="description" content="<?php echo (isset($seo_description) && ($seo_description !== '')?$seo_description:''); ?>" />
        <link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/common.css">
        <link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/home_header.css">
        <script>
            var BASESITEROOT = "<?php echo BASE_SITE_ROOT; ?>";
            var HOMESITEROOT = "<?php echo HOME_SITE_ROOT; ?>";
            var BASESITEURL = "<?php echo BASE_SITE_URL; ?>";
            var HOMESITEURL = "<?php echo HOME_SITE_URL; ?>";
            var TIMESTAMP = "<?php echo TIMESTAMP; ?>";
        </script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery-2.1.4.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/common.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.validate.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/additional-methods.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/layer/layer.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
    </head>
    <body>
        <div id="append_parent"></div>
        <div id="ajaxwaitid"></div>
        <?php if(\think\Request::instance()->action() == 'index' && \think\Request::instance()->controller() == 'Index'): $ap_id =21;$ad_position = db("advposition")->cache(3600)->column("ap_id,ap_name,ap_width,ap_height","ap_id");$result = db("adv")->where("ap_id=$ap_id  and adv_enabled = 1 and adv_startdate < 1586833200 and adv_enddate > 1586833200 ")->order("adv_sort desc")->cache(3600)->limit("1")->select();
if(!in_array($ap_id,array_keys($ad_position)) && $ap_id)
{
  db("advposition")->insert(array(
         "ap_id"=>$ap_id,
         "ap_name"=>request()->module()."/".request()->controller()."/".request()->action()."页面自动增加广告位 $ap_id ",
  ));
  $ad_position[$ap_id]=array();
  \think\Cache::clear();  
}


$c = 1- count($result); //  如果要求数量 和实际数量不一样 并且编辑模式
if($c > 0 && input("get.edit_ad"))
{
    for($i = 0; $i < $c; $i++) // 还没有添加广告的时候
    {
      $result[] = array(
          "adv_id" => 0,
          "adv_code" => "/public/images/not_adv.jpg",
          "adv_link" => ADMIN_SITE_URL."/Adv/adv_add/ap_id/$ap_id.html",
          "adv_title"   =>"暂无广告图片",
          "not_adv" => 1,
          "adv_target" => "_self",
          "ap_id"   =>$ap_id,
      );  
    }
}

foreach($result as $key=>$v):       

    $v["position"] = $ad_position[$v["ap_id"]]; 
    $v["adv_link"] = HOME_SITE_URL."/Advclick/Advclick/adv_id/".$v["adv_id"].".html";
    $v["adv_target"] = "_blank"; 
    if(input("get.edit_ad") && !isset($v["not_adv"]) )
    {
        
        $v["style"] = "filter:alpha(opacity=50); -moz-opacity:0.5; -khtml-opacity: 0.5; opacity: 0.5"; // 广告半透明的样式
        $v["adv_link"] = ADMIN_SITE_URL."/Adv/adv_edit/adv_id/".$v['adv_id'].".html";
        $v["adv_title"] = $ad_position[$v["ap_id"]]["ap_name"]."===".$v["adv_title"];
        $v["adv_target"] = "_self";
        $v["adv_style"] = "filter:alpha(opacity=30); -moz-opacity:0.3; -khtml-opacity: 0.3; opacity: 0.3";
    }
    ?>
        <div style="background:<?php echo (isset($v['adv_bgcolor']) && ($v['adv_bgcolor'] !== '')?$v['adv_bgcolor']:''); ?>;">
            <div class="w1200">
                <a href="<?php echo $v['adv_link']; ?>" target="<?php echo $v['adv_target']; ?>" title="<?php echo $v['adv_title']; ?>"><img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_ADV; ?>/<?php echo $v['adv_code']; ?>" width="1200"/></a>
            </div>
        </div>
        <?php endforeach; endif; ?>
        <div class="public-top">
            <div class="w1200">
                <span class="top-link">
                    <?php echo \think\Lang::get('welcome_to'); ?> <em><?php echo \think\Config::get('site_name'); ?></em>
                </span>
                <ul class="login-regin">
                    <?php if(\think\Session::get('member_id')): ?>
                    <li class="line"> <a href="<?php echo url('Member/index'); ?>"><?php echo \think\Session::get('member_name'); ?></a></li>
                    <li> <a href="<?php echo url('Login/Logout'); ?>"><?php echo \think\Lang::get('exit'); ?></a></li>
                    <?php else: ?>
                    <li class="line"> <a href="<?php echo url('Login/login'); ?>"><?php echo \think\Lang::get('please_log'); ?></a></li>
                    <li> <a href="<?php echo url('Login/register'); ?>"><?php echo \think\Lang::get('free_registration'); ?></a></li>
                    <?php endif; ?>
                </ul>
                <span class="top-link">
                    <strong style="margin-left:30px;"><?php echo \think\Lang::get('ds_attention'); ?><a href="http://www.csdeshang.com" target="_blank">www.csdeshang.com</a> <?php echo \think\Lang::get('ds_continuous_update'); ?></strong>&nbsp;
                    <?php echo \think\Lang::get('ds_purchase_authorization'); ?>：<a target="_blank" href="<?php echo HTTP_TYPE; ?>wpa.qq.com/msgrd?v=3&uin=858761000&site=qq&menu=yes"><img border="0" src="<?php echo HTTP_TYPE; ?>wpa.qq.com/pa?p=2:858761000:51" alt="<?php echo \think\Lang::get('click_here_send_message'); ?>" title="<?php echo \think\Lang::get('click_here_send_message'); ?>"/></a>
                </span>
                <ul class="quick_list">
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="<?php echo url('Member/index'); ?>"><?php echo \think\Lang::get('ds_user_center'); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <li><a href="<?php echo url('Memberorder/index'); ?>"><?php echo \think\Lang::get('ds_buying_goods'); ?></a></li>
                                <li><a href="<?php echo url('Memberfavorites/fglist'); ?>"><?php echo \think\Lang::get('ds_care_about'); ?></a></li>
                                <li><a href="<?php echo url('Memberfavorites/fslist'); ?>"><?php echo \think\Lang::get('ds_the_shop'); ?></a></li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="<?php echo url('Seller/index'); ?>"><?php echo \think\Lang::get('business_center'); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <?php if(\think\Session::get('seller_id')): ?>
                                <li><a href="<?php echo url('Seller/index'); ?>"><?php echo \think\Lang::get('ds_shop_overview'); ?></a></li>
                                <li><a href="<?php echo url('Sellerorder/index'); ?>"><?php echo \think\Lang::get('ds_member_path_store_order'); ?></a></li>
                                <li><a href="<?php echo url('Sellergoodsonline/index'); ?>"><?php echo \think\Lang::get('promotion_goods_manage'); ?></a></li>
                                <?php else: ?>
                                <li><a href="<?php echo url('Showjoinin/index'); ?>"><?php echo \think\Lang::get('tenants'); ?></a></li>
                                <li><a href="<?php echo url('Sellerlogin/login'); ?>"><?php echo \think\Lang::get('merchant_login'); ?></a></li>
                                <?php endif; ?>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="<?php echo url('Memberfavorites/fglist'); ?>"><?php echo \think\Lang::get('ds_favorites'); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <li><a href="<?php echo url('Memberfavorites/fglist'); ?>"><?php echo \think\Lang::get('ds_merchandise_collection'); ?></a></li>
                                <li><a href="<?php echo url('Memberfavorites/fslist'); ?>"><?php echo \think\Lang::get('ds_store_collect'); ?></a></li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="javascript:void(0)"><?php echo \think\Lang::get('ds_customer_center'); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <li><a href="<?php echo url('Article/index',['ac_id'=>2]); ?>"><?php echo \think\Lang::get('ds_help_center'); ?></a></li>
                                <li><a href="<?php echo url('Article/index',['ac_id'=>5]); ?>"><?php echo \think\Lang::get('ds_after_sales_service'); ?></a></li>
                                <li><a href="<?php echo url('Article/index',['ac_id'=>6]); ?>"><?php echo \think\Lang::get('ds_complaint_center'); ?></a></li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="javascript:void(0)"><?php echo \think\Lang::get('ds_fast_nav'); ?><b></b></a>
                        <div class="dropdown-menu">
                            <ol>
                                <?php foreach($navs['header'] as $nav): ?>
                                <li>
                                    <a href="<?php echo $nav['nav_url']; ?>" <?php if($nav['nav_new_open'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $nav['nav_title']; ?></a>
                                </li>
                                <?php endforeach; ?>
                            </ol>
                        </div>
                    </li>
                    <li class="moblie-qrcode">
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="javascript:void(0)"><?php echo \think\Lang::get('wechat_end'); ?></a>
                        <div class="dropdown-menu">
                            <img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo \think\Config::get('site_logowx'); ?>" width="90" height="90" />
                        </div>
                    </li>
                    <!--
                    <li class="app-qrcode">
                        <span class="outline"></span>
                        <span class="blank"></span>
                        <a href="javascript:void(0)">APP</a>
                        <div class="dropdown-menu">
                            <img width="90" height="90" src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo \think\Config::get('site_logowx'); ?>" />
                            <h3>扫描二维码</h3>
                            <p>下载手机客户端</p>
                        </div>
                    </li>
                    -->
                </ul>
            </div>
        </div>
        
        
        
        <!--左侧导航栏-->
<div class="ds-appbar">
    <div class="ds-appbar-tabs" id="appBarTabs">
        <?php if(\think\Session::get('is_login')): ?>
        <div class="user" dstype="a-barUserInfo">
            <div class="avatar"><img src="<?php echo get_member_avatar(\think\Session::get('avatar')); ?>?<?php echo TIMESTAMP; ?>"/></div>
            <p><?php echo \think\Lang::get('sns_me'); ?></p>
        </div>
        <div class="user-info" dstype="barUserInfo" style="display:none;"><i class="arrow"></i>
            <div class="avatar"><img src="<?php echo get_member_avatar(\think\Session::get('avatar')); ?>?<?php echo TIMESTAMP; ?>"/></div>
            <dl>
                <dt>Hi, <?php echo \think\Session::get('member_name'); ?></dt>
                <dd><?php echo \think\Lang::get('ds_current_level'); ?>：<strong dstype="barMemberGrade"><?php echo \think\Session::get('level_name'); ?></strong></dd>
                <dd><?php echo \think\Lang::get('ds_current_experience'); ?>：<strong dstype="barMemberExp"><?php echo \think\Session::get('member_exppoints'); ?></strong></dd>
            </dl>
        </div>
       <?php else: ?>
        <div class="user TA_delay" dstype="a-barLoginBox">
            <div class="avatar TA"><img src="<?php echo get_member_avatar(\think\Session::get('avatar')); ?>?<?php echo TIMESTAMP; ?>"/></div>
            <p class="TA"><?php echo \think\Lang::get('login_notlogged'); ?></p>
        </div>
        <?php endif; ?>
        <ul class="tools">
            <?php if(\think\Config::get('node_site_use') == '1'): ?>
            <li><a href="javascript:void(0);" id="chat_show_user" class="chat TA_delay"><span class="iconfont">&#xe71b;</span><span class="tit"><?php echo \think\Lang::get('ds_chat'); ?></span><i id="new_msg" class="new_msg" style="display:none;"></i></a></li>
            <?php endif; ?>
            <li><a href="javascript:void(0);" onclick="toglle_bar('rtoolbar_cart')" id="rtoolbar_cart" class="cart TA_delay"><span class="iconfont">&#xe69a;</span><span class="tit"><?php echo \think\Lang::get('ds_cart'); ?></span><i id="rtoobar_cart_count" class="new_msg" style="display:none;"></i></a></li>
            <li><a href="javascript:void(0);" onclick="toglle_bar('compare')" id="compare" class="compare TA_delay"><span class="iconfont">&#xe74a;</span><span class="tit"><?php echo \think\Lang::get('ds_comparison'); ?></span></a></li>
            <li>
                <a href="javascript:void(0);" id="qrcode" class="qrcode TA_delay"><span class="iconfont">&#xe72d;</span>
                    <span class="tit-box">
                        <?php echo \think\Lang::get('ds_mobile_shopping_better'); ?><br>
                        <img src="<?php echo HOME_SITE_URL; ?>/qrcode?url=<?php echo \think\Config::get('h5_site_url'); ?>" width="110" height="110" />
                        <em class="tips_arrow"></em>
                    </span>
                </a>
            </li>
            <li><a href="javascript:void(0);" onclick="$('html,body').animate({scrollTop: '0px'}, 500)" id="gotop" class="gotop TA_delay" style="position: fixed;bottom: 0"><span class="iconfont">&#xe724;</span><span class="tit"><?php echo \think\Lang::get('ds_top'); ?></span></a></li>
        </ul>
        <div class="content-box" id="content-compare">
            <div class="top">
                <h3><?php echo \think\Lang::get('ds_comparison'); ?></h3>
                <a href="javascript:void(0);" class="close iconfont" title="<?php echo \think\Lang::get('ds_hidden'); ?>">&#xe73d;</a></div>
            <div id="comparelist"></div>
        </div>
        <div class="content-box" id="content-cart">
            <div class="top">
                <h3><?php echo \think\Lang::get('ds_my_shopping_cart'); ?></h3>
                <a href="javascript:void(0);" class="close iconfont" title="<?php echo \think\Lang::get('ds_hidden'); ?>">&#xe73d;</a></div>
            <div id="rtoolbar_cartlist"></div>
        </div>
    </div>
</div>
        
<script type="text/javascript">

    //动画显示边条内容区域
    $(function() {
        $(".close").click(function(){
            close_bar();
        });
        // 右侧bar用户信息
        $('div[dstype="a-barUserInfo"]').click(function(){
            $('div[dstype="barUserInfo"]').toggle();
        });
        // 右侧bar登录
        $('div[dstype="a-barLoginBox"]').click(function(){
            login_dialog();
        });

        <?php if($cart_goods_num > 0): ?>
            $('#rtoobar_cart_count').html(<?php echo $cart_goods_num; ?>).show();
        <?php endif; ?>
    });
    function toglle_bar(item){
        //判断侧边栏是否已拉出
        if(parseInt($('.ds-appbar').css('width')) == 36){
            $('.ds-appbar').css('width','306px');
        }
        //判断选中项是否已显示
        if(!$("#"+item).hasClass('active')){
            $('.tools li > a').removeClass('active');
            $("#"+item).addClass('active');
            $('.content-box').removeClass('active');
            
            switch(item){
                case 'rtoolbar_cart':
                    $("#rtoolbar_cartlist").load("<?php echo url('Cart/ajax_load','type=html'); ?>");
                    $("#content-cart").addClass('active');
                    break;
                case 'compare':   
                    loadCompare(false);
                    $("#content-compare").addClass('active');
                    break;
            }
        }else{
            //关闭
            close_bar();
            $(".chat-list").css("display",'none');
        }
        
    }
    function close_bar(){
        $('.tools li > a').removeClass('active');
        $('.content-box').removeClass('active');
        $('.ds-appbar').css('width','36px');
    }
</script> 

        <link rel="stylesheet" href="<?php echo BASE_SITE_ROOT; ?>/static/home/default/store/styles/default/css/base.css">
        <link rel="stylesheet" href="<?php echo BASE_SITE_ROOT; ?>/static/home/default/store/styles/default/css/shop.css">
        <div class="header">
            <div class="w1200">
                    <div class="logo store_logo_wrap">
                        <a href="<?php echo url('Index/index'); ?>">
                            <img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo \think\Config::get('site_logo'); ?>"/>
                        </a>
                        <a class="store_logo" href="<?php echo url('Store/index',['store_id'=>$store_info['store_id']]); ?>">
                            <img src="<?php echo get_store_logo($store_info['store_avatar'],'store_avatar'); ?>" alt="<?php echo $store_info['store_name']; ?>" title="<?php echo $store_info['store_name']; ?>" />
                        </a>
                        <div class="shop_info">
                            <div class="shop_name"><?php echo $store_info['store_name']; ?></div>
                            <div class="shop_main">
                                    <ul >
                                        <?php if(!(empty($store_info['store_credit']) || (($store_info['store_credit'] instanceof \think\Collection || $store_info['store_credit'] instanceof \think\Paginator ) && $store_info['store_credit']->isEmpty()))): if(is_array($store_info['store_credit']) || $store_info['store_credit'] instanceof \think\Collection || $store_info['store_credit'] instanceof \think\Paginator): if( count($store_info['store_credit'])==0 ) : echo "" ;else: foreach($store_info['store_credit'] as $key=>$value): ?>
                                        <li>
                                            <p><?php echo $value['text']; ?></p><span class="credit"><?php echo $value['credit']; ?> <?php echo \think\Lang::get('credit_unit'); ?></span>
                                        </li>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </ul>
                            </div>
                            <div class="triangle"><i></i></div>
                            <div class="extra-info clearfix">
                                <div class="left">
                                    <div class="shop-collect">
                                        <div class="shop_logo"> <img src="<?php echo get_store_logo($store_info['store_avatar'],'store_avatar'); ?>" alt="<?php echo $store_info['store_name']; ?>" title="<?php echo $store_info['store_name']; ?>" /></div>
                                        <a class="collect-btn" href="javascript:collect_store('<?php echo $store_info['store_id']; ?>','count','store_collect')" ><?php echo \think\Lang::get('ds_collect'); ?></a>
                                    </div>
                                    <div class="shop-qr-code">
                                        <img src="<?php echo HOME_SITE_URL; ?>/qrcode?url=<?php echo \think\Config::get('h5_site_url'); ?>/home/storedetail?id=<?php echo $store_info['store_id']; ?>">
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="dss-detail-rate">
                                        <h4><?php echo \think\Lang::get('ds_dynamic_evaluation'); ?></h4>
                                        <ul>
                                            <?php if(!(empty($store_info['store_credit']) || (($store_info['store_credit'] instanceof \think\Collection || $store_info['store_credit'] instanceof \think\Paginator ) && $store_info['store_credit']->isEmpty()))): if(is_array($store_info['store_credit']) || $store_info['store_credit'] instanceof \think\Collection || $store_info['store_credit'] instanceof \think\Paginator): if( count($store_info['store_credit'])==0 ) : echo "" ;else: foreach($store_info['store_credit'] as $key=>$value): ?>
                                            <li> <?php echo $value['text']; ?>：<span class="credit"><?php echo $value['credit']; ?> <?php echo \think\Lang::get('credit_unit'); ?></span>
                                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                        </ul>
                                    </div>
                                    <div class="extend ">
                                        <h4><?php echo \think\Lang::get('shop_service'); ?></h4>
                                        <dl class="no-border">
                                            <dt class="fl"><span class="t_adjust"><?php echo \think\Lang::get('seller_name'); ?></span><span>：</span></dt>
                                            <dd class="fl"><?php echo $store_info['seller_name']; ?></dd>
                                        </dl>
                                        <dl class="no-border">
                                            <dt class="fl"><span class="t_adjust"><?php echo \think\Lang::get('company_name'); ?></span><span>：</span></dt>
                                            <dd class="fl"><?php echo $store_info['store_company_name']; ?></dd>
                                        </dl>
                                        <dl class="no-border">
                                            <dt class="fl"><span class="t_adjust"><?php echo \think\Lang::get('ds_srore_location'); ?></span><span>：</span></dt>
                                            <dd class="fl"><?php echo $store_info['area_info']; ?></dd>
                                        </dl>
                                        <?php if(!(empty($store_info['store_phone']) || (($store_info['store_phone'] instanceof \think\Collection || $store_info['store_phone'] instanceof \think\Paginator ) && $store_info['store_phone']->isEmpty()))): ?>
                                        <dl class="no-border">
                                            <dt class="fl"><span class="t_adjust"><?php echo \think\Lang::get('phone_space'); ?></span><span>：</span></dt>
                                            <dd class="fl"><?php echo $store_info['store_phone']; ?></dd>
                                        </dl>
                                        <?php endif; ?>
                                        <dl>
                                            <dt class="fl"><span class="t_adjust"><?php echo \think\Lang::get('business_licence_number_electronic'); ?></span><span>：</span></dt>
                                            <dd class="fl">
                                                <?php if(!$store_info['is_platform_store']): if($store_info['business_licence_number_electronic']): ?>
                                                <a href="<?php echo $store_info['business_licence_number_electronic']; ?>" target="_blank"><?php echo \think\Lang::get('ds_view'); ?></a>
                                                <?php endif; else: if(\think\Config::get('business_licence')): ?>
                                                <a href="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo \think\Config::get('business_licence'); ?>" target="_blank"><?php echo \think\Lang::get('ds_view'); ?></a>
                                                <?php endif; endif; ?>
                                            </dd>
                                        </dl>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="search" class="head-search-bar">
                        <form class="search-form" id="store_search_form" method="get" action="<?php echo url('Store/goods_all'); ?>">
                            <input type="hidden" value="<?php echo \think\Request::instance()->param('store_id'); ?>" name="store_id">
                            <input placeholder="<?php echo \think\Lang::get('search_merchandise_keywords'); ?>" name="inkeyword" id="keyword" type="text" class="input-text" value="<?php echo \think\Request::instance()->param('inkeyword'); ?>" maxlength="60" />
                            <a href="javascript:$('#store_search_form').submit()" class="input-submit shop"><?php echo \think\Lang::get('search_shop'); ?></a>
                            <a href="javascript:void(0)" class="input-submit all"><?php echo \think\Lang::get('search_all'); ?></a>
                        </form>
                    </div>
            </div>
        </div>
        <div class="banner" style="background-image: url(<?php if($store_info['store_banner']): ?><?php echo get_store_logo($store_info['store_banner'],'store_banner'); else: ?><?php echo BASE_SITE_ROOT; ?>/static/home/default/store/styles/default/images/header.jpg<?php endif; ?>)">
            <div class="w1200"></div>
        </div>
        <div class="dss-nav">
            <div class="w1200">
                <ul>
                    <li><a href="<?php echo url('Store/index',['store_id'=>$store_info['store_id']]); ?>"><span><?php echo \think\Lang::get('ds_store_index'); ?><i></i></span></a></li>
                    <li><a href="<?php echo url('Store/goods_all',['store_id'=>$store_info['store_id']]); ?>"><span><?php echo \think\Lang::get('ds_whole_goods'); ?><i></i></span></a></li>
                    <li><a href="<?php echo url('Storesnshome/index',['sid'=>$store_info['store_id']]); ?>"><span><?php echo \think\Lang::get('ds_store_the_dynamic'); ?><i></i></span></a></li>
                    <?php if(!(empty($store_navigation_list) || (($store_navigation_list instanceof \think\Collection || $store_navigation_list instanceof \think\Paginator ) && $store_navigation_list->isEmpty()))): if(is_array($store_navigation_list) || $store_navigation_list instanceof \think\Collection || $store_navigation_list instanceof \think\Paginator): if( count($store_navigation_list)==0 ) : echo "" ;else: foreach($store_navigation_list as $key=>$value): if($value['storenav_url'] != ''): ?>
                    <li class=""><a href="<?php echo $value['storenav_url']; ?>"><span><?php echo $value['storenav_title']; ?><i></i></span></a></li>
                    <?php else: ?>
                    <li class=""><a href="<?php echo url('Store/article',['store_id'=>$store_info['store_id'],'storenav_id'=>$value['storenav_id']]); ?>"><span><?php echo $value['storenav_title']; ?><i></i></span></a></li>
                    <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
                </ul>
            </div>
        </div>
        

        
        <!--面包屑导航 BEGIN-->
        <?php if(!(empty($nav_link_list) || (($nav_link_list instanceof \think\Collection || $nav_link_list instanceof \think\Paginator ) && $nav_link_list->isEmpty()))): ?>
        <div class="dsh-breadcrumb-layout">
            <div class="dsh-breadcrumb w1200"><i class="iconfont">&#xe6ff;</i>
                <?php foreach($nav_link_list as $nav_link): if(empty($nav_link['link']) || (($nav_link['link'] instanceof \think\Collection || $nav_link['link'] instanceof \think\Paginator ) && $nav_link['link']->isEmpty())): ?>
                <span><?php echo $nav_link['title']; ?></span>
                <?php else: ?>
                <span><a href="<?php echo $nav_link['link']; ?>"><?php echo $nav_link['title']; ?></a></span><span class="arrow">></span>
                <?php endif; endforeach; ?>
            </div>
        </div>
        <?php endif; ?>
        <!--面包屑导航 END-->
        <script>
            $(".head-search-bar .all").click(function(){
                var url = HOMESITEURL+"/Search/index";
                $("#store_search_form").attr('action',url);
                $("#store_search_form").submit();
            })
        </script>

        







<div class="w1200 mt20">
    <div class="ds_side">
        <div class="dss-info">
    <div class="title">
        <h4><?php if($store_info['is_platform_store']): ?><em><?php echo \think\Lang::get('platform_store'); ?></em><?php else: ?><img src="<?php echo HOME_SITE_ROOT; ?>/images/store_grade/<?php echo $store_info['grade_id']; ?>.png" class="pngFix"><?php endif; ?>&nbsp;<a href="<?php echo url('Store/index',['store_id'=>$store_info['store_id']]); ?>" ><?php echo $store_info['store_name']; ?></a>
        <span member_id="<?php echo $store_info['member_id']; ?>"></span>
        <?php if(isset($store_info['member_id']) || !empty($store_info['store_qq']) || !empty($store_info['store_ww'])): if(!(empty($store_info['store_qq']) || (($store_info['store_qq'] instanceof \think\Collection || $store_info['store_qq'] instanceof \think\Paginator ) && $store_info['store_qq']->isEmpty()))): ?>
                <a target="_blank" href="<?php echo HTTP_TYPE; ?>wpa.qq.com/msgrd?v=3&uin=<?php echo $store_info['store_qq']; ?>&site=qq&menu=yes" title="QQ: <?php echo $store_info['store_qq']; ?>"><img border="0" src="<?php echo HTTP_TYPE; ?>wpa.qq.com/pa?p=2:<?php echo $store_info['store_qq']; ?>:52" style=" vertical-align: middle;"/></a>
                <?php endif; if(!(empty($store_info['store_ww']) || (($store_info['store_ww'] instanceof \think\Collection || $store_info['store_ww'] instanceof \think\Paginator ) && $store_info['store_ww']->isEmpty()))): ?>
                <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid=<?php echo $store_info['store_ww']; ?>&site=cntaobao&s=1" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $store_info['store_ww']; ?>&site=cntaobao&s=2" alt="<?php echo \think\Lang::get('ds_message_me'); ?>" style=" vertical-align: middle;"/></a>
                <?php endif; endif; ?>        
        </h4>
    </div>
    <div class="content">
        <dl class="all-rate">
            <dt><span class="t_adjust"><?php echo \think\Lang::get('comprehensive_score'); ?></span><span>：</span></dt>
            <dd>
                <div class="rating"><span style="width: <?php echo $store_info['store_credit_percent']; ?>%"></span></div>
                <em><?php echo $store_info['store_credit_average']; ?></em><?php echo \think\Lang::get('credit_unit'); ?></dd>
        </dl>
        <div class="dss-detail-rate">
            <h5><?php echo \think\Lang::get('ds_dynamic_evaluation'); ?>：</h5>
            <ul>
                <?php if(!(empty($store_info['store_credit']) || (($store_info['store_credit'] instanceof \think\Collection || $store_info['store_credit'] instanceof \think\Paginator ) && $store_info['store_credit']->isEmpty()))): if(is_array($store_info['store_credit']) || $store_info['store_credit'] instanceof \think\Collection || $store_info['store_credit'] instanceof \think\Paginator): if( count($store_info['store_credit'])==0 ) : echo "" ;else: foreach($store_info['store_credit'] as $key=>$value): ?>
                <li> <?php echo $value['text']; ?><span class="credit"><?php echo $value['credit']; ?> <?php echo \think\Lang::get('credit_unit'); ?></span>
                    <?php if(isset($value['percent_class'])): ?>
                    <span class="<?php echo $value['percent_class']; ?>"><i></i><?php echo $value['percent_text']; ?><em><?php echo $value['percent']; ?></em></span> </li>
                <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </div>
        
        <!--只有实名认证实体店认证后才显示保障体系-->
          <?php if($store_info['store_baozh']): ?>
        <dl class="messenger">
            <dt><span class="t_adjust"><?php echo \think\Lang::get('merchant_guarantee'); ?></span><span>：</span></dt>
            <dd>
                <!--新加的保障-->
                <?php if($store_info['store_shiti']): ?>
                <span id="certMatershiti" class="text-hidden fl ml5" title="<?php echo \think\Lang::get('physical_certification'); ?>"></span>
                <?php endif; if($store_info['store_qtian']): ?>
                <span id="certMaterqtian" class="text-hidden fl ml5" title="<?php echo \think\Lang::get('physical_filming'); ?>"></span>
                <?php endif; if($store_info['store_zhping']): ?>
                <span id="certMaterzhping" class="text-hidden fl ml5" title="<?php echo \think\Lang::get('genuine_protection'); ?>"></span>
                <?php endif; if($store_info['store_erxiaoshi']): ?>
                <span id="certMatererxiaoshi" class="text-hidden fl ml5" title="<?php echo \think\Lang::get('delivery_within_hours'); ?>"></span>
                <?php endif; if($store_info['store_tuihuo']): ?>
                <span id="certMatertuihuo" class="text-hidden fl ml5" title="<?php echo \think\Lang::get('return_commitment'); ?>"></span>
                <?php endif; if($store_info['store_shiyong']): ?>
                <span id="certMatershiyong" class="text-hidden fl ml5" title="<?php echo \think\Lang::get('trial_center'); ?>"></span>
                <?php endif; if($store_info['store_xiaoxie']): ?>
                <span id="certMaterxiaoxie" class="text-hidden fl ml5" title="<?php echo \think\Lang::get('consumer_protection'); ?>"></span>
                <?php endif; if($store_info['store_huodaofk']): ?>
                <span id="certMaterhuodaofk" class="text-hidden fl ml5" title="<?php echo \think\Lang::get('support_cash_delivery'); ?>"></span>
                <?php endif; ?>
                <!--新加的保障-->
            </dd>
        </dl>
        <?php endif; ?>
        <!--保证金金额-->
        <?php if($store_info['store_avaliable_deposit'] > 0): ?>
        <dl class="messenger">
            <dt><span class="t_adjust"><?php echo \think\Lang::get('guaranteed_amount'); ?></span><span>：</span></dt>
            <dd style="width: 100px;"><?php echo $store_info['store_avaliable_deposit']; ?>
            </dd>
        </dl>
       <?php endif; ?>

        <dl class="no-border">
            <dt><span class="t_adjust"><?php echo \think\Lang::get('company_name'); ?></span><span>：</span></dt>
            <dd><?php echo $store_info['store_company_name']; ?></dd>
        </dl>
        <dl class="no-border">
            <dt><span class="t_adjust"><?php echo \think\Lang::get('ds_srore_location'); ?></span><span>：</span></dt>
            <dd><?php echo $store_info['area_info']; ?></dd>
        </dl>
        <?php if(!(empty($store_info['store_phone']) || (($store_info['store_phone'] instanceof \think\Collection || $store_info['store_phone'] instanceof \think\Paginator ) && $store_info['store_phone']->isEmpty()))): ?>
        <dl class="no-border">
            <dt><span class="t_adjust"><?php echo \think\Lang::get('phone_space'); ?></span><span>：</span></dt>
            <dd><?php echo $store_info['store_phone']; ?></dd>
        </dl>
        <?php endif; ?>
        <dl>
            <dt><span class="t_adjust"><?php echo \think\Lang::get('business_licence_number_electronic'); ?></span><span>：</span></dt>
            <dd>
                <?php if(!$store_info['is_platform_store']): if($store_info['business_licence_number_electronic']): ?>
                <a href="<?php echo $store_info['business_licence_number_electronic']; ?>" target="_blank"><?php echo \think\Lang::get('ds_view'); ?></a>
                <?php endif; else: if(\think\Config::get('business_licence')): ?>
                <a href="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo \think\Config::get('business_licence'); ?>" target="_blank"><?php echo \think\Lang::get('ds_view'); ?></a>
                <?php endif; endif; ?>
            </dd>
        </dl>
        <div class="shop-other" id="shop-other">
            <div class="goto">
                <a href="javascript:collect_store('<?php echo $store_info['store_id']; ?>','count','store_collect')" ><i class="iconfont">&#xe6e4;</i><?php echo \think\Lang::get('ds_collect'); ?></a>
                <a href="<?php echo url('Storesnshome/index',['sid'=>$store_info['store_id']]); ?>" ><i class="iconfont">&#xe635;</i><?php echo \think\Lang::get('ds_dynamics'); ?></a>
            </div>
            <div class="shop_btn">
                <div class="dss-info-btn-map iconfont">&#xe720;
                    <div class="dss-info-map" id="map_container" style="width:208px;height:208px;"></div>
                </div>
                <div class="dss-info-btn-qrcode iconfont" >&#xe72d;
                    <div class="dss-info-qrcode"><img src="<?php echo store_qrcode($store_info['store_id']); ?>" title="<?php echo \think\Lang::get('shop_primitive'); ?><?php echo url('Store/goods_all',['store_id'=>$store_info['store_id']]); ?>" style="width:208px;height:208px"></div>
                </div>
                
                
            </div>
            
        </div>
    </div>
</div>
<!--店铺基本信息 E-->
<script type="text/javascript">
    var BASESITEROOT = "<?php echo BASE_SITE_ROOT; ?>";
    var BASESITEURL = "<?php echo BASE_SITE_URL; ?>";
    var HOMESITEURL = "<?php echo HOME_SITE_URL; ?>";
    var cityName = "<?php echo $store_info['store_address']; ?>";
    var address = "<?php echo $store_info['area_info']; ?>";
    var store_name = "<?php echo $store_info['store_company_name']; ?>";
    function initialize() {
        map = new BMap.Map("map_container");
        localCity = new BMap.LocalCity();

        map.enableScrollWheelZoom();
        localCity.get(function(cityResult){
            if (cityResult) {
                var level = cityResult.level;
                if (level < 13) level = 13;
                map.centerAndZoom(cityResult.center, level);
                cityResultName = cityResult.name;
                if (cityResultName.indexOf(cityName) >= 0) cityName = cityResult.name;
                getPoint();
            }
        });
    }

    function loadScript() {
        var script = document.createElement("script");
        script.src = "<?php echo HTTP_TYPE; ?>api.map.baidu.com/api?v=2.0&callback=initialize";
        document.body.appendChild(script);
    }
    function getPoint(){
        var myGeo = new BMap.Geocoder();
        myGeo.getPoint(address, function(point){
            if (point) {
                setPoint(point);
            }
        }, cityName);
    }
    function setPoint(point){
        if (point) {
            map.centerAndZoom(point, 16);
            var marker = new BMap.Marker(point);
            map.addOverlay(marker);
        }
    }

    // 当鼠标放在店铺地图上再加载百度地图。
    $(function(){
        $('.dss-info-btn-map').one('mouseover',function(){
            loadScript();
        });
        $('.dss-info-btn-map').one('click',function(){
            loadScript();
        });
    });
</script>

<script>
    $(function(){
        var store_id = "<?php echo $store_info['store_id']; ?>";
        var goods_id = "<?php echo \think\Request::instance()->param('goods_id'); ?>";
        var controller = "<?php echo \think\Request::instance()->controller(); ?>";
        var action  = "<?php echo \think\Request::instance()->action()?\think\Request::instance()->action() : 'index'; ?>";
        $.getJSON("<?php echo url('Store/ajax_flowstat_record'); ?>",{store_id:store_id,goods_id:goods_id,controller_param:controller,action_param:action});
    });
</script>
        <div class="common_module dss-search">
            <div class="common_title">
                <h2><?php echo \think\Lang::get('ds_goods_class'); ?></h2>
            </div>
            <ul class="dss-submenu">
      <li><span class="ico-none"></span><a href="<?php echo url('Store/goods_all',['store_id'=>$store_info['store_id']]); ?>"><?php echo \think\Lang::get('ds_whole_goods'); ?></a></li>
      <?php if(!(empty($goods_class_list) || (($goods_class_list instanceof \think\Collection || $goods_class_list instanceof \think\Paginator ) && $goods_class_list->isEmpty()))): if(is_array($goods_class_list) || $goods_class_list instanceof \think\Collection || $goods_class_list instanceof \think\Paginator): if( count($goods_class_list)==0 ) : echo "" ;else: foreach($goods_class_list as $key=>$value): if(!(empty($value['children']) || (($value['children'] instanceof \think\Collection || $value['children'] instanceof \think\Paginator ) && $value['children']->isEmpty()))): ?>
      <li><span class="ico-none" onclick="class_list(this);" span_id="<?php echo $value['storegc_id']; ?>" style="cursor: pointer;"></span><a href="<?php echo url('Store/goods_all',['store_id'=>$store_info['store_id'],'storegc_id'=>$value['storegc_id']]); ?>"><?php echo $value['storegc_name']; ?></a>
        <ul id="stc_<?php echo $value['storegc_id']; ?>" class="class_child">
          <?php if(is_array($value['children']) || $value['children'] instanceof \think\Collection || $value['children'] instanceof \think\Paginator): if( count($value['children'])==0 ) : echo "" ;else: foreach($value['children'] as $key=>$value1): ?>
          <li><a href="<?php echo url('Store/goods_all',['store_id'=>$store_info['store_id'],'storegc_id'=>$value1['storegc_id']]); ?>"><?php echo $value1['storegc_name']; ?></a></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </li>
      <?php else: ?>
      <li> <span class="ico-none"></span><a href="<?php echo url('Store/goods_all',['store_id'=>$store_info['store_id'],'storegc_id'=>$value['storegc_id']]); ?>"><?php echo $value['storegc_name']; ?></a></li>
      <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
    </ul>
        </div>
        <div class="common_module">
            <div class="common_title">
                <h2><?php echo \think\Lang::get('commodity_ranking'); ?></h2>
            </div>
            <div class="common_content">
                <ul>
                    <?php if(is_array($hot_sales) || $hot_sales instanceof \think\Collection || $hot_sales instanceof \think\Paginator): if( count($hot_sales)==0 ) : echo "" ;else: foreach($hot_sales as $key=>$val): ?>
                    <li>
                        <div class="p_img">
                            <a href="<?php echo url('Goods/index',['goods_id'=>$val['goods_id']]); ?>"><img src="<?php echo goods_thumb($val, 240); ?>" width="85" height="85"></a>
                        </div>
                        <div class="p_num <?php if($key < 3): ?>active<?php endif; ?>"><?php echo $key+1; ?></div>
                        <div class="p_info">
                            <div class="p_name">
                                <a href="<?php echo url('Goods/index',['goods_id'=>$val['goods_id']]); ?>"><?php echo $val['goods_name']; ?></a>
                            </div>
                            <div class="p_price"><?php echo \think\Lang::get('currency'); ?><em><?php echo $val['goods_promotion_price']; ?></em></div>
                            <div class="p_sales"><?php echo \think\Lang::get('ds_sell_out'); ?><strong><?php echo $val['goods_salenum']; ?></strong><?php echo \think\Lang::get('ds_bi'); ?></div>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <div class="common_module">
            <div class="common_title">
                <h2><?php echo \think\Lang::get('merchandise_collection'); ?></h2>
            </div>
            <div class="common_content">
                <ul>
                    <?php if(is_array($hot_collect) || $hot_collect instanceof \think\Collection || $hot_collect instanceof \think\Paginator): if( count($hot_collect)==0 ) : echo "" ;else: foreach($hot_collect as $key=>$val): ?>
                    <li>
                        <div class="p_img">
                            <a href="<?php echo url('Goods/index',['goods_id'=>$val['goods_id']]); ?>"><img src="<?php echo goods_thumb($val, 240); ?>" width="85" height="85"></a>
                        </div>
                        <div class="p_num <?php if($key < 3): ?>active<?php endif; ?>"><?php echo $key+1; ?></div>
                        <div class="p_info">
                            <div class="p_name">
                                <a href="<?php echo url('Goods/index',['goods_id'=>$val['goods_id']]); ?>"><?php echo $val['goods_name']; ?></a>
                            </div>
                            <div class="p_price"><?php echo \think\Lang::get('currency'); ?><em><?php echo $val['goods_promotion_price']; ?></em></div>
                            <div class="p_sales"><?php echo \think\Lang::get('ds_collection_popularity'); ?><?php echo \think\Lang::get('ds_colon'); ?><strong><?php echo $val['goods_collect']; ?></strong></div>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        
    </div>
    
    
    <div class="ds_main">
        <?php if(!(empty($store_slide) || (($store_slide instanceof \think\Collection || $store_slide instanceof \think\Paginator ) && $store_slide->isEmpty()))): ?>
        <div class="storeslider">
            <ul class="slides">
                <?php $__FOR_START_535860120__=0;$__FOR_END_535860120__=5;for($i=$__FOR_START_535860120__;$i < $__FOR_END_535860120__;$i+=1){ if(!(empty($store_slide[$i]) || (($store_slide[$i] instanceof \think\Collection || $store_slide[$i] instanceof \think\Paginator ) && $store_slide[$i]->isEmpty()))): ?>
                <li><a href="<?php echo $store_slide_url[$i]; ?>"><img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_SLIDE; ?>/<?php echo $store_slide[$i]; ?>" width="940" height="400"></a></li>
                <?php endif; } ?>
            </ul>
            <a class="ctrl prev" href="javascript:void(0)">&lt;</a>
            <a class="ctrl next" href="javascript:void(0)">&gt;</a>
        </div>
        <?php endif; ?>
        <div class="recommend-goods">
            
            <div class="dss-grid-list">
                <?php if(!(empty($recommended_goods_list) || (($recommended_goods_list instanceof \think\Collection || $recommended_goods_list instanceof \think\Paginator ) && $recommended_goods_list->isEmpty()))): ?>
                <ul>
                    <?php if(is_array($recommended_goods_list) || $recommended_goods_list instanceof \think\Collection || $recommended_goods_list instanceof \think\Paginator): if( count($recommended_goods_list)==0 ) : echo "" ;else: foreach($recommended_goods_list as $key=>$value): ?>
                    <li class="grid-items">
                        <a class="thumb" href="<?php echo url('Goods/index',['goods_id'=>$value['goods_id']]); ?>" target="_blank">
                            <p class="grid-img">
                                <img alt="<?php echo $value['goods_name']; ?>" src="<?php echo goods_thumb($value, 240); ?>">
                            </p>
                            <div class="grid-title"><?php echo $value['goods_name']; ?></div>
                            <p class="grid-desc"><?php echo $value['goods_advword']; ?></p>
                            <p class="grid-price"><?php echo \think\Lang::get('currency'); ?><?php echo $value['goods_promotion_price']; ?></p>
                            <p class="grid-tips">
                                <em class="thumb"><span><?php echo \think\Lang::get('show_store_index_recommend'); ?></span></em>
                            </p>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <div class="clear"></div>
                <?php endif; ?>
            </div>
        </div>
        <div class="new-goods">
            <div class="dss-grid-list">
                <?php if(!(empty($new_goods_list) || (($new_goods_list instanceof \think\Collection || $new_goods_list instanceof \think\Paginator ) && $new_goods_list->isEmpty()))): ?>
                <ul>
                    <?php if(is_array($new_goods_list) || $new_goods_list instanceof \think\Collection || $new_goods_list instanceof \think\Paginator): if( count($new_goods_list)==0 ) : echo "" ;else: foreach($new_goods_list as $key=>$value): ?>
                    <li class="grid-items">
                        <a class="thumb" href="<?php echo url('Goods/index',['goods_id'=>$value['goods_id']]); ?>" target="_blank">
                            <p class="grid-img">
                                <img alt="<?php echo $value['goods_name']; ?>" src="<?php echo goods_thumb($value, 240); ?>">
                            </p>
                            <div class="grid-title"><?php echo $value['goods_name']; ?></div>
                            <p class="grid-desc"><?php echo $value['goods_advword']; ?></p>
                            <p class="grid-price"><?php echo \think\Lang::get('currency'); ?><?php echo $value['goods_promotion_price']; ?></p>
                            <p class="grid-tips">
                                <em class="thumb"><span><?php echo \think\Lang::get('show_store_index_new_goods'); ?></span></em>
                            </p>
                        </a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.SuperSlide.2.1.1.js"></script>
<script>
    jQuery(".storeslider").slide({mainCell: ".slides ", autoPlay: true, delayTime: 3000});
</script>


<div class="server">
    <div class="ensure">
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
    </div>
    <div class="mall_desc">
        <?php if(!(empty($article_list) || (($article_list instanceof \think\Collection || $article_list instanceof \think\Paginator ) && $article_list->isEmpty()))): if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $_5e952985e2e37 = is_array($article_list) ? array_slice($article_list,0,4, true) : $article_list->slice(0,4, true); if( count($_5e952985e2e37)==0 ) : echo "" ;else: foreach($_5e952985e2e37 as $key=>$art): ?>
        <dl> 
            <dt><?php echo $art['ac_name']; ?></dt>
            <dd>
                <?php if(!(empty($art['list']) || (($art['list'] instanceof \think\Collection || $art['list'] instanceof \think\Paginator ) && $art['list']->isEmpty()))): if(is_array($art['list']) || $art['list'] instanceof \think\Collection || $art['list'] instanceof \think\Paginator): if( count($art['list'])==0 ) : echo "" ;else: foreach($art['list'] as $key=>$list): ?>
                <a href="<?php if($list['article_url'] !=''): ?><?php echo $list['article_url']; else: ?><?php echo url('Article/show',['article_id'=>$list['article_id']]); endif; ?>"><?php echo $list['article_title']; ?></a>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </dd>
        </dl>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        <dl class="mall_mobile">
            <dt><?php echo \think\Lang::get('ds_mobile_mall'); ?></dt>
            <dd>
                <a href="#" class="join">
                    <img src="<?php echo HOME_SITE_URL; ?>/qrcode?url=<?php echo \think\Config::get('h5_site_url'); ?>" width="105" height="105" >
                </a>
            </dd> 
        </dl>
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
