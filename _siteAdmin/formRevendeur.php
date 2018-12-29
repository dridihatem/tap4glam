<h4 class="page-title"><?php if($_GET['id']==0) echo 'Ajouter un nouveau Revendeur'; else echo 'Modifier la Revendeur';?> </h4>
<?php require("msg.php");?>
<div class="block-area" id="basic">
<?php 
    
        $revendeur = new Revendeur();
        $revendeur->getFromDB($_GET["id"]);
?>
  
<form action="controller/revendeur_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="etat" type="hidden" id="publication" value="<?php if ($_GET["id"]!= 0){echo $revendeur->getEtat();}?>"/>
<input name="rc" type="hidden" id="phot1" value="<?php if ($_GET["id"]!= 0){echo $revendeur->getRc();}?>"/>
<input name="patente" type="hidden" id="phot1" value="<?php if ($_GET["id"]!= 0){echo $revendeur->getPatente();}?>"/>

<input name="dateInscription" type="hidden" id="dateinscription" value="<?php if ($_GET["id"]!= 0){echo $revendeur->getDateInscription();}?>"/>
<div class="tab-container tile">
                        <ul class="nav tab nav-tabs tab-left">
                            <li class="active"><a href="#fr">Fr</a></li>
                            
                        </ul>
                        <div class="tab-content">
 


<div class="form-group">
    <label for="rc">Raison Sociale</label>

     <input type="text" name="raison" class="form-control input-sm" id="rc" placeholder="Raison social" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getRaison();?>" />
</div> 
<div class="form-group">
    <label for="nom">Nom</label>

     <input type="text" name="nom" class="form-control input-sm" id="nom" placeholder="Nom" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getNom();?>" />
</div> 
<div class="form-group">
    <label for="prenom">Prenom</label>

     <input type="text" name="prenom" class="form-control input-sm" id="prenom" placeholder="Prenom" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getPrenom();?>" />
</div> 
<div class="form-group">
    <label for="email">Email</label>

     <input type="email" name="email" class="form-control input-sm" id="email" placeholder="email" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getEmail();?>" />
</div> 
<div class="form-group">
    <label for="Facebook">Facebook</label>

     <input type="text" name="facebook" class="form-control input-sm" id="Facebook" placeholder="Page Facebook" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getFacebook();?>" />
</div> 
<div class="form-group">
    <label for="mobile">Mobile</label>

     <input type="text" name="mobile" class="form-control input-sm" id="mobile" placeholder="Tel. mobile" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getMobile();?>" />
</div> 
<div class="form-group">
    <label for="fix">Fixe</label>

     <input type="text" name="fix" class="form-control input-sm" id="fix" placeholder="Tel. Fixe" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getFixe();?>" />
</div> 
<div class="form-group">
    <label for="fax">Fax</label>

     <input type="text" name="fax" class="form-control input-sm" id="fix" placeholder="Tel. Fax" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getFax();?>" />
</div> 
<div class="form-group">
<label for="contenu">Adresse</label>
<textarea name="adresse" class="wysiwye-editor" id="contenu"><?php if ($_GET["id"]!= 0) echo stripslashes($revendeur->getAdresse());?></textarea>
</div>

<div class="form-group">
  <label for="gouver">Gouvernerat</label>
