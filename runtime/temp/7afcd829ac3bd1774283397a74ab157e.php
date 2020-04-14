<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"/usr/local/var/www/dsmall/public/../application/admin/view/adv/ap_manage.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('adv_index_manage'); ?></h3>
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
  <form method="get" action="" name="formSearch">
      <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('ap_name'); ?></dt>
                <dd><input class="txt" type="text" name="search_name" id="search_name" value="<?php echo \think\Request::instance()->param('search_name'); ?>" /></dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <?php if($filtered): ?>
                <a href="<?php echo url('Adv/ap_manage'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
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
          <li><?php echo \think\Lang::get('adv_help2'); ?></li>
      </ul>
  </div>
  
  
    <table class="ds-default-table">
      <thead>
        <tr class="thead">
          <th><input type="checkbox" class="checkall"/></th>
          <th><?php echo \think\Lang::get('ap_name'); ?></th>
          <th class="align-center"><?php echo \think\Lang::get('ap_width'); ?></th>
          <th class="align-center"><?php echo \think\Lang::get('ap_height'); ?></th>
          <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
        </tr>
      </thead>
      <tbody>
        <?php if(!(empty($ap_list) || (($ap_list instanceof \think\Collection || $ap_list instanceof \think\Paginator ) && $ap_list->isEmpty()))): if(is_array($ap_list) || $ap_list instanceof \think\Collection || $ap_list instanceof \think\Paginator): if( count($ap_list)==0 ) : echo "" ;else: foreach($ap_list as $k=>$v): ?>
        <tr class="hover" id="ds_row_<?php echo $v['ap_id']; ?>">
          <td class="w24"><input type="checkbox" class="checkitem" name="del_id[]" value="<?php echo $v['ap_id']; ?>" /></td>
          <td class="name"><span class="editable"  ds_type="inline_edit" ajax_branch='ap_branch' fieldname="ap_name" fieldid="<?php echo $v['ap_id']; ?>" required="1"  title="<?php echo \think\Lang::get('ds_editable'); ?>"><?php echo $v['ap_name']; ?></span></td>
          <td class="align-center sort"><span class="editable"  ds_type="inline_edit" ajax_branch='ap_branch' fieldname="ap_width" fieldid="<?php echo $v['ap_id']; ?>" datatype="pint"  title="<?php echo \think\Lang::get('ds_editable'); ?>"><?php echo $v['ap_width']; ?></span></td>
          <td class="align-center sort"><span class="editable"  ds_type="inline_edit" ajax_branch='ap_branch' fieldname="ap_height" fieldid="<?php echo $v['ap_id']; ?>" datatype="pint"  title="<?php echo \think\Lang::get('ds_editable'); ?>"><?php echo $v['ap_height']; ?></span></td>
          <td class="align-center">
              <a href="<?php echo url('Adv/adv',['ap_id'=>$v['ap_id']]); ?>" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_manage'); ?></a>
              <a href="javascript:dsLayerOpen('<?php echo url('Adv/ap_edit',['ap_id'=>$v['ap_id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>-<?php echo $v['ap_name']; ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
              <a href="javascript:dsLayerConfirm('<?php echo url('Adv/ap_del',['ap_id'=>$v['ap_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $v['ap_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
          </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr class="no_data">
          <td colspan="15"><?php echo \think\Lang::get('ds_no_record'); ?></td>
        </tr>
        <?php endif; ?>
      </tbody>
    </table>
    <?php echo $showpage; ?>
</div>
<script type="text/javascript" src="<?php echo ADMIN_SITE_ROOT; ?>/js/jquery.edit.js" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>

