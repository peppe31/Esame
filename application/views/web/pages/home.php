


<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Feature Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">

            <?php
            foreach ($prodotti as $single_feature_product) {
                ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href=""><img style="width:250px;height:250px" src="" alt="" /></a>
                    <h2><?php echo $single_feature_product->nome; ?> </h2>
                    <p><?php echo $single_feature_product->stagione ?></p>
                    <p><span class="price"><?php echo $this->cart->format_number($single_feature_product->costo); ?> $</span></p>
                    <div class="button"><span><a href="" class="details">Details</a></span></div>
                </div>

            <?php } ?> 

        </div>

        <div class="content_bottom">
            <div class="heading">
                <h3>New Products</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">
            <?php foreach ($prodotti as $single_new_product) { ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href=""><img style="width:250px;height:250px" src="" alt="" /></a>
                    <h2><?php echo $single_new_product->nome; ?></h2>
                    <p><?php echo $single_new_product->stagione ?></p>
                    <p><span class="price"><?php echo $this->cart->format_number($single_new_product->costo); ?> $</span></p>
                    <div class="button"><span><a href="" class="details">Details</a></span></div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
