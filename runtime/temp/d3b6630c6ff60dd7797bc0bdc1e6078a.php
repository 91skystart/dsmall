<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:81:"/usr/local/var/www/dsmall/public/../application/admin/view/mallconsult/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_mall_consult'); ?></h3>
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

    <form method="get" name="formSearch">
        <div class="ds-search-form">
            <dl>
                <dt><?php echo \think\Lang::get('ds_member_name'); ?></dt>
                <dd><input class="txt" type="text" name="member_name" id="member_name" value="<?php echo \think\Request::instance()->get('member_name'); ?>" /></dd>
            </dl>
            <dl>
                <dt><?php echo \think\Lang::get('mallconsulttype_id'); ?></dt>
                <dd>
                    <select name="mctid">
                        <option value="0"><?php echo \think\Lang::get('ds_all'); ?></option>
                        <?php if(!(empty($type_list) || (($type_list instanceof \think\Collection || $type_list instanceof \think\Paginator ) && $type_list->isEmpty()))): if(is_array($type_list) || $type_list instanceof \think\Collection || $type_list instanceof \think\Paginator): if( count($type_list)==0 ) : echo "" ;else: foreach($type_list as $key=>$val): ?>
                        <option <?php if(isset($mctid)): if($mctid == $val['mallconsulttype_id']): ?>selected="selected"<?php endif; endif; ?>value="<?php echo $val['mallconsulttype_id']; ?>"><?php echo $val['mallconsulttype_name']; ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </select>
                </dd>
            </dl>
            <div class="btn_group">
                <a href="javascript:document.formSearch.submit();" class="btn " title="<?php echo \think\Lang::get('ds_query'); ?>"><?php echo \think\Lang::get('ds_query'); ?></a>
                <a href="<?php echo url('Mallconsult/index'); ?>" class="btn btn-default" title="<?php echo \think\Lang::get('ds_cancel'); ?>"><?php echo \think\Lang::get('ds_cancel'); ?></a>
            </div>
        </div>
    </form>
    
    
        <table class="ds-default-table">
            <thead>
            <tr class="thead">
                <th class="w24"></th>
                <th class="align-center"><?php echo \think\Lang::get('mallconsult_content'); ?></th>
                <th class="w96 align-center"><?php echo \think\Lang::get('ds_member_name'); ?></th>
                <th class="w156 align-center"><?php echo \think\Lang::get('mallconsult_addtime'); ?></th>
                <th class="w96 align-center"><?php echo \think\Lang::get('mallconsult_isreply'); ?></th>
                <th class="w120 align-center"><?php echo \think\Lang::get('ds_handle'); ?> </th>
            </tr>
            </thead>
            <tbody>
            <?php if(!(empty($consult_list) || (($consult_list instanceof \think\Collection || $consult_list instanceof \think\Paginator ) && $consult_list->isEmpty()))): if(is_array($consult_list) || $consult_list instanceof \think\Collection || $consult_list instanceof \think\Paginator): if( count($consult_list)==0 ) : echo "" ;else: foreach($consult_list as $key=>$val): ?>
            <tr class="space">
                <td class="w24"><input type="checkbox" class="checkitem" name="id[]" value="<?php echo $val['mallconsult_id']; ?>" /></td>
                <td><?php echo $val['mallconsult_content']; ?></td>
                <td class="align-center"><?php echo $val['member_name']; ?></td>
                <td class="align-center"><?php echo date("Y-m-d H:i:s",$val['mallconsult_addtime']); ?></td>
                <td class="align-center"><?php echo $state[$val['mallconsult_isreply']]; ?></td>
                <td>
                    <a href="javascript:dsLayerOpen('<?php echo url('Mallconsult/consult_reply',['id'=>$val['mallconsult_id']]); ?>','<?php echo \think\Lang::get('ds_handle'); ?>')" class="dsui-btn-edit"><i class="iconfont"></i><?php if($val['mallconsult_isreply'] == 0): ?><?php echo \think\Lang::get('ds_reply'); else: ?><?php echo \think\Lang::get('ds_edit'); endif; ?></a>
                    <a href="javascript:void(0)" onclick="submit_delete(<?php echo $val['mallconsult_id']; ?>)" class="dsui-btn-del"><i class="iconfont"></i><?php echo \think\Lang::get('ds_del'); ?></a>
                </td>
            </tr>
           <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <tr class="no_data">
                <td colspan="20"><?php echo \think\Lang::get('ds_no_record'); ?></td>
            </tr>
            <?php endif; ?>
            </tbody>
            <tfoot>
            <?php if(!(empty($consult_list) || (($consult_list instanceof \think\Collection || $consult_list instanceof \think\Paginator ) && $consult_list->isEmpty()))): ?>
            <tr class="tfoot">
                <td><input type="checkbox" class="checkall" id="checkallBottom"></td>
                <td colspan="16"><label for="checkallBottom"><?php echo \think\Lang::get('ds_select_all'); ?></label>
                    &nbsp;&nbsp;<a href="JavaScript:void(0);" class="btn btn-small" onclick="submit_delete_batch()"><span><?php echo \think\Lang::get('ds_del'); ?></span></a>
                    </td>
            </tr>
            <?php endif; ?>
            </tfoot>
        </table>
        <?php echo $show_page; ?>
