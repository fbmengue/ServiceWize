<?php

namespace controller;

use model\Client;

class ClientContr extends Client
{
    public function __construct()
    {
    }

    public function addClient($fullName, $birthDate, $email, $mobile)
    {
        if ($this->campoVazio($fullName, $birthDate, $email, $mobile) == false) {
            header("location:../../index.php?page=register&error=campovazio");
            exit();
        }

        $this->setClient($fullName, $birthDate, $email, $mobile);
    }

    private function campoVazio($fullName, $birthDate, $email, $mobile)
    {
        $result = true;
        if (
            empty($fullName) || empty($birthDate) || empty($email) || empty($mobile)
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }



    public function getClientList()
    {
        $results = $this->getClients();
        return $results;
    }

    private function multiexplode($delimiters, $string)
    {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
}
