<?php
$item = $this->_Data->get_block_two(); $width = 844; $height = 620;
$img_src = $this->_Convert->convert_img('other/', $item[0]['image'], $width, $height, 3);
?>
<section class="space">
    <div class="container">
        <div class="row justify-content-between align-items-center align-items-xl-start">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="section-title">
                    <span class="sub-title4"><?php echo $item[0]['title_1'] ?></span>
                    <h2 class="sec-title3"><?php echo $item[0]['title_2'] ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="container vs-container_style3">
        <div class="row">
            <div class="col-lg-6 col-xl-auto mb-40 mb-lg-0">
                <div class="img-box2">
                    <div class="img-1">
                        <img src="<?php echo URL_IMAGE.'/other/'.$width.'x'.$height.'/'.$img_src ?>" alt="Naturem"/>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xl">
                <div class="about-box1">
                    <p><?php echo $item[0]['content'] ?></p>
                    <a href="<?php echo $item[0]['link_btn'] ?>" class="vs-btn style3">
                        <?php echo $item[0]['title_btn'] ?>
                        <i class="fas fa-angle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>