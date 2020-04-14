<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:79:"/usr/local/var/www/dsmall/public/../application/admin/view/operation/index.html";i:1574757822;s:67:"/usr/local/var/www/dsmall/application/admin/view/public/header.html";i:1574757822;s:72:"/usr/local/var/www/dsmall/application/admin/view/public/admin_items.html";i:1574757822;}*/ ?>
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
                <h3><?php echo \think\Lang::get('ds_operation'); ?></h3>
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
    <div class="operation-tool">
        <div class="mt">
            <?php echo \think\Lang::get('seller_promotion_tool'); ?>
        </div>
        <div class="mc">
            <a href="<?php echo url('Promotionxianshi/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-E9BB5F">&#xe741;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_promotion_xianshi'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_promotion_xianshi_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Promotionmansong/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-79BAD0">&#xe704;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_promotion_mansong'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_promotion_mansong_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Promotionbundling/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-EC7E7F">&#xe732;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_promotion_bundling'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_promotion_bundling_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Promotionbooth/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-86CE86">&#xe6ec;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_promotion_booth'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_promotion_booth_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Groupbuy/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-6C93CD">&#xe70e;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_groupbuy'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_groupbuy_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Vrgroupbuy/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-E9BB5F">&#xe70e;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_groupbuy_vr'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_groupbuy_vr_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Voucher/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-6CCDA5">&#xe727;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_voucher_price_manage'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_voucher_price_manage_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Promotionmgdiscount/mgdiscount_store'); ?>">
                <dl>
                    <dt><i class="iconfont bg-E9BB5F">&#xe6ce;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_promotion_mgdiscount'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_promotion_mgdiscount_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Inviter/setting'); ?>">
                <dl>
                    <dt><i class="iconfont bg-9C6CCD">&#xe6ed;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_inviter_set'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_inviter_set_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Promotionpintuan/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-EC7E7F">&#xe73f;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_promotion_pintuan'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_promotion_pintuan_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Promotionbargain/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-6C93CD">&#xe6af;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_promotion_bargain'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_promotion_bargain_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Activity/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-79BAD0">&#xe713;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_activity_manage'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_activity_manage_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('EditablePage/page_list'); ?>">
                <dl>
                    <dt><i class="iconfont bg-EC7E7F">&#xe672;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('editable_page'); ?></h5>
                        <p><?php echo \think\Lang::get('editable_page'); ?></p>
                    </dd>
                </dl>    
            </a>
        </div>
    </div>
    <div class="operation-tool ">
        <div class="mt">
            <?php echo \think\Lang::get('platform_promotion_tool'); ?>
        </div>
        <div class="mc">
            <a href="javascript:void(0)" onclick="window.parent.openItem('flea,Flea,flea')">
                <dl>
                    <dt><i class="iconfont bg-9C6CCD">&#xe669;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('flea'); ?></h5>
                        <p><?php echo \think\Lang::get('flea_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Bonus/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-79BAD0">&#xe6c1;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_bonus'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_bonus_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Marketmanage/index',['type'=>1]); ?>">
                <dl>
                    <dt><i class="iconfont bg-EC7E7F">&#xe6f6;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_market_1'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_market_1_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Marketmanage/index',['type'=>2]); ?>">
                <dl>
                    <dt><i class="iconfont bg-86CE86">&#xe6f7;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_market_2'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_market_2_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Marketmanage/index',['type'=>3]); ?>">
                <dl>
                    <dt><i class="iconfont bg-E9BB5F">&#xe68c;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_market_3'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_market_3_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Marketmanage/index',['type'=>4]); ?>">
                <dl>
                    <dt><i class="iconfont bg-6CCDA5">&#xe68c;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_market_4'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_market_4_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Pointprod/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-6C93CD">&#xe704;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_pointprod'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_pointprod_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Pointorder/pointorder_list'); ?>">
                <dl>
                    <dt><i class="iconfont bg-6CCDA5">&#xe704;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_pointorder'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_pointorder_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('points/setting'); ?>">
                <dl>
                    <dt><i class="iconfont bg-EC7E7F">&#xe726;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_points_setting'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_points_setting_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Operation/point_signin'); ?>">
                <dl>
                    <dt><i class="iconfont bg-86CE86">&#xe731;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_point_signin'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_point_signin_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
            <a href="<?php echo url('Rechargecard/index'); ?>">
                <dl>
                    <dt><i class="iconfont bg-6CCDA5">&#xe6f4;</i></dt>
                    <dd>
                        <h5><?php echo \think\Lang::get('ds_rechargecard'); ?></h5>
                        <p><?php echo \think\Lang::get('ds_rechargecard_tips'); ?></p>
                    </dd>
                </dl>    
            </a>
        </div>
    </div>
</div>