<?php
require $_SERVER['DOCUMENT_ROOT'] . "/config.php";

class Connection
{
    public function __construct()
    {
        $this->user = $_ENV['userDB'];
        $this->pass = $_ENV['passwordDB'];
        $this->host = $_ENV['host'];
        $this->database = $_ENV['table'];
    }

    public function Connect()
    {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->database}", $this->user, $this->pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            echo "ERROR: " . $e->getMessage();
        }
    }
}
