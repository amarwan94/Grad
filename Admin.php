<?php

require_once './User.php';
class Admin extends User{
   // public $managementArea;
    public function __construct($id, $firstName, $lastName, $email, $password) {
        $this->id = $id;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
    }
    public function add() {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $this->password = md5($this->password);
        $array = (array) $this;
        unset($array['id']);
        return $connection->insert('admin', $array);
    }
    public function edit($admin_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $array = (array) $this;
        $this->password = md5($this->password);
        unset($array['id']);
        $connection->edit('admin', 'id', $admin_id, $array);
    }
    public static function delete($admin_id) {
        require_once './Artifex.php';
        /* @var $connection Artifex */
        $connection = Artifex::getInstance();
        $connection->Delete('admin', 'id', $admin_id);
    }

    public static function login($email, $password) {
        try {
            require_once './Artifex.php';
            $password = md5($password);
            /* @var $connection Artifex */
            $connection = Artifex::getInstance();
            $result = $connection->find_one('admin', 'email', $email);
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
