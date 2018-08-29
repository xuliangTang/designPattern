<?php

/**
 * 行为类，统一事件收集和输出
 */
class Action {
    public $actions = [];   // 行为集合
    public $lastData = false;   // 上一次行为执行的结果

    public function then(callable $callable) {  // 行为收集
        $this->actions[] = $callable;
        return $this;
    }

    public function commit($resultType=false) {  // 行为统一执行
        foreach ($this->actions as $action) {
            $res = $action($this->lastData);    // 将上一次行为执行的结果传递给下一个行为

            // 返回自定义类型
            if( $resultType && isset($res) && $res instanceof $resultType) {
                if($res->isOutput) $res->output(); // 执行输出
                $this->lastData = $res->data;
                continue;
            }

            $this->lastData = $res;     // 记录
            // yield $res;
        }
    }

}