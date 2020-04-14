<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"/usr/local/var/www/dsmall/public/../application/admin/view/ownshop/ownshop_list.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_ownshop'); ?></h3>
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
            <li><?php echo \think\Lang::get('ownshop_list_help1'); ?></li>
            <li><?php echo \think\Lang::get('ownshop_list_help2'); ?></li>
            <li><?php echo \think\Lang::get('ownshop_list_help3'); ?></li>
            <li><?php echo \think\Lang::get('ownshop_list_help4'); ?></li>
        </ul>
    </div>
    

    <form method="get" name="formSearch" id="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('ds_store_name'); ?></dt>
                <dd><input type="text" value="<?php echo \think\Request::instance()->param('store_name'); ?>" name="store_name" id="store_name" class="txt" /></dd>
            </dl>
            <div class="btn_group">
                <input type="submit" class="btn" value="<?php echo \think\Lang::get('ds_search'); ?>">
                <a href="<?php echo url('Ownshop/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
            </div>
        </div>
    </form>


    <form method="post" id="store_form">
        <table class="ds-default-table">
            <thead>
                <tr class="thead">
                    <th class="w48"><?php echo \think\Lang::get('ds_sort'); ?></th>
                    <th><?php echo \think\Lang::get('ds_store_name'); ?></th>
                    <th><?php echo \think\Lang::get('ds_member_name'); ?></th>
                    <th><?php echo \think\Lang::get('ds_seller_name'); ?></th>
                    <th class="align-center"><?php echo \think\Lang::get('store_state'); ?></th>
                    <th class="align-center"><?php echo \think\Lang::get('bind_all_gc'); ?></th>
                    <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
                </tr>
            </thead>
            <?php if(!(empty($store_list) || (($store_list instanceof \think\Collection || $store_list instanceof \think\Paginator ) && $store_list->isEmpty()))): ?>
            <tbody>
                <?php if(is_array($store_list) || $store_list instanceof \think\Collection || $store_list instanceof \think\Paginator): if( count($store_list)==0 ) : echo "" ;else: foreach($store_list as $k=>$v): ?>
                <tr class="" id="ds_row_<?php echo $v['store_id']; ?>">
                    <td class="sort"><span class="editable"  ds_type="inline_edit" fieldname="store_sort" ajax_branch='store_sort' fieldid="<?php echo $v['store_id']; ?>" datatype="pint" maxvalue="255" title="<?php echo \think\Lang::get('ds_editable'); ?>"><?php echo $v['store_sort']; ?></span></td>
                    <td>
                        <a target="_blank" href="<?php echo url('/Home/store/index',['store_id'=>$v['store_id']]); ?>" ><?php echo $v['store_name']; ?></a>
                    </td>
                    <td><?php echo $v['member_name']; ?></td>
                    <td><?php echo $v['seller_name']; ?></td>
                    <td class="align-center w72">
                        <?php if($v['store_state']): ?><?php echo \think\Lang::get('ds_open'); else: ?><?php echo \think\Lang::get('ds_close'); endif; ?>
                    </td>
                    <td class="align-center w120"><?php if($v['bind_all_gc']): ?><?php echo \think\Lang::get('ds_yes'); else: ?><?php echo \think\Lang::get('ds_no'); endif; ?></td>
                    <td class="align-center w200">
                        <a href="javascript:dsLayerOpen('<?php echo url('Ownshop/edit',['id'=>$v['store_id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>-<?php echo $v['member_name']; ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                        <?php if(empty($v['bind_all_gc']) || (($v['bind_all_gc'] instanceof \think\Collection || $v['bind_all_gc'] instanceof \think\Paginator ) && $v['bind_all_gc']->isEmpty())): ?>
                        <a href="<?php echo url('Ownshop/bind_class',['id'=>$v['store_id']]); ?>" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('bind_class'); ?></a>
                        <?php endif; ?>
                        <!--<a href="javascript:dsLayerConfirm('<?php echo url('Ownshop/del',['id'=>$v['store_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $v['store_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>-->
                    </td>
                </tr>
               <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
            <?php else: ?>
            <tbody>
                <tr class="no_data">
                    <td colspan="15"><?php echo \think\Lang::get('ds_no_record'); ?></td>
                </tr>
            </tbody>
            <?php endif; ?>
        </table>
        <?php echo $show_page; ?>
    </form>
</div>
<script type="text/javascript" src="<?php echo ADMIN_SITE_ROOT; ?>/js/jquery.edit.js" charset="utf-8"></script>
