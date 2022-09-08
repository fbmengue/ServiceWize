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
            header("location: ./../index.php?page=login&error=" . $stmtRow);
            exit();
        }

        if ($stmtRow->fetchColumn() == 0) {
            $stmtRow = null;
            $stmtPass = null;
            $textMsg = "Usuário não Registado!";
            $display = "falha";
            header("location: ../marcaConsultoria.php?error=" . $textMsg . "&status=" . $display);
            exit();
        }

        $pwdHashed = $stmtPass->fetchAll(PDO::FETCH_ASSOC);


        $checkPwd = password_verify($pwd, $pwdHashed[0]["userPassword"]);


        if ($checkPwd == false) {
            $stmtRow = null;
            $stmtPass = null;
            $textMsg = "Senha incorreta!";
            $display = "falha";
            header("location: ../marcaConsultoria.php?error=" . $textMsg . "&status=" . $display);
            exit();
        } elseif ($checkPwd == true) {
            $stmtEmailPass = $this->connect()->prepare('SELECT * FROM user WHERE userEmail = ? AND userPassword = ?;');
            $stmtRow = $this->connect()->prepare('SELECT COUNT(*) FROM user WHERE userEmail = ? AND userPassword = ?;');

            if (!$stmtEmailPass->execute(array($email,$pwdHashed[0]["userPassword"])) || !$stmtRow->execute(array($email,$pwdHashed[0]["userPassword"]))) {
                $stmtEmailPass = null;
                $stmtPass = null;
                header("location: ../marcaConsultoria.php?error=stmtfailed2");
                exit();
            }




            if ($stmtRow->fetchColumn() == 0) {
                $stmtEmailPass = null;
                $stmtPass = null;
                $textMsg = "Utilizador não registado!";
                $display = "falha";
                header("location: ../../index.php?page=login&error=" . $textMsg . "&status=" . $display);
                exit();
            }

            $user = $stmtEmailPass->fetchAll(PDO::FETCH_ASSOC);






            session_start();
            $_SESSION["userID"] = $user[0]["userID"];
            $_SESSION["userName"] = $user[0]["userFirstName"];
            $_SESSION["userLastName"] = $user[0]["userLastName"];
            $_SESSION["userType"] = $user[0]["userType"];
            $stmtEmailPass = null;
            $stmtPass = null;
            $stmtRow = null;
        }
    }
}
