<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"/usr/local/var/www/dsmall/public/../application/admin/view/storejoin/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_storejoin'); ?></h3>
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

    
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom">
            <h4 title="<?php echo \think\Lang::get('ds_explanation_tip'); ?>"><?php echo \think\Lang::get('ds_explanation'); ?></h4>
            <span id="explanationZoom" title="<?php echo \think\Lang::get('ds_explanation_close'); ?>" class="arrow"></span>
        </div>
        <ul>
            <li><?php echo \think\Lang::get('storejoin_index_help1'); ?></li>
            <li><?php echo \think\Lang::get('storejoin_index_help2'); ?></li>
            <li><?php echo \think\Lang::get('storejoin_index_help3'); ?></li>
        </ul>
    </div>
    
    <form method="post" enctype="multipart/form-data" name="form1">
        <table class="ds-default-table">
            <tbody>
            <tr class="space">
                <th colspan="2"><?php echo \think\Lang::get('image_upload'); ?>:</th>
            </tr>
            <?php $__FOR_START_1908300426__=1;$__FOR_END_1908300426__=$size;for($i=$__FOR_START_1908300426__;$i <= $__FOR_END_1908300426__;$i+=1){ ?>
            <tr class="noborder">
                <td colspan="2"><label>IMG<?php echo $i; ?>:</label>
                    <a href="JavaScript:void(0);" onclick="clear_pic(<?php echo $i; ?>)"><span><?php echo \think\Lang::get('image_clear'); ?></span></a></td>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform">
                    <?php if(!(empty($pic[$i]) || (($pic[$i] instanceof \think\Collection || $pic[$i] instanceof \think\Paginator ) && $pic[$i]->isEmpty()))): ?>
                    <span class="type-file-show" id="show<?php echo $i; ?>"><a data-lightbox="lightbox-image" href="<?php echo BASE_SITE_ROOT; ?>/uploads/admin/Storejion/<?php echo $pic[$i]; ?>">
            <img class="show_image"  src="<?php echo ADMIN_SITE_ROOT; ?>/images/preview.png"></a>
            </span>
                    <?php endif; ?>
                    <span class="type-file-box">
                        <input type="text" name="textfield" id="textfield<?php echo $i; ?>" class="type-file-text" />
                        <input type="button" name="button" id="button<?php echo $i; ?>" value="上传" class="type-file-button" />
                        <input name="pic<?php echo $i; ?>" type="file" class="type-file-file" id="pic<?php echo $i; ?>" size="30" hidefocus="true">
                        <input type="hidden" name="show_pic<?php echo $i; ?>" id="show_pic<?php echo $i; ?>" value="<?php if(isset($pic[$i])): ?><?php echo $pic[$i]; endif; ?>" />
                    </span>
                </td>
                <td class="vatop tips"></td>
            </tr>
            <?php } ?>
            <tr class="space">
                <th colspan="2"><label for="show_txt"><?php echo \think\Lang::get('storejoin_show_txt'); ?>:</label></th>
            </tr>
            <tr class="noborder">
                <td class="vatop rowform"><textarea name="show_txt" rows="6" class="tarea" id="show_txt" ><?php echo $show_txt; ?></textarea></td>
                <td class="vatop tips"><span class="vatop rowform"></span></td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="tfoot">
                <td colspan="2" >
                    <input class="btn" type="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/>
                </td>
            </tr>
            </tfoot>
        </table>
    </form>

</div>

<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.lightbox/css/lightbox.min.css">
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.lightbox/js/lightbox.min.js"></script>

<script type="text/javascript">
    $(function(){
        $('input[class="type-file-file"]').change(function(){
            var pic=$(this).val();
            var extStart=pic.lastIndexOf(".");
            var ext=pic.substring(extStart,pic.lengtd).toUpperCase();
            $(this).parent().find(".type-file-text").val(pic);
            if(ext!=".PNG"&&ext!=".GIF"&&ext!=".JPG"&&ext!=".JPEG"){
                layer.alert("<?php echo \think\Lang::get('default_img_wrong'); ?>");
                $(this).attr('value','');
                return false;
            }
        });
    });
    function clear_pic(n){
        $("#show"+n+"").remove();
        $("#textfield"+n+"").val("");
        $("#pic"+n+"").val("");
        $("#show_pic"+n+"").val("");
    }
</script>