<?php

namespace controller;

use model\Cadastro;

class CadastroContr extends Cadastro
{
    private $nome;
    private $sobrenome;
    private $pwd;
    private $pwdRepeat;
    private $email;
    private $tel;

    public function __construct($nome, $sobrenome, $pwd, $pwdRepeat, $email, $tel)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
        $this->tel = $tel;
    }

    public function cadastroUtilizador()
    {
        if ($this->campoVazio() == false) {
            header("location:../../index.php?page=register&error=campovazio");
            exit();
        }
        if ($this->utilizadorinvalido() == false) {
            $textMsg = "Utilizador inválido!";
            $display = "falha";
            header("location: ../../index.php?page=register&error=" . $textMsg . "&status=" . $display);
            exit();
        }
        if ($this->invalidoEmail() == false) {
            $textMsg = "Email inválido!";
            $display = "falha";
            header("location: ../../index.php?page=register&error=" . $textMsg . "&status=" . $display);
            exit();
        }


        if ($this->senhaMatch() == false) {
            $textMsg = "Confirmar senha inválido!";
            $display = "falha";
            header("location: ../../index.php?page=register&error=" . $textMsg . "&status=" . $display);
            exit();
        }
        if ($this->utilizadorIDCheck() == false) {
            $textMsg = "Utilizador já registado!";
            $display = "falha";
            header("location: ../../index.php?page=register&error=" . $textMsg . "&status=" . $display);
            exit();
        }

        $this->setUtilizador($this->nome, $this->sobrenome, $this->pwd, $this->email, $this->tel);
    }
 //empty($this->nome) || empty($this->password) || empty($this->passwordRepeat) || empty($this->email)
    private function campoVazio()
    {
        $result = true;
        if (
            empty($this->nome) || empty($this->pwd) || empty($this->sobrenome) ||
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
        if (!preg_match("/^[a-zA-z0-9]*$/", $this->nome)) {
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
