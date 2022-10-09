<?php 
    class home extends controller{
        public $model_home,$data;

        function __construct()
        {
            session_start();
            $this->model_home = $this->model("clientModel");
            $this->data["danhmuc"] = $this->model_home->listData("loai","*");
            $this->data["SPLove"] = $this->model_home->Top10("hanghoa","SoLuotXem","SoLuotXem","DESC",0,10);
        }
        
        function index(){
            $this->data["content"] = "user/TrangChu";
            $this->data["listProduct"] = $this->model_home->listData("hanghoa","*");
            $this->render("layout/client_layout",$this->data);
        }

        function Register(){
            $request = new Request();

            $this->data["field"] = $request->getFields();

        
            $request->rules([
                "HoTen" => "required|min:5|max:30|unique:khachhang:HoTen",
                "Email" => "required|email|min:6|unique:khachhang:Email",
                "MK" => "required|min:5",
                "confirm_password" => "required|min:5|match:MK",
            ]);

            $request->message([
                "HoTen.required" => "Họ tên không được để trống",
                "HoTen.min" => "Họ tên phải lớn hơn 5 kí tự",
                "HoTen.max" => "Họ tên phải nhỏ hơn 30 kí tự",
                "HoTen.unique" => "Họ tên đã tồn tại",
                "Email.required" => "Email không được để trống",
                "Email.email" => "Định dạng email không hợp lệ",
                "Email.min" => "Email phải lớn hơn 6 kí tự",
                "Email.unique" => "Email đã tồn tại",
                "HinhAnh.checkfile" => "Hình ảnh không được để trống",
                "MK.required" => "Mật khẩu không được để trống",
                "MK.min" => "Mật khẩu phải lớn hơn 5 kí tự",
                "confirm_password.required" => "Nhập lại mật khẩu không được để trống",
                "confirm_password.min" => "Nhập lại mật khẩu phải lớn hơn 5 kí tư",
                "confirm_password.match" => "Mật khẩu nhập lại không khớp",
            ]);

            if(!empty($_POST["btn"])){
                $validate = $request->validate();
            if(!$validate){
                $this->data["errors"] = $request->errors();
            }else{
                $this->data["errors"] = "";
                unset($this->data["field"]["confirm_password"]);
                unset($this->data["field"]["btn"]);
                $this->data["field"]["HinhAnh"] = $_FILES["HinhAnh"]["name"];
                $check = $this->db->table("khachhang")->insert($this->data["field"]);
                if($check){
                    $this->data["field"] = "";
                    echo "<script>alert('Đăng ký thành công!')</script>";
                }
            }
        }
            $this->data["content"] = "user/register";
            $this->render("layout/client_layout",$this->data);
        }

        function Login(){
            $request = new Request();

            $this->data["field"] = $request->getFields();

            $request->rules([
                "HoTen" => "required|min:5|max:30|",
                "MK" => "required|min:5",
            ]);

            $request->message([
                "HoTen.required" => "Họ tên không được để trống",
                "HoTen.min" => "Họ tên phải lớn hơn 5 kí tự",
                "HoTen.max" => "Họ tên phải nhỏ hơn 30 kí tự",
                "MK.required" => "Mật khẩu không được để trống",
                "MK.min" => "Mật khẩu phải lớn hơn 5 kí tự",
            ]);

            if(!empty($_POST["btn"])){
                $validate = $request->validate();
            if(!$validate){
                $this->data["errors"] = $request->errors();
            }else{
                $this->data["errors"] = "";
                $data = $request->getFields();
                unset($data["confirm_password"]);
                if(!empty($this->data["field"])){
                    $check = $this->db->table("khachhang")->where("HoTen","=",$this->data["field"]["HoTen"])
                    ->where("MK","=",$this->data["field"]["MK"])->get();
                    if(!$check){
                        echo "<script>alert('Tên đăng nhập hoặc mật khẩu không đúng!')</script>";
                    }else{
                        $_SESSION["Login"]["user"] = $check[0];
                        $response = new Response();
                        $response->redirect("Welcome");
                    }
                }
                
            }
            }
            $this->data["content"] = "user/login";
            $this->render("layout/client_layout",$this->data);
        }

        function Welcome(){
            if(isset($_SESSION["Login"]["user"])){
                $this->data["content"] = "user/Welcome";
                $this->data["user"] = $_SESSION["Login"]["user"];
                $this->render("layout/client_layout",$this->data);
            }
        }

        function LogOut(){
            session_unset();
            session_destroy();
            $response = new Response();
            $response->redirect("Trang-Chu");
        }

        function ForgotPassword(){
            $request = new Request();

            $this->data["field"] = $request->getFields();
        
            $request->rules([
                "Email" => "required|email|min:6|notexist:khachhang:Email",
            ]);

            $request->message([
                "Email.required" => "Email không được để trống",
                "Email.email" => "Định dạng email không hợp lệ",
                "Email.min" => "Email phải lớn hơn 6 kí tự",
                "Email.notexist" => "Email không tồn tại",
            ]);

            if(!empty($_POST["sendpass"])){
                $validate = $request->validate();
                if(!$validate){
                    $this->data["errors"] = $request->errors();
                }else{
                    $this->data["errors"] = "";
                    unset($this->data["field"]["confirm_password"]);
                    $pass = $this->data["pass"] = $this->model_home->detailData("khachhang","MK","Email",$this->data["field"]["Email"]);
                    if(!empty($pass)){
                        $this->data["field"] = "";
                        echo "<script>alert('Mật khẩu của bạn là: ".$pass[0]["MK"]."')</script>";
                    }
                    
                }
            }

            $this->data["content"] = "user/forgotpassword";
            $this->render("layout/client_layout",$this->data);
        }

        function Products(){
            if(!empty($_GET["IdProduct"])){
                $this->data["detailProduct"] = $this->model_home->detailData("hanghoa","*","MaHangHoa",$_GET["IdProduct"]);
                $this->data["SPCL"] = $this->model_home->detailData("hanghoa","*","MaLoaiHang",$this->data["detailProduct"][0]["MaLoaiHang"]);
                for($i = 0; $i < count($this->data["SPCL"]); $i++){
                    if($this->data["SPCL"][$i]["MaHangHoa"] == $_GET["IdProduct"]){
                        unset($this->data["SPCL"][$i]);
                        break;
                    };
                }
                $view = $this->model_home->detailData("hanghoa","SoLuotXem","MaHangHoa",$_GET["IdProduct"]);
                $views = [
                    "SoLuotXem" => $view[0]["SoLuotXem"] + 1
                ];
                $this->model_home->updateView($views,$_GET["IdProduct"]);
                $this->data["db"] = "";
            }
            $this->data["content"] = "user/detailProduct/Products";
            $this->render("layout/client_layout",$this->data);
        }

        function danhmuc(){
            if(isset($_GET["Iddm"])){
                $this->data["listProduct"] = $this->model_home->detailData("hanghoa","*","MaLoaiHang",$_GET["Iddm"]);
                $this->data["TenLoai"] = $this->model_home->detailData("loai","TenLoai","MaLoai",$_GET["Iddm"]);
            }elseif(isset($_GET["key"])){
                $this->data["listProduct"] = $this->model_home->searchSP($_GET["key"]);
            }
            $this->data["content"] = "user/danhmuc";
            $this->render("layout/client_layout",$this->data);
        }

        function SearchSP(){
            if(isset($_GET["key"])){
                $this->data["listProduct"] = $this->model_home->searchSP($_GET["key"]);
                $this->data["content"] = "user/danhmuc";
                $this->render("layout/client_layout",$this->data);
            }
        }

        function formComment(){
            $this->data["contentDef"] = "user/formComment";
            if(!empty($_POST["send"])){
                if(isset($_SESSION["Login"]["user"])){
                    if(!empty($_POST["NoiDung"])){
                        date_default_timezone_set("Asia/Ho_Chi_Minh");
                        $this->data["field"]["MaKH"] = $_SESSION["Login"]["user"]["MaKH"];
                        $this->data["field"]["MaSP"] = $_GET["IdProduct"];
                        $this->data["field"]["ThoiGianGui"] = date("y/m/d h:i:s");
                        $this->data["field"]["NoiDung"] = $_POST["NoiDung"];
                        $this->db->table("binhluan")->insert($this->data["field"]);
                    }
                }else{
                    echo "<script>alert('Bạn cần đăng nhập để bình luận')</script>";
                }
            }
            $this->data["listBL"] = $this->model_home->listJoin("binhluan","MaSP",$_GET["IdProduct"],"*","khachhang","binhluan.MaKH = khachhang.MaKH","MaBL","INNER","DESC");
            $this->render("layout/client_layout",$this->data);
        }
    }
?>