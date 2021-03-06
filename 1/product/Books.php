<?php

/**
 * Class Books
 */
class Books extends ProductLoadTemplate implements IProduct {

    public function getChild($args) {
        return parent::loadData($args[0], 'Books'); // TODO: Change the autogenerated stub
    }

    public function getList() {
        return [
            ['book_id'=>'10001','book_name'=>'Think in Java','book_price'=>90],
            ['book_id'=>'10002','book_name'=>'Think in C++','book_price'=>108],
            ['book_id'=>'10003','book_name'=>'PHP Model','book_price'=>60],
        ];
    }

    // 实现抽象类中的抽象方法，即不同的对象的具体实现细节。

    public function setClick()
    {
        // TODO: Implement setClick() method.
        echo 'Books set click...<br/>';
    }

    public function setLog()
    {
        // TODO: Implement setLog() method.
        echo 'Books set log...<br/>';
    }

    public function _initialize()
    {
        parent::_initialize(); // TODO: Change the autogenerated stub
        echo '重写初始化方法...<br/>';
    }
}