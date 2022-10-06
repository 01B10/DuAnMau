<?php 
    class product extends controller{
        public $model,$data,$dataForm;
        function __construct()
        {
            $this->model = $this->model("clientModel");
        }

        function index(){
            $data = [
                "MaLoai" => "",
                "TenLoai" => "Do Giat"
            ];
            $this->db->table("loai")->where("MaLoai","=",14)->delete();
        }

        function get_cat(){
            $request = new Request();
            $data = $request->getFields();
            echo "<pre>";
            print_r($data);
            echo "</pre>";
            $this->render("user/Register");
        }

        function post_cat(){
            $request = new Request();
        
            $request->rules([
                "fullname" => "required|min:5|max:30|unique:taikhoan:fullname",
                "email" => "required|email|min:6|unique:taikhoan:email",
                "password" => "required|min:5",
                "confirm_password" => "required|min:5|match:password"
            ]);

            $request->message([
                "fullname.required" => "Họ tên không được để trống",
                "fullname.min" => "Họ tên phải lớn hơn 5 kí tự",
                "fullname.max" => "Họ tên phải nhỏ hơn 30 kí tự",
                "fullname.unique" => "Họ tên đã tồn tại",
                "email.required" => "Email không được để trống",
                "email.email" => "Định dạng email không hợp lệ",
                "email.min" => "Email phải lớn hơn 6 kí tự",
                "email.unique" => "Email đã tồn tại",
                "password.required" => "Mật khẩu không được để trống",
                "password.min" => "Mật khẩu phải lớn hơn 5 kí tự",
                "confirm_password.required" => "Nhập lại mật khẩu không được để trống",
                "confirm_password.min" => "Nhập lại mật khẩu phải lớn hơn 5 kí tư",
                "confirm_password.match" => "Mật khẩu nhập lại không khớp"
            ]);

            $validate = $request->validate();
            if(!$validate){
                $this->dataForm["errors"] = $request->errors();
            }else{
                $this->dataForm["errors"] = "";
                $data = $request->getFields();
                unset($data["confirm_password"]);
                $this->db->table("taikhoan")->insert($data);
            }
            $this->render("user/Register",$this->dataForm);

            // $response = new Response();
            // $response->redirect("product/get_cat");
            // echo "<pre>";
            // print_r($request->errors);
            // echo "</pre>";
        }

        function list_product(){
            $this->data["sub_content"]["list"] = $this->model->getList();
            $this->data["content"] = "product/list";
            $this->data["name"] = "Tivi";
            $this->render("layout/client_layout",$this->data);
        }

        function detail($id = 0){
            $this->data["sub_sp"]["sp"] = $this->model->ds();
            $this->data["content"] = "product/list";
            $this->render("layout/client_layout",$this->data);
        }

        function test(){
            $this->data["content"] = "product/test";
            $this->render("layout/client_layout",$this->data);
        }


        function data(){
            $this->model->Insert();
        }

        function Delete(){
            $this->model->Delete();
        }

    }
?>