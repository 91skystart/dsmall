<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"/usr/local/var/www/dsmall/public/../application/admin/view/storegrade/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_storegrade'); ?></h3>
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
    <form method="post" name="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('store_grade_name'); ?></dt>
                <dd><input type="text" value="<?php echo (isset($like_storegrade_name) && ($like_storegrade_name !== '')?$like_storegrade_name:''); ?>" name="like_storegrade_name" id="like_storegrade_name" class="txt"></dd>
            </dl>
            <dl>
                <dt></dt>
                <dd></dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <?php if(!(empty($like_storegrade_name) || (($like_storegrade_name instanceof \think\Collection || $like_storegrade_name instanceof \think\Paginator ) && $like_storegrade_name->isEmpty()))): ?>
                <a class="btn btn-small " href="<?php echo url('Storegrade/index'); ?>" title="<?php echo \think\Lang::get('cancel_search'); ?>"><span><?php echo \think\Lang::get('cancel_search'); ?></span></a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <table class="ds-default-table">
        <thead>
            <tr>
                <th><?php echo \think\Lang::get('storegrade_sort'); ?></th>
                <th><?php echo \think\Lang::get('storegrade_name'); ?></th>
                <th><?php echo \think\Lang::get('storegrade_goods_limit'); ?></th>
                <th><?php echo \think\Lang::get('storegrade_album_limit'); ?></th>
                <th><?php echo \think\Lang::get('storegrade_template_number'); ?></th>
                <th><?php echo \think\Lang::get('storegrade_price'); ?></th>
                <th><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!(empty($storegrade_list) || (($storegrade_list instanceof \think\Collection || $storegrade_list instanceof \think\Paginator ) && $storegrade_list->isEmpty()))): if(is_array($storegrade_list) || $storegrade_list instanceof \think\Collection || $storegrade_list instanceof \think\Paginator): if( count($storegrade_list)==0 ) : echo "" ;else: foreach($storegrade_list as $key=>$storegrade): ?>
            <tr id="ds_row_<?php echo $storegrade['storegrade_id']; ?>">
                <td><?php echo $storegrade['storegrade_sort']; ?></td>
                <td><?php echo $storegrade['storegrade_name']; ?></td>
                <td><?php echo $storegrade['storegrade_goods_limit']; ?></td>
                <td><?php echo $storegrade['storegrade_album_limit']; ?></td>
                <td><?php echo $storegrade['storegrade_template_number']; ?></td>
                <td><?php echo $storegrade['storegrade_price']; ?><?php echo \think\Lang::get('currency_zh'); ?>/<?php echo \think\Lang::get('ds_year'); ?></td>
                <td>
                    <a href="javascript:dsLayerOpen('<?php echo url('Storegrade/edit',['storegrade_id'=>$storegrade['storegrade_id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>-<?php echo $storegrade['storegrade_name']; ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                    <a href="javascript:dsLayerConfirm('<?php echo url('Storegrade/drop',['storegrade_id'=>$storegrade['storegrade_id']]); ?>','<?php echo \think\Lang::get('storegrade_drop_confrim'); ?>',<?php echo $storegrade['storegrade_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="20"><?php echo \think\Lang::get('no_record'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>