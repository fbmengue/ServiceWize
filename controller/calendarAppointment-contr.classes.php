<?php

namespace controller;

use model\Appointment;

class CalendarAppointmentContr extends Appointment
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

    public function getAppointmentsPerDayList()
    {
        $results = $this->getAppointmentsPerDay();

        return $results;
    }

    public function getAppointmentListByDate($date)
    {
        $results = $this->getAppointmentsDate($date);

        return $results;
    }

    public function getAppointmentList()
    {
        $results = $this->getAppointments();
        return $results;
    }
}