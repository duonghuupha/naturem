<?php
class Shopping extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/global/header.php');

        $jsonObj = $this->model->get_data_cart($_SESSION['data'][0]['id']);
        $this->view->jsonObj = $jsonObj;

        $this->view->render('shopping/index');
        require('layouts/footer.php');
    }

    function addcart(){
        $id = base64_decode($_REQUEST['id']); $qty = $_REQUEST['qty'];
        $cusid = $_SESSION['data'][0]['id'];
        if($this->model->check_pro_cus($cusid, $id) > 0){ // ton tai roi cap nhat them so luong
            $detail = $this->model->get_info_pro_cus($cusid, $id);
            $data = array("qty" => $qty + $detail[0]['qty']);
            $temp = $this->model->update_pro_cus($cusid, $id, $data);
            if($temp){
                $jsonObj['msg'] = '';
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = 'Update number failed';
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }else{ // khong ton tai san pham trong gio hang
            $data = array("code" => time(), "cus_id" => $cusid, "pro_id" => $id, "qty" => $qty, "status" => 0,
                            "create_at" => date("Y-m-d H:i:d"));
            $temp = $this->model->addObj_cart($data);
            if($temp){
                $jsonObj['msg'] = '';
                $jsonObj['success'] = true;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{
                $jsonObj['msg'] = 'Add product to cart failed';
                $jsonObj['success'] = false;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }
        $this->view->render("shopping/addcart");
    }

    function updatecart(){
        $id = base64_decode($_REQUEST['id']); $qty = $_REQUEST['qty'];
        $data = array("qty" => $qty);
        $temp = $this->model->updateObj_cart($id, $data);
        if($temp){
            $jsonObj['msg'] = '';
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = 'Update number failed';
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("shopping/updatecart");
    }

    function delcart(){
        $id = base64_decode($_REQUEST['id']);
        $temp = $this->model->delObj_cart($id);
        if($temp){
            $jsonObj['msg'] = '';
            $jsonObj['success'] = true;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = 'Delete product from cart failed';
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("shopping/delcart");
    }
}
?>
