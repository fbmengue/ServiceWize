<?php

namespace controller;

use model\Service;

class ServiceContr extends Service
{
    public function __construct()
    {
    }

    public function addService($name, $duration, $price, $professionalID)
    {
        if ($this->campoVazio($name, $duration, $price, $professionalID) == false) {
            header("location:../../index.php?page=register&error=campovazio");
            exit();
        }


        $this->setService($name, $duration, $price, $professionalID);
    }

    public function addMyServiceProfessional($name, $duration, $price, $userEmail)
    {
        if ($this->campoVazio($name, $duration, $price, $userEmail) == false) {
            header("location:../../index.php?page=register&error=campovazio");
            exit();
        }

        $this->setMyService($name, $duration, $price, $userEmail);
    }

    private function campoVazio($name, $duration, $price, $professionalID)
    {
        $result = true;
        if (
            empty($name) || empty($duration) || empty($price) || empty($professionalID)
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function getServiceList()
    {
        $results = $this->getServices();
        return $results;
    }

    public function getMyServiceList($userEmail)
    {
        $results = $this->getMyServices($userEmail);
        return $results;
    }

    private function multiexplode($delimiters, $string)
    {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
}
