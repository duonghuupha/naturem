<?php
$item = $this->_Data->get_block_one();
?>
<section class="space-top">
    <div class="container">
        <div class="row vs-carousel" data-slide-show="3" id="catboxSlide4645">
            <?php
            foreach($this->_Data->get_category_via_block_one($item[0]['data_id']) as $row){
            ?>
            <div class="col-xl-4">
                <div class="cat-box">
                    <div class="cat-box__img">
                        <img src="<?php echo URL_IMAGE.'/category/'.$row['image'] ?>" alt="Category image">
                    </div>
                    <h3 class="cat-box__title">
                        <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-category-'.base64_encode($row['id']).'.html'  ?>"><?php echo $row['title'] ?></a>
                    </h3>
                    <p class="cat-box__text">
                        <?php echo $this->_Convert->cut($row['description'], 100) ?>
                    </p>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
        <div class="row text-center justify-content-around align-items-center">
            <div class="col-auto d-none d-sm-block">
                <button class="slick-arrow" data-slick-prev="#catboxSlide4645" type="button">
                    <i class="fas fa-angle-left"></i>
                </button>
            </div>
            <div class="col-auto">
                <a href="<?php echo $item[0]['link_btn'] ?>" class="vs-btn style3">
                    <?php echo $item[0]['title_btn'] ?>
                    <i class="fas fa-angle-right"></i>
                </a>
            </div>
            <div class="col-auto d-none d-sm-block">
                <button class="slick-arrow" data-slick-next="#catboxSlide4645" type="button">
                    <i class="fas fa-angle-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>