<?php 
    if(isset($_POST["dk"])){
        $err = [];
        $rg = '/^\w{5,20}$/';
        $name = $_POST["name"];
        $password = $_POST["matkhau"];
        $email = $_POST["email"];
        $err["name"] = preg_match($rg,$name)?"":"Tên đăng nhập không hợp lệ!";
        $err["password"] = preg_match($rg,$password)?"":"Mật khẩu không hợp lệ!";
        $err["email"] = filter_var($email,FILTER_VALIDATE_EMAIL)?"":"Email không hợp lệ!";
        echo "<pre>";
        print_r($err);
        echo "</pre>";
    }
?>

<div class="FormRegister">
    <h2>Đăng ký tài khoản</h2>
    <form class="form" action="" method="POST">
        <label for="">
            <span>Tên đăng nhập:</span>
            <div class="boxForm">
                <input type="text" name="name" placeholder="Tên đăng nhập....">
                <p class="err">hello</p>
            </div>
        </label>
        <label for="">
            <span>Email:</span>
            <div class="boxForm">
                <input type="text" name="email" placeholder="Email....">
                <p class="err">hello</p>
            </div>
        </label>
        <label for="">
            <span>Mật khẩu:</span>
            <div class="boxForm">
                <input type="text" class="password" name="matkhau" placeholder="*****">
                <p class="err">hello</p>
            </div>
        </label>
        <input type="submit" name="dk" value="Đăng ký">
    </form>
</div>