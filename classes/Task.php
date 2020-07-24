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
        self::ACTION_ANSWER => 'Откликнуться',
        self::ACTION_CANCEL => 'Отменить',
        self::ACTION_DONE => 'Выполнено',
        self::ACTION_REFUSE => 'Отказаться',
    ];

    // список статусов задачи
    public $statuses = [
        self::STATUS_NEW => 'Новое',
        self::STATUS_CANCELLED => 'Отмененное',
        self::STATUS_WORK => 'В работе',
        self::STATUS_DONE => 'Выполнено',
        self::STATUS_FAILED => 'Провалено',
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


    /**
     * Возвращает доступные статусы задач
     */

    public function getStatuses(){
        return $this->statuses;
    }

    /**
     * Возвращает список доступных действий с задачами
     */
    public  function getActions(){
        return $this->actions;
    }




    /**
     * Метод, который вернет следующий статус задачи,
     * если передать текущий статус и действие.
     */
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


    /**
     * Метод, который вернет все доступные действия
     * для переданного пользователя на текущем статусе задачи.
     */
    public function userActions($type_of_user, $status) {
        if ($type_of_user == 'customer'){
            if ($status == self::STATUS_NEW) {
                return "Доступное действия ". self::ACTION_CANCEL;
            }elseif ($status == self::STATUS_WORK){
                return "Доступное действия ". self::STATUS_DONE;
            }else{
                return "Не определено доступное действие для заказчика!";
            }
        }elseif ($type_of_user == 'executor'){
            if ($status == self::STATUS_NEW) {
                return "Доступное действия ". self::ACTION_ANSWER;
            }elseif ($status == self::STATUS_WORK){
                return "Доступное действия ". self::ACTION_REFUSE;
            }else{
                return "Не определено доступное действие для исполнителя!";
            }
        }else{
            return "Роль не определена!";
        }
    }


    

}

