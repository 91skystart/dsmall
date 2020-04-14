<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:99:"/usr/local/var/www/dsmall/public/../application/home/view/default/member/sellerjoininc2c/step1.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_joinin.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
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
        


    

<script type="text/javascript" src="<?php echo HTTP_TYPE; ?>api.map.baidu.com/api?v=2.0&ak=22bb7221fc279a484895afcc6a0bb33a"></script>
<script>
    var local;
    var map;
    var lst_name='';
    function change_map(){
            if($("#area_ select:eq(0)").length>0 && $("#area_ select:eq(0) option:selected").val()!=''){
                var name=$("#area_ select:eq(0) option:selected").text();
            }
            if($("#area_ select:eq(1)").length>0 && $("#area_ select:eq(1) option:selected").val()!=''){
                var name=$("#area_ select:eq(1) option:selected").text();
            }
            if($("#area_ select:eq(2)").length>0 && $("#area_ select:eq(2) option:selected").val()!=''){
                var name=$("#area_ select:eq(2) option:selected").text();
            }
            if(name!='' && lst_name!=name){
                lst_name=name;
                map.setCurrentCity(name);
                map.centerAndZoom(name,16);
                map.clearOverlays();
                local.search(name);
            }
            
    }
    $(function(){
        map = new BMap.Map("allmap");
        var geolocation = new BMap.Geolocation();
        geolocation.getCurrentPosition(function (r) {
            if (this.getStatus() == BMAP_STATUS_SUCCESS) {
                var lng = r.point.lng;
                var lat = r.point.lat;
                var point = new BMap.Point(lng, lat);
                map.centerAndZoom(point, 16);
                map.addControl(new BMap.NavigationControl());
                map.enableScrollWheelZoom();    
                var marker = new BMap.Marker(point);  // 创建标注
                map.addOverlay(marker);              // 将标注添加到地图中
                marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
                document.getElementById("longitude").value = lng;
                document.getElementById("latitude").value = lat;

            } else {
                layer.msg('failed' + this.getStatus());
            }
        }, {enableHighAccuracy: true})
             
                var options = {
                        onSearchComplete: function(results){
                                // 判断状态是否正确
                                if (local.getStatus() == BMAP_STATUS_SUCCESS){
                                    if(results.getCurrentNumPois()>0){
                        
                                        map.clearOverlays();  //清除标注  或者可以把market 放入数组
                                        var point = new BMap.Point(results.getPoi(0).point.lng , results.getPoi(0).point.lat);
                                        var marker = new BMap.Marker(point);
                                        map.centerAndZoom(point, 16);
                                        map.addOverlay(marker);
                                        marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
                                        
                                        document.getElementById("longitude").value = results.getPoi(0).point.lng;
                                        document.getElementById("latitude").value = results.getPoi(0).point.lat;
                                        
                                    }
                                }
                        }
                };
                local = new BMap.LocalSearch(map, options);
                map.addEventListener("click", function(e){
//                    alert(e.point.lng + ", " + e.point.lat);
                    map.clearOverlays();  //清除标注  或者可以把market 放入数组
                    var point = new BMap.Point(e.point.lng , e.point.lat);
                    var marker = new BMap.Marker(point);
                    map.addOverlay(marker);
                    marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
                    
                    document.getElementById("longitude").value = e.point.lng;
                    document.getElementById("latitude").value = e.point.lat;
                });
    })
