<?php
$global = $this->_Data->get_setting_global();
?>
<div class="sticky-header-wrap sticky-header py-2 py-lg-1">
    <div class="container position-relative">
        <div class="row align-items-center">
            <div class="col-5 col-md-3">
                <div class="logo">
                    <a href="<?php echo URL ?>">
                        <img src="<?php echo URL.'/styles/assets/img' ?>/logo_naturem.png" alt="Naturem">
                    </a>
                </div>
            </div>
            <div class="col-7 col-md-9 text-end position-static">
                <nav class="main-menu menu-sticky1 d-none d-lg-block link-inherit">
                    <ul>
                        <?php
                        $menu_parent = $this->_Data->get_menu_parent_top();
                        foreach($menu_parent as $row_parent){
                            // Menu children
                            $menu_children = $this->_Data->get_menu_chidren_top($row_parent['id']);
                            $class_li = (count($menu_children) > 0) ? 'menu-item-has-children' : '';
                            echo '<li class="'.$class_li.'">';
                                echo '<a href="'.$this->_Convert->return_link_menu($row_parent['id'], $row_parent['title'], $row_parent['type_menu'], $row_parent['link']).'">'.$row_parent['title'].'</a>';
                                if(count($menu_children) > 0){ // neu co menu con
                                    echo "<ul class='sub-menu'>";
                                    foreach($menu_children as $row_child){
                                        echo '<li>';
                                            echo '<a href="'.$this->_Convert->return_link_menu($row_child['id'], $row_child['title'], $row_child['type_menu'], $row_child['link']).'">'.$row_child['title'].'</a>';
                                        echo '</li>';
                                    }
                                    echo "</ul>";
                                }
                                
                            echo "</li>";
                        }
                        ?>
                        <?php
                            if(isset($_SESSION['data'])){
                            ?>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0)" style="color:green">Hi, <?php echo $_SESSION['data'][0]['lastname'] ?></a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo URL.'/profile.html' ?>">Profile</a></li>
                                    <li><a href="<?php echo URL.'/manager_address.html' ?>">Address</a></li>
                                    <li><a href="<?php echo URL.'/my_orders.html' ?>">My orders</a></li>
                                    <li><a href="<?php echo URL.'/logout.html' ?>">Logout</a></li>
                                </ul>
                            </li>
                            <?php
                            }
                            ?>
                    </ul>
                </nav><button class="vs-menu-toggle d-inline-block d-lg-none"><i class="far fa-bars"></i></button>
            </div>
        </div>
    </div>
</div>
<div class="vs-menu-wrapper">
    <div class="vs-menu-area">
        <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="<?php echo URL ?>">
                <img src="<?php echo URL.'/styles/assets/img' ?>/logo_naturem.png" alt="Naturem">
            </a>
        </div>
        <div class="vs-mobile-menu link-inherit"></div>
    </div>
</div>
<header class="header-wrapper header-layout5">
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-infos">
                        <!--<p class="info">
                            <img src="<?php echo URL.'/styles/assets/img' ?>/icons/info-icon-1.png" alt="icon">
                            Free exress international delevery + Easy returens
                        </p>-->
                    </div>
                </div>
                <div class="col-lg-auto text-center text-lg-end">
                    <div class="header-infos">
                        <p class="info">
                            <i class="fas fa-phone-alt"></i>
                            Phone:<a href="tel:<?php echo $global[0]['phone'] ?>"><?php echo $global[0]['phone'] ?></a>
                        </p>
                        <p class="info d-none d-md-inline-block">
                            <i class="fas fa-envelope"></i>
                            Email:<a href="mailto:<?php echo $global[0]['email'] ?>"><?php echo $global[0]['email'] ?></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col col-lg-auto">
                    <div class="header-logo">
                        <a href="<?php echo URL ?>">
                            <img src="<?php echo URL.'/styles/assets/img' ?>/logo_naturem.png" alt="Naturem">
                        </a>
                    </div>
                </div>
                <div class="col-auto">
                    <nav class="main-menu mobile-menu-active menu-style2">
                        <ul>
                            <?php
                            $menu_parent = $this->_Data->get_menu_parent_top();
                            foreach($menu_parent as $row_parent){
                                // Menu children
                                $menu_children = $this->_Data->get_menu_chidren_top($row_parent['id']);
                                $class_li = (count($menu_children) > 0) ? 'menu-item-has-children' : '';
                                echo '<li class="'.$class_li.'">';
                                    echo '<a href="'.$this->_Convert->return_link_menu($row_parent['id'], $row_parent['title'], $row_parent['type_menu'], $row_parent['link']).'">'.$row_parent['title'].'</a>';
                                    if(count($menu_children) > 0){ // neu co menu con
                                        echo "<ul class='sub-menu'>";
                                        foreach($menu_children as $row_child){
                                            echo '<li>';
                                                echo '<a href="'.$this->_Convert->return_link_menu($row_child['id'], $row_child['title'], $row_child['type_menu'], $row_child['link']).'">'.$row_child['title'].'</a>';
                                            echo '</li>';
                                        }
                                        echo "</ul>";
                                    }
                                    
                                echo "</li>";
                            }
                            ?>

                            <?php
                            if(isset($_SESSION['data'])){
                            ?>
                            <li class="menu-item-has-children">
                                <a href="javascript:void(0)" style="color:green">Hi, <?php echo $_SESSION['data'][0]['lastname'] ?></a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo URL.'/profile.html' ?>">Profile</a></li>
                                    <li><a href="<?php echo URL.'/manager_address.html' ?>">Address</a></li>
                                    <li><a href="<?php echo URL.'/my_orders.html' ?>">My orders</a></li>
                                    <li><a href="<?php echo URL.'/logout.html' ?>">Logout</a></li>
                                </ul>
                            </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
                <div class="col-auto d-none d-sm-block">
                    <div class="header-buttons">
                        <button type="button">
                            <i class="far fa-search"></i>
                        </button> 
                        <button class="sideMenuToggler has-badge" type="button"
                        onclick="window.location.href='<?php echo URL.'/cart.html' ?>'">
                            <i class="fal fa-shopping-cart"></i>
                            <span class="badge"><?php echo (isset($_SESSION['data'])) ? $this->_Data->get_total_cart($_SESSION['data'][0]['id']) : 0 ?></span>
                        </button>
                    </div>
                </div>
                <div class="col-auto d-block d-lg-none">
                    <button type="button" class="vs-menu-toggle">
                        <i class="far fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>