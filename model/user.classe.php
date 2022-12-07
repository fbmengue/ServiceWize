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



    protected function setUserPasswordByID($userID, $currentPassword, $newPassword, $newPasswordRepeat)
    {

        $stmt = $this->connect()->prepare("SELECT userPassword from user WHERE userID=?;");



        if (!$stmt->execute([$userID])) {
            $stmt = null;
            echo '<div class="alert alert-danger">Server Error!</div>';

            exit();
        }
        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $checkPwd = password_verify($currentPassword, $pwdHashed[0]["userPassword"]);



        if ($checkPwd == false) {
            $stmt = null;
            echo '<div class="alert alert-danger">Invalid Password!</div>';
            exit();
        } elseif ($checkPwd == true) {
            $stmt2 = $this->connect()->prepare("UPDATE user SET userPassword=? WHERE userID=?;");
            if (!$stmt2->execute(array($newPassword,$userID))) {
                $stmt2 = null;
                echo 'Server Error!';
                exit();
            }

            if ($stmt2->rowCount() == 0) {
                $stmt2 = null;
                echo '<div class="alert alert-danger">Invalid Password!</div>';
                exit();
            }

            $newPasswordHashed = password_hash($newPassword, PASSWORD_DEFAULT);
            $stmt2->execute(array($newPasswordHashed,$userID)); // execute
        }




        $stmt = null;
        $stmt2 = null;
    }
}