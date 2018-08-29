<?php
require_once 'Result.php';

/**
 * Class StringResult
 * 自定义String数据对象
 */
class StringResult extends Result {

    public function convert()
    {
        // TODO: Implement convert() method.
        $ret = new stdClass();
        $ret->message = $this->initData;
        return json_encode($ret);
    }

    public function output()
    {
        // TODO: Implement output() method.
        if($this->data)
            echo $this->data;
    }
}