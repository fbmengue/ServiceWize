<?php

namespace controller;

use model\Professional;

class ProfessionalContr extends Professional
{
    public function __construct()
    {
    }

    public function addProfessional($fullName, $email)
    {

        if ($this->campoVazio($fullName, $email) == false) {
            header("location:../../index.php?page=register&error=campovazio");
            exit();
        }

        $this->setProfessional($fullName, $email);
    }

    private function campoVazio($fullName, $email)
    {
        $result = true;
        if (
            empty($fullName) || empty($email)
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function getProfessionalList()
    {
        $results = $this->getProfessional();
        return $results;
    }
}
