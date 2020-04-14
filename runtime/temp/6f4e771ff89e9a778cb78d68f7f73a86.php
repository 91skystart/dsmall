<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"/usr/local/var/www/dsmall/public/../application/home/view/default/mall/compare/compare_mini.html";i:1574757822;}*/ ?>
<ul class="goods-list">
    <?php if($compare_list): if(is_array($compare_list) || $compare_list instanceof \think\Collection || $compare_list instanceof \think\Paginator): if( count($compare_list)==0 ) : echo "" ;else: foreach($compare_list as $key=>$v): ?>
    <li><dl class="goods-info">
        <dt class="goods-pic"> <a href="<?php echo url('Goods/index',['goods_id'=>$v['goods_id']]); ?>" title="<?php echo $v['goods_name']; ?>"> <img src="<?php echo goods_cthumb($v['goods_image'],240,$v['store_id']); ?>" alt="<?php echo $v['goods_name']; ?>" title="<?php echo $v['goods_name']; ?>"/> </a> </dt>
        <dd class="goods-opt"><span class="del" onclick="javascript:delCompare(<?php echo $v['goods_id']; ?>,'mini');"><?php echo \think\Lang::get('compare_delete'); ?></span></dd> </dl>
    </li>
    <?php endforeach; endif; else: echo "" ;endif; endif; if($freemaxnum>0): $__FOR_START_620962322__=0;$__FOR_END_620962322__=$freemaxnum;for($i=$__FOR_START_620962322__;$i < $__FOR_END_620962322__;$i+=1){ ?>
    <li><div class="no-compare"><?php echo \think\Lang::get('no_comparison_term'); ?></div></li>
    <?php } endif; ?>
</ul>
<div class="btn-box" style="text-align: right">
    <?php if((count($compare_list)>1)): ?>
    <span style="background-color: #E74649; color: #FFFFFF; cursor: pointer; padding: 5px 10px;" onclick="javascript:window.open('<?php echo url('Compare/index',['gids'=>$goodsid_str]); ?>');"><?php echo \think\Lang::get('to_contrast'); ?></span>
    <?php else: ?>
    <!--对比商品小于等于1件则对比按钮不可用-->
    <span style=" background-color: #FFFFFF; border: 1px solid #DDDDDD; color: #CCCCCC; padding: 5px 10px; cursor: default;"><?php echo \think\Lang::get('to_contrast'); ?></span>
    <?php endif; ?>
    <span style="background-color: #E6E6E6; cursor: pointer; padding: 5px 10px;" onclick="javascript:delCompare('all','mini');"><?php echo \think\Lang::get('compare_empty'); ?></span>
</div>