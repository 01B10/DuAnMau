<?php 
    class product extends controller{
        public $model,$data;
        function __construct()
        {
            $this->model = $this->model("homemodel");
        }

        function index(){
            echo "Welcome to product";
        }

        function list_product(){
            $this->data["sub_content"]["list"] = $this->model->getList();
            $this->data["content"] = "product/list";
            $this->data["name"] = "Tivi";
            $this->render("layout/client_layout",$this->data);
        }

        function detail($id = 0){
            $this->data["sub_sp"]["sp"] = $this->model->ds();
            $this->data["content"] = "product/list";
            $this->render("layout/client_layout",$this->data);
        }

        function test(){
            $this->data["content"] = "product/test";
            $this->render("layout/client_layout",$this->data);
        }

        // function huhu(){
        //     $this->data["content"] = "user/huhu";
        //     $this->render("layout/client_layout",$this->data);
        // }

        function data(){
            $this->model->Insert();
        }

        function Delete(){
            $this->model->Delete();
        }

    }
?>