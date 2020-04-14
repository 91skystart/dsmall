<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:107:"/usr/local/var/www/dsmall/public/../application/home/view/default/store/default/goods/goods_consulting.html";i:1574757822;}*/ ?>
<script type="text/javascript">
$(function(){
    $('#consulting_demo').find('.demo').ajaxContent({
        event:'click', //mouseover
        loaderType:"img",
        loadingMsg:"images/transparent.gif",
        target:'#consulting_demo'
    });

    $('#consulting_tab').find('a').ajaxContent({
        event:'click',
        loaderType:'img',
        loadingMsg:'images/transparent.gif',
        target:'#consulting_demo'
    });
});
</script>

<div class="top" style="overflow: hidden;">

  <div class="dss-cosult-askbtn"><a href="<?php echo url('Goods/consulting_list',['goods_id'=>\think\Request::instance()->param('goods_id')]); ?>" target="_blank" class="dss-btn dss-btn-red"><?php echo \think\Lang::get('want_questions'); ?></a></div>
</div>
<div class="dss-goods-title-nav">
  <ul id="consulting_tab">
    <li class="<?php if(\think\Request::instance()->param('ctid') == 0): ?>current<?php endif; ?>"><a href="<?php echo url('Goods/consulting',['goods_id'=>\think\Request::instance()->param('goods_id'),'store_id'=>\think\Request::instance()->param('store_id')]); ?>"><?php echo \think\Lang::get('ds_all'); ?></a></li>
    <?php if(!(empty($consult_type) || (($consult_type instanceof \think\Collection || $consult_type instanceof \think\Paginator ) && $consult_type->isEmpty()))): if(is_array($consult_type) || $consult_type instanceof \think\Collection || $consult_type instanceof \think\Paginator): if( count($consult_type)==0 ) : echo "" ;else: foreach($consult_type as $key=>$val): ?>
    <li class="<?php if(\think\Request::instance()->param('ctid') == $val['consulttype_id']): ?>current<?php endif; ?>"><a href="<?php echo url('Goods/consulting',['goods_id'=>\think\Request::instance()->param('goods_id'),'ctid'=>$val['consulttype_id'],'store_id'=>\think\Request::instance()->param('store_id')]); ?>"><?php echo $val['consulttype_name']; ?></a></li>
    <?php endforeach; endif; else: echo "" ;endif; endif; ?>
  </ul>
</div>
<div class="dss-cosult-main">
  <?php if(!(empty($consult_list) || (($consult_list instanceof \think\Collection || $consult_list instanceof \think\Paginator ) && $consult_list->isEmpty()))): if(is_array($consult_list) || $consult_list instanceof \think\Collection || $consult_list instanceof \think\Paginator): if( count($consult_list)==0 ) : echo "" ;else: foreach($consult_list as $k=>$v): ?>
  <div class="dss-cosult-list">
    <dl class="asker">
      <dt><?php echo \think\Lang::get('consulting_net_friend'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd>
        <?php if($v['member_id'] == '0'): ?>
        <?php echo \think\Lang::get('ds_guest'); elseif($v['consult_isanonymous'] == '1'): ?>
        <?php echo str_cut($v['member_name'],2); ?>***
        <?php else: ?>
        <a href="javascript:void(0)" target="_blank" data-param="{'id':<?php echo $v['member_id']; ?>}" dstype="mcard"><?php echo str_cut($v['member_name'],8); ?></a>
        <?php endif; ?>
        <time datetime="<?php echo date("Y-m-d H:i:s",$v['consult_addtime']); ?>" pubdate="pubdate" class="ml20"><?php echo date("Y-m-d H:i:s",$v['consult_addtime']); ?></time>
      </dd>
    </dl>
    <dl class="ask-con">
      <dt><?php echo \think\Lang::get('goods_index_consult_content'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
      <dd>
        <p><?php echo nl2br($v['consult_content']); ?></p>
      </dd>
    </dl>
    <?php if(!(empty($v['consult_reply']) || (($v['consult_reply'] instanceof \think\Collection || $v['consult_reply'] instanceof \think\Paginator ) && $v['consult_reply']->isEmpty()))): ?>
    <dl class="reply">
      <dt><?php echo \think\Lang::get('goods_index_seller_reply'); ?></dt>
      <dd>
        <p><?php echo nl2br($v['consult_reply']); ?></p>
        <time datetime="<?php echo date('Y-m-d H:i:s',$v['consult_replytime']); ?>" pubdate="pubdate">[<?php echo date("Y-m-d H:i:s",$v['consult_replytime']); ?>]</time>
      </dd>
    </dl>
    <?php endif; ?>
  </div>
  
  <?php endforeach; endif; else: echo "" ;endif; ?>
  <div class="more"><a href="<?php echo url('Goods/consulting_list',['goods_id'=>\think\Request::instance()->param('goods_id')]); ?>" target="_blank" ><?php echo \think\Lang::get('view_all_inquiries'); ?>>></a></div>
 <?php else: ?>
  <div class="dss-norecord"><?php echo \think\Lang::get('goods_index_no_reply'); ?></div>
 <?php endif; ?>
  
</div>
