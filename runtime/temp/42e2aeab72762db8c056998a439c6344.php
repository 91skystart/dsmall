<?php if (!defined('THINK_PATH')) exit(); /*a:7:{s:106:"/usr/local/var/www/dsmall/public/../application/home/view/default/store/default/goods/consulting_list.html";i:1574757822;s:75:"/usr/local/var/www/dsmall/application/home/view/default/base/base_home.html";i:1574757822;s:74:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_header.html";i:1574757822;s:91:"/usr/local/var/www/dsmall/application/home/view/default/store/default/store/store_info.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_server.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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

<link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/home.css">
<div class="header clearfix">
    <div class="w1200">
        <div class="logo">
            <a href="<?php echo HOME_SITE_URL; ?>"><img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo \think\Config::get('site_logo'); ?>"/></a>
        </div>
        <div class="top_search">
            <div class="top_search_box">
                <div id="search">
                    <ul class="tab" dstype="<?php echo \think\Request::instance()->controller(); ?>">
                        <li class="current"><span><?php echo \think\Lang::get('site_search_goods'); ?></span><i class="arrow"></i></li>
                        <li style="display: none;"><span><?php echo \think\Lang::get('site_search_store'); ?></span></li>
                    </ul>
                </div>
                <div class="form_fields">
                    <form class="search-form" id="search-form" method="get" action="<?php echo url('Search/goods'); ?>">
                        <input placeholder="<?php echo \think\Lang::get('search_merchandise_keywords'); ?>" name="keyword" id="keyword" type="text" class="keyword" value="<?php echo \think\Request::instance()->param('keyword'); ?>" maxlength="60" />
                        <input type="submit" id="button" value="<?php echo \think\Lang::get('ds_common_search'); ?>" class="submit">
                    </form>
                </div>
            </div>
            <ul class="top_search_keywords">
                <?php if(is_array($hot_search) || $hot_search instanceof \think\Collection || $hot_search instanceof \think\Paginator): if( count($hot_search)==0 ) : echo "" ;else: foreach($hot_search as $hot_k=>$hot_keyword): ?>
                <li <?php if($hot_k==0): ?>class="first"<?php endif; ?>><a href="<?php echo HOME_SITE_URL; ?>/Search/index.html?keyword=<?php echo $hot_keyword; ?>"><?php echo $hot_keyword; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
        <div class="user_menu">
            <dl class="my-mall">
                <dt><span class="ico iconfont">&#xe702;</span><?php echo \think\Lang::get('ds_user_center'); ?><i class="arrow"></i></dt>
                <dd>
                    <div class="sub-title">
                        <h4></h4>
                        <a href="<?php echo url('Member/index'); ?>" class="arrow"><?php echo \think\Lang::get('ds_my_user_center'); ?><i></i></a>
                    </div>
                    <div class="user-centent-menu">
                        <ul>
                            <li><a href="<?php echo url('Membermessage/message'); ?>"><?php echo \think\Lang::get('ds_message'); ?>(<span><?php if(\think\Session::get('member_id')): ?><?php echo (isset($message_num) && ($message_num !== '')?$message_num:0); else: ?>0<?php endif; ?></span>)</a></li>
                            <li><a href="<?php echo url('Memberorder/index'); ?>" class="arrow"><?php echo \think\Lang::get('ds_my_order'); ?><i></i></a></li>
                            <li><a href="<?php echo url('Memberconsult/index'); ?>"><?php echo \think\Lang::get('ds_consulting_reply'); ?>(<span id="member_consult">0</span>)</a></li>
                            <li><a href="<?php echo url('Memberfavorites/fglist'); ?>" class="arrow"><?php echo \think\Lang::get('ds_favorites'); ?><i></i></a></li>
                            <li><a href="<?php echo url('Membervoucher/index'); ?>"><?php echo \think\Lang::get('ds_vouchers'); ?>(<span id="member_voucher">0</span>)</a></li>
                            <li><a href="<?php echo url('Memberpoints/index'); ?>" class="arrow"><?php echo \think\Lang::get('ds_my_points'); ?><i></i></a></li>
                        </ul>
                    </div>
                    <div class="browse-history">
                        <div class="part-title">
                            <h4><?php echo \think\Lang::get('ds_recently_browsed_items'); ?></h4>
                            <span style="float:right;"><a href="<?php echo url('Membergoodsbrowse/listinfo'); ?>"><?php echo \think\Lang::get('ds_full_history'); ?></a></span>
                        </div>
                        <ul>
                            <li class="no-goods"><img class="loading" src="<?php echo HOME_SITE_ROOT; ?>/images/loading.gif"></li>
                        </ul>
                    </div>
                </dd>
            </dl>
            <dl class="my-cart">
                <dt><span class="ico iconfont">&#xe69a;</span><?php echo \think\Lang::get('ds_shopping_cart_settlement'); ?><i class="arrow"></i></dt>
                <dd>
                    <div class="sub-title">
                        <h4><?php echo \think\Lang::get('ds_latest_additions'); ?></h4>
                    </div>
                    <div class="incart-goods-box">
                        <div class="incart-goods"><div class="no-order"><span><?php echo \think\Lang::get('ds_shopping_cart_empty'); ?></span></div></div>
                    </div>
                    <div class="checkout"> <span class="total-price"></span><a href="<?php echo url('Cart/index'); ?>" class="btn-cart"><?php echo \think\Lang::get('ds_checkout_cart'); ?></a> </div>
                </dd>
                <div class="addcart-goods-num"><?php echo $cart_goods_num; ?></div>
            </dl>
        </div>
    </div>
</div>


<div class="mall_nav">
    <div class="w1200">
        <div class="all_categorys">
            <div class="mt">
                <i></i>
                <h3><a href="<?php echo url('Category/goods'); ?>"><?php echo \think\Lang::get('ds_all_commodity_classes'); ?></a></h3>
            </div>
            <div class="mc">
                <ul class="menu">
                    <?php if(!(empty($header_categories) || (($header_categories instanceof \think\Collection || $header_categories instanceof \think\Paginator ) && $header_categories->isEmpty()))): $i = 0; if(is_array($header_categories) || $header_categories instanceof \think\Collection || $header_categories instanceof \think\Paginator): if( count($header_categories)==0 ) : echo "" ;else: foreach($header_categories as $key=>$val): $i++; ?>
                    <li cat_id="<?php echo $val['gc_id']; ?>" <?php if($i>11): ?>style="display:none;"<?php endif; ?>>
                        <div class="class">
                            <span class="arrow"></span>
                            <?php if(!(empty($val['pic']) || (($val['pic'] instanceof \think\Collection || $val['pic'] instanceof \think\Paginator ) && $val['pic']->isEmpty()))): ?>
                            <span class="ico"><img src="<?php echo $val['pic']; ?>"></span>
                            <?php else: ?>
                            <span class="iconfont category-ico-<?php echo $i; ?>"></span>
                            <?php endif; ?>
                            <h4><a href="<?php echo url('Search/index',['cate_id'=>$val['gc_id']]); ?>"><?php echo $val['gc_name']; ?></a></h4>
                        </div>
                        <div class="sub-class" cat_menu_id="<?php echo $val['gc_id']; ?>">
                            <div class="sub-class-content">
                                <div class="recommend-class">
                                    <?php if(!(empty($val['cn_classs']) || (($val['cn_classs'] instanceof \think\Collection || $val['cn_classs'] instanceof \think\Paginator ) && $val['cn_classs']->isEmpty()))): if(is_array($val['cn_classs']) || $val['cn_classs'] instanceof \think\Collection || $val['cn_classs'] instanceof \think\Paginator): if( count($val['cn_classs'])==0 ) : echo "" ;else: foreach($val['cn_classs'] as $k=>$v): ?>
                                    <span><a href="<?php echo url('Search/index',['cate_id'=>$v['gc_id']]); ?>" title="<?php echo $v['gc_name']; ?>"><?php echo $v['gc_name']; ?></a></span>
                                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </div>
                                <?php if(!(empty($val['class2']) || (($val['class2'] instanceof \think\Collection || $val['class2'] instanceof \think\Paginator ) && $val['class2']->isEmpty()))): if(is_array($val['class2']) || $val['class2'] instanceof \think\Collection || $val['class2'] instanceof \think\Paginator): if( count($val['class2'])==0 ) : echo "" ;else: foreach($val['class2'] as $k=>$v): ?>
                                <dl>
                                    <dt>
                                    <h3><a href="<?php echo url('Search/index',['cate_id'=>$v['gc_id']]); ?>"><?php echo $v['gc_name']; ?></a></h3>
                                    </dt>
                                    <dd class="goods-class">
                                        <?php if(!(empty($v['class3']) || (($v['class3'] instanceof \think\Collection || $v['class3'] instanceof \think\Paginator ) && $v['class3']->isEmpty()))): if(is_array($v['class3']) || $v['class3'] instanceof \think\Collection || $v['class3'] instanceof \think\Paginator): if( count($v['class3'])==0 ) : echo "" ;else: foreach($v['class3'] as $k3=>$v3): ?>
                                        <a href="<?php echo url('Search/index',['cate_id'=>$v3['gc_id']]); ?>"><?php echo $v3['gc_name']; ?></a>
                                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                    </dd>
                                </dl>
                                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </div>
                            <div class="sub-class-right">
                                <?php if(!(empty($val['cn_brands']) || (($val['cn_brands'] instanceof \think\Collection || $val['cn_brands'] instanceof \think\Paginator ) && $val['cn_brands']->isEmpty()))): ?>
                                <div class="brands-list">
                                    <ul>
                                        <?php if(is_array($val['cn_brands']) || $val['cn_brands'] instanceof \think\Collection || $val['cn_brands'] instanceof \think\Paginator): if( count($val['cn_brands'])==0 ) : echo "" ;else: foreach($val['cn_brands'] as $key=>$brand): ?>
                                        <li>
                                            <a href="<?php echo url('Brand/brand_goods',['brand_id'=>$brand['brand_id']]); ?>" title="<?php echo $brand['brand_name']; ?>"><?php if(($brand['brand_pic'] != '')): ?><img src="<?php echo brand_image($brand['brand_pic']); ?>"/><?php endif; ?>
                                                <span><?php echo $brand['brand_name']; ?></span>
                                            </a>
                                        </li>
                                       <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>
                                <?php endif; ?>
                                <div class="adv-promotions">
                                    <?php if(isset($val['goodscn_adv1']) && $val['goodscn_adv1'] != ''): ?>
                                    <a <?php if($val['goodscn_adv1_link'] == ''): ?>href="javascript:;"<?php else: ?>target="_blank" href="<?php echo $val['goodscn_adv1_link']; endif; ?>><img src="<?php echo $val['goodscn_adv1']; ?>" data-url="<?php echo $val['goodscn_adv1']; ?>" class="scrollLoading" /></a>
                                    <?php endif; if(isset($val['goodscn_adv2']) && $val['goodscn_adv2'] != ''): ?>
                                    <a <?php if($val['goodscn_adv2_link'] == ''): ?>href="javascript:;"<?php else: ?>target="_blank" href="<?php echo $val['goodscn_adv2_link']; endif; ?>><img src="<?php echo $val['goodscn_adv2']; ?>" data-url="<?php echo $val['goodscn_adv2']; ?>" class="scrollLoading" /></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </ul>
            </div>
        </div>
        <div class="nav_list">
            <ul class="site_menu">
                <li><a href="<?php echo url('Index/index'); ?>" class="current"><?php echo \think\Lang::get('ds_index'); ?></a></li>
                <?php foreach($navs['middle'] as $nav): ?>
                <li><a href="<?php echo $nav['nav_url']; ?>" <?php if($nav['nav_new_open'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $nav['nav_title']; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
       
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
    $(function() {
	//首页左侧分类菜单
	$(".all_categorys ul.menu").find("li").each(
		function() {
			$(this).hover(
				function() {
				    var cat_id = $(this).attr("cat_id");
					var menu = $(this).find("div[cat_menu_id='"+cat_id+"']");
					menu.show();
					$(this).addClass("hover");					
					var menu_height = menu.height();
					if (menu_height < 60) menu.height(80);
					menu_height = menu.height();
					var li_top = $(this).position().top;
					$(menu).css("top",-li_top + 40);
				},
				function() {
					$(this).removeClass("hover");
				    var cat_id = $(this).attr("cat_id");
					$(this).find("div[cat_menu_id='"+cat_id+"']").hide();
				}
			);
		}
	);

        $(".user_menu dl").hover(function() {
            $(this).addClass("hover");
        }, function() {
            $(this).removeClass("hover");
        });
        $('.user_menu .my-mall').mouseover(function() {
            // 最近浏览的商品
            load_history_information();
            $(this).unbind('mouseover');
        });
        $('.user_menu .my-cart').mouseover(function() {
            // 运行加载购物车
            load_cart_information();
            $(this).unbind('mouseover');
        });
    });
    
</script>



<link rel="stylesheet" href="<?php echo BASE_SITE_ROOT; ?>/static/home/default/store/styles/<?php echo $store_theme; ?>/css/goods.css">
<link rel="stylesheet" href="<?php echo BASE_SITE_ROOT; ?>/static/home/default/store/styles/<?php echo $store_theme; ?>/css/shop.css">
<div class="w1200">

    <div class="dss-goods-layout expanded">
        <div class="dss-goods-main">
            <div class="dss-goods-title-bar">
                <h4><?php echo \think\Lang::get('goods_index_goods_consult'); ?></h4>
            </div>
            <div class="dss-goods-info-content bd" id="dsGoodsRate">
                <div class="top" style="overflow: hidden;">
                    <div class="dss-cosult-askbtn"><a href="#askQuestion" class="dss-btn dss-btn-red"><?php echo \think\Lang::get('want_questions'); ?></a></div>
                </div>
                <div class="dss-goods-title-nav">
                    <ul id="comment_tab">
                        <li class="<?php if(\think\Request::instance()->param('ctid') == 0): ?>current<?php endif; ?>"><a
                                href="<?php echo url('Goods/consulting_list',['goods_id'=>\think\Request::instance()->param('goods_id')]); ?>"><?php echo \think\Lang::get('ds_all'); ?></a></li>
                        <?php if(!(empty($consult_type) || (($consult_type instanceof \think\Collection || $consult_type instanceof \think\Paginator ) && $consult_type->isEmpty()))): if(is_array($consult_type) || $consult_type instanceof \think\Collection || $consult_type instanceof \think\Paginator): if( count($consult_type)==0 ) : echo "" ;else: foreach($consult_type as $key=>$val): ?>
                        <li class="<?php if(\think\Request::instance()->param('ctid') == $val['consulttype_id']): ?>current<?php endif; ?>"><a
                                href="<?php echo url('Goods/consulting_list',['goods_id'=>\think\Request::instance()->param('goods_id'),'ctid'=>$val['consulttype_id']]); ?>"><?php echo $val['consulttype_name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </ul>
                </div>
                <div class="dss-commend-main">
                    <?php if(!(empty($consult_list) || (($consult_list instanceof \think\Collection || $consult_list instanceof \think\Paginator ) && $consult_list->isEmpty()))): if(is_array($consult_list) || $consult_list instanceof \think\Collection || $consult_list instanceof \think\Paginator): if( count($consult_list)==0 ) : echo "" ;else: foreach($consult_list as $key=>$v): ?>
                    <div class="dss-cosult-list">
                        <dl class="asker">
                            <dt><?php echo \think\Lang::get('consulting_net_friend'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                            <dd>
                                <?php if($v['member_id']=='0'): ?><?php echo \think\Lang::get('ds_guest'); elseif($v['consult_isanonymous'] == '1'): ?>
                                <?php echo str_cut($v['member_name'],2); ?>***
                                <?php else: ?>
                                <a href="javascript:void(0)" target="_blank" data-param="{'id':<?php echo $v['member_id']; ?>}" dstype="mcard"><?php echo str_cut($v['member_name'],8); ?></a>
                                <?php endif; ?>
                                &nbsp;<span><?php echo \think\Lang::get('consulting_type'); ?>：<?php echo $consult_type[$v['consulttype_id']]['consulttype_name']; ?></span>
                                <time datetime="<?php echo date('Y-m-d H:i:s',$v['consult_addtime']); ?>" pubdate="pubdate" class="ml20"><?php echo date('Y-m-d H:i:s',$v['consult_addtime']); ?></time>
                            </dd>
                        </dl>
                        <dl class="ask-con">
                            <dt><?php echo \think\Lang::get('goods_index_consult_content'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                            <dd>
                                <p><?php echo nl2br($v['consult_content']); ?></p>
                            </dd>
                        </dl>
                        <?php if($v['consult_reply'] != ''): ?>
                        <dl class="reply">
                            <dt><?php echo \think\Lang::get('goods_index_seller_reply'); ?></dt>
                            <dd>
                                <p><?php echo nl2br($v['consult_reply']); ?></p>
                                <time datetime="<?php echo date('Y-m-d H:i:s',$v['consult_replytime']); ?>" pubdate="pubdate">
                                    [<?php echo date('Y-m-d H:i:s',$v['consult_replytime']); ?>]
                                </time>
                            </dd>
                        </dl>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                    <div class="tr pr5 pb5">
                        <div class="pagination"> <?php echo $show_page; ?></div>
                    </div>
                    <?php else: ?>
                    <div class="dss-norecord"><?php echo \think\Lang::get('goods_index_no_reply'); ?></div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if($consult_able): ?>
            <!-- S 咨询表单部分 -->
            <div class="dss-goods-title-bar" id="askQuestion">
                <h4><?php echo \think\Lang::get('published_consulting'); ?></h4>
            </div>
            <form method="post" id="message" action="<?php echo url('Goods/save_consult'); ?>">
                <input type="hidden" name="__token__" value="<?php echo \think\Request::instance()->token(); ?>" />
                <?php if(!isset($type_name)): ?>
                <input type="hidden" name="goods_id" value="<?php echo \think\Request::instance()->param('goods_id'); ?>"/>
                <?php endif; ?>
                <div class="dss-consult-form">
                    <?php if(!(empty($consult_type) || (($consult_type instanceof \think\Collection || $consult_type instanceof \think\Paginator ) && $consult_type->isEmpty()))): ?>
                    <dl>
                        <dt><?php echo \think\Lang::get('consulting_type'); ?>：</dt>
                        <dd>
                            <?php if(is_array($consult_type) || $consult_type instanceof \think\Collection || $consult_type instanceof \think\Paginator): if( count($consult_type)==0 ) : echo "" ;else: foreach($consult_type as $key=>$val): ?>
                            <label>
                                <input type="radio" <?php if($key== '1'): ?>checked="checked"<?php endif; ?> dstype="ctype<?php echo $val['consulttype_id']; ?>" name="consult_type_id" class="radio" value="<?php echo $val['consulttype_id']; ?>" />
                                <?php echo $val['consulttype_name']; ?>
                            </label>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </dd>
                    </dl>
                    <?php endif; if(is_array($consult_type) || $consult_type instanceof \think\Collection || $consult_type instanceof \think\Paginator): if( count($consult_type)==0 ) : echo "" ;else: foreach($consult_type as $key=>$val): ?>
                    <div class="dss-consult-type-intro" <?php if($key !='1'): ?>style="display:none;" <?php endif; ?> dstype="ctype<?php echo $val['consulttype_id']; ?>"> <?php echo $val['consulttype_introduce']; ?></div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                <div>
                    <?php if(\think\Session::get('member_id')): ?>
                    <label><strong><?php echo \think\Lang::get('goods_index_member_name'); ?><?php echo \think\Lang::get('ds_colon'); ?></strong><?php echo \think\Session::get('member_name'); ?></label>
                    <label for="gbCheckbox">
                        <input type="checkbox" class="checkbox" name="hide_name" value="hide" id="gbCheckbox">
                        <?php echo \think\Lang::get('goods_index_anonymous_publish'); ?></label>
                    <?php endif; ?>
                </div>
                <dl class="dss-consult">
                    <dt><?php echo \think\Lang::get('consulting_content'); ?>：</dt>
                    <dd>
                        <textarea name="goods_content" id="textfield3" class="textarea w700 h60"></textarea>
                        <span id="consultcharcount"></span></dd>
                </dl>
                <dl>
                    <dt>&nbsp;</dt>
                    <dd>
                        <?php if(\think\Config::get('captcha_status_goodsqa') == '1'): ?>
                        <input name="captcha" class="text w60" type="text" id="captcha" size="4" placeholder="<?php echo \think\Lang::get('goods_index_checkcode'); ?>" autocomplete="off" maxlength="4"/>
                        <div class="code">
                            <div class="arrow"></div>
                            <div class="code-img">
                                <a href="javascript:void(0)" onclick="javascript:document.getElementById('codeimage').src='<?php echo url('Seccode/makecode'); ?>'">
                                    <img src="<?php echo url('Seccode/makecode'); ?>" name="codeimage" border="0" id="codeimage" onclick="this.src='<?php echo url('Seccode/makecode'); ?>'"/>
                                </a>
                            </div>
                            <a href="JavaScript:void(0);" id="hide" class="close" title="<?php echo \think\Lang::get('ds_close'); ?>"><i></i></a>
                            </a>
                        </div>
                        <?php endif; ?>
                        <a href="JavaScript:void(0);" dstype="consult_submit" title="<?php echo \think\Lang::get('goods_index_publish_consult'); ?>" class="dss-btn dss-btn-red"><?php echo \think\Lang::get('goods_index_publish_consult'); ?></a>
                    </dd>
                    <dd dstype="error_msg"></dd>
                </dl>
            </form>
            <!-- E 咨询表单部分 -->
            <?php endif; ?>
        </div>
    </div>
        <div class="dss-sidebar">
            <div class="dss-sidebar-container mb10">
                <div class="title">
                    <h4><?php echo \think\Lang::get('product_information'); ?></h4>
                </div>
                <div class="content">
                    <dl class="dss-comment-goods">
                        <dt class="goods-name"><a href="<?php echo url('Goods/index',['goods_id'=>$goods['goods_id']]); ?>"> <?php echo $goods['goods_name']; ?> </a>
                        </dt>
                        <dd class="goods-pic"><a href="<?php echo url('Goods/index',['goods_id'=>$goods['goods_id']]); ?>">
                            <img src="<?php echo goods_cthumb($goods['goods_image'],240); ?>" alt="<?php echo $goods['goods_name']; ?>"> </a></dd>
                        <dd class="goods-price"><?php echo \think\Lang::get('goods_index_goods_price'); ?><?php echo \think\Lang::get('ds_colon'); ?><em class="saleP"><?php echo \think\Lang::get('currency'); ?><?php echo $goods['goods_price']; ?></em></dd>
                        <dd class="goods-raty"><?php echo \think\Lang::get('goods_index_evaluation'); ?><?php echo \think\Lang::get('ds_colon'); ?>
                            <span class="raty" data-score="<?php echo $goods['evaluation_good_star']; ?>"></span>
                        </dd>
                    </dl>
                </div>
                
            </div>
            <!--S 店铺信息-->
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
                <!--E 店铺信息 -->
        </div>
    </div>

</div>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.raty/jquery.raty.min.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.charCount.js"></script>
<script>
    $(function () {
        $('.raty').raty({
            path: "<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.raty/img",
            readOnly: true,
        });
        <?php if($consult_able): ?>
            $('a[dstype="consult_submit"]').click(function () {
                $('#message').submit();
            });

            $('#message').validate({
                errorPlacement: function (error, element) {
                    $('dd[dstype="error_msg"]').append(error);
                },
                submitHandler: function (form) {
                    ds_ajaxpost('message');
                },
                onkeyup: false,
                rules: {
                    goods_content: {
                        required: true,
                        maxlength: 120
                    }
        <?php if(\think\Config::get('captcha_status_goodsqa') == '1'): ?>
        ,captcha: {
                required : true,
                    remote   : {
                    url : "<?php echo url('Seccode/check'); ?>",
                        type:'get',
                        data:{
                        captcha : function(){
                            return $('#captcha').val();
                        }
                    },
                    complete: function(data) {
                        if(data.responseText == 'false') {
                            document.getElementById('codeimage').src='<?php echo url('Seccode/makecode'); ?>';
                        }
                    }
                }
            }
       <?php endif; ?>
        },
            messages : {
                goods_content : {
                    required : '<?php echo \think\Lang::get('goods_index_cosult_not_null'); ?>',
                    maxlength:'<?php echo \think\Lang::get('goods_index_max_120'); ?>'
                }
                <?php if(\think\Config::get('captcha_status_goodsqa') == '1'): ?>
                ,captcha: {
                    required : '<?php echo \think\Lang::get('goods_index_captcha_no_noll'); ?>',
                    remote   : '<?php echo \think\Lang::get('goods_index_captcha_error'); ?>'
                }
                <?php endif; ?>
            }
        });

            // textarea 字符个数动态计算
            $("#textfield3").charCount({
                allowed: 120,
                warning: 10,
                counterContainerID: 'consultcharcount',
                firstCounterText: '<?php echo \think\Lang::get('goods_index_textarea_note_one'); ?>',
                endCounterText: '<?php echo \think\Lang::get('goods_index_textarea_note_two'); ?>',
                errorCounterText: '<?php echo \think\Lang::get('goods_index_textarea_note_three'); ?>'
            });
        <?php endif; ?>
        $('input[type="radio"]').click(function () {
            $('div[dstype^="ctype"]').hide();
            $('div[dstype="' + $(this).attr('dstype') + '"]').show();
        });
        //Hide Show verification code
        $("#hide").click(function () {
            $(".code").fadeOut("slow");
        });
        $("#captcha").focus(function () {
            $(".code").fadeIn("fast");
        });
    });
</script>



<div class="server">
    <div class="ensure">
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
    </div>
    <div class="mall_desc">
        <?php if(!(empty($article_list) || (($article_list instanceof \think\Collection || $article_list instanceof \think\Paginator ) && $article_list->isEmpty()))): if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $_5e95350c8c5cc = is_array($article_list) ? array_slice($article_list,0,4, true) : $article_list->slice(0,4, true); if( count($_5e95350c8c5cc)==0 ) : echo "" ;else: foreach($_5e95350c8c5cc as $key=>$art): ?>
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
