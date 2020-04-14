<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:95:"/usr/local/var/www/dsmall/public/../application/home/view/default/member/memberorder/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_member.html";i:1574757822;s:74:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_top.html";i:1574757822;s:79:"/usr/local/var/www/dsmall/application/home/view/default/base/member_header.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/member_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/member_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_server.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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

<link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/member.css">
<script src="<?php echo HOME_SITE_ROOT; ?>/js/member.js"></script>
<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.css">
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
                            <li><a href="<?php echo url('Membermessage/message'); ?>"><?php echo \think\Lang::get('ds_message'); ?>(<span><?php echo $message_num; ?></span>)</a></li>
                            <li><a href="<?php echo url('Memberorder/index'); ?>" class="arrow"><?php echo \think\Lang::get('ds_my_order'); ?><i></i></a></li>
                            <li><a href="<?php echo url('Memberconsult/index'); ?>"><?php echo \think\Lang::get('ds_consulting_reply'); ?>(<span id="member_consult">0</span>)</a></li>
                            <li><a href="<?php echo url('Memberfavorites/fglist'); ?>" class="arrow"><?php echo \think\Lang::get('ds_vouchers'); ?><i></i></a></li>
                            <li><a href="<?php echo url('Membervoucher/index'); ?>"><?php echo \think\Lang::get('ds_favorites'); ?>(<span id="member_voucher">0</span>)</a></li>
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
                <li><a href="<?php echo url('Index/index'); ?>" class="current"><?php echo \think\Lang::get('homepage'); ?></a></li>
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

<div class="member_center_back">
<div class="dsm-container">
    <div class="left-layout">
    <div class="dsm-sidebar">
        <?php if(is_array($member_menu) || $member_menu instanceof \think\Collection || $member_menu instanceof \think\Paginator): if( count($member_menu)==0 ) : echo "" ;else: foreach($member_menu as $key=>$menu): ?>
        <div class="dl">
            <div class="dt">
                <h3 key="<?php echo $menu['name']; ?>"><i class="iconfont"><?php echo $menu['ico']; ?></i><?php echo $menu['text']; ?></h3>
            </div>
            <div class="dd">
                <ul>
                    <?php if(is_array($menu['submenu']) || $menu['submenu'] instanceof \think\Collection || $menu['submenu'] instanceof \think\Paginator): if( count($menu['submenu'])==0 ) : echo "" ;else: foreach($menu['submenu'] as $key=>$submenu): ?>
                    <li <?php if($submenu['name'] == $cursubmenu): ?>class="selected"<?php endif; ?>><a href="<?php echo $submenu['url']; ?>"><?php echo $submenu['text']; ?></a></li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
    <div class="right-layout">
        <div class="tabmenu">
            <?php if($member_item): ?>
<ul class="tab pngFix">
    <?php if(is_array($member_item) || $member_item instanceof \think\Collection || $member_item instanceof \think\Paginator): if( count($member_item)==0 ) : echo "" ;else: foreach($member_item as $key=>$item): ?>
    <li <?php if($item['name'] == $curitem): ?>class="active"<?php endif; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['text']; ?></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php endif; ?>
            
        </div>
        



