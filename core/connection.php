<?php

use LDAP\Connection as LDAPConnection;

    class Connection{
        private static $instance = null,$con;
        
        private function __construct($config)
        {
            // global $config;
            try {
                // $db = $config["database"];
                // echo "<pre>";
                // print_r($config);
                // echo "</pre>";
                $dsn = "mysql:host=".$config["host"].";dbname=".$config["db"];
                $option = [
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ];
                $conn = new PDO($dsn,$config["user"],$config["pass"],$option);
                // $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                self::$con = $conn;
            } catch (Exception $th) {
                $mess = $th->getMessage();
                App::$app->LoadErr("404",["err"=>$mess]);
                die();
            }
        }

        public static function getInstance($config){
            if(self::$instance == null){
                $connection = new Connection($config);
                self::$instance = self::$con;
            }

            return self::$instance;
        }
    }
?>