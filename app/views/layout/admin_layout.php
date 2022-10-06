<?php 
    $this->render("admin/block/header");
    if(count($data) > 1){
        $this->render($content,$data);
    }if (count($data) == 0) {
        echo "Hello";
    } else {
        $this->render($content);

    }
?>