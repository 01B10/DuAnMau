<?php 
    abstract class Model extends database{
        protected $db;
        function __construct()
        {
           $this->db = new database();
        }

        abstract function tableFill();

        abstract function fieldFill();

        function all(){
            $tableName = $this->tableFill();
            $fieldSelect = $this->fieldFill();
            if(empty($fieldSelect)){
                $fieldSelect = "*";
            }
            $sql = "SELECT $fieldSelect FROM $tableName";
            $query = $this->db->query($sql);
            if(!empty($query)){
                return $query;
            }
        }

        // function Insert(){
        //     $sql = "INSERT INTO `duanmau`.`sinhvien` (`MSV`,`HoTen`,`Lop`) VALUES(?,?,?)";
        //     $this->db->pdo_execute($sql,["PH24525","Nguyen Gia Binh","WE17312"]);
        // }

        // function Delete(){
        //     $sql = "DELETE FROM `duanmau`.`sinhvien` WHERE `MSV` = ?";
        //     $this->db->pdo_execute($sql,["PH24525"]);
        // }
    }
?>