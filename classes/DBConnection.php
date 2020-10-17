<?php


class DBConnection
{
    private $server;
    private $username;
    private $password;
    private $db;
    private $connection;

    public function __construct($server, $username, $password, $db)
    {
        $this->server = $server;
        $this->username = $username;
        $this->password = $password;
        $this->db = $db;
    }

    public function connect()
    {
        $this->connection = new mysqli($this->server, $this->username, $this->password, $this->db);
        return $this->connection;
    }

    public function isInstalled()
    {
        $sql = "SELECT 1 FROM logs LIMIT 1";
        $stmt = $this->connection->prepare($sql);
        if ($stmt) {
            if ($stmt->execute()) {
                return true;
            }
            return false;
        }
        return false;
    }
}