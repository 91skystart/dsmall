<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:80:"/usr/local/var/www/dsmall/public/../application/admin/view/mbfeedback/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('mb_feedback'); ?></h3>
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
    
    <div class="fixed-empty"></div>
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('feedback_index_hlpe1'); ?></li>
        </ul>
    </div>
    
    <form method='post' id="form_link">
        
        <table class="ds-default-table nobdb">
            <thead>
            <tr class="thead">
                <th>&nbsp;</th>
                <th><?php echo \think\Lang::get('feedback_index_content'); ?></th>
                <th><?php echo \think\Lang::get('ds_member_name'); ?></th>
                <th><?php echo \think\Lang::get('feedback_index_time'); ?></th>
                <th><?php echo \think\Lang::get('feedback_index_from'); ?></th>
            </tr>
            </thead>
            <tbody>
            <?php if(!(empty($mbfeedback_list) || (($mbfeedback_list instanceof \think\Collection || $mbfeedback_list instanceof \think\Paginator ) && $mbfeedback_list->isEmpty()))): if(is_array($mbfeedback_list) || $mbfeedback_list instanceof \think\Collection || $mbfeedback_list instanceof \think\Paginator): if( count($mbfeedback_list)==0 ) : echo "" ;else: foreach($mbfeedback_list as $key=>$v): ?>
            <tr class="hover edit">
                <td class="w24"><input type="checkbox" name="del_id[]" value="<?php echo $v['mbfb_id']; ?>" class="checkitem"></td>
                <td width="705px"><?php echo $v['mbfb_content']; ?></td>
                <td><?php echo $v['member_name']; ?></td>
                <td><?php echo date('Y-m-d H:i:s',$v['mbfb_time']); ?></td>
                <td><?php echo $v['mbfb_type']; ?></td>
            </tr>
           <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="10"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
            </tbody>
            <tfoot>
            <?php if(!(empty($mbfeedback_list) || (($mbfeedback_list instanceof \think\Collection || $mbfeedback_list instanceof \think\Paginator ) && $mbfeedback_list->isEmpty()))): ?>
            <tr class="tfoot" id="dataFuncs">
                <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
                <td colspan="16" id="batchAction"><label for="checkallBottom"><?php echo \think\Lang::get('ds_select_all'); ?></label>
                    &nbsp;&nbsp; <a href="JavaScript:void(0);" class="btn btn-small" onclick="submit_delete_batch()"><span><?php echo \think\Lang::get('ds_del'); ?></span></a>
                    </td>
            </tr>
            <?php endif; ?>
            </tfoot>

        </table>
        <?php echo $show_page; ?>
    </form>

</div>

<script type="text/javascript">
    
    function submit_delete(ids_str) {
        _uri = ADMINSITEURL + "/Mbfeedback/del.html?feedback_id=" + ids_str;
        dsLayerConfirm(_uri, '<?php echo \think\Lang::get('ds_ensure_del'); ?>');
    }

</script>