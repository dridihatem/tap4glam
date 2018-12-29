<style type="text/css">
.filter-color-white {
  display: block;
  width: 35px;
  height: 35px;
  background: #fff;
  border-radius: 2px;
  box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
  -webkit-box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
}
.filter-color-black {
  display: block;
  width: 35px;
  height: 35px;
  background: #000;
  border-radius: 2px;
  box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
  -webkit-box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
}
.filter-color-green {
  display: block;
  width: 35px;
  height: 35px;
  background: rgb(172, 191, 11);
  border-radius: 2px;
  box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
  -webkit-box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
}
.filter-color-blue {
  display: block;
  width: 35px;
  height: 35px;
  background: rgb(82, 114, 179);
  border-radius: 2px;
  box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
  -webkit-box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
}
.filter-color-red {
  display: block;
  width: 35px;
  height: 35px;
  background: rgb(242, 12, 117);
  border-radius: 2px;
  box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
  -webkit-box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
}
.filter-color-gree {
  display: block;
  width: 35px;
  height: 35px;
  background: rgb(209, 210, 212);
  border-radius: 2px;
  box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
  -webkit-box-shadow: 0 1px 3px rgba(0,0,0, 0.35);
}
</style>
<h4 class="page-title"><?php if($_GET['id']==0) echo 'Ajouter un nouveau produit'; else echo 'Modifier la produit';?> </h4>
<?php require("msg.php");?>
<div class="block-area" id="basic">
<?php

        $produit = new Produit();
        $produit->getFromDB($_GET["id"]);

?>

<form action="controller/produits_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="phot1" type="hidden" id="phot1" value="<?php if ($_GET["id"]!= 0){echo $produit->getImage1();}?>"/>
<input name="phot2" type="hidden" id="phot2" value="<?php if ($_GET["id"]!= 0){echo $produit->getImage2();}?>"/>
<input name="phot3" type="hidden" id="phot3" value="<?php if ($_GET["id"]!= 0){echo $produit->getImage3();}?>"/>
<input name="fiche" type="hidden" id="phot3" value="<?php if ($_GET["id"]!= 0){echo $produit->getFiche();}?>"/>
<input name="vu" type="hidden" id="vu" value="<?php if ($_GET["id"]!= 0){echo $produit->getVu();}?>"/>
<input name="publication" type="hidden" id="publication" value="<?php if ($_GET["id"]!= 0){echo $produit->getPublication();}?>"/>
<input name="date_insertion" type="hidden" id="publication" value="<?php if ($_GET["id"]!= 0){echo $produit->getDate_insertion();}?>"/>

<div class="tab-container tile">
                        <ul class="nav tab nav-tabs tab-left">
                            <li class="active"><a href="#fr">Fr</a></li>
                            <li><a href="#en">En</a></li>
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="fr">
<div class="form-group">
    <label for="ref">Modéle</label>
     <input type="text"  name="modele" class="form-control input-sm" id="ref" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $produit->getModele();?>" />
<span id="disp"></span>
</div>

<div class="form-group">
    <label for="titre">Titre</label>

     <input type="text" name="titreFr" class="form-control input-sm" id="titre" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $produit->getTitreFr();?>" />
</div>

<div class="form-group">
<label for="contenu">Description</label>
<textarea name="descriptionFr" class="wysiwye-editor" id="contenu"><?php if ($_GET["id"]!= 0) echo stripslashes($produit->getDescriptionFr());?></textarea>
</div>
<div class="form-group">
 <div class="row m-container">
 <div class="col-md-7">
  <div class="tile"  style="overflow: hidden;">
    <h2 class="tile-title">Espace Image</h2>
    <div class="listview narrow sortable ui-sortable">
   <div id="photo-gallery-alt" style="overflow:hidden;">
    <?php
$image1 = $produit->getImage1();
$image2 = $produit->getImage2();
$image3 = $produit->getImage3();
$fiche = $produit->getFiche();
if(isset($image1) && !empty($image1) && file_exists('../images/ressources/'.$image1)){
  echo '<div class="gallery-item col-md-3 col-sm-3 col-xs-4">
                            <a href="../images/ressources/'.$image1.'">
                                <img src="../images/ressources/'.$image1.'" alt="'.$produit->getTitreFr().'" />
                                <span><i class="fa fa-search"></i></span>

                            </a>
                            <a href="controller/produit_save.php?idMod='.$_REQUEST['id'].'&op=5" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

                        </div>
                        ';
}
if(isset($image2) && !empty($image2) && file_exists('../images/ressources/'.$image2)){
  echo '<div class="gallery-item col-md-3 col-sm-3 col-xs-4">
                            <a href="../images/ressources/'.$image2.'">
                                <img src="../images/ressources/'.$image2.'" alt="'.$produit->getTitreFr().'" />
                                <span><i class="fa fa-search"></i></span>
                            </a>
                        <a href="controller/produit_save.php?idMod='.$_REQUEST['id'].'&op=51" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

                        </div>

                        ';
}
if(isset($image3) && !empty($image3) && file_exists('../images/ressources/'.$image3)){
  echo '<div class="gallery-item col-md-3 col-sm-3 col-xs-4">
                            <a href="../images/ressources/'.$image3.'">
                                <img src="../images/ressources/'.$image3.'" alt="'.$produit->getTitreFr().'" />
                                <span><i class="fa fa-search"></i></span>
                            </a>
                            <a href="controller/produit_save.php?idMod='.$_REQUEST['id'].'&op=52" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

                        </div>
                        ';
}

