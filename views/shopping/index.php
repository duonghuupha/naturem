<?php
$jsonObj = $this->jsonObj;
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Cart</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="vs-cart-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message">Shipping costs updated.</div>
            </div>
            <form class="woocommerce-cart-form">
                <table class="cart_table">
                    <thead>
                        <tr>
                            <th class="cart-col-image">Image</th>
                            <th class="cart-col-productname">Product Name</th>
                            <th class="cart-col-price">Price</th>
                            <th class="cart-col-quantity">Quantity</th>
                            <th class="cart-col-total">Total</th>
                            <th class="cart-col-remove">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total = 0;
                        foreach($jsonObj as $row){
                            $width = 91; $height = 92;
                            $img_src = $this->_Convert->convert_img('product/'.$row['code_sp'].'/', $row['image'], $width, $height, 2);
                            $total += ($row['price'] * $row['qty']);
                        ?>
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-product-'.base64_encode($row['pro_id']).'.html' ?>">
                                    <img width="91" 
                                        height="91" 
                                        src="<?php echo URL_IMAGE.'/product/'.$row['code_sp'].'/'.$width.'x'.$height.'/'.$img_src ?>" 
                                        alt="<?php echo $row['title'] ?>">
                                </a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-product-'.base64_encode($row['pro_id']).'.html' ?>">
                                    <?php echo $row['title'] ?>
                                </a>
                            </td>
                            <td data-title="Price">
                                <span class="amount">
                                    <bdi><span>$</span><?php echo $row['price'] ?></bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qut-btn">
                                        <i class="far fa-minus"></i>
                                    </button> 
                                    <input type="number" class="qty-input" value="<?php echo $row['qty'] ?>" min="1" max="<?php echo $row['stock'] ?>"
                                    id="qty-input-<?php echo $row['id'] ?>" name="qty-input-<?php echo $row['id'] ?>"> 
                                    <button class="quantity-plus qut-btn">
                                        <i class="far fa-plus"></i>
                                    </button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount">
                                    <bdi><span>$</span><?php echo number_format($row['price'] * $row['qty']) ?></bdi>
                                </span>
                            </td>
                            <td data-title="Remove">
                                <a href="javascript:void(0)" class="remove" onclick="update_from_cart(<?php echo $row['id'] ?>)">
                                    <i class="fal fa-sync"></i>
                                </a>
                                &nbsp;
                                <a href="javascript:void(0)" class="remove" onclick="del_from_cart(<?php echo $row['id'] ?>)">
                                    <i class="fal fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="6" class="actions">
                                <a href="<?php echo URL ?>" class="vs-btn rounded-1 shadow-none">Continue Shopping</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
            <div class="row justify-content-end">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <h2 class="h4 summary-title">
                        Cart Totals: 
                        <strong>
                            <span class="amount"><bdi><span>$</span><?php echo number_format($total) ?></bdi></span>
                        </strong>
                    </h2>
                    <div class="wc-proceed-to-checkout mb-30">
                        <a href="<?php echo URL.'/checkout.html' ?>" class="vs-btn rounded-1 shadow-none <?php echo ($total != 0) ? '' : 'disabled' ?>">
                            Proceed to checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>