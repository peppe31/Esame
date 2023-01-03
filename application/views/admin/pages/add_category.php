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
            <a href="<?php echo base_url('add/category')?>">Aggiungi impiegato</a>
        </li>
    </ul>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon edit"></i><span class="break"></span>Aggiungi impiegato</h2>
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
                <form class="form-horizontal" action="<?php echo base_url('save/category');?>" method="post">
                    <fieldset>

                        <div class="control-group">
                            <label class="control-label" for="fileInput">Codice impiegato</label>
                            <div class="controls">
                                <input class="span6 typeahead" id="category_name" name="codice" type="text"/>
                            </div>
                        </div>          
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Nome</label>
                            <div class="controls">
                                <input class="pan6 typeahead" id="category_description" name="nome" rows="3"></input>
                            </div>
                        </div>

						<div class="control-group">
							<label class="control-label" for="textarea2">Cognome</label>
							<div class="controls">
								<input class="pan6 typeahead" id="category_description" name="cognome" rows="3"></input>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="textarea2">E-mail</label>
							<div class="controls">
								<input class="pan6 typeahead" id="category_description" name="mail" rows="3"></input>
							</div>
						</div>

						<div class="control-group">
							<label class="control-label" for="textarea2">Password</label>
							<div class="controls">
								<input class="pan6 typeahead" id="category_description" name="password" rows="3"></input>
							</div>
						</div>
                                
                        <div class="control-group">
                            <label class="control-label" for="textarea2"> Tipo</label>
                            <div class="controls">
                                <select name="tipo">
                                    <option value=true>Amministatore</option>
                                    <option value=false>Impiegato</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-actions">
                            <button type="submit" id="save_category" class="btn btn-primary">Aggiungi impiegato</button>
                            <button type="reset" class="btn">Cancella</button>
                        </div>
                    </fieldset>
                </form>   

            </div>
        </div><!--/span-->

    </div><!--/row-->

    
    
</div><!--/.fluid-container-->

<!-- end: Content -->
