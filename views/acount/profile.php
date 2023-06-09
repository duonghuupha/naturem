<?php
$item = $this->jsonObj;
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Profile</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Account</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="vs-checkout-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="woocommerce-form-login-toggle">
                <div class="woocommerce-info"> Profile 
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Email *</label> 
                        <div><?php echo $item[0]['email'] ?></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Firstname *</label> 
                        <div><?php echo $item[0]['firstname'] ?></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Lastname *</label> 
                        <div><?php echo $item[0]['lastname'] ?></div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label>Phone *</label> 
                        <div><?php echo $item[0]['phone'] ?></div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <div class="form-group">
                        <button type="button" class="vs-btn shadow-none">Update</button>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="form-group">
                        <button type="button" class="vs-btn shadow-none" onclick="window.location.href='<?php echo URL.'/manager_address.html' ?>'">Manage address</button>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <div class="form-group">
                        <button type="button" class="vs-btn shadow-none" onclick="window.location.href='<?php echo URL.'/my_orders.html' ?>'">Purchase history</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    