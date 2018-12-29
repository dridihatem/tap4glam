<?php 
$pack = new Pack();
$pack->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminPack" class="active">Gestion des Packs</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminPack"><i class="icon-custom-left"></i></a>

<h3>Module - <span class="semi-bold">Modifier / Ajouter un Pack</span></h3>

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

<form action="controller/pack_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>

<input name="date_insertion" type="hidden"  value="<?php if ($_GET["id"]!= 0){echo $pack->getDate_insertion();}?>"/>

<input name="vu" type="hidden"  value="<?php if ($_GET["id"]!= 0){echo $pack->getVu();}?>"/>

<input name="etat" type="hidden" id="etat" value="<?php if ($_GET["id"]!= 0){echo $pack->getEtat();}?>"/>

<input name="image" type="hidden" id="etat" value="<?php if ($_GET["id"]!= 0){echo $pack->getImage();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-6">
  
<div class="form-group">

    <label for="nom">Titre de pack</label>

     <input type="text" name="titreFr" class="form-control input-sm" id="nom" placeholder="Titre de pack" value="<?php if ($_GET["id"]!= 0) echo $pack->getTitreFr();?>" />

</div> 
    
<div class="form-group">

<label for="contenu">Détail de pack</label>

<textarea name="descriptionFr" class="content form-control" id="content"><?php if ($_GET["id"]!= 0) echo stripslashes($pack->getDescriptionFr());?></textarea>

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
$image1 = $pack->getImage();

if(isset($image1) && !empty($image1) && file_exists('../images/ressources/'.$image1)){
    echo '<img src="../images/ressources/'.$image1.'" class="img-responsive img-rounded"  style="width:200px;"/><br />'
            . ' <a href="controller/pack_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>';
}
}
?>
        
    </div>
    <input type="submit" value="&nbsp;Valider&nbsp;" class="btn btn-success btn-cons"/>
</div>
    <div class="col-md-6">

<h4>Gestion des prix </h4>
<div class="form-group col-md-6" style="padding-left: 0;">
            <label for="prix">Prix en Dt</label>
            <input type="text" class="form-control" name="prix" value="<?php if($_GET['id']!=0){echo $pack->getPrix();} ?>" />
        </div>
        <div class="form-group col-md-6" style="padding-right: 0;">
            <label for="prix_promo">Prix promo en Dt</label>
            <input type="text" class="form-control" name="prix_promo" value="<?php if($_GET['id']!=0){echo $pack->getPrix_promo();} ?>" />
        </div>
    <div class="form-group col-md-6" style="padding-left: 0;">
            <label for="date_debut">Date début</label>
            <input type="date" class="form-control" name="date_debut" value="<?php if($_GET['id']!=0){echo $pack->getDate_debut();} ?>" />
   </div>
   <div class="form-group col-md-6" style="padding-right: 0;">
            <label for="date_fin">Date fin</label>
            <input type="date" class="form-control" name="date_fin" value="<?php if($_GET['id']!=0){echo $pack->getDate_fin();} ?>" />
   </div>

    <div class="form-group">
        <h4>Choisissez les services</h4>
<div class="row">
    <div class="col-md-5">
    <label for="service">Liste des services</label>
<select name="list_service[]" id="multiselect1" class="form-control" multiple="multiple" size="8">
    <?php
    $service = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_service WHERE etat = 1 ORDER BY id");
    while($liste_service = $service->fetch_assoc()){
        $categorie = new Categorie();
        $categorie->getFromDB($liste_service['id_categorie']);
        echo '<option value="'.$liste_service['id'].'">'.$liste_service['titreFr'].'</option>' ;
        
    }
    ?>
  
</select>
    </div>
    <div class="col-md-2" style="padding-top: 23px;">
        <label></label>
         <button type="button" id="multiselect1_rightAll" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-forward"></i></button>
        <button type="button" id="multiselect1_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
        <button type="button" id="multiselect1_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
        <button type="button" id="multiselect1_leftAll" class="btn btn-block  btn-warning"><i class="glyphicon glyphicon-backward"></i></button>
    </div>
    <div class="col-md-5">
        <label for="service">Liste sélectionner</label>
        <select name="to_service[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple">
            <?php 
            if($_GET['id']!=0){
                
                 $results = unserialize($pack->getId_service());
                foreach($results as $key => $val){
                    echo '<option value="'.$val.'">'.$val.'</option>';
                        
                    }
 
            }
            ?>
        </select>
        
    </div>
</div>

</div> 
    
    
    

</div>

</div>

</div>
    <div class="tab-pane active" id="en">

<div class="row column-seperation">

<div class="col-md-6">
</div>
</div>
    </div>
    
    <div class="tab-pane active" id="es">

<div class="row column-seperation">

<div class="col-md-6">
</div>
</div>
    </div>






</div>
 </form>	
</div>

       

    </div>

</div>

</div>



