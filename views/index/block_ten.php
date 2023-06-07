<section class="vs-blog-wrapper space-top space-md-bottom">
    <div class="container">
        <div class="section-title text-center">
            <div class="sec-icon">
                <img src="<?php echo URL.'/styles/assets/img' ?>/icons/sec-icon-2.png" alt="icon">
            </div>
            <span class="sub-title4">Tips & News</span>
            <h2 class="sec-title3">Recent Articles</h2>
        </div>
        <div class="row vs-carousel" data-slide-show="3" data-sm-slide-show="1">
            <?php
            for($i = 1; $i <= 4; $i++){
            ?>
            <div class="col-xl-4">
                <div class="vs-blog blog-style1">
                    <div class="blog-img image-scale-hover">
                        <a href="blog-details.html">
                            <img src="<?php echo URL.'/styles/assets/img' ?>/blog/blog-4-1.jpg" 
                                alt="Blog Image"
                                class="w-100">
                        </a>
                    </div>
                    <div class="blog-content">
                        <div class="tags">
                            <a href="blog-details.html">Organic</a>
                        </div>
                        <a href="blog-details.html" class="blog-date">Dec 22,2022</a>
                        <h3 class="blog-title">
                            <a href="blog-details.html">
                                From its medieval origins to the digital
                            </a>
                        </h3>
                        <p class="blog-text">
                            Nvidunt ut labore et dolore magna aliqu accusam et justo duo dolores et
                            ea rebu Lorem ipsum dolor sit ametrit.
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