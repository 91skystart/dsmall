<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:104:"/usr/local/var/www/dsmall/public/../application/home/view/default/mall/showgroupbuy/groupbuy_detail.html";i:1574757822;s:75:"/usr/local/var/www/dsmall/application/home/view/default/base/base_home.html";i:1574757822;s:74:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_header.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_server.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
        <?php if(\think\Request::instance()->action() == 'index' && \think\Request::instance()->controller() == 'Index'): $ap_id =21;$ad_position = db("advposition")->cache(3600)->column("ap_id,ap_name,ap_width,ap_height","ap_id");$result = db("adv")->where("ap_id=$ap_id  and adv_enabled = 1 and adv_startdate < 1586844000 and adv_enddate > 1586844000 ")->order("adv_sort desc")->cache(3600)->limit("1")->select();
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




<link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/home_group.css">
<div class="w1200">
  <div class="dsh-breadcrumb-layout" style="display: block;">
  <div class="dsh-breadcrumb wrapper"> <i class="iconfont">&#xe6ff;</i> <span> <a href="<?php echo url('Index/index'); ?>"><?php echo \think\Lang::get('homepage'); ?></a> </span> <span class="arrow">></span>
    <?php if($groupbuy_info['groupbuy_is_vr']): ?>
    <span><a href="<?php echo url('Showgroupbuy/vr_groupbuy_list'); ?>"><?php echo \think\Lang::get('virtual_grab'); ?></a></span>
    <?php else: ?>
    <span><a href="<?php echo url('Showgroupbuy/groupbuy_list'); ?>"><?php echo \think\Lang::get('online_grab'); ?></a></span>
    <?php endif; ?>
    <span class="arrow">></span> <span><?php echo $groupbuy_info['groupbuy_name']; ?></span> </div>
