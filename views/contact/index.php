<?php
$global = $this->_Data->get_setting_global();
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Contact</li>
                </ul>
            </div>
        </div>
    </div>
    <section class="vs-contact-wrapper vs-contact-layout1 space-top space-md-bottom">
        <div class="container">
            <div class="row text-center text-lg-start">
                <div class="col-lg-6">
                    <div class="section-title mb-25">
                        <h2 class="sec-title1">Address</h2>
                        <p class="fs-md mt-4 pt-1" style="text-align:justify">
                            <?php  
                            echo $global[0]['description']
                            ?>
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <p class="mb-0 fw-semibold">Phone: <?php echo $global[0]['phone'] ?></p>
                            <p class="mb-0 fw-semibold">Email: <?php echo $global[0]['email'] ?></p>
                            <p class="mb-0 fw-semibold">Address: <?php echo $global[0]['address'] ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mt-30 mt-lg-0">
                    <div class="section-title mb-25">
                        <h2 class="sec-title1">Get In Touch</h2>
                    </div>
                    <form action="mail.php" method="POST" class="contact-form contact-form1 mb-30">
                        <div class="row g-4">
                            <div class="col-12 form-group mb-0"><input type="text" name="name" class="form-control"
                                    placeholder="Your Name"></div>
                            <div class="col-lg-6 form-group mb-0"><input type="text" name="email" class="form-control"
                                    placeholder="Your Email"></div>
                            <div class="col-lg-6 form-group mb-0"><input type="text" name="subject" class="form-control"
                                    placeholder="Your Subject"></div>
                            <div class="col-12 form-group mb-0"><textarea class="form-control" name="message"
                                    placeholder="Your Message"></textarea></div>
                            <div class="col-12 form-group mb-0"><button type="submit" class="vs-btn">Send
                                    Message</button></div>
                        </div>
                    </form>
                    <p class="form-messages mt-20 mb-0"></p>
                </div>
                <!--
                <div class="col-12 my-30">
                    <div class="ratio ratio-21x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3943.749446522523!2d-115.12792100952241!3d36.14521765075119!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c8c49a15d00001%3A0xd833d9ac831b921c!2s1810%20E%20Sahara%20Ave%20STE%20215%2C%20Las%20Vegas%2C%20NV%2089104%2C%20Hoa%20K%E1%BB%B3!5e0!3m2!1svi!2s!4v1685755399464!5m2!1svi!2s" 
                            height="500" style="border:0;margin: 0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                </div>
                -->
            </div>
        </div>
    </section>