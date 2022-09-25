<?php 
    abstract class Model extends database{
        protected $db;
        function __construct()
        {
           $this->db = new database();
        }

        abstract function tableFill();

        abstract function fieldFill();

        function get(){
            $tableName = $this->tableFill();
            $fieldSelect = $this->fieldFill();
            $qr = $this->db->query("SELECT $fieldSelect FROM $tableName");
            return $qr;
        }

        function Insert(){
            $sql = "INSERT INTO `qlsinhvien`.`sinhvien` (`MSV`,`HoTen`,`Lop`) VALUES(?,?,?)";
            $this->db->pdo_execute($sql,["PH24525","Nguyen Gia Binh","WE17312"]);
        }

        function Delete(){
            $sql = "DELETE FROM `qlsinhvien`.`sinhvien` WHERE `MSV` = ?";
            $this->db->pdo_execute($sql,["PH24525"]);
        }
    }
?>