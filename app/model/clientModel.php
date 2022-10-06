<?php 
    class clientModel extends Model{

        private $_table = "hoanghoa";

        function tableFill()
        {
            return $this->_table;
        }

        function fieldFill()
        {
            return "";
        }

        function listData($table,$field){
            return $this->db->table($table)->select($field)->get();
        }

        function detailData($table,$select,$field,$value){
            return $this->db->table($table)->select($select)->where($field,"=",$value)->get();
        }

        function searchSP($key){
            return $this->db->table("hanghoa")->whereLike("TenHangHoa",$key)->get();
        }

        function updateView($data,$Id){
            return $this->db->table("hanghoa")->where("MaHangHoa","=",$Id)->update($data);
        }

        function listJoin($table,$id,$value,$field,$table1,$relationship,$field1,$type="ASC"){
            return $this->db->table($table)->select($field)->join($table1,$relationship)->where($id,"=",$value)->orderBy($field1,$type)->get();
        }
    }
?>