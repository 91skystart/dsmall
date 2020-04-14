<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:84:"/usr/local/var/www/dsmall/public/../application/admin/view/ownshop/ownshop_edit.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('ownshop_edit_help1'); ?></li>
            <li><?php echo \think\Lang::get('ownshop_edit_help2'); ?></li>
            <li><?php echo \think\Lang::get('ownshop_edit_help3'); ?></li>
            <li><?php echo \think\Lang::get('ownshop_edit_help4'); ?></li>
        </ul>
    </div>
    <form id="store_form" method="post">
        <input type="hidden" name="store_id" value="<?php echo $store_array['store_id']; ?>" />
        <table class="ds-default-table">
            <tbody>
                <tr class="noborder">
                    <td class="required w120"><label class="validation" for="store_name"><?php echo \think\Lang::get('ds_store_name'); ?>:</label></td>
                    <td class="vatop rowform"><input type="text" value="<?php echo $store_array['store_name']; ?>" id="store_name" name="store_name" class="txt" /></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder">
                    <td class="required"><label for="store_name"><?php echo \think\Lang::get('store_addtime'); ?>:</label></td>
                    <td class="vatop rowform"><?php if(!(empty($store_array['store_addtime']) || (($store_array['store_addtime'] instanceof \think\Collection || $store_array['store_addtime'] instanceof \think\Paginator ) && $store_array['store_addtime']->isEmpty()))): ?><?php echo date('Y-m-d',$store_array['store_addtime']); endif; ?></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder">
                    <td class="required"><label><?php echo \think\Lang::get('ds_member_name'); ?>:</label></td>
                    <td class="vatop rowform"><?php echo $store_array['member_name']; ?></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder">
                    <td class="required"><label class="validation" for="seller_name"><?php echo \think\Lang::get('ds_seller_name'); ?>:</label></td>
                    <td class="vatop rowform"><?php echo $store_array['seller_name']; ?></td>
                    <td class="vatop tips"><?php echo \think\Lang::get('seller_name_tips'); ?></td>
                </tr>
            </tbody>
            <tbody>
                <tr class="noborder">
                    <td class="required"><label><label for="bind_all_gc"><?php echo \think\Lang::get('bind_all_gc'); ?>:</label></label></td>
                    <td class="vatop rowform onoff">
                        <label for="bind_all_gc1" class="cb-enable <?php if($store_array['bind_all_gc'] == '1'): ?>selected<?php endif; ?>" ><span><?php echo \think\Lang::get('ds_yes'); ?></span></label>
                        <label for="bind_all_gc0" class="cb-disable <?php if($store_array['bind_all_gc'] == '0'): ?>selected<?php endif; ?>" ><span><?php echo \think\Lang::get('ds_no'); ?></span></label>
                        <input id="bind_all_gc1" name="bind_all_gc" <?php if($store_array['bind_all_gc'] == '1'): ?>checked="checked"<?php endif; ?> value="1" type="radio">
                        <input id="bind_all_gc0" name="bind_all_gc" <?php if($store_array['bind_all_gc'] == '0'): ?>checked="checked"<?php endif; ?> value="0" type="radio">
                    </td>
                    <td class="vatop tips"></td>
                </tr>
            </tbody>
            <tbody>
                <tr class="noborder">
                    <td class="required"><label><label for="state"><?php echo \think\Lang::get('store_state'); ?>:</label></label></td>
                    <td class="vatop rowform onoff"><label for="store_state1" class="cb-enable <?php if($store_array['store_state'] == '1'): ?>selected<?php endif; ?>" ><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                        <label for="store_state0" class="cb-disable <?php if($store_array['store_state'] == '0'): ?>selected<?php endif; ?>" ><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                        <input id="store_state1" name="store_state" <?php if($store_array['store_state'] == '1'): ?>checked="checked"<?php endif; ?> onclick="$('#tr_store_close_info').hide();" value="1" type="radio">
                        <input id="store_state0" name="store_state" <?php if($store_array['store_state'] == '0'): ?>checked="checked"<?php endif; ?> onclick="$('#tr_store_close_info').show();" value="0" type="radio">
                    </td>
                    <td class="vatop tips"></td>
                </tr>
            </tbody>
            <tbody id="tr_store_close_info">
                <tr >
                    
                </tr>
                <tr class="noborder">
                    <td class="required"><label for="store_close_info"><?php echo \think\Lang::get('store_close_info'); ?>:</label></td>
                    <td class="vatop rowform"><textarea name="store_close_info" rows="6" class="tarea" id="store_close_info"><?php echo $store_array['store_close_info']; ?></textarea></td>
                    <td class="vatop tips"></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="tfoot">
                    <td colspan="15"><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<script type="text/javascript">
    $(function () {

        $('input[name=store_state][value=<?php echo $store_array['store_state']; ?>]').trigger('click');
        $('#store_form').validate({
            errorPlacement: function (error, element) {
                error.appendTo(element.parentsUntil('tr').parent().find('td:last'));
            },
            rules: {
                store_name: {
                    required: true,
                    remote: "<?php echo url('Ownshop/ckeck_store_name',['store_id'=>$store_array['store_id']]); ?>"
                }
            },
            messages: {
                store_name: {
                    required: '<?php echo \think\Lang::get('store_name_required'); ?>',
                    remote: '<?php echo \think\Lang::get('store_name_remote'); ?>'
                }
            }
        });
    });
</script>
