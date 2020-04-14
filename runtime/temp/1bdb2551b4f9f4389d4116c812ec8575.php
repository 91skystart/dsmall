<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:92:"/usr/local/var/www/dsmall/public/../application/home/view/default/mall/showjoinin/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_joinin.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
<!doctype html>
<html>
    <head>
        <title> - <?php echo \think\Lang::get('tenants'); ?></title>
        <meta charset="utf-8">
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/common.css">
        <link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/seller_joinin.css">
        <link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.css">
        <script>
            var BASESITEROOT = "<?php echo BASE_SITE_ROOT; ?>";
            var BASESITEURL = "<?php echo BASE_SITE_URL; ?>";
            var HOMESITEURL = "<?php echo HOME_SITE_URL; ?>";
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
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
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
            <ul class="quick_list">
                <li>
                    <span class="outline"></span>
                    <span class="blank"></span>
                    <a href="<?php echo url('Seller/index'); ?>"><?php echo \think\Lang::get('business_center'); ?><b></b></a>
                    <div class="dropdown-menu">
                        <ol>
                            <li><a href="<?php echo url('Showjoinin/index'); ?>"><?php echo \think\Lang::get('tenants'); ?></a></li>
                            <li><a href="<?php echo url('Sellerlogin/login'); ?>"><?php echo \think\Lang::get('merchant_login'); ?></a></li>
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
                <li class="app-qrcode">
                    <span class="outline"></span>
                    <span class="blank"></span>
                    <a href="javascript:void(0)">APP</a>
                    <div class="dropdown-menu">
                        <img width="90" height="90" src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo \think\Config::get('site_logowx'); ?>" />
                        <h3><?php echo \think\Lang::get('scan_qr_code'); ?></h3>
                        <p><?php echo \think\Lang::get('download_mobile_client'); ?></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="header">
        <h2 class="header_logo">
            <a href="<?php echo HOME_SITE_URL; ?>"><img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo \think\Config::get('site_logo'); ?>"/></a>
        </h2>
        <span class="header_span"><?php echo \think\Lang::get('tenants'); ?></span>
    </div>
    <div class="header_nav">
        <ul class="header_menu w1200">
            <li class="<?php if(\think\Request::instance()->controller()=='Showjoinin'): ?>cur<?php endif; ?>"><a href="<?php echo url('Showjoinin/index'); ?>"><?php echo \think\Lang::get('homepage'); ?></a></li>
            <li class="<?php if(\think\Request::instance()->controller()=='Sellerjoinin'): ?>cur<?php endif; ?>"><a href="<?php echo url('Sellerjoinin/index'); ?>"><?php echo \think\Lang::get('merchant_entry_application'); ?></a></li>
            <li class="<?php if(\think\Request::instance()->controller()=='Seller'): ?>cur<?php endif; ?>"><a href="<?php echo url('Seller/index'); ?>"><?php echo \think\Lang::get('business_management_center'); ?></a></li>
            <li class="<?php if(\think\Request::instance()->controller()=='Showhelp'): ?>cur<?php endif; ?>"><a href="<?php echo url('Showhelp/index'); ?>"><?php echo \think\Lang::get('business_management_center'); ?></a></li>
        </ul>
    </div>
   <script type="text/javascript">
    function show_list(t_id) {
        var obj = $(".sidebar dl[show_id='" + t_id + "']");
        var show_class = obj.find("dt i").attr('class');
        if (show_class == 'right') {
            obj.find("dd").show();
            obj.find("dt i").attr('class', 'down');
        } else {
            obj.find("dd").hide();
            obj.find("dt i").attr('class', 'right');
        }
    }
</script>         
        


    


