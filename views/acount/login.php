    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Login</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Login</li>
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
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <form id="fm-login" class="woocommerce-form-login" onsubmit="login()">
                        <div class="form-group">
                            <label>Email *</label> 
                            <input type="text" class="form-control" placeholder="Email" id="email_login" required="" name="email_login">
                        </div>
                        <div class="form-group">
                            <label>Password *</label> 
                            <input type="password" class="form-control" placeholder="Password" id="password" required="" name="password">
                        </div>
                        <div class="form-group">
                            <div class="custom-checkbox">
                                <input type="checkbox" id="remembermylogin"> 
                                <label for="remembermylogin">Remember Me</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="button" class="vs-btn shadow-none" onclick="login()">Login</button>
                            <button type="button" class="vs-btn shadow-none" onclick="window.location.href='<?php echo URL.'/register.html' ?>'">Register</button>
                            <p class="fs-xs mt-2 mb-0">
                                <a class="text-reset" href="#">Lost your password?</a>
                            </p>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </div>
    