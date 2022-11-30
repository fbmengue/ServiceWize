<?php

namespace controller;

use model\Admin;
use model\Client;

class AdminContr extends Admin
{
    public function __construct()
    {
    }

    public function getAdminSetupData($adminSetupSelect, $clientEmail, $appointmenteDate, $appointmenteCanceled, $appointmenteProfessional)
    {

        if ($adminSetupSelect === 'professionals') {
            $results =  $this->getAdminSetupProfessional();
        }

        if ($adminSetupSelect === 'clients') {
            $results =  $this->getAdminSetupClients();
        }
        if ($adminSetupSelect === 'services') {
            $results =  $this->getAdminSetupServices();
        }
        if ($adminSetupSelect === 'appointments') {
            $results = $this->getAdminSetupAppointments();
        }
        if ($adminSetupSelect === 'appointmentFilter') {
            $results = $this->getAdminSetupAppointmentsFilter($clientEmail, $appointmenteDate, $appointmenteCanceled, $appointmenteProfessional);
        }


        //$results = $this->getAdminSetup($appointmentID, $userEmail, $appointmentDate);

        return $results;
    }

    public function setAdminSetupDataProfessional($professionalID, $professionalFullName, $professionalEmail)
    {
        $this->setAdminSetupProfessional($professionalID, $professionalFullName, $professionalEmail);
    }
    public function setAdminSetupDataClient($clientID, $clientFullName, $clientEmail, $clientBirthDate, $clientMobile)
    {
        $this->setAdminSetupClient($clientID, $clientFullName, $clientEmail, $clientBirthDate, $clientMobile);
    }
    public function setAdminSetupDataService($serviceID, $serviceName, $serviceDuration, $servicePrice, $professionalID, $professionalEmail)
    {
        $this->setAdminSetupService($serviceID, $serviceName, $serviceDuration, $servicePrice, $professionalID, $professionalEmail);
    }
    public function setAdminSetupDataAppointment(
        $appID,
        $appDate,
        $appStartTime,
        $appEndTime,
        $appCanceled,
        $clientID,
        $clientFullName,
        $clientEmail,
        $clientBirthDate,
        $clientMobile,
        $professionalID,
        $professionalFullName,
        $professionalEmail,
        $serviceID,
        $serviceName,
        $serviceDuration,
        $servicePrice
    ) {
        $this->setAdminSetupAppointment(
            $appID,
            $appDate,
            $appStartTime,
            $appEndTime,
            $appCanceled,
            $clientID,
            $clientFullName,
            $clientEmail,
            $clientBirthDate,
            $clientMobile,
            $professionalID,
            $professionalFullName,
            $professionalEmail,
            $serviceID,
            $serviceName,
            $serviceDuration,
            $servicePrice
        );
    }

    public function deleteAdminSetupDataProfessional($professionalID)
    {
        $this->deleteAdminSetupProfessional($professionalID);
    }
    public function deleteAdminSetupDataClient($clientID)
    {
        $this->deleteAdminSetupClient($clientID);
    }
    public function deleteAdminSetupDataService($serviceID)
    {
        $this->deleteAdminSetupService($serviceID);
    }
    public function deleteAdminSetupDataAppointment($appID)
    {
        $this->deleteAdminSetupAppointment($appID);
    }
}