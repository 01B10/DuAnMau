<!-- if(isset($_POST["dn"])){
    $err = [];
    $rg = '/^\w{5,20}$/';
    $name = $_POST["name"];
    $password = $_POST["matkhau"];
    $err["name"] = preg_match($rg,$name)?"":"Tên đăng nhập không hợp lệ!";
    $err["password"] = preg_match($rg,$password)?"":"Mật khẩu không hợp lệ!";
    print_r($err);
} -->


<div class="FormLogin">
    <h2>Tài khoản</h2>
    <form class="form"  method="POST">
        <label for="">
            <span>Tên đăng nhập:</span>
            <div class="boxForm">
                <input type="text" name="HoTen" placeholder="Tên đăng nhập...." value="<?php if(!empty($data["field"]["HoTen"])){echo $data["field"]["HoTen"];}?>">
                <p class="err"><?php echo (!empty($errors) && array_key_exists("HoTen",$errors))?$errors["HoTen"]:false;?></p>
            </div>
        </label>
        <label for="">
            <span>Mật khẩu:</span>
            <div class="boxForm">
                <input type="password" class="password" name="MK" placeholder="*****">
                <p class="err"><?php echo (!empty($errors) && array_key_exists("MK",$errors))?$errors["MK"]:false;?></p>
            </div>
        </label>
        <span class="forgot"><a href="ForgotPassword">Quên mật khẩu?</a></span>
        <input type="submit" name="btn" value="Đăng nhập">
    </form>
</div>