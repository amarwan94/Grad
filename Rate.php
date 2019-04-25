<?php
class Rate {
    public $id;
    Public $operationId;
    public $price;
    public $service;
    public $report;
    public $comment;
    function __construct($id, $operationId, $price, $service, $report, $comment) {
        $this->id = $id;
        $this->operationId = $operationId;
        $this->price = $price;
        $this->service = $service;
        $this->report = $report;
        $this->comment = $comment;
    }

    public function add() {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $array = (array) $this;
        unset($array['id']);
        return $connection->insert('rate', $array);
    }
    public function edit($rate_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $array = (array) $this;
        unset($array['id']);
        $connection->edit('rate', 'id', $rate_id, $array);
    }
    public static function delete($rate_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $connection->Delete('rate', 'id', $rate_id);
    } 
}
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

