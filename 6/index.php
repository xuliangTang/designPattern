<?php

/**
 * 命令模式：将请求封装成对象，以便使用不同的请求、日志、队列等来参数化其他对象。命令模式也支持撤销操作。
 */

/*
Receiver接受者角色：该角色就是干活的角色，命令传递到这里是应该被执行的
Command命令角色：需要执行的所有命令都在这里声明
Invoker调用者角色：接收到命令，并执行命令
*/


require 'ICommand.php';
require 'ConcreateReceiver1.php';
require 'ConcreateReceiver2.php';
require 'ConcreateCommand1.php';
require 'ConcreateCommand2.php';
require 'Invoker.php';

$invoker = new Invoker();   // 调用者
$receiver1 = new ConcreateReceiver1();  // 不同命令对应的执行方法
$receiver2 = new ConcreateReceiver2();
$invoker->action(new ConcreateCommand2($receiver2), new ConcreateCommand1($receiver1));  // 依次执行doB、doA命令