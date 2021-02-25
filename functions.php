<?php

require_once("Rest.inc.php");
require_once("db.php");

class functions extends REST
{
    private $mysqli = NULL;
    private $db = NULL;

    public function __construct($db)
    {
        parent::__construct();
        $this->db = $db;
        $this->mysqli = $db->mysqli;
    }

    public function checkConnection()
    {
        if (mysqli_ping($this->mysqli)) {
            $respon = array(
                'status' => 'ok', 'databse' => 'connected'
            );
            $this->response($this->json($respon), 200);
        } else {
            $respon = array(
                'status' => 'failed', 'database' => 'not connected'
            );
            $this->response($this->json($respon), 404);
        }
    }
}


// curl response commandline code for post request: 
// curl --location --request POST 'http://localhost/api_skelton/check_stat' --form 'email="sayanchoudhury16@gmail.com"'

// curl response comandline code for get request:
// curl --location --request GET 'http://localhost/api_skelton/check_connection'

// mysql command line commands

// go to mysql directory : cd /opt/lampp/bin
// connection to mysql : ./mysql -u root -p
// show databases : show databases;
// select a database : use databasename;
// show tables : show tables;
// describe a table : desc table_name;
