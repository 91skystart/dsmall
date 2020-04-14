<?php if (!defined('THINK_PATH')) exit(); /*a:8:{s:89:"/usr/local/var/www/dsmall/public/../application/home/view/default/mall/search/search.html";i:1574757822;s:75:"/usr/local/var/www/dsmall/application/home/view/default/base/base_home.html";i:1574757822;s:74:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_header.html";i:1574757822;s:87:"/usr/local/var/www/dsmall/application/home/view/default/base/home/goods_class_area.html";i:1574757822;s:84:"/usr/local/var/www/dsmall/application/home/view/default/base/home/goods_squares.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_server.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
        <?php if(\think\Request::instance()->action() == 'index' && \think\Request::instance()->controller() == 'Index'): $ap_id =21;$ad_position = db("advposition")->cache(3600)->column("ap_id,ap_name,ap_width,ap_height","ap_id");$result = db("adv")->where("ap_id=$ap_id  and adv_enabled = 1 and adv_startdate < 1586836800 and adv_enddate > 1586836800 ")->order("adv_sort desc")->cache(3600)->limit("1")->select();
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




<script src="<?php echo HOME_SITE_ROOT; ?>/js/search_goods.js"></script>
<div class="dsh-container wrapper" >
  <div class="left">
    <?php if(!(empty($goods_class_array) || (($goods_class_array instanceof \think\Collection || $goods_class_array instanceof \think\Paginator ) && $goods_class_array->isEmpty()))): ?>
    <div class="dsh-module dsh-module-style02">
      <div class="title">
        <h3><?php echo \think\Lang::get('category_filtering'); ?></h3>
      </div>
      <div class="content">
        <ul id="files" class="tree">
          <?php if(is_array($goods_class_array) || $goods_class_array instanceof \think\Collection || $goods_class_array instanceof \think\Paginator): if( count($goods_class_array)==0 ) : echo "" ;else: foreach($goods_class_array as $key=>$value): ?>
          <li><i class="tree-parent tree-parent-collapsed"></i><a href="<?php echo url('Search/index',['cate_id'=>$value['gc_id'],'keyword'=>\think\Request::instance()->param('keyword')]); ?>" <?php if($value['gc_id'] == \think\Request::instance()->param('cate_id')): ?>class="selected"<?php endif; ?>><?php echo $value['gc_name']; ?></a>
            <?php if(!(empty($value['class2']) || (($value['class2'] instanceof \think\Collection || $value['class2'] instanceof \think\Paginator ) && $value['class2']->isEmpty()))): ?>
            <ul>
              <?php if(is_array($value['class2']) || $value['class2'] instanceof \think\Collection || $value['class2'] instanceof \think\Paginator): if( count($value['class2'])==0 ) : echo "" ;else: foreach($value['class2'] as $key=>$val): ?>
              <li><i class="tree-parent tree-parent-collapsed"></i><a href="<?php echo url('Search/index',['cate_id'=>$val['gc_id'],'keyword'=>\think\Request::instance()->param('keyword')]); ?>" <?php if($val['gc_id'] == \think\Request::instance()->param('cate_id')): ?>class="selected"<?php endif; ?>><?php echo $val['gc_name']; ?></a>
                <?php if(!(empty($val['class3']) || (($val['class3'] instanceof \think\Collection || $val['class3'] instanceof \think\Paginator ) && $val['class3']->isEmpty()))): ?>
                <ul>
                  <?php if(is_array($val['class3']) || $val['class3'] instanceof \think\Collection || $val['class3'] instanceof \think\Paginator): if( count($val['class3'])==0 ) : echo "" ;else: foreach($val['class3'] as $key=>$v): ?>
                  <li class="tree-parent tree-parent-collapsed"><i></i><a href="<?php echo url('Search/index',['cate_id'=>$v['gc_id'],'keyword'=>\think\Request::instance()->param('keyword')]); ?>" <?php if($v['gc_id'] == \think\Request::instance()->param('cate_id')): ?>class="selected"<?php endif; ?>><?php echo $v['gc_name']; ?></a></li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
                <?php endif; ?>
              </li>
              <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <?php endif; ?>
          </li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
      </div>
    </div>
    <?php endif; ?>
    <!-- S 推荐展位 -->
    <div dstype="booth_goods" class="dsh-module" style="display:none;"> </div>
    <!-- F 同类排行 -->
    <div stype="listhot_goods" style="display:none;"></div>
    <!-- E 推荐展位 -->
    <!-- 最近浏览 -->
    <div class="dsh-module dsh-module-style03">
      <div class="title">
        <h3><?php echo \think\Lang::get('goods_class_viewed_goods'); ?></h3>
      </div>
      <div class="content">
        <div class="dsh-sidebar-viewed" id="dshSidebarViewed">
          <ul>
            <?php if(!(empty($viewed_goods) || (($viewed_goods instanceof \think\Collection || $viewed_goods instanceof \think\Paginator ) && $viewed_goods->isEmpty()))): if(is_array($viewed_goods) || $viewed_goods instanceof \think\Collection || $viewed_goods instanceof \think\Paginator): if( count($viewed_goods)==0 ) : echo "" ;else: foreach($viewed_goods as $k=>$v): ?>
            <li class="dsh-sidebar-bowers">
              <div class="goods-pic"><a href="<?php echo url('Goods/index',['goods_id'=>$v['goods_id']]); ?>" target="_blank"><img  class="lazyload" data-original="<?php echo goods_thumb($v, 240);; ?>" title="<?php echo $v['goods_name']; ?>" alt="<?php echo $v['goods_name']; ?>" ></a></div>
              <dl>
                <dt><a href="<?php echo url('Goods/index',['goods_id'=>$v['goods_id']]); ?>" target="_blank"><?php echo $v['goods_name']; ?></a></dt>
                <dd><?php echo \think\Lang::get('currency'); ?><?php echo $v['goods_promotion_price']; ?></dd>
              </dl>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
          </ul>
        </div>
        <a href="<?php echo url('Membergoodsbrowse/listinfo'); ?>" class="dsh-sidebar-all-viewed"><?php echo \think\Lang::get('full_browsing_history'); ?></a></div>
    </div>

  </div>
  <div class="right">
    <div id="gc_goods_recommend_div" style="width:980px;"></div>
    <?php if(!isset($goods_class_array['child']) && empty($goods_class_array['child']) && !empty($goods_class_array)){$dl=1;  //dl标记if((!empty($brand_array) && is_array($brand_array)) || (!empty($attr_array) && is_array($attr_array))){?>
    <div class="dsh-module dsh-module-style01">
      <div class="title">
        <h3>
          <?php if(!(empty($show_keyword) || (($show_keyword instanceof \think\Collection || $show_keyword instanceof \think\Paginator ) && $show_keyword->isEmpty()))): ?>
          <em><?php echo $show_keyword; ?></em> -
          <?php endif; ?>
          <?php echo \think\Lang::get('product_screening'); ?></h3>
      </div>
      <div class="content">
        <div class="dsh-module-filter">
            <?php if((isset($checked_brand) && is_array($checked_brand)) || (isset($checked_attr) && is_array($checked_attr))): ?>
            <dl ds_type="ul_filter">
                <dt><?php echo \think\Lang::get('goods_class_index_selected'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                <dd class="list">
                    <?php if(!(empty($checked_brand) || (($checked_brand instanceof \think\Collection || $checked_brand instanceof \think\Paginator ) && $checked_brand->isEmpty()))): if(is_array($checked_brand) || $checked_brand instanceof \think\Collection || $checked_brand instanceof \think\Paginator): if( count($checked_brand)==0 ) : echo "" ;else: foreach($checked_brand as $key=>$val): ?>
                    <span class="selected" dstype="span_filter"><?php echo \think\Lang::get('goods_class_index_brand'); ?>:<em><?php echo $val['brand_name']; ?></em><i data-uri="<?php echo removeParam(array('b_id' => $key)); ?>">X</i></span>
                    <?php endforeach; endif; else: echo "" ;endif; endif; if(!(empty($checked_attr) || (($checked_attr instanceof \think\Collection || $checked_attr instanceof \think\Paginator ) && $checked_attr->isEmpty()))): if(is_array($checked_attr) || $checked_attr instanceof \think\Collection || $checked_attr instanceof \think\Paginator): if( count($checked_attr)==0 ) : echo "" ;else: foreach($checked_attr as $key=>$val): ?>
                    <span class="selected" dstype="span_filter"><?php echo $val['attr_name']; ?>:<em><?php echo $val['attrvalue_name']; ?></em><i data-uri="<?php echo removeParam(array('a_id' => $val['attrvalue_id'])); ?>">X</i></span>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </dd>
            </dl>
            <?php endif; if(!(empty($brand_array) || (($brand_array instanceof \think\Collection || $brand_array instanceof \think\Paginator ) && $brand_array->isEmpty()))): ?>
          <dl>
              <dt><?php echo \think\Lang::get('goods_class_index_brand'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
              <dd class="list">
                  <ul class="dsh-brand-tab" dstype="ul_initial" style="display:none;">
                      <li data-initial="all"><a href="javascript:void(0);"><?php echo \think\Lang::get('all_brands'); ?><i class="arrow"></i></a></li>
                      <?php if(!(empty($initial_array) || (($initial_array instanceof \think\Collection || $initial_array instanceof \think\Paginator ) && $initial_array->isEmpty()))): if(is_array($initial_array) || $initial_array instanceof \think\Collection || $initial_array instanceof \think\Paginator): if( count($initial_array)==0 ) : echo "" ;else: foreach($initial_array as $key=>$val): ?>
                      <li data-initial="<?php echo $val; ?>"><a href="javascript:void(0);"><?php echo $val; ?><i class="arrow"></i></a></li>
                      <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                  </ul>
                  <div id="dsBrandlist">
                      <ul class="dsh-brand-con" dstype="ul_brand">
                          <?php $i = 0; if(is_array($brand_array) || $brand_array instanceof \think\Collection || $brand_array instanceof \think\Paginator): if( count($brand_array)==0 ) : echo "" ;else: foreach($brand_array as $k=>$v): $i++; ?>
                          <li data-initial="<?php echo $v['brand_initial']; ?>" <?php if($i > 14): ?>style="display:none;"<?php endif; ?>>
                              <a href="<?php echo replaceParam(array('b_id' => $k)); ?>">
                                  <?php if($v['brand_showtype'] == 0): ?>
                                  <img  class="lazyload" data-original="<?php echo brand_image($v['brand_pic']); ?>" alt="<?php echo $v['brand_name']; ?>" /> <span><?php echo $v['brand_name']; ?></span>
                                  <?php else: ?>
                                  <?php echo $v['brand_name']; endif; ?>
                              </a>
                          </li>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                      </ul>
                  </div>
              </dd>
              <?php if(count($brand_array) > 16): ?>
              <dd class="all"><span dstype="brand_show"><i class="iconfont">&#xe689;</i><?php echo \think\Lang::get('goods_class_index_more'); ?></span></dd>
              <?php endif; ?>
          </dl>
          <?php $dl++; endif; if(!(empty($attr_array) || (($attr_array instanceof \think\Collection || $attr_array instanceof \think\Paginator ) && $attr_array->isEmpty()))): $j = 0; if(is_array($attr_array) || $attr_array instanceof \think\Collection || $attr_array instanceof \think\Paginator): if( count($attr_array)==0 ) : echo "" ;else: foreach($attr_array as $key=>$val): $j++; if(!isset($checked_attr[$key]) && !empty($val['value']) && is_array($val['value'])): ?>
          <dl>
            <dt><?php echo $val['name']; ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd class="list">
              <ul>
                <?php $i = 0; if(is_array($val['value']) || $val['value'] instanceof \think\Collection || $val['value'] instanceof \think\Paginator): if( count($val['value'])==0 ) : echo "" ;else: foreach($val['value'] as $k=>$v): $i++; ?>
                <li <?php if($i>10): ?>style="display:none" ds_type="none"<?php endif; ?>><a href="<?php $a_id = ((input('param.a_id')!= '' && input('param.a_id')!= 0)?input('param.a_id').'_'.$k:$k); echo replaceParam(array('a_id' => $a_id));?>"><?php echo $v['attrvalue_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
              </ul>
            </dd>
            <?php if(count($val['value']) > 10): ?>
            <dd class="all"><span ds_type="show"><i class="iconfont">&#xe689;</i><?php echo \think\Lang::get('goods_class_index_more'); ?></span></dd>
            <?php endif; ?>
          </dl>
          <?php endif; $dl++; endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
      </div>
    </div>
    <?php } ?>
    <div class="shop_con_list" id="main-nav-holder">
      <nav class="sort-bar" id="main-nav">
        <div class="pagination"></div>
        <div class="dsh-sortbar-array"> <?php echo \think\Lang::get('sort'); ?>：
          <ul>
            <li <?php if(\think\Request::instance()->param('key') == '0'): ?>class="selected"<?php endif; ?>><a href="<?php echo dropParam(array('order', 'key')); ?>"  title="<?php echo \think\Lang::get('goods_class_index_default_sort'); ?>"><?php echo \think\Lang::get('goods_class_index_default'); ?></a></li>
            <li <?php if(\think\Request::instance()->param('key') == '1'): ?>class="selected"<?php endif; ?>><a href="<?php if(\think\Request::instance()->param('order')=='2' && \think\Request::instance()->param('key')=='1'): ?><?php echo replaceParam(array('key' => '1', 'order' => '1')); else: ?><?php echo replaceParam(array('key' => '1', 'order' => '2')); endif; ?>" <?php if(\think\Request::instance()->param('key')=='1'): ?>class="<?php if(\think\Request::instance()->param('order')==1): ?>asc<?php else: ?>desc<?php endif; ?>"<?php endif; ?> ><?php echo \think\Lang::get('goods_class_index_sold'); ?><i></i></a></li>
            <li <?php if(\think\Request::instance()->param('key') == '2'): ?>class="selected"<?php endif; ?>><a href="<?php if(\think\Request::instance()->param('order')=='2' && \think\Request::instance()->param('key')=='2'): ?><?php echo replaceParam(array('key' => '2', 'order' => '1')); else: ?><?php echo replaceParam(array('key' => '2', 'order' => '2')); endif; ?>" <?php if(\think\Request::instance()->param('key')=='2'): ?>class="<?php if(\think\Request::instance()->param('order')==1): ?>asc<?php else: ?>desc<?php endif; ?>"<?php endif; ?> ><?php echo \think\Lang::get('goods_class_index_click'); ?><i></i></a></li>
            <li <?php if(\think\Request::instance()->param('key') == '3'): ?>class="selected"<?php endif; ?>><a href="<?php if(\think\Request::instance()->param('order')=='2' && \think\Request::instance()->param('key')=='3'): ?><?php echo replaceParam(array('key' => '3', 'order' => '1')); else: ?><?php echo replaceParam(array('key' => '3', 'order' => '2')); endif; ?>" <?php if(\think\Request::instance()->param('key')=='3'): ?>class="<?php if(\think\Request::instance()->param('order')==1): ?>asc<?php else: ?>desc<?php endif; ?>"<?php endif; ?> ><?php echo \think\Lang::get('goods_class_index_price'); ?><i></i></a></li>
            <li><div><input id="priceMin" title=<?php echo \think\Lang::get('lowest_price'); ?> value="<?php echo \think\Request::instance()->param('priceMin'); ?>" maxlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" class="input-txt"><em>-</em><input id="priceMax" title=<?php echo \think\Lang::get('highest_price'); ?> value="<?php echo \think\Request::instance()->param('priceMax'); ?>" maxlength="6" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" class="input-txt"><a id="priceBtn" class="priceBtn"><?php echo \think\Lang::get('ds_ok'); ?></a></div></li>
          </ul>
        </div>
        <div class="dsh-sortbar-owner"><span><a href="<?php if(\think\Request::instance()->param('type') == '1'): ?><?php echo dropParam(array('type')); else: ?><?php echo replaceParam(array('type' => '1')); endif; ?>" <?php if(\think\Request::instance()->param('type') == '1'): ?>class="selected"<?php endif; ?>><i></i><?php echo \think\Lang::get('platform_proprietary'); ?></a></span></div>
        <div class="dsh-sortbar-owner"><span><a href="<?php if(\think\Request::instance()->param('gift') == '1'): ?><?php echo dropParam(array('gift')); else: ?><?php echo replaceParam(array('gift' => '1')); endif; ?>" <?php if(\think\Request::instance()->param('gift') == '1'): ?>class="selected"<?php endif; ?>><i></i><?php echo \think\Lang::get('complimentary'); ?></a></span></div>
        <div class="dsh-sortbar-location"><?php echo \think\Lang::get('location_goods'); ?>：
          <div class="select-layer">
            <div class="holder"><em ds_type="area_name"><?php echo \think\Lang::get('goods_class_index_area'); ?><!-- 所在地 --></em></div>
            <div class="selected"><a ds_type="area_name"><?php echo \think\Lang::get('goods_class_index_area'); ?><!-- 所在地 --></a></div>
            <i class="direction"></i>
            <ul class="options">
              <div class="filter-detailc" id="addressDraw">
  <dl class="location-hots">
    <dt><?php echo \think\Lang::get('cmmon_areas'); ?></dt>
    <?php if(isset($province_array[1])): ?><dd><a href="<?php echo replaceParam(array('area_id' => '1')); ?>"><?php echo $province_array[1]; ?></a></dd><?php endif; if(isset($province_array[2])): ?><dd><a href="<?php echo replaceParam(array('area_id' => '2')); ?>"><?php echo $province_array[2]; ?></a></dd><?php endif; if(isset($province_array[9])): ?><dd><a href="<?php echo replaceParam(array('area_id' => '9')); ?>"><?php echo $province_array[9]; ?></a></dd><?php endif; if(isset($province_array[35])): ?><dd><a href="<?php echo replaceParam(array('area_id' => '35')); ?>"><?php echo $province_array[35]; ?></a></dd><?php endif; ?>
  </dl>
  <dl class="location-all">
    <dt><?php echo \think\Lang::get('provinces'); ?></dt>
    <dd>
      <ul>
        <li>
          <p class="lt">A</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '12')); ?>"><?php echo $province_array[12]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '34')); ?>"><?php echo $province_array[34]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">C</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '22')); ?>"><?php echo $province_array[22]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">F</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '13')); ?>"><?php echo $province_array[13]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">G</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '19')); ?>"><?php echo $province_array[19]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '28')); ?>"><?php echo $province_array[28]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '20')); ?>"><?php echo $province_array[20]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '24')); ?>"><?php echo $province_array[24]; ?></a></span> </p>
        </li>
      </ul>
      <ul>
        <li>
          <p class="lt">H</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '21')); ?>"><?php echo $province_array[21]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '3')); ?>"><?php echo $province_array[3]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '16')); ?>"><?php echo $province_array[16]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '8')); ?>"><?php echo $province_array[8]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '17')); ?>"><?php echo $province_array[17]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '18')); ?>"><?php echo $province_array[18]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">J</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '10')); ?>"><?php echo $province_array[10]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '14')); ?>"><?php echo $province_array[14]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '7')); ?>"><?php echo $province_array[7]; ?></a></span> </p>
        </li>
      </ul>
      <ul>
        <li>
          <p class="lt">N</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '6')); ?>"><?php echo $province_array[6]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '5')); ?>"><?php echo $province_array[5]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '30')); ?>"><?php echo $province_array[30]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">Q</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '29')); ?>"><?php echo $province_array[29]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">S</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '15')); ?>"><?php echo $province_array[15]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '4')); ?>"><?php echo $province_array[4]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '27')); ?>"><?php echo $province_array[27]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '23')); ?>"><?php echo $province_array[23]; ?></a></span> </p>
        </li>
      </ul>
      <ul>
        <li>
          <p class="lt">T</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '32')); ?>"><?php echo $province_array[32]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">X</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '26')); ?>"><?php echo $province_array[26]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '31')); ?>"><?php echo $province_array[31]; ?></a></span> <span><a href="<?php echo replaceParam(array('area_id' => '33')); ?>"><?php echo $province_array[33]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">Y</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '25')); ?>"><?php echo $province_array[25]; ?></a></span> </p>
        </li>
        <li>
          <p class="lt">Z</p>
          <p class="lc"> <span><a href="<?php echo replaceParam(array('area_id' => '11')); ?>"><?php echo $province_array[11]; ?></a></span> </p>
        </li>
      </ul>
    </dd>
  </dl>
  <p class="oreder-default"><a href="<?php echo dropParam(array('area_id')); ?>"><?php echo \think\Lang::get('goods_class_index_area'); ?></a></p>
</div>

            </ul>
          </div>
        </div>
      </nav>
      <!-- 商品列表循环  -->

      <div>
          
          <!--商品列表BEGIN-->     
<style type="text/css">
#box{background: #FFF;width: 238px;height: 410px;margin: -390px 0 0 0;display: block;border: solid 4px #D93600;position: absolute;z-index: 999;opacity: .5}
.shopMenu{position: fixed;z-index: 1;right: 25%;top: 0;}
</style>
<div class="squares" ds_type="current_display_mode">
    <input type="hidden" id="lockcompare" value="unlock" />
  <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): ?>
  <ul class="list_pic">
    <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$value): ?>
    <li class="item">
      <div class="goods-content" dstype_goods=" <?php echo $value['goods_id']; ?>" dstype_store="<?php echo $value['store_id']; ?>">
        <div class="goods-pic"><a href="<?php echo url('Goods/index',['goods_id'=>$value['goods_id']]); ?>" target="_blank" title="<?php echo $value['goods_name']; ?>"><img class="lazyload" data-original="<?php echo goods_thumb($value, 240); ?>" title="<?php echo $value['goods_name']; ?>" src="<?php echo HOME_SITE_ROOT; ?>/images/loading.gif" alt="<?php echo $value['goods_name']; ?>" /></a></div>
        <?php if((config('groupbuy_allow') && $value['goods_promotion_type'] == 1)): ?>
        <div class="goods-promotion"><span><?php echo \think\Lang::get('goods_class_index_groupbuy'); ?></span></div>
        <?php elseif((config('promotion_allow') && $value['goods_promotion_type'] == 2)): ?>
        <div class="goods-promotion"><span><?php echo \think\Lang::get('goods_class_index_xianshi'); ?></span></div>
        <?php endif; ?>
        <div class="goods-info">
          <div class="goods-pic-scroll-show">
              <ul>
                  <?php if(!(empty($value['image']) || (($value['image'] instanceof \think\Collection || $value['image'] instanceof \think\Paginator ) && $value['image']->isEmpty()))): $i=1; if(is_array($value['image']) || $value['image'] instanceof \think\Collection || $value['image'] instanceof \think\Paginator): if( count($value['image'])==0 ) : echo "" ;else: foreach($value['image'] as $key=>$val): ?>
                  <li <?php if($i==1): ?>class="selected"<?php endif; ?>><a href="javascript:void(0);"><img class="lazyload" data-original="<?php echo goods_cthumb($val['goodsimage_url'], 240); ?>" src="<?php echo HOME_SITE_ROOT; ?>/images/loading.gif" /></a></li>
                  <?php $i++; endforeach; endif; else: echo "" ;endif; else: ?>
                  <li class="selected"><a href="javascript:void(0);"><img class="lazyload" data-original="<?php echo goods_thumb($value, 240); ?>" src="<?php echo HOME_SITE_ROOT; ?>/images/loading.gif" /></a></li>
                  <?php endif; ?>
              </ul>
          </div>
            <div class="goods-price"> <em class="sale-price" title="<?php echo \think\Lang::get('goods_class_index_store_goods_price'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo \think\Lang::get('currency'); ?><?php echo $value['goods_promotion_price']; ?>"><?php echo ds_price_format_forlist($value['goods_promotion_price']); ?></em>  <span class='goods-sales'><?php echo \think\Lang::get('sold'); ?><?php echo $value['goods_salenum']; ?><?php echo \think\Lang::get('piece'); ?></span></div>
            <div class="goods-name">
                <?php if($value['is_virtual'] == 1): ?>
                <span class="virtual" title="<?php echo \think\Lang::get('virtual_exchange'); ?>"><?php echo \think\Lang::get('virtual_exchange'); ?></span>
                <?php endif; if($value['is_goodsfcode'] == 1): ?>
                <span class="fcode" title="<?php echo \think\Lang::get('f_code_priority_buy_goods'); ?>"><?php echo \think\Lang::get('f_code_priority'); ?></span>
                <?php endif; if($value['is_presell'] == 1): ?>
                <span class="presell" title="<?php echo \think\Lang::get('pre_sell_purchases'); ?>"><?php echo \think\Lang::get('presell'); ?></span>
                <?php endif; if($value['is_have_gift'] == 1): ?>
                <span class="gift" title="<?php echo \think\Lang::get('bundling_freebies'); ?>"><?php echo \think\Lang::get('complimentary'); ?></span>
                <?php endif; ?>
                <a href="<?php echo url('Goods/index',['goods_id'=>$value['goods_id']]); ?>" target="_blank" title="<?php echo $value['goods_advword']; ?>"><?php echo $value['goods_name_highlight']; ?><em><?php echo $value['goods_advword']; ?></em></a>
            </div>
          <div class="goods-sub">
            <span class="goods-compare" ds_type="compare_<?php echo $value['goods_id']; ?>" data-param='{"gid":"<?php echo $value['goods_id']; ?>"}'><i></i><?php echo \think\Lang::get('comparison'); ?></span>
            <span onclick="collect_goods('<?php echo $value['goods_id']; ?>','count','goods_collect');"><i class='iconfont'>&#xe685;</i><?php echo \think\Lang::get('collect'); ?></span>
            <span><i class='iconfont'>&#xe730;</i><?php echo $value['evaluation_count']; ?></span>

          </div>
          <div class="store"><a href="<?php echo url('Store/index',['store_id'=>$value['store_id']]); ?>" title="<?php echo $value['store_name']; ?>" class="name"><?php echo $value['store_name']; ?></a><em member_id="<?php echo $value['member_id']; ?>">&nbsp;</em> </div>
          <div class="add-cart">
              <?php if($value['goods_storage'] == 0): if($value['is_appoint'] == 1): ?>
              <a href="javascript:void(0);" onclick="<?php if((session('is_login') !== '1')): ?>login_dialog();<?php else: ?>ajax_form('arrival_notice', '<?php echo \think\Lang::get('immediately_appointment'); ?>', '<?php echo url('Goods/arrival_notice',['goods_id'=>$value['goods_id'],'type'=>'2']); ?>', 350);<?php endif; ?>"><i class="iconfont" title=<?php echo \think\Lang::get('immediately_appointment'); ?>>&#xe70f;</i></a>
              <?php else: ?>
              <a href="javascript:void(0);" onclick="<?php if((session('is_login') !== '1')): ?>login_dialog();<?php else: ?>ajax_form('arrival_notice', '<?php echo \think\Lang::get('receiving_notification'); ?>', '<?php echo url('Goods/arrival_notice',['goods_id'=>$value['goods_id'],'type'=>'2']); ?>', 350);<?php endif; ?>"><i class="iconfont" title=<?php echo \think\Lang::get('receiving_notification'); ?>>&#xe70f;</i></a>
              <?php endif; else: if($value['is_virtual'] == 1 || $value['is_goodsfcode'] == 1 || $value['is_presell'] == 1): ?>
              <a href="javascript:void(0);" dstype="buy_now" data-param="{goods_id:<?php echo $value['goods_id']; ?>}"><i class="iconfont" title="<?php if(($value['is_goodsfcode'] == 1)): ?><?php echo \think\Lang::get('f_code_buy'); elseif(($value['is_presell'] == 1)): ?><?php echo \think\Lang::get('presell_purchase'); else: ?><?php echo \think\Lang::get('text_buy_now'); endif; ?>">&#xe69a;</i></a>
              <?php else: ?>
              <a href="javascript:void(0);" dstype="add_cart" data-param="{goods_id:<?php echo $value['goods_id']; ?>}"><i class="iconfont" title='<?php echo \think\Lang::get('add_cart'); ?>'>&#xe69a;</i></a>
              <?php endif; endif; ?>
          </div>
        </div>
      </div>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="clear"></div>
  </ul>
  <?php else: ?>
  <div class="no_results"><?php echo \think\Lang::get('index_no_record'); ?></div>
  <?php endif; ?>
</div>
<form id="buynow_form" method="post" action="<?php echo url('Buy/buy_step1'); ?> ">
  <input id="goods_id" name="cart_id[]" type="hidden"/>
</form>
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.raty/jquery.raty.min.js"></script>
<script type="text/javascript" src="<?php echo HOME_SITE_ROOT; ?>/js/compare.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
      	//初始化对比按钮
        initCompare();
    });
</script> 
<!--商品列表END-->     
        
        
      </div>
      <div class="tc mt20 mb20">
        <div class="pagination"><?php echo $show_page; ?></div>
      </div>
    </div>

    <!-- 猜你喜欢 -->
    <div id="guesslike_div" style="width:980px;"></div>
  </div>
  <div class="clear"></div>
</div>
<script src="<?php echo HOME_SITE_ROOT; ?>/js/waypoints.js"></script>
<script src="<?php echo HOME_SITE_ROOT; ?>/js/search_category_menu.js"></script>
<script type="text/javascript">
var defaultSmallGoodsImage = '<?php echo default_goodsimage(240); ?>';
var defaultTinyGoodsImage = '<?php echo default_goodsimage(60); ?>';

$(function(){
    $('#files').tree({
        expanded: 'li:lt(2)'
    });
	//品牌索引过长滚条
    $('#dsBrandlist').perfectScrollbar({suppressScrollX:true});
    //浮动导航  waypoints.js
    $('#main-nav-holder').waypoint(function(event, direction) {
        $(this).parent().toggleClass('sticky', direction === "down");
        event.stopPropagation();
    });
	// 单行显示更多
	$('span[ds_type="show"]').click(function(){
		s = $(this).parents('dd').prev().find('li[ds_type="none"]');
		if(s.css('display') == 'none'){
			s.show();
			$(this).html('<i class="iconfont">&#xe688;</i><?php echo \think\Lang::get('goods_class_index_retract'); ?>');
		}else{
			s.hide();
			$(this).html('<i class="iconfont">&#xe689;</i><?php echo \think\Lang::get('goods_class_index_more'); ?>');
		}
	});

<?php if(\think\Request::instance()->param('area_id') > 0): ?>
$('[ds_type="area_name"]').html("<?php echo $province_array[\think\Request::instance()->param('area_id')]; ?>");
<?php endif; if(\think\Request::instance()->param('cate_id') > 0): ?>
    $('div[dstype="booth_goods"]').load("<?php echo url('Search/get_booth_goods',['cate_id'=>\think\Request::instance()->param('cate_id')]); ?>", function(){
        $(this).show();
    });
	<?php endif; if(\think\Request::instance()->param('cate_id') > 0): ?>

    $('div[id="gc_goods_recommend_div"]').load("<?php echo url('Search/get_hot_goods',['cate_id'=>\think\Request::instance()->param('cate_id')]); ?>", function(){
        $(this).show();
    });
	<?php endif; ?>
	//浏览历史处滚条
	$('#dshSidebarViewed').perfectScrollbar({suppressScrollX:true});

	//猜你喜欢
	$('#guesslike_div').load("<?php echo url('Search/get_guesslike'); ?>", function(){
        $(this).show();
    });
    $('#priceBtn').click(function(){
        var priceMin = $('#priceMin').val();
        var priceMax = $('#priceMax').val();
        var url = window.location.href;
        var url = url + "?priceMin=" + priceMin + "&priceMax=" + priceMax;
        window.location.href = url;
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
        <?php if(!(empty($article_list) || (($article_list instanceof \think\Collection || $article_list instanceof \think\Paginator ) && $article_list->isEmpty()))): if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $_5e95368e1c767 = is_array($article_list) ? array_slice($article_list,0,4, true) : $article_list->slice(0,4, true); if( count($_5e95368e1c767)==0 ) : echo "" ;else: foreach($_5e95368e1c767 as $key=>$art): ?>
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
