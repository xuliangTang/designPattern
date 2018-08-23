<?php

/**
 * 专题实体类
 * Class subject
 */
class subject {
    public $content;
    public $state;  // state标号，和manger中state对应

    public function __construct($content, $state) {
        $this->content = $content;
        $this->state = $state;
    }

    // 保存
    public function save() {
        file_put_contents(__DIR__.'/subject.json', json_encode($this));
        echo '文案创建成功';
    }
}