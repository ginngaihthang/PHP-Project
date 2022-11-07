<?php 

    Abstract class Dbconnect {
        private $server_name = "localhost";
        private $db_name = "car_wash";
        private $db_user = "root";
        private $db_password = "";

        protected $connection;

        //PHP Data Object (PDO)

        public function __construct() {
            if(!isset($this->connection)) {
                try{
                    $conn = new PDO("mysql:host=".$this->server_name.";dbname=".$this->db_name, $this->db_user, $this->db_password);
                    $this->pdo = $conn;
                    
                    // echo "success";

                    return $this->pdo;
                }catch (PDOException $e) {
                    die("Faile to connect with MySQL".$e->getMessage());
                }
            }
        }
    }

    // $obj = new Dbconnect();


?>