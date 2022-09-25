<?php 
    define("_DIR_ROOT_",__DIR__);
    if(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on"){
        $web_root = "https://".$_SERVER["HTTP_HOST"];
    }else{
        $web_root = "http://".$_SERVER["HTTP_HOST"];
    }
    $dirRoot = str_replace("\\","/",_DIR_ROOT_);
    $dcm = $_SERVER["DOCUMENT_ROOT"];
    $folder = str_replace($dcm,"",$dirRoot);
    $web_root = $web_root.$folder;
    define("_WEB_ROOT_",$web_root);
    $file = scandir("config");
    if(!empty($file)){
        foreach($file as $item){
            if($item != "." && $item != ".." && file_exists("./config/".$item)){
                require "./config/".$item;
            }
        }
    }
    require "./core/routes.php";
    require "./app/App.php";


    if(!empty($config)){
        $db_config = array_filter($config["database"]);
        if(!empty($db_config)){
            require "./core/connection.php";
            require "./core/database.php";
        }
    }

    require "./core/Model.php";

    require "./core/controller.php";
?>