<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:106:"/usr/local/var/www/dsmall/public/../application/home/view/default/mall/showgroupbuy/groupbuy_evaluate.html";i:1574757822;}*/ ?>
<?php if(!(empty($goodsevallist) || (($goodsevallist instanceof \think\Collection || $goodsevallist instanceof \think\Paginator ) && $goodsevallist->isEmpty()))): if(is_array($goodsevallist) || $goodsevallist instanceof \think\Collection || $goodsevallist instanceof \think\Paginator): if( count($goodsevallist)==0 ) : echo "" ;else: foreach($goodsevallist as $k=>$v): ?>
<div id="t" class="dsg-evaluate-floor">
  <div class="user-avatar"> <img src="<?php echo get_member_avatar_for_id($v['geval_frommemberid']); ?>">  </div>
  <dl class="detail">
      <dt> 
      <span class="user-name">
          <?php if($v['geval_isanonymous'] == 1): ?>
          <?php echo str_cut($v['geval_frommembername'],2); ?>***
          <?php else: ?>
          <?php echo $v['geval_frommembername']; endif; ?>
      </span>
      <time pubdate="pubdate">[<?php echo @date('Y-m-d',$v['geval_addtime']);?>]</time>
    </dt>
    <dd><?php echo \think\Lang::get('user_rating'); ?>：<span class="raty" data-score="<?php echo $v['geval_scores']; ?>"></span></dd>
    <dd class="content"><?php echo \think\Lang::get('evaluation_details'); ?>：<span><?php echo $v['geval_content']; ?></span></dd>
      <?php if(!(empty($v['geval_explain']) || (($v['geval_explain'] instanceof \think\Collection || $v['geval_explain'] instanceof \think\Paginator ) && $v['geval_explain']->isEmpty()))): ?>
      <dd class="explain"><?php echo \think\Lang::get('explanation'); ?>：<span><?php echo $v['geval_explain']; ?></span></dd>
      <?php endif; if(!(empty($v['geval_image']) || (($v['geval_image'] instanceof \think\Collection || $v['geval_image'] instanceof \think\Paginator ) && $v['geval_image']->isEmpty()))): ?>
      <dd> <?php echo \think\Lang::get('photo_posting'); ?>：
      <ul class="photos-thumb">
          <?php $image_array = explode(',', $v['geval_image']); if(is_array($image_array) || $image_array instanceof \think\Collection || $image_array instanceof \think\Paginator): if( count($image_array)==0 ) : echo "" ;else: foreach($image_array as $key=>$value): ?>
          <li><a data-lightbox="lightbox-image"  href="<?php echo sns_thumb($value, 1024); ?>"> <img src="<?php echo sns_thumb($value); ?>"> </a></li>
          <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </dd>
    <?php endif; ?>
  </dl>
</div>
<?php endforeach; endif; else: echo "" ;endif; ?>
<div class="tc pr5 pb5 pr">
  <div class="pagination"> <?php echo $show_page; ?></div>
</div>
<?php else: ?>
<div class="no-buyer"><?php echo \think\Lang::get('no_record'); ?></div>
<?php endif; ?>
<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.lightbox/css/lightbox.min.css">
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.lightbox/js/lightbox.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.raty').raty({
        path: "<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery.raty/img",
        readOnly: true,
        score: function() {
            return $(this).attr('data-score');
        }
    });


    $('#groupbuy_evaluate').find('.demo').ajaxContent({
        event:'click', //mouseover
        loaderType:"img",
        loadingMsg:"<?php echo HOME_SITE_ROOT; ?>/images/treetable/transparent.gif",
        target:'#groupbuy_evaluate'
    });
});
</script>