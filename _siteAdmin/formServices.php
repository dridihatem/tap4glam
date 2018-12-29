<?php 
$service = new Services();
$service->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminServices" class="active">Gestion des services</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminServices"><i class="icon-custom-left"></i></a>

<h3>Module - <span class="semi-bold">Modifier / Ajouter un service</span></h3>

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

<form action="controller/services_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">



<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>



<input name="date_insertion" type="hidden"  value="<?php if ($_GET["id"]!= 0){echo $service->getDate_insertion();}?>"/>

<input name="image" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $service->getImage();}?>"/>

<input name="etat" type="hidden" id="etat" value="<?php if ($_GET["id"]!= 0){echo $service->getEtat();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-8">
                   




<div class="form-group">

    <label for="titreFr">Titre de service</label>

     <input type="text" name="titreFr" class="form-control input-sm" id="titreFr" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $service->getTitreFr();?>" />

</div> 

<div class="form-group">

    <select name="id_categorie" id="gendericonic" class="form-control" style="width: 50%;">

<option value="">Choississez le catégorie de service...</option>

<?php
  $req1 = $conn->query("select * from ".$_SESSION['pfx']."_categorie where publication = 1 ORDER BY id");
   while($resultat1 = $req1->fetch_assoc()){
     if($service->getId_categorie() == $resultat1['id']) $sl ="selected"; else $sl="NULL";
        echo '<option value="'.$resultat1['id'].'" '.$sl.'>'.stripslashes($resultat1['titreFr']).'</option>';
         }
?>

</select>
    </div>
    <div class="form-group">
    <select name="id_prestataire" id="gendericonic" class="form-control" style="width: 50%;">
      <option value="">Choississez le prestataire...</option>
<?php
   $req21 = $conn->query("select * from ".$_SESSION['pfx']."_prestataire ORDER BY id");
    while($resultat31 = $req21->fetch_assoc()){
     if($service->getId_prestataire() == $resultat31['id']) $sl ="selected"; else $sl="NULL";
     echo '<option value="'.$resultat31['id'].'" '.$sl.'>'.stripslashes($resultat31['nom_prenom']).'</option>';
      }
?>
</select>
    </div>
<div class="form-group">
<label for="contenu">Contenu</label>
<textarea name="descriptionFr" class="content form-control" id="content"><?php if ($_GET["id"]!= 0) echo stripslashes($service->getDescriptionFr());?></textarea>
<script type="text/javascript">
      CKEDITOR.replace( 'descriptionFr' );
      CKEDITOR.add            
   </script>
</div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="fichier" class="form-control" />     
<?php
if($_GET['id']!= 0){echo " <label>Aperçu de l'image</label>";
$image1 = $service->getImage();
if(isset($image1) && !empty($image1) && file_exists('../images/ressources/'.$image1)){
    echo '<img src="../images/ressources/'.$image1.'" class="img-responsive img-rounded"  style="width:200px;"/><br />'
            . ' <a href="controller/service_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>';
}
}
?>
   </div> 
<input type="submit" value="&nbsp;Valider&nbsp;" class="btn btn-success btn-cons"/>
</div>
    <div class="col-md-4">   
      <h3>
        Le service est il VIP ?

      </h3>
      <div class="radio radio-success">
        <input type="radio" name="isVip" value="1" id="yes" <?php if($_GET['id']!=0){if($service->getIsVip()==1){echo 'checked="checked"'; } }?> />
        <label for="yes">Oui</label>
        <input type="radio" name="isVip" value="0" id="no" <?php if($_GET['id']!=0){if($service->getIsVip()==0){echo 'checked="checked"'; } }?>/>
        <label for="no">Non</label>
      
      </div>

      <h3><span>Gestion des prix</span></h3>
    <div class="periode">
      
        <div class="form-group">
        <label>Prix</label>
          <div class="input-append success">
         <input type="text" name="prix" class="form-control" value="<?php if ($_GET["id"]!= 0) echo stripslashes($service->getPrix());?>">
          <span class="add-on"><span class="arrow"></span>Dt</span>
          </div>
        </div>
         <div class="form-group">
        <label>Prix promotion</label>
       <div class="input-append success">
         <input type="text" name="prix_promo" class="form-control"  value="<?php if ($_GET["id"]!= 0) echo stripslashes($service->getPrix_promo());?>">
          <span class="add-on"><span class="arrow"></span>Dt</span>
          </div>
        </div>
    </div>
        
        
        <div class="form-group">
            <label>Etat de service</label>
    <select name="etat" id="source" class="form-control">
        <option value="1"  <?php if($_GET['id']!=0 && $service->getEtat()==1){echo "selected";} ?>>Publier sur site</option>
        <option value="0" <?php if($_GET['id']!=0 && $service->getEtat()==0){echo "selected";} ?>>N'est pas publier</option>
</select>
    </div>     
    </div>
</div>
</div>
<div class="tab-pane" id="en">
<div class="row">
<div class="col-md-12">
<div class="form-group">
  <label for="titreEn">Title</label>
     <input type="text" name="titreEn" class="form-control input-sm" id="titreEn" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $service->getTitreEn();?>" />
</div> 
<div class="form-group">
<label for="descriptionEn">Content</label>
<textarea name="descriptionEn" class="content form-control" id="descriptionEn"><?php if ($_GET["id"]!= 0) echo stripslashes($service->getDescriptionEn());?></textarea>
<script type="text/javascript">
      CKEDITOR.replace( 'descriptionEn' );
      CKEDITOR.add            
   </script>
</div>
<p class="pull-right">
<input type="submit" value="&nbsp;Save&nbsp;" class="btn btn-success btn-cons"/>
</p>
</div>
</div>
</div>
<div class="tab-pane" id="es">
<div class="row">
<div class="col-md-12">
<div class="form-group">
  <label for="titreAr">Title</label>
     <input type="text" name="titreAr" class="form-control input-sm" id="titreAr" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $service->getTitreAr();?>" />
</div> 
<div class="form-group">
<label for="descriptionAr">Content</label>
<textarea name="descriptionAr" class="content form-control" id="descriptionAr"><?php if ($_GET["id"]!= 0) echo stripslashes($service->getDescriptionAr());?></textarea>
<script type="text/javascript">
      CKEDITOR.replace( 'descriptionAr' );
      CKEDITOR.add            
   </script>
</div>
<p class="pull-right">
<input type="submit" value="&nbsp;Save&nbsp;" class="btn btn-success btn-cons"/>
</p>
</div>
</div>
</div>
</div>
</form>	
</div>        
</div>
</div>
</div>