<select name="gouvernerat" class="select"  id="gouver">
                                                    <?php $gouv = $revendeur->getGouvernerat();
                                                     ?>
                                                    <option value="0">-Toutes les régions-</option>
                                                    <option value="1" <?php if($gouv == 1){echo 'selected';} ?>>Ariana</option>
                                                    <option value="2" <?php if($gouv == 2){echo 'selected';} ?>>B&eacute;ja</option>
                                                    <option value="3" <?php if($gouv == 3){echo 'selected';} ?>>Ben Arous</option>
                                                    <option value="4" <?php if($gouv == 4){echo 'selected';} ?>>Bizerte</option>
                                                    <option value="5" <?php if($gouv == 5){echo 'selected';} ?>>Gab&eacute;es</option>
                                                    <option value="6" <?php if($gouv == 6){echo 'selected';} ?>>Gafsa</option>
                                                    <option value="7" <?php if($gouv == 7){echo 'selected';} ?>>Jendouba</option>
                                                    <option value="8" <?php if($gouv == 8){echo 'selected';} ?>>Kairouan</option>
                                                    <option value="9" <?php if($gouv == 9){echo 'selected';} ?>>Kasserine</option>
                                                    <option value="10" <?php if($gouv == 10){echo 'selected';} ?>>K&eacute;bili</option>
                                                    <option value="11" <?php if($gouv == 11){echo 'selected';} ?>>Kef</option>
                                                    <option value="12" <?php if($gouv == 12){echo 'selected';} ?>>Mahdia</option>
                                                    <option value="13" <?php if($gouv == 13){echo 'selected';} ?>>La Manouba</option>
                                                    <option value="14" <?php if($gouv == 14){echo 'selected';} ?>>M&eacute;denine</option>
                                                    <option value="15" <?php if($gouv == 15){echo 'selected';} ?>>Monastir</option>
                                                    <option value="16" <?php if($gouv == 16){echo 'selected';} ?>>Nabeul</option>
                                                    <option value="17" <?php if($gouv == 17){echo 'selected';} ?>>Sfax</option>
                                                    <option value="18" <?php if($gouv == 18){echo 'selected';} ?>>Sidi Bouzid</option>
                                                    <option value="19" <?php if($gouv == 19){echo 'selected';} ?>>Siliana</option>
                                                    <option value="20" <?php if($gouv == 20){echo 'selected';} ?>>Sousse</option>
                                                    <option value="21" <?php if($gouv == 21){echo 'selected';} ?>>Tataouine</option>
                                                    <option value="22" <?php if($gouv == 22){echo 'selected';} ?>>Tozeur</option>
                                                    <option value="23" <?php if($gouv == 23){echo 'selected';} ?>>Tunis</option>
                                                    <option value="24" <?php if($gouv == 24){echo 'selected';} ?>>Zaghouan</option>
                                                     <option value="25" <?php if($gouv == 25){echo 'selected';} ?>>Autres...</option>
                                                </select>
</div>
<div class="form-group">
 <label for="username">Nom  d'utilisateur</label>

     <input type="text" name="login" class="form-control input-sm" id="ville" placeholder="Nom d'utilisateur" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getLogin();?>" />

</div>

<div class="form-group">
 <label for="password">Mot de passe</label>

     <input type="password" name="password" class="form-control input-sm" id="password" placeholder="Mot de passe" value="<?php if ($_GET["id"]!= 0) echo $revendeur->getPassword();?>" />

</div>
<div class="form-group">
 <div class="row m-container">
 <div class="col-md-5">
  <div class="tile"  style="overflow: hidden;">
    <h2 class="tile-title">Registre de commerce</h2>
    
    <div class="listview narrow">
   <div class="col-md-12" style="overflow:hidden;">
    <?php
$image1 = $revendeur->getRc();
if(isset($image1) && !empty($image1) && file_exists('../images/ressources/juridique/'.$image1)){
  echo '
                            <a href="../images/ressources/'.$image1.'" target="_blank">
                               
                                <span><i class="fa fa-eye" style="font-size:25px;"></i> Aperçue</span>
                                
                            </a>
                            &nbsp;&nbsp; /&nbsp;&nbsp;&nbsp;
                            <a href="controller/revendeur_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

                       
                        ';
}

     ?>
                        
   </div>
</div>
    <div class="col-sm-4">
 Apercu l'image 1<p>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail form-control"></div>
                        
                        <div>
                            <span class="btn btn-file btn-alt btn-sm">
                                <span class="fileupload-new">Selectionner image</span>
                                <span class="fileupload-exists">Changer</span>
                                <input type="file" name="fichier" />
                            </span>
                            <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Supprimer</a>
                        </div>
                    </div>
</div>



  </div>
  </div>
  <div class="col-md-5">
  <div class="tile"  style="overflow: hidden;">
    <h2 class="tile-title">Patente</h2>
    
    <div class="listview narrow">
   <div class="col-md-12" style="overflow:hidden;">
    <?php
$patente = $revendeur->getPatente();
if(isset($patente) && !empty($patente) && file_exists('../images/ressources/juridique/'.$image1)){
  echo '
                            <a href="../images/ressources/'.$patente.'" target="_blank">
                               
                                <span><i class="fa fa-eye" style="font-size:25px;"></i> Aperçue</span>
                                
                            </a>
                            &nbsp;&nbsp; /&nbsp;&nbsp;&nbsp;
                            <a href="controller/revendeur_save.php?idMod='.$_REQUEST['id'].'&op=6" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

                       
                        ';
}

     ?>
                        
   </div>
</div>
    <div class="col-sm-4">
 Apercu l'image 1<p>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail form-control"></div>
                        
                        <div>
                            <span class="btn btn-file btn-alt btn-sm">
                                <span class="fileupload-new">Selectionner image</span>
                                <span class="fileupload-exists">Changer</span>
                                <input type="file" name="fichier" />
                            </span>
                            <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Supprimer</a>
                        </div>
                    </div>
</div>



  </div>
  </div>
  </div>

<input type="submit" value="&nbsp;&nbsp;&nbsp;Valider&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-sm"/>

</div>
 
</div>
 
</form> 
</div>