<form method="get" target="_self">
    <table class="dsm-search-table">
        <input type="hidden" name= "recycle" value="<?php echo \think\Request::instance()->param('recycle'); ?>" />
        <tr>
            <td>&nbsp;</td>
            <th><?php echo \think\Lang::get('member_order_state'); ?></th>
            <td class="w100">
                <select name="state_type">
                    <option value="" <?php if(\think\Request::instance()->param('state_type') == ''): ?>selected<?php endif; ?>><?php echo \think\Lang::get('member_order_all'); ?></option>
                    <option value="state_new" <?php if(\think\Request::instance()->param('state_type') == 'state_new'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('member_order_wait_pay'); ?></option>
                    <option value="state_pay" <?php if(\think\Request::instance()->param('state_type') == 'state_pay'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('member_order_wait_ship'); ?></option>
                    <option value="state_send" <?php if(\think\Request::instance()->param('state_type') == 'state_send'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('member_order_shipped'); ?></option>
                    <option value="state_success" <?php if(\think\Request::instance()->param('state_type') == 'state_success'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('member_order_finished'); ?></option>
                    <option value="state_noeval" <?php if(\think\Request::instance()->param('state_type') == 'state_noeval'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('member_order_want_evaluate'); ?></option>
                    <option value="state_cancel" <?php if(\think\Request::instance()->param('state_type') == 'state_cancel'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('member_order_cancel_order'); ?></option>
                </select>
            </td>
            <th><?php echo \think\Lang::get('member_order_time'); ?></th>
            <td class="w240">
                <input type="text" class="text w70" name="query_start_date" id="query_start_date" value="<?php echo \think\Request::instance()->param('query_start_date'); ?>"/>
                <label class="add-on"><i class="iconfont">&#xe8d6;</i></label>&nbsp;&#8211;&nbsp;
                <input type="text" class="text w70" name="query_end_date" id="query_end_date" value="<?php echo \think\Request::instance()->param('query_end_date'); ?>"/>
                <label class="add-on"><i class="iconfont">&#xe8d6;</i></label>
            </td>
            <th><?php echo \think\Lang::get('member_order_sn'); ?></th>
            <td class="w160"><input type="text" class="text w150" name="order_sn" value="<?php echo \think\Request::instance()->param('order_sn'); ?>"></td>
            <td class="w70 tc">
                <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_search'); ?>"/>
            </td>
        </tr>
    </table>
</form>
        
        <table class="dsm-default-table order">
            <thead>
                <tr>
                    <th class="w10"></th>
                    <th colspan="2"><?php echo \think\Lang::get('site_search_goods'); ?></th>
                    <th class="w100"><?php echo \think\Lang::get('member_order_price'); ?>（<?php echo \think\Lang::get('ds_yuan'); ?>）</th>
                    <th class="w40"><?php echo \think\Lang::get('member_order_amount'); ?></th>
                    <th class="w100"><?php echo \think\Lang::get('member_order_service'); ?></th>
                    <th class="w120"><?php echo \think\Lang::get('order_amount'); ?></th>
                    <th class="w100"><?php echo \think\Lang::get('transaction_status'); ?></th>
                    <th class="w150"><?php echo \think\Lang::get('transaction_action'); ?></th>
                </tr>
            </thead>
            <?php if ($order_group_list) { foreach ($order_group_list as $order_pay_sn => $group_info) { $p = 0;?>
            <tbody order_id="" <?php if (!empty($group_info['pay_amount']) && $p == 0) {?> class="pay" <?php }?>>
                   <?php foreach($group_info['order_list'] as $order_id => $order_info) {if(empty($group_info['pay_amount'])): ?>
                   <tr>
                    <td colspan="19" class="sep-row"></td>
                </tr>
                <?php endif; if(!empty($group_info['pay_amount']) && $p == 0): ?>
                <tr>
                    <td colspan="19" class="sep-row"></td>
                </tr>
                <tr>
                    <td colspan="19" class="pay-td"><span class="ml15"><?php echo \think\Lang::get('online_payment_amount'); ?>：<em>￥<?php echo ds_price_format($group_info['pay_amount']); ?></em></span> <a class="dsm-btn dsm-btn-orange fr mr15" href="<?php echo url('Buy/pay',['pay_sn'=>$order_pay_sn]); ?>"><i class="iconfont">&#xe6f0;</i><?php echo \think\Lang::get('order_payment'); ?></a></td>
                </tr>
                <?php endif; $p++;?>
                <tr>
                    <th colspan="19"> <span class="ml10">
                            <!-- order_sn -->
                            <?php echo \think\Lang::get('member_order_sn'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo $order_info['order_sn']; if($order_info['order_from'] == 2): ?>
                            <i class="iconfont">&#xe60e;</i>
                            <?php endif; ?>
                        </span>
                        <!-- order_time -->
                        <span><?php echo \think\Lang::get('member_order_time'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo date("Y-m-d H:i:s",$order_info['add_time']); ?></span>

                        <!-- store_name -->
                        <span><a href="<?php echo url('Store/index',['store_id'=>$order_info['store_id']]); ?>" title="<?php echo $order_info['store_name']; ?>"><?php echo $order_info['store_name']; ?></a></span>

                        <!-- QQ -->
                        <?php if(isset($order_info)): ?>
                        <span member_id="<?php echo $order_info['extend_store']['member_id']; ?>">
                            <?php if(!empty($order_info['extend_store']['store_qq'])): ?>
                            <a target="_blank" href="<?php echo HTTP_TYPE; ?>wpa.qq.com/msgrd?v=3&uin=<?php echo $order_info['extend_store']['store_qq']; ?>&site=qq&menu=yes" ><img border="0" src="<?php echo HTTP_TYPE; ?>wpa.qq.com/pa?p=2:<?php echo $order_info['extend_store']['store_qq']; ?>:52" style=" vertical-align: middle;"/></a>
                            <?php endif; ?>

                            <!-- wang wang -->
                            <?php if(!empty($order_info['extend_store']['store_ww'])): ?>
                            <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo $order_info['extend_store']['store_ww']; ?>&site=cntaobao&s=2&charset=utf-8"  class="vm" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $order_info['extend_store']['store_ww']; ?>&site=cntaobao&s=2&charset=utf-8" alt="Wang Wang"  style=" vertical-align: middle;"/></a>
                            <?php endif; ?>
                        </span>
                        <?php endif; ?>

                        <!-- 放入回收站 -->

                        <?php if($order_info['if_delete']): ?>
                        <a href="javascript:void(0);" class="order-trash" onclick="ds_ajaxget_confirm('<?php echo url('Memberorder/change_state',['state_type'=>'order_delete','order_id'=>$order_info['order_id']]); ?>','<?php echo \think\Lang::get('delete_recycle_bin_recovery'); ?>');"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('ds_delete'); ?></a>
                        <?php endif; ?>

                        <!-- 还原订单 -->

                        <?php if($order_info['if_restore']): ?>
                        <a href="javascript:void(0);" class="order-trash" onclick="ds_ajaxget_confirm('<?php echo url('Memberorder/change_state',['state_type'=>'order_restore','order_id'=>$order_info['order_id']]); ?>','<?php echo \think\Lang::get('determination_reduction'); ?>');"><i class="iconfont">&#xe717;</i><?php echo \think\Lang::get('restore'); ?></a>
                        <?php endif; ?>
                    </th>
                </tr>

                <!-- S 商品列表 -->
                <?php $i = 0;foreach ($order_info['goods_list'] as $k => $goods_info) {$i++;?>
                <tr>
                    <td class="bdl"></td>
                    <td class="w70"><div class="dsm-goods-thumb"><a href="<?php echo url('Goods/index',['goods_id'=>$goods_info['goods_id']]); ?>" target="_blank"><img src="<?php echo goods_thumb($goods_info,240); ?>"/></a></div></td>
                    <td class="tl"><dl class="goods-name">
                            <dt><a href="<?php echo $goods_info['goods_url']; ?>" target="_blank"><?php echo $goods_info['goods_name']; ?></a></dt>
                            <?php if(!(empty($goods_info['goods_type_cn']) || (($goods_info['goods_type_cn'] instanceof \think\Collection || $goods_info['goods_type_cn'] instanceof \think\Paginator ) && $goods_info['goods_type_cn']->isEmpty()))): ?>
                            <dd><span class="sale-type"><?php echo $goods_info['goods_type_cn']; ?></span></dd>
                            <?php endif; ?>
                        </dl></td>
                    <td><?php echo $goods_info['goods_price']; ?></td>
                    <td><?php echo $goods_info['goods_num']; ?></td>
                    <td><!-- 退款 -->
                        <?php if(isset($goods_info['refund']) && $goods_info['refund'] == 1): ?>
                        <p><a href="<?php echo url('Memberrefund/add_refund',['order_id'=>$order_info['order_id'],'goods_id'=>$goods_info['rec_id']]); ?>"><?php echo \think\Lang::get('refund_return'); ?></a></p>
                        <?php endif; ?>

                        <!-- 投诉 -->
                        <?php if($order_info['if_complain']): ?>
                        <p><a href="<?php echo url('Membercomplain/complain_new',['order_id'=>$order_info['order_id'],'goods_id'=>$goods_info['rec_id']]); ?>"><?php echo \think\Lang::get('trading_complaints'); ?></a></p>
                        <?php endif; ?>
                    </td>

                    <!-- S 合并TD -->
                    <?php if (($order_info['goods_count'] > 1 && $k ==0) || ($order_info['goods_count'] == 1)){?>
                    <td class="bdl" rowspan="<?php echo $order_info['goods_count']; ?>"><p class=""><strong><?php echo $order_info['order_amount']; ?></strong></p>
                        <p class="goods-freight">
                            <?php if($order_info['shipping_fee'] > 0): ?>
                            (<?php echo \think\Lang::get('member_order_shipping_han'); ?><?php echo \think\Lang::get('member_show_order_tp_fee'); ?><?php echo $order_info['shipping_fee']; ?>)
                            <?php else: ?>
                            <?php echo \think\Lang::get('ds_common_shipping_free'); endif; ?>
                        </p>
                        <p title="<?php echo \think\Lang::get('member_order_pay_method'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo $order_info['payment_name']; ?>"><?php echo $order_info['payment_name']; ?></p></td>
                    <td class="bdl" rowspan="<?php echo $order_info['goods_count']; ?>"><p><?php echo $order_info['state_desc']; ?></p>

                        <!-- 订单查看 -->

                        <p><a href="<?php echo url('Memberorder/show_order',['order_id'=>$order_info['order_id']]); ?>" target="_blank"><?php echo \think\Lang::get('member_order_view_order'); ?></a></p>

                        <!-- 物流跟踪 -->
                        <?php if($order_info['if_deliver']): ?>
                        <p><a href="<?php echo url('Memberorder/search_deliver',['order_id'=>$order_info['order_id'],'order_sn'=>$order_info['order_sn']]); ?>" target="_blank"><?php echo \think\Lang::get('member_order_show_deliver'); ?></a></p>
                        <?php endif; ?>
                    </td>
                    <td class="bdl bdr" rowspan="<?php echo $order_info['goods_count']; ?>"><!-- 永久删除 -->

                        <!-- 锁定-->

                        <?php if($order_info['if_lock']): ?>
                        <p><?php echo \think\Lang::get('refund_in_returns'); ?></p>
                        <?php endif; ?>

                        <!-- 取消订单 -->

                        <?php if($order_info['if_cancel']): ?>
                        <p><a href="javascript:void(0)" class="dsm-btn dsm-btn-red" ds_type="dialog" dialog_width="480" dialog_title="<?php echo \think\Lang::get('member_order_cancel_order'); ?>" dialog_id="buyer_order_cancel_order" uri="<?php echo url('Memberorder/change_state',['state_type'=>'order_cancel','order_id'=>$order_info['order_id']]); ?>"  id="order<?php echo $order_info['order_id']; ?>_action_cancel"><i class="iconfont">&#xe754;</i><?php echo \think\Lang::get('member_order_cancel_order'); ?></a></p>
                        <?php endif; ?>

                        <!-- 退款取消订单 -->

                        <?php if($order_info['if_refund_cancel']): ?>
                        <p><a href="<?php echo url('Memberrefund/add_refund_all',['order_id'=>$order_info['order_id']]); ?>" class="dsm-btn"><i class="iconfont">&#xe6f3;</i><?php echo \think\Lang::get('order_refund'); ?></a></p>
                        <?php endif; ?>

                        <!-- 收货 -->

                        <?php if($order_info['if_receive']): ?>
                        <p><a href="javascript:void(0)" class="dsm-btn" ds_type="dialog" dialog_id="buyer_order_confirm_order" dialog_width="480" dialog_title="<?php echo \think\Lang::get('member_order_ensure_order'); ?>" uri="<?php echo url('Memberorder/change_state',['state_type'=>'order_receive','order_id'=>$order_info['order_id'],'order_sn'=>$order_info['order_sn']]); ?>" id="order<?php echo $order_info['order_id']; ?>_action_confirm"><?php echo \think\Lang::get('member_order_ensure_order'); ?></a></p>
                        <?php endif; ?>

                        <!-- 评价 -->

                        <?php if($order_info['if_evaluation']): ?>
                        <p><a class="dsm-btn dsm-btn-acidblue" href="<?php echo url('Memberevaluate/add',['order_id'=>$order_info['order_id']]); ?>"><i class="iconfont">&#xe67e;</i><?php echo \think\Lang::get('member_order_want_evaluate'); ?></a></p>
                        <?php endif; ?>

                        <!-- 已经评价 -->
                        <?php if($order_info['evaluation_state'] == 1): ?><?php echo \think\Lang::get('order_state_eval'); endif; if($order_info['if_drop']): ?>
                        <p><a href="javascript:void(0);" onclick="ds_ajaxget_confirm('<?php echo url('Memberorder/change_state',['state_type'=>'order_drop','order_id'=>$order_info['order_id']]); ?>','<?php echo \think\Lang::get('delete_cannot_view_order'); ?>');" class="dsm-btn dsm-btn-red mt5"><i class="iconfont">&#xe725;</i><?php echo \think\Lang::get('permanent_deletion'); ?></a></p>
                        <?php endif; ?>
                    </td>
                    <!-- E 合并TD -->
                    <?php } ?>
                </tr>

                <!-- S 赠品列表 -->

                <?php if (!empty($order_info['zengpin_list']) && $i == count($order_info['goods_list'])) { ?>
                <tr>
                    <td class="bdl"></td>
                    <td colspan="5" class="tl"><div class="dsm-goods-gift"> <?php echo \think\Lang::get('freebies'); ?>：
                            <ul>
                                <?php if(is_array($order_info['zengpin_list']) || $order_info['zengpin_list'] instanceof \think\Collection || $order_info['zengpin_list'] instanceof \think\Paginator): if( count($order_info['zengpin_list'])==0 ) : echo "" ;else: foreach($order_info['zengpin_list'] as $key=>$zengpin_info): ?>
                                <li><a title="<?php echo \think\Lang::get('freebies'); ?>：<?php echo $zengpin_info['goods_name']; ?> * <?php echo $zengpin_info['goods_num']; ?>" href="<?php echo $zengpin_info['goods_url']; ?>" target="_blank"><img src="<?php echo goods_thumb($zengpin_info,240); ?>" /></a></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul>
                        </div></td>
                </tr>
                <?php } ?>
                <!-- E 赠品列表 -->

                <?php } ?>
                <!-- E 商品列表 -->

                <?php } ?>
            </tbody>
            <?php } } else { ?>
            <tbody>
                <tr>
                    <td colspan="20" class="norecord"><div class="warning-option"><i>&nbsp;</i><span><?php echo \think\Lang::get('no_record'); ?></span></div></td>
                </tr>
            </tbody>
            <?php } if($order_pay_list): ?>
            <tfoot>
                <tr>
                    <td colspan="19"><div class="pagination"><?php echo $show_page; ?></div></td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>




<script type="text/javascript">
$(function(){
    $('#query_start_date').datepicker({dateFormat: 'yy-mm-dd'});
    $('#query_end_date').datepicker({dateFormat: 'yy-mm-dd'});
});
</script>




    </div>
    <div class="clear"></div>
</div>
</div>
<div class="server">
    <div class="ensure">
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
    </div>
    <div class="mall_desc">
        <?php if(!(empty($article_list) || (($article_list instanceof \think\Collection || $article_list instanceof \think\Paginator ) && $article_list->isEmpty()))): if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $_5e952c3e4c972 = is_array($article_list) ? array_slice($article_list,0,4, true) : $article_list->slice(0,4, true); if( count($_5e952c3e4c972)==0 ) : echo "" ;else: foreach($_5e952c3e4c972 as $key=>$art): ?>
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

