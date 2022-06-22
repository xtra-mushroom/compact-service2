<?php
class Database {
    private $host, $db_name, $username, $password;
    public $conn;

    function __construct()
    {
        $this->host = "localhost";
        $this->username = "lava";
        $this->password = "linolee";
        $this->db_name = "master_pelayanan";
    }

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->host .
                                    ";dbname=" . $this->db_name,
                                    $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Connection error : " . $exception->getMessage();
        }
       return $this->conn;
    }
}
?>