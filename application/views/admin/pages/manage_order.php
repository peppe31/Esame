<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/product')?>">Gestione ordini</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Gestione ordini</h2>
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
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome cliente</th>
                            <th>Partita iva</th>
                            <th>Mail</th>
                            <th>Totale</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($all_manage_order_info as $single_order){
                            $i++;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $single_order->nome?></td>
                            <td><?php echo $single_order->piva?></td>
                            <td><?php echo $single_order->mail?></td>
                            <td><?php echo $this->cart->format_number($single_order->costo_totale)?> $</td>
                            <td>
                                <a class="btn btn-warning" href="<?php echo base_url('order/details/'.$single_order->cod_ordine)?>">Dettagli</a>
                                <a class="btn btn-danger" href="<?php echo base_url('delete/order/'.$single_order->cod_ordine);?>">Cancella</a>
                                <a class="btn btn-success" href="<?php echo base_url('delete/order/'.$single_order->cod_ordine);?>">Spedisci</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->
