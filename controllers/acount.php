<?php
class Acount extends Controller{
    function __construct(){
        parent::__construct();
    }

    function login(){
        require('layouts/global/header.php');
        $this->view->render('acount/login');
        require('layouts/footer.php');
    }

    function register(){
        require('layouts/global/header.php');
        $this->view->render('acount/register');
        require('layouts/footer.php');
    }

    function do_login(){
        $email = $_REQUEST['email'];
        $password = base64_decode($_REQUEST['password']);
        $data_login = $this->model->get_info_acount($email, sha1($password));
        if(count($data_login) > 0){ // dang nhap thanh cong
            $_SESSION['data'] = $data_login;
            $jsonObj['msg'] = "";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{// khong thanh cong
            $jsonObj['msg'] = "Login unsuccessful";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("acount/do_login");
    }

    function do_register(){
        $code = time(); $firstname = $_REQUEST['firstname']; $lastname = $_REQUEST['lastname'];
        $email = $_REQUEST['email_register']; $phone = $_REQUEST['phone']; $password = $_REQUEST['password'];
        $repass = $_REQUEST['re_pass']; $active = 0; $create_at = date("Y-m-d H:i:s");
        if($this->model->check_dupliObj_email($email) > 0){ // kiem tra ton tai cua email
            $jsonObj['msg'] = "This email already exists";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if(sha1($password) != sha1($repass)){ // kiem tra xa nhan mat khau
                $jsonObj['msg'] = "Password was wrong";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $data = array("code" => $code, "firstname" => $firstname, "lastname" => $lastname, "email" => $email,
                                "phone" => $phone, "password" => sha1($password), "newsletter" => 0, "active" => $active,
                                "create_at" => $create_at);
                $temp = $this->model->addObj_acount($data);
                if($temp){
                    $jsonObj['msg'] = "Sign Up Success";
                    $jsonObj['success'] = true;
                    $this->view->jsonObj = json_encode($jsonObj);
                }else{
                    $jsonObj['msg'] = "Registration failed";
                    $jsonObj['success'] = false;
                    $this->view->jsonObj = json_encode($jsonObj);
                }
            }
        }
        $this->view->render("acount/do_register");
    }
}
?>
