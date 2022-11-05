<?php

namespace model;

use model\Database;
use PDO;

class Professional extends Database
{
    protected function setProfessional($fullName, $email)
    {
        $stmt = $this->connect()->prepare('INSERT INTO professional(professionalFullName,professionalEmail) VALUES (?,?);');
        $stmt2 = $this->connect()->prepare('SELECT userID FROM user WHERE userEmail = ?;');
        $userType = "professional";

        if (!$stmt2->execute([$email])) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $userIDFetch = $stmt2->fetchAll(PDO::FETCH_ASSOC);

        if (empty($userIDFetch)) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        if (!$stmt->execute(array($fullName, $email))) {
            $stmt = null;
            $stmt2 = null;
            $stmt3 = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }


        $userID = $userIDFetch[0]['userID'];
        // print_r($name . "\n");
        // print_r($duration . "\n");


        $stmt3 = $this->connect()->prepare('UPDATE user SET userType=? WHERE userID = ?;');

        if (!$stmt3->execute(array($userType,$userID))) {
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

    protected function getProfessional()
    {
        $stmt = $this->connect()->prepare('SELECT * from professional;');

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
    protected function getProfessionalByEmail($userEmail)
    {
        $stmt = $this->connect()->prepare('SELECT * from professional WHERE professionalEmail=?;');

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
    protected function getProfessionalIDByEmail($userEmail)
    {
        $stmt = $this->connect()->prepare('SELECT professionalID from professional WHERE professionalEmail=?;');

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
        $resultID = $results[0]['professionalID'];

        $stmt = null;
        return $resultID;
    }

    protected function getTodayAppointmentsByEmail($userEmail, $todayDate)
    {
        $stmt = $this->connect()->prepare('SELECT *
        FROM appointment
        INNER JOIN client ON client_clientID=clientID
        INNER JOIN professional ON professional_professionalID=professionalID
        INNER JOIN service ON service_serviceID=serviceID
        WHERE professionalEmail=? AND appointmentDate=? AND appointmentCanceled=?;');

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
}