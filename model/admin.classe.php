<?php

namespace model;

use COM;
use model\Database;
use PDO;
use PDOException;

class Admin extends Database
{
    protected function getAdminSetupProfessional()
    {
        $stmt = $this->connect()->prepare('SELECT * from professional;');

        $appointmentCanceled = 0;


        if (!$stmt->execute([])) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }
    protected function getAdminSetupClients()
    {
        $stmt = $this->connect()->prepare('SELECT *, date_format(clientBirthDate, "%d-%m-%Y") as "birthDate" from client');


        if (!$stmt->execute(array())) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }
    protected function getAdminSetupServices()
    {
        $stmt = $this->connect()->prepare('SELECT *, date_format(serviceTime, "%H:%i") as "time" from service
        INNER JOIN professional ON professional_professionalID=professionalID;');




        if (!$stmt->execute(array())) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }
    protected function getAdminSetupAppointments()
    {
        $stmt = $this->connect()->prepare('SELECT *, date_format(appointmentDuration, "%H:%i") as "appointmentDurationView",
        date_format(appointmentStartTime, "%H:%i") as "appointmentStartTimeView",
        date_format(appointmentEndTime, "%H:%i") as "appointmentEndTimeView",
        date_format(clientBirthDate, "%d-%m-%Y") as "birthDate",
        date_format(appointmentDate, "%d-%m-%Y") as "appointmentDateView" from appointment
                INNER JOIN client ON client_clientID=clientID
                INNER JOIN professional ON professional_professionalID=professionalID
                INNER JOIN service ON service_serviceID=serviceID
                order by appointmentDate DESC;
        ');



        if (!$stmt->execute(array())) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $stmt = null;
        return $results;
    }

    protected function getAdminSetupAppointmentsFilter($clientEmail, $appointmenteDate, $appointmentCanceled, $appointmentProfessional)
    {

        $sql = 'SELECT *, date_format(appointmentDuration, "%H:%i") as "appointmentDurationView",
        date_format(appointmentStartTime, "%H:%i") as "appointmentStartTimeView",
        date_format(appointmentEndTime, "%H:%i") as "appointmentEndTimeView",
        date_format(clientBirthDate, "%d-%m-%Y") as "birthDate",
        date_format(appointmentDate, "%d-%m-%Y") as "appointmentDateView" from appointment
                INNER JOIN client ON client_clientID=clientID
                INNER JOIN professional ON professional_professionalID=professionalID
                INNER JOIN service ON service_serviceID=serviceID ';


        $orderBy = 'order by appointmentDate DESC';

        if ($clientEmail || $appointmenteDate || $appointmentCanceled || $appointmentProfessional) {
            $sql .= "WHERE ";
            $filterValues = array($clientEmail,$appointmenteDate,$appointmentCanceled,$appointmentProfessional);
        }

        $combine = '';
        if ($clientEmail) {
            $sql .= $combine . "clientEmail=? ";
            $combine = 'AND ';
        }
        if ($appointmenteDate) {
            $sql .= $combine . "appointmentDate=? ";
            $combine = 'AND ';
        }
        if ($appointmentCanceled) {
            $sql .= $combine . "appointmentCanceled=? ";
            $combine = 'AND ';
        }
        if ($appointmentProfessional) {
            $sql .= $combine . "professionalID=? ";
            $combine = 'AND ';
        }



        $stmt = $this->connect()->prepare($sql);
        // AND appointmentCanceled="" AND professionalID=""
        $arrayValue = [];
        for ($count = 0; $count < count($filterValues); $count++) {
            if ($filterValues[$count]) {
                array_push($arrayValue, $filterValues[$count]);
            }
        }




        if (!$stmt->execute($arrayValue)) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $stmt = null;
        return $results;
    }


    protected function setAdminSetupProfessional($professionalID, $professionalFullName, $professionalEmail)
    {
        $stmt = $this->connect()->prepare('UPDATE professional
        SET professionalFullName=?, professionalEmail=?
        WHERE professionalID=?
        ');


        if (!$stmt->execute(array($professionalFullName, $professionalEmail,$professionalID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = null;
    }
    protected function setAdminSetupClient($clientID, $clientFullName, $clientEmail, $clientBirthDate, $clientMobile)
    {
        $stmt = $this->connect()->prepare('UPDATE client
        SET clientFullName=?, clientEmail=?, clientBirthDate=?, clientMobile=?
        WHERE clientID=?
        ');

        if (!$stmt->execute(array($clientFullName, $clientEmail, $clientBirthDate, $clientMobile,$clientID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = null;
    }

    protected function setAdminSetupAppointment(
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


        $stmt = $this->connect()->prepare('UPDATE appointment
        SET client_clientID=?, professional_professionalID=?, service_serviceID=?, appointmentDate=?,appointmentStartTime=?,appointmentCanceled=?,appointmentEndTime=? 
        WHERE appointmentID=?
        ');


        if (!$stmt->execute(array($clientID,$professionalID,$serviceID,$appDate,$appStartTime,$appCanceled,$appEndTime,$appID,))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = null;
    }

    protected function setAdminSetupService($serviceID, $serviceName, $serviceDuration, $servicePrice, $professionalID, $professionalEmail)
    {
        $stmt = $this->connect()->prepare('UPDATE service
        SET serviceName=?, serviceTime=?, servicePrice=?, professional_professionalID=?
        WHERE serviceID=?
        ');


        if ($professionalEmail) {
            $stmt2 = $this->connect()->prepare('SELECT professionalID from professional WHERE professionalEmail=?;');

            if (!$stmt2->execute(array($professionalEmail))) {
                $stmt = null;
                echo "Error Mysql";
                exit();
            }
            $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            $professionalID = $results[0]['professionalID'];
        }



        if (!$stmt->execute(array($serviceName, $serviceDuration, $servicePrice, $professionalID,$serviceID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = null;
    }

    protected function deleteAdminSetupProfessional($professionalID)
    {

        $stmt2 = $this->connect()->prepare('SELECT * from appointment WHERE professional_professionalID=?');



        if (!$stmt2->execute(array($professionalID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);



        if (!empty($results)) {
            $stmt = null;
            echo '<div class="alert alert-danger" style="width: 350px;">Could Not Delete!! Professional Has Appointment.</div>';
            exit();
        }

        $stmt4 = $this->connect()->prepare('SELECT professionalEmail FROM professional WHERE professionalID=?;');

        if (!$stmt4->execute(array($professionalID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $results4 = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        $userEmail = $results4[0]['professionalEmail'];

        $stmt5 = $this->connect()->prepare('SELECT userID FROM user WHERE userEmail=?;');

        if (!$stmt5->execute(array($userEmail))) {
            $stmt5 = null;
            echo "Error Mysql";
            exit();
        }

        $results5 = $stmt5->fetchAll(PDO::FETCH_ASSOC);
        $userID = $results5[0]['userID'];

        $stmt3 = $this->connect()->prepare('UPDATE user SET userType=? WHERE userID = ?;');
        $userType = "client";

        if (!$stmt3->execute(array($userType,$userID))) {
            $stmt3 = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = $this->connect()->prepare('DELETE from professional WHERE professionalID=?');


        if (!$stmt->execute(array($professionalID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = null;
    }
    protected function deleteAdminSetupClient($clientID)
    {
        $stmt2 = $this->connect()->prepare('SELECT * from appointment WHERE client_clientID=?');



        if (!$stmt2->execute(array($clientID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);



        if (!empty($results)) {
            $stmt = null;
            echo '<div class="alert alert-danger" style="width: 350px;">Could Not Delete!! Client Has Appointment.</div>';
            exit();
        }



        $stmt = $this->connect()->prepare('DELETE from client WHERE clientID=?');



        if (!$stmt->execute(array($clientID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = null;
    }
    protected function deleteAdminSetupService($serviceID)
    {
        $stmt2 = $this->connect()->prepare('SELECT * from appointment WHERE service_serviceID=?');



        if (!$stmt2->execute(array($serviceID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);



        if (!empty($results)) {
            $stmt = null;
            echo '<div class="alert alert-danger" style="width: 350px;">Could Not Delete!! Service Used in Appointment.</div>';
            exit();
        }

        $stmt = $this->connect()->prepare('DELETE from service WHERE serviceID=?');



        if (!$stmt->execute(array($serviceID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = null;
    }
    protected function deleteAdminSetupAppointment($appID)
    {
        $stmt = $this->connect()->prepare('DELETE from appointment WHERE appointmentID=?');



        if (!$stmt->execute(array($appID))) {
            $stmt = null;
            echo "Error Mysql";
            exit();
        }

        $stmt = null;
    }



    protected function getAdminSetup($appointmentID, $userEmail, $appointmentDate)
    {
        $stmt = $this->connect()->prepare('SELECT *, date_format(appointmentDuration, "%H:%i") as "appointmentTime" from appointment
        INNER JOIN client ON client_clientID=clientID
        INNER JOIN professional ON professional_professionalID=professionalID
        INNER JOIN service ON service_serviceID=serviceID 
        WHERE appointmentID=? and clientEmail=? and appointmentDate=? and appointmentCanceled=?;');




        // print_r($name . "\n");
        // print_r($duration . "\n");
        $appointmentCanceled = 0;


        if (!$stmt->execute(array($appointmentID,$userEmail,$appointmentDate,$appointmentCanceled))) {
            $stmt = null;
            //header("location: ../../../index.php?error=stmtfailed");
            echo "Error Mysql";
            exit();
        }



        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);




        $stmt = null;
        return $results;
    }






    protected function getAppointments()
    {
        $stmt = $this->connect()->prepare('SELECT * from appointment;');

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll();

        $stmt = null;
        return $results;
    }

    protected function getAppointmentsServicesClients()
    {

        $stmt = $this->connect()->prepare('SELECT COUNT(*) serviceID FROM service;');
        $stmt2 = $this->connect()->prepare('SELECT COUNT(*) appointmentID FROM appointment;');
        $stmt3 = $this->connect()->prepare('SELECT COUNT(*) clientID FROM client;');
        $stmt4 = $this->connect()->prepare('SELECT COUNT(*) professionalID FROM professional;');


        if (!$stmt->execute() || !$stmt2->execute() || !$stmt3->execute() || !$stmt4->execute()) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }


        $results1 = $stmt->fetchAll();
        $results2 = $stmt2->fetchAll();
        $results3 = $stmt3->fetchAll();
        $results4 = $stmt4->fetchAll();

        $results = array_merge($results1, $results2, $results3, $results4);

        $stmt = null;
        $stmt2 = null;
        $stmt3 = null;
        $stmt4 = null;
        return $results;
    }
}