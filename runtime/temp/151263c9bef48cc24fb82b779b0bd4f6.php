<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:87:"/usr/local/var/www/dsmall/public/../application/admin/view/promotionbundling/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_promotion_bundling'); ?></h3>
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
                <dt><?php echo \think\Lang::get('bundling_name'); ?></dt>
                <dd><input type="text" value="<?php echo \think\Request::instance()->get('bundling_name'); ?>" name="bundling_name" id="bundling_name" class="txt" style="width:100px;"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('ds_store_name'); ?></dt>
                <dd><input type="text" value="<?php echo \think\Request::instance()->get('store_name'); ?>" name="store_name" id="store_name" class="txt" style="width:100px;"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('ds_state'); ?></dt>
                <dd>
                    <select name="state">
                        <option><?php echo \think\Lang::get('bundling_state_all'); ?></option>
                        <option <?php if(\think\Request::instance()->get('state') == '1'): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('bundling_state_1'); ?></option>
                        <option <?php if(\think\Request::instance()->get('state') == '0'): ?>selected="selected"<?php endif; ?>><?php echo \think\Lang::get('bundling_state_0'); ?></option>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <a href="<?php echo url('Promotionbundling/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
            </div>
        </div>
    </form>
    <!-- 帮助 -->
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('bundling_quota_prompts'); ?></li>
        </ul>
    </div>
    
    <!-- 列表 -->
    <form id="list_form" method="post">
        <table class="ds-default-table">
            <thead>
            <tr class="thead">
                <th><?php echo \think\Lang::get('ds_store_name'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('bundling_name'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('bundling_price'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('bundling_goods_count'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('ds_status'); ?></th>
                <th class="align-center"><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
            </thead>
            <tbody id="treet1">
            <?php if(!(empty($pbundling_list) || (($pbundling_list instanceof \think\Collection || $pbundling_list instanceof \think\Paginator ) && $pbundling_list->isEmpty()))): if(is_array($pbundling_list) || $pbundling_list instanceof \think\Collection || $pbundling_list instanceof \think\Paginator): if( count($pbundling_list)==0 ) : echo "" ;else: foreach($pbundling_list as $key=>$val): ?>
            <tr class="hover" id="ds_row_{val.bl_id}">
                <td class="align-left"><a href="<?php echo url('home/Store/index',['store_id'=>$val['store_id']]); ?>" ><span><?php echo $val['store_name']; ?></span></a>
                    <?php if(isset($flippedOwnShopIds[$val['store_id']])): ?>
                    <span class="ownshop">[<?php echo \think\Lang::get('ds_ownshop'); ?>]</span>
                    <?php endif; ?>
                </td>
                <td class="align-center"><?php echo $val['bl_name']; ?></td>
                <td class="align-center"><?php echo $val['bl_discount_price']; ?></td>
                <td class="align-center"><?php echo $val['count']; ?></td>
                <td class="align-center">
                    <?php echo $state_array[$val['bl_state']]; ?>
                </td>
                <td class="nowrap align-center">
                    <a target="block" href="<?php echo url('home/Goods/index',['goods_id'=>$val['goods_id']]); ?>"  class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_view'); ?></a>
                    <a href="javascript:dsLayerConfirm('<?php echo url('Promotionbundling/del_bundling',['bl_id'=>$val['bl_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $val['bl_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="16"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?php echo $show_page; ?>
    </form>

</div>