<?php

namespace Models;

abstract class DataBaseConnect
{
    protected $user = 'root';
    protected $password = 'root';
    protected $db = 'db';
    protected $host = 'localhost';
    protected $port = 8889;
    protected function connectToDb()
    {
        try{
            $pdo = new \PDO("mysql:host=localhost;dbname=$this->db;port=$this->port", $this->user, $this->password);
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch(\PDOException $e){
            die("Ошибка подключения. " . $e->getMessage());
        }
        return $pdo;
    }
}