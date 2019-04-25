<?php

class Operation {

    public $id;
    public $customerId;
    public $technicianId;
    public $note;
    public $date;

    function __construct($id, $customerId, $technicianId, $note, $date) {
        $this->id = $id;
        $this->customerId = $customerId;
        $this->technicianId = $technicianId;
        $this->note = $note;
        $this->date = $date;
    }

    public function add() {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $array = (array) $this;
        unset($array['id']);
        return $connection->insert('operation', $array);
    }

    public function edit($operation_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $array = (array) $this;
        unset($array['id']);
        $connection->edit('operation', 'id', $operation_id, $array);
    }

    public static function delete($operation_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $connection->Delete('operation', 'id', $operation_id);
    }
}
