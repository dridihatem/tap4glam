<div class="site-header header-v2">
            <div class="flat-top">
                <div class="container">
                    <div class="row">
                        <div class="flat-wrapper">
                            <div class="custom-info">
                                <div class="block1">
                                <span style="float: left;"><img src="images/template/icon/contact_icon.svg" style="width: 27px;"></span>
                                <span class="color-blue">Call us<br /><span class="title_header">+216 71 182 142</span>
                            </span>
                            </div>
                            <div class="block1">
                                 <span style="float: left;"><img src="images/template/icon/calendar_icon.svg" style="width: 27px;"></span>
                                <span class="color-blue">Opening time<br /><span class="title_header">Mon - Sat 08:00 to 18:00</span>
                            </span>
                            </div>

                            <div class="block1  hidden-xs hidden-sm" style="padding-top: 0px;">
                                <a href="<?php echo urlRewrite("request-quote", 30, NULL, NULL, NULL) ?>" class="bouton-devis"><img src="images/template/icon/devis_icon.svg" style="width:27px;"/> Request a quote</a>
                            </div>
                                
                            </div>

                            <div class="social-links hidden-xs hidden-sm">
                               <form name="" class="inline-form">
                                <div class="col-md-5" style="padding: 0px 3px;">
                                    <input type="text" class="wpcf7-form-control" placeholder="Login"  style="padding: 5px;height: 31px;background: #ffffffbf;color: #008ac1;" />
                                </div>
                                <div class="col-md-5" style="padding: 0px 3px;"><input type="password" placeholder="Password" class="form-control"  style="padding: 5px;height: 31px;background: #ffffffbf;color: #008ac1;"/></div>
                                <div class="col-md-2" style="padding: 0px 3px;"><input type="submit" class="btn" value="OK" style="height: 31px;line-height: 0px;border-radius: 8px;-webkit-border-radius: 8px;-moz-border-radius: 8px;-ms-border-radius: 8px;-o-border-radius: 8px;" /></div>   

                               </form>
                               <div class="text-right" style="position: relative;left: 156px;font-size: 13px;">
                               <a href="">Register</a>  <a href="">Forget password?</a>
                                </div>
                            </div>
                        </div><!-- /.flat-wrapper -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.flat-top -->
          
            <header id="header" class="header"> 
                <div class="header-wrap">
                    <div id="logo" class="logo">
                        <a href="index.php">
                            <img src="images/template/logo.png" alt="WFS">
                        </a>
                    </div><!-- /.logo -->
                    <div class="btn-menu">
                        <span></span>
                    </div><!-- //mobile menu button -->
               
                    <div class="nav-wrap">                                
                        <nav id="mainnav" class="mainnav">
                            <div class="menu-extra">
                                <ul>
                                    <li id ="s" class="search-box">
                                        <a href="#search" class="flat-search"><i class="fa fa-search"></i></a>
                                        <div class="submenu top-search">
                                            <div class="widget widget_search">
                                                <form class="search-form">
                                                    <input type="search" class="search-field" placeholder="Search …">
                                                    <input type="submit" class="search-submit">
                                                </form>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                                
                            </div><!-- /.menu-extra -->
                            <ul class="menu"> 
                                 <?php
            $req = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_module WHERE menu1 = 1 ORDER BY ordre ASC");
    while($data = mysql_fetch_object($req)){
      $reqSm = mysql_fetch_array(mysql_query(sprintf("SELECT count(*) FROM ".$_SESSION['pfx']."_module WHERE moduleParent = ".$data->id)));
      $nbr = $reqSm[0];
      if($nbr == 0){
        if(isset($_GET['m']) && $_GET['m']==$data->id){ $class = 'class="home"'; } else{ $class = NULL;}
        echo '<li '.$class.'><a href="'.urlRewrite($data->nomEn,$data->id,NULL,NULL,NULL,NULL,NULL).'" title="'.$data->nomEn.'">'.stripslashes($data->nomEn).'</a></li>';
      }
      else if($data->type=="Produits"){
        include("includes/Main/produit_submenu".$_SESSION['lng'].".php");
      }
      else {
        include("includes/Main/submenu".$_SESSION['lng'].".php");
      }
      }
      ?>

                                
                            </ul><!-- /.menu -->                                        
                        </nav><!-- /.mainnav -->  
                    </div><!-- /.nav-wrap -->
                </div><!-- /.header-wrap --> 
            </header><!-- /.header -->
        </div><!-- /.site-header -->

                        