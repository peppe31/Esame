

<div class="main">
    <div class="content" style="text-align: center">
         <div class="login_panel" style="width:400px;text-align:center;display:inline-block;float: none">
            <h3>Entra</h3>
            <p>Sign in</p>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <form action="<?php echo base_url('customer/logincheck');?>" method="post">
                <input name="customer_email" placeholder="Email" type="text"/>
                <input name="customer_password" placeholder="Password" type="password"/>
                <p class="note"><a href="#">Hai dimenticato la password ?</a></p>
                <div class="buttons"><div><button class="grey">Login</button></div></div>
            </form>
        </div>	
        <div class="clear"></div>
    </div>
</div>
