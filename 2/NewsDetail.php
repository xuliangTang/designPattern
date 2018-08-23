<?php

require 'INews.php';
require 'IPlugin.php';

/**
 * 新闻主体类，被观察者
 * Class NewsDetail
 */
class NewsDetail implements INews {
    public $news_data;
    public $news_id=0;
    public $plugs=[];   // 用来保存插件
    public function __construct($newsid) // 伪方法，用来演示根据ID，获取某条新闻
    {
        //这里假设有一堆新闻是从数据库取的
        $newsFromDataBase=[
            ["news_id"=>"101","news_title"=>"Android最佳的开源库集锦","news_content"=>"工欲善其事，必先利其器。一个好的开发库可以快速提高开发者的工作效率，甚至让开发工作变得简单。本文收集了大量的Android开发库，快来切磋一下，到底哪一个最适合你。"],
            ["news_id"=>"102","news_title"=>"Javascript里常见的事件位置属性","news_content"=>"pageX指鼠标在页面上的位置，以页面左侧为参考点clientX指可视区域内离左侧的距离，以滚动条滚动到的位置为参考点。各个浏览器相同"],
        ];
        $this->news_id=$newsid; //把参数ID保存到 类变量中
        $this->news_data=$newsFromDataBase;

        // 注册新闻点击插件
        /*$newsClickPlugin = new NewsClickPlugin();
        $this->regPlugin($newsClickPlugin);*/

        // 扫描注册 plugins 目录下的所有插件
        $this->scanPlugins();
    }

    private function getNews() //伪方法，用来演示根据ID，获取某条新闻
    {
        foreach($this->news_data as $news)
        {
            if($news["news_id"]==$this->news_id)
                return $news;
        }
    }
    private function scanPlugins() // 扫描插件
    {
        $plugins_dir = __DIR__.'/plugins/';
        $plugins = new FilesystemIterator($plugins_dir);
        foreach ($plugins as $k => $plugin) {   // 扫描目录
            $get_name = $plugin->getFilename(); // 获取文件名
            if(is_file($plugins_dir.$get_name)) {
                require $plugins_dir.$get_name;    // 引入插件
                $objClass = basename($get_name, '.php');
                $pluginObj = new $objClass($this);  // ***插件如果不实现IPlugin接口，则必须在构造方法中主动调用 NewsDetail->regPlugin() 注册***
                if(is_subclass_of($pluginObj, 'IPlugin'))
                    $this->regPlugin($pluginObj);   // ***插件实现了IPlugin接口，被观察者主动注册插件***
            }
        }
    }

    public function display()   // 渲染
    {
        $get_news=$this->getNews();
        //下面的代码 是模拟假设加载了模板，根据数据输出内容
        echo "<h2>".$get_news["news_title"]."</h2>";
        echo "<div>".$get_news["news_content"]."</div>";

        // 插件调用
        foreach ($this->plugs as $plug) {
            $plug->display($this->news_id);
        }
    }

    // 注册插件
    public function regPlugin(IPlugin $plugin)
    {
        // TODO: Implement regPlugin() method.
        $this->plugs[strval($plugin)] = $plugin;
    }

    // 移除插件
    public function unRegPlugin(IPlugin $plugin)
    {
        // TODO: Implement unRegPlugin() method.
        unset($this->plugs[strval($plugin)]);
    }
}