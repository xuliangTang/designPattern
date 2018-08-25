<?php

/**
 * Command角色A
 */
class ConcreateCommand1 implements ICommand {

    // 对哪个Receiver类进行命令处理
    private $receiver;

    // 构造函数传递接收者
    public function __construct(ConcreateReceiver1 $receiver) {
        $this->receiver = $receiver;
    }

    // 必须实现一个命令
    public function exec()
    {
        // 业务处理
        // TODO: Implement exec() method.
        $this->receiver->doA();
    }
}