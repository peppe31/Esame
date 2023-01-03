<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard') ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/category') ?>">Gestisci impiegati</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Gestisci impiegati</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            <style type="text/css">
                #result{color:red;padding:5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>Codice impiegato</th>
                            <th>Nome</th>
                            <th>Cognome</th>
                            <th>E-mail</th>
                            <th>Tipo</th>
							<th>Azioni</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($all_categroy as $single_category) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $single_category->cod_impiegato; ?></td>
                                <td><?php echo $single_category->nome ?></td>
                                <td><?php echo $single_category->cognome ?></td>
								<td><?php echo $single_category->mail ?></td>
								<td class="center">
                                    <?php if ($single_category->tipo == true) { ?>
                                        <span class="label label-success">Amministratore</span>
                                    <?php } else {
                                        ?>
                                        <span class="label label-danger" style="background:red">Impiegato</span>
                                        <?php }
                                    ?>
                                </td>
								<td>
									<a class="btn btn-danger" href="<?php echo base_url('category/delete_category/'.$single_category->cod_impiegato);?>">Cancella</a>
								</td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->
