<?php

class DB
{

    private $host = "localhost"; // set your host
    private $user = "root"; // set your username
    private $password = ""; // set your password
    private $dbname = "devtest"; // set your db name

    private $connection = NULL;

    public function connect()
    {
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbname);
        if($this->connection->connect_error) {
            die("Connection to database failed: ". $this->connection->connect_error);
            return FALSE;
        }
        return $this->connection;
    }
}

?>