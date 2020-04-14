<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/usr/local/var/www/dsmall/public/../application/admin/view/account/wx.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_account'); ?></h3>
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
    
    <form id="weixin_form" method="post">
        <table class="ds-default-table">
            <tbody>
                <tr class="noborder"> 
                        <td class="required w150"><?php echo \think\Lang::get('weixin_isuse'); ?></td>
                        <td class="vatop rowform">
                            <div class="onoff">
                                 <label for="weixin_isuse_show1" class="cb-enable <?php if($list_config['weixin_isuse'] == 1): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ds_yes'); ?></label>
                                 <label for="weixin_isuse_show0" class="cb-disable <?php if($list_config['weixin_isuse'] == 0): ?>selected<?php endif; ?>"><?php echo \think\Lang::get('ds_no'); ?></label>
                                 <input id="weixin_isuse_show1" name="weixin_isuse" value="1" type="radio" <?php if($list_config['weixin_isuse'] == 1): ?> checked="checked"<?php endif; ?>>
                                 <input id="weixin_isuse_show0" name="weixin_isuse" value="0" type="radio" <?php if($list_config['weixin_isuse'] == 0): ?> checked="checked"<?php endif; ?>>
                            </div>
                        </td>
			<td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('weixin_appid'); ?></td>
                        <td class="vatop rowform"><input type="text" name="weixin_appid" id="weixin_appid" value="<?php echo $list_config['weixin_appid']; ?>" class="w300"/></td>
			<td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('weixin_secret'); ?></td>
                        <td class="vatop rowform">
                            <input type="text" name="weixin_secret" id="weixin_secret" value="<?php echo $list_config['weixin_secret']; ?>" class="w300"/>
                        </td>
                        <td class="vatop tips">
                            <a href="https://open.weixin.qq.com/cgi-bin/showdocument?action=dir_list&t=resource/res_list&verify=1&id=open1419316505&token=&lang=zh_CN" target="_blank"><?php echo \think\Lang::get('ds_documents'); ?></a>
                            <a href="https://open.weixin.qq.com" target="_blank"><?php echo \think\Lang::get('ds_apply'); ?></a>
                        </td>
                    </tr>
            </tbody>
            <tfoot>
                <td class="vatop tips"></td>
                <tr class="tfoot">
                    <td></td>
                        <td colspan="15"><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
                    </tr>	
            </tfoot>
        </table>
    </form>
</div>

<script type="text/javascript">
    $(function() {
        $('#weixin_form').validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules: {
                weixin_appid : {
                    required: true,
                },
                weixin_secret : {
                    required: true,
                },
            },
            messages: {
                weixin_appid : {
                    required: '<?php echo \think\Lang::get('sina_weixin_akey_error'); ?>',
                },
                weixin_secret : {
                    required: '<?php echo \think\Lang::get('sina_weixin_skey_error'); ?>',
                },

            }
        });
    });
</script>