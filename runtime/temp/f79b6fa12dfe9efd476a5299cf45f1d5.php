<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"/usr/local/var/www/dsmall/public/../application/admin/view/storemoney/withdraw_set.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_store_money'); ?></h3>
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

    <form id="inviter_form" method="post" enctype="multipart/form-data" name="form1" action="">
        <table class="ds-default-table">
                <tbody>
                    
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('store_withdraw_cycle'); ?></td>
                        <td class="vatop rowform">
                            <input id="store_withdraw_cycle" name="store_withdraw_cycle" value="<?php echo $list_setting['store_withdraw_cycle']; ?>" class="input-txt" type="text">
                            <span class="err"></span>     
                        </td>
			<td class="vatop tips"><?php echo \think\Lang::get('store_withdraw_cycle_tips'); ?></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('store_withdraw_min'); ?></td>
                        <td class="vatop rowform">
                            <input id="store_withdraw_min" name="store_withdraw_min" value="<?php echo $list_setting['store_withdraw_min']; ?>" class="input-txt" type="text">
                        </td>
			<td class="vatop tips"><?php echo \think\Lang::get('store_withdraw_min_tips'); ?></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('store_withdraw_max'); ?></td>
                        <td class="vatop rowform">
                            <input id="store_withdraw_max" name="store_withdraw_max" value="<?php echo $list_setting['store_withdraw_max']; ?>" class="input-txt" type="text">
                        </td>
			<td class="vatop tips"><?php echo \think\Lang::get('store_withdraw_max_tips'); ?></td>
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
