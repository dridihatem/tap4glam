<h4 class="page-title"><?php if($_GET['id']==0) echo 'Ajouter un nouvelle bannière'; else echo 'Modifier la bannière';?> </h4>
<?php require("msg.php");?>
<div class="block-area" id="basic">
<?php 
    
        $banner = new Banner();
        $banner->getFromDB($_GET["id"]);
?>
  
<form action="controller/banner_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_taille">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="photo" type="hidden" id="phot1" value="<?php if ($_GET["id"]!= 0){echo $banner->getImage();}?>"/>
<input name="publication" type="hidden" id="publication" value="<?php if ($_GET["id"]!= 0){echo $banner->getPublication();}?>"/>
<div class="tab-container tile">
                        <ul class="nav tab nav-tabs tab-left">
                            <li class="active"><a href="#fr">Fr</a></li>
                           
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="fr"  style="overflow:hidden;">
<div class="form-group">
    <label for="Ordre">Ordre</label>

     <input type="text" name="ordre" class="form-control input-sm" id="Ordre" placeholder="Ordre" value="<?php if ($_GET["id"]!= 0) echo $banner->getOrdre();?>" />

     
</div>


<div class="col-sm-4">
 Apercu l'image <p>
 Dimension : Largeur : 270px
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

<div id="photo-gallery-alt">
    <?php
$image1 = $banner->getImage();
if(isset($image1) && !empty($image1) && file_exists('../images/ressources/'.$image1)){
  echo '<div class="gallery-item col-md-4 col-sm-3 col-xs-4">
                            <a href="../images/ressources/'.$image1.'">
                                <img src="../images/ressources/'.$image1.'" alt="" />
                                <span><i class="fa fa-search"></i></span>
                                
                            </a>
                            <a href="controller/banner_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

                        </div>
                        ';
}

?>

</div>
<div class="col-xs-12">
<input type="submit" value="&nbsp;&nbsp;&nbsp;Valider&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-sm"/>
</div>
</div>




                         
                         </div>
                        </div>

</form>
</div>