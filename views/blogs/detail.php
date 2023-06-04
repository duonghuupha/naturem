<?php
$item = $this->jsonObj; $width = "1171"; $height = '740';
$img_src = $this->_Convert->convert_img('blogs/content/', $item[0]['image'], $width, $height, 1);
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Blog Details</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Blog</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="vs-blog-wrapper blog-details space-top space-md-bottom">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-8 col-xl-9">
                    <div class="vs-blog blog-single">
                        <div class="blog-image">
                            <img 
                                src="<?php echo URL_IMAGE.'/blogs/content/'.$width.'x'.$height.'/'.$img_src ?>" 
                                alt="<?php echo $item[0]['title'] ?>"/>
                        </div>
                        <div class="blog-header">
                            <h2 class="blog-title h1"><?php echo $item[0]['title'] ?></h2>
                            <div class="blog-meta">
                                <a href="javascript:void(0)">
                                    <i class="fal fa-calendar-alt"></i>
                                    <?php echo date("d M, Y", strtotime($item[0]['create_at'])) ?>
                                </a>
                            </div>
                        </div>
                        <div class="blog-content">
                            <p><?php echo $item[0]['description'] ?></p>
                            <?php echo $item[0]['content'] ?>
                        </div>
                        <div class="share-links clearfix my-60">
                            <div class="row align-items-xl-center">
                                <div class="col-sm-6">
                                    <span class="fs-xs fw-semibold text-title me-3">
                                        Tags:
                                    </span>
                                    <div class="tagcloud">
                                        <?php
                                        $tags = explode(", ", $item[0]['tags']);
                                        foreach($tags as  $row_tags){
                                            echo '<a href="javascript:void(0)">'.$row_tags.'</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-sm-6 text-start text-md-end"><span
                                        class="fs-xs fw-semibold text-title me-3">Social Network:</span>
                                    <ul class="blog-social list-unstyled">
                                        <li>
                                            <a class="facebook" href="#" target="_blank">
                                                <i class="fab fa-facebook-f"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="twitter" href="#" target="_blank">
                                                <i class="fab fa-twitter"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="related-post-wrapper pt-40">
                        <h2 class="inner-title1 h1">Relatetd <span class="text-theme">Post</span></h2>
                        <div class="row text-center vs-carousel" data-slide-show="3" data-lg-slide-show="2">
                            <div class="col-lg-4">
                                <div class="vs-blog blog-grid">
                                    <div class="blog-img image-scale-hover"><a href="blog-details.html"><img
                                                src="<?php echo URL.'/styles/' ?>assets/img/blog/related-post-1.jpg" alt="Blog Image"
                                                class="w-100"></a></div>
                                    <div class="blog-content">
                                        <h4 class="blog-title fw-semibold"><a href="blog-details.html">Keep Your Fruits
                                                frash</a></h4>
                                        <div class="blog-meta"><a href="blog-details.html">January 04, 2022</a> <a
                                                href="blog-details.html">5 Views</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="vs-blog blog-grid">
                                    <div class="blog-img image-scale-hover"><a href="blog-details.html"><img
                                                src="<?php echo URL.'/styles/' ?>assets/img/blog/related-post-2.jpg" alt="Blog Image"
                                                class="w-100"></a></div>
                                    <div class="blog-content">
                                        <h4 class="blog-title fw-semibold"><a href="blog-details.html">Letrase traner
                                                sheets</a></h4>
                                        <div class="blog-meta"><a href="blog-details.html">July 04, 2022</a> <a
                                                href="blog-details.html">22 Views</a></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="vs-blog blog-grid">
                                    <div class="blog-img image-scale-hover"><a href="blog-details.html"><img
                                                src="<?php echo URL.'/styles/' ?>assets/img/blog/related-post-3.jpg" alt="Blog Image"
                                                class="w-100"></a></div>
                                    <div class="blog-content">
                                        <h4 class="blog-title fw-semibold"><a href="blog-details.html">Some cla lorem
                                                ipsum</a></h4>
                                        <div class="blog-meta"><a href="blog-details.html">Augest 04, 2022</a> <a
                                                href="blog-details.html">12 Views</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-xl-3">
                    <aside class="sidebar-area sticky-sidebar">
                        <div class="widget">
                            <h3 class="widget_title">Latest Posts</h3>
                            <div class="vs-widget-recent-post">
                                <?php
                                for($i = 1; $i <= 3; $i++){
                                ?>
                                <div class="recent-post d-flex align-items-center">
                                    <div class="media-img">
                                        <img src="<?php echo URL.'/styles/' ?>assets/img/widget/recent-1.jpg" 
                                            width="100"
                                            height="73" 
                                            alt="Recent Post Image">
                                    </div>
                                    <div class="media-body pl-30">
                                        <h4 class="recent-post-title h5 mb-0">
                                            <a href="blog.html">100% organic healthy</a>
                                        </h4>
                                        <a href="#" class="text-theme fs-12">January 04, 2022</a>
                                    </div>
                                </div>
                                <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="widget widget_tag_cloud">
                            <h3 class="widget_title">Popular Tags</h3>
                            <div class="tagcloud">
                                <a href="blog.html">Healthy</a> 
                                <a href="blog.html">Smoothie</a> 
                                <a href="blog.html">Been</a> 
                                <a href="blog.html">Juice</a> 
                                <a href="blog.html">Vegetable</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>