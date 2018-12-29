<?php 
$option = new Option_service();
$option->getFromDB($_GET["id"]);

?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminOptionServices" class="active">Gestion des Options de service</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminOptionServices"><i class="icon-custom-left"></i></a>

<h3>Contenu - <span class="semi-bold">Modifier / Ajouter un option</span></h3>

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

<form action="controller/option_service_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">



<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>

<input name="etat" type="hidden"  value="<?php if ($_GET["id"]!= 0){echo $option->getEtat();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-6">
                   


<div class="form-group">

    <label for="nom">Titre (Français)</label>

     <input type="text" name="titreFr" class="form-control input-sm" id="nom" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $option->getTitreFr();?>" />

</div> 

    <div class="form-group">

    <label for="prix">Prix</label>
<div class="input-append success">
 <input type="text" name="prix" class="form-control" id="prix" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $option->getPrix();?>" />
<span class="add-on"><span class="arrow"></span>DT</span>
</div>

   

</div> 

    <div class="form-group">

    <label for="prix_promo">Prix en promotion</label>
<div class="input-append success">
    <input type="text" name="prix_promo" class="form-control" id="prix_promo" placeholder="" value="<?php if ($_GET["id"]!= 0) echo $option->getPrix_promo();?>" />
<span class="add-on"><span class="arrow"></span>DT</span>
</div>
</div> 



   
<input type="submit" value="&nbsp;Valider&nbsp;" class="btn btn-success btn-cons"/>
</div>
<div class="col-md-6">
  <div class="form-group">
        <h4>Choisissez les services</h4>
<div class="row">
    <div class="col-md-5">
    <label for="service">Liste des services</label>
<select name="list_service[]" id="multiselect1" class="form-control" multiple="multiple" size="10">
    <?php
    $service = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_service WHERE etat = 1 ORDER BY id");
    while($liste_service = $service->fetch_assoc()){
        $categorie = new Categorie();
        $categorie->getFromDB($liste_service['id_categorie']);
        echo '<option value="'.$liste_service['id'].'"><b style="color:red;">'.$categorie->getTitreFr().'</b> - '.$liste_service['titreFr'].'</option>';
        
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
        <select name="to_service[]" id="multiselect1_to" class="form-control" size="10" multiple="multiple">
            
<?php 
            
                
                 $_res_service = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_service WHERE id IN(".$option->getId_service().")");
                 while($ress_service = $_res_service->fetch_assoc()){
                 $categorie = new Categorie();
                  $categorie->getFromDB($ress_service['id_categorie']);
                   echo '<option value="'.$ress_service['id'].'">'.$ress_service['titreFr'].'</option> ';
                 }

                
 
            
            ?>
           
        </select>
         
    </div>
</div>

</div> 
</div>

</div>

</div>

<div class="tab-pane" id="en">

<div class="row">

<div class="col-md-12">

<div class="form-group">
  <label for="nomEN">Titre (anglais)</label>
     <input type="text" name="titreEn" class="form-control input-sm" id="nomEN" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $option->getTitreEn();?>" />
</div> 

<p class="pull-right">
<input type="submit" value="&nbsp;Save&nbsp;" class="btn btn-success btn-cons"/>
</p>

</div>

</div>

</div>

<div class="tab-pane" id="es">

<div class="row">

<div class="col-md-12">

<div class="form-group">
  <label for="nomAr">Titre</label>
     <input type="text" name="titreAr" class="form-control input-sm" id="nomAr" placeholder="Titre" value="<?php if ($_GET["id"]!= 0) echo $option->getTitreAr();?>" />
</div> 

<p class="pull-right">
<input type="submit" value="&nbsp;Save&nbsp;" class="btn btn-success btn-cons"/>
</p>

</div>


</div>

</div>



</div>
 </form>	
</div>

       

    </div>

</div>

</div>



