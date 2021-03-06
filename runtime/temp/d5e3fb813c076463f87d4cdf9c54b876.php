<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:88:"/usr/local/var/www/dsmall/public/../application/admin/view/storemoney/withdraw_list.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_store_money'); ?></h3>
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

    

    <form method="get" id="formSearch">
        <div class="ds-search-form">
            
            <dl>
                <dt><?php echo \think\Lang::get('admin_storemoney_recordstate'); ?></dt>
                <dd>
                    <select id="paystate_search" name="paystate_search">
                        <option value=""><?php echo \think\Lang::get('ds_please_choose'); ?></option>
                        <option value="2" <?php if(\think\Request::instance()->param('paystate_search') == '2'): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('admin_storemoney_wait'); ?></option>
                        <option value="3" <?php if(\think\Request::instance()->param('paystate_search') == '3'): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('admin_storemoney_agree'); ?></option>
                        <option value="4" <?php if(\think\Request::instance()->param('paystate_search') == '4'): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('admin_storemoney_reject'); ?></option>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.getElementById('formSearch').submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <?php if($filtered): ?>
                <a href="<?php echo url('Storemoney/withdraw_list'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <?php endif; ?>
            </div>
        </div>

    </form>


    <table class="ds-default-table">
        <thead>
        <tr class="thead">
            <th>&nbsp;</th>
            <th><?php echo \think\Lang::get('admin_storemoney_membername'); ?></th>
            <th class="align-center"><?php echo \think\Lang::get('admin_storemoney_apptime'); ?></th>
            <th class="align-center"><?php echo \think\Lang::get('admin_storemoney_cash_price'); ?>(<?php echo \think\Lang::get('currency_zh'); ?>)</th>
            <th class="align-center"><?php echo \think\Lang::get('admin_storemoney_cash_shoukuanaccount'); ?></th>
            <th class="align-center"><?php echo \think\Lang::get('admin_storemoney_recordstate'); ?></th>
            <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php if(!(empty($withdraw_list) || (($withdraw_list instanceof \think\Collection || $withdraw_list instanceof \think\Paginator ) && $withdraw_list->isEmpty()))): if(is_array($withdraw_list) || $withdraw_list instanceof \think\Collection || $withdraw_list instanceof \think\Paginator): if( count($withdraw_list)==0 ) : echo "" ;else: foreach($withdraw_list as $k=>$v): ?>
        <tr class="hover">
            <td class="w12">&nbsp;</td>
            <td><?php echo $v['store_name']; ?></td>
            <td class="nowrap align-center"><?php if(!(empty($v['storemoneylog_add_time']) || (($v['storemoneylog_add_time'] instanceof \think\Collection || $v['storemoneylog_add_time'] instanceof \think\Paginator ) && $v['storemoneylog_add_time']->isEmpty()))): ?><?php echo date('Y-m-d H:i:s',$v['storemoneylog_add_time']); endif; ?></td>
            <td class="align-center"><?php echo $v['store_freeze_money']; ?></td>
            <td class="align-center"><?php echo $v['storemoneylog_desc']; ?></td>
            <td class="align-center"><?php if($v['storemoneylog_state']==2): ?><?php echo \think\Lang::get('admin_storemoney_wait'); elseif($v['storemoneylog_state']==3): ?><?php echo \think\Lang::get('admin_storemoney_agree'); elseif($v['storemoneylog_state']==4): ?><?php echo \think\Lang::get('admin_storemoney_reject'); endif; ?></td>
            <td class="w90 align-center">
                <?php if($v['storemoneylog_state']==2): ?>
                <a href="javascript:dsLayerOpen('<?php echo url('Storemoney/withdraw_view',['id'=>$v['storemoneylog_id']]); ?>','<?php echo \think\Lang::get('ds_verify'); ?>')" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_verify'); ?></a>
                <?php endif; ?>
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
    $(function(){
        $('#stime').datepicker({dateFormat: 'yy-mm-dd'});
        $('#etime').datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>

