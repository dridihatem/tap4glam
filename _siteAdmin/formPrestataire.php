<?php 
$prestataire = new Prestataire();
$prestataire->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminPrestataire" class="active">Gestion des prestataires</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminPrestataire"><i class="icon-custom-left"></i></a>

<h3>Module - <span class="semi-bold">Modifier / Ajouter un préstataire</span></h3>

</div>

    <div class="row">

       

      <div class="col-md-12">

          <?php require("msg.php");?>

<ul class="nav nav-tabs" role="tablist">

<li class="active">

    <a href="#fr" role="tab" data-toggle="tab"><img src="images/fr.png" style="width:17px;"/> Français</a>

</li>


</ul>

<form action="controller/prestataire_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">



<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>



<input name="publication" type="hidden"  value="<?php if ($_GET["id"]!= 0){echo $prestataire->getPublication();}?>"/>

<input name="image" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $prestataire->getAvatar();}?>"/>

<input name="date_insertion" type="hidden" id="date_insertion" value="<?php if ($_GET["id"]!= 0){echo $prestataire->getDate_insertion();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-6">
                   


<div class="form-group">
 <label for="nom">Fournisseur Parent</label>
    <select name="id_fournisseur" id="gendericonic" class="form-control" style="width: 50%;">

<option value="">Choississez le fournisseur...</option>

<?php

                     $req1 = $conn->query("select * from ".$_SESSION['pfx']."_fournisseur where publication = 1 ORDER BY id");

                      while($resultat1 = $req1->fetch_assoc()){

                      if($prestataire->getId_fournisseur() == $resultat1['id']) $sl ="selected"; else $sl="NULL";

                          echo '<option value="'.$resultat1['id'].'" '.$sl.'>'.stripslashes($resultat1['societe']).'</option>';

                          

                      }

                      ?>

</select>

    </div>


<div class="form-group">

    <label for="nom">Nom et Prénom de préstataire</label>

    <input type="text" name="nom_prenom" class="form-control input-sm" id="nom" placeholder="Nom  et prénom" value="<?php if ($_GET["id"]!= 0) echo $prestataire->getNom_prenom();?>" />

</div>
    



<div class="form-group">

<label for="adresse">Adresse</label>

<textarea name="adresse" class="content form-control" id="adresse"><?php if ($_GET["id"]!= 0) echo stripslashes($prestataire->getAdresse());?></textarea>



</div>

    <div class="form-group">

    <label for="tel">Numéro de téléphone</label>

    <input type="text" name="tel" class="form-control input-sm" id="tel" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $prestataire->getTel();?>" />

</div> 
     <div class="form-group">

    <label for="email">Adresse E-mail</label>

    <input type="text" name="email" class="form-control input-sm" id="email" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $prestataire->getEmail();?>" />

</div> 
</div>
    <div class="col-md-6">
        
      <div class="form-group">
<?php
if($_GET['id']!= 0){
$image1 = $prestataire->getAvatar();

if(isset($image1) && !empty($image1) && file_exists('../images/ressources/'.$image1)){
    echo '<img src="../images/ressources/'.$image1.'" class="img-responsive img-circle"  style="width:200px;"/><br />'
            . ' <a href="controller/prestataire_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>';
}
}
?>
    <label for="avatar">Photo de profile</label>

    <input type="file" name="fichier" class="form-control input-sm" id="avatar" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $prestataire->getAvatar();?>" />

</div>   
  
    
    
    
    <div class="form-group">

    <label for="login">Nom d'utilisateur</label>

    <input type="text" name="login" class="form-control input-sm" id="login" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $prestataire->getLogin();?>" />

</div> 
    <div class="form-group">

    <label for="passe">Mot de passe</label>

    <input type="password" name="motPasse" class="form-control input-sm" id="passe" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $prestataire->getMotPasse();?>" />

</div> 
<input type="submit" value="&nbsp;Valider&nbsp;" class="btn btn-success btn-cons"/>
</div>

</div>

</div>







</div>
 </form>	
</div>

       

    </div>

</div>

</div>



