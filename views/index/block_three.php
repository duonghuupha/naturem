<?php
$item = $this->_Data->get_block_three();
$json = $this->_Data->get_data_product($item[0]['type_data'], $item[0]['data_id']);
?>
<section class="sec-bg3 vs-shop-wrapper" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/shape/bg-00778.png">
    <div class="section-title text-center">
        <div class="sec-icon">
            <img src="<?php echo URL.'/styles/assets/img' ?>/icons/sec-icon-2.png" alt="icon">
        </div>
        <span class="sub-title4"><?php echo $item[0]['title_1'] ?></span>
        <h2 class="sec-title3"><?php echo $item[0]['title_2'] ?></h2>
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
                    foreach($json as $row){
                        $image_product = $this->_Data->get_image_product($row['code'], 0, 1); $width = 290; $height = 260;
                        $img_src = $this->_Convert->convert_img('product/'.$row['code'].'/', $image_product[0]['image'], $width, $height, 2);
                    ?>
                    <div class="col-sm-6 col-md-6 col-lg-4 col-xl-3">
                        <div class="vs-product-box3">
                            <div class="product-img">
                                <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-product-'.base64_encode($row['id']).'.html' ?>">
                                    <img src="<?php echo URL_IMAGE.'/product/'.$row['code'].'/'.$width.'x'.$height.'/'.$img_src ?>"
                                        alt="<?php echo $row['title'] ?>" 
                                        class="w-100">
                                </a>
                                <!--<span class="product-tag2">New</span>
                                <span class="product-tag3">Sale</span>-->
                            </div>
                            <div class="actions-btn">
                                <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-product-'.base64_encode($row['id']).'.html' ?>" class="icon-btn">
                                    <i class="fal fa-search"></i>
                                </a> 
                                <a href="#" class="icon-btn">
                                    <i class="fal fa-heart"></i>
                                </a> 
                                <a href="#" class="vs-btn style4 cart-btn">
                                    <i class="fal fa-cart-plus"></i>
                                    Add To Cart
                                </a>
                            </div>
                            <div class="product-content">
                                <h4 class="product-title">
                                    <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-product-'.base64_encode($row['id']).'.html' ?>">
                                        <?php echo $row['title'] ?>
                                    </a>
                                </h4>
                                <span class="price">
                                    <?php
                                    if($row['price'] != 0){
                                        echo '<strong>$'.$row['price'].'</strong>';
                                    }else{
                                        echo '<strong>Contact</strong>';
                                    }
                                    ?>
                                    <!--<del>$47.00</del>-->
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