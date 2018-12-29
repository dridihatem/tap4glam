<?php 
$service = new Services();
$service->getFromDB($_GET["id"]);
$categorie = new Categorie();
$categorie->getFromDB($service->getId_categorie());
$prestataire = new Prestataire();
$prestataire->getFromDB($service->getId_prestataire());
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminPromotion" class="active">Gestion des Promotions</a> </li>

</ul>
<div class="page-title"> <a href="index.php?pg=adminServices"><i class="icon-custom-left"></i></a>
<h3>Module - <span class="semi-bold">Gestion des promotions</span></h3>
</div>
    <div class="row">
     <div class="col-md-12">
       <?php require("msg.php");?>
<ul class="nav nav-tabs" role="tablist">
<li class="active">
<a href="#fr" role="tab" data-toggle="tab"><img src="images/fr.png" style="width:17px;"/> Français</a>
</li>
</ul>
<form action="controller/promotion_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">
<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="etat" type="hidden" id="etat" value="<?php if ($_GET["id"]!= 0){echo $service->getEtat();}?>"/>
<div class="tab-content">
<div class="tab-pane active" id="fr">
<div class="row column-seperation">
<div class="col-md-9">               
<div class="form-group">
  <h3>Gestion des prix de service</h3>
<table  class="table order-listdimension" style="width: 100%;">
                      <thead>
                          <tr>
                              <td>Date début</td>
                              <td>Date fin</td>
                              <td>Prix</td>
                              <td>Prix promo</td>
                          </tr>
                      </thead>
                      <tbody>
                        <?php
                        /*if($_GET['id']!=0){
                          $produit_taille = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_option_service WHERE id_service = ".mysqli_real_escape_string($service->getId())."");
                          while($res_produit_taille = $produit_taille->fetch_assoc()){
                            echo '<tr><td class="col-sm-4"> <input type="text" name="largeur[]"  class="form-control" value="'.$res_produit_taille['largeur'].'"/> </td>
                                <td class="col-sm-4"><input type="text" name="longeur[]" class="form-control"  value="'.$res_produit_taille['longueur'].'"/></td>
                                <td class="col-sm-2"><a href="controller/produits_save.php?idMod='.$res_produit_taille['id'].'&id='.$produit->getId().'&op=12"><i class="fa fa-delete"></i>Supprimer</a></td>
                                <td class="col-sm-4"><a class="supprimerdimension"></a></td>
                            </tr>';
                          }
                        }*/
                        ?>

                      </tbody>
                      <tfoot>
                          <tr>
                              <td colspan="4" style="text-align: left;">
                                  <input type="button" class="btn btn-lg btn-block btn-success" id="ajouterdimension" value="Ajouter nouvelle Période" />
                              </td>
                          </tr>
                          <tr>
                          </tr>
                      </tfoot>
                  </table>
<div class="form-group">
  <h3>Les options reliées avec ce service</h3>
</div>

<?php 
if($_GET['id']!=0){

                    $option = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_option_service WHERE id_service LIKE '%".$_GET['id']."%' AND etat = 1");
                  
                    while($res_option = $option->fetch_assoc()){
                   
                    echo '<h4>'.$res_option['titreFr'].'</h4>';
                    echo '<table  class="table order-listdimension" style="width: 100%;">
                      <thead>
                          <tr>
                              <td>Date début</td>
                              <td>Date fin</td>
                              <td>Prix</td>
                              <td>Prix promo</td>
                          </tr>
                      </thead>
                      <tbody>
                      <td class="col-sm-2">
                      <div class="input-append success">
                      <input type="date" name="date_debut_option[]"  class="form-control" value=""/><span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span></div>
                      </td>
                      <td class="col-sm-2">
                      <div class="input-append success">
                      <input type="date" name="date_fin_option[]"  class="form-control" value=""/><span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span></div>
                      </td>
                      
                      <td class="col-sm-2">
                      
                      <input type="text" name="prix_option[]"  class="form-control" value=""/>
                      </td>
                       <td class="col-sm-2">
                      
                      <input type="text" name="prix_option[]"  class="form-control" value=""/>
                      </td>
                      </tbody>
                      </table>';
                                        }
}
?>

</div>
</div>
    <div class="col-md-3">   
      <h3 style="background: #e7c06e;color: #000;border-radius: 5px;padding: 5px;">Le service</h3>
      <div class="form-group">
        <?php
        if($service->getIsVip() == 1){
          echo '<img src="images/vip.png" style="width:40px; text-align:center;"/>';
        }
         ?>
        <h4>- <?php echo $service->getTitreFr(); ?></h4>
        
        
      </div>
      <h3 style="background: #e7c06e;color: #000;border-radius: 5px;padding: 5px;">Catégorie</h3>
      <div class="form-group">

        <h4>- <?php echo $categorie->getTitreFr(); ?></h4>
      </div>
      <h3 style="background: #e7c06e;color: #000;border-radius: 5px;padding: 5px;">Préstataire</h3>
      <div class="form-group">

        <h4>- <?php echo $prestataire->getNom_prenom(); ?></h4>
      </div>

    
        
        
        <div class="form-group">
            <label>Etat</label>
    <select name="etat" id="source" class="form-control">
        <option value="1"  <?php if($_GET['id']!=0 && $service->getEtat()==1){echo "selected";} ?>>Publier sur site</option>
        <option value="0" <?php if($_GET['id']!=0 && $service->getEtat()==0){echo "selected";} ?>>N'est pas publier</option>
</select>
    </div> 

<input type="submit" value="&nbsp;Valider&nbsp;" class="btn btn-success btn-cons"/>    
    </div>
</div>
</div>

</div>
</form>	
</div>        
</div>
</div>
</div>