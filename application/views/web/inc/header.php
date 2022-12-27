<!DOCTYPE HTML>
<head>
    <title>PolyPlant</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href=<?php echo base_url("assets/web/css/style.css"); ?> rel="stylesheet" type="text/css" media="all"/>
    <link href=<?php echo base_url("assets/web/css/menu.css"); ?> rel="stylesheet" type="text/css" media="all"/>

    <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
    <link rel="shortcut icon" type="image/x-icon" href="" />
</head>
<body>
    <div class="wrap">
        <div class="header_top">
            <div class="logo">
                <a href=<?php echo base_url('/');?>><img style="width: 350px;height:180px" src=<?php echo base_url("assets/web/images/immagini/logo.png");?> alt="" /></a>
            </div>
            <div class="header_top_right">
                <div class="search_box">
                    <form method="get" action="<?php echo base_url('search')?>">
                        <input style="border:none;border-radius: 20px" type="text" placeholder="Cerca prodotti" name="search">
                        <input style="background-color: #00A300;border-radius: 20px" type="submit" value="Cerca">
                    </form>
                </div>
                <div class="shopping_cart">
                    <div class="cart">
                        <a href="<?php echo base_url("/cart");?>" title="View my shopping cart">
                            <span class="cart_title">Carrello</span>
                            <span class="no_product">(<?php echo $this->cart->total_items();?> Articoli)</span>
                        </a>
                    </div>
                </div>
                <?php
                $customer_id = $this->session->userdata('customer_id');
                if ($customer_id) {
                    ?>
                    <div style="display:flex;align-items:center;justify-content:center;background-color: #00A300;border-radius: 20px" class="login"><a href="">Logout</a></div>
                <?php } else {
                    ?>
                    <div style="display:flex;align-items:center;justify-content:center;background-color: #00A300;border-radius: 20px" class="login"><a href="">Login</a></div>

                    <?php
                }
                ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="menu">
            <ul id="dc_mega-menu-orange" style="float:left" class="dc_mm-orange">
                <li class="<?php
                if ($this->uri->uri_string() == '') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url("/");?>">Home</a></li>
                <li class="<?php
                if ($this->uri->uri_string() == 'prodotti') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url("/product");?>">Prodotti</a> </li>
                    <?php if ($this->cart->total_items()) { ?>
                    <li class="<?php
                    if ($this->uri->uri_string() == 'cart') {
                        echo "active";
                    }
                    ?>"><a href="">Carrello</a></li>
                    <?php } ?>
                <li class="<?php
                if ($this->uri->uri_string() == 'contact') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url('/contact')?>">Contattaci</a> </li>
                
                <?php if(!$this->session->userdata('customer_id')){?>
                
                <li class="<?php
                if ($this->uri->uri_string() == 'customer/login') {
                    echo "active";
                }
                ?>"><a href="">Login</a> </li>
                <li class="<?php
                if ($this->uri->uri_string() == 'customer/register') {
                    echo "active";
                }
                ?>"><a href="">Registrati</a> </li>
                
                <?php }?>
                
            </ul>
            <div class="clear"></div>
        </div>
