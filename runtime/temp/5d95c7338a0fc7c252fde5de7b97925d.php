<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:105:"/usr/local/var/www/dsmall/public/../application/home/view/default/store/default/goods/goods_bundling.html";i:1574757822;}*/ ?>
<?php if((!empty($bundling_array) && !empty($b_goods_array)) || !empty($gcombo_list)){?>
<div class="dss-goods-title-nav" dstype="gbc_nav">
  <ul>
    <?php if ((!empty($bundling_array) && !empty($b_goods_array))) {?>
    <li class="current"><a href="javascript:void(0);"><?php echo \think\Lang::get('discount_package'); ?></a></li>
    <?php $current = true;}if(!(empty($gcombo_list) || (($gcombo_list instanceof \think\Collection || $gcombo_list instanceof \think\Paginator ) && $gcombo_list->isEmpty()))): ?>
    <li <?php if(!isset($current)): ?>class="current"<?php endif; ?>><a href="javascript:void(0);"><?php echo \think\Lang::get('recommended_combination'); ?></a></li>
    <?php endif; ?>
  </ul>
</div>
<div class="dss-goods-info-content" dstype="gbc_content">
  <?php if (!empty($bundling_array) && !empty($b_goods_array)) {?>
  <!--S 组合销售 -->
  <div class="dss-bundling-container">
    <div class="F-center">
      <?php $i=0;foreach($bundling_array as $val){  if(!empty($b_goods_array[$val['id']]) && is_array($b_goods_array[$val['id']])) { $i++; ?>
      <div class="dss-bundling-list">
        <ul>
          <?php ksort($b_goods_array[$val['id']]);foreach($b_goods_array[$val['id']] as $v){?>
          <li>
            <div class="goods-thumb"><a href="<?php echo url('Goods/index',['goods_id'=>$v['id']]); ?>" target="block"><img src="<?php echo $v['image']; ?>" title="<?php echo $v['name']; ?>" alt="<?php echo $v['name']; ?>"/></a></div>
            <dl>
              <dt title="<?php echo $v['name']; ?>"><a href="<?php echo url('Goods/index',['goods_id'=>$v['id']]); ?>" target="block"><?php echo $v['name']; ?></a></dt>
              <dd><?php echo \think\Lang::get('original_price_space'); ?>：<em class="o-price"><?php echo \think\Lang::get('currency'); ?><?php echo $v['shop_price']; ?></em></dd>
              <dd><?php echo \think\Lang::get('discount_price'); ?>：<em class="b-price"><?php echo \think\Lang::get('currency'); ?><?php echo $v['price']; ?></em></dd>
            </dl>
          </li>
          <?php }?>
        </ul>
      </div>
      <div class="dss-bundling-price">
        <dl>
          <dt><?php echo $val['name']; ?></dt>
          <dd class="tcj"><?php echo \think\Lang::get('original_selling_price'); ?>：<span><?php echo \think\Lang::get('currency'); ?><?php echo ds_price_format($val['storecost_price']); ?></span></dd>
          <dd class="tcj"><?php echo \think\Lang::get('set_price'); ?>：<span><?php echo \think\Lang::get('currency'); ?><?php echo $val['price']; ?></span></dd>
          <dd class="js"><?php echo \think\Lang::get('bundling_save'); ?><span><?php echo \think\Lang::get('currency'); ?><?php echo ds_price_format(floatval($val['storecost_price'])-floatval($val['price'])); ?></span></dd>
          <?php if($val['freight'] > 0): ?>
          <dd class=""><?php echo \think\Lang::get('freight'); ?>：<span><?php echo \think\Lang::get('currency'); ?><?php echo $val['freight']; ?></span></dd>
          <?php endif; ?>
          <dd class="mt5"><a href="javascript:void(0);"  dstype="addblcart_submit" bl_id="<?php echo $val['id']; ?>" class="dss-btn dss-btn-red"><i class="iconfont">&#xe709;</i><?php echo \think\Lang::get('bundling_buy'); ?></a></dd>
        </dl>
      </div>
      <?php }}?>
    </div>
     <?php if(count($bundling_array) != 1): ?>
    <div class="F-prev">&nbsp;</div>
    <div class="F-next">&nbsp;</div>
    <?php endif; ?>
  </div>
  <!--E 组合销售 --><script>
            $(function(){
            	$('#dss-bundling').show();
            	$('.dss-bundling-container').F_slider({len:<?php echo $i;?>});
                $('a[dstype="addblcart_submit"]').click(function(){
                    addblcart($(this).attr('bl_id'));
                 });	
            });
            
            /* add one bundling to cart */ 
            function addblcart(bl_id)
            {
                <?php if(\think\Session::get('is_login') != '1'): ?>
            	   login_dialog();
                <?php else: ?>
                    var url = HOMESITEURL+'/Cart/add.html';
                    $.getJSON(url, {'bl_id':bl_id}, function(data){
                    	if(data != null){
                    		if (data.state)
                            {
                                $('#bold_num').html(data.num);
                                $('#bold_mly').html(price_format(data.amount));
                                $('.dss-cart-popup').fadeIn('fast');
                                // 头部加载购物车信息
                                load_cart_information();
								$("#rtoolbar_cartlist").load(HOMESITEURL+'/Cart/ajax_load.html?type=html');
                            }
                            else
                            {
                                layer.alert(data.msg);
                            }
                    	}
                    });
                <?php endif; ?>
            }
            </script>
  <?php }if (!empty($gcombo_list)) {?>
 <div class="dss-combo-container" <?php if(isset($current)): ?>style="display:none;"<?php endif; ?>>
    <div class="default-goods">
      <div class="goods-thumb"><a href="<?php echo url('Goods/index',['goods_id'=>$goods_info['goods_id']]); ?>" target="block"><img src="<?php echo goods_thumb($goods_info, 240); ?>" title="<?php echo $goods_info['goods_name']; ?>" alt="<?php echo $goods_info['goods_name']; ?>"/></a></div>
      <dl>
        <dt title="<?php echo $goods_info['goods_name']; ?>"><a href="<?php echo url('Goods/index',['goods_id'=>$goods_info['goods_id']]); ?>" target="block"><?php echo $goods_info['goods_name']; ?></a></dt>
        <dd class="goods-price"><?php echo \think\Lang::get('market_price'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo \think\Lang::get('currency'); ?><?php echo $goods_info['goods_promotion_price']; ?></dd>
      </dl>
    </div>
    <div class="combo-goods-list" dstype="combo_list">
      <ul>
        <?php $j=0; if(is_array($gcombo_list) || $gcombo_list instanceof \think\Collection || $gcombo_list instanceof \think\Paginator): if( count($gcombo_list)==0 ) : echo "" ;else: foreach($gcombo_list as $key=>$combo): ?>
        <li <?php if($j == 0): ?>class="combo-goods-first"<?php endif; ?>>
          <?php $j++; ?>
          <div class="goods-thumb"><a href="<?php echo url('Goods/index',['goods_id'=>$combo['goods_id']]); ?>" target="block"><img src="<?php echo goods_thumb($combo, 240); ?>" title="<?php echo $combo['goods_name']; ?>" alt="<?php echo $combo['goods_name']; ?>" onload="javascript:ResizeImage(this,100,100);" /></a></div>
          <dl>
            <dt title="<?php echo $combo['goods_name']; ?>"><a href="<?php echo url('Goods/index',['goods_id'=>$combo['goods_id']]); ?>" target="block"><?php echo $combo['goods_name']; ?></a></dt>
            <dd>
              <input type="checkbox" class="checkbox" dstype="comb"  name="<?php echo $combo['goods_id']; ?>" data-param="{price:<?php echo $combo['goods_promotion_price']; ?>,marketprice:<?php echo $combo['goods_marketprice']; ?>}" />
              <?php echo \think\Lang::get('currency'); ?><?php echo $combo['goods_promotion_price']; ?></dd>
          </dl>
        </li>
        <?php endforeach; endif; else: echo "" ;endif; ?>
      </ul>
    </div>
    <div class="combo-price">
    <dl>
    <dt><?php echo \think\Lang::get('recommended_purchase_combination'); ?></dt>
    <dd><?php echo \think\Lang::get('total_mall_price'); ?>：<?php echo \think\Lang::get('currency'); ?><em dstype="gbcc_p"><?php echo $goods_info['goods_promotion_price']; ?></em></dd>
    <dd><?php echo \think\Lang::get('total_market_price'); ?>：<?php echo \think\Lang::get('currency'); ?><em dstype="gbcc_mp"><?php echo $goods_info['goods_marketprice']; ?></em></dd>
    <dd class="mt5"><a class="dss-btn dss-btn-red" dstype="addblcart_submit_comb" data-param="<?php echo $goods_info['goods_id']; ?>" href="javascript:void(0);"><i class="iconfont">&#xe709;</i><?php echo \think\Lang::get('bundling_buy'); ?></a></dd>
    </dl>
  </div>
  <script type="text/javascript">
  $(function(){
      var g_p = "<?php echo $goods_info['goods_promotion_price']; ?>";
      var mg_p = "<?php echo $goods_info['goods_marketprice']; ?>";
      $('div[dstype="combo_list"]').find('input[type="checkbox"]').click(function(){
          var gbcc_p = g_p;
          var gbcc_mp = mg_p;
          $('div[dstype="combo_list"]').find('input[type="checkbox"]:checked').each(function(){
              eval( 'data_str =' + $(this).attr('data-param'));
              gbcc_p += data_str.price;
              gbcc_mp += data_str.marketprice;
          });
          $('em[dstype="gbcc_p"]').html(number_format(gbcc_p,2));
          $('em[dstype="gbcc_mp"]').html(number_format(gbcc_mp,2));
      });
      $('a[dstype="addblcart_submit_comb"]').click(function(){
          addcombcart($(this).attr('data-param'));
       });
});
/* add one bundling to cart */ 
function addcombcart(goods_ids)
{
	var goods_ids = '';
        <?php if(\think\Session::get('is_login') != '1'): ?>
	   login_dialog();
        <?php else: ?>
    $('input[dstype="comb"]').each(function(){
        if ($(this).prop('checked')) {
            goods_ids = goods_ids + $(this).attr('name') + '|';
        }
    });
    goods_ids += '<?php echo $goods_info['goods_id']; ?>';
    var url = HOMESITEURL+'/Cart/add_comb.html';
    $.getJSON(url, {'goods_ids':goods_ids}, function(data){
    	if(data != null){
    		if (data.state)
            {
                $('#bold_num').html(data.num);
                $('#bold_mly').html(price_format(data.amount));
                $('.dss-cart-popup').fadeIn('fast');
                // 头部加载购物车信息
                load_cart_information();
				$("#rtoolbar_cartlist").load(HOMESITEURL+'/Cart/ajax_load.html?type=html');
            }
            else
            {
                layer.alert(data.msg);
            }
    	}
    });
    <?php endif; ?>
}
            </script>
</div>
</div>
<?php }?>
<script type="text/javascript">
$(function(){
    $('div[dstype="gbc_nav"]').find('li').click(function(){
        $('div[dstype="gbc_nav"]').find('li').removeClass('current');
        $(this).addClass('current');
        $('div[dstype="gbc_content"]').children().hide().eq($(this).index()).show();
    });
});
</script>
<?php }?>
