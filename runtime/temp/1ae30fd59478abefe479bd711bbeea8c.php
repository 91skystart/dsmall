<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:80:"/usr/local/var/www/dsmall/public/../application/admin/view/wechat/menu_form.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow up"></span>
        </div>
        <ul style="display:none">
            <li><?php echo \think\Lang::get('wechat_menu_form_help1'); ?></li>
            <li><?php echo \think\Lang::get('wechat_menu_form_help2'); ?></li>
            <li><?php echo \think\Lang::get('wechat_menu_form_help3'); ?></li>
            <li><?php echo \think\Lang::get('wechat_menu_form_help4'); ?></li>
        </ul>
    </div>

        <form id="wechat_add_form" method="post">
            <table class="ds-default-table">
                <tbody>
                    <tr class="noborder"> 
                        <td class="required w120"><label class="validation" for="menu_name"><?php echo \think\Lang::get('menu_name'); ?>:</label></td>
                        <td class="vatop rowform"><input id="menu_name" type="text" name="menu_name"  value="<?php echo (isset($menu['name']) && ($menu['name'] !== '')?$menu['name']:''); ?>" class="w300"/></td>
                        <td class="vatop tips"></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('menu_p_name'); ?></td>
                        <td class="vatop rowform">
                            <select name="menu_pid">
                                <option value="0"><?php echo \think\Lang::get('wechat_menu_pid_0'); ?></option>
                                <?php if(is_array($parents) || $parents instanceof \think\Collection || $parents instanceof \think\Paginator): if( count($parents)==0 ) : echo "" ;else: foreach($parents as $key=>$parent): ?>
                                <option value="<?php echo $parent['id']; ?>" <?php if($parent['id'] == $menu['pid']): ?>selected<?php endif; ?>><?php echo $parent['name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('menu_type'); ?></td>
                        <td class="vatop rowform">
                            <input type="radio" name="menu_type" value="view" title="<?php echo \think\Lang::get('menu_type_1'); ?>" <?php if($menu['type'] == 'view'): ?>checked<?php endif; ?>><?php echo \think\Lang::get('menu_type_1'); ?>
                            <input type="radio" name="menu_type" value="click" title="<?php echo \think\Lang::get('menu_type_2'); ?>" <?php if($menu['type'] == 'click'): ?>checked<?php endif; ?>><?php echo \think\Lang::get('menu_type_2'); ?>
                            <!--<input type="radio" name="menu_type" value="3" title="<?php echo \think\Lang::get('menu_type_3'); ?>" <?php if($menu['type'] == '3'): ?>checked<?php endif; ?>><?php echo \think\Lang::get('menu_type_3'); ?>-->
                        </td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><?php echo \think\Lang::get('menu_value'); ?></td>
                        <td class="vatop rowform"><input type="text" name="menu_value" value="<?php echo (isset($menu['value']) && ($menu['value'] !== '')?$menu['value']:''); ?>" style="width: 300px"/></td>
                    </tr>
                    <tr class="noborder"> 
                        <td class="required w120"><label class="validation" for="menu_sort"><?php echo \think\Lang::get('menu_sort'); ?>:</label></td>
                        <td class="vatop rowform"><input id="menu_sort" type="text" name="menu_sort"  value="<?php echo (isset($menu['sort']) && ($menu['sort'] !== '')?$menu['sort']:''); ?>" class="w300"/></td>
                        <td class="vatop tips"></td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr class="tfoot">
                        <td></td>
                        <td class="tfoot"><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></td>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>


<script type="text/javascript">
    $(function() {
        $('#wechat_add_form').validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules: {
                menu_name : {
                    required: true,
                },
                menu_sort : {
                    required: true,
                    digits:true,
                    min: 0,
                    max: 255
                }
            },
            messages: {
                menu_name : {
                    required:  '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('menu_name'); ?>',
                },
                menu_sort : {
                    required:  '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('menu_sort'); ?>',
                    digits:    '<?php echo \think\Lang::get('sort_error'); ?>',
                    min:       '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('wechat_menu_sort_min'); ?>',
                    max:       '<?php echo \think\Lang::get('ds_none_input'); ?><?php echo \think\Lang::get('wechat_menu_sort_max'); ?>'
                }
            }
        });
    });
</script>