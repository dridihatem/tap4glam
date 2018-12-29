<?php 
$fournisseur = new Fournisseur();
$fournisseur->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminFournisseur" class="active">Gestion des Tiers</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminFournisseur"><i class="icon-custom-left"></i></a>

<h3>Module - <span class="semi-bold">Modifier / Ajouter un tier</span></h3>

</div>

    <div class="row">

       

      <div class="col-md-12">

          <?php require("msg.php");?>

<ul class="nav nav-tabs" role="tablist">

<li class="active">
    <a href="#fr" role="tab" data-toggle="tab"><img src="images/fr.png" style="width:17px;"/> Français</a>
</li>
</ul>

<form action="controller/fournisseur_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>

<input name="role" type="hidden"  value="1"/>

<input name="date_insertion" type="hidden"  value="<?php if ($_GET["id"]!= 0){echo $fournisseur->getDate_insertion();}?>"/>

<input name="publication" type="hidden" id="publication" value="<?php if ($_GET["id"]!= 0){echo $fournisseur->getPublication();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-6">
  
    <div class="form-group">
        <h3>Rôle : Fournisseur</h3>
    </div>
<div class="form-group">

    <label for="nom">Société (Français)</label>

     <input type="text" name="societe" class="form-control input-sm" id="nom" placeholder="Nom de la société" value="<?php if ($_GET["id"]!= 0) echo $fournisseur->getSociete();?>" />

</div> 
    
<div class="form-group">

    <label for="rc">Numéro de registre de commerce</label>

    <input type="text"  name="registre_commerce" class="form-control input-sm" id="rc" placeholder="Numéro de registre de commerce" value="<?php if ($_GET["id"]!= 0) echo $fournisseur->getRegistre_commerce();?>" />

</div> 

    <div class="form-group">

    <label for="mf">Numéro de marticule fiscal</label>

    <input type="text"  name="matricule_fiscal" class="form-control input-sm" id="mf" placeholder="Numéro de matricule fiscal" value="<?php if ($_GET["id"]!= 0) echo $fournisseur->getMatricule_fiscal();?>" />

</div> 
    <div class="form-group">

    <label for="cc">Code comptable</label>

    <input type="text"  name="code_comptable" class="form-control input-sm" id="cc" placeholder="Code comptable de fournisseur" value="<?php if ($_GET["id"]!= 0) echo $fournisseur->getCode_comptable();?>" />

</div> 
    <input type="submit" value="&nbsp;Valider&nbsp;" class="btn btn-success btn-cons"/>
</div>
    <div class="col-md-6">
<div class="form-group">

<label for="contenu">Adresse</label>

<textarea name="adresse" class="content form-control" id="content"><?php if ($_GET["id"]!= 0) echo stripslashes($fournisseur->getAdresse());?></textarea>


</div>

    <div class="form-group">

    <label for="tel">Numéro de téléphone</label>

    <input type="text" name="tel" class="form-control input-sm" id="tel" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $fournisseur->getTel();?>" />

</div> 
     <div class="form-group">

    <label for="email">Adresse E-mail</label>

    <input type="text" name="email" class="form-control input-sm" id="email" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $fournisseur->getEmail();?>" />

</div> 
    
    
    <div class="form-group">

    <label for="user">Nom d'utilisateur</label>

    <input type="text" name="user" class="form-control input-sm" id="user" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $fournisseur->getUser();?>" />

</div> 
    <div class="form-group">

    <label for="pass">Mot de passe</label>

    <input type="password" name="motPasse" class="form-control input-sm" id="pass" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $fournisseur->getMotPasse();?>" />

</div> 

</div>

</div>

</div>






</div>
 </form>	
</div>

       

    </div>

</div>

</div>



