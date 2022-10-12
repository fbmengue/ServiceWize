<?php

namespace controller;

use model\Appointment;

class AppointmentContr extends Appointment
{
    public function __construct()
    {
    }

    public function addAppointment($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice)
    {
        if ($this->campoVazio($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice) == false) {
            header("location:../../index.php?page=register&error=campovazio");
            exit();
        }

        $this->setAppointment($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);
    }



    private function campoVazio($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice)
    {
        $result = true;
        if (
            empty($clientID) || empty($professionalID)
            || empty($serviceID) || empty($appointmentDate)
            || empty($appointmentStartTime) || empty($appointmentEndTime)
            || empty($serviceDuration) || empty($servicePrice)
        ) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    public function addClientAndAppointment($fullName, $birthDate, $email, $mobile, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice)
    {
        $this->setClientAndAppointment($fullName, $birthDate, $email, $mobile, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);
    }

    public function addClientAndAppointmentForClient($fullName, $birthDate, $email, $mobile, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice)
    {
        if (
            empty($fullName) || empty($birthDate) || empty($email) || empty($mobile)
            || empty($professionalID) || empty($serviceID) || empty($appointmentDate) || empty($appointmentStartTime)
            || empty($appointmentEndTime) || empty($serviceDuration) || empty($servicePrice)
        ) {
            header("location: ../../../index.php?page=home&error=campovazio");
            exit();
        }
        $this->setClientAndAppointment($fullName, $birthDate, $email, $mobile, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);
    }



    public function getAppointmentsPerDayList()
    {
        $results = $this->getAppointmentsPerDay();

        return $results;
    }
    public function getMyAppointmentsPerDayList($userEmail)
    {


        $results = $this->getMyAppointmentsPerDay($userEmail);

        return $results;
    }

    public function getAppointmentListByDate($date)
    {
        $results = $this->getAppointmentsDate($date);

        return $results;
    }

    public function getMyAppointmentListByDate($date, $userEmail)
    {

        $results = $this->getMyAppointmentsDate($date, $userEmail);

        return $results;
    }

    public function getProfessionalIDByEmail($email)
    {
        $results = $this->getProfessionalID($email);

        return $results;
    }

    public function getAppointmentList()
    {
        $results = $this->getAppointments();
        return $results;
    }


    public function getASCQuantity()
    {

        $results = $this->getAppointmentsServicesClients();
        return $results;
    }
    public function getMyASCQuantity($userEmail)
    {

        $results = $this->getMyAppointmentsServicesClients($userEmail);
        return $results;
    }
}
