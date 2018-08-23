<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/20
 * Time: 16:04
 */

/**
 * 加载数据模板抽象类，实现了模板方法，定义了算法的骨架。
 * Class ProductLoadTemplate
 */
abstract class ProductLoadTemplate {

    // 获取一个商品总流程
    public function loadData($id, $type) {
        $this->_initialize();
        $this->setClick();
        $this->setLog();
        return new class($id, $type) {
            public function __construct() {
                $data = ['book_id'=>'10003','book_name'=>'PHP Model','book_price'=>60]; // 应该从数据库读取
                foreach ($data as $k => $v) {
                    $this->$k = $v;
                }
            }
        };
    }


    // 初始化方法
    public function _initialize() {
        echo '父类初始化...<br/>';
    }
    abstract public function setClick();    // 设置点击量 子类具体实现
    abstract public function setLog();      // 设置日志 子类具体实现
}