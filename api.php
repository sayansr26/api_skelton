<?php

require_once("Rest.inc.php");
require_once("db.php");
require_once("functions.php");

class API extends REST
{
    private $functions = NULL;
    private $db = NULL;

    public function __construct()
    {
        $this->db = new DB();
        $this->functions = new functions($this->db);
    }

    public function check_connection()
    {
        $this->functions->checkConnection();
    }

    /*
     * All Api Related android client --------------------------------------------------
     */


    /*
      * End of Api Transactions ---------------------------------------------------------
      */

    public function processApi()
    {
        if (isset($_REQUEST['x']) && $_REQUEST['x'] != "") {
            $func = strtolower(trim(str_replace("/", "", $_REQUEST['x'])));
            if ((int)method_exists($this, $func) > 0) {
                $this->$func();
            } else {
                echo 'processApi - method not exists';
                exit;
            }
        } else {
            echo 'processApi - method not exists';
            exit;
        }
    }
}

// Intiate Library
$api = new API;
$api->processApi();
