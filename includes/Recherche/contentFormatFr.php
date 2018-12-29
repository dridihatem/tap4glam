<div class="col-lg-9 col-md-9">
         <h3>Resultat de la recherche</h3>
  <div class="block_type" style="display:block;overflow: hidden; margin-bottom:10px;">
    
                               
<?php
if(isset($_GET['result'])== "non"){echo '<div class="warning">
                        <p>
<div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <strong>:( </strong>Pas de r&eacute;sultat
                                </div>

                            
                        </p> ';}
  else {


    $result = mysql_query('SELECT * FROM '.$_SESSION['pfx'].'_produit WHERE modele LIKE "%'.stripslashes($_GET['key']).'%" OR titreFr LIKE "%'.stripslashes($_GET['key']).'%" OR descriptionFr LIKE "%'.stripslashes($_GET['key']).'%" && publication = 1'); 
    
   echo '<div class="block_modele" style="display:block;overflow: hidden;">';
      echo '<h4 style="font-size:23px;">Modèles</h4>';
    $rox = mysql_num_rows($result);
    if( $rox == 0){echo "Désolé pas de modèle disponible";}
while ($com_courant = mysql_fetch_array($result)) {
    $image1 = $com_courant['image1'];
    if(isset($image1) && !empty($image1) && file_exists('images/ressources/'.$image1)){
        $image_first = ' <img src="images/ressources/'.$image1.'" alt="'.$com_courant['titreFr'].'" class="img-responsive">';
    }
    $brochure = $com_courant['fiche'];
                                 if(isset($brochure) && !empty($brochure)){
                                     $broc= '<a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="images/ressources/'.$brochure.'" target="_blank"><i class="fa fa-file-pdf-o"></i> Fiche</a>';
                                 }
                                 else { $broc= '<a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="catalogue/catalogue_powermotors.pdf" target="_blank"><i class="fa fa-file-pdf-o"></i> Fiche</a>';}
                                 
 
echo '<div class="shop-column blogBox">
                    '.$image_first.'
                     <div class="shop-column-head">
                        <h5>Modéle : '.$com_courant['modele'].'</h5>
                        
                     </div>
                     <span class="shop-price">'.formatedTxt(stripslashes($com_courant['titreFr'])).'</span>
                        '.$broc.'
                     <a class="header-requestbtn filter-link buy-now-link hvr-bounce-to-right" href="'. urlRewrite($com_courant['modele'], 5, $com_courant['id_categorie'], $com_courant['id_sous_categorie'], $com_courant['id']).'" title="'.$com_courant['modele'].'">Voir détail</a>
                  </div>';

}


    echo '</div>';
}


  
                        
                
                 ?>
                   
                    </div>
                    </div>