<div class="join_banner">
    <div class="bd">
        <ul>
            <?php if(!(empty($pic_list) || (($pic_list instanceof \think\Collection || $pic_list instanceof \think\Paginator ) && $pic_list->isEmpty()))): $pic_n = 0; if(is_array($pic_list) || $pic_list instanceof \think\Collection || $pic_list instanceof \think\Paginator): if( count($pic_list)==0 ) : echo "" ;else: foreach($pic_list as $key=>$val): if(!empty($val)): $pic_n++; ?>
            <li style="background-image: url(<?php echo UPLOAD_SITE_URL; ?>/admin/Storejion/<?php echo $val; ?>)" ></li>
            <?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
        </ul>
    </div>
    <?php if($pic_n > '1'): ?>
    <div class="hd">
        <ul>
            <?php $__FOR_START_702196996__=0;$__FOR_END_702196996__=$pic_n;for($i=$__FOR_START_702196996__;$i < $__FOR_END_702196996__;$i+=1){ ?>
            <li><i></i></li>
            <?php } ?>
        </ul>
    </div>
    <a class="prev" href="javascript:void(0)"></a>
    <a class="next" href="javascript:void(0)"></a>
    <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.SuperSlide.2.1.1.js"></script>
    <script>
        jQuery(".join_banner").slide({mainCell: ".bd ul", autoPlay: true, interTime: 4000});
    </script>
    <?php endif; ?>
</div>

<div class="indextip">
    <div class="container"> <span class="title"><i class="iconfont">&#xe651;</i>
    <h3><?php echo \think\Lang::get('prompt'); ?></h3>
    </span>
        <span class="content"><?php echo $show_txt; ?></span>
    </div>
</div>

<div class="index-notice-box">
    <ul class="index-notice clearfix">
        <li>
            <h1><?php echo \think\Lang::get('application_for_entry'); ?></h1>
            <p><?php echo \think\Lang::get('fill_in_entry_information'); ?></p>
            <a href="<?php if(\think\Session::get('is_login') == '1'): ?><?php echo url('Sellerjoinin/step0'); else: ?>javascript:login_dialog();<?php endif; ?>" class="index-notice-btn setUpShop"><?php echo \think\Lang::get('my_settled_in'); ?></a>
        </li>
        <li>
            <h1><?php echo \think\Lang::get('settled_in_progress'); ?></h1>
            <p><?php echo \think\Lang::get('understanding_store_opening_condition'); ?></p>
            <a href="<?php if(\think\Session::get('is_login') == '1'): ?><?php echo url('Sellerjoinin/index'); else: ?>javascript:login_dialog();<?php endif; ?>" class="index-notice-btn merchantsSettled"><?php echo \think\Lang::get('check_your_progress'); ?></a>
        </li>
        <li class="index-notice-last"><h1><?php echo \think\Lang::get('information_announcement'); ?></h1>
            <ul class="index-list">
                <?php foreach($index_articles as $i_a): ?>
                <li>
                    <a target="_blank" title="<?php echo $i_a['article_title']; ?>" href="<?php if($i_a['article_url'] !=''): ?><?php echo $i_a['article_url']; else: ?><?php echo url('Article/show',['article_id'=>$i_a['article_id']]); endif; ?>">
                        <?php echo $i_a['article_title']; ?>
                    </a>
                    <em><?php echo \think\Lang::get('important'); ?></em>
                </li>
                <?php endforeach; ?>
            </ul>
        </li>
    </ul>
</div>

