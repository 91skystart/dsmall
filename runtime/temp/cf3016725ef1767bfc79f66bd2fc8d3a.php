<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:95:"/usr/local/var/www/dsmall/public/../application/home/view/default/seller/sellerorder/index.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/base_seller.html";i:1574757822;s:76:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_top.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_left.html";i:1574757822;s:78:"/usr/local/var/www/dsmall/application/home/view/default/base/seller_items.html";i:1574757822;s:77:"/usr/local/var/www/dsmall/application/home/view/default/base/mall_footer.html";i:1574757822;}*/ ?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php if(isset($html_title) && $html_title): ?><?php echo $html_title; else: ?><?php echo \think\Lang::get('store_callcenter'); endif; ?></title>
        <meta name="renderer" content="webkit|ie-comp|ie-stand">
        <meta name="keywords" content="<?php echo (isset($seo_keywords) && ($seo_keywords !== '')?$seo_keywords:''); ?>" />
        <meta name="description" content="<?php echo (isset($seo_description) && ($seo_description !== '')?$seo_description:''); ?>" />
        <link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/common.css">
        <link rel="stylesheet" href="<?php echo HOME_SITE_ROOT; ?>/css/seller.css">
        <link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.css">
        <script>
            var BASESITEROOT = "<?php echo BASE_SITE_ROOT; ?>";
            var HOMESITEROOT = "<?php echo HOME_SITE_ROOT; ?>";
            var BASESITEURL = "<?php echo BASE_SITE_URL; ?>";
            var HOMESITEURL = "<?php echo HOME_SITE_URL; ?>";
        </script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery-2.1.4.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/jquery-ui/jquery.ui.datepicker-zh-CN.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/common.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.validate.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/additional-methods.min.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/layer/layer.js"></script>
        <script src="<?php echo HOME_SITE_ROOT; ?>/js/member.js"></script>
        <script src="<?php echo PLUGINS_SITE_ROOT; ?>/js/dialog/dialog.js" id="dialog_js" charset="utf-8"></script>
        <script>
            jQuery.browser={};(function(){jQuery.browser.msie=false; jQuery.browser.version=0;if(navigator.userAgent.match(/MSIE ([0-9]+)./)){ jQuery.browser.msie=true;jQuery.browser.version=RegExp.$1;}})();
        </script>
    </head>
    <body>
        <div id="append_parent"></div>
        <div id="ajaxwaitid"></div>
        

<div class="seller_main">
    <div class="seller_left">
    <div class="seller_left_1">
        <div class="logo">
            <a href="<?php echo url('Seller/index'); ?>">
                <img src="<?php if(\think\Config::get('seller_center_logo') == ''): ?><?php echo BASE_SITE_ROOT; ?>/uploads/home/common/seller_center_logo.png<?php else: ?><?php echo BASE_SITE_ROOT; ?>/uploads/home/common/<?php echo \think\Config::get('seller_center_logo'); endif; ?>"/>
            </a>
        </div>
        <div class="sidebar">
            <a href="<?php echo url('Store/index',['store_id'=>\think\Session::get('store_id')]); ?>" target="_blank"><i class="iconfont">&#xe6da;</i><?php echo \think\Lang::get('ds_mystroe'); ?></a>
            <?php if(\think\Config::get('node_site_use') == '1'): ?>
            <a href="javascript:void(0);" id="chat_show_user"><i class="iconfont">&#xe71b;</i><?php echo \think\Lang::get('ds_chat'); ?></a>
            <?php endif; if(is_array($seller_menu) || $seller_menu instanceof \think\Collection || $seller_menu instanceof \think\Paginator): if( count($seller_menu)==0 ) : echo "" ;else: foreach($seller_menu as $menu_key=>$menu): ?>
            <a href="<?php echo $menu['url']; ?>" <?php if($menu_key == $curmenu): ?>class="active"<?php endif; ?>><i class="iconfont"><?php echo $menu['ico']; ?></i><?php echo $menu['text']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="mb">
            <a href="<?php echo url('Sellerlogin/logout'); ?>"><?php echo \think\Lang::get('exit'); ?></a>
        </div>
    </div>
    <div class="seller_left_2">
        <div class="mt">
            <?php if(is_array($seller_menu) || $seller_menu instanceof \think\Collection || $seller_menu instanceof \think\Paginator): if( count($seller_menu)==0 ) : echo "" ;else: foreach($seller_menu as $menu_key=>$menu): if($menu_key == $curmenu): ?><?php echo $menu['text']; endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
        <div class="mc">
            <?php if(is_array($seller_menu) || $seller_menu instanceof \think\Collection || $seller_menu instanceof \think\Paginator): if( count($seller_menu)==0 ) : echo "" ;else: foreach($seller_menu as $menu_key=>$menu): if($menu_key == $curmenu): if(is_array($menu['submenu']) || $menu['submenu'] instanceof \think\Collection || $menu['submenu'] instanceof \think\Paginator): if( count($menu['submenu'])==0 ) : echo "" ;else: foreach($menu['submenu'] as $key=>$submenu): ?>
            <a href="<?php echo $submenu['url']; ?>" <?php if($submenu['name'] == $cursubmenu): ?>class="active"<?php endif; ?>><?php echo $submenu['text']; ?></a>
            <?php endforeach; endif; else: echo "" ;endif; endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
