

<div class="main">
    <div class="content">
        <div class="section group">
            <div class="cont-desc span_1_of_2">				
                <div class="grid images_3_of_2">
                    <img src="<?php $prodotto->immagine?>" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2><?php echo $prodotto->nome?></h2>
                    <p><?php echo $prodotto->stagione?></p>
                    <div class="price">
                        <p>Costo: <span><?php echo $this->cart->format_number($prodotto->costo)?> Tk</span></p>
                        <p>Tempario: <span><?php echo $prodotto->tempario?></span></p>
                    </div>
                    <div class="add-cart">
                        <form action="<?php './save/cart' ?>" method="post">
                            <input type="number" class="buyfield" name="qty" value="1"/>
                            <input type="hidden" class="buyfield" name="product_id" value="<?php echo $prodotto->cod_specie?>"/>
                            <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                        </form>				
                    </div>
                </div>
                <div class="product-desc">
                    <h2>Product Details</h2>
                    <p><?php echo $prodotto->stagione?></p>
                </div>

            </div>
        </div>
    </div>
</div>
