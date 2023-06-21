<?php
$item = $this->_Data->get_block_sevent(); $width = 290; $height = 260;
$pro1 = $this->_Data->get_data_product_five($item[0]['pro_id_1']);
$image_product_1 = $this->_Data->get_image_product($pro1[0]['code'], 0, 1);
$img_src_1 = $this->_Convert->convert_img('product/'.$pro1[0]['code'].'/', $image_product_1[0]['image'], $width, $height, 2);
$pro2 = $this->_Data->get_data_product_five($item[0]['pro_id_2']);
$image_product_2 = $this->_Data->get_image_product($pro2[0]['code'], 0, 1);
$img_src_2 = $this->_Convert->convert_img('product/'.$pro2[0]['code'].'/', $image_product_2[0]['image'], $width, $height, 2);
$img_src = $this->_Convert->convert_img('other/', $item[0]['image'], '559', '572', 3);
?>
<section class="space-bottom">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 mb-40 mb-xl-0">
                <div class="img-box4">
                    <div class="img-1">
                        <img src="<?php echo URL_IMAGE.'/other/559x572/'.$img_src ?>" alt="About Image">
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="content-style2">
                    <span class="sub-title4"><?php echo $item[0]['title_1'] ?></span>
                    <h2 class="sec-title3"><?php echo $item[0]['title_2'] ?></h2>
                    <p class="sec-text">
                        <?php echo $item[0]['description'] ?>
                    </p>
                    <div class="row mt-lg-3 pt-3 gy-4">
                        <div class="col-md-6">
                            <div class="vs-product-box3 style2">
                                <div class="product-img">
                                    <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($pro1[0]['title'], true).'-product-'.base64_encode($pro1[0]['id']).'.html' ?>" tabindex="0">
                                        <img src="<?php echo URL_IMAGE.'/product/'.$pro1[0]['code'].'/'.$width.'x'.$height.'/'.$img_src_1 ?>"
                                            alt="<?php echo $pro1[0][['title']] ?>" 
                                            class="w-100">
                                    </a>
                                    <span class="product-tag1">Hot</span>
                                </div>
                                <div class="actions-btn">
                                    <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($pro1[0]['title'], true).'-product-'.base64_encode($pro1[0]['id']).'.html' ?>" class="icon-btn" tabindex="0">
                                        <i class="fal fa-search"></i>
                                    </a> 
                                    <a href="#" class="icon-btn" tabindex="0">
                                        <i class="fal fa-heart"></i>
                                    </a> 
                                    <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($pro1[0]['title'], true).'-product-'.base64_encode($pro1[0]['id']).'.html' ?>" class="vs-btn style4 cart-btn" tabindex="0">
                                        <i class="fal fa-cart-plus"></i>
                                        Add To Cart
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4 class="product-title">
                                        <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($pro1[0]['title'], true).'-product-'.base64_encode($pro1[0]['id']).'.html' ?>" tabindex="0">
                                            <?php echo $pro1[0]['title'] ?>
                                        </a>
                                    </h4>
                                    <span class="price">
                                        <?php
                                        if($pro1[0]['price'] != 0){
                                            echo "<strong>$".$pro1[0]['price']."</strong>";
                                        }else{
                                            echo "<strong>Contact</strong>";
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="vs-product-box3 style2">
                                <div class="product-img">
                                    <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($pro2[0]['title'], true).'-product-'.base64_encode($pro2[0]['id']).'.html' ?>" tabindex="0">
                                    <img src="<?php echo URL_IMAGE.'/product/'.$pro2[0]['code'].'/'.$width.'x'.$height.'/'.$img_src_2 ?>"
                                            alt="<?php echo $pro2[0][['title']] ?>" 
                                            class="w-100">
                                    </a>
                                    <span class="product-tag1">Hot</span>
                                </div>
                                <div class="actions-btn">
                                    <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($pro2[0]['title'], true).'-product-'.base64_encode($pro2[0]['id']).'.html' ?>" class="icon-btn" tabindex="0">
                                        <i class="fal fa-search"></i>
                                    </a> 
                                    <a href="#" class="icon-btn" tabindex="0">
                                        <i class="fal fa-heart"></i>
                                    </a> 
                                    <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($pro2[0]['title'], true).'-product-'.base64_encode($pro2[0]['id']).'.html' ?>" class="vs-btn style4 cart-btn" tabindex="0">
                                        <i class="fal fa-cart-plus"></i>
                                        Add To Cart
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4 class="product-title">
                                        <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($pro2[0]['title'], true).'-product-'.base64_encode($pro2[0]['id']).'.html' ?>" tabindex="0">
                                            <?php echo $pro2[0]['title'] ?>
                                        </a>
                                    </h4>
                                    <span class="price">
                                        <?php
                                        if($pro2[0]['price'] != 0){
                                            echo "<strong>$".$pro2[0]['price']."</strong>";
                                        }else{
                                            echo "<strong>Contact</strong>";
                                        }
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>