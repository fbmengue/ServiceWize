<?php

namespace model;

use model\Database;

class Cadastro extends Database
{
    protected function verificaUtilizador($email)
    {
        $stmt = $this->connect()->prepare('SELECT userEmail FROM user WHERE userEmail = ?;');
        if (!$stmt->execute(array($email))) {
            $stmt = null;
            header("location: ../marcaConsultoria.php?error=stmtfailed");
            exit();
        }
        $resultCheck = false;
        if ($stmt->rowCount() > 0) {
            $resultCheck = false;
        } else {
            $resultCheck = true;
        }
        return $resultCheck;
    }
    protected function setUtilizador($nome, $sobrenome, $pwd, $email, $tel)
    {
        $stmt = $this->connect()->prepare('INSERT INTO user(userFullName, userPassword,userEmail,userMobile,userType) VALUES (?,?,?,?,?);');

        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        $fullName = $nome . " " . $sobrenome;
        $userType = 'client';

        if (!$stmt->execute(array($fullName,$hashedPwd, $email, $tel,$userType))) {
            $stmt = null;
            header("location: ../marcaConsultoria.php?error=stmtfailed");
            exit();
        }


        $stmt = null;
    }
}
