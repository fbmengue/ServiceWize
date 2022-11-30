<?php

namespace controller;

use model\Cadastro;

class CadastroContr extends Cadastro
{
    private $firstName;
    private $lastName;
    private $pwd;
    private $pwdRepeat;
    private $email;
    private $mobile;

    public function __construct($firstName, $lastName, $pwd, $pwdRepeat, $email, $mobile)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
        $this->mobile = $mobile;
    }

    public function cadastroUtilizador()
    {
        if ($this->campoVazio() == false) {
            echo '<div class="alert alert-danger">Complete All Fields</div>';
            exit();
        }
        if ($this->utilizadorinvalido() == false) {
            echo '<div class="alert alert-danger">Invalid User Name</div>';
            exit();
        }
        if ($this->invalidoEmail() == false) {
            echo '<div class="alert alert-danger">Invalid Email</div>';
            exit();
        }


        if ($this->senhaMatch() == false) {
            echo '<div class="alert alert-danger">Password Do Not Match</div>';
            exit();
        }
        if ($this->utilizadorIDCheck() == false) {
            echo '<div class="alert alert-danger">User Already Registered</div>';
            exit();
        }

        $this->setUtilizador($this->firstName, $this->lastName, $this->pwd, $this->email, $this->mobile);
    }
 //empty($this->nome) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)
    private function campoVazio()
    {
        $result = true;
        if (
            empty($this->firstName) || empty($this->pwd) || empty($this->lastName) ||
            empty($this->pwdRepeat) || empty($this->email)
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function utilizadorinvalido()
    {
        $result = false;
        if (!preg_match('/^[a-zA-Z\s]+$/', $this->firstName) || !preg_match('/^[a-zA-Z\s]+$/', $this->lastName)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function invalidoEmail()
    {
        $result = false;
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function senhaMatch()
    {
        $result = false;
        if ($this->pwd !== $this->pwdRepeat) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function utilizadorIDCheck()
    {
        $result = false;
        if (!$this->verificaUtilizador($this->email)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
}