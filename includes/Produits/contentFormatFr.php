<?php
echo '
    <div class="row marbtm50">
    <div class="col-md-3">
    <div class=" wdt-100 marbtm50">
       <h5>Catégorie des modules</h5>
       <ul class="blog-category-cl">';
       $categorie = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_categorie ORDER BY id");
       while($res_categ = mysql_fetch_array($categorie)){
         $img = $res_categ['image'];
 				if(isset($img) && !empty($img) && file_exists("images/ressources/".$img)){
 					$imm = '<img src="images/ressources/'.$img.'"  style="width:30px;"/>';

 				}
 				else {$imm = NULL;}
          if(isset($_GET['sm']) && $_GET['sm']==$res_categ['id']){ $class = 'class="active"'; } else{ $class = NULL;}
echo '<li><a href="'.urlRewrite($res_categ['titreFr'],5,$res_categ['id'],NULL,NULL,NULL).'" title="'.$res_categ['titreFr'].'" '.$class.'>'.$imm.' '.stripslashes($res_categ['titreFr']).'</a></li>';

       }
       echo '</ul>
    </div>



       <div class="wdt-100 marbtm50 ">
          <h5>Dérniers modèles</h5>';
          $produit = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_produit WHERE publication = 1 LIMIT 0,4");
          while($res_produit = mysql_fetch_array($produit)){
echo '<div class="post-list"  style="border:0px;">
   <span class="post-img" style="height: 73px;"><img src="images/ressources/'.$res_produit['image1'].'" class="img-responsive" alt="'.$res_produit['modele'].'"></span>
   <div class="post-txt product-txt" style="padding-top: 0px;">
      <h5>'.stripslashes($res_produit['modele']).'</h5>
      <p><a href="'.urlRewrite($res_produit['modele'],5,$res_produit['id_categorie'],$res_produit['id_sous_categorie'],$res_produit['id']).'">Voir détail</a>
      </p>

   </div>
</div>';

          }


        echo '
        </div>
        <div class="have-queston marbtm50">
                        <p>Avez-vous une question?</p>
                        <h3>CONSULTEZ GRATUITEMENT NOTRE AGENT
                        </h3>
                        <a data-animation="animated fadeInUp" class="header-requestbtn black-request-btn hvr-bounce-to-right" href="'. urlRewrite("demande-de-devis", 12, NULL, NULL, NULL).'">Demander un devis</a>
                     </div>

<div class="contact-help">
                     <div class="office-info-col wdt-100">
                        <h4>CONTACT </h4>
                        <ul class="office-information">
                           <li class="office-loc">
                              <span class="info-txt">1 Immeuble Monaco Center Avenue du Japon 1073 Montplaisir, Tunis</span>
                           </li>
                           <li class="office-phn">
                              <span class="info-txt fnt_17">(+216) 26 613 302</span>
                           </li>
                           <li class="office-msg">
                              <span class="info-txt fnt_17">contact@powermotors.com.tn</span>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <a class="pdf-button" href="http://powermotors.com.tn/catalogue/catalogue_powermotors.pdf">Télécharger le brochure</a>

    </div>';

