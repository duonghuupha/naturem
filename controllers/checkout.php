<?php
class Checkout extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/global/header.php');
        $this->view->render('checkout/index');
        require('layouts/footer.php');
    }
}
?>
