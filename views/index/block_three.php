<section class="sec-bg3 vs-shop-wrapper" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/shape/bg-00778.png">
    <div class="section-title text-center">
        <div class="sec-icon">
            <img src="<?php echo URL.'/styles/assets/img' ?>/icons/sec-icon-2.png" alt="icon">
        </div>
        <span class="sub-title4">Latest Arrivals</span>
        <h2 class="sec-title3">Feature Products</h2>
    </div>
    <div class="container position-relative">
        <div class="vs-carousel" 
            data-slide-show="1" 
            data-lg-slide-show="1" 
            data-md-slide-show="1"
            data-sm-slide-show="1" 
            data-fade="true" 
            id="shopSlide8440">
            <div id="BestSeller">
                <div class="row gx-2px justify-content-center">
                    <?php
                    for($i = 1; $i <= 8; $i++){
                    ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="vs-product-box3">
                            <div class="product-img">
                                <a href="shop-details.html">
                                    <img src="<?php echo URL.'/styles/assets/img' ?>/shop/product-3-1.png"
                                        alt="Product Image" 
                                        class="w-100">
                                </a>
                                <span class="product-tag2">New</span>
                                <span class="product-tag3">Sale</span>
                            </div>
                            <div class="actions-btn">
                                <a href="#" class="icon-btn"><i class="fal fa-heart"></i></a> 
                                <a href="#" class="vs-btn style4 cart-btn"><i class="fal fa-cart-plus"></i>Add To Cart</a>
                            </div>
                            <div class="product-content">
                                <div class="product-rating-box">
                                    5.0
                                    <div class="star-rating" 
                                        role="img"
                                        aria-label="Rated 5.00 out of 5">
                                        <span style="width:100%">Rated 
                                            <strong class="rating">5.00</strong> 
                                            out of 5
                                        </span>
                                    </div>
                                </div>
                                <h4 class="product-title">
                                    <a href="shop-details.html">Organic Apple Juice</a>
                                </h4>
                                <span class="price">
                                    <strong>$18.00</strong>
                                    <del>$47.00</del>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>