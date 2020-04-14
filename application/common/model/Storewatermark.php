<?php

namespace app\common\model;

use think\Model;

/**
 * ============================================================================
 * DSMall多用户商城
 * ============================================================================
 * 版权所有 2014-2028 长沙德尚网络科技有限公司，并保留所有权利。
 * 网站地址: http://www.csdeshang.com
 * ----------------------------------------------------------------------------
 * 这不是一个自由软件！您只能在不用于商业目的的前提下对程序代码进行修改和使用 .
 * 不允许对程序代码以任何形式任何目的的再发布。
 * ============================================================================
 * 数据层模型
 */
class Storewatermark extends Model {

   
    /**
     * 根据店铺id获取水印
     * @access public
     * @author csdeshang
     * @param int $store_id 店铺ID
     * @return type
     */
    public function getOneStorewatermarkByStoreId($store_id) {
        $wm_arr = db('storewatermark')->where('store_id',$store_id)->find();
        return $wm_arr;
    }

    /**
     * 新增水印
     * @access public
     * @author csdeshang
     * @param array $data 参数内容
     * @return bool 布尔类型的返回结果
     */
    public function addStorewatermark($data) {
        return db('storewatermark')->insertGetId($data);
    }

    /**
     * 更新水印
     * @access public
     * @author csdeshang
     * @param array $data 更新数据
     * @return bool 布尔类型的返回结果
     */
    public function editStorewatermark($wm_id,$data) {
        return db('storewatermark')->where('swm_id',$wm_id)->update($data);
    }

    /**
     * 删除水印
     * @access public
     * @author csdeshang
     * @param int $id 记录ID
     * @return bool 布尔类型的返回结果
     */
    public function delStorewatermark($condition) {
        return db('storewatermark')->where($condition)->delete();
    }

}
