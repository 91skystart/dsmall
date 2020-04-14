<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"/usr/local/var/www/dsmall/public/../application/admin/view/navigation/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_navigation'); ?></h3>
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
    <form method="get" name="formSearch" id="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('nav_title'); ?></dt>
                <dd><input type="text" value="<?php echo \think\Request::instance()->param('nav_title'); ?>" name="nav_title" class="txt"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('nav_location'); ?></dt>
                <dd>
                    <select name="nav_location">
                        <option value=""><?php echo \think\Lang::get('ds_please_choose'); ?>...</option>
                        <option value="header" <?php if(\think\Request::instance()->param('nav_location') == 'header'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('nav_top'); ?></option>
                        <option value="middle" <?php if(\think\Request::instance()->param('nav_location') == 'middle'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('nav_midd'); ?></option>
                        <option value="footer" <?php if(\think\Request::instance()->param('nav_location') == 'footer'): ?>selected<?php endif; ?>><?php echo \think\Lang::get('nav_foo'); ?></option>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <input type="submit" class="btn" value="<?php echo \think\Lang::get('ds_search'); ?>">
                <a href="<?php echo url('Navigation/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
            </div>
        </div>
    </form>
    
    <table class="ds-default-table">
        <thead>
            <tr>
                <th class="w24"></th>
                <th><?php echo \think\Lang::get('nav_sort'); ?></th>
                <th><?php echo \think\Lang::get('nav_title'); ?></th>
                <th><?php echo \think\Lang::get('nav_url'); ?></th>
                <th><?php echo \think\Lang::get('nav_location'); ?></th>
                <th><?php echo \think\Lang::get('nav_new_open'); ?></th>
                <th><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): if( count($nav_list)==0 ) : echo "" ;else: foreach($nav_list as $key=>$nav): ?>
            <tr id="ds_row_<?php echo $nav['nav_id']; ?>">
                <td><input type="checkbox" class="checkitem" name="nav_id[]" value="<?php echo $nav['nav_id']; ?>" /></td>
                <td><?php echo $nav['nav_sort']; ?></td>
                <td><?php echo $nav['nav_title']; ?></td>
                <td><?php echo $nav['nav_url']; ?></td>
                <td><?php if($nav['nav_location'] == 'header'): ?><?php echo \think\Lang::get('nav_top'); elseif($nav['nav_location'] == 'middle'): ?><?php echo \think\Lang::get('nav_midd'); else: ?><?php echo \think\Lang::get('nav_foo'); endif; ?></td>
                <td><?php if($nav['nav_new_open'] == '0'): ?><?php echo \think\Lang::get('ds_no'); else: ?><?php echo \think\Lang::get('ds_yes'); endif; ?></td>
                <td>
                    <a href="javascript:dsLayerOpen('<?php echo url('Navigation/edit',['nav_id'=>$nav['nav_id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?><?php echo $nav['nav_title']; ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                    <a href="javascript:dsLayerConfirm('<?php echo url('Navigation/drop',['nav_id'=>$nav['nav_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $nav['nav_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
        <tfoot>
            <?php if(!(empty($nav_list) || (($nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator ) && $nav_list->isEmpty()))): ?>
            <tr class="tfoot">
                <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
                <td colspan="16"><label for="checkallBottom"><?php echo \think\Lang::get('ds_select_all'); ?></label>
                    &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn btn-small" onclick="submit_delete_batch()"><span><?php echo \think\Lang::get('ds_del'); ?></span></a>
                </td>
            </tr>
            <?php endif; ?>
        </tfoot>
    </table>
    <?php echo $show_page; ?>
</div>

<script type="text/javascript">
    
    function submit_delete(ids_str) {
        _uri = ADMINSITEURL + "/Navigation/drop.html?nav_id=" + ids_str;
        dsLayerConfirm(_uri, '<?php echo \think\Lang::get('ds_ensure_del'); ?>');
    }

</script>