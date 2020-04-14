<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"/usr/local/var/www/dsmall/public/../application/admin/view/article/form.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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






<style>
    .type-file-preview{z-index: 99999}
</style>

<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3><?php echo \think\Lang::get('ds_article'); ?></h3>
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
    
    <form id="article_form" method="post" enctype="multipart/form-data">
        <table class="ds-default-table">
            <tbody>
                <tr class="noborder"> 
                    <td class="required w120"><?php echo \think\Lang::get('article_title'); ?></td>
                    <td class="vatop rowform"><input type="text" name="article_title" id="article_title" value="<?php echo $article['article_title']; ?>" class="w200"/></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder"> 
                    <td class="required"><?php echo \think\Lang::get('article_cate'); ?></td>
                    <td class="vatop rowform">
                        <select name="ac_id">
                            <option value=""><?php echo \think\Lang::get('ds_please_choose'); ?></option>
                            <?php if(is_array($ac_list) || $ac_list instanceof \think\Collection || $ac_list instanceof \think\Paginator): if( count($ac_list)==0 ) : echo "" ;else: foreach($ac_list as $key=>$cate): ?>
                            <option value="<?php echo $cate['ac_id']; ?>" <?php if($cate['ac_id'] === $article['ac_id']): ?>selected<?php endif; ?>><?php if($cate['ac_parent_id'] > 0): ?>&nbsp&nbsp<?php endif; ?><?php echo $cate['ac_name']; ?></option>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder"> 
                    <td class="required"><?php echo \think\Lang::get('article_url'); ?></td>
                    <td class="vatop rowform"><input type="text" name="article_url" id="article_url" value="<?php echo $article['article_url']; ?>" class="w200"/></td>
                    <td class="vatop tips"></td>
                </tr>
                
                <tr class="noborder">
                    <td class="required"><?php echo \think\Lang::get('article_pic'); ?>: </td>
                    <td class="vatop rowform">
                        <?php if(!(empty($article['article_pic']) || (($article['article_pic'] instanceof \think\Collection || $article['article_pic'] instanceof \think\Paginator ) && $article['article_pic']->isEmpty()))): ?>
                        <span class="type-file-show"> <img class="show_image" src="<?php echo ADMIN_SITE_ROOT; ?>/images/preview.png">
                            <div class="type-file-preview" style="display: none;"><img id="view_img" src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_ARTICLE; ?>/<?php echo $article['article_pic']; ?>"></div>
                        </span>
                        <?php endif; ?>
                        <span class="type-file-box">
                            <input type='text' name='article_pic' id='article_pic' class='type-file-text' />
                            <input type='button' name='button' id='button' value='上传' class='type-file-button' />
                            <input name="_pic" type="file" class="type-file-file" id="_pic" size="30" hidefocus="true" />
                        </span>
                    </td>
                    <td class="vatop tips"><?php echo \think\Lang::get('article_add_img_wrong'); ?></td>
                </tr>
                
                <tr class="noborder"> 
                    <td class="required"><?php echo \think\Lang::get('article_show'); ?></td>
                    <td class="vatop rowform onoff">
                        <label for="article_show1" class="cb-enable <?php if($article['article_show'] == '1'): ?>selected<?php endif; ?>" ><span><?php echo \think\Lang::get('ds_yes'); ?></span></label>
                        <label for="article_show2" class="cb-disable <?php if($article['article_show'] == '0'): ?>selected<?php endif; ?>" ><span><?php echo \think\Lang::get('ds_no'); ?></span></label>
                        <input id="article_show1" name="article_show" <?php if($article['article_show'] == '1'): ?>checked="checked"<?php endif; ?>  value="1" type="radio">
                        <input id="article_show2" name="article_show" <?php if($article['article_show'] == '0'): ?>checked="checked"<?php endif; ?> value="0" type="radio">
                    </td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder"> 
                    <td class="required"><?php echo \think\Lang::get('article_sort'); ?></td>
                    <td class="vatop rowform"><input type="text" name="article_sort" id="article_sort" value="<?php echo $article['article_sort']; ?>" class="w200"/></td>
                    <td class="vatop tips"></td>
                </tr>
                <tr class="noborder"> 
                    <td class="required"><?php echo \think\Lang::get('article_content'); ?></td>
                    <?php echo build_editor(['name'=>'article_content','content'=>htmlspecialchars_decode($article['article_content'])]); ?>
                    <td class="vatop rowform" colspan="2"><textarea name="article_content" id="article_content" style="width:100%;"></textarea></td>
                </tr>	
                <tr>
                <td class="required"><?php echo \think\Lang::get('article_index_pic_upload'); ?>:</td>
                <td id="divComUploadContainer"><input type="file" multiple="multiple" id="fileupload" name="fileupload" /></td>
                <td class="vatop tips"></td>
            </tr>
            <tr>
                <td class="required"><?php echo \think\Lang::get('article_index_uploaded_pic'); ?>:</td>
                <td><div class="tdare">
                    <table width="600px" cellspacing="0" class="dataTable">
                        <tbody id="thumbnails">
                        <?php if(!(empty($file_upload) || (($file_upload instanceof \think\Collection || $file_upload instanceof \think\Paginator ) && $file_upload->isEmpty()))): if(is_array($file_upload) || $file_upload instanceof \think\Collection || $file_upload instanceof \think\Paginator): if( count($file_upload)==0 ) : echo "" ;else: foreach($file_upload as $key=>$v): ?>
                        <tr id="<?php echo $v['upload_id']; ?>" class="tatr2">
                            <input type="hidden" name="file_id[]" value="<?php echo $v['upload_id']; ?>" />
                            <td><img width="40px" height="40px" src="<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_ARTICLE; ?>/<?php echo $v['file_name']; ?>" /></td>
                            <td><?php echo $v['file_name']; ?></td>
                            <td><a href="javascript:insert_editor('<?php echo UPLOAD_SITE_URL; ?>/<?php echo ATTACH_ARTICLE; ?>/<?php echo $v['file_name']; ?>');"><?php echo \think\Lang::get('article_index_insert'); ?></a> | <a href="javascript:del_file_upload('<?php echo $v['upload_id']; ?>');"><?php echo \think\Lang::get('ds_del'); ?></a></td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div></td>
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
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-file-upload/jquery.fileupload.js"></script>
<script type="text/javascript">
    $(function() {
        $("#_pic").change(function () {
            $("#article_pic").val($(this).val());
        });
        $('#article_form').validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parent().parent().find('td:last'));
            },
            rules: {
                article_title : {
                    required: true
                },
                article_url :{
                    url : true
                },
                article_sort :{
                    number:true,
                    range:[0,255]
                }
            },
            messages: {
                article_title : {
                    required   : '<?php echo \think\Lang::get('article_title_error'); ?>'
                },
                article_url :{
                    url : '<?php echo \think\Lang::get('ds_url_error'); ?>'
                },
                article_sort:{
                    number: '<?php echo \think\Lang::get('article_sort_error'); ?>',
                    range:'<?php echo \think\Lang::get('class_sort_explain'); ?>'
                }
            }
        });
        // 图片上传
        $('#fileupload').each(function(){
            $(this).fileupload({
                dataType: 'json',
                url: "<?php echo url('Article/article_pic_upload',['item_id'=>$article['article_id']]); ?>",
                done: function (e,data) {
                    if(data != 'error'){
                        add_uploadedfile(data.result);
                    }
                }
            });
        });
    });
    function add_uploadedfile(file_data)
    {
        var newImg = '<tr id="' + file_data.file_id + '" class="tatr2"><input type="hidden" name="file_id[]" value="' + file_data.file_id + '" /><td><img width="40px" height="40px" src="' + file_data.file_path + '" /></td><td>' + file_data.file_name + '</td><td><a href="javascript:insert_editor(\'' + file_data.file_path + '\');"><?php echo \think\Lang::get('article_index_insert'); ?></a> | <a href="javascript:del_file_upload(' + file_data.file_id + ');"><?php echo \think\Lang::get('ds_del'); ?></a></td></tr>';
        $('#thumbnails').prepend(newImg);
    }
    function insert_editor(file_path){
        ue.execCommand('insertimage', {src:file_path});
    }
    function del_file_upload(file_id)
    {
        layer.confirm('<?php echo \think\Lang::get('ds_ensure_del'); ?>', {
            btn: ['<?php echo \think\Lang::get('ds_ok'); ?>', '<?php echo \think\Lang::get('ds_cancel'); ?>'],
            title: false,
        }, function () {
            $.getJSON("<?php echo url('Article/ajax'); ?>",{branch:'del_file_upload',file_id: + file_id}, function(result){
                if(result){
                    $('#' + file_id).remove();
                    layer.msg('<?php echo \think\Lang::get('ds_common_del_succ'); ?>');
                }else{
                    layer.alert('<?php echo \think\Lang::get('article_index_del_fail'); ?>');
                }
            });
        });
    }
</script>