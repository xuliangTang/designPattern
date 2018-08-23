<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/20
 * Time: 14:47
 */

/**
 * 商品接口
 * Interface IProduct
 */
interface IProduct {
    public function getList();  // 获取列表
    public function getChild($args);    // 获取一条记录
}