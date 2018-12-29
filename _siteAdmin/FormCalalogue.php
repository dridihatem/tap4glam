<h2><img src="images/icons/save_48.png" alt="" style="width:30px; height:30px;" /> Gestion des Galeries</h2>
<div id="content">			
				<div class="clear"></div>				
				<div class="content-box ">
                  <div class="content-box-header">
                    <h3>Insertion Galerie</h3>
<?php 
	$galerie = new Galerie();
	$galerie->getFromDB($_GET["id"]);
?>

                 
                 </div>
                 <div class="content-box-content">
<form action="controller/galerie_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_produit">
 <input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
 <input name="phot1" type="hidden" id="phot1" value="<?php if ($_GET["id"]!= 0){echo $galerie->getImage();}?>"/>
<input name="publication" type="hidden" id="publication" value="<?php if ($_GET["id"]!= 0){echo $galerie->getPublication();}else{echo "0";}?>"/>


        <p> <small>Titre</small>
        <input name="nom" type="text" id="titreFr" value="<?php  echo stripslashes($galerie->getNom());?>" size="100" />
		</p>
         
   
 
        
         <p> <small>Description</small>
    <textarea name="description" cols="40" rows="7" id="descriptionFr"><?php if ($_GET["id"]!= 0) echo stripslashes($galerie->getDescription());?></textarea>
    <script type="text/javascript">
	CKEDITOR.replace( 'descriptionFr',{skin : 'kama'});
</script>
  </p>
  <p> <small>Image</small>
     <input name="fichier" type="file" /><p>
      
     <?php
  $img = $galerie->getImage();
 if(isset($img) && (!empty($img))){
  ?><img src="../images/ressources/<?php echo $img; ?>" width="150px"/>
    <a href="controller/galerie_save.php?idMod=<?php echo $_REQUEST['id'];?>&op=5" title="Supprimer l'image" class="confirmation"><img src="images/icons/cross.png" width="16" height="16" /></a><?php }?>
    </p>
  </p>
    <p> <small>Nombre de place</small>
<input type ="text" name="nbre_place" value="<?php if ($_GET["id"]!= 0) echo stripslashes($galerie->getNbre_place());?>" />
  
  </p>
  <p> <small>Année</small>
<input type ="text" name="annee" value="<?php if ($_GET["id"]!= 0) echo stripslashes($galerie->getAnnee());?>" />

  </p>

<p> <small>Vitesse</small>
  <input type="text" name="vitesse" value="<?php if ($_GET["id"]!= 0) echo stripslashes($galerie->getVitesse());?>"/>
    
  </p>
  
    
  <p> <small>Type</small>
<select name="type">


<option value="1" <?php if($galerie->getType() ==1 ){echo "selected";} ?>>Automatic</option>
<option value="2" <?php if($galerie->getType() ==2 ){echo "selected";} ?>>Manuel</option>

  </p>

 

 <p></p>
 
<input type="submit" value="&nbsp;Valider&nbsp;" /> </div>
</div>
</form>	
 </div>
</div>

	</div>
</div>
