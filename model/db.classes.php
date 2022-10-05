<?php

namespace model;

use PDO;
use PDOException;

class Database
{
    protected function connect()
    {



        try {
            $host = "localhost";
            $port = 3306;
            $socket = "";
            $user = "root";
            $password = "S!MPLEX@)II";
            $dbname = "appmanagement";
            $conn = new PDO("mysql:host={$host};port={$port};dbname={$dbname}", $user, $password);
            return $conn;
        } catch (PDOException $e) {
            print 'Connection failed: ' . $e->getMessage();
            die();
        }






        // try {
        //     $hostname = 'localhost';
        //     $username = 'root';
        //     $password = 'S!MPLEX@)II';
        //     $dbname = 'appmanagement';
        //    // $conn = new PDO('mysqli:host=localhost',$dbname, $username, $password);
        //     $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        //     return $conn;
        // } catch (PDOException $e) {
        //      "Erro!: " . $e->getMessage() . "<br/>";
        //      die();
        // }
    }
}
