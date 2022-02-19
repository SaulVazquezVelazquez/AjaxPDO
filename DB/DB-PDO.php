<?php

class ConPDO extends PDO {

    private $host = "localhost";
    private $dbname = "scs-app-web";
    private $username = "root";
    private $password = "root";

    public function __construct()
    {
        try {
        
            parent::__construct("mysql: host = $this->host ; dbname=$this->dbname", 
            $this->username,
            $this->password,
            array(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION)    
            );

        

        } catch (PDOException $e) {
            echo "Error to Conect".$e->getMessage();
            exit;
        }
        
    }



}

?>