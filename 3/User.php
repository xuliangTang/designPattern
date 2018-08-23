<?php
class User   // 我们站在User这个类来看问题
{
    public $user_id = 0;
    public $user_name = "guest";
    public $delegator = null;   // 委托者

    function getDiscount()  // 获取折扣
    {
        return 1;   // 没有折扣
    }

    // 动态执行委托者获取折扣方法（假设不同委托对象该方法的方法名无法统一，即无法实现统一接口）
    function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
        if($this->delegator!=null)
        {
            return call_user_func_array([$this->delegator,$name], $arguments);
        }
        return false;
    }

}