</div>
    <div class="seller_right">
        <div class="seller_items">
        <?php if(!(empty($seller_item) || (($seller_item instanceof \think\Collection || $seller_item instanceof \think\Paginator ) && $seller_item->isEmpty()))): ?>
<ul>
    <?php if(is_array($seller_item) || $seller_item instanceof \think\Collection || $seller_item instanceof \think\Paginator): if( count($seller_item)==0 ) : echo "" ;else: foreach($seller_item as $key=>$item): ?>
    <li <?php if($item['name'] == $curitem): ?>class="current"<?php endif; ?>><a href="<?php echo $item['url']; ?>"><?php echo $item['text']; ?></a></li>
    <?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<?php endif; ?>
        
        </div>
        <div style="padding: 20px;">
            <?php if(isset($store_closed) && $store_closed): ?>
            <div class="alert mt10"> <strong><?php echo \think\Lang::get('store_closed_reason'); ?>：<?php echo $store_closed; ?>。</strong> <?php echo \think\Lang::get('please_contact_admin'); ?>!</div>
            <?php endif; ?>
            
<form method="get" action="" target="_self">
    <table class="search-form">
        <?php if(\think\Request::instance()->param('state_type')): ?>
        <input type="hidden" name="state_type" value="<?php echo \think\Request::instance()->param('state_type'); ?>" />
        <?php endif; ?>
        <tr>
            <td>&nbsp;</td>
            <th><?php echo \think\Lang::get('store_order_add_time'); ?></th>
            <td class="w240">
                <input type="text" class="text w70" name="query_start_date" id="query_start_date" value="<?php echo \think\Request::instance()->param('query_start_date'); ?>" />
                <label class="add-on"><i class="iconfont">&#xe8d6;</i></label>&nbsp;&#8211;&nbsp;
                <input id="query_end_date" class="text w70" type="text" name="query_end_date" value="<?php echo \think\Request::instance()->param('query_end_date'); ?>" />
                <label class="add-on"><i class="iconfont">&#xe8d6;</i></label>
            </td>
            <th><?php echo \think\Lang::get('store_order_buyer'); ?></th>
            <td class="w100"><input type="text" class="text w80" name="buyer_name" value="<?php echo \think\Request::instance()->param('buyer_name'); ?>" /></td>
            <th><?php echo \think\Lang::get('store_order_order_sn'); ?></th>
            <td class="w160"><input type="text" class="text w150" name="order_sn" value="<?php echo \think\Request::instance()->param('order_sn'); ?>" /></td>
            <td class="w70 tc">
                <input type="submit" class="submit" value="<?php echo \think\Lang::get('store_order_search'); ?>" />
            </td>
        </tr>
    </table>
</form>


