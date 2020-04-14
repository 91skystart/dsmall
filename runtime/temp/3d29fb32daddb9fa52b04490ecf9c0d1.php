<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"/usr/local/var/www/dsmall/public/../application/admin/view/storedeposit/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_store_deposit'); ?></h3>
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
                <dt><?php echo \think\Lang::get('admin_storedeposit_membername'); ?></dt>
                <dd><input type="text" name="mname" class="txt" value='<?php echo \think\Request::instance()->param('mname'); ?>'></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('admin_storedeposit_changetime'); ?></dt>
                <dd><input type="text" id="stime" name="stime" class="txt date" value="<?php echo \think\Request::instance()->param('stime'); ?>" >
                    ~
                    <input type="text" id="etime" name="etime" class="txt date" value="<?php echo \think\Request::instance()->param('etime'); ?>" >
                </dd>
            </dl>
            
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <?php if($filtered): ?>
                <a href="<?php echo url('storedeposit/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <?php endif; ?>
            </div>
            
        </div>

    </form>

    <table class="ds-default-table">
        <thead>
            <tr class="thead">
                <th><?php echo \think\Lang::get('admin_storedeposit_membername'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('admin_storedeposit_changetime'); ?></th>
                <th><?php echo \think\Lang::get('admin_storedeposit_pricetype_available'); ?>(<?php echo \think\Lang::get('currency_zh'); ?>)</th>
                <th><?php echo \think\Lang::get('admin_storedeposit_pricetype_freeze'); ?>(<?php echo \think\Lang::get('currency_zh'); ?>)</th>
                <th><?php echo \think\Lang::get('admin_storedeposit_pricetype_payable'); ?>(<?php echo \think\Lang::get('currency_zh'); ?>)</th>
                <th><?php echo \think\Lang::get('admin_storedeposit_log_desc'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!(empty($list_log) || (($list_log instanceof \think\Collection || $list_log instanceof \think\Paginator ) && $list_log->isEmpty()))): if(is_array($list_log) || $list_log instanceof \think\Collection || $list_log instanceof \think\Paginator): if( count($list_log)==0 ) : echo "" ;else: foreach($list_log as $k=>$v): ?>
            <tr class="hover">
                <td><?php echo $v['store_name']; ?></td>
                <td class="nowarp align-center"><?php if(!(empty($v['storedepositlog_add_time']) || (($v['storedepositlog_add_time'] instanceof \think\Collection || $v['storedepositlog_add_time'] instanceof \think\Paginator ) && $v['storedepositlog_add_time']->isEmpty()))): ?><?php echo date('Y-m-d H:i:s',$v['storedepositlog_add_time']); endif; ?></td>
                <td><?php echo floatval($v['store_avaliable_deposit']) ? (floatval($v['store_avaliable_deposit']) > 0 ? '+' : null ).$v['store_avaliable_deposit'] : null;?></td>
                <td><?php echo floatval($v['store_freeze_deposit']) ? (floatval($v['store_freeze_deposit']) > 0 ? '+' : null ).$v['store_freeze_deposit'] : null;?></td>
                <td><?php echo floatval($v['store_payable_deposit']) ? (floatval($v['store_payable_deposit']) > 0 ? '+' : null ).$v['store_payable_deposit'] : null;?></td>
                <td><?php echo $v['storedepositlog_desc']; ?>
                </td>
            </tr>
           <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="10"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php echo $show_page; ?>

</div>

<script language="javascript">
    $(function() {
        $('#stime').datepicker({dateFormat: 'yy-mm-dd'});
        $('#etime').datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>