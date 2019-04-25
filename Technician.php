<?php

require_once './User.php';

class Technician extends User {

    public $nationalId;
    public $phone;
    public $city;
    public $district;
    public $street;
    public $workingField;
    public $imageUrl;

    public function __construct($id, $firstName, $lastName, $email, $password, $nationalId, $phone, $city, $district, $street, $workingField) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->nationalId = $nationalId;
        $this->phone = $phone;
        $this->city = $city;
        $this->district = $district;
        $this->street = $street;
        $this->workingField = $workingField;
    }

    public function getImageUrl() {
        return $this->imageUrl;
    }

    public function setImageUrl($imageUrl) {
        $this->imageUrl = $imageUrl;
    }

    public function add() {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $this->password = md5($this->password);
        $array = (array) $this;
        unset($array['id']);
        unset($array['imageUrl']);
        return $connection->insert('technician', $array);
    }

    public function edit($tech_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $array = (array) $this;
        $this->password = md5($this->password);
        unset($array['id']);
        $connection->edit('technician', 'id', $tech_id, $array);
    }

    public static function delete($tech_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $connection->Delete('technician', 'id', $tech_id);
    }

    public static function login($email, $password) {
        try {
            require_once './Artifex.php';
            $password=  md5($password);
            /* @var $connection Artifex */
            $connection = Artifex::getInstance();
            $result = $connection->find_one('technician', 'email', $email);
            if ($password == $result['password']) {
                return $result;
            }
            return false;
        } catch (Exception $ex) {
            $ex = "";
            return false;
        }
    }
    public static function getTechnicianNameById($id) {
        
    }

}
