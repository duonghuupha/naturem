<?php
$json = $this->_Data->get_slider(); $i = 0;
?>
<div class="">
    <div class="vs-hero-carousel" 
        data-globalbgimage="<?php echo URL.'/styles/assets/img' ?>/hero/hero-bg-6-1.jpg"
        data-height="810" 
        data-container="1900" 
        data-slidertype="responsive">
        <?php
        foreach($json as $row){
            $i++;
        ?>
        <div class="ls-slide" 
            data-ls="duration:12000; transition2d:5; kenburnsscale:1.2;">
            <!------------------begin global------------------------------------------->
            <img width="781" 
                height="534"
                src="<?php echo URL.'/styles/assets/img' ?>/hero/hero-6-1.png" 
                class="ls-l ls-hide-tablet ls-hide-phone"
                alt="image" 
                style="top:257px; left:1119px; background-size:inherit; background-position:inherit;"
                data-ls="offsetxin:100; durationin:1500; delayin:500; static:forever;"> 
            <img width="781" 
                height="534"
                src="<?php echo URL.'/styles/assets/img' ?>/hero/hero-6-1.png" 
                class="ls-l ls-hide-desktop" 
                alt="image"
                style="top:237px; left:1121px; background-size:inherit; background-position:inherit;"
                data-ls="offsetxin:100; durationin:1500; delayin:500; static:forever;"> 
            <!-----------------End global------------------------------------------------>
            <img width="658" 
                height="543"
                src="<?php echo URL_IMAGE.'/slider/'.$row['image'] ?>"
                class="ls-l ls-hide-tablet ls-hide-phone" 
                alt="image"
                style="top:215px; left:969px; background-size:inherit; background-position:inherit;">
            <p style="top:365px; left:375px; font-weight:700; background-size:inherit; background-position:inherit; font-size:35px; font-family:Amatic SC; color:#ffffff; letter-spacing:1px;"
                class="ls-l ls-hide-tablet ls-hide-phone"
                data-ls="offsetyin:-100; durationin:1500; delayin:800; easingin:easeOutQuint;">
                <?php echo $row['title_1'] ?>
            </p>
            <p style="top:405px; left:375px; font-weight:700; background-size:inherit; background-position:inherit; font-size:65px; color:#fcd55c; font-family:'Advent Pro', sans-serif;"
                class="ls-l ls-hide-tablet ls-hide-phone"
                data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint;">
                <?php echo $row['title_2'] ?>
            </p>
            <div style="top:611px; left:375px; background-size:inherit; background-position:inherit;"
                class="ls-l ls-hide-tablet ls-hide-phone"
                data-ls="offsetyin:100; durationin:1500; delayin:800; easingin:easeOutQuint; offsetyout:200; durationout:1500; easingout:easeOutQuint;">
                <a href="<?php echo $row['link_btn'] ?>" class="vs-btn style5">
                    <?php echo $row['title_btn'] ?>
                    <i class="far fa-angle-right"></i>
                </a>
            </div>
            <!---------------------------------------------------------------------------------------->
            <img width="658" 
                height="543" 
                src="<?php echo URL_IMAGE.'/slider/'.$row['image'] ?>"
                class="ls-l ls-hide-desktop" 
                alt="image"
                style="top:54px; left:916px; background-size:inherit; background-position:inherit; width:835px; height:689px;">
            <p style="top:150px; left:100px; font-weight:700; background-size:inherit; background-position:inherit; font-family:Amatic SC; color:#ffffff; letter-spacing:1px; font-size:70px;"
                class="ls-l ls-hide-desktop ls-hide-phone"
                data-ls="offsetyin:-100; durationin:1500; delayin:800; easingin:easeOutQuint;">
                <?php echo $row['title_1'] ?>
            </p>
            <p style="top:240px; left:100px; font-weight:700; background-size:inherit; background-position:inherit; font-size:100px; color:#fcd55c; font-family:'Advent Pro', sans-serif;"
                class="ls-l ls-hide-desktop ls-hide-phone"
                data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint;">
                <?php echo $row['title_2'] ?>
            </p>
            <span
                style="top:550px; left:100px; font-weight:700; background-size:inherit; background-position:inherit; padding-right:60px; padding-bottom:30px; padding-left:60px; font-family:'Lato',sans-serif; font-size:30px; color:#fff; border-radius:9999px; border-top:3px solid #fff; border-right:3px solid #fff; border-bottom:3px solid #fff; border-left:3px solid #fff; padding-top:30px;"
                class="ls-l ls-hide-desktop ls-hide-phone"
                data-ls="offsetyin:200; durationin:1500; delayin:400; easingin:easeOutQuint; offsetyout:200; durationout:1500; easingout:easeOutQuint; hover:true; hovereasingin:easeOutQuint; hoverbgcolor:#ffffff; hovercolor:#76a713;">
                <?php echo $row['title_btn'] ?>
            </span>
            <p style="top:120px; left:100px; font-weight:700; background-size:inherit; background-position:inherit; font-size:120px; color:#fcd55c; font-family:'Advent Pro', sans-serif;"
                class="ls-l ls-hide-desktop ls-hide-tablet"
                data-ls="offsetxin:-200; durationin:1500; easingin:easeOutQuint;">
                <?php echo $row['title_2'] ?>
            </p>
            <span
                style="top:490px; left:100px; font-weight:700; background-size:inherit; background-position:inherit; padding-right:100px; padding-bottom:50px; padding-left:100px; font-family:'Lato',sans-serif; font-size:60px; color:#fff; border-radius:9999px; border-top:3px solid #fff; border-right:3px solid #fff; border-bottom:3px solid #fff; border-left:3px solid #fff; padding-top:50px;"
                class="ls-l ls-hide-desktop ls-hide-tablet"
                data-ls="offsetyin:200; durationin:1500; delayin:400; easingin:easeOutQuint; offsetyout:200; durationout:1500; easingout:easeOutQuint; hover:true; hovereasingin:easeOutQuint; hoverbgcolor:#ffffff; hovercolor:#76a713;">
                <?php echo $row['title_btn'] ?>
            </span>
        </div>
        <?php
        }
        ?>
    </div>
</div>