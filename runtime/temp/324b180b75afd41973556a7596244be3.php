<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:93:"/usr/local/var/www/dsmall/public/../application/home/view/default/member/member/sns_info.html";i:1574757822;}*/ ?>
<div class="pt20">
        <div class="mc-title">
            <h3><?php echo \think\Lang::get('my_footprint'); ?></h3>
        </div>
        <?php if(!(empty($viewed_goods) || (($viewed_goods instanceof \think\Collection || $viewed_goods instanceof \think\Paginator ) && $viewed_goods->isEmpty()))): if(is_array($viewed_goods) || $viewed_goods instanceof \think\Collection || $viewed_goods instanceof \think\Paginator): if( count($viewed_goods)==0 ) : echo "" ;else: foreach($viewed_goods as $goods_id=>$goods_info): ?>
        <div class="mynews-list-area my_center service_type_4 ">
            <div class="m-image">
                <img src="<?php echo $goods_info['goods_image']; ?>">
            </div>
            <div class="m-title">
                <em class="m-info"><?php echo $goods_info['goods_name']; ?></em>
                <em class="m-name"><?php echo \think\Lang::get('view_at'); ?></em>
                <em class="m-time"><?php echo date('Y-m-d H:i',$goods_info['goodsbrowse_time']); ?></em>
            </div>
            <p class="m-detail"><?php echo $goods_info['goods_advword']; ?></p>
            <a href="<?php echo $goods_info['url']; ?>" class="button-1 mynews-list-btn" target="_blank" ><?php echo \think\Lang::get('view_detail'); ?></a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; else: ?>
        <dl class="null-tip pt20 pb20" style='margin-top: 12px;'>
            <dt><i class="iconfont">&#xe70b;</i></dt>
            <dd>
                <h4><?php echo \think\Lang::get('browsing_history_empty'); ?></h4>
                <h5><?php echo \think\Lang::get('mall_look_promotion'); ?></h5>
            </dd>
        </dl>
        <?php endif; ?>
    </div>




