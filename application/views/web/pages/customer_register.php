

<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Registrati qui</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form method="post" action="<?php echo base_url('customer/shipping/register');?>">
                <table>
                    <tbody>
					<tr>
						<td>
							<div>
								<input type="text" name="shipping_piva" placeholder="Partita IVA">
							</div>
							<div>
								<input type="text" name="password" placeholder="Password">
							</div>
							<div>
								<input type="text" name="shipping_name" placeholder="Nome">
							</div>
							<div>
								<input type="text" name="shipping_city" placeholder="Città">
							</div>
							<div>
								<input type="text" name="shipping_civico" placeholder="Civico">
							</div>
						</td>
						<td>
							<div>
								<input type="text" name="shipping_email" placeholder="E-mail">
							</div>
							<div>
								<input type="text" name="shipping_cognome" placeholder="Cognome">
							</div>
							<div>
								<input type="text" name="shipping_address" placeholder="Indirizzo">
							</div>
							<div>
								<input type="text" name="shipping_zipcode" placeholder="CAP">
							</div>
						</td>
					</tr>
					</tbody></table>
                <div class="search"><div><button class="grey">Crea account</button></div></div>
                <p class="terms">Cliccando 'Crea account' accetti <a href="#">Termini &amp; Condizioni</a>.</p>
                <div class="clear"></div>
            </form>
        </div>  	
        <div class="clear"></div>
    </div>
</div>
