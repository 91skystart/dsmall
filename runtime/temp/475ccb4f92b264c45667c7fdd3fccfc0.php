<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"/usr/local/var/www/dsmall/public/../application/admin/view/storehelp/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_storehelp'); ?></h3>
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

    <form method="get" action="" name="formSearch" id="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('help_title'); ?></dt>
                <dd><input type="text" class="text" name="key" value="<?php echo \think\Request::instance()->get('key'); ?>" /></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('helptype_id'); ?></dt>
                <dd>
                    <select name="helptype_id" id="helptype_id">
                        <option value=""><?php echo \think\Lang::get('ds_please_choose'); ?>...</option>
                        <?php if(!(empty($helptype_list) || (($helptype_list instanceof \think\Collection || $helptype_list instanceof \think\Paginator ) && $helptype_list->isEmpty()))): if(is_array($helptype_list) || $helptype_list instanceof \think\Collection || $helptype_list instanceof \think\Paginator): if( count($helptype_list)==0 ) : echo "" ;else: foreach($helptype_list as $key=>$val): ?>
                        <option <?php if($val['helptype_id']==\think\Request::instance()->get('helptype_id')): ?>selected=selected<?php endif; ?> value="<?php echo $val['helptype_id']; ?>"><?php echo $val['helptype_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <a href="<?php echo url('Storehelp/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
            </div>
        </div>
        

    </form>
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('storehelp_index_help1'); ?></li>
        </ul>
    </div>

    <table class="ds-default-table">
        <thead>
        <tr class="thead">
            <th><?php echo \think\Lang::get('ds_sort'); ?></th>
            <th><?php echo \think\Lang::get('help_title'); ?></th>
            <th><?php echo \think\Lang::get('helptype_id'); ?></th>
            <th class="align-center"><?php echo \think\Lang::get('help_updatetime'); ?></th>
            <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(!(empty($help_list) || (($help_list instanceof \think\Collection || $help_list instanceof \think\Paginator ) && $help_list->isEmpty()))): if(is_array($help_list) || $help_list instanceof \think\Collection || $help_list instanceof \think\Paginator): if( count($help_list)==0 ) : echo "" ;else: foreach($help_list as $key=>$val): ?>
        <tr class="hover" id="ds_row_<?php echo $val['help_id']; ?>">
            <td class="w48 sort"><?php echo $val['help_sort']; ?></td>
            <td><?php echo $val['help_title']; ?></td>
            <td><?php if(!(empty($helptype_list[$val['helptype_id']]) || (($helptype_list[$val['helptype_id']] instanceof \think\Collection || $helptype_list[$val['helptype_id']] instanceof \think\Paginator ) && $helptype_list[$val['helptype_id']]->isEmpty()))): ?><?php echo $helptype_list[$val['helptype_id']]['helptype_name']; endif; ?></td>
            <td class="w150 align-center"><?php echo date("Y-m-d H:i:s",$val['help_updatetime']); ?></td>
            <td class="w150 align-center">
                <a href="<?php echo url('Storehelp/edit_help',['help_id'=>$val['help_id']]); ?>" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                <a href="javascript:dsLayerConfirm('<?php echo url('Storehelp/del_help',['help_id'=>$val['help_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $val['help_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr class="no_data">
            <td colspan="15"><?php echo \think\Lang::get('ds_no_record'); ?></td>
        </tr>
       <?php endif; ?>
        </tbody>
    </table>
    <?php if(!(empty($help_list) || (($help_list instanceof \think\Collection || $help_list instanceof \think\Paginator ) && $help_list->isEmpty()))): ?>
    <?php echo $show_page; endif; ?>
</div>

