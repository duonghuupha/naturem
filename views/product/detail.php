<?php
$json = $this->jsonObj;
$image_product = $this->_Data->get_image_product($json[0]['code'], 0, 99); 
$width = 470; $height = 419;  $width_thumb = 149; $height_thumb = 118;
$disabled = ($json[0]['stock'] != 0) ? '' : 'disabled=""';
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Product detail</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Shop</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="vs-shop-wrapper shop-details space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9">
                    <div class="row mb-5">
                        <div class="col-md-7 col-xl-7 mb-30 mb-md-0">
                            <div class="product-big-img vs-carousel" data-slide-show="1" data-lg-slide-show="1"
                                data-md-slide-show="1" data-sm-slide-show="1" data-fade="true" data-dots="true"
                                data-asnavfor="#thumbproductimg" id="bigproductimg">
                                <?php
                                foreach($image_product as $row_img){
                                    $img_src = $this->_Convert->convert_img('product/'.$json[0]['code'].'/', $row_img['image'], $width, $height, 2);
                                ?>
                                <div class="product-img">
                                    <img src="<?php echo URL_IMAGE.'/product/'.$json[0]['code'].'/'.$width.'x'.$height.'/'.$img_src ?>" 
                                        alt="<?php echo $json[0]['title'] ?>" class="w-100">
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="row gx-2 product-thumb-img pt-10 vs-carousel" data-slide-show="4" data-md-slide-show="3"
                                data-sm-slide-show="3" data-xs-slide-show="2" data-arrows="true"
                                data-next-arrow="far fa-long-arrow-right" data-prev-arrow="far fa-long-arrow-left"
                                id="thumbproductimg" data-asnavfor="#bigproductimg">
                                <?php
                                foreach($image_product as $row_img_thumb){
                                    $img_src_thumb = $this->_Convert->convert_img('product/'.$json[0]['code'].'/', $row_img_thumb['image'], $width_thumb, $height_thumb, 2);
                                ?>
                                <div class="col-auto">
                                    <div class="thumb">
                                        <img src="<?php echo URL_IMAGE.'/product/'.$json[0]['code'].'/'.$width_thumb.'x'.$height_thumb.'/'.$img_src_thumb ?>" 
                                        alt="<?php echo $json[0]['title'] ?>" class="w-100">
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-5 col-lg-5">
                            <div class="product-content">
                                <h3 class="product-title mb-1"><?php echo $json[0]['title'] ?></h3>
                                <span class="price font-theme">
                                    <?php
                                    if($json[0]['price'] > 0){
                                        echo "<strong>$".$json[0]['price']."</strong>";
                                    }else{
                                        echo "<strong>Contact</strong>";
                                    }
                                    ?>
                                </span>
                                <div class="mt-2">
                                    <div class="star-rating" role="img" aria-label="Rated 5.00 out of 5">
                                        <p class="m-0 rating fs-xs text-theme lh-base">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i> 
                                            <i class="fas fa-star"></i> 
                                            <i class="fas fa-star"></i> 
                                            <i class="fas fa-star"></i>
                                        </p>
                                    </div>
                                </div>
                                <p class="fs-xs my-4">
                                    SVK Herbal Corporation’s LANUI® products are formulated based on the 
                                    theoretical basis of traditional Vietnamese medicine (TVM) and actual treatment 
                                    results from doctors and specialists with many years of experiences in examining and 
                                    healing patients.
                                </p>
                                <div class="mt-2 link-inherit fs-xs">
                                    <p>
                                        <strong class="text-title me-3 font-theme">Availability :</strong>
                                        <a href="#">
                                            <?php
                                            if($json[0]['stock'] != 0){
                                                echo '<i class="far fa-check-square me-2 ms-1"></i>In Stock';
                                            }else{
                                                echo '<i class="far fa-times-circle me-2 ms-1"></i>Out Stock';
                                            }
                                            ?>
                                        </a>
                                    </p>
                                </div>
                                <div class="actions mb-4 pb-2">
                                    <div class="quantity style2 me-4">
                                        <input type="number" class="qty-input" value="<?php echo ($json[0]['stock'] != 0) ? 1 : 0 ?>" min="1" max="<?php echo $json[0]['stock'] ?>" <?php echo $disabled ?>> 
                                        <button class="quantity-minus qut-btn" <?php echo $disabled ?>>
                                            <i class="far fa-chevron-down"></i>
                                        </button> 
                                        <button class="quantity-plus qut-btn" <?php echo $disabled ?>>
                                            <i class="far fa-chevron-up"></i>
                                        </button>
                                    </div>
                                    <button type="button" class="vs-btn shadow-none" style="">Add To Cart</button>
                                </div>
                                <div class="product_meta">
                                    <span class="sku_wrapper">SKU: <span class="sku"><?php echo $json[0]['code'] ?></span></span> 
                                    <span class="posted_in">
                                        Category: 
                                        <a href="#" el="tag"><?php echo $json[0]['category'] ?></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="nav product-tab-style1 mb-30 justify-content-center mb-4" id="productTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" 
                                id="description-tab" 
                                data-bs-toggle="tab"
                                href="#description" 
                                role="tab" 
                                aria-controls="description" 
                                aria-selected="true">description</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" 
                                id="reviews-tab"
                                data-bs-toggle="tab" 
                                href="#reviews" 
                                role="tab" 
                                aria-controls="reviews"
                                aria-selected="false">reviews</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-30" id="productTabContent">
                        <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                            <?php echo $json[0]['description'] ?>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="vs-comment-form pt-3">
                                <div class="form-title">
                                    <h3 class="h4 mb-lg-4 pb-lg-1">Add a review</h3>
                                </div>
                                <div class="row g-2">
                                    <div class="col-12 form-group mb-0">
                                        <textarea placeholder="Write a Message" class="form-control"></textarea>
                                    </div>
                                    <div class="col-md-6 form-group mb-0">
                                        <input type="text" placeholder="Your Name" class="form-control">
                                    </div>
                                    <div class="col-md-6 form-group mb-0">
                                        <input type="text" placeholder="Your Email" class="form-control">
                                    </div>
                                    <div class="col-12 form-group mb-0">
                                        <button class="vs-btn rounded-1">Post Review</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <aside class="sidebar-area">
                        <?php
                        include(DIR.'/layouts/global/category.php');
                        include(DIR.'/layouts/global/best_seller.php');
                        ?>
                    </aside>
                </div>
                
            </div>
        </div>
    </section>