

<div style="margin-right: 10px;margin-left: 10px" class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
				<h1 style="font-size: 40px"><strong>Prodotti</strong></h1>
            </div>
            <div class="clear"></div>
        </div>

        <?php
        $arr_chunk_product = array_chunk($prodotti, 4);

        foreach ($arr_chunk_product as $chunk_products) {
            ?>
            <div class="section group">
                <?php foreach ($chunk_products as $single_products) { ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <h2><?php echo $single_products->nome ?></h2>
                        <p><?php echo $single_products->stagione ?></p>
                        <p><span class="price"><?php echo $this->cart->format_number($single_products->costo) ?> $</span></p>
                        <div class="button"><span><a style="background-color: #b1dfbb;border-radius: 10px" href="<?php echo base_url('single/').$single_products->cod_specie;?>" style="background-color: #b1dfbb;border-radius: 10px" class="details">Dettagli</a></span></div>
                    </div>
                    <?php
                }
                ?>

            </div>
            <?php
        }
        ?>

    </div>
</div>
