<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/usr/local/var/www/dsmall/public/../application/admin/view/message/smslog.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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

    <form method="get" name="formSearch" id="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('ds_member_name'); ?></dt>
                <dd><input class="txt" name="member_name" value="<?php echo \think\Request::instance()->get('member_name'); ?>" type="text"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('smslog_phone'); ?></dt>
                <dd><input class="txt" name="smslog_phone" value="<?php echo \think\Request::instance()->get('smslog_phone'); ?>" type="text"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('smslog_smstime'); ?></dt>
                <dd>
                    <input class="txt date" type="text" value="<?php echo \think\Request::instance()->get('add_time_from'); ?>" id="add_time_from" name="add_time_from">
                    ~
                    <input class="txt date" type="text" value="<?php echo \think\Request::instance()->get('add_time_to'); ?>" id="add_time_to" name="add_time_to"/>
                </dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <?php if($filtered): ?>
                <a href="<?php echo url('Message/smslog'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </form>


    <table class="ds-default-table">
        <thead>
            <tr class="thead">
                <th class="w24"></th>
                <th class="w96"><?php echo \think\Lang::get('ds_member_name'); ?></th>
                <th class="w120"><?php echo \think\Lang::get('smslog_phone'); ?></th>
                <th class="w96"><?php echo \think\Lang::get('smslog_captcha'); ?></th>
                <th><?php echo \think\Lang::get('smslog_msg'); ?></th>
                <th class="w96"><?php echo \think\Lang::get('smslog_type'); ?></th>
                <th class="w120"><?php echo \think\Lang::get('smslog_smstime'); ?></th>
                <th class="w120"><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!(empty($smslog_list) || (($smslog_list instanceof \think\Collection || $smslog_list instanceof \think\Paginator ) && $smslog_list->isEmpty()))): if(is_array($smslog_list) || $smslog_list instanceof \think\Collection || $smslog_list instanceof \think\Paginator): if( count($smslog_list)==0 ) : echo "" ;else: foreach($smslog_list as $key=>$v): ?>
            <tr class="hover">
                <td class="w48"><input type="checkbox" name="check_smslog_id[]" value="<?php echo $v['smslog_id']; ?>" class="checkitem">
                <td><?php echo $v['member_name']; ?></td>
                <td><?php echo $v['smslog_phone']; ?></td>
                <td><?php echo $v['smslog_captcha']; ?></td>
                <td><?php echo $v['smslog_msg']; ?></td>
                <td><?php echo $v['smslog_type']; ?></td>
                <td><?php echo date("Y-m-d H:i:s",$v['smslog_smstime']); ?></td>
                <td>
                    <a href="javascript:dsLayerConfirm('<?php echo url('message/smslog_del',['smslog_id'=>$v['smslog_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>')" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="10"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
        <tfoot>
        <?php if(!(empty($smslog_list) || (($smslog_list instanceof \think\Collection || $smslog_list instanceof \think\Paginator ) && $smslog_list->isEmpty()))): ?>
        <tr class="tfoot">
            <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
            <td colspan="16"><label for="checkallBottom"><?php echo \think\Lang::get('ds_select_all'); ?></label>
                &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn btn-small" onclick="submit_delete_batch()"><span><?php echo \think\Lang::get('ds_del'); ?></span></a>
            </td>
        </tr>
        <?php endif; ?>
        </tfoot>
        </tbody>
    </table>
    <?php echo $show_page; ?>

</div>

<script type="text/javascript">
    $(function () {
        $('#add_time_from').datepicker({dateFormat: 'yy-mm-dd',onSelect:function(dateText,inst){
            var year2 = dateText.split('-') ;
            $('#add_time_to').datepicker( "option", "minDate", new Date(parseInt(year2[0]),parseInt(year2[1])-1,parseInt(year2[2])+1) );
        }});
        $('#add_time_to').datepicker({dateFormat: 'yy-mm-dd',onSelect:function(dateText,inst){
            var year1 = dateText.split('-') ;
            $('#add_time_from').datepicker( "option", "maxDate", new Date(parseInt(year1[0]),parseInt(year1[1])-1,parseInt(year1[2])-1) );
        }});
    });
</script>
<script type="text/javascript">
    function submit_delete(ids_str){
        _uri = ADMINSITEURL+"/message/smslog_del.html?smslog_id=" + ids_str;
        dsLayerConfirm(_uri,'<?php echo \think\Lang::get('ds_ensure_del'); ?>');
    }
</script>