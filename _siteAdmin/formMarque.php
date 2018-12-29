<h4 class="page-title"><?php if($_GET['id']==0) echo 'Ajouter un nouvelle marque'; else echo 'Modifier la marque';?> </h4>
<?php require("msg.php");?>
<div class="block-area" id="basic">
<?php 
    
        $categorie = new Marque();
        $categorie->getFromDB($_GET["id"]);
?>
  
<form action="controller/marque_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_marque">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="phot1" type="hidden" id="phot1" value="<?php if ($_GET["id"]!= 0){echo $categorie->getImage();}?>"/>
<div class="tab-container tile">
                        <ul class="nav tab nav-tabs tab-left">
                            <li class="active"><a href="#fr">Fr</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="fr">


<div class="form-group">
    <label for="ordre">Ordre</label>

     <input type="ordre" name="ordre" class="form-control input-sm" id="ordre" placeholder="Ordre" value="<?php if ($_GET["id"]!= 0) echo $categorie->getOrdre();?>" />
</div>
<div class="form-group">
    <label for="Id">Titre</label>

     <input type="text"  class="form-control input-sm" id="titre" name="titreFr" placeholder="..." value="<?php if ($_GET["id"]!= 0) echo $categorie->getTitreFr();?>" />
</div> 
  <div class="form-group">
  <label for="contenuFr">Description</label>
  <textarea name="descriptionFr" class="wysiwye-editor" id="contenuFr"><?php if ($_GET["id"]!= 0) echo stripslashes($categorie->getDescriptionFr());?></textarea>
  </div>
<div class="form-group">
 <div class="row m-container">
 <div class="col-md-7">
  <div class="tile"  style="overflow: hidden;">
    <h2 class="tile-title"> Image</h2>
    <div class="listview narrow sortable ui-sortable">
   <div id="photo-gallery-alt" style="overflow:hidden;">
    <?php
$image1 = $categorie->getImage();
if(isset($image1) && !empty($image1) && file_exists('../images/ressources/'.$image1)){
  echo '<div class="gallery-item col-md-4 col-sm-3 col-xs-4">
                            <a href="../images/ressources/'.$image1.'">
                                <img src="../images/ressources/'.$image1.'" alt="'.$categorie->getTitreFr.'" />
                                <span><i class="fa fa-search"></i></span>
                                
                            </a>
                            <a href="controller/marque_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

                        </div>
                        ';
}

?>
</div>
 <div class="col-sm-4">
 Apercu l'image <p>
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


</div>
<input type="submit" value="&nbsp;&nbsp;&nbsp;Valider&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-sm"/>
</div>
</div>
  

</div>
 
</form> 
</div>

