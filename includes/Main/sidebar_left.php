<?php  if(isset($_SESSION['idMembre']) && !empty($_SESSION['idMembre'])) { ?>
<div class="col-md-3">
            <!-- Categories Links Starts -->
                <h3 class="side-heading">Cat&eacute;gories</h3>
                <div class="list-group categories">
                <?php 
                $categorie = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_categorie WHERE publication = 1 ORDER BY ordre");
                while($res_cat = mysql_fetch_array($categorie)) {
                    echo '<a href="'.urlRewrite($res_cat['titreFr'],4,$res_cat['id'],NULL,NULL).'" title="'.stripslashes($res_cat['titreFr']).'" class="list-group-item">
                        <i class="fa fa-chevron-right"></i>
                        '.stripslashes($res_cat['titreFr']).'
                    </a>';
                }
                ?>
                   
                </div>
            <!-- Categories Links Ends -->          
            <!-- Banner #1 Starts -->
            <?php 
            $banner = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_banner WHERE publication = 1 ORDER BY ordre ");
            while($res_banner = mysql_fetch_array($banner)){
                 echo '<img src="images/ressources/'.$res_banner['image'].'" alt="" class="img-responsive img-center-sm img-center-xs" /><br />';
            }
           

            ?>
                
                <br>
            <!-- Banner #1 Ends -->
            <!-- Bestsellers Links Starts -->
                <h3 class="side-heading">Top Vues</h3>
                <div class="product-col">
                <?php
                $res_produi = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_produit WHERE publication = 1 ORDER BY vue DESC LIMIT 0,1");
                while($produi = mysql_fetch_array($res_produi)){

                
                $prix = $produi['prix'];
                $prix_promo = $produi['prix_promo'];
                if($prix_promo == 0 && !empty($prix)){
                   $price = '<span class="price-new">'.number_format($prix,3,',',' ').' Dt</span> '; 
                }
                else if($prix_promo != 0 && !empty($prix)){
                    $price = '<span class="price-old">'.number_format($prix,3,',',' ').' Dt</span><span class="price-new">'.number_format($prix_promo,3,',',' ').' Dt</span> '; 
                }
                echo '<div class="image">
                        <img src="images/ressources/'.$produi['image1'].'" alt="'.$produi['titreFr'].'" title="'.$produi['titreFr'].'" class="img-responsive img-center-sm img-center-xs" />
                    </div>
                    <div class="caption">
                        <h4>
                            <a href="'.urlRewrite($produi['titreFr'],4,$produi['id_categorie'],$produi['id_sub_categorie'],$produi['id']).'"  title="'.$produi['titreFr'].'">'.stripslashes($produi['titreFr']).'</a>
                        </h4>
                        <div class="price">
                            '.$price.'
                        </div>
                        <div class="cart-button button-group">
                        <a href="'.urlRewrite($produi['titreFr'],4,$produi['id_categorie'],$produi['id_sub_categorie'],$produi['id']).'" title="'.$produi['titreFr'].'" class="btn btn-cart"  style="width:100%;"> <i class="fa fa-shopping-cart"></i>  D&eacute;tail</a>
                                           
                        </div>
                    </div>';}
                 ?>
                    
                </div>
            <!-- Bestsellers Links Ends -->
            </div>
           <?php } else if(!isset($_SESSION['idMembre'])) { ?>
<div class="col-md-3">
            <!-- Categories Links Starts -->
                <h3 class="side-heading">Espace revendeurs</h3>
                <div class="panel panel-smart">
                    
                        <form class="login_form form-horizontal" role="form" method="POST">
                            <div class="form-group" style="margin-bottom: 3px;">
                                <label for="user_name" class="col-sm-12 control-label"  style="text-align: left;padding-top: 0px;">
                                    E-mail
                                </label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="username" id="user_name" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password" class="col-sm-12 control-label" style="text-align: left;padding-top: 0px;">
                                    Mot de passe
                                </label>
                                <div class="col-sm-12">
                                    <input type="password" class="form-control" name="password" id="password" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                            <div id="msgbox" style="display:none"> </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-4">
                                    <button type="submit" class="btn btn-black text-uppercase" style="padding: 0px 5px;margin-bottom: 0;font-size: 12px;">Connexion</button>
                                </div>
                            </div>
                            <span style="font-size: 11px;">Devenir un revendeur Alliance
Vous êtes un spécialiste de la revente des matériels informatiques et bureautiques et vous souhaitez devenir un client d'Alliance Distribution.
<a href="index.php?pg=espace-revendeur&m=9">Cliquez ici</a></span>
                        </form>
                </div>
                 <!-- Banner #1 Starts -->
            <?php 
            $banner = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_banner WHERE publication = 1 ORDER BY ordre ");
            while($res_banner = mysql_fetch_array($banner)){
                 echo '<img src="images/ressources/'.$res_banner['image'].'" alt="" class="img-responsive img-center-sm img-center-xs" /><br />';
            }
           

            ?>
                
                <br>
 </div>
           <?php } ?>