<?php

namespace model;

use model\Database;
use PDO;

class User extends Database
{
    protected function getUserEmails()
    {
        $stmt = $this->connect()->prepare("SELECT userEmail from user where userType=?;");

        $clientType = "client";
        if (!$stmt->execute([$clientType])) {
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
    protected function setUserProfileByID($userID, $fullName, $email, $mobile, $birthDate)
    {

        $stmt = $this->connect()->prepare("UPDATE user
        SET userFullName=?, userEmail=?, userMobile=?, userBirthDate=?
        WHERE userID=?;");

        $stmt3 = $this->connect()->prepare("SELECT userEmail from user WHERE userID=?;");

        if (!$stmt3->execute([$userID])) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }
        $results = $stmt3->fetchAll(PDO::FETCH_ASSOC);
        $userEmail = $results[0]['userEmail'];



        $stmt4 = $this->connect()->prepare("SELECT * FROM client WHERE clientEmail=?;");

        if (!$stmt4->execute([$userEmail])) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }

        $resultsClient = $stmt4->fetchAll(PDO::FETCH_ASSOC);


        if ($resultsClient) {
            $stmt2 = $this->connect()->prepare("UPDATE client
            SET clientFullName=?, clientEmail=?, clientMobile=?, clientBirthDate=?
            WHERE clientEmail=?;");


            if (!$stmt2->execute(array($fullName, $email, $mobile, $birthDate,$userEmail))) {
                $stmt = null;
                header("location: ../../../index.php?error=stmtfailed");

                exit();
            }
        }





        if (!$stmt->execute(array($fullName, $email, $mobile, $birthDate,$userID))) {
            $stmt = null;
            header("location: ../../../index.php?error=stmtfailed");

            exit();
        }



        $stmt = null;
    }
}