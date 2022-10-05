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
}
