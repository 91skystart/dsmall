<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:109:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellertaobaoimport/import_image.html";i:1574757822;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
    <head>
        <title>SWFUpload上传</title>
        <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/swfupload/swfupload.js"></script>
        <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/swfupload/swfupload.swfobject.js"></script>
        <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/swfupload/swfupload.queue.js"></script>
        <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/swfupload/fileprogress.js"></script>
        <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/swfupload/handlers.js"></script>
        <script type="text/javascript">
            var swfu;

            SWFUpload.onload = function () {
                var settings = {
                    flash_url: "<?php echo PLUGINS_SITE_ROOT; ?>/swfupload/swfupload.swf",
                    upload_url: "<?php echo url('SellerTaobaoImport/upload'); ?>",
                    post_params: {
                    },
                    file_size_limit: "200 MB", //文件大小限制
                    file_types: "*.tbi;*.jpg;*.png",
                    file_types_description: "All Files", //文件类型
                    file_upload_limit: 1000,
                    file_queue_limit: 0,
                    custom_settings: {
                        progressTarget: "fsUploadProgress",
                        cancelButtonId: "btnCancel"
                    },
                    debug: false,
                    button_image_url: "<?php echo PLUGINS_SITE_ROOT; ?>/swfupload/btn.png",//按钮图片
                    button_placeholder_id: "spanButtonPlaceholder", //按钮id
                    button_text: '浏览', //按钮文字
                    button_text_style: ".theFont { font-size: 16; }", //按钮文字字号
                    button_text_left_padding: 12, //按钮左边距
                    button_text_top_padding: 3, //按钮上边距
                    button_width: "65", //按钮宽
                    button_height: "29", //按钮高
                    swfupload_loaded_handler: swfUploadLoaded,
                    file_queued_handler: fileQueued,
                    file_queue_error_handler: fileQueueError,
                    file_dialog_complete_handler: fileDialogComplete,
                    upload_start_handler: uploadStart,
                    upload_progress_handler: uploadProgress,
                    upload_error_handler: uploadError,
                    upload_success_handler: uploadSuccess,
                    upload_complete_handler: uploadComplete,
                    queue_complete_handler: queueComplete, // Queue plugin event
                    minimum_flash_version: "9.0.28",
                    swfupload_pre_load_handler: swfUploadPreLoad,
                    swfupload_load_failed_handler: swfUploadLoadFailed
                };

                swfu = new SWFUpload(settings);
            }

        </script>
    </head>
    <body>
        <style>
#content{font-size:12px;}
div.fieldset {
	border:  1px solid #afe14c;
	margin: 10px 0;
	padding: 20px 10px;
}
div.fieldset span.legend {
	position: relative;
	background-color: #FFF;
	padding: 3px;
	top: -30px;
	font: 700 14px Arial, Helvetica, sans-serif;
	color: #73b304;
}

div.flash {
	width: 375px;
	margin: 10px 5px;
	border-color: #D9E4FF;

	-moz-border-radius-topleft : 5px;
	-webkit-border-top-left-radius : 5px;
    -moz-border-radius-topright : 5px;
    -webkit-border-top-right-radius : 5px;
    -moz-border-radius-bottomleft : 5px;
    -webkit-border-bottom-left-radius : 5px;
    -moz-border-radius-bottomright : 5px;
    -webkit-border-bottom-right-radius : 5px;

}

.progressWrapper {
	width: 357px;
	overflow: hidden;
}

.progressContainer {
	margin: 5px;
	padding: 4px;
	border: solid 1px #E8E8E8;
	background-color: #F7F7F7;
	overflow: hidden;
}
/* Message */
.message {
	margin: 1em 0;
	padding: 10px 20px;
	border: solid 1px #FFDD99;
	background-color: #FFFFCC;
	overflow: hidden;
}
/* Error */
.red {
	border: solid 1px #B50000;
	background-color: #FFEBEB;
}

/* Current */
.green {
	border: solid 1px #DDF0DD;
	background-color: #EBFFEB;
}

/* Complete */
.blue {
	border: solid 1px #CEE2F2;
	background-color: #F0F5FF;
}

.progressName {
	font-size: 8pt;
	font-weight: 700;
	color: #555;
	width: 323px;
	height: 14px;
	text-align: left;
	white-space: nowrap;
	overflow: hidden;
}

.progressBarInProgress,
.progressBarComplete,
.progressBarError {
	font-size: 0;
	width: 0%;
	height: 2px;
	background-color: blue;
	margin-top: 2px;
}

.progressBarComplete {
	width: 100%;
	background-color: green;
	visibility: hidden;
}

.progressBarError {
	width: 100%;
	background-color: red;
	visibility: hidden;
}

.progressBarStatus {
	margin-top: 2px;
	width: 337px;
	font-size: 7pt;
	font-family: Arial;
	text-align: left;
	white-space: nowrap;
}

a.progressCancel {
	font-size: 0;
	display: block;
	height: 9px;
	width: 9px;
	float: right;
        background:#F30;
        border-radius: 50%;
}



/* -- SWFUpload Object Styles ------------------------------- */
.swfupload {
	vertical-align: top;
}
        </style>
        <div id="content">
            <form id="form1" method="post" enctype="multipart/form-data">
                <p>点击“浏览”按钮，选择您要上传的文档文件后（可多选，数量取决于你的php配置），系统将自动上传并在完成后提示您。</p>
                <div id="divSWFUploadUI">
                    <div class="fieldset  flash" id="fsUploadProgress"><span class="legend">快速上传</span></div>
                    <p id="divStatus">0 个文件已上传</p>
                    <p>
                        <span id="spanButtonPlaceholder"></span>
                        <input id="btnCancel" type="button" value="取消所有上传" disabled="disabled" style="margin-left: 2px; height: 29px; font-size: 8pt;" />
                        <br />
                    </p>
                </div>
                <noscript>
                    <div style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px;">
                        对不起，您的浏览器不支持javascript。
                    </div>
                </noscript>
                <div id="divLoadingContent" class="content" style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">
                    SWFUpload上传组件正在载入，请稍后
                </div>
                <div id="divLongLoading" class="content" style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">
                    SWFUpload上传组件载入超时。  请确保Flash插件安装正确，并且版本支持本上传组件。
                </div>
                <div id="divAlternateContent" class="content" style="background-color: #FFFF66; border-top: solid 4px #FF9966; border-bottom: solid 4px #FF9966; margin: 10px 25px; padding: 10px 15px; display: none;">
                    SWFUpload不能载入.  请安装或升级Flash Player.
                    点击这里 <a href="http://www.adobe.com/shockwave/download/download.cgi?P1_Prod_Version=ShockwaveFlash">Adobe website</a> 获得Flash Player.
                </div>
            </form>
        </div>
    </body>
</html>
