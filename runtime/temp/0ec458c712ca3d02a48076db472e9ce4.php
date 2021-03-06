<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"/usr/local/var/www/dsmall/public/../application/admin/view/spec/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_spec'); ?></h3>
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
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('spec_index_tip1'); ?></li>
            <li><?php echo \think\Lang::get('spec_index_tip2'); ?></li>
            <li><?php echo \think\Lang::get('spec_index_tip3'); ?></li>
        </ul>
    </div>
    
    <form method="get" name="formSearch" id="formSearch">
      <div class="ds-search-form">
          <dl>
              <dt><?php echo \think\Lang::get('sp_name'); ?></dt>
              <dd><input type="text" value="<?php echo (\think\Request::instance()->get('sp_name') ?: ''); ?>" name="sp_name" id="sp_name" class="txt"></dd>
          </dl>
          <dl>
              <dt><?php echo \think\Lang::get('gc_name'); ?></dt>
              <dd><input type="text" value="<?php echo (\think\Request::instance()->get('gc_name') ?: ''); ?>" name="gc_name" id="gc_name" class="txt"></dd>
          </dl>
          
            <div class="btn_group">
                <input type="hidden" name="type" value="<?php echo \think\Request::instance()->param('type'); ?>">
                 <a href="javascript:void(0);" id="dssubmit" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>     
                 <a href="<?php echo url('spec/index',['type'=>\think\Request::instance()->param('type')]); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
            </div>
        </div>
  </form>

    <table class="ds-default-table">
        <thead>
            <tr>
                <th><?php echo \think\Lang::get('sp_id'); ?></th>
                <th><?php echo \think\Lang::get('sp_name'); ?></th>
                <th><?php echo \think\Lang::get('gc_name'); ?></th>
                <th><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php if(is_array($spec_list) || $spec_list instanceof \think\Collection || $spec_list instanceof \think\Paginator): if( count($spec_list)==0 ) : echo "" ;else: foreach($spec_list as $key=>$spec): ?>
            <tr id="ds_row_<?php echo $spec['sp_id']; ?>">
                <td><?php echo $spec['sp_id']; ?></td>
                <td><?php echo $spec['sp_name']; ?></td>
                <td><?php echo $spec['gc_name']; ?></td>
                <td>
                    <a href="javascript:dsLayerOpen('<?php echo url('Spec/spec_edit',['sp_id'=>$spec['sp_id']]); ?>','<?php echo \think\Lang::get('ds_edit'); ?>-<?php echo $spec['sp_name']; ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_edit'); ?></a>
                    <?php if($spec['sp_id'] != 1): ?>
                    <a href="javascript:dsLayerConfirm('<?php echo url('Spec/spec_drop',['sp_id'=>$spec['sp_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $spec['sp_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                    <?php endif; ?>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
    <?php echo $show_page; ?>
</div>

<script>
    $('#dssubmit').click(function(){
        $('#formSearch').submit();
    });
</script>
