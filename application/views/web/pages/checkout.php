

<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Conferma ordine</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>


				<div style="margin-bottom: 20px">
					<form action="<?php echo base_url('update/date/cart') ?>" method="post">
						<span>Quando vorresti ricevere l'ordine ?</span>
							<input type="date" name="data_consegna" value="<?php echo $this->session->userdata('data_consegna'); ?>"/>
							<input type="submit" name="submit" value="Scegli data"/>
						</form>

				</div>
			<form method="post" action="<?php echo base_url('save/order');?>" style="text-align: left">
				<span><input type="radio" name="payment" value="cashon"/>Paga alla consegna</span><br/>
                <span><input type="radio" name="payment" value="ssl"/>Carta di credito</span><br/>
                <span><input type="radio" name="payment" value="paypal"/>PayPal</span><br/><br/>
                <div class="search"><div><button class="grey">Paga</button></div></div>
            </form>
           
        </div>  	
        <div class="clear"></div>
    </div>
</div>
