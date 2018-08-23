<?php

/**
 * 用户注册抽象类
 * Class userReg
 */
abstract class userReg {
    public $step;   // 注册链标识
    public $next;
    public $last;

    // 设置链层级关系
    public function setNext(userReg $user) {
        $this->next = $user;
        $user->last = $this;
    }

    // 执行下一步
    public function stepNext(userEntity $user) {
        if($this->step == $user->step) {
            // 如果还有下一步，更新其状态
            if(isset($this->next) && $this->next) {
                $user->step = $this->next->step;
                return $user;
            }
        } else {
            // 交由下一层处理
            if(isset($this->next) && $this->next)
                $this->next->stepNext($user);
        }
    }

}