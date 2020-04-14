<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/usr/local/var/www/dsmall/public/../application/admin/view/message/mobile.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
            <tr>
                <td class="required w120"><?php echo \think\Lang::get('smscf_sign'); ?></td>
                <td class="vatop rowform">
                    <input type="text" name="smscf_sign" id="smscf_sign" value="<?php echo $list_config['smscf_sign']; ?>" class="w200"/>
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('smscf_sign_tips'); ?></td>
            </tr>
            <tr>
                <td class="required w120"><?php echo \think\Lang::get('smscf_type'); ?></td>
                <td class="vatop rowform">
                    <select id="smscf_type" name="smscf_type">
                        <option value="wj" <?php if($list_config['smscf_type']=='wj'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('smscf_type_wj'); ?></option>
                        <option value="ali" <?php if($list_config['smscf_type']=='ali'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('smscf_type_ali'); ?></option>
                    </select>
                </td>
                <td class="vatop tips"></td>
            </tr>
            <tr class="noborder smscf_type_wj" <?php if($list_config['smscf_type']!='wj'): ?>style="display:none"<?php endif; ?>>
                <td class="required w120"><?php echo \think\Lang::get('smscf_wj_username'); ?></td>
                <td class="vatop rowform">
                    <input type="text" name="smscf_wj_username" id="smscf_wj_username" value="<?php echo $list_config['smscf_wj_username']; ?>" class="w200"/>
                </td>
                <td class="vatop tips"></td>
            </tr>
            <tr class="noborder smscf_type_wj" <?php if($list_config['smscf_type']!='wj'): ?>style="display:none"<?php endif; ?>>
                <td class="required w120"><?php echo \think\Lang::get('smscf_wj_key'); ?></td>
                <td class="vatop rowform">
                    <input type="text" name="smscf_wj_key" id="smscf_wj_key" value="<?php echo $list_config['smscf_wj_key']; ?>" class="w200"/>
                    <a href="http://sms.webchinese.com.cn/" target="_blank" class="btn btn-blue btn-mini"><?php echo \think\Lang::get('ds_apply'); ?></a>
                </td>
                <td class="vatop tips"></td>
            </tr>
            <?php if(!(empty($smscf_num) || (($smscf_num instanceof \think\Collection || $smscf_num instanceof \think\Paginator ) && $smscf_num->isEmpty()))): ?>
            <tr class="noborder">
                <td class="required w120"><?php echo \think\Lang::get('smscf_num'); ?></td>
                <td><?php echo $smscf_num; ?></td>
                <td class="vatop tips"></td>
            </tr>
            <?php endif; ?>
            <tr class="noborder smscf_type_ali" <?php if($list_config['smscf_type']!='ali'): ?>style="display:none"<?php endif; ?>>
                <td class="required w120"><?php echo \think\Lang::get('smscf_ali_id'); ?></td>
                <td class="vatop rowform">
                    <input type="text" name="smscf_ali_id" id="smscf_ali_id" value="<?php echo $list_config['smscf_ali_id']; ?>" class="w200"/>
                    <a href="https://www.aliyun.com/product/sms" target="_blank" class="btn btn-blue btn-mini"><?php echo \think\Lang::get('ds_apply'); ?></a>
                </td>
                <td class="vatop tips"></td>
            </tr>
            <tr class="noborder smscf_type_ali" <?php if($list_config['smscf_type']!='ali'): ?>style="display:none"<?php endif; ?>>
                <td class="required w120"><?php echo \think\Lang::get('smscf_ali_secret'); ?></td>
                <td class="vatop rowform">
                    <input type="text" name="smscf_ali_secret" id="smscf_ali_secret" value="<?php echo $list_config['smscf_ali_secret']; ?>" class="w200"/>
                </td>
                <td class="vatop tips"></td>
            </tr>
            <tr class="noborder">
                <td class="required w120"><?php echo \think\Lang::get('sms_register'); ?></td>
                <td class="vatop rowform">
                    <div class="onoff">
                        <label for="sms_register_show1" class="cb-enable <?php if($list_config['sms_register'] == 1): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ds_yes'); ?></label>
                        <label for="sms_register_show0" class="cb-disable <?php if($list_config['sms_register'] == 0): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ds_no'); ?></label>
                        <input id="sms_register_show1" name="sms_register" value="1" type="radio" <?php if($list_config['sms_register'] == 1): ?> checked="checked"<?php endif; ?>>
                        <input id="sms_register_show0" name="sms_register" value="0" type="radio" <?php if($list_config['sms_register'] == 0): ?> checked="checked"<?php endif; ?>>
                    </div>
                </td>
                <td class="vatop tips"></td>
            </tr>
            <tr class="noborder">
                <td class="required"><?php echo \think\Lang::get('sms_login'); ?></td>
                <td class="vatop rowform">
                    <div class="onoff">
                        <label for="sms_login_show1" class="cb-enable <?php if($list_config['sms_login'] == 1): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ds_yes'); ?></label>
                        <label for="sms_login_show0" class="cb-disable <?php if($list_config['sms_login'] == 0): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ds_no'); ?></label>
                        <input id="sms_login_show1" name="sms_login" value="1" type="radio" <?php if($list_config['sms_login'] == 1): ?> checked="checked"<?php endif; ?>>
                        <input id="sms_login_show0" name="sms_login" value="0" type="radio" <?php if($list_config['sms_login'] == 0): ?> checked="checked"<?php endif; ?>>
                    </div>
                </td>
            </tr>
            <tr class="noborder">
                <td class="required"><?php echo \think\Lang::get('sms_password'); ?></td>
                <td class="vatop rowform">
                    <div class="onoff">
                        <label for="sms_password_show1" class="cb-enable <?php if($list_config['sms_password'] == 1): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ds_yes'); ?></label>
                        <label for="sms_password_show0" class="cb-disable <?php if($list_config['sms_password'] == 0): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ds_no'); ?></label>
                        <input id="sms_password_show1" name="sms_password" value="1" type="radio" <?php if($list_config['sms_password'] == 1): ?> checked="checked"<?php endif; ?>>
                        <input id="sms_password_show0" name="sms_password" value="0" type="radio" <?php if($list_config['sms_password'] == 0): ?> checked="checked"<?php endif; ?>>
                    </div>
                </td>
            </tr>
            <tr class="noborder">
                <td class="required w120"><?php echo \think\Lang::get('test_mobile_address'); ?></td>
                <td class="vatop rowform">
                    <input type="text" name="mobile_test" id="mobile_test" value="" class="w200"/>
                    <input type="button" value="<?php echo \think\Lang::get('test_mail'); ?>" name="send_test_mobile" class="btn btn-small" id="send_test_mobile" >
                </td>
            </tr>
            <tr class="noborder smscf_type_ali" <?php if($list_config['smscf_type']!='ali'): ?>style="display:none"<?php endif; ?>>
                <td class="required w120"><?php echo \think\Lang::get('ali_template_code'); ?></td>
                <td class="vatop rowform">
                    <input type="text" name="ali_template_code" id="ali_template_code" value="" class="w200"/>
                </td>
            </tr>
            <tr class="noborder smscf_type_ali" <?php if($list_config['smscf_type']!='ali'): ?>style="display:none"<?php endif; ?>>
                <td class="required w120"><?php echo \think\Lang::get('ali_template_content'); ?></td>
                <td class="vatop rowform">
                    <textarea name="ali_template_content" id="ali_template_content" class="w200"></textarea>
                </td>
                <td class="vatop tips"></td>
            </tr>
            <tr class="noborder smscf_type_ali" <?php if($list_config['smscf_type']!='ali'): ?>style="display:none"<?php endif; ?>>
                <td class="required w120"><?php echo \think\Lang::get('ali_template_param'); ?></td>
                <td class="vatop rowform">
                    <textarea name="ali_template_param" id="ali_template_param" class="w200"></textarea>
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('ali_template_param_tips'); ?></td>
            </tr>
            <tr class="noborder smscf_type_wj" <?php if($list_config['smscf_type']!='wj'): ?>style="display:none"<?php endif; ?>>
                <td class="required w120"><?php echo \think\Lang::get('test_mobile_content'); ?></td>
                <td class="vatop rowform">
                    <textarea name="mobile_test_content" id="mobile_test_content" class="w200"></textarea>
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
        $('#send_test_mobile').click(function(){
            $.ajax({
                type:'POST',
                url:"<?php echo url('Message/mobile_testing'); ?>",
                data:{'smscf_sign':$('#smscf_sign').val(),'smscf_type':$('#smscf_type').val(),'smscf_ali_secret':$('#smscf_ali_secret').val(),'smscf_ali_id':$('#smscf_ali_id').val(),'ali_template_content':$('#ali_template_content').val(),'ali_template_param':$('#ali_template_param').val(),'ali_template_code':$('#ali_template_code').val(),'mobile_test_content':$('#mobile_test_content').val(),'smscf_wj_username':$('#smscf_wj_username').val(),'smscf_wj_key':$('#smscf_wj_key').val(),'mobile_test':$('#mobile_test').val()},
                error:function(html){
                    layer.alert('<?php echo \think\Lang::get('ds_common_op_fail'); ?>');
                },
                success:function(html){
                    if(html.msg){
                        layer.alert(html.msg);
                    }
                },
                dataType:'json'
            });
        });
        $('#smscf_type').change(function(){
            if($(this).val()=='wj'){
                $('.smscf_type_ali').hide()
                $('.smscf_type_wj').show()
            }
            if($(this).val()=='ali'){
                $('.smscf_type_ali').show()
                $('.smscf_type_wj').hide()
            }
        })
    });
</script>