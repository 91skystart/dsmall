<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/usr/local/var/www/dsmall/public/../application/admin/view/stataftersale/stat_listandorder.html";i:1574757822;}*/ ?>
<div class="w100pre close_float" style="text-align:right;">
    <input type="hidden" id="export_type" data-url="<?php echo url(request()->controller().'/'.request()->action()); ?>/exporttype/excel" name="export_type" data-param='{"url":"<?php echo $actionurl; ?>?t=<?php echo $searchtime; ?>&exporttype=excel"}' value="excel"/>
    <a class="btn btn-mini" href="javascript:void(0);" id="export_btn"><?php echo \think\Lang::get('ds_export'); ?>Excel</a>
</div>
<table class="ds-default-table">
    <thead>
        <tr class="thead sortbar-array">
            <?php if(is_array($statheader) || $statheader instanceof \think\Collection || $statheader instanceof \think\Paginator): if( count($statheader)==0 ) : echo "" ;else: foreach($statheader as $key=>$v): if(isset($v['isorder'])): if($v['isorder'] == 1): ?>
            <th class="align-center">
                <a ds_type="orderitem" href="" class="selected"><?php echo $v['text']; ?><i></i></a>
            </th>
            <?php else: ?>
            <th class="align-center"><?php echo $v['text']; ?></th>
            <?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </tr>
    </thead>
    <tbody id="datatable">
        <?php if(!(empty($statlist) || (($statlist instanceof \think\Collection || $statlist instanceof \think\Paginator ) && $statlist->isEmpty()))): if(is_array($statlist) || $statlist instanceof \think\Collection || $statlist instanceof \think\Paginator): if( count($statlist)==0 ) : echo "" ;else: foreach($statlist as $key=>$v): ?>
        <tr class="hover">
            <?php if(is_array($statheader) || $statheader instanceof \think\Collection || $statheader instanceof \think\Paginator): if( count($statheader)==0 ) : echo "" ;else: foreach($statheader as $key=>$h_v): ?>
            <td class="<?php echo !empty($h_v['class'])?$h_v['class'] : 'align-center'; ?>"><?php echo $v[$h_v['key']]; ?></td>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <tr class="no_data">
            <td colspan="11"><?php echo \think\Lang::get('no_record'); ?></td>
        </tr>
        <?php endif; ?>
    </tbody>
</table>
<?php echo $show_page; ?>
<script>
    jQuery.browser={};(function(){jQuery.browser.msie=false; jQuery.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)./)){ jQuery.browser.msie=true;jQuery.browser.version=RegExp.$1;}})();
</script>
  <script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.poshytip.min.js"></script>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.ajaxContent.pack.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    //Ajax提示
    $('.tip').poshytip({
        className: 'tip-yellowsimple',
        showTimeout: 1,
        alignTo: 'target',
        alignX: 'center',
        alignY: 'top',
        offsetY: 5,
        allowTipHover: false
    });

    $('#statlist').find('.demo').ajaxContent({
        event:'click', //mouseover
        loaderType:"img",
        loadingMsg:"<?php echo ADMIN_SITE_ROOT; ?>/images/treetable/transparent.gif",
        target:'#statlist'
    });
    $("[ds_type='orderitem']").ajaxContent({
        event:'click',
        loaderType:"img",
        loadingMsg:"<?php echo ADMIN_SITE_ROOT; ?>/images/treetable/transparent.gif",
        target:'#statlist'
    });

    //导出图表
    $("#export_btn").click(function(){
        var item = $("#export_type");
        var type = $(item).val();
        if(type == 'excel'){
            export_xls(item.attr('data-url').replace('.html',''));
        }
    });
});
</script>
<script>
    $(function(){
        $('.pagination a').each(function(){
            $(this).data('url',$(this).attr('href')).attr('href','javascript:void(0)')
            $(this).click(function(){
               $('#statlist').load($(this).data('url'));
            })
        })
    })
</script>