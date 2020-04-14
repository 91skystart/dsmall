<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/usr/local/var/www/dsmall/public/../application/admin/view/appadv/ap_form.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <form id="link_form" enctype="multipart/form-data" method="post">
        <table class="ds-default-table">
            <tbody>
                <tr class="noborder">
                    <td class="required"><label class="validation" for="ap_name"><?php echo \think\Lang::get('ap_name'); ?>:</label></td>
                    <td class="vatop rowform"><input type="text" name="ap_name" id="ap_name" class="txt" value="<?php echo (isset($ap['ap_name']) && ($ap['ap_name'] !== '')?$ap['ap_name']:''); ?>">
                    </td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder">
                    <td class="required w120"><?php echo \think\Lang::get('ap_isuse'); ?>:</td>
                    <td class="vatop rowform">
                        <div class="onoff">
                            <label for="ap_isuse1" class="cb-enable <?php if($ap['ap_isuse'] == 1): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ap_use_s'); ?></label>
                            <label for="ap_isuse0" class="cb-disable <?php if($ap['ap_isuse'] == 0): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ap_not_use_s'); ?></label>
                            <input id="ap_isuse1" name="ap_isuse" value="1" type="radio" <?php if($ap['ap_isuse'] == 1): ?> checked="checked"<?php endif; ?> />
                            <input id="ap_isuse0" name="ap_isuse" value="0" type="radio" <?php if($ap['ap_isuse'] == 0): ?> checked="checked"<?php endif; ?> />
                        </div>
                    </td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder">
                    <td class="required"><label class="validation" for="ap_width"><?php echo \think\Lang::get('ap_width'); ?>:</label></td>
                    <td class="vatop rowform"><input type="text" name="ap_width" class="txt" id="ap_width" value="<?php echo (isset($ap['ap_width']) && ($ap['ap_width'] !== '')?$ap['ap_width']:''); ?>"></td>
                    <td class="vatop tips"><?php echo \think\Lang::get('adv_pix'); ?></td>
                </tr>
                <tr class="noborder">
                    <td class="required"><label class="validation" for="ap_height"><?php echo \think\Lang::get('ap_height'); ?>:</label></td>
                    <td class="vatop rowform"><input type="text" name="ap_height" class="txt" id="ap_height" value="<?php echo (isset($ap['ap_height']) && ($ap['ap_height'] !== '')?$ap['ap_height']:''); ?>"></td>
                    <td class="vatop tips"><?php echo \think\Lang::get('adv_pix'); ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="tfoot">
                    <td colspan="15" ><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<script>
$(document).ready(function () {
    $('#link_form').validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parent().parent().find('td:last'));
        },
        rules: {
            ap_name: {
                required: true
            },
            ap_width: {
                required: true,
                number:true
            },
            ap_height: {
                required: true,
                number:true
            }
        },
        messages: {
            ap_name: {
                required: '<?php echo \think\Lang::get('ap_can_not_null'); ?>'
            },
            ap_width: {
                required: '<?php echo \think\Lang::get('ap_input_digits_pixel'); ?>',
                number:'<?php echo \think\Lang::get('ds_sort_number'); ?>'
            },
            ap_height: {
                required: '<?php echo \think\Lang::get('ap_input_digits_pixel'); ?>',
                number:'<?php echo \think\Lang::get('ds_sort_number'); ?>'
            }
        }
    });
});
</script>