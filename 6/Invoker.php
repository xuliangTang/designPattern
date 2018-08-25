<?php

/**
 * 调用者Invoker类
 */
class Invoker {
    public function action(...$commands) {  // 依次执行多个命令
        foreach ($commands as $command) {
            if(is_subclass_of($command, 'Icommand'))
                $command->exec();
        }
    }
}