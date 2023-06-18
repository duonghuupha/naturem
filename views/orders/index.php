<?php
$jsonObj = $this->jsonObj; $perpage = $this->perpage; $pages = $this->page;
?>
    <div class="breadcumb-wrapper breadcumb-layout1 bg-fluid pt-200 pb-200"
        data-bg-src="<?php echo URL.'/styles/' ?>assets/img/breadcumb/breadcumb-img-1.jpg">
        <div class="container">
            <div class="breadcumb-content text-center">
                <h1 class="breadcumb-title">My orders</h1>
                <ul class="breadcumb-menu-style1 mx-auto">
                    <li><a href="<?php echo URL ?>">Home</a></li>
                    <li class="active">Orders</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="vs-cart-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="woocommerce-notices-wrapper">
                <div class="woocommerce-message">Order History.</div>
            </div>
            <form class="woocommerce-cart-form">
                <table class="cart_table">
                    <thead>
                        <tr>
                            <th class="cart-col-productname">Code</th>
                            <th class="cart-col-price">Order date</th>
                            <th class="cart-col-quantity">Status</th>
                            <th class="cart-col-total">Total</th>
                            <th class="cart-col-total">Auth Code</th>
                            <th class="cart-col-remove">TransId</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach($jsonObj['rows'] as $row){
                        ?>
                        <tr class="cart_item">
                            <td>
                                <a href="<?php echo URL.'/order-detail-'.base64_encode($row['id']).'.html' ?>">
                                    <?php echo $row['code'] ?>
                                </a>
                            </td>
                            <td><?php echo $row['create_at'] ?></td>
                            <td>
                                <?php 
                                if($row['status'] == 0){
                                    echo "Order not completed";
                                }elseif($row['status'] == 1){
                                    echo "Order has been paid";
                                }else{
                                    echo "Unpaid order";
                                }
                                ?>
                            </td>
                            <td><?php echo '$'.$row['total_cart'] ?></td>
                            <td><?php echo $row['auth_code'] ?></td>
                            <td><?php echo $row['transid'] ?></td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <?php
            if($jsonObj['total'] > $perpage){
                $pagination = $this->_Convert->pagination($jsonObj['total'], $pages, $perpage);
                $createlink = $this->_Convert->createLinks($jsonObj['total'], $perpage, $pagination['number'], 1);
            ?>
            <div class="pagination-layout1 list-style-none mt-0 mt-lg-4 mb-30">
                <ul>
                    <?php echo $createlink ?>
                </ul>
            </div>
            <?php
            }
            ?>
        </div>
    </div>