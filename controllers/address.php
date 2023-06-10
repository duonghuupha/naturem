<?php
class Address extends Controller{
    function __construct(){
        parent::__construct();
    }

    function index(){
        require('layouts/global/header.php');
        $this->view->render('address/index');
        require('layouts/footer.php');
    }
}
?>
