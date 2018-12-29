<!--=========Banner start============-->
      <div class="inner-pages-bnr">
         <img src="images/template/contact-banner.jpg" class="img-responsive" alt="contact-banner-image">
         <div class="banner-caption">
            <h1><?php echo $nomModule; ?></h1>
            <ul class="breadcumb">
               <li><a href="index.php">Power Motors</a> - </li>
               <?php
					if(isset($_GET['sssm']) && !empty($_GET['sssm']) && is_numeric($_GET['sssm']) && $_GET['m']==5){
						$categorie = new Categorie();
						$categorie->getFromDB($_GET['sm']);
						$subcategori = new SousCategorie();
						$subcategori->getFromDB($_GET['ssm']);

						$produit = new Produit();
						$produit->getFromDB($_GET['sssm']);

						echo '<li><a href="'.urlRewrite($categorie->getTitreFr(),5,$categorie->getId(),NULL,NULL).'" title="'.stripslashes($categorie->getTitreFr()).'">'.stripslashes($categorie->getTitreFr()).'</a> - </li> ';
						echo '<li><a href="'.urlRewrite($categorie->getTitreFr(),5,$categorie->getId(),$subcategori->getId(),NULL).'" title="'.stripslashes($categorie->getTitreFr()).'">'.stripslashes($subcategori->getTitreFr()).'</a> - </li> ';
						echo '<li class="active"><a href="'.urlRewrite($categorie->getTitreFr(),5,$categorie->getId(),$subcategori->getId(),$produit->getId()).'" title="'.stripslashes($produit->getTitreFr()).'">'.stripslashes($produit->getTitreFr()).'</a></li>';
					}
					else if(isset($_GET['ssm']) && !empty($_GET['ssm']) && is_numeric($_GET['ssm']) && $_GET['m']==5){
						$categorie = new Categorie();
						$categorie->getFromDB($_GET['sm']);
						$subcategori = new SousCategorie();
						$subcategori->getFromDB($_GET['ssm']);

						echo '<li><a href="'.urlRewrite($categorie->getTitreFr(),5,$categorie->getId(),NULL,NULL).'" title="'.stripslashes($categorie->getTitreFr()).'">'.stripslashes($categorie->getTitreFr()).'</a> - </li> ';
						echo '<li class="active"><a href="'.urlRewrite($categorie->getTitreFr(),5,$categorie->getId(),$subcategori->getId(),NULL).'" title="'.stripslashes($categorie->getTitreFr()).'">'.stripslashes($subcategori->getTitreFr()).'</a></li>';
					}
					else if(isset($_GET['sm']) && !empty($_GET['sm']) && is_numeric($_GET['sm']) && $_GET['m']==5){
						$categorie = new Categorie();
						$categorie->getFromDB($_GET['sm']);
						echo '<li class="active"><a href="'.urlRewrite($categorie->getTitreFr(),5,$categorie->getId(),NULL,NULL).'" title="'.stripslashes($categorie->getTitreFr()).'">'.stripslashes($categorie->getTitreFr()).'</a></li>';
					}
					else {

						echo '<li class="active">'.$nomModule.'</a></li>';
					}

					 ?>
					
            </ul>
         </div>
      </div>