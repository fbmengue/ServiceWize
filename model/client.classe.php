<?php

namespace model;

use model\Database;

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
}
