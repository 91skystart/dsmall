<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"/usr/local/var/www/dsmall/public/../application/admin/view/wechat/menu.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('wechat_menu'); ?></h3>
                <h5></h5>
            </div>
            <?php if($admin_item): ?>
<ul class="tab-base ds-row">
    <?php if(is_array($admin_item) || $admin_item instanceof \think\Collection || $admin_item instanceof \think\Paginator): if( count($admin_item)==0 ) : echo "" ;else: foreach($admin_item as $key=>$item): ?>
    <li><a href="<?php echo $item['url']; ?>" <?php if($item['name'] == $curitem): ?>class="current"<?php endif; ?>><span><?php echo $item['text']; ?></span></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php endif; ?>
            <a href="<?php echo url('Wechat/pub_menu'); ?>"  class="btn btn-small" style="float: right"><?php echo \think\Lang::get('wechat_menu_update'); ?></a>
        </div>
    </div>
     <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('wechat_menu_help1'); ?></li>
            <li><?php echo \think\Lang::get('wechat_menu_help2'); ?></li>
            <li><?php echo \think\Lang::get('wechat_menu_help3'); ?></li>
            <li><?php echo \think\Lang::get('wechat_menu_help4'); ?></li>
            <li><?php echo \think\Lang::get('wechat_menu_help5'); ?></li>
        </ul>
    </div>
            <table class="ds-default-table">
                <thead>
                <tr>
                    <th><?php echo \think\Lang::get('menu_name'); ?></th>
                    <th><?php echo \think\Lang::get('menu_type'); ?></th>
                    <th><?php echo \think\Lang::get('menu_value'); ?></th>
                    <th><?php echo \think\Lang::get('menu_sort'); ?></th>
                    <th><?php echo \think\Lang::get('ds_handle'); ?></th>
                </tr>
                </thead>
                <?php if(!(empty($p_menu) || (($p_menu instanceof \think\Collection || $p_menu instanceof \think\Paginator ) && $p_menu->isEmpty()))): ?>
                <tbody>
                <?php if(is_array($p_menu) || $p_menu instanceof \think\Collection || $p_menu instanceof \think\Paginator): if( count($p_menu)==0 ) : echo "" ;else: foreach($p_menu as $key=>$pmenu): ?>
                <tr>
                    <td><?php echo $pmenu['name']; ?></td>
                    <td><?php echo $menu_type[$pmenu['type']]; ?></td>
                    <td><?php echo $pmenu['value']; ?></td>
                    <td><?php echo $pmenu['sort']; ?></td>
                    <td>
                        <a href="javascript:dsLayerOpen('<?php echo url('Wechat/menu_edit',['id'=>$pmenu['id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>-<?php echo $pmenu['name']; ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                        <a href="javascript:dsLayerConfirm('<?php echo url('Wechat/menu_drop',['id'=>$pmenu['id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>')"  class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                    </td>
                </tr>
                <?php if(is_array($c_menu[$pmenu['id']]) || $c_menu[$pmenu['id']] instanceof \think\Collection || $c_menu[$pmenu['id']] instanceof \think\Paginator): if( count($c_menu[$pmenu['id']])==0 ) : echo "" ;else: foreach($c_menu[$pmenu['id']] as $key=>$cmenu): if($cmenu['pid'] == $pmenu['id']): ?>
                <tr>
                    <td>|___<?php echo $cmenu['name']; ?></td>
                    <td><?php echo $menu_type[$cmenu['type']]; ?></td>
                    <td><?php echo $cmenu['value']; ?></td>
                    <td><?php echo $cmenu['sort']; ?></td>
                    <td>
                        <a href="javascript:dsLayerOpen('<?php echo url('Wechat/menu_edit',['id'=>$cmenu['id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>-<?php echo $cmenu['name']; ?>')"  class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                        <a href="javascript:dsLayerConfirm('<?php echo url('Wechat/menu_drop',['id'=>$cmenu['id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>')"  class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                    </td>
                </tr>
                <?php endif; endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
                <?php else: ?>
                <tbody>
            <tr class="no_data">
                <td colspan="20"><?php echo \think\Lang::get('no_record'); ?></td>
            </tr>
        </tbody>
                <?php endif; ?>
            </table>
        </div>