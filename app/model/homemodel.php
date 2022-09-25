<?php 
    class homemodel extends Model{

        private $_table = "sinhvien";

        function tableFill()
        {
            return $this->_table;
        }

        function fieldFill()
        {
            return "MSV,HoTen";
        }

        function getList(){
            return [
                "SP1",
                "SP2",
                "SP3",
                "SP4",
            ];
        }

        function SP($id= 0){
            $sp = $this->getList();
            return $sp[$id];
        }

        function ds(){
            return $this->get();
        }


    }
?>