<div class="con-floor-3 tenants-con-floor-3">
    <div class="con-topic"><?php echo \think\Lang::get('in_the_process'); ?></div>
    <div class="w1190">
        <div class="con-floor-3-single">
            <i class="iconfont">&#xe672;</i>
            <div>
                <h2><?php echo \think\Lang::get('submit_entry_information'); ?></h2>
                <em><?php echo \think\Lang::get('about'); ?>2<?php echo \think\Lang::get('hours'); ?></em>
                <ul>
                    <li><?php echo \think\Lang::get('fill_enterprise_information'); ?></li>
                    <li><?php echo \think\Lang::get('select_store_type'); ?></li>
                    <li><?php echo \think\Lang::get('fill_brand_information'); ?></li>
                    <li><?php echo \think\Lang::get('member_map_store_name'); ?></li>
                    <li><?php echo \think\Lang::get('confirm_the_contract'); ?></li>
                </ul>
            </div>
        </div>
        <i class="con-floor-3-arrow"></i>
        <div class="con-floor-3-single">
            <i class="iconfont">&#xe736;</i>
            <div>
                <h2><?php echo \think\Lang::get('merchants_waiting_review'); ?></h2>
                <em>3-6<?php echo \think\Lang::get('working_days'); ?></em>
                <ul>
                    <li><?php echo \think\Lang::get('qualification_audit'); ?></li>
                    <li><?php echo \think\Lang::get('brand_audit'); ?></li>
                </ul>
            </div>
        </div>
        <i class="con-floor-3-arrow"></i>
        <div class="con-floor-3-single">
            <i class="iconfont">&#xe65c;</i>
            <div>
                <h2><?php echo \think\Lang::get('pay_fee'); ?></h2>
                <em><?php echo \think\Lang::get('about'); ?>10<?php echo \think\Lang::get('minutes'); ?></em>
                <ul>
                    <li><?php echo \think\Lang::get('real_name_authentication'); ?></li>
                    <li><?php echo \think\Lang::get('sign_agency_agreement'); ?></li>
                    <li><?php echo \think\Lang::get('payment_fee'); ?></li>
                </ul>
            </div>
        </div>
        <i class="con-floor-3-arrow"></i>
        <div class="con-floor-3-single">
            <i class="iconfont">&#xe74f;</i>
            <div>
                <h2><?php echo \think\Lang::get('store_launch'); ?></h2>
                <em><?php echo \think\Lang::get('about'); ?>20<?php echo \think\Lang::get('minutes'); ?></em>
                <ul>
                    <li><?php echo \think\Lang::get('release_of_goods'); ?></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main mt30">
    <h2 class="index-title"><?php echo \think\Lang::get('entry_guide'); ?></h2>
    <div class="joinin-info">
        <ul class="tabs-nav">
            <?php if(!(empty($help_list) || (($help_list instanceof \think\Collection || $help_list instanceof \think\Paginator ) && $help_list->isEmpty()))): $i = 0; if(is_array($help_list) || $help_list instanceof \think\Collection || $help_list instanceof \think\Paginator): if( count($help_list)==0 ) : echo "" ;else: foreach($help_list as $key=>$val): $i++; ?>
            <li class="<?php if($i==1): ?>tabs-selected<?php endif; ?>">
                <h3><?php echo $val['help_title']; ?></h3>
            </li>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </ul>
        <?php if(!(empty($help_list) || (($help_list instanceof \think\Collection || $help_list instanceof \think\Paginator ) && $help_list->isEmpty()))): $i = 0; if(is_array($help_list) || $help_list instanceof \think\Collection || $help_list instanceof \think\Paginator): if( count($help_list)==0 ) : echo "" ;else: foreach($help_list as $key=>$val): $i++; ?>
        <div class="tabs-panel <?php if($i!=1): ?>tabs-hide<?php endif; ?>"><?php echo htmlspecialchars_decode($val['help_info']); ?></div>
        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
</div>

<script>
$(document).ready(function(){
    $(".tabs-nav > li > h3").bind('mouseover', (function(e) {
    	if (e.target == this) {
    		var tabs = $(this).parent().parent().children("li");
    		var panels = $(this).parent().parent().parent().children(".tabs-panel");
    		var index = $.inArray(this, $(this).parent().parent().find("h3"));
    		if (panels.eq(index)[0]) {
    			tabs.removeClass("tabs-selected").eq(index).addClass("tabs-selected");
    			panels.addClass("tabs-hide").eq(index).removeClass("tabs-hide");
    		}
    	}
    }));
});
</script>



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
