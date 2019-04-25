<?php

abstract class User {
    public $id;
    public $firstName;
    public $lastName;
    public $email;
    public $password;
    
    public static abstract function login($email, $password);
}

