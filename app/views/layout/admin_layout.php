<?php 
    $this->render("admin/block/header");
    if(count($data) > 1){
        $this->render($content,$data);
    } else {
        $this->render($content);
    }
?>