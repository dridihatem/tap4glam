<?php
echo '
    <div class="row marbtm50">
    <div class="col-md-3">
    <div class=" wdt-100 marbtm50">
       <h5>Catégorie des modèles</h5>
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
          $produit = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_produit WHERE publication = 1 ORDER BY date_insertion DESC LIMIT 0,4");
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


    ?>
    <div class="col-md-8 right-column pull-right">
                 
                  
                  <div class="wdt-100">
                     <h4 class="fnt20" id="demande">Demander un devis</h4>
                     
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
    $contact->setContact(NULL,$_POST["nom"],$_POST["email"],$_POST['societe'],"","Demande de devis ",$_POST["message"],date("Y-m-d H:i:s"),0);
      if($contact->saveToDB()){

            $headers = "From: Demande de devis  <contact@powermotors.com.tn>\r\n";
            $headers .= "Reply-To:  ".$_POST['email']."\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            $body = '<html><body>';
            $body .='<p><img src="http://www.powermotors.com.tn/images/template/logo_power.png" /><br></p>';
            $body .='<p><h3>les modèles produit : '.$_POST['produit'].'</h3></p>';
            $body .='<p><b>Société </b>: '.$_POST['societe'].'</p>';
             $body .='<p><b>Nom de client </b> :'.$_POST['nom'].'</p>';
            $body .='<p><b>E-mail </b> :<a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a></p>';
            $body .='<p><b>Téléphone </b> : '.$_POST['telephone'].'</p>';
            $body .=' <p><b>Message  </b> : '.$_POST['message'].'</p>';
             $body .='<p>';
             $body .='</body></html>';
            @mail("contact@powermotors.com.tn","Demande de devis",$body,$headers);

       $result ='<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Merci </strong>Demande de devis envoy&eacute; avec succ&eacute;s!</div>';}

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
            <label>Séléctionner les produits</label>
            <select name="produit" type="text" class="selectpicker" multiple data-live-search="true" required="">   
                <option>...</option>
                <?php 
                $produit = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_produit WHERE publication = 1");
                while($res_produit = mysql_fetch_array($produit)){
                    
                    echo '<option title="'.$res_produit['modele'].'" value="'.$res_produit['modele'].'"  data-content=\'<img src="images/ressources/'.$res_produit['image1'].'" style="width:50px;"/><span>'.$res_produit['modele'].'</span>\' >'.$res_produit['modele'].'</option>';
                }
                ?>
              
            </select> 
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
                           <label>Numéro de téléphone *</label>
                           <input name="tel" type="text" class="form-input" required>
                        </div>
                        <div class="col-md-12 form-field">
                           <label>E-mail *</label>
                           <input name="email" type="text" class="form-input" required>
                        </div>
                             <div class="col-md-12 form-field">
                           <label>Votre message*</label>
                           <textarea name="message" cols="1" rows="2" class="form-comment" required></textarea>
                        </div>
			<div class="col-md-12 form-field">
                           <label>2 + 2 =</label>
                           <input name="captchasum" type="text" class="form-input" required>
                        </div>
                        <div class="col-md-12 form-field">
                           <input name="submit" type="submit" class="form-submit-btn" value="Envoyer" >
                        </div>
                     </div>
                     </form>
                  </div>
               </div>
