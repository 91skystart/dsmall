<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:104:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellergoodsadd/edit_jingle.html";i:1574757822;}*/ ?>
<div class="eject_con">
    <div id="warning" class="alert alert-error"></div>
    <form method="post" action="<?php echo url('Sellergoodsonline/edit_jingle'); ?>" id="jingle_form">
        <input type="hidden" name="commonid" value="<?php echo \think\Request::instance()->param('commonid'); ?>" />
        <dl>
            <dt><?php echo \think\Lang::get('commercial_slogan'); ?>：</dt>
            <dd>
                <input type="text" class="text w300" name="g_jingle" id="g_jingle" value="" />
                <p class="hint"><?php echo \think\Lang::get('all_advertisements_will_blank'); ?></p>
            </dd>
        </dl>
        <div class="bottom">
            <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#jingle_form').validate({
            errorLabelContainer: $('#warning'),
            invalidHandler: function(form, validator) {
                $('#warning').show();
            },
            submitHandler:function(form){
                ds_ajaxpost('jingle_form');
            },
            rules : {
                g_jingle : {
                    maxlength: 50
                }
            },
            messages : {
                g_jingle : {
                    maxlength: '<i class="iconfont">&#xe64c;</i><?php echo \think\Lang::get('cannot_exceed_qualifier'); ?>'
                }
            }
        });
    });
</script>
