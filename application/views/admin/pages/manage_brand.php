<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/brand')?>">Gestisci serre</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Gestisci serre</h2>
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
                            <th>Codice serra</th>
                            <th>Capienza</th>
                            <th>Azioni</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                            foreach($all_brand as $single_brand){
                                $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $single_brand->cod_serra;?></td>
                            <td class="center"><?php echo $single_brand->capienza;?></td>
                                <td class="center">
                                    <a class="btn btn-info" href="<?php echo base_url('edit/brand/' . $single_brand->cod_serra); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/brand/' . $single_brand->cod_serra); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
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
