<?php

/**
 * 委托模式
 */

/*
传统方式：
　　在传统方式下，我们需要判断当前用户是普通用户还是VIP用户或是第三方用户，在分别调用User类中的获取折扣操作。
委托模式：（通过分配或委托至其他对象，委托设计模式能够去除核心对象中的判决和复杂的功能性）
　　在委托模式下，我们将不需要客户端判断用户类型，对客户端来说，是什么用户，设置对应的委托对象，然后调用各自的获取折扣的方法即可，User类动态执行，返回相应操作的操作结果。当我们的操作类型非常多的时候，在客户端用if else判断无疑是很可怕的，再假如我们在很多地方都要有这块判断代码，我们需要对这些地方的判断代码都进行修改(加入后来添加的判断)，而采用委托模式，我们仅仅需要在新添加的地方添加相应需要的类型即可，不需要改动其它地方的客户端代码(很大程度上提高了代码的复用性)。
*/
require ("User.php");
require ("VIPUser.php");
require ("CorUser.php");
require ("Dog.php");

$dog = new Dog();
$user = new User();

$user->delegator = new VIPUser();   // 委托对象VIP用户
echo "VIP用户狗的价格是:".$dog->getPrice() * $user->getVIPDiscount();
echo "<br/>";
$user->delegator = new CorUser();    // 委托对象第三方用户
echo "第三方用户狗的价格是:".$dog->getPrice() * $user->getCorDiscount();

