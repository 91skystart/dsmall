<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/usr/local/var/www/dsmall/public/../application/admin/view/message/email.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_message'); ?></h3>
                <h5></h5>
            </div>
            <?php if($admin_item): ?>
<ul class="tab-base ds-row">
    <?php if(is_array($admin_item) || $admin_item instanceof \think\Collection || $admin_item instanceof \think\Paginator): if( count($admin_item)==0 ) : echo "" ;else: foreach($admin_item as $key=>$item): ?>
    <li><a href="<?php echo $item['url']; ?>" <?php if($item['name'] == $curitem): ?>class="current"<?php endif; ?>><span><?php echo $item['text']; ?></span></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php endif; ?>
        </div>
    </div>

    <form method="post">
        <table class="ds-default-table">
                <tbody>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('smtp_server'); ?></td>
                        <td class="vatop rowform"><input type="text" name="email_host" id="email_host" value="<?php echo $list_config['email_host']; ?>" class="w200"/></td>
			<td class="vatop tips"><p class="notic"><?php echo \think\Lang::get('set_smtp_server_address'); ?></p></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('email_secure'); ?></td>
                        <td class="vatop rowform">
                            <select name="email_secure" id="email_secure">
                                <option value="tls" <?php if($list_config['email_secure'] == 'tls'): ?>selected=selected<?php endif; ?>><?php echo \think\Lang::get('email_secure_tls'); ?></option>
                                <option value="ssl" <?php if($list_config['email_secure'] == 'ssl'): ?>selected=selected<?php endif; ?>><?php echo \think\Lang::get('email_secure_ssl'); ?></option>
                            </select>
                        </td>
			<td class="vatop tips"><p class="notic"><?php echo \think\Lang::get('set_email_secure'); ?></p></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('email_port'); ?></td>
                        <td class="vatop rowform"><input type="text" name="email_port" id="email_port" value="<?php echo $list_config['email_port']; ?>" class="w200"/></td>
			<td class="vatop tips"><p class="notic"><?php echo \think\Lang::get('set_email_port'); ?></p></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('sender_mail_address'); ?></td>
                        <td class="vatop rowform"><input type="text" name="email_addr" id="email_addr" value="<?php echo $list_config['email_addr']; ?>" class="w200"/></td>
			<td class="vatop tips"><p class="notic"><?php echo \think\Lang::get('if_smtp_authentication'); ?></p></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('smtp_user_name'); ?></td>
                        <td class="vatop rowform"><input type="text" name="email_id" id="email_id" value="<?php echo $list_config['email_id']; ?>" class="w200"/></td>
			<td class="vatop tips"><p class="notic"><?php echo \think\Lang::get('smtp_user_name_tip'); ?></p></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('smtp_user_pwd'); ?></td>
                        <td class="vatop rowform"><input type="password" name="email_pass" id="email_pass" value="<?php echo $list_config['email_pass']; ?>" class="w200"/></td>
			<td class="vatop tips"><p class="notic"><?php echo \think\Lang::get('smtp_user_pwd_tip'); ?></p></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('test_mail_address'); ?></td>
                        <td class="vatop rowform">
                            <input type="text" name="email_test" id="email_test" value="" class="w200"/>
                            <input type="button" value="<?php echo \think\Lang::get('test_mail'); ?>" name="send_test_email" class="btn btn-small" id="send_test_email" >
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="tfoot">
                        <td></td>
                        <td colspan="15"><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
                    </tr>					
                </tfoot>
            </table>
    </form>
</div>

<script>
    $(document).ready(function(){
        $('#send_test_email').click(function(){
            $.ajax({
                type:'POST',
                url:"<?php echo url('Message/email_testing'); ?>",
                data:{'email_host':$('#email_host').val(),'email_secure':$('#email_secure option:selected').val(),'email_port':$('#email_port').val(),'email_addr':$('#email_addr').val(),'email_id':$('#email_id').val(),'email_pass':$('#email_pass').val(),'email_test':$('#email_test').val()},
                error:function(html){
                    layer.alert(html.msg);
                },
                success:function(html){
                    layer.alert(html.msg);
                },
                dataType:'json'
            });
        });
    });
</script>