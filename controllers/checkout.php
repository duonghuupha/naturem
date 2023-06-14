<?php
class Checkout extends Controller{
    function __construct(){
        parent::__construct();
        parent::PhadhInt();
    }

    function index(){
        require('layouts/global/header.php');

        $json_cart = $this->model->get_data_cart($_SESSION['data'][0]['id']);
        $this->view->json_cart = $json_cart;
        ////////////////////////////////////////////////////////////////////////////////////////////
        $address = $this->model->get_data_address($_SESSION['data'][0]['id']);
        $this->view->address = $address;

        $this->view->render('checkout/index');
        require('layouts/footer.php');
    }

    function action(){
        $addid = $_REQUEST['addid']; $total = $_REQUEST['total_cart'];
        $cardnumber = $_REQUEST['cardnumber']; $month = $_REQUEST['month']; $year = $_REQUEST['year'];
        $cvv = $_REQUEST['cvv']; $code = time(); $comment = $_REQUEST['comment'];
        $data = array("code" => $code, "cus_id" => $_SESSION['data'][0]['id'], "create_at" => date("Y-m-d H:i:s"),
                        "coupon" => "", "address_id" => $addid, "comment" => $comment, "status" => 0,
                        "auth_code" => '', "transid" => 0);
        $temp = $this->model->addObj_order($data);
        if($temp){
            $detail = $this->model->get_data_cart($_SESSION['data'][0]['id']);
            foreach($detail as $row){
                $data_detail = array("code" => $code, "product_id" => $row['pro_id'], "price_old" => $row['price'],
                                        "price_new" => $row['price'], "combo_code" => "", "qty" => $row['qty']);
                $this->model->addObj_order_detail($data_detail); $this->model->delObj_pro_of_cart($row['pro_id'], $_SESSION['data'][0]['id']);
            }
            $data_payment = array("amout" => $total, "adddress" => $addid, "cardnumber" => $cardnumber,
                                "month" => $month, "year" => $year, "cvv" => $cvv, "code_order" => $code);
            $jsonObj['msg'] = "";
            $jsonObj['success'] = true;
            $jsonObj['data'] = json_encode($data_payment);
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            $jsonObj['msg'] = "An error occurred during ordering, please try again";
            $jsonObj['success'] = false;
            $this->view->jsonObj = json_encode($jsonObj);
        }
        $this->view->render("checkout/action");
    }

    function payment(){
        require('layouts/global/header.php');
        $this->view->render("checkout/payment");
        require('layouts/footer.php');
    }

    function notify(){
        require('layouts/global/header.php');

        $m = base64_decode($_REQUEST['m']); $m = explode("$", $m);
        if($m[0] == 1){
            $data = array("status" => 1, "auth_code" => $m[1], "transid" => $m[2]);
            $this->model->updateObj_order($m[3], $data);
        }else{
            $data = array("status" => 2);
            $this->model->updateObj_order($m[1], $data);
        }
        $this->view->m = $m[0];

        $this->view->render("checkout/notify");
        require('layouts/footer.php');
    }
}
?>
