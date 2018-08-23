<?php

require 'IProduct.php';
require 'ProductDataCenter.php';
require 'ProductLoadTemplate.php';
/**
 * 工厂类
 * Class ProductFactory
 */
class ProductFactory {

    // 添加一个商品
    public static function addProduct($types) {
        //if($type=='Books') $type="Dogs";
        // 数组传递
        if(is_array($types)) {
            foreach ($types as $type) {
                self::addProductByType($type);
            }
        // 字符串传递
        } elseif(is_string($types)) {
            self::addProductByType($types);
        }
    }

    private static function addProductByType($type) {
        if(!class_exists($type)) {
            require  $type.'.php';
        }
        $obj = false;
        switch ($type) {
            case 'Books':
                $obj = new Books();
                break;
            case 'Dogs':
                $obj = new Dogs();
                break;
            case 'Wine':
                $obj = new Wine();
                break;
        }
        if(is_subclass_of($obj, 'IProduct')) {
            ProductDataCenter::set($type, $obj);
        }
    }
}