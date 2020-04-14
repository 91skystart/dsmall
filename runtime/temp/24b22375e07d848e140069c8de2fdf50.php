<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:101:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellerinfo/reopen_index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
            
<div class="alert alert-block mt10">
    <ul>
        <li><?php echo \think\Lang::get('renewal_notice1'); ?></li>
        <?php if(!(empty($reopen_list) || (($reopen_list instanceof \think\Collection || $reopen_list instanceof \think\Paginator ) && $reopen_list->isEmpty()))): ?>
        <li><?php echo \think\Lang::get('renewal_notice2'); ?> <?php echo date("Y-m-d",$store_info['store_endtime']); ?>，<?php echo \think\Lang::get('renewal_notice3'); ?> <?php echo date("Y-m-d",$store_info['allow_applay_date']); ?> <?php echo \think\Lang::get('renewal_notice4'); ?></li>
        <?php endif; ?>
    </ul>
</div>
<table class="dssc-default-table">
    <thead>
        <tr>
            <th class="w10"></th>
            <th><?php echo \think\Lang::get('fee_standard'); ?></th>
            <th><?php echo \think\Lang::get('renewal_time'); ?></th>
            <th><?php echo \think\Lang::get('payment_amount'); ?></th>
            <th><?php echo \think\Lang::get('payment_voucher'); ?></th>
            <th><?php echo \think\Lang::get('ds_state'); ?></th>
            <th><?php echo \think\Lang::get('ds_handle'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php if(!(empty($reopen_list) || (($reopen_list instanceof \think\Collection || $reopen_list instanceof \think\Paginator ) && $reopen_list->isEmpty()))): if(is_array($reopen_list) || $reopen_list instanceof \think\Collection || $reopen_list instanceof \think\Paginator): if( count($reopen_list)==0 ) : echo "" ;else: foreach($reopen_list as $key=>$val): ?>
        <tr class="bd-line">
            <td></td>
            <td><?php echo $val['storereopen_grade_price']; ?> ( <?php echo $val['storereopen_grade_name']; ?> )</td>
            <td><?php echo $val['storereopen_year']; ?></td>
            <td><?php if($val['storereopen_pay_amount'] == 0): ?><?php echo \think\Lang::get('free'); else: ?><?php echo $val['storereopen_pay_amount']; endif; ?></td>
            <td>
                <?php if($val['storereopen_pay_cert'] != ''): ?>
                <a data-lightbox="lightbox-image" href="<?php echo get_store_joinin_imageurl($val['storereopen_pay_cert']); ?>"><?php echo \think\Lang::get('ds_view'); ?></a>
                <?php endif; ?>
            </td>
            <td><?php echo str_replace(array('0','1','2'),array(lang('pending_payment'),lang('pending_audit'),lang('approved_audit')),$val['storereopen_state']);?></td>
            <td class="dscs-table-handle">
                <?php if($val['storereopen_state'] == '0'): ?>
                <span><a href="javascript:void(0)" class="btn-red" onclick="ds_ajaxget_confirm('<?php echo url('Sellerinfo/reopen_del',['storereopen_id'=>$val['storereopen_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>');"><i class="iconfont">&#xe725;</i><p><?php echo \think\Lang::get('ds_del'); ?></p></a></span>
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr>
            <td colspan="20" class="norecord"><div class="warning-option"><i class="iconfont">&#xe64c;</i><span><?php echo \think\Lang::get('no_record'); ?></span></div></td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<div class="dssc-form-default">
    <?php if(isset($upload_cert)): ?>
    <form method="post" action="<?php echo url('Sellerinfo/reopen_upload'); ?>" name="upload_form" id="upload_form" enctype="multipart/form-data">
        <input type="hidden" name="storereopen_id" value="<?php echo $reopen_info['storereopen_id']; ?>">
        <dl>
            <dt><?php echo \think\Lang::get('payment_amount'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <?php echo $reopen_info['storereopen_pay_amount']; ?> <?php echo \think\Lang::get('ds_yuan'); ?>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('upload_payment_voucher'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <input name="storereopen_pay_cert" type="file">
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('note'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <textarea name="storereopen_pay_cert_explain" rows="10" cols="30"></textarea>
            </dd>
        </dl>
        <div class="bottom">
            <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>" />
        </div>
    </form>
    <?php endif; if(isset($applay_reopen)): ?>
    <form method="post" action="<?php echo url('Sellerinfo/reopen_add'); ?>" name="add_form" id="add_form">
        <dl>
            <dt><?php echo \think\Lang::get('apply_store_level'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <select name="storereopen_grade_id" style="width: auto;">
                    <?php if(!(empty($grade_list) || (($grade_list instanceof \think\Collection || $grade_list instanceof \think\Paginator ) && $grade_list->isEmpty()))): if(is_array($grade_list) || $grade_list instanceof \think\Collection || $grade_list instanceof \think\Paginator): if( count($grade_list)==0 ) : echo "" ;else: foreach($grade_list as $key=>$val): ?>
                    <option <?php if($val['storegrade_id']==$current_grade_id): ?>selected<?php endif; ?> value="<?php echo $val['storegrade_id']; ?>"><?php echo $val['storegrade_name']; if(floatval($val['storegrade_price'])>0): ?><?php echo $val['storegrade_price']; ?><?php echo \think\Lang::get('ds_yuan'); ?>/<?php echo \think\Lang::get('year'); else: ?><?php echo \think\Lang::get('free'); endif; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                </select>
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('application_renewal_duration'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
            <dd>
                <select name="storereopen_year">
                    <option value="1">1 <?php echo \think\Lang::get('year'); ?></option>
                    <option value="2">2 <?php echo \think\Lang::get('year'); ?></option>
                </select>
            </dd>
        </dl>
        <div class="bottom">
            <input type="button" id="btn_add_reopen"  class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>" />
        </div>
    </form>
    <?php endif; ?>
</div>
<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.lightbox/css/lightbox.min.css">
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.lightbox/js/lightbox.min.js"></script>
<script type="text/javascript">
                    $(document).ready(function() {
                        //页面输入内容验证
                        $('#btn_add_reopen').on('click', function() {
                            ds_ajaxpost('add_form')
                        });
                        $('#upload_form').validate({
                            rules: {
                                storereopen_pay_cert: {
                                    required: true
                                },
                                storereopen_pay_cert_explain: {
                                    maxlength: 100
                                }
                            },
                            messages: {
                                storereopen_pay_cert: {
                                    required: '<?php echo \think\Lang::get('please_select_payment_voucher'); ?>'
                                },
                                storereopen_pay_cert_explain: {
                                    maxlength: jQuery.validator.format("<?php echo \think\Lang::get('max_word'); ?>")
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

