<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:95:"/usr/local/var/www/dsmall/public/../application/home/view/default/member/member/goods_info.html";i:1574757822;}*/ ?>
<div class="pt20">
        <div class="mc-title">
            <h3><?php echo \think\Lang::get('ds_merchandise_collection'); ?></h3>
        </div>
        <div class="mc-list">
            <?php if(!(empty($favorites_list) || (($favorites_list instanceof \think\Collection || $favorites_list instanceof \think\Paginator ) && $favorites_list->isEmpty()))): if(is_array($favorites_list) || $favorites_list instanceof \think\Collection || $favorites_list instanceof \think\Paginator): if( count($favorites_list)==0 ) : echo "" ;else: foreach($favorites_list as $key=>$favorites): ?>
            <div class="mc-item">
                <a href='<?php echo url('Goods/index',['goods_id'=>$favorites['goods']['goods_id']]); ?>' target='_blank' title="<?php echo $favorites['goods']['goods_name']; ?>">
                <img src="<?php echo goods_thumb($favorites['goods'], 240); ?>">
                </a>
            </div>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <dl class="null-tip pb10">
                <dt class="iconfont">&#xe732;</dt>
              <dd>
                <h4><?php echo \think\Lang::get('have_no_collections_yet'); ?></h4>
                <h5><?php echo \think\Lang::get('new_promotions_price_cuts'); ?></h5>
              </dd>
            </dl>
            <?php endif; ?>
        </div>
    </div>
    <div class="pt20">
        <div class="mc-title">
            <h3><?php echo \think\Lang::get('store_collections'); ?></h3>
        </div>
        <div class="mc-list">
            <?php if(!(empty($favorites_store_list) || (($favorites_store_list instanceof \think\Collection || $favorites_store_list instanceof \think\Paginator ) && $favorites_store_list->isEmpty()))): if(is_array($favorites_store_list) || $favorites_store_list instanceof \think\Collection || $favorites_store_list instanceof \think\Paginator): if( count($favorites_store_list)==0 ) : echo "" ;else: foreach($favorites_store_list as $key=>$favorites): ?>
            <div class="mc-item">
                <a href='<?php echo url('Store/index',['store_id'=>$favorites['store']['store_id']]); ?>' target='_blank' title="<?php echo $favorites['store']['store_name']; ?>">
                <img src="<?php echo get_store_logo($favorites['store']['store_avatar']); ?>">
                </a>    
            </div>
            <?php endforeach; endif; else: echo "" ;endif; else: ?>
            <dl class="null-tip pb10">
                <dt class="iconfont">&#xe737;</dt>
              <dd>
                <h4><?php echo \think\Lang::get('no_collection_shop'); ?></h4>
                <h5><?php echo \think\Lang::get('stores_latest_merchandise_promotions'); ?></h5>
              </dd>
            </dl>
            <?php endif; ?>
        </div>
    </div>

