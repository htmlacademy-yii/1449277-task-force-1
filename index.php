<?php

use classes\Task;
spl_autoload_extensions('Task.php');


$new = new Task(1,2,'new');

// попытка вызвать метод
print_r($new->getActions());
echo '</br></br>';
print_r($new->userActions(1));