if(isset($fiche) && !empty($fiche) && file_exists('../images/ressources/'.$fiche)){
  echo '<div class="gallery-item col-md-3 col-sm-3 col-xs-4">
                            <a href="../images/ressources/'.$fiche.'">
                                <img src="../images/ressources/'.$fiche.'" alt="'.$produit->getTitreFr().'" />
                                <span><i class="fa fa-search"></i></span>
                            </a>
                            <a href="controller/produit_save.php?idMod='.$_REQUEST['id'].'&op=53" title="Supprimer l\'image" class="confirmation"><i class="fa fa-times"></i> Supprimer</a>

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
<div class="col-sm-4">
Apercu l'image 2<p>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail form-control"></div>

                        <div>
                            <span class="btn btn-file btn-alt btn-sm">
                                <span class="fileupload-new">Selectionner image</span>
                                <span class="fileupload-exists">Changer</span>
                                <input type="file" name="fichier1" />
                            </span>
                            <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Supprimer</a>
                        </div>
                    </div>
</div>
<div class="col-sm-4">
           Apercu l'image 3<p>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail form-control"></div>

                        <div>
                            <span class="btn btn-file btn-alt btn-sm">
                                <span class="fileupload-new">Selectionner image</span>
                                <span class="fileupload-exists">Changer</span>
                                <input type="file" name="fichier2" />
                            </span>
                            <a href="#" class="btn fileupload-exists btn-sm" data-dismiss="fileupload">Supprimer</a>
                        </div>
     </div>
</div>
<div class="col-sm-4">
           Apercu Fiche descrptive<p>
     <div class="fileupload fileupload-new" data-provides="fileupload">
                        <div class="fileupload-preview thumbnail form-control"></div>

                        <div>
                            <span class="btn btn-file btn-alt btn-sm">
                                <span class="fileupload-new">Selectionner image</span>
                                <span class="fileupload-exists">Changer</span>
                                <input type="file" name="fichier3" />
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
        <h2 class="tile-title">Emplacement</h2>
        <div class="p-15">

  <div class="form-group">
    <label for="categorie">Cat&eacute;gorie</label>
<select name="id_categorie" id="categorie" class="select">
  <option value="">Categories...</option>
          <?php

                      $req_cat = mysql_query("select * from ".$_SESSION['pfx']."_categorie");
                      while($resultat_cat = mysql_fetch_object($req_cat)){


                          if($produit->getId_categorie() == $resultat_cat->id) $sl ="selected"; else $sl="NULL";
                          echo '<option value="'.$resultat_cat->id.'" '.$sl.'>'.stripslashes($resultat_cat->titreFr).' </option>';

                      }
                      ?>
</select>
</div>
 <div class="form-group">
    <label for="sub_categorie">Sub Cat&eacute;gorie</label>
<select name="id_sous_categorie" id="sub_categorie" class="select">
  <option value="">Sous Categories...</option>
 <?php
                      $req1 = mysql_query("select * from ".$_SESSION['pfx']."_sous_categorie");
                      while($resultat1 = mysql_fetch_object($req1)){
                          $categ = new Categorie();
                          $categ->getFromDB($resultat1->id_categorie);
                          if($produit->getId_sous_categorie() == $resultat1->id) $sl ="selected"; else $sl="NULL";
                          echo '<option value="'.$resultat1->id.'" '.$sl.'><strong>'.$categ->getTitreFr().'</strong> - '.stripslashes($resultat1->titreFr).'</option>';

                      }
                      ?>


</select>
</div>

        </div>
      </div>

              <div class="tile">
        <h2 class="tile-title">Caréctéristique</h2>
        <div class="p-15">

  <div class="form-group">
    <label for="cahssis">Chassis</label>
    <input type="text" name="chassis" value="<?php if ($_GET["id"]!= 0) echo $produit->getChassis();?>" class="form-control input-sm" id="cahssis" />
</div>
            <div class="form-group">
    <label for="modcahssis">Modèle de Chassis</label>
    <input type="text" name="chassis_modele" value="<?php if ($_GET["id"]!= 0) echo $produit->getChassis_modele();?>" class="form-control input-sm" id="modcahssis" />
</div>
             <div class="form-group">
    <label for="moteur">Moteur</label>
    <input type="text" name="moteur" value="<?php if ($_GET["id"]!= 0) echo $produit->getMoteur();?>" class="form-control input-sm" id="moteur" />
</div>
             <div class="form-group">
    <label for="puissance">Puissance</label>
    <input type="text" name="puissance" value="<?php if ($_GET["id"]!= 0) echo $produit->getPuissance();?>" class="form-control input-sm" id="puissance" />
</div>
            <div class="form-group">
    <label for="emission">Emission</label>
    <input type="text" name="emission" value="<?php if ($_GET["id"]!= 0) echo $produit->getEmission();?>" class="form-control input-sm" id="emission" />
</div>
 

        </div>
      </div>

</div>


<input type="submit" value="&nbsp;&nbsp;&nbsp;Valider&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-lg"/>
</div>
</div>


</div>
                            <div class="tab-pane" id="en">
                                
                   <div class="form-group">
    <label for="titreEn">TitreEn</label>

     <input type="text" name="titreEn" class="form-control input-sm" id="titreEn" placeholder="TitreEn" value="<?php if ($_GET["id"]!= 0) echo $produit->getTitreEn();?>" />
</div>

<div class="form-group">
<label for="contenuEn">DescriptionEn</label>
<textarea name="descriptionEn" class="wysiwye-editor" id="contenuEn"><?php if ($_GET["id"]!= 0) echo stripslashes($produit->getDescriptionEn());?></textarea>
</div>           
<input type="submit" value="&nbsp;&nbsp;&nbsp;Save&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-lg"/>

                            </div>

</form>
</div>
