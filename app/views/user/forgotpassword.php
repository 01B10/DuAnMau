<?php 
    if(isset($_POST["sendpass"])){
        $err = [];
        $rg = '/^\w{5,20}$/';
        $email = $_POST["email"];
        $err["email"] = filter_var($email,FILTER_VALIDATE_EMAIL)?"":"Email không hợp lệ!";
        echo "<pre>";
        print_r($err);
        echo "</pre>";
    }
?>

<div class="formForgot">
    <h2>Quên mật khẩu</h2>
    <form action="" method="POST" class="form">
        <label for="">
            <span>Email:</span>
            <input type="email" name="email" id="" placeholder="Email...">
            <input class="sendpass" name="sendpass" type="submit" value="Send">
        </label>
    </form>
</div>