<?php
namespace classes;

class Task
{

    // Статусы
    const STATUS_NEW = 'new'; //новое задание
    const STATUS_CANCELLED = 'cancelled'; // отмененое задание
    const STATUS_WORK = 'work'; // задание в работе
    const STATUS_DONE = 'done'; // задание в выпонено
    const STATUS_FAILED = 'failed'; // задание провалено


    // Действия
    const ACTION_ANSWER = 'answer'; // действие исполнителя "откликнуться"
    const ACTION_CANCEL = 'cancel'; // действие заказчика "отменить задание"
    const ACTION_DONE = 'done'; // действие заказчика "подтвердить выполнение"
    const ACTION_REFUSE = 'refuse'; // действие исполнителя "Отказаться"


    // список возможных действий с задачами
    public $actions = [
        'answer' => 'Откликнуться',
        'cancel' => 'Отменить',
        'done' => 'Выполнено',
        'refuse' => 'Отказаться',
    ];

    // список статусов задачи
    public $statuses = [
        'new' => 'Новое',
        'cancelled' => 'Отмененное',
        'work' => 'В работе',
        'done' => 'Выполнено',
        'failed' => 'Провалено',
    ];


    // id исполнителя
    public $executor_id;

    // id заказчика
    public $customer_id;

    // id текущего статуса
    public $state;


    public function __construct($executor_id, $customer_id, $state)
    {
        $this->executor_id = $executor_id;
        $this->customer_id = $customer_id;
        $this->state = $state;
    }


    // Метод возвращающий карту статусов и действий
    public function getMap($param){

        if ($param == 'status') {
            return $this->statuses;
        }elseif ($param == 'action') {
            return $this->actions;
        }else {
            return 'Запрос не обработан(';
        };

    }




    // Метод возвращающий следующий статус задачи, принимает текущий статус и действие пользователя
    public function nextStatus($status, $action){

        if ($status == self::STATUS_NEW){
            if ($action == self::ACTION_ANSWER){
                return self::STATUS_WORK;
            }elseif ($action == self::ACTION_CANCEL){
                return self::STATUS_CANCELLED;
            }
        }

        if ($status == self::STATUS_WORK) {
            if ($action == self::ACTION_DONE){
                return self::STATUS_DONE;
            }elseif ($action == self::ACTION_REFUSE){
                return self::STATUS_FAILED;
            }
        }
        
    }

    

}

//объявляем класс
$new = new Task(1,1,1);

// попытка вызвать метод
print_r($new->getMap('action'));
echo '</br></br>';
print_r($new->nextStatus('work','refuse'));
