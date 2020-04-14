<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"/usr/local/var/www/dsmall/public/../application/admin/view/operation/setting.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_operation'); ?></h3>
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

    <form method="post" name="settingForm" id="settingForm">
        <table class="ds-default-table">
            <tbody>
             <!-- 开启商品发布审核 -->
             <tr class="noborder">
                <td colspan="2" class="required"><label><?php echo \think\Lang::get('is_goods_verify'); ?>:</label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="goods_verify_1" class="cb-enable <?php if($list_setting['goods_verify'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="goods_verify_0" class="cb-disable <?php if($list_setting['goods_verify'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input type="radio" id="goods_verify_1" name="goods_verify" value="1"  <?php if($list_setting['goods_verify']=='1'): ?>checked=checked<?php endif; ?>>
                    <input type="radio" id="goods_verify_0" name="goods_verify" value="0" <?php if($list_setting['goods_verify']=='0'): ?>checked=checked<?php endif; ?>>
                <td class="vatop tips"><?php echo \think\Lang::get('goods_verify_notice'); ?></td>
            </tr>
            <!-- 开启闲置市场 -->
            <tr class="noborder">
                <td colspan="2" class="required"><label><?php echo \think\Lang::get('flea_isuse'); ?>:</label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="flea_isuse_1" class="cb-enable <?php if($list_setting['flea_isuse'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="flea_isuse_0" class="cb-disable <?php if($list_setting['flea_isuse'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input type="radio" id="flea_isuse_1" name="flea_isuse" value="1"  <?php if($list_setting['flea_isuse']=='1'): ?>checked=checked<?php endif; ?>>
                    <input type="radio" id="flea_isuse_0" name="flea_isuse" value="0" <?php if($list_setting['flea_isuse']=='0'): ?>checked=checked<?php endif; ?>>
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('flea_isuse_notice'); ?></td>
            </tr>
            <!-- 促销开启 -->
            <tr class="noborder">
                <td colspan="2" class="required"><label><?php echo \think\Lang::get('promotion_allow'); ?>:</label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="promotion_allow_1" class="cb-enable <?php if($list_setting['promotion_allow'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="promotion_allow_0" class="cb-disable <?php if($list_setting['promotion_allow'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input type="radio" id="promotion_allow_1" name="promotion_allow" value="1" <?php if($list_setting['promotion_allow']== '1'): ?>checked=checked<?php endif; ?>>
                    <input type="radio" id="promotion_allow_0" name="promotion_allow" value="0" <?php if($list_setting['promotion_allow']== '0'): ?>checked=checked<?php endif; ?>>
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('promotion_notice'); ?></td>
            </tr>
            <tr>
                <td colspan="2" class="required"><?php echo \think\Lang::get('groupbuy_allow'); ?>:</td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="groupbuy_allow_1" class="cb-enable <?php if($list_setting['groupbuy_allow'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="groupbuy_allow_0" class="cb-disable <?php if($list_setting['groupbuy_allow'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input id="groupbuy_allow_1" name="groupbuy_allow" <?php if($list_setting['groupbuy_allow']== '1'): ?> checked=checked<?php endif; ?> value="1" type="radio">
                    <input id="groupbuy_allow_0" name="groupbuy_allow" <?php if($list_setting['groupbuy_allow']== '0'): ?> checked=checked<?php endif; ?> value="0" type="radio">
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('groupbuy_isuse_notice'); ?></td>
            </tr>

            <tr class="noborder">
                <td colspan="2" class="required"><label><?php echo \think\Lang::get('points_isuse'); ?>:</label></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="points_isuse_1" class="cb-enable <?php if($list_setting['points_isuse'] == '1'): ?>selected<?php endif; ?>" ><span><?php echo \think\Lang::get('points_isuse_open'); ?></span></label>
                    <label for="points_isuse_0" class="cb-disable <?php if($list_setting['points_isuse'] == '0'): ?>selected<?php endif; ?>" ><span><?php echo \think\Lang::get('points_isuse_close'); ?></span></label>
                    <input type="radio" id="points_isuse_1" name="points_isuse" value="1" <?php if($list_setting['points_isuse']=='1'): ?>checked=checked<?php endif; ?>>
                    <input type="radio" id="points_isuse_0" name="points_isuse" value="0" <?php if($list_setting['points_isuse']=='0'): ?> checked=checked <?php endif; ?>>
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('points_isuse_notice'); ?></td>
            </tr>
            <tr>
                <td colspan="2" class="required"><?php echo \think\Lang::get('open_pointshop_isuse'); ?>:</td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="pointshop_isuse_1" class="cb-enable <?php if($list_setting['pointshop_isuse'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="pointshop_isuse_0" class="cb-disable <?php if($list_setting['pointshop_isuse'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input id="pointshop_isuse_1" name="pointshop_isuse" <?php if($list_setting['pointshop_isuse']== '1'): ?> checked=checked <?php endif; ?> value="1" type="radio">
                    <input id="pointshop_isuse_0" name="pointshop_isuse" <?php if($list_setting['pointshop_isuse']== '0'): ?> checked=checked <?php endif; ?> value="0" type="radio">
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('open_pointshop_isuse_notice'); ?></td>
            </tr>
            <tr>
                <td colspan="2" class="required"><?php echo \think\Lang::get('open_pointprod_isuse'); ?>:</td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="pointprod_isuse_1" class="cb-enable <?php if($list_setting['pointprod_isuse'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="pointprod_isuse_0" class="cb-disable <?php if($list_setting['pointprod_isuse'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input id="pointprod_isuse_1" name="pointprod_isuse" <?php if($list_setting['pointprod_isuse']== '1'): ?> checked=checked <?php endif; ?> value="1" type="radio">
                    <input id="pointprod_isuse_0" name="pointprod_isuse" <?php if($list_setting['pointprod_isuse']== '0'): ?> checked=checked <?php endif; ?>} value="0" type="radio">
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('open_pointprod_isuse_notice'); ?></td>
            </tr>

            <tr>
                <td colspan="2" class="required"><?php echo \think\Lang::get('voucher_allow'); ?>:</td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="voucher_allow_1" class="cb-enable <?php if($list_setting['voucher_allow'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="voucher_allow_0" class="cb-disable <?php if($list_setting['voucher_allow'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input id="voucher_allow_1" name="voucher_allow" <?php if($list_setting['voucher_allow'] == '1'): ?> checked=checked <?php endif; ?> value="1" type="radio">
                    <input id="voucher_allow_0" name="voucher_allow" <?php if($list_setting['voucher_allow'] == '0'): ?> checked=checked <?php endif; ?> value="0" type="radio">
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('voucher_allow_notice'); ?></td>
            </tr>
            
            <tr>
                <td colspan="2" class="required"><?php echo \think\Lang::get('mgdiscount_allow'); ?>:</td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="mgdiscount_allow_1" class="cb-enable <?php if($list_setting['mgdiscount_allow'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="mgdiscount_allow_0" class="cb-disable <?php if($list_setting['mgdiscount_allow'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input id="mgdiscount_allow_1" name="mgdiscount_allow" <?php if($list_setting['mgdiscount_allow'] == '1'): ?> checked=checked <?php endif; ?> value="1" type="radio">
                    <input id="mgdiscount_allow_0" name="mgdiscount_allow" <?php if($list_setting['mgdiscount_allow'] == '0'): ?> checked=checked <?php endif; ?> value="0" type="radio">
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('mgdiscount_allow_notice'); ?></td>
            </tr>
            <tr>
                <td colspan="2" class="required"><?php echo \think\Lang::get('member_auth'); ?>:</td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform onoff">
                    <label for="member_auth_1" class="cb-enable <?php if($list_setting['member_auth'] == '1'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_open'); ?>"><span><?php echo \think\Lang::get('ds_open'); ?></span></label>
                    <label for="member_auth_0" class="cb-disable <?php if($list_setting['member_auth'] == '0'): ?>selected<?php endif; ?>" title="<?php echo \think\Lang::get('ds_close'); ?>"><span><?php echo \think\Lang::get('ds_close'); ?></span></label>
                    <input id="member_auth_1" name="member_auth" <?php if($list_setting['member_auth'] == '1'): ?> checked=checked <?php endif; ?> value="1" type="radio">
                    <input id="member_auth_0" name="member_auth" <?php if($list_setting['member_auth'] == '0'): ?> checked=checked <?php endif; ?> value="0" type="radio">
                </td>
                <td class="vatop tips"><?php echo \think\Lang::get('member_auth_notice'); ?></td>
            </tr>
            
            </tbody>
        </table>

        
        <table class="ds-default-table">
            <tfoot>
            <tr class="tfoot">
                <td colspan="2"><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
            </tr>
            </tfoot>
        </table>
    </form>
</div>

<script>
    $(document).ready(function(){
        $("#settingForm").validate({
            errorPlacement: function(error, element){
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules : {
                points_reg:{
                    number:true,
                    min:0
                },
                points_login :{
                    number:true,
                    min:0
                },
                points_comments :{
                    number:true,
                    min:0
                },
                points_signin :{
                    number:true,
                    min:0
                },
                points_invite :{
                    number:true,
                    min:0
                },
                points_rebate :{
                    number:true,
                    min:0
                },
                points_orderrate :{
                    number:true,
                    min:0
                },
                points_ordermax :{
                    number:true,
                    min:0
                }
            },
            messages : {
                points_reg:{
                    number:'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    min:'<?php echo \think\Lang::get('ds_min_error'); ?>0'
                },
                points_login :{
                    number:'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    min:'<?php echo \think\Lang::get('ds_min_error'); ?>0'
                },
                points_comments :{
                    number:'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    min:'<?php echo \think\Lang::get('ds_min_error'); ?>0'
                },
                points_signin :{
                    number:'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    min:'<?php echo \think\Lang::get('ds_min_error'); ?>0'
                },
                points_invite :{
                    number:'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    min:'<?php echo \think\Lang::get('ds_min_error'); ?>0'
                },
                points_rebate :{
                    number:'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    min:'<?php echo \think\Lang::get('ds_min_error'); ?>0'
                },
                points_orderrate :{
                    number:'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    min:'<?php echo \think\Lang::get('ds_min_error'); ?>0'
                },
                points_ordermax :{
                    number:'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    min:'<?php echo \think\Lang::get('ds_min_error'); ?>0'
                }
            }
        });
    });
</script>