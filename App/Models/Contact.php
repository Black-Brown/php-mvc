<?php

namespace App\Models;

class Contact
{
    protected $db_host = DB_HOST;
    protected $db_user = DB_USER;
    protected $db_pass = DB_PASS;
    protected $db_name = DB_NAME;

    protected $connection;
    protected $query;

    public function __construct()
    {
        $this->connection();
    }

    public function connection()
    {
        $this->connection = new \mysqli(
            $this->db_host, 
            $this->db_user,
            $this->db_pass,
            $this->db_name);

        if ($this->connection->connect_error) {
            throw new \Exception("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function query($sql){
        $this->query = $this->connection->query($sql);

        return $this;
    }

    public function fetchAll()
    {
        $result = [];
        while ($row = $this->query->fetch_assoc()) {
            $result[] = $row;
        }
        return $result;
    }

    public function fetch()
    {
        return $this->query->fetch_assoc();
    }
}