<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/usr/local/var/www/dsmall/public/../application/admin/view/index/modifypw.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <form id="admin_form" method="post" action='' name="adminForm">
        <table class="ds-default-table">
            <tbody>
                <tr class="noborder">
                    <td colspan="2" class="required"><label class="validation" for="old_pw"><?php echo \think\Lang::get('index_modifypw_oldpw'); ?><!-- 原密码 -->:</label></td>
                </tr>
                <tr class="noborder">
                    <td class="vatop rowform"><input id="old_pw" name="old_pw" class="infoTableInput" type="password"></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr>
                    <td colspan="2" class="required"><label class="validation" for="new_pw"><?php echo \think\Lang::get('index_modifypw_newpw'); ?><!-- 新密码 -->:</label></td>
                </tr>
                <tr class="noborder">
                    <td class="vatop rowform"><input id="new_pw" name="new_pw" class="infoTableInput" type="password"></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr>
                    <td colspan="2" class="required"><label class="validation" for="new_pw2"><?php echo \think\Lang::get('index_modifypw_newpw2'); ?><!-- 确认密码-->:</label></td>
                </tr>
                <tr class="noborder">
                    <td class="vatop rowform"><input id="new_pw2" name="new_pw2" class="infoTableInput" type="password"></td>
                    <td class="vatop tips"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="tfoot">
                    <td colspan="2" ><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<script>
    $(document).ready(function () {
        $("#admin_form").validate({
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().parent().prev().find('td:first'));
            },
            rules: {
                old_pw: {
                    required: true
                },
                new_pw: {
                    required: true,
                    minlength: 6,
                    maxlength: 20
                },
                new_pw2: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                    equalTo: '#new_pw'
                }
            },
            messages: {
                old_pw: {
                    required: '<?php echo \think\Lang::get('admin_add_password_null'); ?>'
                },
                new_pw: {
                    required: '<?php echo \think\Lang::get('admin_add_password_null'); ?>',
                    minlength: '<?php echo \think\Lang::get('admin_add_password_max'); ?>',
                    maxlength: '<?php echo \think\Lang::get('admin_add_password_max'); ?>'
                },
                new_pw2: {
                    required: '<?php echo \think\Lang::get('admin_add_password_null'); ?>',
                    minlength: '<?php echo \think\Lang::get('admin_add_password_max'); ?>',
                    maxlength: '<?php echo \think\Lang::get('admin_add_password_max'); ?>',
                    equalTo: '<?php echo \think\Lang::get('admin_edit_repeat_error'); ?>'
                }
            }
        });
    });
</script> 