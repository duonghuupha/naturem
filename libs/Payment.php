<?php
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
$data = base64_decode($_REQUEST['data']); $data = json_decode($data, true);
//print_r($data);
$detail_add = $this->_Data->get_detail_address($data['adddress']);
$ordercode = $data['code_order'];
$amount = $data['amout'];

$name = $detail_add[0]['firstname'].' '.$detail_add[0]['lastname'];
$street = $detail_add[0]['address'];
$city = $detail_add[0]['city'];
$state = $detail_add[0]['code_state'];
$zip = $detail_add[0]['post_code'];

$card = $data['cardnumber'];
$card_exp_month = $data['month'];
$card_exp_year = $data['year'];
$ex_date = $card_exp_year.'-'.$card_exp_month;
$cvv = $data['cvv'];
$email = $_SESSION['data'][0]['email'];

define("AUTHORIZENET_LOG_FILE","phplog");

    // Common setup for API credentials
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName("87ctYJGd3XKB");
    $merchantAuthentication->setTransactionKey("7X74275qkXDtyW6a");
    $refId = 'ref' . time();

    // ***************************************************************************
    // ***************************************************************************
    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($card);
    $creditCard->setExpirationDate($ex_date);
    $creditCard->setCardCode($cvv);  // add in
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);

    // Set the customer's identifying information
        $customerData = new AnetAPI\CustomerDataType();
        $customerData->setType("individual");
        $customerData->setEmail($email);
        // Order info
        $order = new AnetAPI\OrderType();
        $order->setInvoiceNumber($data['code_order']);
        $order->setDescription("Shopping in Naturem.us");

            // Set the customer's Bill To address add this section in
        $customerAddress = new AnetAPI\CustomerAddressType();
        $customerAddress->setFirstName($name);
        $customerAddress->setAddress($street);
        $customerAddress->setCity($city);
        $customerAddress->setState($state);
        $customerAddress->setZip($zip);
        $customerAddress->setCountry("USA");
    // end of customer billing info code

    // Create a transaction
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($amount);
    $transactionRequestType->setOrder($order); // add in
    $transactionRequestType->setCustomer($customerData); // add in
  	$transactionRequestType->setBillTo($customerAddress); // add in
    $transactionRequestType->setPayment($paymentOne);
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    // ***************************************************************************
    // ***************************************************************************

    if ($response != null){
        $tresponse = $response->getTransactionResponse();
        if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
            $authCode = $tresponse->getAuthCode(); $tranId = $tresponse->getTransId();
            $m = "1$".$authCode."$".$tranId."$".$ordercode;
            echo "
            <script>
                window.location.href='".URL."/notify_check.html?m=".base64_encode($m)."';
            </script>
            ";
            die();
        }else{
            $m = "2$".$ordercode;
            echo "
            <script>
                window.location.href='".URL."/notify_check.html?m=".base64_encode($m)."';
            </script>
            ";
            die();
        }
    }else{
        $m = "2$".$ordercode;
        echo "
        <script>
            window.location.href='".URL."/notify_check.html?m=".base64_encode($m)."';
        </script>
        ";
        die();
    }

?>