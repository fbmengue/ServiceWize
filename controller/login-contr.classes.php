<?php

namespace controller;

use model\Login;

class LoginContr extends Login
{
    private $email;
    private $pwd;

    public function __construct($email, $pwd)
    {
        $this->email = $email;
        $this->pwd = $pwd;
    }

    public function loginUtilizador()
    {
        if ($this->campoVazio() == false) {
            echo '<div class="alert alert-danger">Complete All Fields</div>';
            exit();
        }
        // if (is_numeric($this->userID)) {
        //     return "usuario é numero";
        // } else {
        $this->getUtilizador($this->email, $this->pwd);
    }
 //empty($this->userID) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)
    private function campoVazio()
    {
        $result = true;
        if (empty($this->email) || empty($this->pwd)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}