</script>
<div class="breadcrumb"><span class="iconfont">&#xe6ff;</span><span><a href=""><?php echo \think\Lang::get('homepage'); ?></a></span> <span class="arrow">></span> <span><?php echo \think\Lang::get('merchant_entry_application'); ?></span> </div>
<div class="main">
    <div class="sidebar">
        <div class="title">
            <h3><?php echo \think\Lang::get('merchant_entry_application'); ?></h3>
        </div>
        <div class="content">
            <dl>
                <dt class="<?php if($sub_step=='step0'): ?>current<?php endif; ?>"> <i class="right"></i><?php echo \think\Lang::get('enter_agreement'); ?></dt>
            </dl>
            <dl show_id="0">
                <dt onclick="show_list('0');" style="cursor: pointer;"> <i class="down"></i><?php echo \think\Lang::get('submit_application'); ?></dt>
                <dd>
                    <ul>
                        <li class="<?php if($sub_step == 'step1'): ?>current<?php endif; ?>"><i></i><?php echo \think\Lang::get('store_qualification_information'); ?></li>
                        <li class="<?php if($sub_step == 'step2'): ?>current<?php endif; ?>"><i></i><?php echo \think\Lang::get('financial_qualification_information'); ?></li>
                        <li class="<?php if($sub_step == 'step3'): ?>current<?php endif; ?>"><i></i><?php echo \think\Lang::get('store_operation_information'); ?></li>
                    </ul>
                </dd>
            </dl>
            <dl>
                <dt class="<?php if($sub_step == 'pay'): ?>current<?php endif; ?>"> <i class="right"></i><?php echo \think\Lang::get('contract_signing_payment'); ?></dt>
            </dl>
            <dl>
                <dt> <i class="right"></i><?php echo \think\Lang::get('store_opening'); ?></dt>
            </dl>
        </div>
        <div class="title">
            <h3><?php echo \think\Lang::get('platform_contact'); ?></h3>
        </div>
        <div class="content">
            <ul>
                <li><?php echo \think\Lang::get('phone'); ?>：<?php echo \think\Config::get('site_phone'); ?></li>
                <li><?php echo \think\Lang::get('email'); ?>：<?php echo \think\Config::get('site_email'); ?></li>
            </ul> 
        </div>
    </div>
    <div class="right-layout">
        <div class="joinin-step">
            <ul>
                <li class="step1 <?php if($sub_step >= 'step0'): ?>current<?php endif; if($sub_step == 'pay'): ?>current<?php endif; ?>"><span><?php echo \think\Lang::get('enter_agreement'); ?></span></li>
                <li class="<?php if($sub_step >= 'step1'): ?>current<?php endif; if($sub_step == 'pay'): ?>current<?php endif; ?>"><span><?php echo \think\Lang::get('store_qualification_information'); ?></span></li>
                <li class="<?php if($sub_step >= 'step2'): ?>current<?php endif; if($sub_step == 'pay'): ?>current<?php endif; ?>"><span><?php echo \think\Lang::get('financial_qualification_information'); ?></span></li>
                <li class="<?php if($sub_step >= 'step3'): ?>current<?php endif; if($sub_step == 'pay'): ?>current<?php endif; ?>"><span><?php echo \think\Lang::get('store_operation_information'); ?></span></li>
                <li class="<?php if($sub_step >= 'step4'): ?>current<?php endif; if($sub_step == 'pay'): ?>current<?php endif; ?>"><span><?php echo \think\Lang::get('contract_signing_payment'); ?></span></li>
                <li class="step6"><span><?php echo \think\Lang::get('store_opening'); ?></span></li>
            </ul>
        </div>
        <div class="joinin-concrete">
<!-- 公司信息 -->

<div id="apply_company_info" class="apply-company-info">
  <div class="alert">
    <h4><?php echo \think\Lang::get('matters_needing_attention'); ?>：</h4>
    <?php echo \think\Lang::get('upload_information1'); ?></div>
  <form id="form_company_info" action="<?php echo url('Sellerjoininc2c/step2'); ?>" method="post" enctype="multipart/form-data" >
    <table border="0" cellpadding="0" cellspacing="0" class="all">
      <thead>
        <tr>
          <th colspan="2"><?php echo \think\Lang::get('store_contact_information'); ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('store_name'); ?>：</th>
          <td><input name="company_name" type="text" class="w200"/>
            <span></span></td>
        </tr>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('location'); ?>：</th>
          <td id="area_" onclick="change_map()">
              <input type="hidden" value="" name="company_address" id="company_address">
           <input type="hidden" value="" name="province_id" id="_area_1">
           <input type="hidden" value="" name="city_id" id="_area_2">
           <input type="hidden" value="" name="district_id" id="_area_3">
            <span></span></td>
        </tr>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('detailed_address'); ?>：</th>
          <td><input name="company_address_detail" type="text" class="w200" onkeyup="local.search($(this).val());">
            <span></span>
            <div>
                <input name="longitude" id="longitude" type="hidden" />
                <input name="latitude" id="latitude" type="hidden" />
                <div id="allmap" style="width:530px;height: 350px;margin-top: 20px"></div>
            </div>
          </td>
        </tr>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('contact_name'); ?>：</th>
          <td><input name="contacts_name" type="text" class="w100" />
            <span></span></td>
        </tr>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('contact_number'); ?>：</th>
          <td><input name="contacts_phone" type="text" class="w100" />
            <span></span></td>
        </tr>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('email_address'); ?>：</th>
          <td><input name="contacts_email" type="text" class="w200" />
            <span></span></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="20">&nbsp;</td>
        </tr>
      </tfoot>
    </table>
    <table border="0" cellpadding="0" cellspacing="0" class="all">
      <thead>
        <tr>
          <th colspan="20"><?php echo \think\Lang::get('business_license_information'); ?></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('business_license_number'); ?>：</th>
          <td><input name="business_licence_number" type="text" class="w200" />
            <span></span></td>
        </tr>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('place_business_license'); ?>：</th>
          <td><input id="business_licence_address" name="business_licence_address" type="hidden" />
            <span></span></td>
        </tr>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('validity_business_license'); ?>：</th>
          <td><input id="business_licence_start" name="business_licence_start" type="text" class="w90" />
            <span></span>-
            <input id="business_licence_end" name="business_licence_end" type="text" class="w90" />
            <span></span></td>
        </tr>
        <tr>
          <th><?php echo \think\Lang::get('legal_scope_business'); ?>：</th>
          <td><textarea name="business_sphere" rows="3" class="w200"></textarea>
            <span></span></td>
        </tr>
        <tr>
          <th><i>*</i><?php echo \think\Lang::get('business_license'); ?><?php echo \think\Lang::get('electronic_version'); ?>：</th>
          <td><input name="business_licence_number_electronic" type="file" class="w200" />
            <span class="block"><?php echo \think\Lang::get('upload_information2'); ?></span></td>
        </tr>
      </tbody>
      <tfoot>
        <tr>
          <td colspan="20">&nbsp;</td>
        </tr>
      </tfoot>
    </table>
  </form>
  <div class="bottom"><a id="btn_apply_company_next" href="javascript:;" class="btn"><?php echo \think\Lang::get('upload_information3'); ?></a></div>
