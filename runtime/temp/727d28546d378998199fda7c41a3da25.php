<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:75:"/usr/local/var/www/dsmall/public/../application/admin/view/wechat/list.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('wechat_message_send'); ?></h3>
            </div>
            <a href="javascript:dsLayerOpen('<?php echo url('Wechat/Sendgroup'); ?>','<?php echo \think\Lang::get('ds_add'); ?><?php echo \think\Lang::get('keywords'); ?>')"  class="btn btn-small" style="float: right"><?php echo \think\Lang::get('sendgroup'); ?></a>
        </div>
    </div>
    <table class="ds-default-table">
        <thead>
            <tr>
                <th class="w24"></th>
                <th style="width: 10%"><?php echo \think\Lang::get('tomember'); ?></th>
                <th style="width: 10%"><?php echo \think\Lang::get('totype'); ?></th>
                <th style="width: 40%"><?php echo \think\Lang::get('content'); ?></th>
                <th style="width: 20%"><?php echo \think\Lang::get('totime'); ?></th>
                <th style="width: 10%"><?php echo \think\Lang::get('state'); ?></th>
                <th style="width: 10%"><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <?php if(!(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty()))): ?>
        <tbody>
            <?php if(is_array($lists) || $lists instanceof \think\Collection || $lists instanceof \think\Paginator): if( count($lists)==0 ) : echo "" ;else: foreach($lists as $key=>$list): ?>
            <tr>
                <td><input type="checkbox" class="checkitem" name="id[]" value="<?php echo $list['id']; ?>" /></td>
                <td><?php echo $list['member_name']; ?></td>
                <td><?php echo $list['type']; ?></td>
                <td><?php echo $list['content']; ?></td>
                <td><?php echo date('Y-m-d H:i:s',$list['createtime']); ?></td>
                <td><?php if($list['issend']): ?><?php echo \think\Lang::get('issend_1'); else: ?><span style="color: red"><?php echo \think\Lang::get('issend_0'); ?></span><?php endif; ?></td>
                <td>
                    <a href="javascript:dsLayerOpen('<?php echo url('Wechat/text_form',['id'=>$list['id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>-<?php echo $list['member_name']; ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                    <a href="javascript:submit_delete(<?php echo $list['id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
        
        <tfoot>
            <?php if(!(empty($lists) || (($lists instanceof \think\Collection || $lists instanceof \think\Paginator ) && $lists->isEmpty()))): ?>
            <tr class="tfoot">
                <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
                <td colspan="16"><label for="checkallBottom"><?php echo \think\Lang::get('ds_select_all'); ?></label>
                    &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn btn-small" onclick="submit_delete_batch()"><span><?php echo \think\Lang::get('ds_del'); ?></span></a>
                </td>
            </tr>
            <?php endif; ?>
        </tfoot>
        <?php else: ?>
        <tbody>
            <tr class="no_data">
                <td colspan="20"><?php echo \think\Lang::get('no_record'); ?></td>
            </tr>
        </tbody>
        <?php endif; ?>
    </table>
    <?php echo $show_page; ?>
</div>

<div class="ncap-form-default show_new" id="dialog" style="display: none">
    <form method="post">
        <dl>
            <dt><?php echo \think\Lang::get('wechat_title'); ?></dt>
            <dd>
                <input type="text" name="title" id="Title" style="width: 300px" value="">
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('wechat_digest'); ?></dt>
            <dd>
                <input type="text" name="description" id="Description" style="width: 300px">
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('wechat_file'); ?></dt>
            <dd>
                <input type="file" name="s_pic">
            </dd>
        </dl>
        <dl>
            <dt><?php echo \think\Lang::get('wechat_content_source_url'); ?></dt>
            <dd>
                <input type="text" name="url" id="Url" style="width: 300px">
            </dd>
        </dl>
    </form>
</div>

<script>
    $('.news').click(function() {
        $( "#dialog" ).dialog("open");
        });
    $( "#dialog" ).dialog({
        autoOpen: false,
        modal: true,
        width: 500,
        height: 400,
        show: {
            effect: "explode",
            duration: 1000
        },
        hide: {
            effect: "puff",
            duration: 1000
        }
    });

    var content= $.attr('content');

</script>

<script type="text/javascript">
    function submit_delete(ids_str) {
        _uri = ADMINSITEURL + "/Wechat/del_wxmsg.html?id=" + ids_str;
        dsLayerConfirm(_uri, '<?php echo \think\Lang::get('ds_ensure_del'); ?>');
    }
</script>