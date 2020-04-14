<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:83:"/usr/local/var/www/dsmall/public/../application/admin/view/storedeposit/adjust.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>DSMall<?php echo \think\Lang::get('system_backend'); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo ADMIN_SITE_ROOT; ?>/css/admin.css">
        <link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.css">
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery-2.1.4.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.validate.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.cookie.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/common.js"></script>
        <script src="<?php echo ADMIN_SITE_ROOT; ?>/js/admin.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/perfect-scrollbar.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/layer/layer.js"></script>
        <script type="text/javascript">
            var BASESITEROOT = "<?php echo BASE_SITE_ROOT; ?>";
            var ADMINSITEROOT = "<?php echo ADMIN_SITE_ROOT; ?>";
            var BASESITEURL = "<?php echo BASE_SITE_URL; ?>";
            var HOMESITEURL = "<?php echo HOME_SITE_URL; ?>";
            var ADMINSITEURL = "<?php echo ADMIN_SITE_URL; ?>";
        </script>
    </head>
    <body>
        <div id="append_parent"></div>
        <div id="ajaxwaitid"></div>










<div class="page">
    <form id="user_form" method="post">
        <div class="ds-default-table">
            <table>
                <tbody>
                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('admin_storedeposit_membername'); ?></td>
                        <td class="vatop rowform">
                            <input type="hidden" name="store_id" id="store_id" value="<?php echo (isset($store_info['store_id']) && ($store_info['store_id'] !== '')?$store_info['store_id']:'0'); ?>"/>
                            <input id="seller_name" name="seller_name" value="<?php echo (isset($store_info['seller_name']) && ($store_info['seller_name'] !== '')?$store_info['seller_name']:''); ?>" class="input-txt" type="text" onchange="javascript:checkseller();">
                            <span class="err"></span>
                            <p class="notic"></p>
                        </td>    
                    </tr>
                    <tr class="noborder" id="tr_memberinfo">
                        <td colspan="2" class="required" id="td_memberinfo">
                            <?php if(!(empty($store_info) || (($store_info instanceof \think\Collection || $store_info instanceof \think\Paginator ) && $store_info->isEmpty()))): ?>
                            <?php echo $store_info['seller_name']; ?><?php echo \think\Lang::get('admin_storedeposit_storedeposit_info_1'); ?><?php echo $store_info['store_avaliable_deposit']; endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="required w120"><?php echo \think\Lang::get('admin_storedeposit_artificial_operatetype'); ?></td>
                        <td class="vatop rowform">
                            <select id="operatetype" name="operatetype">
                                <option value="1"><?php echo \think\Lang::get('admin_storedeposit_artificial_operatetype_add'); ?></option>
                                <option value="2"><?php echo \think\Lang::get('admin_storedeposit_artificial_operatetype_reduce'); ?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="required w120"><?php echo \think\Lang::get('admin_storedeposit_price'); ?></td>
                        <td class="vatop rowform"><input type="text" class="form-control" name="amount" id="amount" value="" /></td>
                    </tr>
                    <tr>
                        <td class="required w120"><?php echo \think\Lang::get('admin_storedeposit_remark'); ?></td>
                        <td class="vatop rowform"><textarea name="lg_desc" ></textarea></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="tfoot">
                        <td colspan="15"><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </form>
</div>

<script>
                        function checkseller() {
                            var membername = $.trim($("#seller_name").val());
                            if (membername == '') {
                                $("#store_id").val('0');
                                layer.alert('<?php echo \think\Lang::get('admin_storedeposit_artificial_membernamenull_error'); ?>');
                                return false;
                            }
                            var url = ADMINSITEURL + '/Storedeposit/checkseller.html';
                            $.post(url, {'name': membername}, function(data) {
                                if (data.id)
                                {
                                    $("#tr_memberinfo").show();
                                    var msg = " " + data.name + "<?php echo \think\Lang::get('admin_storedeposit_storedeposit_info_1'); ?>" + data.store_avaliable_deposit;
                                    $("#seller_name").val(data.name);
                                    $("#store_id").val(data.id);
                                    $("#td_memberinfo").text(msg);
                                }
                                else
                                {
                                    $("#seller_name").val('');
                                    $("#store_id").val('0');
                                    layer.alert("<?php echo \think\Lang::get('admin_storedeposit_userrecord_error'); ?>");
                                }
                            }, 'json');
                        }
</script>
<script type="text/javascript">
    $(function(){
        $('#user_form').validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules: {
                amount :{
                    required: true,
                    digits:true,
                    min:0,
                },
                store_id:{
                    required: true,
                }
                
                 
            },
            messages: {
                amount :{
                   required: '<?php echo \think\Lang::get('admin_storedeposit_artificial_pricenull_error'); ?>',
                   digits: '<?php echo \think\Lang::get('admin_storedeposit_artificial_pricedigits_error'); ?>',
                   min: '<?php echo \think\Lang::get('admin_storedeposit_artificial_pricemin_error'); ?>'
                },    
            }
        });
        
    });
    
    
</script>
</body>