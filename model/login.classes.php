<?php

namespace model;

use model\Database;
use PDO;

class Login extends Database
{
    protected function getUtilizador($email, $pwd)
    {
        $stmtPass = $this->connect()->prepare('SELECT userPassword FROM user WHERE userEmail = ?;');
        $stmtRow = $this->connect()->prepare('SELECT COUNT(*) FROM user WHERE userEmail = ?;');

        if (!$stmtRow->execute(array($email)) || !$stmtPass->execute(array($email))) {
            echo '<div class="alert alert-danger">Failed to connect to server</div>';
            exit();
        }

        if ($stmtRow->fetchColumn() == 0) {
            $stmtRow = null;
            $stmtPass = null;
            echo '<div class="alert alert-danger">User Not Registered</div>';
            exit();
        }

        $pwdHashed = $stmtPass->fetchAll(PDO::FETCH_ASSOC);


        $checkPwd = password_verify($pwd, $pwdHashed[0]["userPassword"]);


        if ($checkPwd == false) {
            $stmtRow = null;
            $stmtPass = null;
            echo '<div class="alert alert-danger">Invalid Password</div>';
            exit();
        } elseif ($checkPwd == true) {
            $stmtEmailPass = $this->connect()->prepare('SELECT * FROM user WHERE userEmail = ? AND userPassword = ?;');
            $stmtRow = $this->connect()->prepare('SELECT COUNT(*) FROM user WHERE userEmail = ? AND userPassword = ?;');

            if (!$stmtEmailPass->execute(array($email,$pwdHashed[0]["userPassword"])) || !$stmtRow->execute(array($email,$pwdHashed[0]["userPassword"]))) {
                $stmtEmailPass = null;
                $stmtPass = null;
                echo '<div class="alert alert-danger">Failed to connect to server</div>';
                exit();
            }




            if ($stmtRow->fetchColumn() == 0) {
                $stmtEmailPass = null;
                $stmtPass = null;
                echo '<div class="alert alert-danger">User Not Registered</div>';
                exit();
            }

            $user = $stmtEmailPass->fetchAll(PDO::FETCH_ASSOC);






            session_start();
            $_SESSION["userID"] = $user[0]["userID"];
            $_SESSION["userFullName"] = $user[0]["userFullName"];
            $_SESSION["userEmail"] = $user[0]["userEmail"];
            $_SESSION["userMobile"] = $user[0]["userMobile"];
            $_SESSION["userBirthDate"] = $user[0]["userBirthDate"];
            $_SESSION["userType"] = $user[0]["userType"];
            $stmtEmailPass = null;
            $stmtPass = null;
            $stmtRow = null;
        }
    }
}