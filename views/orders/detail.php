<?php
$item = $this->info; $add = $this->add;
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Order detail</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Orders</li>
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
                            <strong>Order code: </strong><?php echo $item[0]['code'] ?>
                            <strong>Order date: </strong><?php echo $item[0]['create_at'] ?>
                            <strong>Auth code: </strong><?php echo $item[0]['auth_code'] ?>
                            <strong>TransId: </strong><?php echo $item[0]['transid'] ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="col-12 form-group">
                            <label>Address ship</label> <br/>
                            <span><?php echo $add[0]['firstname'].' '.$add[0]['lastname'] ?></span><br/>
                            <span><?php echo $add[0]['phone'] ?></span><br/>
                            <span><?php echo $add[0]['address'] ?></span><br/>
                            <span><?php echo $add[0]['city'].', '.$add[0]['state'] ?></span><br/>
                            <span><?php echo $add[0]['postcode'] ?></span>
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
                        foreach($this->detail as $row_cart){
                            $price = $row_cart['qty'] * $row_cart['price_new'];
                            $total += $price;
                            $width = 91; $height = 92;
                            $img_src = $this->_Convert->convert_img('product/'.$row_cart['code_sp'].'/', $row_cart['image'], $width, $height, 2);
                        ?>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="javascript:void(0)">
                                    <img width="91" 
                                        height="91"
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
                                    <bdi><span>$</span><?php echo $row_cart['price_new'] ?></bdi>
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
                                <tr class="order-total">
                                    <th>Shipping</th>
                                    <td>
                                        <strong>
                                            <span class="amount">
                                                <bdi><span>$</span><?php echo $item[0]['ship_price'] ?></bdi>
                                            </span>
                                        </strong>
                                    </td>
                                </tr>
                                <tr class="order">
                                    <th>Shipping method</th>
                                    <td>
                                        <strong>
                                            <span class="amount">
                                                <bdi>
                                                    <?php
                                                    if($item[0]['service_ship'] == 1){
                                                        echo "Regular";
                                                    }elseif($item[0]['serrvice_ship'] == 2){
                                                        echo "Fast";
                                                    }else{
                                                        echo "Express";
                                                    }
                                                    ?>
                                                </bdi>
                                            </span>
                                        </strong>
                                    </td>
                                </tr>
                                <tr class="order-total">
                                    <th>Order Total</th>
                                    <td>
                                        <strong>
                                            <span class="amount">
                                                <bdi><span>$</span><?php echo $total + $item[0]['ship_price'] ?></bdi>
                                            </span>
                                        </strong>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>