<?php
class Address extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/global/header.php');

        $jsonObj = $this->model->getFetObj($this->_Info[0]['id']);
        $this->view->jsonObj = $jsonObj;

        $this->view->render('address/index');
        require('layouts/footer.php');
    }

    function add(){
        require('layouts/global/header.php');
        $this->view->render('address/add');
        require('layouts/footer.php');
    }

    function do_add(){
        $state_code = $_REQUEST['state_code']; $zipcode = $_REQUEST['postcode'];
        $firstname = $_REQUEST['firstname']; $lastname = $_REQUEST['lastname'];
        $phone = $_REQUEST['phone']; $state = $_REQUEST['state']; $city = $_REQUEST['city'];
        $address = $_REQUEST['address']; $code = time(); $cusid = $_SESSION['data'][0]['id'];
        $data = array("code" => $code, "firstname" => $firstname, "lastname" => $lastname, "phone" => $phone,
                        "address" => $address, "city" => $city, "postcode" => $zipcode, "code_state" => $state_code,
                        "state" => $state, "default_add" => 0, "status" => 1, "cus_id" => $cusid);
        $temp = $this->model->addObj($data);
        if($temp){
            $jsonObj['msg'] = "Record data successfully";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Data write failed";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("address/do_add");
    }

    function update(){
        require('layouts/global/header.php');

        $id = base64_decode($_REQUEST['id']);
        $jsonObj = $this->model->get_info($id);
        $this->view->jsonObj = $jsonObj;

        $this->view->render('address/update');
        require('layouts/footer.php');
    }

    function do_update(){
        $id = $_REQUEST['id_add'];
        $state_code = $_REQUEST['state_code']; $zipcode = $_REQUEST['postcode'];
        $firstname = $_REQUEST['firstname']; $lastname = $_REQUEST['lastname'];
        $phone = $_REQUEST['phone']; $state = $_REQUEST['state']; $city = $_REQUEST['city'];
        $address = $_REQUEST['address']; $code = time(); $cusid = $_SESSION['data'][0]['id'];
        $data = array( "firstname" => $firstname, "lastname" => $lastname, "phone" => $phone,
                        "address" => $address, "city" => $city, "postcode" => $zipcode, "code_state" => $state_code,
                        "state" => $state, "cus_id" => $cusid);
        $temp = $this->model->updateObj($id, $data);
        if($temp){
            $jsonObj['msg'] = "Record data successfully";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Data write failed";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("address/do_update");
    }

    function del(){
        $id = base64_decode($_REQUEST['id']);
        $temp = $this->model->delObj($id);
        if($temp){
            $jsonObj['msg'] = "Successfully deleted address";
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Address deletion failed";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("address/del");
    }

    function change(){
        $id = base64_decode($_REQUEST['id']);
        // update all
        $tmp = $this->model->updateObj_all();
        if($tmp){
            $data = array("default_add" => 1);
            $temp = $this->model->updateObj($id, $data);
            if($temp){
                $jsonObj['msg'] = "Record data successfully";
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = "Data write failed";
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{
            $jsonObj['msg'] = "Data write failed";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("address/change");
    }
/////////////////////////////////////////////////////////////////////////////////////////////////
    function check_code(){
        $zip_code = base64_decode($_REQUEST['postcode']);
        $apikey = "01H2S7KFPP3YAGE7HSRP5BM0M3";
        $json = file_get_contents("https://api.zipcodestack.com/v1/search?codes=".$zip_code."&country=us&apikey=".$apikey);
        $data = json_decode($json, true);
        if(count($data['results']) == 0){
            $jsonObj['msg'] = "Invalid zip code";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "Valid zip code";
            $jsonObj['success'] = true;
            $jsonObj['results'] = $data['results'];
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("address/check_code");
    }
}
?>
