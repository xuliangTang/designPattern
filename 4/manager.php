<?php

/**
 * 领导抽象类
 * Class manager
 */
abstract class manager {
    public $m_state;    // 当前领导state标号
    public $m_name;     // 领导显示名称
    public $m_leader;   // 领导持有对象
    public $subject;    // 专题内容

    public function __construct() {     // 初始化加载专题内容
        $this->subject = json_decode(file_get_contents(__DIR__.'/subject.json'));
    }

    public function setLeader(manager $leader) {    // 设置领导层级关系
        $this->m_leader = $leader;
    }

    // 审批
    public function step($msg) {
        if($this->subject->state == $this->m_state) {
            // 当前流程为自己处理
            if($this->m_leader) {
                // 还有上级处理
                $this->subject->state = $this->m_leader->m_state;    // 设置状态标识
                file_put_contents(__DIR__.'/subject.json', json_encode($this->subject));    // 更新
                echo $msg.'，审批者为：'.$this->m_name;
            } else {
                // 已经处理结束
                echo $msg.'，审批者为：'.$this->m_name.' 审批全部结束';
            }
        } else {
            $this->m_leader->step($msg);    // 交由上级领导处理
        }

    }
}