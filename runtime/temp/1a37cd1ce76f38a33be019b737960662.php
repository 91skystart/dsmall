<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/usr/local/var/www/dsmall/public/../application/admin/view/link/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_friendlink'); ?></h3>
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
    <form method="get" name="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('link_index_title'); ?></dt>
                <dd><input type="text" value="<?php echo \think\Request::instance()->param('link_title'); ?>" name="link_title" class="txt"></dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn" title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <?php if($filtered): ?>
                <a href="<?php echo url('Link/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </form>

    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('link_index_help1'); ?></li>
        </ul>
    </div>

    <table class="ds-default-table">
        <thead>
            <tr>
                <th><?php echo \think\Lang::get('link_sort'); ?></th>
                <th><?php echo \think\Lang::get('link_title'); ?></th>
                <th><?php echo \think\Lang::get('link_pic'); ?></th>
                <th><?php echo \think\Lang::get('link_url'); ?></th>
                <th><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!(empty($link_list) || (($link_list instanceof \think\Collection || $link_list instanceof \think\Paginator ) && $link_list->isEmpty()))): if(is_array($link_list) || $link_list instanceof \think\Collection || $link_list instanceof \think\Paginator): if( count($link_list)==0 ) : echo "" ;else: foreach($link_list as $key=>$link): ?>
            <tr id="ds_row_<?php echo $link['link_id']; ?>">
                <td class="sort"><span class="editable" ds_type="inline_edit" fieldname="link_sort" ajax_branch='link' fieldid="<?php echo $link['link_id']; ?>" datatype="pint" maxvalue="255" title="<?php echo \think\Lang::get('ds_editable'); ?>"><?php echo $link['link_sort']; ?></span></td>
                <td class="name"><span class="editable" ds_type="inline_edit" fieldname="link_title" ajax_branch='link' fieldid="<?php echo $link['link_id']; ?>" required="1"  title="<?php echo \think\Lang::get('ds_editable'); ?>"><?php echo $link['link_title']; ?></span></td>
                <td><?php if($link['link_pic']): ?><a data-lightbox="lightbox-image" data-title="<?php echo $link['link_title']; ?>" href="<?php echo BASE_SITE_ROOT; ?>/uploads/admin/link/<?php echo $link['link_pic']; ?>"><img src="<?php echo BASE_SITE_ROOT; ?>/uploads/admin/link/<?php echo $link['link_pic']; ?>" onload="javascript:ResizeImage(this,31,31);"></a><?php endif; ?></td>
                <td><?php echo $link['link_url']; ?></td>
                <td>
                    <a href="javascript:dsLayerOpen('<?php echo url('Link/edit',['link_id'=>$link['link_id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>-<?php echo $link['link_title']; ?>')"  class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                    <a href="javascript:dsLayerConfirm('<?php echo url('Link/drop',['link_id'=>$link['link_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $link['link_id']; ?>)"  class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="20"><?php echo \think\Lang::get('no_record'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php echo $show_page; ?>
</div>
<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.lightbox/css/lightbox.min.css">
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.lightbox/js/lightbox.min.js"></script>
<script type="text/javascript" src="<?php echo ADMIN_SITE_ROOT; ?>/js/jquery.edit.js" charset="utf-8"></script>