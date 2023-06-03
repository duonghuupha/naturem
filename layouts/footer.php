<?php
$global = $this->_Data->get_setting_global();
?>
    <section class="banner-wrap1">
        <div class="container-fluid">
            <div class="row gy-30">
                <div class="col-lg-4">
                    <div class="banner-style1" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/ad/banner-1-1.jpg">
                        <div class="banner-content">
                            <span class="banner-subtitle">End of season -50%</span>
                            <h3 class="banner-title">100% Organic Fresh Natural Food</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-style1" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/ad/banner-1-2.jpg">
                        <div class="banner-content">
                            <span class="banner-subtitle">End of season -50%</span>
                            <h3 class="banner-title">
                                New Skin Food 
                                <span class="fw-light">100 natural origins</span>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="banner-style1" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/ad/banner-1-3.jpg">
                        <div class="banner-content">
                            <span class="banner-subtitle">End of season -50%</span>
                            <h3 class="banner-title">Eat Organic & Healthy Food</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer-wrapper footer-layout2" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/shape/footer-5-1.jpg">
        <div class="container">
            <div class="widget-area">
                <div class="row">
                    <div class="col-md-6 col-lg-4">
                        <div class="widget footer-widget">
                            <div class="footer-info-widget">
                                <div class="footer-info-logo">
                                    <img src="<?php echo URL.'/styles/assets/img' ?>/naturem_tran_1.png" alt="Foodelio">
                                </div>
                                <div class="footer-info">
                                    <i class="fas fa-phone-alt"></i> 
                                    <a href="tel:<?php echo $global[0]['phone'] ?>"><?php echo $global[0]['phone'] ?></a>
                                </div>
                                <div class="footer-info">
                                    <i class="fas fa-envelope"></i> 
                                    <?php echo $global[0]['email'] ?>
                                </div>
                                <div class="footer-info">
                                    <i class="fas fa-map-marker-alt"></i> 
                                    <?php echo $global[0]['address'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="widget widget_nav_menu footer-widget">
                            <h3 class="widget_title">Useful Links</h3>
                            <div class="menu-all-pages-container footer-links">
                                <ul class="menu">
                                    <?php
                                    $menu_bottom = $this->_Data->get_menu_bottom();
                                    foreach($menu_bottom as $row_bottom){
                                        echo '<li>';
                                            echo '<a href="'.$this->_Convert->return_link_menu($row_bottom['id'], $row_bottom['title'], $row_bottom['type_menu'], $row_bottom['link']).'">'.$row_bottom['title'].'</a>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="widget footer-widget">
                            <h3 class="widget_title">Instagram Photos</h3>
                            <div class="sidebar-gallery">
                                <div class="gallery-thumb">
                                    <a href="#">
                                        <img src="<?php echo URL.'/styles/assets/img' ?>/gallery/gal-2-1.jpg" alt="Gallery Image" class="w-100">
                                    </a>
                                </div>
                                <div class="gallery-thumb">
                                    <a href="#">
                                        <img src="<?php echo URL.'/styles/assets/img' ?>/gallery/gal-2-2.jpg" alt="Gallery Image" class="w-100">
                                    </a>
                                </div>
                                <div class="gallery-thumb">
                                    <a href="#">
                                        <img src="<?php echo URL.'/styles/assets/img' ?>/gallery/gal-2-3.jpg" alt="Gallery Image" class="w-100">
                                    </a>
                                </div>
                                <div class="gallery-thumb">
                                    <a href="#">
                                        <img src="<?php echo URL.'/styles/assets/img' ?>/gallery/gal-2-4.jpg" alt="Gallery Image" class="w-100">
                                    </a>
                                </div>
                                <div class="gallery-thumb">
                                    <a href="#">
                                        <img src="<?php echo URL.'/styles/assets/img' ?>/gallery/gal-2-5.jpg" alt="Gallery Image" class="w-100">
                                    </a>
                                </div>
                                <div class="gallery-thumb">
                                    <a href="#">
                                        <img src="<?php echo URL.'/styles/assets/img' ?>/gallery/gal-2-6.jpg" alt="Gallery Image" class="w-100">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area" data-bg-src="<?php echo URL.'/styles/assets/img' ?>/shape/footer-5-2.png">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-lg-auto text-center text-lg-start">
                        <div class="copyright">
                            <p class="mb-0">
                                &copy; <?php echo date("Y") ?> 
                                <a href="index.html">Naturem</a>. All Rights Reserved by 
                                <a href="https://www.templatemonster.com/authors/vecuro/">Naturem</a>.
                            </p>
                        </div>
                    </div>
                    <div class="col-auto d-none d-lg-block">
                        <div class="copyright-social">
                            <a href="#"><i class="fab fa-facebook-f"></i>Facebook</a> 
                            <a href="#"><i class="fab fa-twitter"></i>Twitter</a> 
                            <a href="#"><i class="fab fa-linkedin-in"></i>Linked In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer><a href="#" class="scrollToTop"><i class="far fa-angle-up"></i></a>
    <script src="<?php echo URL.'/styles' ?>/assets/js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo URL.'/styles' ?>/assets/js/app.min.js"></script>
    <script src="<?php echo URL.'/styles' ?>/assets/js/vscustom-carousel.min.js"></script>
    <script src="<?php echo URL.'/styles' ?>/assets/js/vsmenu.min.js"></script>
    <script src="<?php echo URL.'/styles' ?>/assets/js/ajax-mail.js"></script>
    <script src="<?php echo URL.'/styles' ?>/assets/js/main.js"></script>
</body>

</html>