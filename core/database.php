<?php 
    class database{
        private $__conn;

        function __construct()
        {
            global $config;
            $this->__conn = Connection::getInstance($config["database"]);
        }

        function query($sql){
            try {
                $statament = $this->__conn->prepare($sql);
                $statament->execute();
                return $statament->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $th) {
                $error["err"] = $th->getMessage();
                App::$app->LoadErr("404",$error);
                die();
            }
        }

        function pdo_execute($sql){
            $sql_args = array_slice(func_get_args(),1);
            try {
                $statament = $this->__conn->prepare($sql);
                $statament->execute($sql_args[0]);
                return $statament->fetchAll(PDO::FETCH_ASSOC);
            } catch (Exception $th) {
                $error["err"] = $th->getMessage();
                App::$app->LoadErr("404",$error);
                die();
            }
        }

    }
?>