</div>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){

    $('#company_address').ds_region();
    $('#business_licence_address').ds_region();

    $('#business_licence_start').datepicker({dateFormat: 'yy-mm-dd'});
    $('#business_licence_end').datepicker({dateFormat: 'yy-mm-dd'});

    $('#btn_apply_agreement_next').on('click', function() {
        if($('#input_apply_agreement').prop('checked')) {
            $('#apply_agreement').hide();
            $('#apply_company_info').show();
        } else {
            layer.msg('<?php echo \think\Lang::get('read_agree_agreement'); ?>');
        }
    });

    $('#form_company_info').validate({
        errorPlacement: function(error, element){
            element.nextAll('span').first().after(error);
        },
        rules : {
            company_name: {
                required: true,
                maxlength: 50 
            },
            company_address: {
                required: true,
                maxlength: 50 
            },
            company_address_detail: {
                required: true,
                maxlength: 50 
            },

            company_registered_capital: {
                required: true,
                digits: true 
            },
            contacts_name: {
                required: true,
                maxlength: 20 
            },
            contacts_phone: {
                required: true,
                maxlength: 11, 
                minlength: 11,
            },
            contacts_email: {
                required: true,
                email: true 
            },
            business_licence_number: {
                required: true,
                maxlength: 20
            },
            business_licence_address: {
                required: true,
                maxlength: 50
            },
            business_licence_start: {
                required: true
            },
            business_licence_end: {
                required: true
            },
           
        },
        messages : {
            company_name: {
                required: '<?php echo \think\Lang::get('enter_company_name'); ?>',
                maxlength: jQuery.validator.format("<?php echo \think\Lang::get('most_words'); ?>")
            },
            company_address: {
                required: '<?php echo \think\Lang::get('select_area_address'); ?>',
                maxlength: jQuery.validator.format("<?php echo \think\Lang::get('most_words'); ?>")
            },
            company_address_detail: {
                required: '<?php echo \think\Lang::get('enter_company_details'); ?>',
                maxlength: jQuery.validator.format("<?php echo \think\Lang::get('most_words'); ?>")
            },
            company_registered_capital: {
                required: '<?php echo \think\Lang::get('enter_registered_capital'); ?>',
                digits: '<?php echo \think\Lang::get('must_numeric'); ?>'
            },
            contacts_name: {
                required: '<?php echo \think\Lang::get('enter_contact_name'); ?>',
                maxlength: jQuery.validator.format("<?php echo \think\Lang::get('most_words'); ?>")
            },
            contacts_phone: {
                required: '<?php echo \think\Lang::get('enter_contact_phone'); ?>',
                maxlength: "<?php echo \think\Lang::get('fill_your_phone_number_correctly'); ?>",
                minlength: "<?php echo \think\Lang::get('fill_your_phone_number_correctly'); ?>",
            },
            contacts_email: {
                required: '<?php echo \think\Lang::get('enter_common_email_address'); ?>',
                email: '<?php echo \think\Lang::get('fill_correct_email_address'); ?>'
            },
            business_licence_number: {
                required: '<?php echo \think\Lang::get('enter_business_license_number'); ?>',
                maxlength: jQuery.validator.format("<?php echo \think\Lang::get('most_words'); ?>")
            },
            business_licence_address: {
                required: '<?php echo \think\Lang::get('select_location_business_license'); ?>',
                maxlength: jQuery.validator.format("<?php echo \think\Lang::get('most_words'); ?>")
            },
            business_licence_start: {
                required: '<?php echo \think\Lang::get('select_effective_date'); ?>'
            },
            business_licence_end: {
                required: '<?php echo \think\Lang::get('select_end_date'); ?>'
            },

        }
    });

    $('#btn_apply_company_next').on('click', function() {
        if($('#form_company_info').valid()) {
            $('#form_company_info').submit();
        }
    });
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
