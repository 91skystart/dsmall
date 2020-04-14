<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:82:"/usr/local/var/www/dsmall/public/../application/admin/view/store/store_joinin.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_store_manage'); ?></h3>
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
                <dt><?php echo \think\Lang::get('ds_store_name'); ?></dt>
                <dd><input type="text" value="" name="store_name" id="store_name" class="txt"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('store_user'); ?></dt>
                <dd><input type="text" value="" name="owner_and_name" id="owner_and_name" class="txt"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('belongs_level'); ?></dt>
                <dd>
                    <select name="grade_id">
                        <option value=""><?php echo \think\Lang::get('ds_please_choose'); ?>...</option>
                        <?php if(!(empty($grade_list) || (($grade_list instanceof \think\Collection || $grade_list instanceof \think\Paginator ) && $grade_list->isEmpty()))): if(is_array($grade_list) || $grade_list instanceof \think\Collection || $grade_list instanceof \think\Paginator): if( count($grade_list)==0 ) : echo "" ;else: foreach($grade_list as $k=>$v): ?>
                        <option value="<?php echo $v['storegrade_id']; ?>" <?php if(\think\Request::instance()->param('grade_id') == $v['storegrade_id']): ?>selected<?php endif; ?>><?php echo $v['storegrade_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                </dd>
                <dd>
                    <select name="joinin_state">
                        <option value=""><?php echo \think\Lang::get('ds_please_choose'); ?>...</option>
                        <?php if(!(empty($joinin_state_array) || (($joinin_state_array instanceof \think\Collection || $joinin_state_array instanceof \think\Paginator ) && $joinin_state_array->isEmpty()))): if(is_array($joinin_state_array) || $joinin_state_array instanceof \think\Collection || $joinin_state_array instanceof \think\Paginator): if( count($joinin_state_array)==0 ) : echo "" ;else: foreach($joinin_state_array as $k=>$v): ?>
                        <option value="<?php echo $k; ?>" <?php if(\think\Request::instance()->param('joinin_state') == $k): ?>selected<?php endif; ?>><?php echo $v; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <input type="submit" class="btn" value="<?php echo \think\Lang::get('ds_search'); ?>">
                <?php if($filtered): ?>
                <a href="<?php echo url('Store/store_joinin'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
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
            <li><?php echo \think\Lang::get('store_joinin_help1'); ?></li>
        </ul>
    </div>
    
    <form method="post" id="store_form" name="store_form">
        <table class="ds-default-table">
            <thead>
                <tr class="thead">
                    <th class="w200"><?php echo \think\Lang::get('ds_store_name'); ?></th>
                    <th class="w200"><?php echo \think\Lang::get('store_user_name'); ?></th>
                    <th class="w200"><?php echo \think\Lang::get('location'); ?></th>
                    <th class="w200"><?php echo \think\Lang::get('belongs_level'); ?></th>
                    <th class="w200"><?php echo \think\Lang::get('state'); ?></th>
                    <th class=""><?php echo \think\Lang::get('ds_handle'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if(!(empty($store_list) || (($store_list instanceof \think\Collection || $store_list instanceof \think\Paginator ) && $store_list->isEmpty()))): if(is_array($store_list) || $store_list instanceof \think\Collection || $store_list instanceof \think\Paginator): if( count($store_list)==0 ) : echo "" ;else: foreach($store_list as $k=>$v): ?>
                <tr class="hover edit">
                    <td><?php echo $v['store_name']; ?></td>
                    <td><?php echo $v['member_name']; ?></td>
                    <td><?php echo $v['company_address']; ?></td>
                    <td><?php echo $v['storegrade_name']; ?></td>
                    <td><?php echo $joinin_state_array[$v['joinin_state']]; ?></td>
                    <td>
                        <?php if(in_array(intval($v['joinin_state']), array(STORE_JOIN_STATE_NEW, STORE_JOIN_STATE_PAY))) { ?>
                        <a href="javascript:dsLayerOpen('<?php echo url('Store/store_joinin_detail',['member_id'=>$v['member_id']]); ?>','<?php echo \think\Lang::get('ds_verify'); ?>-<?php echo $v['store_name']; ?>')" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_verify'); ?></a>
                        <?php } else { ?>
                        <a href="javascript:dsLayerOpen('<?php echo url('Store/store_joinin_detail',['member_id'=>$v['member_id']]); ?>','<?php echo \think\Lang::get('ds_view'); ?>-<?php echo $v['store_name']; ?>')" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_view'); ?></a>
                        <?php } if(intval($v['joinin_state'])<40): ?>
                        &nbsp;&nbsp; <a href="javascript:dsLayerConfirm('<?php echo url('Store/del_join',['member_id'=>$v['member_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>')" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
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
    </form>
</div>