</div>

<script type="text/javascript">
    function checkForm(){
        flag = false;
        $.each($("input[name='consult_id[]']"),function(i,n){
            if($(n).prop('checked')){
                flag = true;
                return false;
            }
        });
        if(!flag)layer.alert('<?php echo \think\Lang::get('consulting_del_choose'); ?>');
        return flag;
    }
    function submit_delete(ids_str){
        _uri = ADMINSITEURL+"/Mallconsult/del_consult.html?mallconsult_id=" + ids_str;
        dsLayerConfirm(_uri,'<?php echo \think\Lang::get('ds_ensure_del'); ?>');
    }
</script>
<script>
    (function(){
        $('.w').each(function(i){
            var o = document.getElementById("hutia_"+i);
            var s = o.innerHTML;
            var p = document.createElement("span");
            var n = document.createElement("a");
            p.innerHTML = s.substring(0,50);
            n.innerHTML = s.length > 50 ? "<?php echo \think\Lang::get('consulting_index_unfold'); ?>" : "";
            n.href = "###";
            n.onclick = function(){
                if (n.innerHTML == "<?php echo \think\Lang::get('consulting_index_unfold'); ?>"){
                    n.innerHTML = "<?php echo \think\Lang::get('consulting_index_retract'); ?>";
                    p.innerHTML = s;
                }else{
                    n.innerHTML = "<?php echo \think\Lang::get('consulting_index_unfold'); ?>";
                    p.innerHTML = s.substring(0,50);
                }
            }
            o.innerHTML = "";
            o.appendChild(p);
            o.appendChild(n);
        });
    })();
    (function(){
        $('.d').each(function(i){
            var o = document.getElementById("hutia2_"+i);
            var s = o.innerHTML;
            var p = document.createElement("span");
            var n = document.createElement("a");
            p.innerHTML = s.substring(0,50);
            n.innerHTML = s.length > 50 ? "<?php echo \think\Lang::get('consulting_index_unfold'); ?>" : "";
            n.href = "###";
            n.onclick = function(){
                if (n.innerHTML == "<?php echo \think\Lang::get('consulting_index_unfold'); ?>"){
                    n.innerHTML = "<?php echo \think\Lang::get('consulting_index_retract'); ?>";
                    p.innerHTML = s;
                }else{
                    n.innerHTML = "<?php echo \think\Lang::get('consulting_index_unfold'); ?>";
                    p.innerHTML = s.substring(0,50);
                }
            }
            o.innerHTML = "";
            o.appendChild(p);
            o.appendChild(n);
        });
    })();
</script>