<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/20
 * Time: 14:49
 */

/**
 * 数据中心类
 * Class ProductDataCenter
 */
class ProductDataCenter {

    // 商品列表
    private static $objList = [];

    // 新增
    public static function set($k, $v) {
        self::$objList[$k] = $v;
    }

    // 删除
    public static function remove($k) {
        unset(self::$objList[$k]);
    }
    public static function removeAll() {
        self::$objList = [];
    }

    // 使用数据中心类执行 IProduct 接口下所有类的方法
    public static function __callStatic($name, $arguments)
    {
        // TODO: Implement __callStatic() method.
        $res = [];
        foreach (self::$objList as $k => $v) {
            $tmp_res = call_user_func_array([$v, $name], $arguments);
            if($tmp_res) {
                $res[] = $tmp_res;
            }
            /*if(method_exists($v, $name)) {
                $tmp_res = $v->$name($arguments);
                if($tmp_res) {
                  $res[] = $tmp_res;
                }
            }*/
        }
        return $res;
    }
}