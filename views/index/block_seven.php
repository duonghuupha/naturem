<section class="position-relative space-top space-md-bottom">
    <div class="sec-bg4" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/shape/bg-00779.png"></div>
    <div class="container">
        <div class="section-title text-center">
            <div class="sec-icon">
                <img src="<?php echo URL.'/styles/assets/img' ?>/icons/sec-icon-2.png" alt="icon">
            </div>
            <span class="sub-title4">Box contents change weekly</span>
            <h2 class="sec-title3">Our Most Popular Boxes</h2>
        </div>
        <div class="row vs-carousel" data-slide-show="3" data-lg-slide-show="3" data-sm-slide-show="1">
            <?php
            for($i = 1; $i <= 4; $i++){
            ?>
            <div class="col-xl-4">
                <div class="package-style1">
                    <div class="package-img">
                        <img src="<?php echo URL.'/styles/assets/img' ?>/package/p-1-1.jpg" alt="Package">
                    </div>
                    <div class="package-quantity" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/shape/pack-bg.png">
                        <div class="number">12</div>
                        <div class="label">Organic Varieties</div>
                    </div>
                    <div class="package-price">
                        $16.75<div class="text">/ Lowest</div>
                    </div>
                    <h3 class="package-title">Seasonal organic veg box - medium</h3>
                    <div class="package-list">
                        <ul>
                            <li><i class="far fa-check"></i>The UK Red potatoes</li>
                            <li><i class="far fa-check"></i>The UK Carrots</li>
                            <li><i class="far fa-check"></i>The UK Parsnips</li>
                            <li><i class="far fa-check"></i>Spain Broccoli</li>
                            <li><i class="far fa-check"></i>Spain Italy Courgettes</li>
                        </ul>
                    </div>
                    <a href="#" class="vs-btn style4 cart-btn">
                        <i class="fal fa-cart-plus"></i>Add To Cart
                    </a>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>