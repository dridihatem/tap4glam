<?php 
$module = new Souscategorie();
$module->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminCategorie" class="active">Gestion des catégories</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminSouscategorie"><i class="icon-custom-left"></i></a>

<h3>Contenu - <span class="semi-bold">Modifier / Ajouter une sous catégorie</span></h3>

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

<form action="controller/sub_categorie_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">



<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>

<input name="publication" type="hidden"  value="<?php if ($_GET["id"]!= 0){echo $module->getPublication();}?>"/>

<input name="image" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $module->getImage();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-12">
                   

<div class="form-group">

    <select name="id_categorie" id="gendericonic" class="form-control" style="width: 50%;">

<option value="">Choississez la catégorie...</option>

<?php

                     $req1 = $conn->query("select * from ".$_SESSION['pfx']."_categorie where publication = 1 ORDER BY id");

                      while($resultat1 = $req1->fetch_assoc()){

                      if($module->getId_categorie() == $resultat1['id']) $sl ="selected"; else $sl="NULL";

                          echo '<option value="'.$resultat1['id'].'" '.$sl.'>'.stripslashes($resultat1['titreFr']).'</option>';

                          

                      }

                      ?>

</select>

    </div>

<div class="form-group">

    <label for="nom">Titre (Français)</label>

     <input type="text" name="titreFr" class="form-control input-sm" id="nom" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $module->getTitreFr();?>" />

</div> 



<div class="form-group">

<label for="contenu">Description</label>

<textarea name="descriptionFr" class="content form-control" id="content"><?php if ($_GET["id"]!= 0) echo stripslashes($module->getDescriptionFr());?></textarea>

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
$image1 = $module->getImage();

if(isset($image1) && !empty($image1) && file_exists('../images/ressources/'.$image1)){
    echo '<img src="../images/ressources/'.$image1.'" class="img-responsive img-rounded" style="width:200px;"/><br />'
            . ' <a href="controller/sub_categorie_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>';
}
}
?>
        
    </div>
   
<input type="submit" value="&nbsp;Valider&nbsp;" class="btn btn-success btn-cons"/>
</div>

</div>

</div>

<div class="tab-pane" id="en">

<div class="row">

<div class="col-md-12">

<div class="form-group">
  <label for="nomEN">Titre (anglais)</label>
     <input type="text" name="titreEn" class="form-control input-sm" id="nomEN" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $module->getTitreEn();?>" />
</div> 

<div class="form-group">

<label for="contenuEn">Description (anglais)</label>

<textarea name="descriptionEn" class="content form-control" id="contenuEn"><?php if ($_GET["id"]!= 0) echo stripslashes($module->getDescriptionEn());?></textarea>

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
  <label for="nomAr">Titre</label>
     <input type="text" name="titreAr" class="form-control input-sm" id="nomAr" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $module->getTitreAr();?>" />
</div> 

<div class="form-group">

<label for="contenuAr">Description</label>

<textarea name="descriptionAr" class="content form-control" id="contenuEn"><?php if ($_GET["id"]!= 0) echo stripslashes($module->getDescriptionAr());?></textarea>

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



