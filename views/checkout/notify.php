<section class="vs-error-wrapper space-md-top space-bottom">
    <div class="container">
        <div class="error-content text-center">
            <h2 class="error-title h3 fw-semibold text-uppercase text-body mb-5 pb-1">
                <?php
                if($this->m == 1){
                    echo "Payment Accepted Successfully! <strong style='color:black'>Website will redirect after 5 seconds</strong>";
                }else{
                    echo "There Was A Problem With Your CC <strong style='color:black'>Website will redirect after 5 seconds</strong>";
                }
                ?>
            </h2>
        </div>
    </div>
</section>
<script>
    window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "<?php echo URL.'/my_orders.html' ?>";

    }, 5000);
</script>