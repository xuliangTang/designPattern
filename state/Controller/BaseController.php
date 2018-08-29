<?php
require __DIR__.'/../Store/State.php';
require __DIR__.'/../Store/Action.php';

/**
 * Base控制器
 */
class BaseController {
    private $state = false;
    private $action = false;

    public function __construct() {
        $this->state = new State(); // 实例化对象
        $this->action = new Action();
    }

    public function __get($name) {  // 返回实例化的State/Action对象
        // TODO: Implement __get() method.
        switch ($name) {
            case 'State':
                return $this->state;
                break;
            case 'Action':
                return $this->action;
                break;
        }
    }
}

set_error_handler(function($errno,$errstr,$errfile,$errline, $errcontext){
    echo '<h3>Error:</h3>'.$errstr;
},E_USER_NOTICE);