<table class="dssc-default-table order">
    <thead>
        <tr>
            <th class="w10"></th>
            <th colspan="2"><?php echo \think\Lang::get('store_order_goods_detail'); ?></th>
            <th class="w100"><?php echo \think\Lang::get('store_order_goods_single_price'); ?></th>
            <th class="w40"><?php echo \think\Lang::get('store_show_order_amount'); ?></th>
            <th class="w110"><?php echo \think\Lang::get('store_order_buyer'); ?></th>
            <th class="w120"><?php echo \think\Lang::get('store_order_sum'); ?></th>
            <th class="w100"><?php echo \think\Lang::get('store_trading_status'); ?></th>
            <th class="w150"><?php echo \think\Lang::get('store_trading_operations'); ?></th>
        </tr>
    </thead>
    <?php if (is_array($order_list) and !empty($order_list)) { foreach($order_list as $order_id => $order) { ?>
    <tbody>
        <tr>
            <td colspan="20" class="sep-row"></td>
        </tr>
        <tr>
            <th colspan="20"><span class="ml10"><?php echo \think\Lang::get('store_order_order_sn'); ?><?php echo \think\Lang::get('ds_colon'); ?><em><?php echo $order['order_sn']; ?></em>
                    <?php if($order['order_from'] == 2): ?>
                    <i class="iconfont">&#xe60e;</i>
                    <?php endif; ?>
                </span> <span><?php echo \think\Lang::get('store_order_add_time'); ?><?php echo \think\Lang::get('ds_colon'); ?><em class="goods-time"><?php echo date("Y-m-d H:i:s",$order['add_time']); ?></em></span> 
                <span class="fr mr5"> <a href="<?php echo url('Sellerorderprint/index',['order_id'=>$order_id]); ?>" class="dssc-btn-mini" target="_blank" title="<?php echo \think\Lang::get('store_show_order_printorder'); ?>"/><i class="iconfont">&#xe7ca;</i><?php echo \think\Lang::get('store_show_order_printorder'); ?></a></span>
            </th>
        </tr>
        <?php $i = 0;foreach($order['goods_list'] as $k => $goods) { $i++;?>
        <tr>
            <td class="bdl"></td>
            <td class="w70"><div class="dssc-goods-thumb"><a href="<?php echo $goods['goods_url']; ?>" target="_blank"><img src="<?php echo goods_thumb($goods,240); ?>"/></a></div></td>
            <td class="tl"><dl class="goods-name">
                    <dt><a target="_blank" href="<?php echo $goods['goods_url']; ?>"><?php echo $goods['goods_name']; ?></a></dt>
                    <dd>
                        <?php if(!(empty($goods['goods_type_cn']) || (($goods['goods_type_cn'] instanceof \think\Collection || $goods['goods_type_cn'] instanceof \think\Paginator ) && $goods['goods_type_cn']->isEmpty()))): ?>
                        <span class="sale-type"><?php echo $goods['goods_type_cn']; ?></span>
                        <?php endif; ?>
                    </dd>
                </dl></td>
            <td><?php echo $goods['goods_price']; ?></td>
            <td><?php echo $goods['goods_num']; ?></td>

            <!-- S 合并TD -->
            <?php if(($order['goods_count'] > 1 && $k ==0) || ($order['goods_count']) == 1): ?>
            <td class="bdl" rowspan="<?php echo $order['goods_count']; ?>"><div class="buyer"><?php echo $order['buyer_name']; ?>
                    <p member_id="<?php echo $order['buyer_id']; ?>">
                        <?php if(!empty($order['extend_member']['member_qq'])): ?>
                        <a target="_blank" href="<?php echo HTTP_TYPE; ?>wpa.qq.com/msgrd?v=3&uin=<?php echo $order['extend_member']['member_qq']; ?>&site=qq&menu=yes" title="QQ: <?php echo $order['extend_member']['member_qq']; ?>"><img border="0" src="<?php echo HTTP_TYPE; ?>wpa.qq.com/pa?p=2:<?php echo $order['extend_member']['member_qq']; ?>:52" style=" vertical-align: middle;"/></a>
                        <?php endif; if(!empty($order['extend_member']['member_ww'])): ?>
                        <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo $order['extend_member']['member_ww']; ?>&site=cntaobao&s=2&charset=utf-8" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo $order['extend_member']['member_ww']; ?>&site=cntaobao&s=2&charset=utf-8" alt="Wang Wang" style=" vertical-align: middle;" /></a>
                        <?php endif; ?>
                    </p>
                    <div class="buyer-info"> <em></em>
                        <div class="con">
                            <h3><i></i><span><?php echo \think\Lang::get('store_order_buyer_info'); ?></span></h3>
                            <dl>
                                <dt><?php echo \think\Lang::get('store_order_receiver'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                                <dd><?php echo $order['extend_order_common']['reciver_name']; ?></dd>
                            </dl>
                            <dl>
                                <dt><?php echo \think\Lang::get('store_order_phone'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                                <dd><?php echo $order['extend_order_common']['reciver_info']['phone']; ?></dd>
                            </dl>
                            <dl>
                                <dt><?php echo \think\Lang::get('store_order_address'); ?><?php echo \think\Lang::get('ds_colon'); ?></dt>
                                <dd><?php echo $order['extend_order_common']['reciver_info']['address']; ?></dd>
                            </dl>
                        </div>
                    </div>
                </div></td>
            <td class="bdl" rowspan="<?php echo $order['goods_count']; ?>"><p class="dssc-order-amount"><?php echo $order['order_amount']; ?></p>
                <p class="goods-freight">
                    <?php if($order['shipping_fee'] > 0): ?>
                    (<?php echo \think\Lang::get('store_show_order_shipping_han'); ?><?php echo \think\Lang::get('store_show_order_tp_fee'); ?><?php echo $order['shipping_fee']; ?>)
                    <?php else: ?>
                    <?php echo \think\Lang::get('ds_common_shipping_free'); endif; ?>
                </p>
                <p class="goods-pay" title="<?php echo \think\Lang::get('store_order_pay_method'); ?><?php echo \think\Lang::get('ds_colon'); ?><?php echo $order['payment_name']; ?>"><?php echo $order['payment_name']; ?></p></td>
            <td class="bdl bdr" rowspan="<?php echo $order['goods_count']; ?>"><p><?php echo $order['state_desc']; if(isset($order['evaluation_time'])): ?>
                    <br/>
                    <?php echo \think\Lang::get('store_order_evaluated'); endif; ?>
                </p>

                <!-- 订单查看 -->
                <p><a href="<?php echo url('Sellerorder/show_order',['order_id'=>$order_id]); ?>" target="_blank"><?php echo \think\Lang::get('store_order_view_order'); ?></a></p>

                <!-- 物流跟踪 -->
                <p>
                    <?php if($order['if_deliver']): ?>
                    <a href="<?php echo url('Sellerdeliver/search_deliver',['order_sn'=>$order['order_sn']]); ?>"><?php echo \think\Lang::get('store_order_show_deliver'); ?></a>
                    <?php endif; ?>
                </p>


            </td>

            <!-- 取消订单 -->
            <td class="bdl bdr" rowspan="<?php echo $order['goods_count']; ?>">
                <?php if($order['if_cancel']): ?>
                <p><a href="javascript:void(0)" class="dssc-btn dssc-btn-red mt5" ds_type="dialog" uri="<?php echo url('Sellerorder/change_state',['state_type'=>'order_cancel','order_id'=>$order['order_id'],'order_sn'=>$order['order_sn']]); ?>" dialog_title="<?php echo \think\Lang::get('store_order_cancel_order'); ?>" dialog_id="seller_order_cancel_order" dialog_width="400" id="order<?php echo $order['order_id']; ?>_action_cancel" /><i class="iconfont">&#xe699;</i><?php echo \think\Lang::get('store_order_cancel_order'); ?></a></p>
                <?php endif; ?>

                <!-- 修改运费 -->
                <?php if($order['if_modify_price']): ?>
                <p><a href="javascript:void(0)" class="dssc-btn-mini dssc-btn-orange mt10" uri="<?php echo url('Sellerorder/change_state',['state_type'=>'modify_price','order_sn'=>$order['order_sn'],'order_id'=>$order['order_id']]); ?>" dialog_width="480" dialog_title="<?php echo \think\Lang::get('store_order_modify_price'); ?>" ds_type="dialog"  dialog_id="seller_order_adjust_fee" id="order<?php echo $order['order_id']; ?>_action_adjust_fee" /><i class="iconfont">&#xe731;</i><?php echo \think\Lang::get('modify_freight'); ?></a></p>
                <?php endif; ?>
                <!-- 修改价格 -->
                <?php if($order['if_spay_price']): ?>
                <p><a href="javascript:void(0)" class="dssc-btn-mini dssc-btn-green mt10" uri="<?php echo url('Sellerorder/change_state',['state_type'=>'spay_price','order_sn'=>$order['order_sn'],'order_id'=>$order['order_id']]); ?>" dialog_width="480" dialog_title="<?php echo \think\Lang::get('store_order_modify_price'); ?>" ds_type="dialog"  dialog_id="seller_order_adjust_fee" id="order<?php echo $order['order_id']; ?>_action_adjust_fee" /><i class="iconfont">&#xe731;</i><?php echo \think\Lang::get('store_order_modify_price'); ?></a></p>
                <?php endif; ?>

                <!-- 发货 -->
                <?php if($order['if_send']): if(!isset($order['pintuanorder_state']) || $order['pintuanorder_state']==2): ?>
                <p><a class="dssc-btn dssc-btn-green mt10" href="<?php echo url('Sellerdeliver/send',['order_id'=>$order['order_id']]); ?>"/><i class="iconfont">&#xe6f1;</i><?php echo \think\Lang::get('store_order_send'); ?></a></p>
                <?php endif; endif; if(isset($order['pintuanorder_state'])): ?>
                <p><?php echo $order['pintuanorder_state_text']; ?></p>
                <?php endif; ?>

                <!-- 锁定 -->
                <?php if($order['if_lock']): ?>
                <p><?php echo \think\Lang::get('refund_return_goods'); ?></p>
                <?php endif; ?>
            </td>
            <?php endif; ?>
            <!-- E 合并TD -->
        </tr>

        <!-- S 赠品列表 -->
        <?php if(!empty($order['zengpin_list']) && $i == count($order['goods_list'])): ?>
        <tr>
            <td class="bdl"></td>
            <td colspan="4" class="tl"><div class="dssc-goods-gift"><?php echo \think\Lang::get('store_order_gifts'); ?>：
                    <ul>
                        <?php if(is_array($order['zengpin_list']) || $order['zengpin_list'] instanceof \think\Collection || $order['zengpin_list'] instanceof \think\Paginator): if( count($order['zengpin_list'])==0 ) : echo "" ;else: foreach($order['zengpin_list'] as $key=>$zengpin_info): ?>
                        <li>
                            <a title="<?php echo \think\Lang::get('store_order_gifts'); ?>：<?php echo $zengpin_info['goods_name']; ?> * <?php echo $zengpin_info['goods_num']; ?>" href="<?php echo $zengpin_info['goods_url']; ?>" target="_blank"><img src="<?php echo goods_thumb($zengpin_info,240); ?>" /></a>
                        </li>
                    </ul>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </div></td>
        </tr>
        <?php endif; ?>
        <!-- E 赠品列表 -->
        
        <?php }} } else { ?>
        <tr>
            <td colspan="20" class="norecord"><div class="warning-option"><i class="iconfont">&#xe64c;</i><span><?php echo \think\Lang::get('no_record'); ?></span></div></td>
        </tr>
        <?php } ?>
    </tbody>
    <tfoot>
        <?php if(!(empty($order_list) || (($order_list instanceof \think\Collection || $order_list instanceof \think\Paginator ) && $order_list->isEmpty()))): ?>
        <tr>
            <td colspan="20"><?php echo $show_page; ?></td>
        </tr>
        <?php endif; ?>
    </tfoot>
</table>
















<script type="text/javascript">
    $(function () {
        $('#query_start_date').datepicker({dateFormat: 'yy-mm-dd'});
        $('#query_end_date').datepicker({dateFormat: 'yy-mm-dd'});
        $('.checkall_s').click(function () {
            var if_check = $(this).prop('checked');
            $('.checkitem').each(function () {
                if (!this.disabled)
                {
                    $(this).prop('checked', if_check);
                }
            });
            $('.checkall_s').prop('checked', if_check);
        });
        $('#skip_off').click(function () {
            url = location.href.replace(/&skip_off=\d*/g, '');
            window.location.href = url + '&skip_off=' + ($('#skip_off').prop('checked') ? '1' : '0');
        });
    });
</script>



        </div>
    </div>
</div>
<?php if(\think\Config::get('node_site_use') == '1' && !isset($wait) && request()->controller() != 'Payment' && request()->controller() != 'Showgroupbuy'): ?>
<?php echo get_chat(); endif; ?>
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.cookie.js"></script>
<script src="<?php echo HOME_SITE_ROOT; ?>/js/compare.js"></script>
<link rel="stylesheet" href="<?php echo PLUGINS_SITE_ROOT; ?>/perfect-scrollbar.min.css">
<script src="<?php echo PLUGINS_SITE_ROOT; ?>/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/js/qtip/jquery.qtip.min.js"></script>
<link href="<?php echo PLUGINS_SITE_ROOT; ?>/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo PLUGINS_SITE_ROOT; ?>/jquery.lazyload.min.js"></script>
<script>
    //懒加载
    $("img.lazyload").lazyload({
//        placeholder : "<?php echo HOME_SITE_ROOT; ?>/images/loading.gif",
        effect: "fadeIn",
        skip_invisible : false,
        threshold : 200,
    });
</script>
<div class="footer-info">
    <div class="links w1200">
        <?php foreach($navs['footer'] as $nav): ?>
        <a href="<?php echo $nav['nav_url']; ?>" <?php if($nav['nav_new_open'] == 1): ?>target="_blank"<?php endif; ?>><?php echo $nav['nav_title']; ?></a>|
        <?php endforeach; ?>
    </div>
    <p class="copyright"><?php echo \think\Config::get('flow_static_code'); ?></p>
</div>

