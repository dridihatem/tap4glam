<h4 class="page-title"><?php if($_GET['id']==0) echo 'Ajouter un nouveau sous categorie'; else echo 'Modifier la sous categorie';?> </h4>
<?php require("msg.php");?>
<div class="block-area" id="basic">
<?php

       $subcategorie = new SousCategorie();
       $subcategorie->getFromDB($_GET["id"]);
?>

<form action="controller/sub_categorie_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="phot1" type="hidden" id="phot1" value="<?php if ($_GET["id"]!= 0){echo $subcategorie->getImage();}?>"/>
<div class="tab-container tile">
                        <ul class="nav tab nav-tabs tab-left">
                            <li class="active"><a href="#fr">Fr</a></li>
                                <li><a href="#en">En</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="fr">


<div class="form-group">
    <label for="titre">Titre</label>

     <input type="text" name="titreFr" class="form-control input-sm" id="titre" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $subcategorie->getTitreFr();?>" />
</div>

<div class="form-group">
 <div class="row m-container">
 <div class="col-md-7">
  <div class="tile"  style="overflow: hidden;">
    <h2 class="tile-title">Espace Image</h2>
    <div class="listview narrow sortable ui-sortable">
   <div id="photo-gallery-alt" style="overflow:hidden;">
    <?php
$image1 =$subcategorie->getImage();
if(isset($image1) && !empty($image1) && file_exists('../images/ressources/'.$image1)){
  echo '<div class="gallery-item col-md-2 col-sm-3 col-xs-4">
                            <a href="../images/ressources/'.$image1.'">
                                <img src="../images/ressources/'.$image1.'" alt="'.$subcategorie->getTitreFr().'" />
                                <span><i class="fa fa-search"></i></span>

                            </a>
                            <a href="controller/sub_categorie_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

                        </div>
                        ';
}

     ?>

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

          <div class="col-md-5">



       <div class="tile">
        <h2 class="tile-title">Cat&eacute;gorie mere</h2>
        <div class="p-15">
          <div class="form-group">
    <label for="categ">Cat&eacute;gorie</label>
<select name="id_categorie" id="categ" class="select">
  <option disabled>Categories...</option>
          <?php

                      $req1 = mysql_query("select * from ".$_SESSION['pfx']."_categorie");
                      while($resultat1 = mysql_fetch_object($req1)){
                          if($subcategorie->getId_categorie() == $resultat1->id) $sl ="selected"; else $sl="NULL";
                          echo '<option value="'.$resultat1->id.'" '.$sl.'>'.stripslashes($resultat1->titreFr).'</option>';

                      }
                      ?>
</select>
</div>


        </div>
      </div>

        </div>

</div>


<input type="submit" value="&nbsp;&nbsp;&nbsp;Valider&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-sm"/>
</div>
</div>
  <div class="tab-pane" id="en">

    <div class="form-group">
        <label for="titreEn">Titre</label>

         <input type="text" name="titreEn" class="form-control input-sm" id="titre" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $subcategorie->getTitreEn();?>" />
    </div>
    <input type="submit" value="&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-sm"/>

  </div>


</div>

</form>
</div>
