<?php

/**
 * Result抽象类
 * 作为Action方法的返回对象，不同返回类型实现不同的数据转换和输出方法
 */
abstract class Result {

    public $res = 0;    // 执行结果，0 失败 1 成功
    public $initData;   // 原始数据
    public $data;   // 转换后的数据
    public $isOutput = false;   // 是否输出

    public function __construct($res=0, $data, $isOutput) {
        $this->res = $res;
        $this->initData = $data;
        $this->data = $this->convert();
        $this->isOutput = $isOutput;
    }

    abstract public function convert(); // 数据转换
    abstract public function output();  // 输出数据
}