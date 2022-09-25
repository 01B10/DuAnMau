<?php 
    class home extends controller{
        public $model_home,$data;

        function __construct()
        {
            $this->model_home = $this->model("homemodel");
        }

        function index(){
            $this->data["content"] = "user/TrangChu";
            $this->render("layout/client_layout",$this->data);
        }

        function list($a = "",$b="",$c=""){
            echo $a;
            echo $b;
        }

        function Register(){
            $this->data["content"] = "user/register";
            $this->render("layout/client_layout",$this->data);
        }

        function Login(){
            $this->data["content"] = "user/login";
            $this->render("layout/client_layout",$this->data);
        }

        function ForgotPassword(){
            $this->data["content"] = "user/forgotpassword";
            $this->render("layout/client_layout",$this->data);
        }
    }
?>