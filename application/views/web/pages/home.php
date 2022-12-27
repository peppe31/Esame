


<div class="main">
    <div class="content">
		<div style="display: flex;justify-content: center;align-items: center;margin-bottom: 5px">
			<img style="width: 100%;height: 100%" src="assets/web/images/immagini/serra.png"/>
		</div>
        <div class="content_top">
            <div class="heading">
                <h3 style="color: #00A300">I nostri prodotti</h3>
            </div>
            <div class="clear"></div>
        </div>
        <div class="section group">

            <?php
            foreach ($prodotti as $single_feature_product) {
                ?>
                <div class="grid_1_of_4 images_1_of_4">
                    <a href=""><img style="width:200px;height:200px" src="<?php echo $single_feature_product->immagine; ?> " alt="" /></a>
                    <h2><?php echo $single_feature_product->nome; ?> </h2>
                    <p><?php echo $single_feature_product->stagione ?></p>
                    <p><span class="price"><?php echo $this->cart->format_number($single_feature_product->costo); ?> $</span></p>
                    <div class="button"><span><a style="background-color: #b1dfbb;border-radius: 10px" href="<?php echo base_url("single/".$single_feature_product->cod_specie);?>" class="details">Dettagli</a></span></div>
                </div>

            <?php } ?> 

        </div>
    </div>
</div>
