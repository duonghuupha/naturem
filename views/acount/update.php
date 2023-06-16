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
                <div class="woocommerce-info"> Please Enter Your Information 
                </div>
            </div>
            <form id="fm-update" class="woocommerce-form-login" onsubmit="update_acount()">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Firstname *</label> 
                            <input type="text" class="form-control" placeholder="Firstname" id="firstname" 
                            name="firstname" required="" value="<?php echo $item[0]['firstname'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Lastname *</label> 
                            <input type="text" class="form-control" placeholder="Lastname" id="lastname" 
                            name="lastname" required="" value="<?php echo $item[0]['lastname'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Phone *</label> 
                            <input type="text" class="form-control" placeholder="Phone" onkeypress="validate(event)"
                            id="phone" name="phone" required="" value="<?php echo $item[0]['phone'] ?>">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <button type="button" class="vs-btn shadow-none" onclick="update_acount()">Save</button>
                            <button type="button" class="vs-btn shadow-none" onclick="window.location.href='<?php echo URL.'/change-pass.html' ?>'">Change password</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    