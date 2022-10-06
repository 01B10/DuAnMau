<?php 
    class adminModel extends Model{
        private $_table = "loai";

        function tableFill()
        {
            return $this->_table;
        }

        function fieldFill()
        {
            return "";
        }

        function listLoai(){
            return $this->all();
        }

        function ListData($table){
            return $this->db->table($table)->get();
        }

        function ItemProduct(){
            if(!empty($_GET["IdProduct"])){
                return $this->db->table("hoanghoa")->where("MaHangHoa","=",$_GET["IdProduct"])->first();
            };
        }

        function ItemData($table,$field,$value){
            if(!empty($value)){
                return $this->db->table($table)->where($field,"=",$value)->first();
            };
        }

        function TenLoai(){
            if(!empty($_GET["Maloai"])){
                return $this->db->table("loai")->select("TenLoai")->where("MaLoai","=",$_GET["Maloai"])->get();
            }
        }

        function getListTenLoai($maloai){
            return $this->db->table("loai")->select("TenLoai")->where("MaLoai","=",$maloai)->get();
        }
    }
?>