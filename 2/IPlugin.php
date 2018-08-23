<?php

/**
 * 插件接口，观察者
 * Interface IPlugin
 */
interface IPlugin {
    public function display($newsId);   // 插件渲染
    public function __toString();   // toString，记录插件名称key
}