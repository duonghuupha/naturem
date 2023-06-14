<div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Address Book</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Address</li>
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
            <form id="fm-add-address" class="woocommerce-form-login">
                <input id="state_code" name="state_code" type="hidden"/>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Zip Code *</label> 
                            <input type="text" class="form-control" placeholder="Zip Code" onkeypress="validate(event)"
                            id="postcode" name="postcode" required="" maxlength="5">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <button type="button" class="vs-btn shadow-none" onclick="load_info_add()">
                                <i class="fa fa-sync"></i>
                                Load
                            </button>
                        </div>
                    </div>
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Firstname *</label> 
                            <input type="text" class="form-control" placeholder="Firstname" id="firstname" 
                            name="firstname" required="" readonly="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Lastname *</label> 
                            <input type="text" class="form-control" placeholder="Lastname" id="lastname" 
                            name="lastname" required="" readonly="">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Phone *</label> 
                            <input type="text" class="form-control" placeholder="Phone" id="phone" 
                            name="phone" required="" onkeypress="validate(event)">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>State *</label> 
                            <input type="text" class="form-control" placeholder="State" id="state" 
                            name="state" required="" readonly="true">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>City *</label> 
                            <input type="text" class="form-control" placeholder="City" id="city" 
                            name="city" required="" readonly="true">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Street Address *</label> 
                            <input type="text" class="form-control" placeholder="Street Address" id="address" 
                            name="address" required="" readonly="">
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <button type="button" class="vs-btn shadow-none" onclick="save_address()">
                                <i class="fa fa-save"></i>
                                Save
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    