if(isset($_GET['sssm']) && !empty($_GET['sssm']) && is_numeric($_GET['sssm'])){ 
    $produit_detail = new Produit();
    $produit_detail->getFromDB($_GET['sssm']);
    $produit_detail->updateView($_GET['sssm']);
    ?>
    <div class="col-md-8 right-column pull-right">
                  <div class="wdt-100 marbtm20">
                    
                     <div class="product-slider">
                         <div class="item">
                         <a href="images/ressources/<?php echo $produit_detail->getImage1(); ?>" id="produit"><img src="images/ressources/<?php echo $produit_detail->getImage1(); ?>" class="img-responsive" alt="<?php echo $produit_detail->getModele(); ?>" /> </a>
                         </div>
                         <div class="thumbnail">
                             <ul class="prd-info-list">
                          <?php 
                          $img2_ = $produit_detail->getImage2();
                          if(isset($img2_) && !empty($img2_) && file_exists("images/ressources/".$img2_)){
                              echo '<li style="width:21%;"><a href="images/ressources/'.$img2_.'" id="produit"><img src="images/ressources/'.$img2_.'" class="img-responsive" alt="'.$produit_detail->getModele().'"  /> </a></li>';
                              
                          }
                          else echo NULL;
                          $img3_ = $produit_detail->getImage3();
                           if(isset($img3_) && !empty($img3_) && file_exists("images/ressources/".$img3_)){
                              echo '<li style="width:21%;"><a href="images/ressources/'.$img3_.'" id="produit"><img src="images/ressources/'.$img3_.'" class="img-responsive" alt="'.$produit_detail->getModele().'"  /> </a></li>';
                              
                          }
                          else echo NULL;
                         
                          
                          ?> 
                             </ul>
                         </div>
                         </div>
                       <div class="product-desc">
                           <ul class="prd-info-list">
                           <li><span>Catégorie:</span> <?php
                           $categorie = new Categorie();
                           $categorie->getFromDB($produit_detail->getId_categorie());
                            $souscategorie = new SousCategorie();
                           $souscategorie->getFromDB($produit_detail->getId_sous_categorie());
                           echo '<a href="'. urlRewrite($categorie->getTitreFr(), 5, $categorie->getId(), NULL, NULL).'" title="'.$categorie->getTitreFr().'">'.stripslashes($categorie->getTitreFr()).'</a>';
                           ?> -> <?php echo '<a href="'. urlRewrite($souscategorie->getTitreFr(), 5, $souscategorie->getId_categorie(), $souscategorie->getId(), NULL).'" title="'.$souscategorie->getTitreFr().'">'.$souscategorie->getTitreFr(); ?></a></li>
                         
                        </ul>
                         <h4><?php echo stripslashes($produit_detail->getModele());?></h4>
                         <h5><?php echo stripslashes($produit_detail->getTitreFr());?></h5>
                         <p class="fnt-17" style="background: #efefef;">
                             Chassis : <?php echo $produit_detail->getChassis(); ?><br />
                             Moteur : <?php  echo $produit_detail->getMoteur(); ?><br />
                             Puissance : <?php  echo $produit_detail->getPuissance(); ?><br />
                             Emission : <?php  echo $produit_detail->getEmission(); ?><br />
                         </p>
                         <p class="line-height26">
                             <?php echo extraireTxt(formatedTxt($produit_detail->getDescriptionFr()), 100); ?>
                         </p>
                         <br/>
                         <ul class="prd-info-list">
                             <li style="width:50%; float:left;">
                                 <?php 
                                 $brochure = $produit_detail->getFiche();
                                 if(isset($brochure) && !empty($brochure)){
                                     echo '<a href="images/ressources/'.$brochure.'" target="_blank"><i class="fa fa-file-pdf-o"></i> Télécharger le brochure</a>';
                                 }
                                 else {echo '<a href="catalogue/catalogue_powermotors.pdf" target="_blank"><i class="fa fa-file-pdf-o"></i> Télécharger le brochure</a>';}
                                 ?>
                             </li><li  style="width:50%; float:left;text-align: right;"><i class="fa fa-eye"></i> <?php echo $produit_detail->getVu(); ?></li></ul>
                     
                        <a style="width: 100%;" class="header-requestbtn filter-link add-cart-link hvr-bounce-to-right" href="#demande">Demande de devis</a>
                        
                       
                     </div>
                  </div>
                  <div class="wdt-100 marbtm50">
                     <h4 class="fnt20">Description de produit</h4>
                     <p><?php echo stripslashes($produit_detail->getDescriptionFr()); ?></p>
                  </div>
                  <div class="wdt-100">
                     <h4 class="fnt20" id="demande">Demander un devis</h4>
                     <p class="fnt-17"><strong>Modèle : <?php echo $produit_detail->getModele(); ?></strong></p>
                     <p>Votre adresse email ne sera pas publiée. Les champs requis sont indiqués *</p>
                      <?php
                                         if(isset($_POST['submit'])){
$result = "";
$captchasum = htmlspecialchars($_POST['captchasum']);
if (!empty($captchasum) && !($captchasum == "4" || $captchasum == "quatre")) {
    echo '<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Veuillez entrer 4 ou quatre dans ce champ.</div>';
    
}
else {
    $contact = new Contact();
    $contact->setContact(NULL,$_POST["nom"],$_POST["email"],$_POST['societe'],"","Demande de devis - ".$produit_detail->getModele(),$_POST["message"],date("Y-m-d H:i:s"),0);
      if($contact->saveToDB()){

            $headers ='From:  '.$_POST['nom'].'<'.$_POST['email'].'>'."\n"; 
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= "X-Priority: 1 (Higuest)\n"; 
            $headers .= "X-MSMail-Priority: High\n"; 
            $headers .= "Importance: High\n"; 
            $body = '
            <p><img src="http://www.powermotors.com.tn/images/template/logo_power.png" /><br>
            </p>
           <p><h3>Modèle produit : '.$produit_detail->getModele().'</h3></p>
           <p><b>Société </b>: '.$_POST['societe'].'</p>
            <p><b>Nom de client </b> :'.$_POST['nom'].'</p>
           <p><b>E-mail </b> :<a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a></p>
            <p><b>Demande devis pour le modèle: </b> : '.$produit_detail->getModele().'</p>
            <p><b>Message  </b> : '.$_POST['message'].'</p>
            <p>
            ';
            @mail("contact@powermotors.com.tn",'Demande de devis-'.$produit_detail->getModele(),$body,$headers);

       $result ='<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Merci :) </strong>Message envoy&eacute; avec succ&eacute;s!</div>';}
      else{$result = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Danger!</strong> erreur SQL
</div>';}
}
    
                                         }


?>
                     <form name="devis" action="" method="POST">
                         <?php echo $result; ?>
                         <div class="row row_mar_zero_ipad">
                        <div class="col-md-12 form-field">
                           <label>Votre message*</label>
                           <textarea name="message" cols="1" rows="2" class="form-comment" required></textarea>
                        </div>
                        <div class="col-md-12 form-field">
                           <label>Nom & prénom *</label>
                           <input name="nom" type="text" class="form-input" required>
                        </div>
                          <div class="col-md-12 form-field">
                           <label>Société *</label>
                           <input name="societe" type="text" class="form-input" required>
                        </div>
                        <div class="col-md-12 form-field">
                           <label>Email *</label>
                           <input name="email" type="text" class="form-input" required>
                        </div>
						<div class="col-md-12 form-field">
                           <label>2 + 2 =</label>
                           <input name="captchasum" type="text" class="form-input" required>
                        </div>
                        <div class="col-md-12 form-field">
                           <input name="submit" type="submit" class="form-submit-btn" value="Submit" >
                        </div>
                     </div>
                     </form>
                  </div>
               </div>
    
<?php }
else if(isset($_GET['ssm']) && !empty($_GET['ssm']) && is_numeric($_GET['ssm'])){
    $souscategorie = new SousCategorie();
    $souscategorie->getFromDB($_GET['ssm']);
    
    echo ' <div class="col-lg-9 col-md-9">
         <h3>'.$souscategorie->getTitreFr().'</h3>
  <div class="block_type" style="display:block;overflow: hidden; margin-bottom:10px;">
    ';
    
    $sous_categori = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_sous_categorie WHERE id_categorie = ".mysql_real_escape_string($_GET['sm'])."");
    while($res_sous_categorie = mysql_fetch_array($sous_categori)) {
        if($res_sous_categorie['id']  == $_GET['ssm']){
            $active = "active";
        }
        else {$active = NULL;}
echo '
<div class="col-md-4" style="margin-bottom: 10px;">
<div class="post-list">
      <span class="post-img"><img src="images/ressources/'.$res_sous_categorie['image'].'" class="img-responsive" alt="'.$res_sous_categorie['titreFr'].'"></span>
          <div class="post-txt product-txt '.$active.'">
        <a href="'.urlRewrite($res_sous_categorie['titreFr'],5,$_GET['sm'],$res_sous_categorie['id'],NULL,NULL).'" title="'.$res_sous_categorie['titreFr'].'"><h5>'.stripslashes($res_sous_categorie['titreFr']).'</h5></a>
      </div>
  </div>

</div>

';

    }
    echo '</div>';
    echo '<div class="block_modele" style="display:block;overflow: hidden;">';
      echo '<h4 style="font-size:23px;">Modèles</h4>';
$produit = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_produit WHERE publication = 1 AND id_categorie =".mysql_real_escape_string($_GET['sm'])." AND id_sous_categorie =".mysql_real_escape_string($_GET['ssm'])." ");
while($res_produit = mysql_fetch_array($produit)){
    $brochure = $res_produit['fiche'];
                                 if(isset($brochure) && !empty($brochure)){
                                     $cata =  '<a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="images/ressources/'.$brochure.'" target="_blank"><i class="fa fa-file-pdf-o"></i> Fiche</a>';
                                 }
                                 else {$cata = '<a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="catalogue/catalogue_powermotors.pdf" target="_blank"><i class="fa fa-file-pdf-o"></i> Fiche</a>';}
                             
echo '<div class="shop-column blogBox">
                     <img src="images/ressources/'.$res_produit['image1'].'" class="img-responsive" alt="'.$res_produit['titreFr'].'">
                     <div class="shop-column-head">
                        <h5>Modèle : '.$res_produit['modele'].'</h5>
                        
                     </div>
                     <span class="shop-price">'.formatedTxt(stripslashes($res_produit['titreFr'])).'</span>
                         '.$cata.'
                     <a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="'. urlRewrite($res_produit['modele'], 5, $res_produit['id_categorie'], $res_produit['id_sous_categorie'], $res_produit['id']).'" title="'.$res_produit['modele'].'">Voir détail</a>
                  </div>';

}


    echo '</div>';
    echo '</div>';
    
}
else if(isset($_GET['sm']) && !empty($_GET['sm']) && is_numeric($_GET['sm'])){
    $categorie = new Categorie();
    $categorie->getFromDB($_GET['sm']);
    
    echo ' <div class="col-lg-9 col-md-9">
         <h3>'.$categorie->getTitreFr().'</h3>
  <div class="block_type" style="display:block;overflow: hidden; margin-bottom:10px;">
    ';
    
    $sous_categori = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_sous_categorie WHERE id_categorie = ".mysql_real_escape_string($_GET['sm'])."");
    while($res_sous_categorie = mysql_fetch_array($sous_categori)) {
echo '
<div class="col-md-4" style="margin-bottom: 10px;">
<div class="post-list">
      <span class="post-img"><img src="images/ressources/'.$res_sous_categorie['image'].'" class="img-responsive" alt="'.$res_sous_categorie['titreFr'].'"></span>
          <div class="post-txt product-txt">
        <a href="'.urlRewrite($res_sous_categorie['titreFr'],5,$_GET['sm'],$res_sous_categorie['id'],NULL,NULL).'" title="'.$res_sous_categorie['titreFr'].'"><h5>'.stripslashes($res_sous_categorie['titreFr']).'</h5></a>
      </div>
  </div>

</div>

';

    }
    echo '</div>';
    echo '<div class="block_modele" style="display:block;overflow: hidden;">';
      echo '<h4 style="font-size:23px;">Modèles</h4>';
$produit = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_produit WHERE publication = 1 AND id_categorie =".mysql_real_escape_string($_GET['sm'])." ");
while($res_produit = mysql_fetch_array($produit)){
  
                                 $brochure = $res_produit['fiche'];
                                 if(isset($brochure) && !empty($brochure)){
                                     $cata =  '<a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="images/ressources/'.$brochure.'" target="_blank"><i class="fa fa-file-pdf-o"></i> Fiche</a>';
                                 }
                                 else {$cata = '<a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="catalogue/catalogue_powermotors.pdf" target="_blank"><i class="fa fa-file-pdf-o"></i> Fiche</a>';}
                             
echo '<div class="shop-column blogBox">
                     <img src="images/ressources/'.$res_produit['image1'].'" class="img-responsive" alt="product-image">
                     <div class="shop-column-head">
                        <h5>Modèle : '.$res_produit['modele'].'</h5>
                        
                     </div>
                     <span class="shop-price">'.formatedTxt(stripslashes($res_produit['titreFr'])).'</span>
                        '.$cata.'
                     <a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="'. urlRewrite($res_produit['modele'], 5, $res_produit['id_categorie'], $res_produit['id_sous_categorie'], $res_produit['id']).'" title="'.$res_produit['modele'].'">Voir détail</a>
                  </div>';

}


    echo '</div>';
    echo '</div>';



}
else if(isset($_GET['m']) && !empty($_GET['m']) && is_numeric($_GET['m'])){
    echo '

                     <div class="col-lg-9 col-md-9">';
                  echo '<h1>Catégorie produit</h1>';
                $categorie = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_categorie ORDER BY id ");
                while($res_categorie = mysql_fetch_array($categorie)){
                    echo '<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  client-testimonial">
                 <span class="client-img">
                 <a href="'. urlRewrite($res_categorie['titreFr'], 5, $res_categorie['id'], NULL, NULL).'"><img src="images/ressources/'.$res_categorie['image'].'" class="img-responsive" alt="'.$res_categorie['titreFr'].'"></a></span>
                  <div class="client-desc">
                   <span class="stitle"><a href="'. urlRewrite($res_categorie['titreFr'], 5, $res_categorie['id'], NULL, NULL).'">'.stripslashes($res_categorie['titreFr']).'</a></span>
                   <p>'. extraireTxt(stripslashes($res_categorie['descriptionFr']),200).'</p>

                  </div>
               </div>';

                }





              echo '</div></div>';

}
?>
