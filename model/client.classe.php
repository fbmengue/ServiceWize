<?php

namespace model;

use model\Database;
use PDO;

class Client extends Database
{
    protected function setClient($fullName, $birthDate, $email, $mobile)
    {
        $stmt = $this->connect()->prepare('INSERT INTO client(clientFullName, clientBirthDate, clientEmail, clientMobile) VALUES (?,?,?,?);');

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute(array($fullName, $birthDate, $email, $mobile))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $stmt = null;
    }



    protected function getClients()
    {
        $stmt = $this->connect()->prepare('SELECT * from client;');

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

    protected function getClientDataByUserEmail($userEmail)
    {
        $stmt = $this->connect()->prepare('SELECT * from client WHERE clientEmail=?;');

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute([$userEmail])) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }
    protected function getMyFutureAppointmentByEmail($userEmail, $todayDate)
    {
        $stmt = $this->connect()->prepare('SELECT *
        FROM appointment
        INNER JOIN client ON client_clientID=clientID
        INNER JOIN professional ON professional_professionalID=professionalID
        INNER JOIN service ON service_serviceID=serviceID
        WHERE clientEmail=? AND appointmentDate>=? AND appointmentCanceled=?;');

        $appointmentNotCanceled = 0;

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute(array($userEmail,$todayDate,$appointmentNotCanceled))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }
    protected function getMyPastAppointmentByEmail($userEmail, $todayDate)
    {
        $stmt = $this->connect()->prepare('SELECT *
        FROM appointment
        INNER JOIN client ON client_clientID=clientID
        INNER JOIN professional ON professional_professionalID=professionalID
        INNER JOIN service ON service_serviceID=serviceID
        WHERE clientEmail=? AND appointmentDate<? AND appointmentCanceled=?;');

        $appointmentNotCanceled = 0;

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute(array($userEmail,$todayDate,$appointmentNotCanceled))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }
    protected function getMyNextAppointmentByEmail($userEmail, $todayDate)
    {
        $stmt = $this->connect()->prepare('SELECT *
        FROM appointment
        INNER JOIN client ON client_clientID=clientID
        INNER JOIN professional ON professional_professionalID=professionalID
        INNER JOIN service ON service_serviceID=serviceID
        WHERE clientEmail=? AND appointmentDate>=? AND appointmentCanceled=?
        order by appointmentDate LIMIT 2;');

        $appointmentNotCanceled = 0;

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute(array($userEmail,$todayDate,$appointmentNotCanceled))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }

    protected function getMyAppointmentsCount($userEmail)
    {
        $stmt2 = $this->connect()->prepare('SELECT COUNT(*) appointmentID FROM appointment
        INNER JOIN client ON client_clientID=clientID
        WHERE clientEmail=?;');


        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt2->execute([$userEmail])) {
            $stmt2 = null;

            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }



        $results2 = $stmt2->fetchAll();

        $results = $results2;

        $stmt2 = null;

        return $results;
    }
}