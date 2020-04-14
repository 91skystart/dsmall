<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:84:"/usr/local/var/www/dsmall/public/../application/admin/view/upload/default_thumb.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_upload_set'); ?></h3>
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

    <form method="post" enctype="multipart/form-data" name="form1" action="">
        <div class="ncap-form-default">
            <dl>
                <dt><?php echo \think\Lang::get('default_goods_image'); ?></dt>
                <dd>
                    <span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_SITE_ROOT; ?>/images/preview.png">
                        <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo $list_config['default_goods_image']; ?>?<?php echo TIMESTAMP; ?>"></div>
                    </span>
                    <span class="type-file-box"><input type='text' name='textfield' id='textfield1' class='type-file-text' /><input type='button' name='button' id='button1' value='上传' class='type-file-button' />
                        <input name="default_goods_image" type="file" class="type-file-file" id="default_goods_image" size="30" hidefocus="true" ds_type="change_default_goods_image">
                    </span>
                    <p class="notic"><?php echo \think\Lang::get('suggest_picture_pixel'); ?> 300px X 300px</p>
                </dd>
            </dl>
            
            <dl>
                <dt><?php echo \think\Lang::get('default_store_logo'); ?></dt>
                <dd>
                    <span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_SITE_ROOT; ?>/images/preview.png">
                        <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>//<?php echo $list_config['default_store_logo']; ?>?<?php echo TIMESTAMP; ?>"></div>
                    </span>
                    <span class="type-file-box"><input type='text' name='textfield' id='textfield2' class='type-file-text' /><input type='button' name='button' id='button1' value='上传' class='type-file-button' />
                        <input name="default_store_logo" type="file" class="type-file-file" id="default_store_logo" size="30" hidefocus="true" ds_type="change_default_store_logo">
                    </span>
                    <p class="notic"><?php echo \think\Lang::get('suggest_picture_pixel'); ?> 200px X 200px</p>
                </dd>
            </dl>
            
            <dl>
                <dt><?php echo \think\Lang::get('default_store_avatar'); ?></dt>
                <dd>
                    <span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_SITE_ROOT; ?>/images/preview.png">
                        <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>//<?php echo $list_config['default_store_avatar']; ?>?<?php echo TIMESTAMP; ?>"></div>
                    </span>
                    <span class="type-file-box"><input type='text' name='textfield' id='textfield3' class='type-file-text' /><input type='button' name='button' id='button1' value='上传' class='type-file-button' />
                        <input name="default_store_avatar" type="file" class="type-file-file" id="default_store_avatar" size="30" hidefocus="true" ds_type="change_default_store_avatar">
                    </span>
                    <p class="notic">100px * 100px</p>
                </dd>
            </dl>
            
            <dl>
                <dt><?php echo \think\Lang::get('default_user_portrait'); ?></dt>
                <dd>
                    <span class="type-file-show"><img class="show_image" src="<?php echo ADMIN_SITE_ROOT; ?>/images/preview.png">
                        <div class="type-file-preview"><img src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_COMMON; ?>/<?php echo $list_config['default_user_portrait']; ?>?<?php echo TIMESTAMP; ?>"></div>
                    </span>
                    <span class="type-file-box"><input type='text' name='textfield' id='textfield4' class='type-file-text' /><input type='button' name='button' id='button1' value='上传' class='type-file-button' />
                        <input name="default_user_portrait" type="file" class="type-file-file" id="default_user_portrait" size="30" hidefocus="true" ds_type="change_default_user_portrait">
                    </span>
                    <p class="notic">128px * 128px</p>
                </dd>
            </dl>
            <dl>
                <dt></dt>
                <dd><input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/></dd>
            </dl>
        </div>
        

    </form>




</div>
<script>
    $(function(){
        $("#default_goods_image").change(function () {
            $("#textfield1").val($("#default_goods_image").val());
        });
        $("#default_store_logo").change(function () {
            $("#textfield2").val($("#default_store_logo").val());
        });
        $("#default_store_avatar").change(function () {
            $("#textfield3").val($("#default_store_avatar").val());
        });
        $("#default_user_portrait").change(function () {
            $("#textfield4").val($("#default_user_portrait").val());
        });

       
    })
</script>