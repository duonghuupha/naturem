    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">Address Book</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Address</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="vs-cart-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message">Address Book.</div>
            </div>
            <form class="woocommerce-cart-form">
                <table class="cart_table">
                    <thead>
                        <tr>
                            <th class="cart-col-productname">Country</th>
                            <th class="cart-col-price">State</th>
                            <th class="cart-col-quantity">City</th>
                            <th class="cart-col-total">Street address</th>
                            <th class="cart-col-total">Zip code</th>
                            <th class="cart-col-remove">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($this->jsonObj as $row){
                        ?>
                        <tr>
                            <td colspan="5">
                                <?php echo $row['firstname'].' '.$row['lastname'] ?>- Email: <?php echo $_SESSION['data'][0]['email'] ?>
                            </td>
                            <td data-title="Remove" rowspan="2">
                                <?php
                                if($row['default_add'] == 0){
                                ?>
                                <a href="javascript:void(0)" class="remove" onclick="change_default(<?php echo $row['id'] ?>)"
                                title="Default">
                                    <i class="fal fa-road"></i>
                                </a>
                                &nbsp;
                                <?php
                                }
                                ?>
                                <a href="javascript:void(0)" class="remove" onclick="edit_address(<?php echo $row['id'] ?>)"
                                title="Edit">
                                    <i class="fal fa-pencil"></i>
                                </a>
                                &nbsp;
                                <a href="javascript:void(0)" class="remove" onclick="del_address(<?php echo $row['id'] ?>)"
                                title="Del">
                                    <i class="fal fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="cart_item">
                            <td>USA</td>
                            <td><?php echo $row['state'] ?></td>
                            <td><?php echo $row['city'] ?></td>
                            <td><?php echo $row['address'] ?></td>
                            <td><?php echo $row['postcode'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                        <tr>
                            <td colspan="6" class="actions">
                                <a href="<?php echo URL.'/ad_add' ?>" class="vs-btn rounded-1 shadow-none">Add Address</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>