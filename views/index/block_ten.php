<?php
$item = $this->_Data->get_block_night();
$json = $this->_Data->get_data_blog_via_block($item[0]['number_post']);
?>
<section class="vs-blog-wrapper space-top space-md-bottom">
    <div class="container">
        <div class="section-title text-center">
            <div class="sec-icon">
                <img src="<?php echo URL.'/styles/assets/img' ?>/icons/sec-icon-2.png" alt="icon">
            </div>
            <span class="sub-title4"><?php echo $item[0]['title_1'] ?></span>
            <h2 class="sec-title3"><?php echo $item[0]['title_2'] ?></h2>
        </div>
        <div class="row vs-carousel" data-slide-show="3" data-sm-slide-show="1">
            <?php
            foreach($json as $row){
                $width = 370; $height = 240;
                $img_src = $this->_Convert->convert_img('blogs/content/', $row['image'], $width, $height, 1);
            ?>
            <div class="col-xl-4">
                <div class="vs-blog blog-style1">
                    <div class="blog-img image-scale-hover">
                        <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-blogs-'.base64_encode($row['id']).'.html' ?>">
                            <img src="<?php echo URL_IMAGE.'/blogs/content/'.$width.'x'.$height.'/'.$img_src ?>" 
                                alt="<?php echo $row['title'] ?>"
                                class="w-100">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="tags">
                            <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-blogs-'.base64_encode($row['id']).'.html' ?>">
                                Nanturem
                            </a>
                        </div>
                        <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-blogs-'.base64_encode($row['id']).'.html' ?>" class="blog-date">
                            <?php echo date("M d, Y", strtotime($row['create_at'])) ?>
                        </a>
                        <h3 class="blog-title">
                            <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-blogs-'.base64_encode($row['id']).'.html' ?>">
                                <?php echo $row['title'] ?>
                            </a>
                        </h3>
                        <p class="blog-text">
                            <?php echo $this->_Convert->cut($row['description'], 100) ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>