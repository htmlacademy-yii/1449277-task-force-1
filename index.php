<?php

use classes\Task;

/*
 * подключаем созданный класс для проверки
 */

function my_autoloader($class) {
    include 'classes/Task.php';
}

spl_autoload_register('my_autoloader');



$new = new Task(1,2,'new');

// попытка вызвать метод
print_r($new->getActions());
echo '</br></br>';
print_r($new->userActions(1));
