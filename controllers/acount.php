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
        $email = $_REQUEST['email_login'];
        $password = $_REQUEST['password'];
        $data_login = $this->model->get_info_acount($email, sha1($password));
        if(count($data_login) > 0){ // dang nhap thanh cong
            Session::init();
            Session::set('loggedIn', true);
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
            if($this->model->check_dupliObj_phone($phone) > 0){ // kiem tra ton tai cua phone
                $jsonObj['msg'] = "This phone already exists";
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
                        if($this->send_mail($code, $email)){
                            $jsonObj['msg'] = "Sign Up Success";
                            $jsonObj['success'] = true;
                            $this->view->jsonObj = json_encode($jsonObj);
                        }else{
                            $this->model->delObj_acount_via_code($code);
                            $jsonObj['msg'] = "Registration failed";
                            $jsonObj['success'] = false;
                            $this->view->jsonObj = json_encode($jsonObj);
                        }
                    }else{
                        $jsonObj['msg'] = "Registration failed";
                        $jsonObj['success'] = false;
                        $this->view->jsonObj = json_encode($jsonObj);
                    }
                }
            }
        }
        $this->view->render("acount/do_register");
    }

    function notify(){
        require('layouts/global/header.php');
        $this->view->render('acount/notify');
        require('layouts/footer.php');
    }

    function active(){
        require('layouts/global/header.php');

        if(isset($_REQUEST['code'])){
            $code = base64_decode($_REQUEST['code']);
            $status = $this->model->check_exits_code_before_active($code);
            if(count($status) > 0){
                if($status[0]['active'] == 1){
                    $this->view->jsonObj = '<span style="color:red">Account has been activated, cannot be reactivated</span>';
                }else{
                    $data = array("active" => 1);
                    $temp = $this->model->updateObj_acount_pass_code($code, $data);
                    if($temp){
                        $this->view->jsonObj = '<span style="color:green">Congratulations, you have successfully activated your account. Please shop on Naturem.us</span>';
                    }else{
                        $this->view->jsonObj = '<span style="color:red">Account activation failed, please contact administrator for assistance</span>';
                    }
                }
            }else{
                $this->view->jsonObj = '<span style="color:red">Account does not exist</span>';
            }
        }else{
            $this->view->jsonObj = '<span style="color:red">Account does not exist</span>';
        }

        $this->view->render('acount/active');
        require('layouts/footer.php');
    }

    function logout(){
        session_start();
        //Session::destroy();
        session_destroy();
        header('Location: '.URL);
        exit;
    }
////////////////////////////////////////////////////////////////////////////////////////////////////
    function profile(){
        Session::init();
        $logged = Session::get('loggedIn');
        if($logged == false){
            session_start();
            session_destroy();
            header ('Location: '.URL.'/login.html');
            exit;
        }else{
            require('layouts/global/header.php');
            $this->view->render('acount/profile');
            require('layouts/footer.php');
        }
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function send_mail($code, $email){
        // gui email xac nhan cap nhat thong tin
        $message = file_get_contents(DIR.'/styles/email_confirm.html');
        $message = str_replace("####url_confirm####", URL.'/active_account.html?code='.base64_encode($code), $message);
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->CharSet = "UTF-8";
        $mail->Host = "mail.naturem.us";
        $mail->SMTPAuth = true;
		$mail->Port = 587;
        $mail->Username = "no-reply@naturem.us";
        $mail->Password = "2gyShlcAsZ6[";
        $mail->From = "no-reply@naturem.us";
        $mail->FromName = "Naturem.us";
        $mail->AddAddress($email);
        $mail->WordWrap = 50;
        $mail->IsHTML(true);
        $mail->Subject = "Active account";
        $mail->Body    = $message;
        $mail->AltBody = "asdfasfsdf";
        if(!$mail->Send()){
            $error = false;
        }else{
            $error = true;
        }
        return $error;
    }
}
?>
