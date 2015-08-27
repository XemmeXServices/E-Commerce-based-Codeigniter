<div class="container">
    <nav class="navbar navbar-fixed-top navbar-dark bg-primary">
        <a class="navbar-brand" href="{function:base_url}">Home</a>
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{function:base_url}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{function:base_url}Home/about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{function:base_url}Home/faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{function:base_url}Home/contact">Contact Us</a>
            </li>
        </ul>
        <div class="pull-right">
            <ul class="nav navbar-nav">
            <?php if ($this->session->userdata('user_id')==''){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="{function:base_url}/Auth/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{function:base_url}/Auth/Register">Register</a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="{function:base_url}/Account">Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{function:base_url}/Auth/Logout">Logout</a>
                </li>
            <?php } ?>
            </ul>
        </div>
    </nav>
    <div class="row">
        <div class="col-xs-12">
            <div class="jumbotron">
                <h1 class="display-3">TITLE !</h1>
                <p class="lead">DESCRIPTION.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3" style="border: 2px solid black;">
            <?php
            if ($level==1){
            ?>
            <table class="subleft" cellpadding="0" cellspacing="0">
                <tr class="sublefthdr"><td>Admin</td></tr>
                <tr class="subleftcntmargin"><td></td></tr>
                <tr class="subleftcnt"><td><a href="<?php echo url(); ?>admin/categories">Categories</a></td></tr>
                <tr class="subleftcnt"><td><a href="<?php echo url(); ?>admin/products">Products</a></td></tr>
                <tr class="subleftcnt"><td><a href="<?php echo url(); ?>admin/shipping">Shipping</a></td></tr>
                <tr class="subleftcntmargin"><td></td></tr>
            </table>
            <?php
            }
            foreach ($categorie as $key => $row){
                $categories[$row->category_key]['key'] 		= $row->category_key;
                $categories[$row->category_key]['parentkey'] 	= $row->category_parentkey;
                $categories[$row->category_key]['title'] 	= $row->category_title;
            }
            if (isset($categories)){
                if (count($categories)>0){
                    foreach ($categories as $value){
                        if ($value['parentkey']=='_top') {
                            echo '<table class="subleft" cellpadding="0" cellspacing="0">';
                            echo '<tr class="sublefthdr"><td>'.$value['title'].'</td></tr>';
                            echo '<tr class="subleftcntmargin"><td></td></tr>';
                        }

                        foreach ($categories as $value2) {
                            if ($value2['parentkey']==$value['key']){
                                echo '<tr class="subleftcnt"><td><a href="'.url().'products/c/'.$value2['key'].'">'.$value2['title'].'</a></td></tr>';		
                            }
                        }

                        if ($value['parentkey']=='_top') {
                            echo '<tr class="subleftcntmargin"><td></td></tr>';
                            echo '</table>';
                        }

                    }
                }
            }
            else {
                echo '<table class="subleft" cellpadding="0" cellspacing="0">';
                echo '<tr class="sublefthdr"><td>No Categories</td></tr>';
                echo '<tr class="subleftcntmargin"><td></td></tr>';
                echo '<tr class="subleftcnt"><td><a href="javascript:;">No Subcategories</a></td></tr>';
                echo '<tr class="subleftcntmargin"><td></td></tr>';
                echo '</table>';
            }
            ?>
        </div>
        <div class="col-xs-6" style="border: 2px solid black;">