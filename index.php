<?php

use classes\Task;

//require ('/home/p/po4talewai2/test.learn-point.ru/1449277-task-force-1/classes/Task.php');

/*define('CLASS_DIR', 'class/');
    set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
    spl_autoload_extensions('.task.php');
    spl_autoload_register();*/


$new = new Task(1,1,1);

// попытка вызвать метод
print_r($new->getActions());
echo '</br></br>';
print_r($new->userActions('executor','new'));