</div>
<div class="dsg-container wrapper">
    <div class="dsg-main <?php echo $groupbuy_info['state_flag']; ?>">
      <div class="dsg-group">
        
        <div class="dsg-item">
          <div class="pic"><img src="<?php echo groupbuy_thumb($groupbuy_info['groupbuy_image'],'max'); ?>" alt=""></div>
          <div class="info" id="main-nav-holder">
            <h2><?php echo $groupbuy_info['groupbuy_name']; ?></h2>
            <h3><?php echo $groupbuy_info['groupbuy_remark']; ?></h3>
            <div class="button"><span><em><?php echo \think\Lang::get('currency'); ?><?php echo $groupbuy_info['groupbuy_price']; ?></em><del><?php echo \think\Lang::get('currency'); ?><?php echo $groupbuy_info['goods_price']; ?></del></span><a href="<?php echo $groupbuy_info['goods_url']; ?>" target="_blank"><?php echo $groupbuy_info['button_text']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<i class="iconfont">&#xe687;</i></a></div>

            <div class="require">
              <h4><?php if($buy_limit > '0'): ?><?php echo \think\Lang::get('maximum_purchase_per_person'); ?><em><?php echo $buy_limit; ?></em><?php echo \think\Lang::get('piece'); ?>，<?php else: ?><?php echo \think\Lang::get('limited_quantity'); endif; ?><em><?php echo $groupbuy_info['virtual_quantity']+$groupbuy_info['groupbuy_buy_quantity']; ?></em><?php echo \think\Lang::get('people_have_been_robbed'); ?></h4>
            </div>
            <div class="time">
              <?php if(!(empty($groupbuy_info['count_down']) || (($groupbuy_info['count_down'] instanceof \think\Collection || $groupbuy_info['count_down'] instanceof \think\Paginator ) && $groupbuy_info['count_down']->isEmpty()))): ?>
              <!-- 倒计时 距离本期结束 -->
              <i class="iconfont">&#xe736;</i><?php echo \think\Lang::get('remaining_time'); ?>：<span id="d1">0</span><strong><?php echo \think\Lang::get('text_tian'); ?></strong><span id="h1">0</span><strong><?php echo \think\Lang::get('text_hour'); ?></strong><span id="m1">0</span><strong><?php echo \think\Lang::get('text_minute'); ?></strong><span id="s1">0</span><strong><?php echo \think\Lang::get('text_second'); ?></strong>
              <script type="text/javascript">
                    var tms = [];
                    var day = [];
                    var hour = [];
                    var minute = [];
                    var second = [];

                    tms[tms.length] = "<?php echo $groupbuy_info['count_down']; ?>";
                    day[day.length] = "d1";
                    hour[hour.length] = "h1";
                    minute[minute.length] = "m1";
                    second[second.length] = "s1";
                    function groupbuyTakeCount() {
                        for (var i = 0, j = tms.length; i < j; i++) {
                            tms[i] -= 1;
                            //计算天、时、分、秒、
                            var days = Math.floor(tms[i] / (1 * 60 * 60 * 24));
                            var hours = Math.floor(tms[i] / (1 * 60 * 60)) % 24;
                            var minutes = Math.floor(tms[i] / (1 * 60)) % 60;
                            var seconds = Math.floor(tms[i] / 1) % 60;
                            if (days < 0)
                                days = 0;
                            if (hours < 0)
                                hours = 0;
                            if (minutes < 0)
                                minutes = 0;
                            if (seconds < 0)
                                seconds = 0;
                            //将天、时、分、秒插入到html中
                            document.getElementById(day[i]).innerHTML = days;
                            document.getElementById(hour[i]).innerHTML = hours;
                            document.getElementById(minute[i]).innerHTML = minutes;
                            document.getElementById(second[i]).innerHTML = seconds;
                        }
                    }
                    setInterval(groupbuyTakeCount, 1000);
              </script>
              <?php endif; ?>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        
      </div>
    </div>
  <div class="dsg-layout-l">
    
    <div class="dsg-title-bar">
      <ul class="tabs-nav">
        <li class="tabs-selected"><a href="javascript:void(0);"><?php echo \think\Lang::get('goods_info'); ?></a></li>
        <li><a href="javascript:void(0);"><?php echo \think\Lang::get('buyer_list'); ?></a></li>
        <li><a href="javascript:void(0);"><?php echo \think\Lang::get('product_evaluation'); ?>(<?php echo $evaluate_info['all']; ?>)</a></li>
      </ul>
    </div>
      <div class="dsg-detail-content">
          <?php if($groupbuy_info['groupbuy_is_vr']): ?>
          <div class="dsg-instructions">
              <h4><?php echo \think\Lang::get('use_statement'); ?></h4>
              <ul>
                  <li>
                      <?php echo \think\Lang::get('explanatory_text1'); ?>
                      <time><?php echo date("Y-m-d H:i:s",$groupbuy_info['groupbuy_endtime']); ?></time>
                      <?php if($goods_info['virtual_indate'] > 0): ?>
                      <?php echo \think\Lang::get('explanatory_text2'); ?><time><?php echo date("Y-m-d H:i",$goods_info['virtual_indate']); ?></time>
                      <?php echo \think\Lang::get('explanatory_text3'); endif; ?>
                      。
                  </li>
                  <li><?php echo \think\Lang::get('explanatory_text4'); ?></li>
                  <?php if($buy_limit > 0): ?>
                  <li><?php echo \think\Lang::get('explanatory_text5'); ?><strong><?php echo $buy_limit; ?></strong><?php echo \think\Lang::get('explanatory_text6'); ?></li>
                  <?php endif; ?>
              </ul>
          </div>
          <?php endif; ?>
          <div class="dsg-intro"><?php echo htmlspecialchars_decode($groupbuy_info['groupbuy_intro']); ?></div>
      </div>
    <div id="groupbuy_order" class="dsg-detail-content hide"></div>
    <div class="dsg-detail-content hide">
      <div class="dsg-evaluate">
        <div class="top">
          <div class="rate">
            <p><strong><?php echo $evaluate_info['good_percent']; ?></strong><sub>%</sub><?php echo \think\Lang::get('praise'); ?></p>
            <span><?php echo \think\Lang::get('common'); ?><?php echo $evaluate_info['all']; ?><?php echo \think\Lang::get('people_participation_score'); ?></span></div>
          <div class="percent">
            <dl>
              <dt><?php echo \think\Lang::get('praise'); ?><em>(<?php echo $evaluate_info['good_percent']; ?>%)</em></dt>
              <dd><i style="width: <?php echo $evaluate_info['good_percent']; ?>%"></i></dd>
            </dl>
            <dl>
              <dt><?php echo \think\Lang::get('medium_rating'); ?><em>(<?php echo $evaluate_info['normal_percent']; ?>%)</em></dt>
              <dd><i style="width: <?php echo $evaluate_info['normal_percent']; ?>%"></i></dd>
            </dl>
            <dl>
              <dt><?php echo \think\Lang::get('poor_rating'); ?><em>(<?php echo $evaluate_info['bad_percent']; ?>%)</em></dt>
              <dd><i style="width: <?php echo $evaluate_info['bad_percent']; ?>%"></i></dd>
            </dl>
          </div>
          <div class="btns"><span><?php echo \think\Lang::get('goods_evaluated'); ?></span>
            <p><a href="<?php if($groupbuy_info['groupbuy_is_vr']): ?><?php echo url('Membervrorder/index'); else: ?><?php echo url('Memberorder/index'); endif; ?>" class="dsg-btn dsg-btn-orange" target="_blank"><i class="iconfont">&#xe71b;</i><?php echo \think\Lang::get('evaluation_goods'); ?></a></p>
          </div>
        </div>
        <!-- 商品评价内容部分 -->
        <div id="groupbuy_evaluate" class="dsg-evaluate-main"></div>
      </div>
    </div>
  </div>
  <div class="dsg-layout-r">

      <?php if(!$store_info['is_platform_store'] || $groupbuy_info['groupbuy_is_vr']): ?>
      <div class="dsg-store">
          <div class="title"><?php echo \think\Lang::get('store_info'); ?></div>
          <div class="content">
              <div class="dsg-store-info">
                  <dl class="name">
                      <dt><?php echo \think\Lang::get('captions_merchants'); ?>：</dt>
                      <dd> <?php echo $groupbuy_info['store_name']; ?></dd>
                  </dl>
                  <?php if(!$store_info['is_platform_store']): ?>
                  <dl class="all-rate">
                      <dt><?php echo \think\Lang::get('composite_score'); ?>：</dt>
                      <dd>
                          <div class="rating"><span style=" width:<?php echo $store_info['store_credit_percent']; ?>%"></span></div>
                          <em><?php echo $store_info['store_credit_average']; ?></em><?php echo \think\Lang::get('credit_unit'); ?> </dd>
                  </dl>
                  <div class="detail-rate">
                      <h5><strong><?php echo \think\Lang::get('store_dynamic_score'); ?></strong><?php echo \think\Lang::get('compared_with_industry'); ?></h5>
                      <ul class="rate">
                          <?php if(is_array($store_info['store_credit']) || $store_info['store_credit'] instanceof \think\Collection || $store_info['store_credit'] instanceof \think\Paginator): if( count($store_info['store_credit'])==0 ) : echo "" ;else: foreach($store_info['store_credit'] as $key=>$value): ?>
                          <li> <?php echo $value['text']; ?><span class="credit"><?php echo $value['credit']; ?> <?php echo \think\Lang::get('credit_unit'); ?></span> <span class="<?php echo (isset($value['percent_class']) && ($value['percent_class'] !== '')?$value['percent_class']:''); ?>"><i></i><?php echo (isset($value['percent_text']) && ($value['percent_text'] !== '')?$value['percent_text']:''); ?><em><?php echo (isset($value['percent']) && ($value['percent'] !== '')?$value['percent']:''); ?></em></span> </li>
                          <?php endforeach; endif; else: echo "" ;endif; ?>
                      </ul>
                  </div>
                  <?php endif; ?>
                  <dl class="messenger">
                      <dt><?php echo \think\Lang::get('online_customer_service'); ?>：</dt>
                      <dd member_id="<?php echo $store_info['member_id']; ?>">
                          <?php if(!(empty($store_info['store_qq']) || (($store_info['store_qq'] instanceof \think\Collection || $store_info['store_qq'] instanceof \think\Paginator ) && $store_info['store_qq']->isEmpty()))): ?>
                          <a target="_blank" href="<?php echo HTTP_TYPE; ?>wpa.qq.com/msgrd?v=3&uin=<?php echo $store_info['store_qq']; ?>&site=qq&menu=yes" title="QQ: <?php echo $store_info['store_qq']; ?>"><img border="0" src="<?php echo HTTP_TYPE; ?>wpa.qq.com/pa?p=2:<?php echo $store_info['store_qq']; ?>:52" style=" vertical-align: middle;"/></a>
                          <?php endif; if(!(empty($store_info['store_ww']) || (($store_info['store_ww'] instanceof \think\Collection || $store_info['store_ww'] instanceof \think\Paginator ) && $store_info['store_ww']->isEmpty()))): ?>
                          <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&amp;uid=<?php echo $store_info['store_ww']; ?>&site=cntaobao&s=1; ?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $store_info['store_ww']; ?>&site=cntaobao&s=2;?>" alt="<?php echo \think\Lang::get('ds_message_me'); ?>" style=" vertical-align: middle;"/></a>
                          <?php endif; ?>
                      </dd>
                  </dl>
                  <?php if($groupbuy_info['groupbuy_is_vr']): ?>
                  <dl>
                      <dt><?php echo \think\Lang::get('captions_phone'); ?>：</dt>
                      <dd>
                          <?php if($store_info['live_store_tel']): ?><?php echo $store_info['live_store_tel']; else: ?><?php echo $store_info['store_phone']; endif; ?>
                      </dd>
                  </dl>
                  <dl class="noborder">
                      <dt><?php echo \think\Lang::get('captions_address'); ?>：</dt>
                      <dd class="auto">
                          <?php echo ($address = $store_info['live_store_address'] ? $store_info['live_store_address'] : $store_info['store_address']); ?>
                      </dd>
                  </dl>
                  <div class="map">
                      <div id="container" class="window"></div>
                  </div>
                  <dl class="name">
                      <dt><?php echo \think\Lang::get('traffic_information'); ?>：</dt>
                      <dd class="auto">
                          <?php echo $store_info['live_store_bus']; ?>
                      </dd>
                  </dl>
                  <?php endif; ?>
                  <div class="goto"> <a href="<?php echo url('Store/index',['store_id'=>$groupbuy_info['store_id']]); ?>" ><?php echo \think\Lang::get('enter_stores'); ?></a></div>
              </div>
          </div>
      </div>
      <?php endif; ?>

    <div class="dsg-module-sidebar">
      <div class="title"><?php echo \think\Lang::get('current_hot'); ?></div>
      <div class="content">
        <div class="dsg-group-command">
          <?php $hot_groupbuy_count = 1; if(!(empty($commended_groupbuy_list) || (($commended_groupbuy_list instanceof \think\Collection || $commended_groupbuy_list instanceof \think\Paginator ) && $commended_groupbuy_list->isEmpty()))): if(is_array($commended_groupbuy_list) || $commended_groupbuy_list instanceof \think\Collection || $commended_groupbuy_list instanceof \think\Paginator): if( count($commended_groupbuy_list)==0 ) : echo "" ;else: foreach($commended_groupbuy_list as $key=>$hot_groupbuy): ?>
          <dl <?php if($hot_groupbuy_count === 1): ?>style="border:none"<?php endif; $hot_groupbuy_count++; ?> >
            <dt class="name"><a href="<?php echo $hot_groupbuy['groupbuy_url']; ?>" target="_blank"><?php echo $hot_groupbuy['groupbuy_name']; ?></a></dt>
            <dd class="pic-thumb"><a href="<?php echo $hot_groupbuy['groupbuy_url']; ?>" target="_blank"><img src="<?php echo groupbuy_thumb($hot_groupbuy['groupbuy_image1'],'max'); ?>"></a></dd>
            <dd class="item"><a href="<?php echo $hot_groupbuy['groupbuy_url']; ?>" target="_blank"><?php echo \think\Lang::get('to_see'); ?></a> <span class="price"><?php echo \think\Lang::get('currency'); ?><?php echo $hot_groupbuy['groupbuy_price']; ?></span>  </dd>
          </dl>
          <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.ajaxContent.pack.js" type="text/javascript"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.raty/jquery.raty.min.js"></script>
