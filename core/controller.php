<?php 
    class controller{
        function model($model){
            if(file_exists(_DIR_ROOT_."\app\model\\".$model.".php")){
                require _DIR_ROOT_."\app\model\\".$model.".php";
                if(class_exists($model)){
                    $model = new $model();
                    return $model;
                }
            }
            return false;
        }

        function render($view, $data = []){
            extract($data);
            if(file_exists(_DIR_ROOT_."/app/views/".$view.".php")){
                // echo "Hello";
                require_once _DIR_ROOT_."/app/views/".$view.".php";
            }
        }
    }
?>  