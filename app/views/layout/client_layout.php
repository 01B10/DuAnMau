
    <?php 
        $this->render("user/block/header");
        
        if(count($data) > 1){
            $this->render($content,$data);
        }if (count($data) == 0) {
            echo "Hello";
        } else {
            $this->render($content);

        }
        
        $this->render("user/block/footer");
    ?>

