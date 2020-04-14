<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:95:"/usr/local/var/www/dsmall/public/../application/admin/view/articleclass/article_class_edit.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <div class="fixed-empty"></div>
    <form id="article_class_form" method="post" name="articleClassForm">
        <table class="ds-default-table">
            <tbody>
                <tr class="noborder">
                    <td colspan="2" class="required">
                        <label class="validation" for="ac_name"><?php echo \think\Lang::get('article_class_index_name'); ?>:</label>
                    </td>
                </tr>
                <tr class="noborder">
                    <td class="vatop rowform">
                        <input type="text" value="<?php echo (isset($class_array['ac_name']) && ($class_array['ac_name'] !== '')?$class_array['ac_name']:''); ?>" name="ac_name" id="ac_name" class="txt">
                    </td>
                    <td class="vatop tips"><?php echo \think\Lang::get('article_class_index_name'); ?></td>
                </tr>
                <?php if(empty($class_array) || (($class_array instanceof \think\Collection || $class_array instanceof \think\Paginator ) && $class_array->isEmpty())): ?>
                <tr>
                    <td colspan="2" class="required">
                        <label for="parent_id"><?php echo \think\Lang::get('article_class_add_sup_class'); ?>:</label>
                    </td>
                </tr>
                <tr class="noborder">
                    <td class="vatop rowform">
                        <select name="ac_parent_id" id="ac_parent_id">
                            <option value="0"><?php echo \think\Lang::get('ds_please_choose'); ?>...</option>
                            <?php if(!(empty($parent_list) || (($parent_list instanceof \think\Collection || $parent_list instanceof \think\Paginator ) && $parent_list->isEmpty()))): if(is_array($parent_list) || $parent_list instanceof \think\Collection || $parent_list instanceof \think\Paginator): if( count($parent_list)==0 ) : echo "" ;else: foreach($parent_list as $key=>$v): ?>
                            <option <?php if($ac_parent_id == $v['ac_id']): ?>selected='selected'<?php endif; ?> value="<?php echo $v['ac_id']; ?>"><?php echo $v['ac_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </select>
                    </td>
                    <td class="vatop tips"><?php echo \think\Lang::get('article_class_add_sup_class_notice'); ?></td>
                </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="2" class="required">
                        <label for="ac_sort"><?php echo \think\Lang::get('ds_sort'); ?>:</label>
                    </td>
                </tr>
                <tr class="noborder">
                    <td class="vatop rowform">
                        <input type="text" value="<?php echo (isset($class_array['ac_sort']) && ($class_array['ac_sort'] !== '')?$class_array['ac_sort']:''); ?>" name="ac_sort" id="ac_sort" class="txt"></td>
                    <td class="vatop tips"><?php echo \think\Lang::get('article_class_add_update_sort'); ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr class="tfoot">
                    <td colspan="15" >
                        <input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</div>
<script>
    $(document).ready(function () {
        $('#article_class_form').validate({
            errorPlacement: function (error, element) {
                error.appendTo(element.parent().parent().prev().find('td:first'));
            },
            rules: {
                ac_name: {
                    required: true,
                    remote: {
                        url: ADMINSITEURL + '/Articleclass/Ajax/branch/check_class_name',
                        type: 'get',
                        data: {
                            ac_name: function () {
                                return $('#ac_name').val();
                            },
                            ac_parent_id: function () {
                                return $('#ac_parent_id').val();
                            },
                            ac_id: "<?php echo (isset($class_array['ac_id']) && ($class_array['ac_id'] !== '')?$class_array['ac_id']:''); ?>"
                        }
                    }
                },
                ac_sort: {
                    number: true,
                    range : [0,255]
                }
            },
            messages: {
                ac_name: {
                    required: "<?php echo \think\Lang::get('article_class_add_name_null'); ?>",
                    remote: "<?php echo \think\Lang::get('article_class_add_name_exists'); ?>"
                },
                ac_sort: {
                    number: "<?php echo \think\Lang::get('article_class_add_sort_int'); ?>",
                    range: '<?php echo \think\Lang::get('ds_range_0_255'); ?>'
                }
            }
        });
    });
</script>