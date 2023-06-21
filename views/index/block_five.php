<?php
$item = $this->_Data->get_block_five(); $json = $this->_Data->get_data_product_five($item[0]['data_id']);
$image_product = $this->_Data->get_image_product($json[0]['code'], 0, 1); $width = 709; $height = 703;
$img_src = $this->_Convert->convert_img('product/'.$json[0]['code'].'/', $image_product[0]['image'], $width, $height, 2);
?>
<section class="mb-60 mb-xl-0">
    <div class="container">
        <div class="section-title text-center">
            <div class="sec-icon">
                <img src="<?php echo URL.'/styles/assets/img' ?>/icons/sec-icon-2.png" 
                alt="icon">
            </div>
            <span class="sub-title4"><?php echo $item[0]['title_1'] ?></span>
            <h2 class="sec-title3"><?php echo $item[0]['title_2'] ?></h2>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-4 order-3 order-lg-1">
                <div class="content-style1">
                    <span class="about-subtitle"><?php echo $item[0]['content_1'] ?></span>
                    <h3 class="about-title"><?php echo $item[0]['content_2'] ?></h3>
                    <p class="about-text">
                        <?php echo $item[0]['description'] ?>
                    </p>
                    <div class="about-price">
                        <?php
                        echo ($json[0]['price'] != 0) ? '$'.$json[0]['price'] : 'Price Contact';
                        ?>
                        <!--<del>$45.00</del>-->
                    </div>
                    <div>
                        <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($json[0]['title'], true).'-product-'.base64_encode($json[0]['id']).'.html' ?>" class="vs-btn style4">
                            <i class="fal fa-cart-plus"></i>
                            Add To Cart
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg order-1 order-lg-2">
                <div class="img-box3">
                    <img src="<?php echo URL_IMAGE.'/product/'.$json[0]['code'].'/'.$width.'x'.$height.'/'.$img_src ?>" 
                    alt="<?php echo $json[0]['title'] ?>">
                </div>
            </div>
            <div class="col-lg-auto order-2 order-lg-3">
                <!--<div class="offer-counter counter-style1" data-offer-date="08/22/2024">
                    <span class="day">Days</span>
                    <span class="hour">Hours</span> 
                    <span class="minute">Mins</span> 
                    <span class="second">Secs</span>
                    <span class="message">Offer closed</span>
                </div>-->
            </div>
        </div>
    </div>
</section>