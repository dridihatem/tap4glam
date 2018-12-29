<?php 
if(isset($_GET['sssm']) && !empty($_GET['sssm']) && is_numeric($_GET['sssm'])){
	
}
else if(isset($_GET['ssm']) && !empty($_GET['ssm']) && is_numeric($_GET['ssm'])){
	$service = new Services();
	$service->getFromDB($_GET['ssm']);
	$prestataire = new Prestataire();
	$prestataire->getFromDB($service->getId_prestataire());
	$categorie = new Categorie();
	$categorie->getFromDB($service->getId_categorie());
	$prix = $service->getPrix();
	$prix_promo = $service->getPrix_promo();
	if($prix_promo ==0){$prix_default = '<i class="fa fa-money"></i> <span class="current_price" style="color:#FFF; font-weight:normal;">'.number_format($prix,2,',',' ').' TND</span>';}
	else {
		$prix_default = '<i class="fa fa-money"></i> <span class="current_price" style="color:#FFF; font-weight:normal;">'.number_format($prix_promo,2,',',' ').' TND</span><span class="old_price" style="color: #a68047; font-weight:normal;font-size:19px;">'.number_format($prix,2,',',' ').'</span>';
	}
?>
<div class="container">
<div class="row">
			<div class="col-md-10 col-sm-12">
<div class="product_details product_grouped">
	<div class="container">

<div class="row">

                        <div class="col-lg-5 col-md-6">
                           <div class="product-details-tab">
                               
                                <div id="img-1">
                                   
                                        <img  src="images/ressources/<?php echo $service->getImage(); ?>" data-zoom-image="images/ressources/<?php echo $service->getImage(); ?>" alt="<?php echo $service->getTitreFr(); ?>">
                                
                                    <div class="product_price" style="background: #000000bf;color: #FFF!important;position: absolute;width: 92.3333%;bottom: 0px;padding: 5%;">
                                    	<span style="float: left; color:#FFF;font-weight: normal;"><i class="fa fa-clock-o"></i> 60 MIN</span>
                                   <span style="float: right; color:#FFF;"><?php echo $prix_default; ?></span>
                                </div>
                                </div>
                                

                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="product_d_right variable_product">
                            	<span>Services &raquo; <a href="<?php echo urlRewrite($categorie->getTitreFr(),$_GET['m'],$_GET['sm'],NULL,NULL,NULL); ?>"><?php echo $categorie->getTitreFr(); ?></a></span><br />
                            	
                                <div class="product_nav">

                                   <h1><?php echo stripslashes($service->getTitreFr()); ?></h1>
                                   <span><i class="fa fa-user"></i> <?php echo $prestataire->getNom_prenom(); ?></span>
                                </div>

                                <div class="product_desc">
                                    <p><?php echo extraireTxt(formatedTxt(stripslashes($service->getDescriptionFr())),400); ?></p>
                                </div>
                                
                                <div class="product_nav">
                                	<h5>Soins en Option</h5>
                                </div>
                                <div class="check_option">
                                	<?php
                                	$option = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_option_service WHERE id_service LIKE '%".$service->getId()."%' AND etat =1");
                                	
                                	$num_row = $option->num_rows;
                                	if($num_row >0){
                                		echo '<table style="width:100%;"><thead><th></th><th>Prix</th></thead><tbody>';
                                	while($_res_option = $option->fetch_assoc()){
                                		$prix_option = $_res_option['prix'];
										$prix_promo_option = $_res_option['prix_promo'];
										if($prix_promo_option ==0){$prix_default_option = '<span class="current_price" style="color:#000; font-weight:normal;">'.number_format($prix_option,2,',',' ').' TND</span>';}
										else {
											$prix_default_option = '<span class="current_price" style="color:#000; font-weight:normal;">'.number_format($prix_promo_option,2,',',' ').' TND</span><span class="old_price" style="color: #a68047; font-weight:normal;font-size:19px;">'.number_format($prix_option,2,',',' ').'</span>';
										}
                                		echo '<tr>
                                		<td>
                                		<div class="pretty p-svg p-plain p-bigger p-smooth">
								        <input type="checkbox" />
								        <div class="state">
								            <img class="svg" src="images/template/check-circle.svg"/>
								            <label>'.stripslashes($_res_option['titreFr']).'</label>
								        </div>
								    </div>
								    </td>
                                		
                                		<td>'.$prix_default_option.'</td>
                                		</tr>';
                                	}
                                	echo '</tbody></table>';
                                		}
                                	else {
                                		echo "Pas d'option disonible";
                                	}
                                	 ?>
                                	
                                	
       

                                </div>
                                
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="product_d_info">
                <div class="container">   
                    <div class="row">
                        <div class="col-12">
                            <div class="product_d_inner">   
                                <div class="product_info_button">    
                                    <ul class="nav" role="tablist">
                                        <li >
                                            <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Détail de service</a>
                                        </li>
                                        <li>
                                             <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Réservation</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="info" role="tabpanel" >
                                        <div class="product_info_content">
                                            <p><?php echo stripslashes($service->getDescriptionFr()); ?></p>
                                        </div>    
                                    </div>

                                    <div class="tab-pane fade" id="sheet" role="tabpanel" >
                                        <div class="product_d_table">
                                           <form action="#">
                                                <table>
                                                    <tbody>
                                                        <tr>
                                                            <td class="first_child">Compositions</td>
                                                            <td>Polyester</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Styles</td>
                                                            <td>Girly</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="first_child">Properties</td>
                                                            <td>Short Dress</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>
</div>
<?php 
}
else if(isset($_GET['sm']) && !empty($_GET['sm']) && is_numeric($_GET['sm'])){
$service = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_service WHERE etat = 1 AND isVip =0 AND id_categorie = ".mysqli_real_escape_string($conn,$_GET['sm'])." ");
	$categroe = new Categorie();
	$categroe->getFromDB($_GET['sm']);
echo '
<div class="section_title">
                    <div class="row align-items-center">
                        <div class="col-12 text-center">
                            <h3 style="text-transform: uppercase;color:#b88038">Services / '.$categroe->getTitreFr().'</h3>
                        </div>
                    </div>
                    </div>
                    ';
                    echo '<div id="categorycmsblock">
<div class="container">
	<ul class="categorycmsblock-inner">';
while($res_service = $service->fetch_assoc()){

	$prestataire = new Prestataire();
	$prestataire->getFromDB($res_service['id_prestataire']);
	$prix = $res_service['prix'];
	$prix_promo = $res_service['prix_promo'];
	if($prix_promo ==0){$prix_default = number_format($res_service['prix'],2,',',' ').' <sup>Dt</sup>';}
	else {
		$prix_default = number_format($res_service['prix_promo'],2,',',' ').' <sup>Dt</sup><br /><span style="text-decoration: line-through;font-size: 14px;color: #d8ab5e;"">'.number_format($res_service['prix'],2,',',' ').'</span><br />';
	}
         echo '<li class="cat-item">
            <div class="cat-item-inner">
        
              <a href="'.urlRewrite($res_service['titreFr'],2,$_GET['sm'],$res_service['id'],NULL,NULL).'" class="cat-img"><img src="images/ressources/'.$res_service['image'].'" alt="'.$res_service['titreFr'].'"></a> 
               <span class="cat-details"> 
               <span class="cat-name" href="'.urlRewrite($res_service['titreFr'],2,$_GET['sm'],$res_service['id'],NULL,NULL).'">'.stripslashes($res_service['titreFr']).'</span>
               <a class="cat-name1" href="'.urlRewrite($res_service['titreFr'],2,$_GET['sm'],$res_service['id'],NULL,NULL).'"><i class="fa fa-user"></i> '.$prestataire->getNom_prenom().'</a>
              
               </span>
               <span class="prix_service">
               '.$prix_default.'
               </span>
            </div>
         </li>';
           	
            	
      
}
echo '</ul>
</div>
      </div>';
}
else if(isset($_GET['m']) && !empty($_GET['m']) && is_numeric($_GET['m'])){
	echo '
                <div class="container">
                    <div class="section_title">
                    <div class="row align-items-center">
                        <div class="col-12 text-center">
                            <h3 style="text-transform: uppercase;color:#b88038">Nos Services </h3>
                        </div>
                    </div>
                    </div>
                    <div class="row">';
                     
                      $categorie1 = new Categorie();
                      $categorie1->getFromDB(3);
                      echo '<div class="col-md-6 nopadding">
                <div class="row news item-left">
                    <div class="col-md-6 nopadding hidden-xs">
                       
                       <a href="'.urlRewrite($categorie1->getTitreFr(),2,$categorie1->getId(),NULL,NULL,NULL).'"> <img src="images/ressources/'.$categorie1->getImage().'" alt="'.$categorie1->getTitreFr().'">
                        <span class="img-overflow"></span>
                        <div class="arrow-left"></div>
                        </a>
                    </div>

                      <div class="col-md-6 nopadding" style="background: #f58696;">
                        <div class="content text-center">
                            <a href="'.urlRewrite($categorie1->getTitreFr(),2,$categorie1->getId(),NULL,NULL,NULL).'">
                            <h2>'.stripslashes($categorie1->getTitreFr()).'</h2>
                            <p>'.extraireTxt(formatedTxt($categorie1->getDescriptionFr()),200).'</p>
                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->
                            </a>
                        </div>
                    </div>
                </div>
            </div>';
                      
                      $categorie2 = new Categorie();
                      $categorie2->getFromDB(4);
                      echo '<div class="col-md-6 nopadding">
                <div class="row news item-left">
                    <div class="col-md-6 nopadding hidden-xs">
                       <a href="'.urlRewrite($categorie2->getTitreFr(),2,$categorie2->getId(),NULL,NULL,NULL).'">  
                        <img src="images/ressources/'.$categorie2->getImage().'" alt="'.$categorie2->getTitreFr().'">
                        <span class="img-overflow"></span>
                        <div class="arrow-left"></div>
                        </a>
                    </div>

                      <div class="col-md-6 nopadding" style="background: #978980;">
                        <div class="content text-center">
                             <a href="'.urlRewrite($categorie2->getTitreFr(),2,$categorie2->getId(),NULL,NULL,NULL).'">  
                             <h2>'.stripslashes($categorie2->getTitreFr()).'</h2>
                            <p>'.extraireTxt(formatedTxt($categorie2->getDescriptionFr()),200).'</p>
                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->
                            </a>
                        </div>
                    </div>
                </div>
            </div>';
                    
                      $categorie3 = new Categorie();
                      $categorie3->getFromDB(5);

echo '<div class="col-md-6 nopadding">
                <div class="row news item-right">
                    
                    <div class="col-md-6 nopadding"  style="background: #bcadd3;">
                        <div class="content text-center">
                          <a href="'.urlRewrite($categorie3->getTitreFr(),2,$categorie3->getId(),NULL,NULL,NULL).'"> <h2>'.stripslashes($categorie3->getTitreFr()).'</h2>
                            <p>'.extraireTxt(formatedTxt($categorie3->getDescriptionFr()),200).'</p>
                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 nopadding hidden-xs">
                       <a href="'.urlRewrite($categorie3->getTitreFr(),2,$categorie3->getId(),NULL,NULL,NULL).'"> <img src="images/ressources/'.$categorie3->getImage().'" alt="'.$categorie3->getTitreFr().'">
                        <span class="img-overflow"></span>
                        <div class="arrow-right"></div>
                        </a>
                    </div>

                </div>
            </div>';
                      
                      $categorie4 = new Categorie();
                      $categorie4->getFromDB(6);
                      echo '  <div class="col-md-6 nopadding">
                <div class="row news item-right">
                    <div class="col-md-6 nopadding"  style="background: #bc7434;">
                        <div class="content text-center"> 
                        <a href="'.urlRewrite($categorie4->getTitreFr(),2,$categorie4->getId(),NULL,NULL,NULL).'">
                            <h2>'.stripslashes($categorie4->getTitreFr()).'</h2>
                            <p>'.extraireTxt(formatedTxt(stripslashes($categorie4->getDescriptionFr())),200).'</p>
                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->
                         </a>
                         </div>
                       
                    </div>
                            <div class="col-md-6 nopadding hidden-xs">
                         <a href="'.urlRewrite($categorie4->getTitreFr(),2,$categorie4->getId(),NULL,NULL,NULL).'"><img src="images/ressources/'.$categorie4->getImage().'" alt="'.$categorie4->getTitreFr().'">
                        <span class="img-overflow"></span>
                        <div class="arrow-right"></div>
                     </a></div>
                   
                </div>
                </div>';
                       
                      $categorie5 = new Categorie();
                      $categorie5->getFromDB(7);
                      echo '<div class="col-md-6 nopadding">
                <div class="row news item-left">
                  <div class="col-md-6 nopadding hidden-xs">
                          <a href="'.urlRewrite($categorie5->getTitreFr(),2,$categorie5->getId(),NULL,NULL,NULL).'"><img src="images/ressources/'.$categorie5->getImage().'" alt="'.$categorie5->getTitreFr().'">
                        <span class="img-overflow"></span>
                        <div class="arrow-left"></div>
                    </a></div>
                    

                      <div class="col-md-6 nopadding" style="background: #51281b;">
                       <div class="content text-center">
                             <a href="'.urlRewrite($categorie5->getTitreFr(),2,$categorie5->getId(),NULL,NULL,NULL).'"> 
                            <h2 style="color:#FFF;">'.stripslashes($categorie5->getTitreFr()).'</h2>
                            <p>'.extraireTxt(formatedTxt($categorie5->getDescriptionFr()),200).'</p>
                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>';
                      
                      $categorie6 = new Categorie();
                      $categorie6->getFromDB(8);
                      echo '<div class="col-md-6 nopadding">
                <div class="row news item-left">
               <div class="col-md-6 nopadding hidden-xs">
<a href="'.urlRewrite($categorie6->getTitreFr(),2,$categorie6->getId(),NULL,NULL,NULL).'"> <img src="images/ressources/'.$categorie6->getImage().'" alt="'.$categorie6->getTitreFr().'">
                        <span class="img-overflow"></span>
                        <div class="arrow-left"></div>
                   </a> </div>

                      <div class="col-md-6 nopadding" style="background: #6d6500;">
                        <div class="content text-center">
                            <a href="'.urlRewrite($categorie6->getTitreFr(),2,$categorie6->getId(),NULL,NULL,NULL).'">
                             <h2>'.stripslashes($categorie6->getTitreFr()).'</h2>
                            <p>'.extraireTxt(formatedTxt($categorie6->getDescriptionFr()),200).'</p>
                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->
                            </a>
                        </div>
                        
                    </div>
                </div>
            </div>';
                     
          echo '</div>
            </div>';
}
?>
</div>