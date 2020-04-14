<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/usr/local/var/www/dsmall/public/../application/admin/view/storeclass/form.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <div class="fixed-empty"></div>
    <form id="store_class_form" method="post">
        <table class="ds-default-table">
            <tbody>
                <tr class="noborder">
                    <td class="required w120"><label class="validation" class="storeclass_name"><?php echo \think\Lang::get('store_class_name'); ?>:</label></td>
                    <td class="vatop rowform"><input type="text" value="<?php echo (isset($storeclass['storeclass_name']) && ($storeclass['storeclass_name'] !== '')?$storeclass['storeclass_name']:''); ?>" name="storeclass_name" id="storeclass_name" class="txt"></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder">
                    <td class="required"><label class="validation" for="storeclass_name"><?php echo \think\Lang::get('store_class_bail'); ?>:</label></td>
                    <td class="vatop rowform"><input type="text" value="<?php echo (isset($storeclass['storeclass_bail']) && ($storeclass['storeclass_bail'] !== '')?$storeclass['storeclass_bail']:''); ?>" name="storeclass_bail" id="storeclass_bail" class="txt"></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder">
                    <td class="required"><label for="storeclass_sort"><?php echo \think\Lang::get('ds_sort'); ?>:</label></td>
                    <td class="vatop rowform"><input type="text" value="<?php echo (isset($storeclass['storeclass_sort']) && ($storeclass['storeclass_sort'] !== '')?$storeclass['storeclass_sort']:'0'); ?>" name="storeclass_sort" id="storeclass_sort" class="txt"></td>
                    <td class="vatop tips"><?php echo \think\Lang::get('update_sort'); ?></td>
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
<script>
    $(document).ready(function () {
        $('#store_class_form').validate({
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().parent().find('td:last'));
            },

            rules: {
                storeclass_name: {
                    required: true
                },
                storeclass_bail: {
                    required: true,
                    digits: true
                },
                storeclass_sort: {
                    number: true,
                    min: 0
                }
            },
            messages: {
                storeclass_name: {
                    required: '<?php echo \think\Lang::get('store_class_name_no_null'); ?>',
                },
                storeclass_bail: {
                    required: '<?php echo \think\Lang::get('ds_required_error'); ?>',
                    digits: "<?php echo \think\Lang::get('ds_digits_error'); ?>",
                },
                storeclass_sort: {
                    number: '<?php echo \think\Lang::get('store_class_sort_only_number'); ?>',
                    min: '<?php echo \think\Lang::get('ds_min_error'); ?>0'
                }
            }
        });
    });
</script>