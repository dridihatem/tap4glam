 <header class="header_area header_four" style=" background: #000000;position: unset;width: 100%;">
                <div class="container p-0">
                    <!--header top start--> 
                    <div class="header_top">
                           
                    <!--header top end-->
                    
                    <!--header bottom start--> 
                    <div class="header_bottom sticky-header">
                        <div class="row align-items-center">
                            <div class="col-lg-3">
                                <div class="logo">
                                    <a href="index.php"><img src="assets/img/logo/logo_tap4glam.png" alt="tap4glam"></a>
                                </div>
                            </div>
                            <div class="col-lg-9 text-right">
                                <div class="main_menu_inner">
                                    <div class="main_menu d-none d-lg-block"> 
                                        <ul>
                                            <?php 
                                            $menu_desktop = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_module WHERE menu1 =1 ORDER BY ordre");
                                            while($res_menu = mysqli_fetch_assoc($menu_desktop)){
                                                if(isset($_GET['m']) && $_GET['m']==$res_menu['id']){ $class = 'class="active"'; } else{ $class = NULL;}
                                                echo '<li '.$class.'><a href="'.urlRewrite($res_menu['nomFr'],$res_menu['id'],NULL,NULL,NULL).'" title="'.$res_menu['nomFr'].'">'.stripslashes($res_menu['nomFr']).'</a></li>';
                                            }
                                            ?>
                                            
                                         </ul>

                                    </div>
                                    <div class="mobile-menu d-lg-none">
                                        <nav>  
                                            <ul>
                                            <?php 
                                            $menu_mobile = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_module WHERE menu1 =1 ORDER BY ordre");
                                            while($res_menu_mobile = mysqli_fetch_assoc($menu_mobile)){
                                                if(isset($_GET['m']) && $_GET['m']==$res_menu_mobile['id']){ $class = 'class="active"'; } else{ $class = NULL;}
                                                echo '<li '.$class.'><a href="'.urlRewrite($res_menu_mobile['nomFr'],$res_menu_mobile['id'],NULL,NULL,NULL).'" title="'.$res_menu_mobile['nomFr'].'">'.stripslashes($res_menu_mobile['nomFr']).'</a></li>';
                                            }
                                            ?>
                                         </ul>
                                        </nav>      
                                    </div>
                                </div>    
                            </div>
                            
                        </div>
                    </div>
                  
                    <!--header bottom end-->   
                </div>  
            </header>

            <div class="breadcrumb-section about_bread">
                <div class="container">   
                    <div class="row">
                        <div class="col-12">
                            <div class="breadcrumb_content">
                                <ul>
                                    <li><a href="index.php">Accueil</a></li>
                                    <li class="active"><?php echo $nomModule; ?></li>
                                    <?php 
                                    if(isset($_GET['sm']) && $_GET['m']==2){
                                        $categorie = new Categorie();
                                        $categorie->getFromDB($_GET['sm']);
                                        echo '<li class="active">'.$categorie->getTitreFr().'</li>';
                                    } 
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>

             <div class="about_section">
                <div class="container">   
                    <div class="row align-items-center">
                        
                        <div class="col-lg-12 col-md-12">
                            <div class="about_section_content">
                            <?php include $p; ?>
                        </div>

                        </div>
                    </div>
                </div>
            </div>