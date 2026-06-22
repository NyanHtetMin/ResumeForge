<?php

class Database
{
    private $host = "localhost";
    private $username = "root";
    private $database = "resumebuilder";
    private $password = "";
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->username,
            $this->password,
            $this->database
        );
    }

    public function real_escape_string($value)
    {
    return $this->conn->real_escape_string($value);
    }

    public function query($sql)
    {
    return $this->conn->query($sql);
    }
    public function insert_id(){
        return $this->conn->insert_id;
    }
}

$db = new Database();