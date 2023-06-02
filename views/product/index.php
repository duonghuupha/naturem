    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/assets/img/' ?>breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Organic</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="vs-shop-wrapper position-relative space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div
                        class="vs-sort-bar row justify-content-center justify-content-sm-between align-items-center pb-4 mb-1">
                        <div class="col-auto mb-3 mb-sm-0">
                            <div class="nav" role="tablist"><a href="shop.html" class="icon-btn style3 active me-2"
                                    id="tab-shop-grid" data-bs-toggle="tab" data-bs-target="#tab-grid" role="tab"
                                    aria-controls="tab-grid" aria-selected="true"><i class="fas fa-th"></i></a> <a
                                    href="shop-list.html" class="icon-btn style3" id="tab-shop-list"
                                    data-bs-toggle="tab" data-bs-target="#tab-list" role="tab" aria-controls="tab-grid"
                                    aria-selected="false"><i class="far fa-bars"></i></a></div>
                        </div>
                        <div class="col d-none d-md-block">
                            <div class="border-top"></div>
                        </div>
                        <div class="col-sm-9 col-md-7 col-lg-8 col-xl-6">
                            <div class="row justify-content-center justify-content-sm-between">
                                <div class="col-auto d-flex align-items-center mb-3 mb-sm-0"><label class="text-body2"
                                        for="sortBy">Sort by</label> <select name="sortBy" id="sortBy"
                                        class="form-select">
                                        <option value="productName">Sorted Product Name</option>
                                        <option value="productName">Sorted Product New</option>
                                        <option value="productName">Sorted Product Popular</option>
                                    </select></div>
                                <div class="col-auto d-flex align-items-center"><label class="text-body2"
                                        for="showTotal">Show</label> <select name="showTotal" id="showTotal"
                                        class="form-select">
                                        <option value="productName">06</option>
                                        <option value="productName">09</option>
                                        <option value="productName">12</option>
                                        <option value="productName">15</option>
                                    </select></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tab-grid" role="tabpanel"
                            aria-labelledby="tab-shop-grid">
                            <div class="row">
                                <?php
                                for($i = 1; $i <= 6; $i++){
                                ?>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="vs-product-box1 thumb_swap">
                                        <div class="product-tag1">sale</div>
                                        <div class="product-img"><a href="shop-details.html"><img
                                                    src="<?php echo URL.'/styles/assets/img/' ?>shop/product-1-1.png" alt="Product Image"
                                                    class="w-100"></a><a href="shop-details.html"><img
                                                    src="<?php echo URL.'/styles/assets/img/' ?>shop/product-1-8.png" alt="Product Image"
                                                    class="w-100 img_swap"></a></div>
                                        <div class="product-content">
                                            <div class="actions-btn"><a href="#"><i class="fal fa-cart-plus"></i></a> <a
                                                    href="#"><i class="far fa-search"></i></a> <a href="#"><i
                                                        class="fal fa-heart"></i></a> <a href="#"><i
                                                        class="fal fa-layer-group"></i></a></div>
                                            <h4 class="product-title h5 mb-0"><a href="shop-details.html">Apple
                                                    juice</a></h4><span
                                                class="price font-theme"><strong>$40.00</strong></span>
                                            <p class="m-0 rating fs-xs text-theme lh-base"><i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i> <i class="fas fa-star"></i> <i
                                                    class="fas fa-star"></i> <i class="fas fa-star"></i></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="pagination-layout1 list-style-none mt-0 mt-lg-4 mb-30">
                        <ul>
                            <li><a href="#">Prev</a></li>
                            <li><a href="#" class="active">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <aside class="sidebar-area">
                        <div class="widget widget_categories">
                            <h3 class="widget_title">Categories</h3>
                            <ul>
                                <li><a href="#">Juice</a> <span>(06)</span></li>
                                <li><a href="#">Fresh</a> <span>(10)</span></li>
                                <li><a href="#">Smoothie</a> <span>(06)</span></li>
                            </ul>
                        </div>
                        <div class="widget">
                            <h3 class="widget_title">Best Seller</h3>
                            <div class="vs-widget-recent-post">
                                <div class="recent-post d-flex align-items-center">
                                    <div class="media-img"><img src="<?php echo URL.'/styles/assets/img/' ?>widget/recent-1.jpg" width="100"
                                            height="73" alt="Recent Post Image"></div>
                                    <div class="media-body pl-30">
                                        <h4 class="recent-post-title h5 mb-0"><a href="blog.html">100% organic
                                                healthy</a></h4><a href="#" class="text-theme fs-12">January 04,
                                            2022</a>
                                    </div>
                                </div>
                                <div class="recent-post d-flex align-items-center">
                                    <div class="media-img"><img src="<?php echo URL.'/styles/assets/img/' ?>widget/recent-2.jpg" width="100"
                                            height="73" alt="Recent Post Image"></div>
                                    <div class="media-body pl-30">
                                        <h4 class="recent-post-title h5 mb-0"><a href="blog.html">Keep Your Fruits
                                                frash</a></h4><a href="#" class="text-theme fs-12">March 04, 2022</a>
                                    </div>
                                </div>
                                <div class="recent-post d-flex align-items-center">
                                    <div class="media-img"><img src="<?php echo URL.'/styles/assets/img/' ?>widget/recent-3.jpg" width="100"
                                            height="73" alt="Recent Post Image"></div>
                                    <div class="media-body pl-30">
                                        <h4 class="recent-post-title h5 mb-0"><a href="blog.html">Get natural healthy
                                                food</a></h4><a href="#" class="text-theme fs-12">April 04, 2022</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>