<?php

namespace model;

use model\Database;
use PDO;
use PDOException;

class Appointment extends Database
{
    protected function setAppointment($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice)
    {
        $stmt = $this->connect()->prepare('INSERT INTO appointment(client_clientID, professional_professionalID, service_serviceID, appointmentDate, appointmentStartTime, appointmentEndTime,appointmentDuration,appointmentPrice) VALUES (?,?,?,?,?,?,?,?);');
        $stmt2 = $this->connect()->prepare('INSERT INTO professional_has_client(professional_professionalID,client_clientID) VALUES (?,?);');
        $stmt3 = $this->connect()->prepare('SELECT * FROM professional_has_client where professional_professionalID=? AND client_clientID=?;');
        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;
        if (!$stmt3->execute(array($professionalID,$clientID))) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }
        $row = $stmt3->fetchAll();


        if (empty($row)) {
            if (!$stmt2->execute(array($professionalID,$clientID))) {
                $stmt = null;
                $stmt2 = null;
                $stmt3 = null;
                header("location: ../../../index.php?error=stmtfailed");

                exit();
            }
        }


        if (!$stmt->execute(array($clientID, $professionalID, $serviceID, $appointmentDate,$appointmentStartTime,$appointmentEndTime, $serviceDuration, $servicePrice))) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $stmt = null;
        $stmt2 = null;
        $stmt3 = null;
    }

    protected function setClientAndAppointment($fullName, $birthDate, $email, $mobile, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice)
    {

        $stmt = $this->connect()->prepare('INSERT INTO client(clientFullName, clientBirthDate, clientEmail, clientMobile) VALUES (?,?,?,?);');
        $stmt2 = $this->connect()->prepare('SELECT clientID from client where clientFullName = ? and clientEmail = ? and clientBirthDate = ? and clientMobile = ?;');
        $stmt3 = $this->connect()->prepare('INSERT INTO appointment(client_clientID, professional_professionalID, service_serviceID, appointmentDate, appointmentStartTime, appointmentEndTime,appointmentDuration,appointmentPrice) VALUES (?,?,?,?,?,?,?,?);');
        $stmt4 = $this->connect()->prepare('INSERT INTO professional_has_client(professional_professionalID,client_clientID) VALUES (?,?);');

        if (!$stmt->execute(array($fullName, $birthDate, $email, $mobile))) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }



        if (!$stmt2->execute(array($fullName,$email,$birthDate,$mobile))) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt2->fetchAll();
        // print_r("<pre>");
        // print_r($results['0']['clientID']);
        // print_r("</pre>");
        // exit;
        $clientID = $results['0']['clientID'];

        if (!$stmt4->execute(array($professionalID,$clientID))) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }


        if (!$stmt3->execute(array($clientID, $professionalID, $serviceID, $appointmentDate,$appointmentStartTime,$appointmentEndTime, $serviceDuration, $servicePrice))) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $stmt = null;
        $stmt2 = null;
        $stmt3 = null;
        $stmt4 = null;
    }

    protected function setMyAppointmentByID($appointmentID, $clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice)
    {
        $stmt = $this->connect()->prepare('UPDATE appointment
        SET professional_professionalID=?, service_serviceID=?, appointmentDate=?, appointmentStartTime=?, appointmentEndTime=?,appointmentDuration=?,appointmentPrice=?
        WHERE appointmentID=?;');

        $stmt2 = $this->connect()->prepare('INSERT INTO professional_has_client(professional_professionalID,client_clientID) VALUES (?,?);');

        $stmt3 = $this->connect()->prepare('SELECT * FROM professional_has_client where professional_professionalID=? AND client_clientID=?;');

        $stmt4 = $this->connect()->prepare('SELECT professional_professionalID FROM appointment WHERE appointmentID = ?;');

        $stmt5 = $this->connect()->prepare('UPDATE appointment 
        SET appointmentCanceled=? WHERE appointmentID = ?;');

        $appointmentCanceled = 1;
        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;
        if (!$stmt3->execute(array($professionalID,$clientID))) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }
        $row = $stmt3->fetchAll();


        if (empty($row)) {
            if (!$stmt2->execute(array($professionalID,$clientID))) {
                $stmt = null;
                $stmt2 = null;
                $stmt3 = null;
                $stmt4 = null;
                header("location: ../../../index.php?error=stmtfailed");

                exit();
            }
        }


        if (!$stmt4->execute([$appointmentID])) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            $stmt4 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }
        $appointmentProfessionalID = $stmt4->fetchAll(PDO::FETCH_ASSOC);



        if ($professionalID === $appointmentProfessionalID[0]['professional_professionalID']) {
            if (!$stmt->execute(array($professionalID, $serviceID, $appointmentDate,$appointmentStartTime,$appointmentEndTime, $serviceDuration, $servicePrice))) {
                $stmt = null;
                $stmt2 = null;
                $stmt3 = null;
                $stmt4 = null;
                header("location: ../../../index.php?error=stmtfailed");

                exit();
            }
        } else {
            if (!$stmt5->execute(array($appointmentCanceled,$appointmentID))) {
                $stmt = null;
                $stmt2 = null;
                $stmt3 = null;
                $stmt4 = null;
                header("location: ../../../index.php?error=stmtfailed");

                exit();
            }
            $this->setAppointment($clientID, $professionalID, $serviceID, $appointmentDate, $appointmentStartTime, $appointmentEndTime, $serviceDuration, $servicePrice);
        }

        $stmt = null;
        $stmt2 = null;
        $stmt3 = null;
        $stmt4 = null;
    }

    protected function cancelAppointmentByID($appointmentID)
    {
        $stmt = $this->connect()->prepare('UPDATE appointment
        INNER JOIN client ON client_clientID=clientID
        SET appointmentCanceled=?
        WHERE appointmentID=?;');





        $appointmentCanceled = 1;


        if (!$stmt->execute(array($appointmentCanceled,$appointmentID))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }



        $stmt = null;
    }
    protected function cancelAppointmentByIDProfessionalEmail($userEmail, $appointmentID)
    {
        $stmt = $this->connect()->prepare('UPDATE appointment
        INNER JOIN professional ON professional_professionalID=professionalID
        SET appointmentCanceled=?
        WHERE professionalEmail=? AND appointmentID=?;');





        $appointmentCanceled = 1;


        if (!$stmt->execute(array($appointmentCanceled,$userEmail,$appointmentID))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }



        $stmt = null;
    }
    protected function cancelAppointmentByIDClientEmail($userEmail, $appointmentID)
    {
        $stmt = $this->connect()->prepare('UPDATE appointment
        INNER JOIN client ON client_clientID=clientID
        SET appointmentCanceled=?
        WHERE clientEmail=? AND appointmentID=?;');





        $appointmentCanceled = 1;


        if (!$stmt->execute(array($appointmentCanceled,$userEmail,$appointmentID))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }



        $stmt = null;
    }





    protected function getAppointmentsDate($date)
    {
        $stmt = $this->connect()->prepare('SELECT * from appointment
        INNER JOIN client ON client_clientID=clientID
        INNER JOIN professional ON professional_professionalID=professionalID
        INNER JOIN service ON service_serviceID=serviceID WHERE appointmentDate=?;');

        // print_r($name . "\n");
        // print_r($duration . "\n");



        if (!$stmt->execute([$date])) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll();


        $stmt = null;
        return $results;
    }
    protected function getMyAppointmentsDate($date, $userEmail)
    {
        $stmt = $this->connect()->prepare('SELECT * from appointment
        INNER JOIN client ON client_clientID=clientID
        INNER JOIN professional ON professional_professionalID=professionalID
        INNER JOIN service ON service_serviceID=serviceID 
        WHERE appointmentDate=? and professionalEmail=? and appointmentCanceled=?
        ORDER BY appointmentStartTime;');

        // print_r($name . "\n");
        // print_r($duration . "\n");

        $appointmentCanceled = 0;

        if (!$stmt->execute(array($date,$userEmail,$appointmentCanceled))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);



        $stmt = null;
        return $results;
    }
    protected function getHoursAvailableByProfessionalDateService($professionalID, $serviceID, $appointmentDate)
    {
        $tempTeste = $serviceID;
        $stmt = $this->connect()->prepare('SELECT * from appointment
        INNER JOIN client ON client_clientID=clientID
        INNER JOIN professional ON professional_professionalID=professionalID
        INNER JOIN service ON service_serviceID=serviceID 
        WHERE appointmentDate=? and professionalID=? and appointmentCanceled=?
        order by appointmentStartTime;');

        $stmt2 = $this->connect()->prepare('SELECT serviceTime from service
        INNER JOIN professional ON professional_professionalID=professionalID
        WHERE serviceID=?;');


        // print_r($name . "\n");
        // print_r($duration . "\n");
        $appointmentCanceled = 0;


        if (!$stmt->execute(array($appointmentDate,$professionalID,$appointmentCanceled))) {
            $stmt = null;
            $stmt2 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        if (!$stmt2->execute([$serviceID])) {
            $stmt = null;
            $stmt2 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $results2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $serviceDuration = $results2[0]['serviceTime'];




        $stmt = null;
        return $results;
    }

    protected function getAppointmentDataByIDEmail($appointmentID, $userEmail, $appointmentDate)
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



    protected function getProfessionalID($email)
    {
        $stmt = $this->connect()->prepare('SELECT professionalID FROM professional WHERE professionalEmail = ?;');

        // print_r($name . "\n");
        // print_r($duration . "\n");



        if (!$stmt->execute([$email])) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $professionalID = $results[0]['professionalID'];


        $stmt = null;
        return $professionalID;
    }

    protected function getAppointmentsPerDay()
    {
        $stmt = $this->connect()->prepare('SELECT COUNT(*) as servicesPerDay, appointmentDate FROM appointment GROUP BY appointmentDate;');

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }

    protected function getMyAppointmentsPerDay($userEmail)
    {
        $stmt = $this->connect()->prepare('SELECT COUNT(*) as servicesPerDay, appointmentDate FROM appointment 
        INNER JOIN professional ON professional_professionalID=professionalID
        where professionalEmail = ? and appointmentCanceled=?
        GROUP BY appointmentDate;');

        $appointmentNotCanceled = 0;
        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute(array($userEmail,$appointmentNotCanceled))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


        $stmt = null;
        return $results;
    }

    protected function getAppointments()
    {
        $stmt = $this->connect()->prepare('SELECT * from appointment;');

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

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


        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

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
    protected function getMyAppointmentsServicesClients($userEmail)
    {

        $stmt = $this->connect()->prepare('SELECT COUNT(*) serviceID FROM service INNER JOIN professional ON professional_professionalID=professionalID
        where professionalEmail = ?;');
        $stmt2 = $this->connect()->prepare('SELECT COUNT(*) appointmentID FROM appointment INNER JOIN professional ON professional_professionalID=professionalID
        where professionalEmail = ?;');
        $stmt3 = $this->connect()->prepare('SELECT COUNT(DISTINCT client_clientID) client_clientID FROM appointment 
        INNER JOIN professional ON professional_professionalID=professionalID
        where professionalEmail = ?;');



        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute([$userEmail]) || !$stmt2->execute([$userEmail]) || !$stmt3->execute([$userEmail])) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }


        $results1 = $stmt->fetchAll();
        $results2 = $stmt2->fetchAll();
        $results3 = $stmt3->fetchAll();

        $results = array_merge($results1, $results2, $results3);

        $stmt = null;
        $stmt2 = null;
        $stmt3 = null;
        return $results;
    }
}