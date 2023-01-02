<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a>
            <i class="icon-angle-right"></i> 
        </li>
        <li>
            <i class="icon-edit"></i>
            <a href="<?php echo base_url('edit/product/'.$product_info_by_id->cod_specie)?>">Modifica prodotto</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Modifica prodotto</h2>
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
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <div class="box-content">
                <form name="formName" class="form-horizontal" action="<?php echo base_url('update/product/'.$product_info_by_id->cod_specie);?>" method="post" enctype="multipart/form-data">
                    <fieldset>

						<div class="control-group">
							<label class="control-label" for="fileInput">Codice prodotto</label>
							<div class="controls">
								<input class="span6 typeahead" value="<?php echo $product_info_by_id->cod_specie;?>" name="product_codice" id="fileInput" type="text"/>
							</div>
						</div>
						<div class="control-group">
                            <label class="control-label" for="fileInput">Nome prodotto</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $product_info_by_id->nome;?>" name="product_title" id="fileInput" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Stagione</label>
                            <div class="controls">
                                <textarea class="cleditor" name="stagione" id="textarea2" rows="2">
                                    <?php echo $product_info_by_id->stagione;?>
                                </textarea>
                            </div>
                        </div>        
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Tempario</label>
                            <div class="controls">
                                <textarea class="cleditor" name="tempario" id="textarea2" rows="4">
                                    <?php echo $product_info_by_id->tempario;?>
                                </textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Immagine</label>
                            <div class="controls">
                                <input class="span6 typeahead" name="product_image" id="fileInput" type="file"/>
                                <input class="span6 typeahead" name="product_delete_image" value="<?php echo base_url($product_info_by_id->immagine);?>" type="hidden"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <div class="controls">
                                <img src="<?php echo base_url($product_info_by_id->immagine);?>" style="width:500px;height:200px"/>
                            </div>
                        </div> 
                        
                        <div class="control-group">
                            <label class="control-label" for="fileInput">Costo</label>
                            <div class="controls">
                                <input class="span6 typeahead" value="<?php echo $product_info_by_id->costo;?>" name="product_price" id="fileInput" type="text"/>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Salva modifiche</button>
                            <button type="reset" class="btn">Cancella</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->


</div><!--/.fluid-container-->

<!-- end: Content -->
