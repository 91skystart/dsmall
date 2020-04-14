<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:85:"/usr/local/var/www/dsmall/public/../application/admin/view/mallconsult/type_list.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_mall_consult'); ?></h3>
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
            <li><?php echo \think\Lang::get('mallconsult_help1'); ?></li>
            <li><?php echo \think\Lang::get('mallconsult_help2'); ?></li>
        </ul>
    </div>

    <form method="post" name="form1">
        <table class="ds-default-table">
            <?php if(!(empty($type_list) || (($type_list instanceof \think\Collection || $type_list instanceof \think\Paginator ) && $type_list->isEmpty()))): ?>
            <thead>
                <tr class="thead">
                    <th class="w24"></th>
                    <th class="w200 sort"><?php echo \think\Lang::get('ds_sort'); ?></th>
                    <th><?php echo \think\Lang::get('mallconsulttype_name'); ?></th>
                    <th class="w108 align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
                </tr>
            </thead>
            <?php if(is_array($type_list) || $type_list instanceof \think\Collection || $type_list instanceof \think\Paginator): if( count($type_list)==0 ) : echo "" ;else: foreach($type_list as $key=>$value): ?>
            <tbody>
                <tr id="ds_row_<?php echo $value['mallconsulttype_id']; ?>">
                    <td><input type="checkbox" class="checkitem" value="<?php echo $value['mallconsulttype_id']; ?>" name="del_id[]" /></td>
                    <td><?php echo $value['mallconsulttype_sort']; ?></td>
                    <td><?php echo $value['mallconsulttype_name']; ?></td>
                    <td class="align-center">
                        <a href="javascript:dsLayerOpen('<?php echo url('Mallconsult/type_edit',['mallconsulttype_id'=>$value['mallconsulttype_id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                        <a href="javascript:dsLayerConfirm('<?php echo url('Mallconsult/type_del',['mallconsulttype_id'=>$value['mallconsulttype_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $value['mallconsulttype_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tbody>
                <tr class="no_data">
                    <td colspan="20"><?php echo \think\Lang::get('ds_no_record'); ?></td>
                </tr>
            </tbody>
            <?php endif; ?>
            <tfoot>
                <?php if(!(empty($type_list) || (($type_list instanceof \think\Collection || $type_list instanceof \think\Paginator ) && $type_list->isEmpty()))): ?>
                <tr class="tfoot">
                    <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
                    <td colspan="16"><label for="checkallBottom"><?php echo \think\Lang::get('ds_select_all'); ?></label>
                        &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn btn-small" onclick="submit_delete_batch()"><span><?php echo \think\Lang::get('ds_del'); ?></span></a>
                    </td>
                </tr>
                <?php endif; ?>
            </tfoot>
        </table>
    </form>
</div>