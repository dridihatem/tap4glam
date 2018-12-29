<?php 
$module = new Client();
$module->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminClient" class="active">Gestion des clients</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminClient"><i class="icon-custom-left"></i></a>

<h3>Module - <span class="semi-bold">Modifier / Ajouter un client</span></h3>

</div>

    <div class="row">

       

      <div class="col-md-12">

          <?php require("msg.php");?>

<ul class="nav nav-tabs" role="tablist">

<li class="active">

    <a href="#fr" role="tab" data-toggle="tab"><img src="images/fr.png" style="width:17px;"/> Français</a>

</li>

<li>

<a href="#en" role="tab" data-toggle="tab"><img src="images/en.png"  style="width:17px;"/> Anglais</a>

</li>

<li>

<a href="#es" role="tab" data-toggle="tab"><img src="images/esp.png"  style="width:17px;"/> Arabe</a>

</li>

</ul>

<form action="controller/client_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">



<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="date_creation" type="hidden"  value="<?php if ($_GET["id"]!= 0){echo $module->getDate_creation();}?>"/>

<input name="date_connexion" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $module->getDate_connexion();}?>"/>

<input name="etat" type="hidden" id="moduleParent" value="<?php if ($_GET["id"]!= 0){echo $module->getEtat();}?>"/>

<input name="connected" type="hidden" id="type" value="<?php if ($_GET["id"]!= 0){echo $module->getConnected();}?>"/>
<input name="motPasseMd5" type="hidden" id="type" value="<?php if ($_GET["id"]!= 0){echo $module->getMotPasseMd5();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-6">
      
<div class="form-group">
    <label for="nom">Nom et Prénom</label>
    <input type="text" name="nom_prenom" class="form-control input-sm" id="nom" placeholder="Nom  et prénom de client" value="<?php if ($_GET["id"]!= 0) echo $module->getNom_prenom();?>" />
</div> 
<div class="form-group">
<label for="contenu">Adresse</label>
<textarea name="adresse" class="content form-control" id="content"><?php if ($_GET["id"]!= 0) echo stripslashes($module->getAdresse());?></textarea>
</div>
    <div class="form-group">
    <label for="tel">Numéro de téléphone</label>
    <input type="text" name="tel" class="form-control input-sm" id="tel" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $module->getTel();?>" />
</div> 
     <div class="form-group">
    <label for="email">Adresse E-mail</label>
    <input type="text" name="email" class="form-control input-sm" id="email" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $module->getEmail();?>" />
</div> 
     <div class="form-group">
    <label for="code_postal">Code postal</label>
    <input type="text" name="code_postal" class="form-control input-sm" id="code_postal" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $module->getCode_postal();?>" />
</div> 
     <div class="form-group">
    <label for="gendericonic">Région</label>
    <select name="id_region" id="gendericonic" class="form-control" >
<option value="">Choississez a région...</option>
<?php
                     $req1 = $conn->query("select * from ".$_SESSION['pfx']."_region where etat = 1 ORDER BY id");
                      while($resultat1 = $req1->fetch_assoc()){
                      if($module->getId_region() == $resultat1['id']) $sl ="selected"; else $sl="NULL";
                          echo '<option value="'.$resultat1['id'].'" '.$sl.'>'.stripslashes($resultat1['titre']).'</option>';
                      }
 ?>

</select>
</div>
</div>
    <div class="col-md-6">
     <div class="form-group">
    <label for="code_vip">Code VIP</label>
    <select name="code_vip" id="code_vip" class="form-control" >
<option value="">Choississez le code VIP...</option>
<?php                $code_vip = $conn->query("select * from ".$_SESSION['pfx']."_code_vip where etat = 1 ORDER BY id");
                      while($resultat_vip = $code_vip->fetch_assoc()){
                      if($module->getId_region() == $resultat_vip['id']) $sl ="selected"; else $sl="NULL";
                          echo '<option value="'.$resultat_vip['id'].'" '.$sl.'>'.stripslashes($resultat_vip['code']).'</option>';
                      }
 ?>
</select>
</div>
    <div class="form-group">
    <label for="login">Nom d'utilisateur</label>
    <input type="text" name="login" class="form-control input-sm" id="login" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $module->getLogin();?>" />
</div> 
    <div class="form-group">
    <label for="pass">Mot de passe</label>
    <input type="password" name="motPasse" class="form-control input-sm" id="pass" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $module->getMotPasse();?>" />
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



