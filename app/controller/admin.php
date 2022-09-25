<?php 
    class admin extends controller{
        public $model_home,$data;
        function index(){
            $this->data["content"] = "admin/TrangChu";
            $this->render("layout/admin_layout",$this->data);
        }

        function addLoai(){
            $this->data["content"] = "admin/quanly/addLoai";
            $this->render("layout/admin_layout",$this->data);
        }

        function addproduct(){
            $this->data["content"] = "admin/quanly/addproduct";
            $this->render("layout/admin_layout",$this->data);
        }

        function binhluan(){
            $this->data["content"] = "admin/quanly/binhluan";
            $this->render("layout/admin_layout",$this->data);
        }

        function thongke(){
            $this->data["content"] = "admin/quanly/thongke";
            $this->render("layout/admin_layout",$this->data);
        }
    }
?>