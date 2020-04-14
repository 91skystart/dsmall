<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:105:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellergoodsadd/edit_storage.html";i:1574757822;}*/ ?>
<div class="eject_con">
    <div id="warning" class="alert alert-error"></div>
    <form method="post" action="<?php echo url('Sellergoodsonline/edit_storage'); ?>" id="jingle_form" onsubmit="ds_ajaxpost('jingle_form');return false;">
        <input type="hidden" name="commonid" value="<?php echo \think\Request::instance()->param('commonid'); ?>" />
        <table border="0" cellpadding="0" cellspacing="0" class="spec_table">
            <thead>
                <th class="w200"><?php echo \think\Lang::get('store_goods_index_goods_name'); ?></th>
                <th class="w100"><span class="red">*</span><?php echo \think\Lang::get('market_price'); ?></th>
              <th class="w100"><span class="red">*</span><?php echo \think\Lang::get('store_goods_index_price'); ?></th>
              <th class="w60"><span class="red">*</span><?php echo \think\Lang::get('store_goods_index_stock'); ?></th>
              <th class="w70"><?php echo \think\Lang::get('warning_value'); ?></th>
              <th class="w100"><?php echo \think\Lang::get('store_goods_index_goods_no'); ?></th>
            </thead>
            <tbody>
                <?php if(is_array($goods_list) || $goods_list instanceof \think\Collection || $goods_list instanceof \think\Paginator): if( count($goods_list)==0 ) : echo "" ;else: foreach($goods_list as $key=>$goods): ?>
                <tr>
                    <td><?php echo $goods['goods_name']; ?></td>
                    <td><input class="text price valid" type="text" name="spec[<?php echo $goods['goods_id']; ?>][marketprice]" value="<?php echo $goods['goods_marketprice']; ?>"><em class="add-on"><i class="iconfont">&#xe65c;</i></em></td>
                    <td><input class="text price"<?php if($goodscommon_info['goods_lock']): ?> readonly="readonly"<?php endif; ?> type="text" name="spec[<?php echo $goods['goods_id']; ?>][price]" value="<?php echo $goods['goods_price']; ?>"><em class="add-on"><i class="iconfont">&#xe65c;</i></em></td>
                    <td><input class="text stock" type="text" name="spec[<?php echo $goods['goods_id']; ?>][stock]" value="<?php echo $goods['goods_storage']; ?>"></td>
                    <td><input class="text stock" type="text" name="spec[<?php echo $goods['goods_id']; ?>][alarm]" value="<?php echo $goods['goods_storage_alarm']; ?>"></td>
                    <td><input class="text sku" type="text" name="spec[<?php echo $goods['goods_id']; ?>][sku]" value="<?php echo $goods['goods_serial']; ?>"></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
        <div class="bottom">
            <input type="submit" class="submit" value="<?php echo \think\Lang::get('ds_submit'); ?>"/>
        </div>
    </form>
</div>