<script>
$(function(){
    
    //首页Tab标签卡滑门切换
    $(".tabs-nav > li > a").on('mouseover', (function(e) {
        if (e.target == this) {
            var tabs = $(this).parent().parent().children("li");
            var panels = $(this).parent().parent().parent().parent().children(".dsg-detail-content");
            var index = $.inArray(this, $(this).parent().parent().find("a"));
            if (panels.eq(index)[0]) {
                tabs.removeClass("tabs-selected").eq(index).addClass("tabs-selected");
                panels.addClass("hide").eq(index).removeClass("hide");
            }
        }
    }));

    $("#groupbuy_order").load("<?php echo url('Showgroupbuy/groupbuy_order',['group_id'=>$groupbuy_info['groupbuy_id'],'is_vr'=>$groupbuy_info['groupbuy_is_vr']]); ?>");
    $("#groupbuy_evaluate").load("<?php echo url('Showgroupbuy/groupbuy_evaluate',['commonid'=>$groupbuy_info['goods_commonid']]); ?>");
});
</script>

<?php if($groupbuy_info['groupbuy_is_vr']): ?>
  <script type="text/javascript">
var cityName = '';
var address = '<?php echo str_replace("'", '"', $address); ?>';
var store_name = '<?php echo str_replace("'", '"', $store_info['live_store_name'] ? $store_info['live_store_name'] : $store_info['store_name']); ?>';
var map = "";
var localCity = "";
var opts = {width : 150,height: 50,title : "<?php echo \think\Lang::get('store_name'); ?>:"+store_name}
function initialize() {
    map = new BMap.Map("container");
    localCity = new BMap.LocalCity();

    map.enableScrollWheelZoom();
    map.addControl(new BMap.NavigationControl());
    map.addControl(new BMap.ScaleControl());
    map.addControl(new BMap.OverviewMapControl());
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
        var infoWindow = new BMap.InfoWindow("<?php echo \think\Lang::get('store_address'); ?>:"+address, opts);
        marker.addEventListener("click", function(){
            this.openInfoWindow(infoWindow);
        });
        map.addOverlay(marker);
        marker.openInfoWindow(infoWindow);
    }
}
loadScript();
</script>
<?php endif; ?>
</div>




<div class="server">
    <div class="ensure">
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
        <a href="#"></a>
    </div>
    <div class="mall_desc">
        <?php if(!(empty($article_list) || (($article_list instanceof \think\Collection || $article_list instanceof \think\Paginator ) && $article_list->isEmpty()))): if(is_array($article_list) || $article_list instanceof \think\Collection || $article_list instanceof \think\Paginator): $_5e95547cab423 = is_array($article_list) ? array_slice($article_list,0,4, true) : $article_list->slice(0,4, true); if( count($_5e95547cab423)==0 ) : echo "" ;else: foreach($_5e95547cab423 as $key=>$art): ?>
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
