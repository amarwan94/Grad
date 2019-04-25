<?php

require_once './User.php';

class Customer extends User{
    public $phone;
    public $dateOfBirth;
    public function __construct($id, $firstName, $lastName, $email, $password, $phone, $dateOfBirth) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->phone = $phone;
        $this->dateOfBirth = $dateOfBirth;
    }
    public function add() {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $this->password = md5($this->password);
        $array = (array) $this;
        unset($array['id']);
        unset($array['imageUrl']);
        return $connection->insert('customer', $array);
    }
    public function edit($customer_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $array = (array) $this;
        $this->password = md5($this->password);
        unset($array['id']);
        $connection->edit('customer', 'id', $customer_id, $array);
    }
    public static function delete($customer_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $connection->Delete('customer', 'id', $customer_id);
    }

    public static function login($email, $password) {
        try {
            require_once './Artifex.php';
            $password = md5($password);
            /* @var $connection Artifex */
            $connection = Artifex::getInstance();
            $result = $connection->find_one('customer', 'email', $email);
            if ($password == $result['password']) {
                return $result;
            }
            return false;
        } catch (Exception $ex) {
            $ex = "";
            return false;
        }
        
    }

}