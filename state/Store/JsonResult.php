<?php
require_once 'Result.php';

/**
 * Class JsonResult
 * 自定义Json数据对象
 */
class JsonResult extends Result {

    public function convert()
    {
        // TODO: Implement convert() method.
        if(is_array($this->initData)) {
            $res['_result'] = $this->res;
            return json_encode(array_merge($this->initData, $res));
        }
        return false;

    }

    public function output()
    {
        // TODO: Implement output() method.
        if($this->data)
            echo $this->data;
    }
}