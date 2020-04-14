<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/usr/local/var/www/dsmall/public/../application/admin/view/wechat/member.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('wechat_bind_list'); ?></h3>
            </div>
        </div>
    </div>
    <table class="ds-default-table">
        <thead>
            <tr class="thead">
                <th class="align-center"> <?php echo \think\Lang::get('wechat_openid'); ?></th>
                <th class="align-center"> <?php echo \think\Lang::get('wechat_unionid'); ?></th>
                <th class="align-center"> <?php echo \think\Lang::get('wechat_member_name'); ?></th>
                <th class="align-center"> <?php echo \think\Lang::get('wechat_bind_time'); ?></th>
                <th class="align-center"> <?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(!(empty($wxmember_list) || (($wxmember_list instanceof \think\Collection || $wxmember_list instanceof \think\Paginator ) && $wxmember_list->isEmpty()))): if(is_array($wxmember_list) || $wxmember_list instanceof \think\Collection || $wxmember_list instanceof \think\Paginator): if( count($wxmember_list)==0 ) : echo "" ;else: foreach($wxmember_list as $key=>$val): ?>
            <tr class="member">
                <td class="align-center"><?php echo $val['member_wxopenid']; ?></td>
                <td class="align-center"><?php echo $val['member_wxunionid']; ?></td>
                <td class="align-center"><?php echo $val['member_name']; ?></td>
                <td class="align-center"><?php echo date('Y_m_d H:i:s',$val['member_addtime']); ?></td>
                <td class="align-center">
                    <a href="javascript:dsLayerOpen('<?php echo url('Member/edit',['member_id'=>$val['member_id']]); ?>','<?php echo $val['member_name']; ?>-<?php echo \think\Lang::get('ds_edit'); ?>')" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                    <a href="javascript:dsLayerOpen('<?php echo url('Wechat/msend',['member_id'=>$val['member_id'],'openid'=>$val['member_wxopenid']]); ?>','<?php echo \think\Lang::get('wechat_message_send'); ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('wechat_message_send'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="11"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <?php echo $show_page; ?>
</div>
