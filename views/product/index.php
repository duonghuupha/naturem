<?php
$info_cate = $this->info_cate; $jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/assets/img/' ?>breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title"><?php echo $info_cate[0]['title'] ?></h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
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
                            <div class="nav" role="tablist">
                                <a href="#" 
                                    class="icon-btn style3 active me-2"
                                    id="tab-shop-grid" 
                                    data-bs-toggle="tab" 
                                    data-bs-target="#tab-grid" 
                                    role="tab"
                                    aria-controls="tab-grid" 
                                    aria-selected="true">
                                    <i class="fas fa-th"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col d-none d-md-block">
                            <div class="border-top"></div>
                        </div>
                        <div class="col-sm-9 col-md-7 col-lg-8 col-xl-6">
                            <div class="row justify-content-center justify-content-sm-between">
                                <div class="col-auto d-flex align-items-center mb-3 mb-sm-0">
                                    <label class="text-body2" for="sortBy">Sort by</label> 
                                    <select name="sortBy" id="sortBy" class="form-select">
                                        <option value="title">Sorted Product Name</option>
                                        <option value="id">Sorted Product New</option>
                                        <option value="price">Sorted Product Price</option>
                                    </select>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <label class="text-body2" for="showTotal">Show</label> 
                                    <select name="showTotal" id="showTotal" class="form-select">
                                        <option value="6">06</option>
                                        <option value="9">09</option>
                                        <option value="12">12</option>
                                        <option value="15">15</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="tab-grid" role="tabpanel" aria-labelledby="tab-shop-grid">
                            <div class="row">
                                <?php
                                foreach($jsonObj['rows'] as $row){
                                    $image_product = $this->_Data->get_image_product($row['code'], 0, 1); $width = 270; $height = 245;
                                    $img_src = $this->_Convert->convert_img('product/'.$row['code'].'/', $image_product[0]['image'], $width, $height, 2);
                                ?>
                                <div class="col-sm-6 col-xl-4">
                                    <div class="vs-product-box1 thumb_swap">
                                        <!--<div class="product-tag1">sale</div>-->
                                        <div class="product-img">
                                            <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-product-'.base64_encode($row['id']).'.html' ?>">
                                                <img src="<?php echo URL_IMAGE.'/product/'.$row['code'].'/'.$width.'x'.$height.'/'.$img_src ?>" 
                                                    alt="<?php echo $row['title'] ?>"
                                                    class="w-100">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="actions-btn">
                                                <a href="javascript:void(0)" title="Add to cart"><i class="fal fa-cart-plus"></i></a>
                                                <a href="javascript:void(0)" title="Add to wish list"><i class="fal fa-heart"></i></a>
                                            </div>
                                            <h4 class="product-title h5 mb-0">
                                                <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-product-'.base64_encode($row['id']).'.html' ?>"><?php echo $row['title'] ?></a>
                                            </h4>
                                            <span class="price font-theme">
                                                <?php
                                                if($row['price'] > 0){
                                                    echo "<strong>$".$row['price']."</strong>";
                                                }else{
                                                    echo "<strong>Contact</strong>";
                                                }
                                                ?>
                                            </span>
                                            <p class="m-0 rating fs-xs text-theme lh-base">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i> 
                                                <i class="fas fa-star"></i> 
                                                <i class="fas fa-star"></i> 
                                                <i class="fas fa-star"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    if($jsonObj['total'] > $perpage){
                        $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
                        $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 1);
                    ?>
                    <div class="pagination-layout1 list-style-none mt-0 mt-lg-4 mb-30">
                        <ul>
                            <?php echo $createlink ?>
                        </ul>
                    </div>
                    <?php
                    }
                    ?>
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
    <script src="<?php echo URL.'/styles' ?>/scripts/menu.js"></script>