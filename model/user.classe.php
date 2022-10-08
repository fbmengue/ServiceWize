<?php

namespace model;

use model\Database;
use PDO;

class User extends Database
{
    protected function getUserEmails()
    {
        $stmt = $this->connect()->prepare("SELECT userEmail from user;");


        if (!$stmt->execute()) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }

    protected function getMyProfile($userID)
    {
        $stmt = $this->connect()->prepare("SELECT * from user where userID = ?;");


        if (!$stmt->execute([$userID])) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;
        return $results;
    }
}
