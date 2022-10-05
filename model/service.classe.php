<?php

namespace model;

use model\Database;
use PDO;

class Service extends Database
{
    protected function setService($name, $duration, $price, $professionalID)
    {
        $stmt = $this->connect()->prepare('INSERT INTO service(serviceName, serviceTime, servicePrice, professional_professionalID) VALUES (?,?,?,?);');

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute(array($name, $duration, $price,$professionalID))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $stmt = null;
    }
    protected function setMyService($name, $duration, $price, $userEmail)
    {
        $stmt = $this->connect()->prepare('INSERT INTO service(serviceName, serviceTime, servicePrice, professional_professionalID) VALUES (?,?,?,?);');
        $stmt2 = $this->connect()->prepare('SELECT professionalID FROM professional where professionalEmail=?;');

        if (!$stmt2->execute(array($userEmail))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }
        $professionalFetch = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        $professionalID = $professionalFetch[0]['professionalID'];
        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute(array($name, $duration, $price,$professionalID))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $stmt = null;
        $stmt2 = null;
    }

    protected function getServices()
    {
        $stmt = $this->connect()->prepare("SELECT *, date_format(serviceTime, '%H:%i') as 'time' from service;");

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
    protected function getMyServices($userEmail)
    {
        $stmt = $this->connect()->prepare("SELECT *, date_format(serviceTime, '%H:%i') as 'time' from service INNER JOIN professional ON professional_professionalID=professionalID
        where professionalEmail = ?;");

        // print_r($name . "\n");
        // print_r($duration . "\n");
        // print_r($price . "\n");
        // exit;

        if (!$stmt->execute([$userEmail])) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll();

        $stmt = null;
        return $results;
    }
}
