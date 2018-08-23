<?php

/**
 * 新闻主体接口，被观察者
 * Interface INews
 */
interface INews {
    public function regPlugin(IPlugin $plugin); // 注册插件
    public function unRegPlugin(IPlugin $plugin);   // 注销插件
    public function display();  // 渲染
}