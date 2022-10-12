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

    public function getClientDataListByUserEmail($userEmail)
    {
        $results = $this->getClientDataByUserEmail($userEmail);
        return $results;
    }

    public function getMyClientFutureAppointmentByEmail($userEmail, $todayDate)
    {
        $results = $this->getMyFutureAppointmentByEmail($userEmail, $todayDate);
        return $results;
    }
    public function getMyClientPastAppointmentByEmail($userEmail, $todayDate)
    {
        $results = $this->getMyPastAppointmentByEmail($userEmail, $todayDate);
        return $results;
    }
    public function getMyClientNextAppointmentByEmail($userEmail, $todayDate)
    {
        $results = $this->getMyNextAppointmentByEmail($userEmail, $todayDate);
        return $results;
    }

    public function getClientList()
    {
        $results = $this->getClients();
        return $results;
    }

    public function getMyClientAppointmentCount($userEmail)
    {
        $results = $this->getMyAppointmentsCount($userEmail);
        return $results;
    }

    private function multiexplode($delimiters, $string)
    {

        $ready = str_replace($delimiters, $delimiters[0], $string);
        $launch = explode($delimiters[0], $ready);
        return  $launch;
    }
}
