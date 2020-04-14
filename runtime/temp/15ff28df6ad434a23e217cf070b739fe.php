<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:95:"/usr/local/var/www/dsmall/public/../application/home/view/default/mall/showhelp/store_help.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_joinin.html";i:1574757822;s:90:"/usr/local/var/www/dsmall/application/home/view/default/mall/showhelp/store_help_left.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
        


    


<div class="breadcrumb">
    <span class="iconfont">&#xe6ff;</span>
    <span><a href="<?php echo HOME_SITE_URL; ?>"><?php echo \think\Lang::get('homepage'); ?></a></span>
    <span class="arrow">></span>
    <span><?php echo \think\Lang::get('business_management_center'); ?></span></div>
<div class="main">
    <div class="sidebar">
        <div class="title">
            <h3><?php echo \think\Lang::get('business_management_center'); ?></h3>
        </div>
        <div class="content">
  <?php if(!(empty($help_list) || (($help_list instanceof \think\Collection || $help_list instanceof \think\Paginator ) && $help_list->isEmpty()))): if(is_array($help_list) || $help_list instanceof \think\Collection || $help_list instanceof \think\Paginator): if( count($help_list)==0 ) : echo "" ;else: foreach($help_list as $key=>$val): ?>
      <dl show_id="<?php echo $val['helptype_id']; ?>">
        <dt onclick="show_list('<?php echo $val['helptype_id']; ?>');">
            <i class="iconfont <?php echo $val['helptype_id']==$helptype_id?'down':'right'; ?>"></i><?php echo $val['helptype_name']; ?>
        </dt>
        <dd style="display: <?php echo $val['helptype_id']==$helptype_id?'block':'none'; ?>;">
            <ul>
                <?php if(!(empty($val['help_list']) || (($val['help_list'] instanceof \think\Collection || $val['help_list'] instanceof \think\Paginator ) && $val['help_list']->isEmpty()))): if(is_array($val['help_list']) || $val['help_list'] instanceof \think\Collection || $val['help_list'] instanceof \think\Paginator): if( count($val['help_list'])==0 ) : echo "" ;else: foreach($val['help_list'] as $key=>$v): ?>
                <li class="<?php echo $v['help_id']==$help_id?'curren' : ''; ?>">
                    <i class="iconfont">&#xe6dc;</i>
                    <?php if(empty($v['help_url']) || (($v['help_url'] instanceof \think\Collection || $v['help_url'] instanceof \think\Paginator ) && $v['help_url']->isEmpty())): ?>
                    <a href="<?php echo url('Showhelp/index',['t_id'=>$v['helptype_id'],'help_id'=>$v['help_id']]); ?>"><?php echo $v['help_title']; ?></a>
                    <?php else: ?>
                    <a href="<?php echo $v['help_url']; ?>"><?php echo $v['help_title']; ?></a>
                    <?php endif; ?>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </ul>
        </dd>
      </dl>
  <?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
    <div class="title">
      <h3><?php echo \think\Lang::get('platform_contact'); ?></h3>
    </div>
    <div class="content">
        <ul>
          <?php if(!(empty($phone_array) || (($phone_array instanceof \think\Collection || $phone_array instanceof \think\Paginator ) && $phone_array->isEmpty()))): if(is_array($phone_array) || $phone_array instanceof \think\Collection || $phone_array instanceof \think\Paginator): if( count($phone_array)==0 ) : echo "" ;else: foreach($phone_array as $key=>$val): ?>
          <li><?php echo \think\Lang::get('phone'); ?><?php echo $val; ?></li>
         <?php endforeach; endif; else: echo "" ;endif; endif; ?>
          <li><?php echo \think\Lang::get('email'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo \think\Config::get('site_email'); ?></li>
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
    </div>
    <div class="right-layout">
        <div class="article-con">
            <h1><?php echo $help['help_title']; ?></h1>
            <h2><?php echo \think\Lang::get('update_time'); ?> <?php echo date('Y-m-d',$help['help_updatetime']); ?></h2>
            <div class="default">
                <p><?php echo htmlspecialchars_decode($help['help_info']); ?></p>
            </div>
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
