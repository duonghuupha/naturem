<?php
$item = $this->jsonObj;
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Account</h1>
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
                <div class="woocommerce-info"> Change Password 
                </div>
            </div>
            <form id="fm-change-pass" class="woocommerce-form-login" onsubmit="change_pass()">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Current Password *</label> 
                            <input type="password" class="form-control" placeholder="Current Password" 
                            id="cu_pass" name="cu_pass" required="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>New Password *</label> 
                            <input type="password" class="form-control" placeholder="New Password" id="pass" 
                            name="pass" required="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Re-Pass *</label> 
                            <input type="password" class="form-control" placeholder="Re-pass" id="re_pass" 
                            name="re_pass" required="">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <button type="button" class="vs-btn shadow-none" onclick="change_pass()">Save</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    