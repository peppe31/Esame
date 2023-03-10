<!DOCTYPE HTML>

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
                    <div style="display:flex;align-items:center;justify-content:center;background-color: #00A300;border-radius: 20px" class="login"><a href="<?php echo base_url('customer/logout')?>">Logout</a></div>
                <?php } else {
                    ?>
                    <div style="display:flex;align-items:center;justify-content:center;background-color: #00A300;border-radius: 20px" class="login"><a href="<?php echo base_url('customer/login')?>">Login</a></div>

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
                ?>"><a href="<?php echo base_url("/product");?>">Prodotti</a>
				</li>
                    <?php if ($this->cart->total_items()) { ?>
                    <li class="<?php
                    if ($this->uri->uri_string() == 'cart') {
                        echo "active";
                    }
                    ?>"><a href="<?php echo base_url("/cart");?>">Carrello</a></li>
                    <?php } ?>
                <li class="<?php
                if ($this->uri->uri_string() == 'contact') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url('/contact')?>">Contattaci</a> </li>

                <?php if(!$this->session->userdata('customer_id')){?>

                <li class="<?php
                if ($this->uri->uri_string() == 'admin') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url('admin')?>">Admin</a> </li>
                <li class="<?php
                if ($this->uri->uri_string() == 'customer/register') {
                    echo "active";
                }
                ?>"><a href="<?php echo base_url('customer/register')?>">Registrati</a> </li>

                <?php }?>

            </ul>
            <div class="clear"></div>
        </div>
