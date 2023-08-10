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
        $addid = $_REQUEST['addid']; $total = $_REQUEST['total_cart']; $service_ship = $_REQUEST['service_ship'];
        $cardnumber = $_REQUEST['cardnumber']; $month = $_REQUEST['month']; $year = $_REQUEST['year'];
        $cvv = $_REQUEST['cvv']; $code = time(); $comment = $_REQUEST['comment']; $price_ship = $_REQUEST['price_ship'];
        $data = array("code" => $code, "cus_id" => $_SESSION['data'][0]['id'], "create_at" => date("Y-m-d H:i:s"),
                        "coupon" => "", "address_id" => $addid, "comment" => $comment, "status" => 0,
                        "auth_code" => '', "transid" => 0, 'service_ship' => $service_ship, "ship_price" => $price_ship);
        $temp = $this->model->addObj_order($data);
        if($temp){
            $detail = $this->model->get_data_cart($_SESSION['data'][0]['id']);
            foreach($detail as $row){
                $data_detail = array("code" => $code, "product_id" => $row['pro_id'], "price_old" => $row['price'],
                                        "price_new" => $row['price'], "combo_code" => "", "qty" => $row['qty']);
                $this->model->addObj_order_detail($data_detail); $this->model->delObj_pro_of_cart($row['pro_id'], $_SESSION['data'][0]['id']);
            }
            $data_payment = array("amout" => $total+$price_ship, "adddress" => $addid, "cardnumber" => $cardnumber,
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
///////////////////////////////////////////////////////////////////////////////////////////////////////
    function price(){
        $json_cart = $this->model->get_data_cart($_SESSION['data'][0]['id']);
        $address = $this->model->get_data_address($_SESSION['data'][0]['id']);
        $setting_pay = $this->model->setting_payment();
        /// tinh ton tien gio hang
        $total = 0; $pounds = 0; $ounces = 0;
        foreach($json_cart as $row_cart){
            $price = $row_cart['qty'] * $row_cart['price'];
            $total += $price;
            $pounds += $row_cart['pounds']; $ounces += $row_cart['ounces'];
        }
        /// lay thong tin dia chi
        if(count($address) > 0){
            $z = 0;
            foreach($address as $row_add){
                $z++;
                if($row_add['default_add'] == 1){
                    $zipcode = $row_add['postcode'];
                }else{
                    if($z == 1){
                        $zipcode = $row_add['postcode'];
                    }
                }
            }
        }else{
            $zipcode = 0;
        }
        if($total == 0){
            $jsonObj['msg'] = "Total amount must be more than 0";
            $jsonObj['success'] = 1;
            $this->view->jsonObj = json_encode($jsonObj);
        }else{
            if($zipcode == 0){
                $jsonObj['msg'] = "The delivery address has not been set";
                $jsonObj['success'] = 2;
                $this->view->jsonObj = json_encode($jsonObj);
            }else{ // tinh tien ship
                $price = $this->ground($setting_pay[0]['zip_code'], $zipcode, $pounds, $ounces);
                $jsonObj['msg'] = '';
                $jsonObj['price'] = $price;
                $jsonObj['success'] = 0;
                $this->view->jsonObj = json_encode($jsonObj);
            }
        }

        $this->view->render("checkout/price");
    }

    function change_ship(){
        $service = base64_decode($_REQUEST['service_ship']);
        $json_cart = $this->model->get_data_cart($_SESSION['data'][0]['id']);
        $address = $this->model->get_data_address($_SESSION['data'][0]['id']);
        $setting_pay = $this->model->setting_payment();
        /// tinh ton tien gio hang
        $total = 0; $pounds = 0; $ounces = 0;
        foreach($json_cart as $row_cart){
            $price = $row_cart['qty'] * $row_cart['price'];
            $total += $price;
            $pounds += $row_cart['pounds']; $ounces += $row_cart['ounces'];
        }
        /// lay thong tin dia chi
        if(count($address) > 0){
            $z = 0;
            foreach($address as $row_add){
                $z++;
                if($row_add['default_add'] == 1){
                    $zipcode = $row_add['postcode'];
                }else{
                    if($z == 1){
                        $zipcode = $row_add['postcode'];
                    }
                }
            }
        }else{
            $zipcode = 0;
        }
        if($service == 1){
            $price = $this->ground($setting_pay[0]['zip_code'], $zipcode, $pounds, $ounces);
        }elseif($service == 2){
            $price = $this->priority($setting_pay[0]['zip_code'], $zipcode, $pounds, $ounces);
        }else{
            $price = $this->express($setting_pay[0]['zip_code'], $zipcode, $pounds, $ounces);
        }
        $jsonObj['price'] = $price;
        $jsonObj['success'] = 0;
        $this->view->jsonObj = json_encode($jsonObj);
        $this->view->render('checkout/change_ship');
    }

    function ground($fromcode, $tocode, $pounds, $ounces){
        $input_xml = <<<EOXML
        <RateV4Request USERID="9SVKHEZ345713" PASSWORD="I4784LR04T2714A">
            <Revision>2</Revision>
            <Package ID="0">
                <Service>GROUND ADVANTAGE</Service>
                <ZipOrigination>$fromcode</ZipOrigination>
                <ZipDestination>$tocode</ZipDestination>
                <Pounds>$pounds</Pounds>
                <Ounces>$ounces</Ounces>
                <Container></Container>
                <Width></Width>
                <Length></Length>
                <Height></Height>
                <Girth></Girth>
                <Machinable>TRUE</Machinable>
            </Package>
        </RateV4Request>
        EOXML;
        $fields = array(
            'API' => 'RateV4',
            'XML' => $input_xml
        );
        $url = 'https://secure.shippingapis.com/ShippingAPI.dll?' . http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        curl_close($ch);
        $array_data = simplexml_load_string($data);
        return $array_data;
    }

    function priority($fromcode, $tocode, $pounds, $ounces){
        $input_xml = <<<EOXML
        <RateV4Request USERID="9SVKHEZ345713" PASSWORD="I4784LR04T2714A">
            <Revision>2</Revision>
            <Package ID="0">
                <Service>PRIORITY</Service>
                <ZipOrigination>$fromcode</ZipOrigination>
                <ZipDestination>$tocode</ZipDestination>
                <Pounds>$pounds</Pounds>
                <Ounces>$ounces</Ounces>
                <Container></Container>
                <Width></Width>
                <Length></Length>
                <Height></Height>
                <Girth></Girth>
                <Machinable>TRUE</Machinable>
            </Package>
        </RateV4Request>
        EOXML;
        $fields = array(
            'API' => 'RateV4',
            'XML' => $input_xml
        );
        $url = 'https://secure.shippingapis.com/ShippingAPI.dll?' . http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        curl_close($ch);
        $array_data = simplexml_load_string($data);
        return $array_data;
    }

    function express($fromcode, $tocode, $pounds, $ounces){
        $input_xml = <<<EOXML
        <RateV4Request USERID="9SVKHEZ345713" PASSWORD="I4784LR04T2714A">
            <Revision>2</Revision>
            <Package ID="0">
                <Service>PRIORITY MAIL EXPRESS</Service>
                <ZipOrigination>$fromcode</ZipOrigination>
                <ZipDestination>$tocode</ZipDestination>
                <Pounds>$pounds</Pounds>
                <Ounces>$ounces</Ounces>
                <Container></Container>
                <Width></Width>
                <Length></Length>
                <Height></Height>
                <Girth></Girth>
                <Machinable>TRUE</Machinable>
            </Package>
        </RateV4Request>
        EOXML;
        $fields = array(
            'API' => 'RateV4',
            'XML' => $input_xml
        );
        $url = 'https://secure.shippingapis.com/ShippingAPI.dll?' . http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 300);
        $data = curl_exec($ch);
        curl_close($ch);
        $array_data = simplexml_load_string($data);
        return $array_data;
    }
}
?>
