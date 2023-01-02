<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard') ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/order') ?>">Dettagli ordine</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Dettagli ordine</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>



            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>

            <div class="box-content">
                <div class="span4 text-left">
                    <h2>Cliente Info(<?php echo $customer_info->piva; ?>)</h2>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>Nome Cliente : </td>
                            <td><?php echo $customer_info->nome; ?></td>
                        </tr>
						<tr>
							<td>Cognome Cliente : </td>
							<td><?php echo $customer_info->cognome; ?></td>
						</tr>
                        <tr>
                            <td>Email : </td>
                            <td><?php echo $customer_info->mail; ?></td>
                        </tr>
                    </table>
                </div>
                <div class="span4"></div>
                <div class="span4 text-right" class="table table-striped table-bordered">
                    <h2>Indirizzo Info(<?php echo $shipping_info->piva; ?>)</h2>
                    <table class="table table-striped table-bordered">
						<tr>
							<td>Città : </td>
							<td><?php echo $customer_info->citta; ?></td>
						</tr>
						<tr>
							<td>Indirizzo : </td>
							<td><?php echo $customer_info->via." ".$customer_info->civico; ?></td>
						</tr>
                        <tr>
                            <td>CAP : </td>
                            <td><?php echo $shipping_info->cap; ?></td>
                        </tr>
                    </table>
                </div>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome prodotto</th>
                            <th>Immagine prodotto</th>
                            <th>Costo</th>
                            <th>Quantità</th>
                            <th>Totale</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($order_details_info as $single_order_details) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $single_order_details->nome ?></td>
                                <td><img src="<?php echo base_url($single_order_details->immagine);?>" style="width:200px;height:100px"/></td>
                                <td><?php echo $this->cart->format_number($single_order_details->costo)?> $</td>
                                <td><?php echo $single_order_details->quantita ?></td>
                                <td><?php echo $this->cart->format_number($single_order_details->costo * $single_order_details->quantita) ?> $</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfooter>
                        <td colspan="5">Totale ordine</td>
                        <td>= <?php echo $this->cart->format_number($order_info->costo_totale)?> $</td>
                    </tfooter>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->
