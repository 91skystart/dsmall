<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:87:"/usr/local/var/www/dsmall/public/../application/admin/view/wechat/template_message.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3><?php echo \think\Lang::get('wechat_template_message'); ?></h3>
                <h5></h5>
            </div>
        </div>
    </div>

    <form id='Wechat_form' method="post"  name="form1">
            <table class="ds-default-table">
                <tbody>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="" for="wechat_tm_order_pay"><?php echo \think\Lang::get('order_pay_notice'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wechat_tm_order_pay" name="wechat_tm_order_pay" value="<?php echo $list_config['wechat_tm_order_pay']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"><?php echo \think\Lang::get('order_pay_notice_tips'); ?></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="" for="wechat_tm_order_send"><?php echo \think\Lang::get('order_send_notice'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wechat_tm_order_send" name="wechat_tm_order_send" value="<?php echo $list_config['wechat_tm_order_send']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"><?php echo \think\Lang::get('order_send_notice_tips'); ?></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="" for="wechat_tm_order_refund"><?php echo \think\Lang::get('order_refund_notice'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wechat_tm_order_refund" name="wechat_tm_order_refund" value="<?php echo $list_config['wechat_tm_order_refund']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"><?php echo \think\Lang::get('order_refund_notice_tips'); ?></td>
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







