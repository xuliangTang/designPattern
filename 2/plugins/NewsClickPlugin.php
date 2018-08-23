<?php

/**
 * 新闻点击量插件
 * Class NewsClickPlugin
 */
class NewsClickPlugin  implements IPlugin{
    public function display($newsId)
    {
        // TODO: Implement display() method.
        echo '<hr/>';
        echo "新闻{$newsId}点击+1";
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return 'NewsClickPlugin';
    }
}