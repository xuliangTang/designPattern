<?php

/**
 * 责任链模式
 */

require 'subject.php';
require 'manager.php';
require 'oneManger.php';
require 'twoManger.php';
require 'threeManger.php';

if($_POST) {
    if(isset($_POST['createSubject'])) {
        // 初始化 state 为1，和第一个处理的 manger state 对应
        $subject = new subject('文案内容...',1);
        $subject->save();
    }

    if(isset($_POST['step'])) {
        // 创建领导
        $oneManger = new oneManger();
        $twoManger = new twoManger();
        $threeManger = new threeManger();
        // 设置层级关系
        $oneManger->setLeader($twoManger);
        $twoManger->setLeader($threeManger);
        // 审批
        $oneManger->step('审批通过');
    }
}
?>
<html>
<head>
    <style>
        *{marign:0;padding:0}
        .container{width:100%;margin: 0 auto;text-align: center}
        .left{float:left;}
        .right{float:right;}
        .top{margin-top: 60px}
        .btn{width:130px;height:35px;padding:5px;border: solid 1px gray}
        .row{margin-top:20px}
    </style>
</head>
<body>
<div class="container">
    <form method="post">
        <div class="row">
            <h2>流程演示界面</h2>
        </div>
        <div class="row">

        </div>

        <div class="row">
            <div>
                <textarea style="width:500px;height:200px"></textarea>
            </div>
            <div>
                <button class="btn" name="createSubject">编辑MM创建文案</button>
            </div>
        </div>

        <div class="row" style="margin-top: 50px;border-top:solid 1px red">
            <div>
                <button class="btn" name="step">领导审批</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>