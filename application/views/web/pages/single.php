

<div class="main">
    <div class="content">
        <div class="section group" style="display: flex;justify-content: center;align-items: center">
            <div class="cont-desc span_1_of_2">				
                <div class="grid images_3_of_2">
                    <img src="<?php echo base_url('uploads/'.$prodotto->immagine);?>" alt="" />
                </div>
                <div class="desc span_3_of_2">
                    <h2><?php echo $prodotto->nome?></h2>
                    <p><?php echo $prodotto->stagione?></p>
                    <div class="price">
                        <p>Costo: <span><?php echo $this->cart->format_number($prodotto->costo)?> $</span></p>
                        <p>Tempario: <span><?php echo $prodotto->tempario?></span></p>
                    </div>
                    <div class="add-cart">
                        <form action="<?php echo base_url('save/cart') ?>" method="post">
                            <input type="number" class="buyfield" name="qty" value="1"/>
                            <input type="hidden" class="buyfield" name="product_id" value="<?php echo $prodotto->cod_specie?>"/>
                            <input type="submit" class="buysubmit" name="submit" value="Aggiungi al carrello"/>
                        </form>				
                    </div>
					<style type="text/css">
						#result{color:red;padding: 5px}
						#result p{color:red}
					</style>
					<div id="result">
						<p><?php echo $this->session->flashdata('message');?></p>
					</div>
                </div>
                <div class="product-desc">
                    <h2>Dettagli prodotto</h2>
                    <p><?php echo $prodotto->stagione?></p>
                </div>

            </div>
        </div>
    </div>
</div>

