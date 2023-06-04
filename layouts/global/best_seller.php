<?php
$json = $this->_Data->get_best_seller();
?>
<div class="widget">
    <h3 class="widget_title">Best Seller</h3>
    <div class="vs-widget-recent-post">
        <?php
        foreach($json as $row){
            $image_product = $this->_Data->get_image_product($row['code'], 0, 1); $width = 100; $height = 73;
            $img_src = $this->_Convert->convert_img('product/'.$row['code'].'/', $image_product[0]['image'], $width, $height, 2);
        ?>
        <div class="recent-post d-flex align-items-center">
            <div class="media-img">
                <img src="<?php echo URL_IMAGE.'/product/'.$row['code'].'/'.$width.'x'.$height.'/'.$img_src ?>" 
                width="100" height="73" alt="<?php echo $row['title'] ?>"></div>
            <div class="media-body pl-30">
                <h4 class="recent-post-title h5 mb-0">
                    <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-product-'.base64_encode($row['id']).'.html' ?>">
                        <?php echo $row['title'] ?>
                    </a>
                </h4>
                <a href="javascript:void(0)" class="text-theme fs-12"><?php echo date("F d, Y", strtotime($row['create_at'])) ?></a>
            </div>
        </div>
        <?php
        }
        ?>
    </div>
</div>