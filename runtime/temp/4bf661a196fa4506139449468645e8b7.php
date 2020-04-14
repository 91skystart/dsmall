<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:79:"/usr/local/var/www/dsmall/public/../application/admin/view/storegrade/form.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <div class="ds-default-table">
        <form  id="storegrade_form"  method="post">
            <table>
                <tbody>
                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('storegrade_name'); ?></td>
                        <td class="vatop rowform"><input type="text" name="storegrade_name" id="storegrade_name" value="<?php echo (isset($storegrade['storegrade_name']) && ($storegrade['storegrade_name'] !== '')?$storegrade['storegrade_name']:''); ?>" class="w200"/></td>
                        <td></td>
                    </tr>

                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('storegrade_goods_limit'); ?></td>
                        <td class="vatop rowform"><input type="text" name="storegrade_goods_limit" id="storegrade_goods_limit" value="<?php echo (isset($storegrade['storegrade_goods_limit']) && ($storegrade['storegrade_goods_limit'] !== '')?$storegrade['storegrade_goods_limit']:'0'); ?>" class="w200"/></td>
                        <td></td>
                    </tr>

                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('storegrade_album_limit'); ?></td>
                        <td class="vatop rowform"><input type="text" name="storegrade_album_limit" id="storegrade_album_limit" value="<?php echo (isset($storegrade['storegrade_album_limit']) && ($storegrade['storegrade_album_limit'] !== '')?$storegrade['storegrade_album_limit']:'0'); ?>" class="w200"/></td>
                        <td></td>
                    </tr>
                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('storegrade_price'); ?></td>
                        <td class="vatop rowform"><input type="text" name="storegrade_price" id="storegrade_price" value="<?php echo (isset($storegrade['storegrade_price']) && ($storegrade['storegrade_price'] !== '')?$storegrade['storegrade_price']:''); ?>" class="w200"/></td>
                        <td></td>
                    </tr>
                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('storegrade_description'); ?></td>
                        <td class="vatop rowform"><input type="text" name="storegrade_description" id="storegrade_description" value="<?php echo (isset($storegrade['storegrade_description']) && ($storegrade['storegrade_description'] !== '')?$storegrade['storegrade_description']:''); ?>" class="w200"/></td>
                        <td></td>
                    </tr>
                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('storegrade_sort'); ?></td>
                        <td class="vatop rowform"><input type="text" name="storegrade_sort" id="storegrade_sort" value="<?php echo (isset($storegrade['storegrade_sort']) && ($storegrade['storegrade_sort'] !== '')?$storegrade['storegrade_sort']:'255'); ?>" class="w200"/></td>
                        <td></td>
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
</div>


<script type="text/javascript">
    $(function(){
        $('#storegrade_form').validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules: {
                storegrade_name :{
                    required: true
                }, 
                storegrade_sort :{
                    required: true,
                    number :true,
                    range:[1,255]
                },
                storegrade_goods_limit :{
                    digits:true
                },
                storegrade_album_limit :{
                    digits:true
                }
            },
            messages: {
                storegrade_name :{
                   required : '<?php echo \think\Lang::get('ds_required_error'); ?>'
                },    
                storegrade_sort :{
                    required : '<?php echo \think\Lang::get('ds_required_error'); ?>',
                    number :'<?php echo \think\Lang::get('ds_sort_number'); ?>',
                    range: '<?php echo \think\Lang::get('ds_range_0_255'); ?>'
                },
                storegrade_goods_limit :{
                    digits:'<?php echo \think\Lang::get('ds_digits_error'); ?>'
                },
                storegrade_album_limit :{
                    digits:'<?php echo \think\Lang::get('ds_digits_error'); ?>'
                }
            }
        });
        
    });
    
    
</script>