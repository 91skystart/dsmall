<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"/usr/local/var/www/dsmall/public/../application/admin/view/groupbuy/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_groupbuy'); ?></h3>
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
                <dt><?php echo \think\Lang::get('group_name'); ?></dt>
                <dd><input type="text" value="<?php echo \think\Request::instance()->get('groupbuy_name'); ?>" name="groupbuy_name" id="groupbuy_name" class="txt" style="width:100px;"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('ds_store_name'); ?></dt>
                <dd><input type="text" value="<?php echo \think\Request::instance()->get('store_name'); ?>" name="store_name" id="store_name" class="txt" style="width:100px;"></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('groupbuy_index_state'); ?></dt>
                <dd><select name="groupbuy_state" class="w90">
                        <?php if(!(empty($groupbuy_state_array) || (($groupbuy_state_array instanceof \think\Collection || $groupbuy_state_array instanceof \think\Paginator ) && $groupbuy_state_array->isEmpty()))): if(is_array($groupbuy_state_array) || $groupbuy_state_array instanceof \think\Collection || $groupbuy_state_array instanceof \think\Paginator): if( count($groupbuy_state_array)==0 ) : echo "" ;else: foreach($groupbuy_state_array as $key=>$val): ?>
                        <option value="<?php echo $key; ?>" {eq name="key" value="$Request.get.groupbuy_state" }selected{
                        /eq}>
                        <?php echo $val; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn" title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <?php if($filtered): ?>
                <a href="<?php echo url('Groupbuy/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
                <?php endif; ?>
            </div>
        </div>
    </form>
    <!--  说明 -->
    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('groupbuy_index_help1'); ?></li>
        </ul>
    </div>
    
    
    <form id="list_form" method="post">
        <input type="hidden" id="group_id" name="group_id"/>
        <table class="ds-default-table">
            <thead>
            <tr class="thead">
                <th colspan="2"><?php echo \think\Lang::get('groupbuy_index_name'); ?></th>
                <th class="align-center" width="120"><?php echo \think\Lang::get('ds_start_time'); ?></th>
                <th class="align-center" width="120"><?php echo \think\Lang::get('ds_end_time'); ?></th>
                <th class="align-center" width="80"><?php echo \think\Lang::get('groupbuy_index_click'); ?></th>
                <th class="align-center" width="80"><?php echo \think\Lang::get('groupbuy_buy_quantity'); ?></th>
                <th class="align-center" width="80"><?php echo \think\Lang::get('ds_recommend'); ?></th>
                <th class="align-center" width="120"><?php echo \think\Lang::get('groupbuy_index_state'); ?></th>
                <th class="align-center" width="150"><?php echo \think\Lang::get('ds_handle'); ?></th>
            </tr>
            </thead>
            <tbody id="treet1">
            <?php if(!(empty($groupbuy_list) || (($groupbuy_list instanceof \think\Collection || $groupbuy_list instanceof \think\Paginator ) && $groupbuy_list->isEmpty()))): if(is_array($groupbuy_list) || $groupbuy_list instanceof \think\Collection || $groupbuy_list instanceof \think\Paginator): if( count($groupbuy_list)==0 ) : echo "" ;else: foreach($groupbuy_list as $key=>$val): ?>
            <tr class="hover">
                <td class="w60 picture">
                    <div class="size-56x56"><span class="thumb size-56x56"><i></i>
                        <a target="_blank" href="<?php echo url('home/Showgroupbuy/groupbuy_detail',['group_id'=>$val['groupbuy_id']]); ?>"><img src="<?php echo groupbuy_thumb($val['groupbuy_image']); ?>" style=" max-width: 56px; max-height: 56px;"/></a></span></div>
                </td>
                <td class="group"><p>
                    <a target="_blank" href="<?php echo url('home/Showgroupbuy/groupbuy_detail',['group_id'=>$val['groupbuy_id']]); ?>"> <?php echo $val['groupbuy_name']; ?></a>
                </p>
                    <p class="goods"><?php echo \think\Lang::get('ds_goods_name'); ?>:<a target="_blank" href="<?php echo url('home/Goods/index',['goods_id'=>$val['goods_id']]); ?>" title="<?php echo $val['goods_name']; ?>" target="_blank"><?php echo $val['goods_name']; ?></a></p>
                    <p class="store"><?php echo \think\Lang::get('ds_store_name'); ?>:<a href="<?php echo url('home/Store/index',['store_id'=>$val['store_id']]); ?>" title="<?php echo $val['store_name']; ?>" target="_blank"><?php echo $val['store_name']; ?></a>
                        <?php if(isset($flippedOwnShopIds[$val['store_id']])): ?>
                        <span class="ownshop">[<?php echo \think\Lang::get('ds_ownshop'); ?>]</span>
                        <?php endif; ?>
                    </p>
                </td>
                <td class="align-center nowarp"><?php echo $val['start_time_text']; ?></td>
                <td class="align-center nowarp"><?php echo $val['end_time_text']; ?></td>
                <td class="align-center"><?php echo $val['groupbuy_views']; ?></td>
                <td class="align-center"><?php echo $val['groupbuy_buy_quantity']; ?></td>
                <td class="yes-onoff align-center">
                    <?php if($val['groupbuy_recommended'] == '0'): ?>
                    <a href="JavaScript:void(0);" class=" disabled" ajax_branch='recommended' ds_type="inline_edit" fieldname="recommended" fieldid="<?php echo $val['groupbuy_id']; ?>" fieldvalue="0" title="<?php echo \think\Lang::get('ds_editable'); ?>">
                        <img src="<?php echo ADMIN_SITE_ROOT; ?>/images/treetable/transparent.gif">
                    </a>
                    <?php else: ?>
                    <a href="JavaScript:void(0);" class=" enabled" ajax_branch='recommended' ds_type="inline_edit" fieldname="recommended" fieldid="<?php echo $val['groupbuy_id']; ?>" fieldvalue="1" title="<?php echo \think\Lang::get('ds_editable'); ?>">
                        <img src="<?php echo ADMIN_SITE_ROOT; ?>/images/treetable/transparent.gif">
                    </a>
                    <?php endif; ?>
                <td class="align-center"><?php echo $val['groupbuy_state_text']; ?></td>
                <td class="align-center" id="ds_row_<?php echo $val['groupbuy_id']; ?>">
                    <?php if($val['reviewable']): ?>
                    <a dstype="btn_review_pass" data-groupbuy-id="<?php echo $val['groupbuy_id']; ?>" href="javascript:;" class="dsui-btn-add"><i class="iconfont"></i><?php echo \think\Lang::get('ds_pass'); ?></a>
                    <a dstype="btn_review_fail" data-groupbuy-id="<?php echo $val['groupbuy_id']; ?>" href="javascript:;" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_refuse'); ?></a>
                    <?php endif; if($val['cancelable']): ?>
                    <a dstype="btn_cancel" data-groupbuy-id="<?php echo $val['groupbuy_id']; ?>" href="javascript:;" class="dsui-btn-edit"><i class="iconfont"></i><?php echo \think\Lang::get('ds_cancel'); ?></a>
                    <?php endif; ?>
                    <a href="javascript:dsLayerConfirm('<?php echo url('Groupbuy/groupbuy_del',['groupbuy_id'=>$val['groupbuy_id']]); ?>','<?php echo \think\Lang::get('ensure_del'); ?>',<?php echo $val['groupbuy_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="16"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
            </tbody>
        </table>
        <?php if(!(empty($groupbuy_list) || (($groupbuy_list instanceof \think\Collection || $groupbuy_list instanceof \think\Paginator ) && $groupbuy_list->isEmpty()))): ?>
        <?php echo $show_page; endif; ?>
    </form>

