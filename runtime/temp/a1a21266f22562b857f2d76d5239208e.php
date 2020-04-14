<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:78:"/usr/local/var/www/dsmall/public/../application/admin/view/spec/spec_form.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;}*/ ?>
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
    <form class="" id="user_form" method="post">
        <div class="ds-default-table">
            <table>
                <tbody>
                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('gc_select'); ?></td>
                        <td class="vatop rowform">
                            <div id="gcategory" class="default_select">
                                <input type="hidden" name="gc_id" value="<?php echo $spec['gc_id']; ?>" class="mls_id" />
                                <input type="hidden" name="gc_name" value="<?php echo (isset($spec['gc_name']) && ($spec['gc_name'] !== '')?$spec['gc_name']:''); ?>" class="mls_name" />
                                <?php if($spec['gc_id']): ?>
                                <span><?php echo (isset($spec['gc_name']) && ($spec['gc_name'] !== '')?$spec['gc_name']:''); ?></span>
                                <input type="button" value="<?php echo \think\Lang::get('ds_edit'); ?>" class="edit_gcategory" />
                                <?php endif; ?>
                                <select <?php if($spec['gc_id']): ?>style="display:none"<?php endif; ?>>
                                    <option value=""><?php echo \think\Lang::get('gc_id_required'); ?></option>
                                    <option value="0"><?php echo \think\Lang::get('gc_all'); ?></option>
                                    <?php if(is_array($gc_list) || $gc_list instanceof \think\Collection || $gc_list instanceof \think\Paginator): if( count($gc_list)==0 ) : echo "" ;else: foreach($gc_list as $key=>$gc): ?>
                                    <option value="<?php echo $gc['gc_id']; ?>"><?php echo $gc['gc_name']; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </div>
                        </td>
                        <td><?php echo \think\Lang::get('gc_name_tips'); ?></td>
                    </tr>
                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('sp_name'); ?></td>
                        <td class="vatop rowform">
                            <input type="text" name="sp_name" id="sp_name" value="<?php echo (isset($spec['sp_name']) && ($spec['sp_name'] !== '')?$spec['sp_name']:''); ?>" class="w200"/>
                        </td>
                    </tr>
                    <tr class="noborder">
                        <td class="required w120"><?php echo \think\Lang::get('sp_sort'); ?></td>
                        <td class="vatop rowform">
                            <input type="text" name="sp_sort" id="sp_sort" value="<?php echo (isset($spec['sp_sort']) && ($spec['sp_sort'] !== '')?$spec['sp_sort']:'255'); ?>" class="w200"/>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
                <tfoot>
                <tr class="tfoot">
                    <td></td>
                    <td>
                        <input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
    </form>
</div>
<!--载入-->
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/mlselection.js"></script>

<script>
    $(function() {
        gcategoryInit("gcategory");
    });
</script>
<script type="text/javascript">
    $(function(){
        $('#user_form').validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules: {
                sp_name :{
                    required: true,
                },
                sp_sort :{
                    required: true,
                    digits:true,
                    max: 255,
                    min:0,
                }
                
                 
            },
            messages: {
                sp_name :{
                   required: '<?php echo \think\Lang::get('gc_id_required'); ?>',
                },
                sp_sort :{
                    required: '<?php echo \think\Lang::get('sp_sort_required'); ?>',
                    digits: '<?php echo \think\Lang::get('sp_sort_digits'); ?>',
                    max: '<?php echo \think\Lang::get('sp_sort_max'); ?>'
                }
            }
        });
        
    });
    
    
</script>