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
            <form action="#" class="woocommerce-cart-form">
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
                        <tr class="cart_item">
                            <td data-title="Product">
                                <a class="cart-productimage" href="#">
                                    <img width="91" height="91" src="<?php echo URL.'/styles/' ?>assets/img/cart/cat-img-1.png" alt="Image">
                                </a>
                            </td>
                            <td data-title="Name">
                                <a class="cart-productname" href="#">Parmesan Vegetable</a>
                            </td>
                            <td data-title="Price">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Quantity">
                                <div class="quantity">
                                    <button class="quantity-minus qut-btn">
                                        <i class="far fa-minus"></i>
                                    </button> 
                                    <input type="number" class="qty-input" value="1" min="1" max="99"> 
                                    <button class="quantity-plus qut-btn">
                                        <i class="far fa-plus"></i>
                                    </button>
                                </div>
                            </td>
                            <td data-title="Total">
                                <span class="amount"><bdi><span>$</span>18</bdi></span>
                            </td>
                            <td data-title="Remove">
                                <a href="#" class="remove"><i class="fal fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="6" class="actions">
                                <button type="submit" class="vs-btn style2 rounded-1 shadow-none">Update cart</button> 
                                <a href="#" class="vs-btn rounded-1 shadow-none">Continue Shopping</a>
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
                            <span class="amount"><bdi><span>$</span>47</bdi></span>
                        </strong>
                    </h2>
                    <div class="wc-proceed-to-checkout mb-30">
                        <a href="#" class="vs-btn rounded-1 shadow-none">
                            Proceed to checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>