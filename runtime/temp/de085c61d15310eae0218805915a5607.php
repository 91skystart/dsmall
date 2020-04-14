<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/usr/local/var/www/dsmall/public/../application/admin/view/wechat/setting.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('wechat'); ?></h3>
                <h5></h5>
            </div>
        </div>
    </div>

    <form id='Wechat_form' method="post"  name="form1">
            <table class="ds-default-table">
                <tbody>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="validation" for="apiurl"><?php echo \think\Lang::get('wx_url'); ?>:</label></td>
                        <td class="vatop rowform"><input id="apiurl" name="apiurl" value="<?php echo $wx_apiurl; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="validation" for="wx_token"><?php echo \think\Lang::get('wx_token'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wx_token" name="wx_token" value="<?php echo $wx_config['token']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="validation" for="wx_name"><?php echo \think\Lang::get('wx_name'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wx_name" name="wx_name" value="<?php echo $wx_config['wxname']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="validation" for="wx_appid"><?php echo \think\Lang::get('wx_appid'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wx_appid" name="wx_appid" value="<?php echo $wx_config['appid']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="validation" for="wx_AppSecret"><?php echo \think\Lang::get('wx_AppSecret'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wx_AppSecret" name="wx_AppSecret" value="<?php echo $wx_config['appsecret']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="" for="xcx_appid"><?php echo \think\Lang::get('xcx_appid'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wx_appid" name="xcx_appid" value="<?php echo $wx_config['xcx_appid']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w150"><label class="" for="xcx_AppSecret"><?php echo \think\Lang::get('xcx_AppSecret'); ?>:</label></td>
                        <td class="vatop rowform"><input id="wx_AppSecret" name="xcx_AppSecret" value="<?php echo $wx_config['xcx_appsecret']; ?>" class="input-txt w400" type="text"></td>
                        <td class="vatop tips"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="tfoot">
                        <td><input type="hidden" name="wx_id" value="<?php echo $wx_config['id']; ?>"></td>
                        <td colspan="15"><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
                    </tr>
                </tfoot>
            </table>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        $('#Wechat_form').validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules: {
                apiurl : {
                    required: true,
                },
                wx_token : {
                    required: true,
                },
                wx_name : {
                    required: true,
                },
                wx_appid : {
                    required: true,
                },
                wx_AppSecret :{
                    required: true,
                }
            },
            messages: {
                apiurl : {
                    required: '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('wx_url'); ?>',
                },
                wx_token : {
                    required: '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('wx_token'); ?>',
                },
                wx_name : {
                    required: '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('wx_name'); ?>',
                },
                wx_appid : {
                    required: '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('wx_appid'); ?>',
                },
                wx_AppSecret :{
                    required: '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('wx_AppSecret'); ?>',
                }
            }
        });
    });
</script>






