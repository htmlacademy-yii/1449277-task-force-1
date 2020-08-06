<?php

use src\business\Task;

/*
 * подключаем vendor/autoload.php
 */

require_once __DIR__ . '/vendor/autoload.php';


$new = new Task(1,2,'new');

// попытка вызвать метод
print_r($new->getActions());
echo '</br></br>';
print_r($new->userActions(1));
