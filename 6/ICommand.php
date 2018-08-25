<?php

/**
 * 定义命令的统一接口，某些情况下可以直接用来充当Receiver
 */
interface ICommand {
    public function exec();
}