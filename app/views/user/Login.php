<?php 
    if(isset($_POST["dn"])){
        $err = [];
        $rg = '/^\w{5,20}$/';
        $name = $_POST["name"];
        $password = $_POST["matkhau"];
        $err["name"] = preg_match($rg,$name)?"":"Tên đăng nhập không hợp lệ!";
        $err["password"] = preg_match($rg,$password)?"":"Mật khẩu không hợp lệ!";
        header("location: Trang-Chu");
    }
?>

<div class="FormLogin">
    <h2>Tài khoản</h2>
    <form class="form" action="" method="POST">
        <label for="">
            <span>Tên đăng nhập:</span>
            <div class="boxForm">
                <input type="text" name="name" placeholder="Tên đăng nhập...." value="<?php if(isset($err["name"])){echo $_POST["name"];}?>">
                <p class="err"><?php if(isset($err["name"])) echo $err["name"]?></p>
            </div>
        </label>
        <label for="">
            <span>Mật khẩu:</span>
            <div class="boxForm">
                <input type="password" class="password" name="matkhau" placeholder="*****">
                <p class="err"><?php if(isset($err["password"])) echo $err["password"]?></p>
            </div>
        </label>
        <span class="forgot"><a href="ForgotPassword">Quên mật khẩu?</a></span>
        <input type="submit" name="dn" value="Đăng nhập">
    </form>
</div>