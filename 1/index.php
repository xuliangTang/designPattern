<?php

/**
 *  工厂模式、数据中心模式、模板模式
 */

require 'product/ProductFactory.php';

// 获取总列表
ProductFactory::addProduct(['Books', 'Wine', 'Dogs']);
echo '商品列表：Books、Wine、Dogs<br/>';
var_export(ProductDataCenter::getList());
echo '<hr/>';
echo '删除商品列表：Wine<br/>';
ProductDataCenter::remove('Wine');
var_export(ProductDataCenter::getList());
echo '<hr/>';


// 获取一条记录执行的流程
ProductDataCenter::removeAll(); // 清空数据中心
ProductFactory::addProduct(['Books']);
echo '获取Books一条记录：<br/>';
var_export(ProductDataCenter::getChild(1003));


