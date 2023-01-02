<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard') ?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/order') ?>">Profilo</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Profilo</h2>
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
                    <h2>Impiegato Info(<?php echo $this->session->userdata('cod_impiegato'); ?>)</h2>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>E-mail : </td>
                            <td><?php echo $this->session->userdata('user_email'); ?></td>
                        </tr>
						<tr>
							<td>Nome : </td>
							<td><?php echo $this->session->userdata('user_name'); ?></td>
						</tr>
                        <tr>
                            <td>Cognome : </td>
                            <td><?php echo $this->session->userdata('cognome'); ?></td>
                        </tr>
						<tr>
							<td>Tipo : </td>
							<td><?php if ($this->session->userdata('tipo')==true)
							{echo "Amminstratore";
							} else{ echo"Impiegato";} ?></td>
						</tr>
                    </table>
                </div>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->
