<?php
require 'BaseController.php';
require __DIR__.'/../Store/JsonResult.php';
require __DIR__.'/../Store/StringResult.php';

/**
 * 主控制器
 */
class IndexController extends BaseController {

    public function __construct() {
        parent::__construct();
        $this->Action->then(function ($data){
            return new JsonResult(1, ['code'=>11001,'msg'=>'环境检测通过'],1);
        });
    }


    /**
     *  index 操作方法
     */
    public function index() {
        $newsData = [
            ['news_title'=>'Test News1', 'news_desc'=>'Test News Desc1...'],
            ['news_title'=>'Test News2', 'news_desc'=>'Test News Desc2...'],
            ['news_title'=>'Test News3', 'news_desc'=>'Test News Desc3...'],
        ];
        $this->State->setState('news','newsList',$newsData);
        $this->State->setState('siteTitle','hello - txl');
        include __DIR__.'/../View/index.html';
    }

    /**
     *  review 操作方法
     */
    public function review() {
        $this->Action->then(function ($data){
            $res = json_decode($data);
            if($res->_result == 1) {
                return new JsonResult(1, ['task_id'=>1120,'task_title'=>'测试标题！'],0);
            }

        })->then(function ($data){
            $res = json_decode($data);
            if($res->_result == 1) {
                 echo '<br/>Redis存储成功. databases结果为：'.$res->task_title;
            }else {
                // trigger_error('Redis存储失败');
                echo '<br/>Redis存储失败';
            }

        })->commit('JsonResult');



        /*foreach ($this->Action->commit() as $item) {
            if(is_array($item))
                var_export($item);
            else
                echo $item;
            echo '<br/>';
        }*/

    }
}