<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"/usr/local/var/www/dsmall/public/../application/admin/view/message/seller_tpl.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('message_help1'); ?></li>
            <li><?php echo \think\Lang::get('message_help2'); ?></li>
            <li><?php echo \think\Lang::get('message_help3'); ?></li>
        </ul>
    </div>


    <table class="ds-default-table">
        <thead>
            <tr class="space">
                <th colspan="15" class="nobg"><?php echo \think\Lang::get('ds_list'); ?></th>
            </tr>
            <tr class="thead">
                <th>&nbsp;</th>
                <th><?php echo \think\Lang::get('mailtemplates_index_desc'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('mt_message_switch'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('mt_short_switch'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('mt_mail_switch'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!(empty($mstpl_list) || (($mstpl_list instanceof \think\Collection || $mstpl_list instanceof \think\Paginator ) && $mstpl_list->isEmpty()))): if(is_array($mstpl_list) || $mstpl_list instanceof \think\Collection || $mstpl_list instanceof \think\Paginator): if( count($mstpl_list)==0 ) : echo "" ;else: foreach($mstpl_list as $key=>$val): ?>
            <tr class="hover">
                <td class="w24">&nbsp;</td>
                <td class="w25pre"><?php echo $val['storemt_name']; ?></td>
                <td class="align-center"><?php if($val['storemt_message_switch']): ?><?php echo \think\Lang::get('ds_open'); else: ?><?php echo \think\Lang::get('ds_close'); endif; ?></td>
                <td class="align-center"><?php if($val['storemt_short_switch']): ?><?php echo \think\Lang::get('ds_open'); else: ?><?php echo \think\Lang::get('ds_close'); endif; ?></td>
                <td class="align-center"><?php if($val['storemt_mail_switch']): ?><?php echo \think\Lang::get('ds_open'); else: ?><?php echo \think\Lang::get('ds_close'); endif; ?></td>
                <td class="w60 align-center"><a href="<?php echo url('Message/seller_tpl_edit',['code'=>$val['storemt_code']]); ?>" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a></td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
        </tbody>

    </table>

</div>