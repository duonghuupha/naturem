<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Blog</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="vs-blog-wrapper space-top space-md-bottom" id="blog">
        <div class="container">
            <div class="row">
                <?php
                foreach($jsonObj['rows'] as $row){
                    $width = 370; $height = 354;
                    $img_src = $this->_Convert->convert_img('blogs/content/', $row['image'], $width, $height, 1);
                ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="vs-blog blog-grid">
                        <div class="blog-img image-scale-hover">
                            <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-blogs-'.base64_encode($row['id']).'.html' ?>">
                                <img src="<?php echo URL_IMAGE.'/blogs/content/'.$width.'x'.$height.'/'.$img_src ?>" 
                                    alt="<?php echo $row['title'] ?>" 
                                    class="w-100">
                            </a>
                        </div>
                        <div class="blog-content">
                            <h4 class="blog-title fw-semibold">
                                <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-blogs-'.base64_encode($row['id']).'.html' ?>">
                                    <?php echo $row['title'] ?>
                                </a>
                            </h4>
                            <div class="blog-meta">
                                <a href="<?php echo URL.'/'.$this->_Convert->vn2latin($row['title'], true).'-blogs-'.base64_encode($row['id']).'.html' ?>">
                                    <?php echo date("F d, Y", strtotime($row['create_at'])) ?>
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
            if($jsonObj['total'] > $perpage){
                $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
                $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 1);
            ?>
            <div class="pagination-layout1 list-style-none mt-30 mb-30">
                <ul>
                    <?php echo $createlink ?>
                </ul>
            </div>
            <?php
            }
            ?>
        </div>
    </section>