<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"/usr/local/var/www/dsmall/public/../application/admin/view/promotionbooth/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_promotion_booth'); ?></h3>
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
                <dt><?php echo \think\Lang::get('ds_goodsclass'); ?></dt>
                <dd id="searchgc_td"></dd>
                <input type="hidden" id="choose_gcid" name="choose_gcid" value="0"/>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <a href="<?php echo url('Promotionbooth/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
            </div>
        </div>
    </form>
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('booth_index_help1'); ?></li>
        </ul>
    </div>
    
    <form method='post' id="form_goods" action="<?php echo url('Promotionbooth/del_goods'); ?>">
        <table class="ds-default-table">
            <thead>
            <tr class="thead">
                <th class="w24"></th>
                <th colspan="2"><?php echo \think\Lang::get('ds_goods_name'); ?></th>
                <th class="align-center w72"><?php echo \think\Lang::get('ds_goodsclass'); ?></th>
                <th class="align-center w72"><?php echo \think\Lang::get('ds_goods_price'); ?></th>
                <th class="w150 align-center"><?php echo \think\Lang::get('ds_handle'); ?> </th>
            </tr>
            </thead>
            <tbody>
            <?php if(!(empty($goods_list) || (($goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator ) && $goods_list->isEmpty()))): if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$v): ?>
            <tr class="hover edit" id="ds_row_<?php echo $v['goods_id']; ?>">
                <td><input type="checkbox" name="goods_id[]" value="<?php echo $v['goods_id']; ?>" class="checkitem"></td>
                <td class="w60 picture"><div class="size-56x56"><span class="thumb size-56x56"><i></i><img src="<?php echo goods_thumb($v,240); ?>" onload="javascript:ResizeImage(this,56,56);"/></span></div></td>
                <td class="goods-name w270"><p><span><?php echo $v['goods_name']; ?></span></p>
                    <p class="store"><?php echo \think\Lang::get('ds_store_name'); ?>：<?php echo $v['store_name']; if(isset($flippedOwnShopIds[$v['store_id']])): ?>
                        <span class="ownshop">[<?php echo \think\Lang::get('ds_ownshop'); ?>]</span>
                       <?php endif; ?>
                    </p>
                </td>
                <td class="align-center"><?php echo (isset($gc_list[$v['gc_id']]['gc_name']) && ($gc_list[$v['gc_id']]['gc_name'] !== '')?$gc_list[$v['gc_id']]['gc_name']:''); ?></td>
                <td class="align-center"><?php echo \think\Lang::get('currency'); ?><?php echo $v['goods_price']; ?></td>
                <td class="align-center">
                    <a href="<?php echo url('home/Goods/index',['goods_id'=>$v['goods_id']]); ?>" target="_blank" class="dsui-btn-view"><i class="iconfont"></i><?php echo \think\Lang::get('ds_view'); ?></a>
                    <a href="javascript:dsLayerConfirm('<?php echo url('Promotionbooth/del_goods',['goods_id'=>$v['goods_id']]); ?>','<?php echo \think\Lang::get('ds_ensure_del'); ?>',<?php echo $v['goods_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="15"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?php echo $show_page; ?>
    </form>
</div>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/mlselection.js"></script>
<script type="text/javascript">
    $(function(){
        init_gcselect(<?php echo $gc_choose_json; ?>,<?php echo $gc_json; ?>);
    });

</script>
