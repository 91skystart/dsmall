<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:92:"/usr/local/var/www/dsmall/public/../application/admin/view/promotionbooth/booth_setting.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <form id="add_form" method="post">
        <table class="ds-default-table">
            <tbody>
            <tr class="noborder">
                <td class="required w150"><label class="validation" for="promotion_booth_price"><?php echo \think\Lang::get('promotion_booth_price'); ?><?php echo \think\Lang::get('ds_colon'); ?></label></td>
                <td class="vatop rowform">
                    <input type="text" id="promotion_booth_price" name="promotion_booth_price" value="<?php echo $setting['promotion_booth_price']; ?>" class="txt">
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('promotion_booth_price_tips'); ?></td>
            </tr>
            <tr class="noborder">
                <td class="required"><label class="validation" for="promotion_booth_goods_sum"><?php echo \think\Lang::get('promotion_booth_goods_sum'); ?><?php echo \think\Lang::get('ds_colon'); ?></label></td>
                <td class="vatop rowform">
                    <input type="text" id="promotion_booth_goods_sum" name="promotion_booth_goods_sum" value="<?php echo $setting['promotion_booth_goods_sum']; ?>" class="txt">
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('promotion_booth_goods_sum_tips'); ?></td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="tfoot">
                <td colspan="15"><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
            </tr>
            </tfoot>
        </table>
    </form>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        //页面输入内容验证
        $("#add_form").validate({
            errorPlacement: function(error, element){
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules : {
                promotion_booth_price: {
                    required : true,
                    digits : true
                },
                promotion_booth_goods_sum: {
                    required : true,
                    digits : true,
                    min : 1
                }
            },
            messages : {
                promotion_booth_price: {
                    required : '<?php echo \think\Lang::get('ds_required_error'); ?>',
                    digits : '<?php echo \think\Lang::get('ds_digits_error'); ?>'
                },
                promotion_booth_goods_sum: {
                    required : '<?php echo \think\Lang::get('ds_required_error'); ?>',
                    digits : '<?php echo \think\Lang::get('ds_digits_error'); ?>',
                    min : '<?php echo \think\Lang::get('ds_min_error'); ?>1'
                }
            }
        });
    });
</script> 