</div>
<form id="op_form" action="" method="POST">
    <input type="hidden" id="groupbuy_id" name="groupbuy_id">
</form>
<script type="text/javascript" src="<?php echo ADMIN_SITE_ROOT; ?>/js/jquery.edit.js" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[dstype="btn_review_pass"]').on('click', function () {
            var action = "<?php echo url('Groupbuy/groupbuy_review_pass'); ?>";
            var groupbuy_id = $(this).attr('data-groupbuy-id');
            layer.confirm('<?php echo \think\Lang::get('ensure_verify_success'); ?>', {
                btn: ['<?php echo \think\Lang::get('ds_ok'); ?>', '<?php echo \think\Lang::get('ds_cancel'); ?>'],
                title: false,
            }, function () {
                $('#op_form').attr('action', action);
                $('#groupbuy_id').val(groupbuy_id);
                $('#op_form').submit();
            });
        });

        $('[dstype="btn_review_fail"]').on('click', function () {
            var action = "<?php echo url('Groupbuy/groupbuy_review_fail'); ?>";
            var groupbuy_id = $(this).attr('data-groupbuy-id');
            layer.confirm('<?php echo \think\Lang::get('ensure_verify_fail'); ?>', {
                btn: ['<?php echo \think\Lang::get('ds_ok'); ?>', '<?php echo \think\Lang::get('ds_cancel'); ?>'],
                title: false,
            }, function () {
                $('#op_form').attr('action', action);
                $('#groupbuy_id').val(groupbuy_id);
                $('#op_form').submit();
            });
        });

        $('[dstype="btn_cancel"]').on('click', function () {
            var action = "<?php echo url('Groupbuy/groupbuy_cancel'); ?>";
            var groupbuy_id = $(this).attr('data-groupbuy-id');
            layer.confirm('<?php echo \think\Lang::get('ensure_close'); ?>', {
                btn: ['<?php echo \think\Lang::get('ds_ok'); ?>', '<?php echo \think\Lang::get('ds_cancel'); ?>'],
                title: false,
            }, function () {
                $('#op_form').attr('action', action);
                $('#groupbuy_id').val(groupbuy_id);
                $('#op_form').submit();
            });
        });
    });
</script>