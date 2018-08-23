<?php

/**
 *  责任链模式：多步用户注册
 */

require 'userEntity.php';
require 'userReg.php';
require 'userStep1.php';
require 'userStep2.php';
require 'userStep3.php';

session_start();

// 获取当前用户对象
function getUser() {
    if(isset($_SESSION['user']) && $_SESSION['user'])
        return unserialize($_SESSION['user']);
    return new userEntity();    // 返回初始化第一步对象
}

// 清除session
if(isset($_GET["init"]))
{
    unset($_SESSION['user']);
    exit("清除演示session成功");
}
// 查看session
if(isset($_GET["show"]))
{
    var_export($_SESSION);
    exit();
}

if($_POST) {
    $userStep1 = new userStep1();   // 步骤
    $userStep2 = new userStep2();
    $userStep3 = new userStep3();
    $userStep1->setNext($userStep2);    // 设置层级关系
    $userStep2->setNext($userStep3);
    $userStep1->stepNext(getUser());    // 执行下一步
}

// 获取用户状态，step名称对应模板名称
$getUser = getUser();
$tpl = $getUser==null ? 'step1' : $getUser->step;

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
        .table{margin: 20px auto;width:500px}
        .table td{line-height: 28pt;text-align: left;margin-top: 10px}
        .table .text{height:35px;width:100%}
    </style>

</head>
<body>

<div class="container">
    <form method="post">
        <div class="row">
            <h2>用户注册演示界面</h2>
        </div>
        <div class="row">
            <?php
                include("tpl/".$tpl.".html");
            ?>
        </div>
    </form>
</div>

</body>
</html>
