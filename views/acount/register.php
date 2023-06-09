<div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Register</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Register</li>
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
            <form id="fm-register" class="woocommerce-form-login" onsubmit="register()">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Email *</label> 
                            <input type="text" class="form-control" placeholder="Email" id="email_register" 
                            name="email_register" required="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Password *</label> 
                            <input type="password" class="form-control" placeholder="Password" id="password" 
                            name="password" required="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Re-pass *</label> 
                            <input type="password" class="form-control" placeholder="Re-pass" id="re_pass" 
                            name="re_pass" required="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Firstname *</label> 
                            <input type="text" class="form-control" placeholder="Firstname" id="firstname" 
                            name="firstname" required="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Lastname *</label> 
                            <input type="text" class="form-control" placeholder="Lastname" id="lastname" 
                            name="lastname" required="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Phone *</label> 
                            <input type="text" class="form-control" placeholder="Phone" onkeypress="validate(event)"
                            id="phone" name="phone" required="">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <button type="button" class="vs-btn shadow-none" onclick="register()">Register</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    