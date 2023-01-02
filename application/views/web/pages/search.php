

<div class="main">
    <div class="content">
        <div class="content_top">
            <div class="heading">
                <h3>Hai cercato: <b style="color:red"><?php if($search){echo $search;}?></b></h3>
            </div>
            <div class="clear"></div>
        </div>

        <?php
        $arr_chunk_product = array_chunk($get_all_product, 4);

        foreach ($arr_chunk_product as $chunk_products) {
            ?>
            <div class="section group">
                <?php foreach ($chunk_products as $single_products) { ?>
                    <div class="grid_1_of_4 images_1_of_4">
                        <a href="<?php echo base_url('single/'.$single_products->cod_specie);?>"><img style="width:250px;height:250px" src="<?php echo base_url('uploads'.$single_products->immagine)?>" alt="" /></a>
                        <h2><?php echo $single_products->nome ?></h2>
                        <p><?php echo $single_products->stagione ?></p>
                        <p><span class="price"><?php echo $this->cart->format_number($single_products->costo) ?> $</span></p>
                        <div class="button"><span><a style="background-color: #b1dfbb;border-radius: 10px" href="<?php echo base_url('single/'.$single_products->cod_specie);?>" class="details">Dettagli</a></span></div>
                    </div>
                    <?php
                }
                ?>

            </div>
            <?php
        }
        ?>
</div>
<style>
    .content_pagi{padding:20px;border: 1px solid #EBE8E8;border-radius: 3px;}
    .pagination{}
    .pagination ul{}
    .pagination ul li{float: left}
    .pagination ul li a{color: #000;padding: 7px 12px;border: 1px solid #ddd;font-size: 18px;}
    .pagination ul li a:hover{background:#ddd;}
    .pagiactive a{background:#ddd;}

</style>
