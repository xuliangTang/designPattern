<?php

/**
 * Class State
 * 实现统一的存储仓库
 */
class State implements Iterator {
    public $modules = false;
    public $roots = false;
    public $pos=-1; // 初始状态为-1.只有设置了configIterator方法后才能进行循环
    public $iterator_data=[];   // 如果要循环自身 时的数据。默认是空的

    public function __construct() {
        $this->modules = new class() {};
        $this->roots = new class() {};
    }

    // 设置自循环内容
    function configIterator($module="",$key)
    {
        if(trim($key)=="") return ; // key 必须有值
        if(!$module || trim($module)=="")   // 说明要循环的是根节点
        {
            if(isset($this->roots->$key))
            {
                $this->pos = 0;
                $this->iterator_data=$this->roots->$key;
            }
        }
        else if(isset($this->modules->$module) && isset($this->modules->$module->$key)) // 说明要循环的是 模块节点
        {
            $this->pos = 0;
            $this->iterator_data=$this->modules->$module->$key;
        }
    }

    // 新增一条数据
    public function setState(...$states) {
        if(count($states) == 3) {
            // 0=模块名 1=key 2=value
            $prop = $states[0];
            if(!isset($this->modules->$prop)) {  // 如果modules存在该表名
                $this->modules->$prop = (object)[$states[1]=>$states[2]];
            } else {    // 不存在
                $key = $states[1];
                $this->modules->$prop->$key = $states[2];
            }
        }elseif(count($states) == 2) {
            // 使用根节点 0=key 1=value
            $prop = $states[0];
            $this->roots->$prop = $states[1];
        }
    }

    /**
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        // TODO: Implement current() method.
        return $this->iterator_data[$this->pos];
    }

    /**
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        // TODO: Implement next() method.
        $this->pos++;
    }

    /**
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        // TODO: Implement key() method.
        return $this->pos;
    }

    /**
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        // TODO: Implement valid() method.
        if($this->pos<0) return false;
        return isset($this->iterator_data[$this->pos]);
    }

    /**
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
        $this->pos = 0;
    }
}