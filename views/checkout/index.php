    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Check out</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Check out</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="vs-checkout-wrapper space-top space-md-bottom">
        <div class="container">
            <form action="#" class="woocommerce-checkout mt-40">
                <div class="row">
                    <div class="col-lg-6">
                        <h2 class="h4">Billing Details</h2>
                        <div class="row gx-2">
                            <div class="row gx-2" id="info_address">
                            <?php
                            if(count($this->address) > 0){
                                $z = 0; $add_id = 0;
                                foreach($this->address as $row_add){
                                    $z++;
                                    if($row_add['default_add'] == 1){
                                        $add_id = $row_add['id'];
                                        echo "
                                        <span><b>Fullname:</b> ".$row_add['firstname']." ".$row_add['lastname']."</span>
                                        <span><b>Phone:</b> ".$row_add['phone']."</span>
                                        <span><b>Street address:</b> ".$row_add['address']."</span>
                                        <span><b>City:</b> ".$row_add['city']."</span>
                                        <span><b>State:</b> ".$row_add['state']." - ".$row_add['code_state']."</span>
                                        <span><b>Zip code:</b> ".$row_add['postcode']."</span>
                                        ";
                                    }else{
                                        if($z == 1){
                                            $add_id = $row_add['id'];
                                            echo "
                                            <span><b>Fullname:</b> ".$row_add['firstname']." ".$row_add['lastname']."</span>
                                            <span><b>Phone:</b> ".$row_add['phone']."</span>
                                            <span><b>Street address:</b> ".$row_add['address']."</span>
                                            <span><b>City:</b> ".$row_add['city']."</span>
                                            <span><b>State:</b> ".$row_add['state']." - ".$row_add['code_state']."</span>
                                            <span><b>Zip code:</b> ".$row_add['postcode']."</span>
                                            ";
                                        }
                                    }
                                }
                            ?>
                            </div>
                            <div class="col-lg-12" style="margin-top:10px;"></div>
                            <a href="javascript:void(0)" onclick="change_address()">
                                <i class="fa fa-sync"></i>
                                Change Address
                            </a>
                            <?php
                            }else{
                                $add_id = 0;
                            ?>
                            <button type="button" class="vs-btn shadow-none w200"
                                onclick="window.location.href='<?php echo URL.'/ad_add' ?>'">
                                <i class="fa fa-plus"></i>
                                Add Address
                            </button>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-12 form-group">
                            <label>Other Note</label>
                            <textarea cols="20" rows="5" class="form-control" id="note" name="note"
                                placeholder="Notes about your order, e.g. special notes for delivery."
                                style="resize:none"></textarea>
                        </div>
                    </div>
                </div>
            </form>
            <h4 class="mt-4 pt-lg-2">Your Order</h4>
            <form class="woocommerce-cart-form">
                <table class="cart_table mb-20">
                    <thead>
                        <tr>
                            <th class="cart-col-image">Image</th>
                            <th class="cart-col-productname">Product Name</th>
                            <th class="cart-col-price">Price</th>
                            <th class="cart-col-quantity">Quantity</th>
                            <th class="cart-col-total">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach($this->json_cart as $row_cart){
                            $price = $row_cart['qty'] * $row_cart['price'];
                            $total += $price;
                            $width = 91; $height = 92;
                            $img_src = $this->_Convert->convert_img('product/'.$row_cart['code_sp'].'/', $row_cart['image'], $width, $height, 2);
                        ?>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="javascript:void(0)">
                                    <img width="91" height="91"
                                        src="<?php echo URL_IMAGE.'/product/'.$row_cart['code_sp'].'/'.$width.'x'.$height.'/'.$img_src ?>"
                                        alt="<?php echo $row_cart['title'] ?>">
                                </a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="javascript:void(0)">
                                    <?php echo $row_cart['title'] ?>
                                </a>
                            </td>
                            <td data-title="Price">
                                <span class="amount">
                                    <bdi><span>$</span><?php echo $row_cart['price'] ?></bdi>
                                </span>
                            </td>
                            <td data-title="Quantity">
                                <strong class="product-quantity"><?php echo $row_cart['qty'] ?></strong>
                            </td>
                            <td data-title="Total">
                                <span class="amount">
                                    <bdi><span>$</span><?php echo $price ?></bdi>
                                </span>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <div class="pt-10 pt-lg-5 mb-30">
                <div class="woocommerce-checkout-payment">
                    <ul class="wc_payment_methods payment_methods methods">
                        <li class="wc_payment_method payment_method_regular">
                            <input id="payment_method_regular" 
                                type="radio"
                                class="input-radio" 
                                name="payment_method" 
                                value="bacs" 
                                checked="checked"
                                onclick="change_ship(1)"> 
                            <label for="payment_method_regular">Regular shipping</label>
                        </li>
                        <li class="wc_payment_method payment_method_fast">
                            <input id="payment_method_fast" 
                                type="radio"
                                class="input-radio" 
                                name="payment_method" 
                                value="cheque"
                                onclick="change_ship(2)"> 
                            <label for="payment_method_fast">Fast shipping</label>
                        </li>
                        <li class="wc_payment_method payment_method_express">
                            <input id="payment_method_express" 
                                type="radio"
                                class="input-radio" 
                                name="payment_method" 
                                value="cheque"
                                onclick="change_ship(3)"> 
                            <label for="payment_method_express">Express shipping</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border ps-2 py-2 border-light">
                <div class="row justify-content-lg-end">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <table class="checkout-ordertable mb-0">
                            <tbody>
                                <tr class="cart-subtotal">
                                    <th>Cart Subtotal</th>
                                    <td>
                                        <span class="amount">
                                            <bdi><span>$</span><?php echo $total ?></bdi>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th> Shipping</th>
                                    <td>
                                        <span class="amount">
                                            <bdi id="ship"><span>$</span><?php echo base64_decode($_REQUEST['price_ship']) ?></bdi>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td>
                                        <strong>
                                            <span class="amount">
                                                <bdi id="total_ship"><span>$</span><?php echo $total + base64_decode($_REQUEST['price_ship']) ?></bdi>
                                            </span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="pt-10 pt-lg-5 mb-30">
                <div class="woocommerce-checkout-payment">
                    <div class="woocommerce-notices-wrapper">
                        <div class="woocommerce-message">Payment Infomation.</div>
                    </div>
                    <form id="fm-order" class="woocommerce-form-login">
                        <input id="addid" name="addid" type="hidden" value="<?php echo $add_id ?>" />
                        <input id="total_cart" name="total_cart" type="hidden" value="<?php echo $total ?>" />
                        <input id="comment" name="comment" type="hidden" />
                        <input id="service_ship" name="service_ship" type="hidden" value="<?php echo base64_decode($_REQUEST['service_ship']) ?>"/>
                        <input id="price_ship" name="price_ship" type="hidden" value="<?php echo base64_decode($_REQUEST['price_ship']) ?>"/>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Card Number *</label>
                                    <input type="text" class="form-control" placeholder="Card Number" id="cardnumber"
                                        name="cardnumber" required="" onkeypress="validate(event)">
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Expiration Month *</label>
                                    <select class="form-control" id="month" name="month" required="">
                                        <?php
                                        for($i = 1; $i <= 12; $i++){
                                            echo "<option value='".$i."'>".$i."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>Expiration Year *</label>
                                    <select class="form-control" id="year" name="year" required="">
                                        <?php
                                        for($j = 2023; $j <= 2040; $j++){
                                            echo "<option value='".$j."'>".$j."</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label>CVV *</label>
                                    <input type="password" class="form-control" placeholder="CVV" id="cvv" name="cvv"
                                        required="" onkeypress="validate(event)" maxlength="3">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="form-row place-order">
                        <button type="button" class="vs-btn" onclick="checkout()">Place order</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="address_data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    style="z-index:999;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Address book</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="cart_table mb-20">
                        <thead>
                            <tr>
                                <th class="cart-col-productname">Country</th>
                                <th class="cart-col-price">State</th>
                                <th class="cart-col-quantity">City</th>
                                <th class="cart-col-total">Street address</th>
                                <th class="cart-col-total">Zip code</th>
                                <th class="cart-col-total">Phone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach($this->address as $row){
                            ?>
                            <tr>
                                <td colspan="5">
                                    <?php echo $row['firstname'].' '.$row['lastname'] ?>- Email: <?php echo $_SESSION['data'][0]['email'] ?>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td>USA</td>
                                <td id="state_<?php echo $row['id'] ?>"><?php echo $row['state'] ?></td>
                                <td id="city_<?php echo $row['id'] ?>"><?php echo $row['city'] ?></td>
                                <td id="street_<?php echo $row['id'] ?>"><?php echo $row['address'] ?></td>
                                <td id="zip_<?php echo $row['id'] ?>"><?php echo $row['postcode'] ?></td>
                                <td id="phone_<?php echo $row['id'] ?>"><?php echo $row['phone'] ?></td>
                                <td>
                                    <input id="ck_add_<?php echo $row['id'] ?>" name="ck_add_<?php echo $row['id'] ?>" 
                                    type="checkbox" onclick="confirm_address(<?php echo $row['id'] ?>)"/>
                                </td>
                                <td style="display:none" id="codestate_<?php echo $row['id'] ?>"><?php echo $row['code_state'] ?></td>
                                <td style="display:none" id="fullname_<?php echo $row['id'] ?>"><?php echo $row['firstname'].' '.$row['lastname'] ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php
    if($total == 0){
    ?>
    <script>
    window.location.href = baseUrl + '/cart.html';
    </script>
    <?php
    }
    ?>