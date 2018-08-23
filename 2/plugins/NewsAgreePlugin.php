<?php

/**
 * 新闻点赞插件
 * Class NewsAgreePlugin
 */
class NewsAgreePlugin {
    public function __construct(NewsDetail $newsDetail)
    {
        // 主动装载插件，传入匿名类
        $newsDetail->regPlugin(new class implements IPlugin {
            public function display($newsId)
            {
                // TODO: Implement display() method.
                echo '<hr/>';
                echo "新闻{$newsId}点赞+1";
            }

            public function __toString()
            {
                // TODO: Implement __toString() method.
                return 'NewsAgreePlugin';
            }
        });
    }

}