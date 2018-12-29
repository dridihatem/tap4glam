<?php 
if($_GET['id']==0){ ?>
<?php 
$pack = new Reservation();
$pack->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminReservation" class="active">Gestion des Réseravations</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminReservation"><i class="icon-custom-left"></i></a>

<h3>Module - <span class="semi-bold">Modifier / Ajouter une réservation</span></h3>

</div>

    <div class="row">

       

      <div class="col-md-12">

          <?php require("msg.php");?>

<ul class="nav nav-tabs" role="tablist">

<li class="active">
    <a href="#fr" role="tab" data-toggle="tab"><img src="images/fr.png" style="width:17px;"/> Français</a>
</li>

</ul>

<form action="controller/reservation_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>

<input name="etat_reservation" type="hidden" id="etat" value="<?php if ($_GET["id"]!= 0){echo $pack->getEtat_reservation();}?>"/>
<input name="date_annulation" type="hidden" id="etat" value=""/>
<input name="date_modification" type="hidden" id="etat" value=""/>
<input name="id_client" type="hidden" id="etat" value=""/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-6">
  
<div class="form-group">
    <label for="nbre_personne">Nombre de personne</label>
     <input type="number" name="nombre_personne" class="form-control input-sm" id="nbre_personne" placeholder="" value="" />
</div> 
<div class="form-group">
    <label for="date_reservation">Date de réservation</label>
     <input type="date" name="date_reservation" class="form-control input-sm" id="date_reservation" placeholder="" value="" />
</div> 

<div class="form-group">

    <label for="heure_reservation">Heure de réservation</label>

     <input type="time" name="heure_reservation" class="form-control input-sm" id="heure_reservation" placeholder="" value="" />

</div> 
 <h3>Information Client</h3>   
<div class="form-group">

<label for="nom_prenom">Nom & prénom</label>
<input type="text" name="nom_prenom" class="form-control input-sm" id="nom_prenom">
</div>

<div class="form-group">
<label for="email">E-mail</label>
<input type="text" name="email" class="form-control input-sm" id="email">
</div>

<div class="form-group">
<label for="tel">Numéro de téléphone</label>
<input type="text" name="tel" class="form-control input-sm" id="tel">
</div>
<div class="form-group">
<label for="adresse">Adresse de livraison</label>
<input type="text" name="adresse" class="form-control input-sm" id="adresse">
</div>
    
    <input type="submit" value="&nbsp;Valider&nbsp;" class="btn btn-success btn-cons"/>
</div>
    <div class="col-md-6">
      <div class="form-group">
        <h4>Information des commandes</h4>
        <label for="ref">Réf Reservation</label>
        <input type="text" name="ref_commande" class="form-control input-sm" />
      </div>
    <div class="form-group">
        <h4>Choisissez les services</h4>
<div class="row">
    <div class="col-md-5">
    <label for="service">Liste des services</label>
<select name="list_service[]" id="multiselect1" class="form-control" multiple="multiple" size="8">
    <?php
    $service = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_service WHERE etat = 1 ORDER BY id");
    while($liste_service = $service->fetch_assoc()){
        $categorie = new Categorie();
        $categorie->getFromDB($liste_service['id_categorie']);
        echo '<option value="'.$liste_service['titreFr'].'">'.$liste_service['titreFr'].'</option>' ;
        
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
        <select name="to_service[]" id="multiselect1_to" class="form-control" size="8" multiple="multiple">
            <?php 
            if($_GET['id']!=0){
                
                 $results = unserialize($pack->getId_service());
                foreach($results as $key => $val){
                    echo '<option value="'.$val.'">'.$val.'</option>';
                        
                    }
 
            }
            ?>
        </select>
        
    </div>
</div>

</div> 


<div class="form-group">
        <h4>Choisissez les options</h4>
<div class="row">
    <div class="col-md-5">
    <label for="service">Liste des options</label>
<select name="list_option_service[]" id="multiselect2" class="form-control" multiple="multiple" size="8">
    <?php
    $service = $conn->query("SELECT * FROM ".$_SESSION['pfx']."_option_service WHERE etat = 1 ORDER BY id");
    while($liste_service = $service->fetch_assoc()){
       echo '<option value="'.$liste_service['titreFr'].'">'.$liste_service['titreFr'].'</option>' ;
        
    }
    ?>
  
</select>
    </div>
    <div class="col-md-2" style="padding-top: 23px;">
        <label></label>
         <button type="button" id="multiselect2_rightAll" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-forward"></i></button>
        <button type="button" id="multiselect2_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
        <button type="button" id="multiselect2_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
        <button type="button" id="multiselect2_leftAll" class="btn btn-block  btn-warning"><i class="glyphicon glyphicon-backward"></i></button>
    </div>
    <div class="col-md-5">
        <label for="service">Liste sélectionner</label>
        <select name="to_option_service[]" id="multiselect2_to" class="form-control" size="8" multiple="multiple">
            <?php 
            if($_GET['id']!=0){
                
                 $results_option = unserialize($pack->getId_option_service());
                foreach($results_option as $key => $vals){
                    echo '<option value="'.$vals.'">'.$vals.'</option>';
                        
                    }
 
            }
            ?>
        </select>
        
    </div>
</div>

</div> 
    
    
    

</div>

</div>

</div>
    <div class="tab-pane active" id="en">

<div class="row column-seperation">

<div class="col-md-6">
</div>
</div>
    </div>
    
    <div class="tab-pane active" id="es">

<div class="row column-seperation">

<div class="col-md-6">
</div>
</div>
    </div>






</div>
 </form>  
</div>

       

    </div>

</div>

</div>




<?php }
else {
$service = new Reservation();
$service->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminReservation" class="active">Gestion des réservation</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminReservation"><i class="icon-custom-left"></i></a>

<h3>Module - <span class="semi-bold">Réservation</span></h3>

</div>

    <div class="row">

       

      <div class="col-md-12">
<div class="grid simple">
<div class="grid-body no-border invoice-body">
<br>
<div class="pull-left"> <h3>TAP4GLAM</h3>
<address>
<strong>hello@tap4glam.com</strong><br>
Avenue du Japon - Immeuble Nozha<br />Bloc Amira - 4ème étage.<br /> Montplaisir. Tunisie<br>
<abbr title="Phone">T:</abbr> +216 71 901 107
</address>
</div>
<div class="pull-right">
<h2>Réservation</h2>
</div>
<div class="clearfix"></div>
<br>
<br>
<br>
<div class="row">
<div class="col-md-9">
<h4 class="semi-bold">Client</h4>
<address>
<strong>Dridi Hatem</strong><br>
Adresse de livraison : <br />
Tunis
<abbr title="Phone">P:</abbr> 00216 56 301 096
</address>
</div>
<div class="col-md-3">
<br>
<div>
<div class="pull-left"> Réservation N° : </div>
<div class="pull-right"> 000985 </div>
<div class="clearfix"></div>
</div>
<div>
<div class="pull-left"> Date de réservation : </div>
<div class="pull-right"> 26/12/18 </div>
<div class="clearfix"></div>
</div>
<br>
<div class="well well-small green" style="    background-color: #bf9a58;">
<div class="pull-left"> Total Due : </div>
<div class="pull-right"> 94,000 Dt </div>
<div class="clearfix"></div>
</div>
</div>
</div>
<table class="table">
<thead>
<tr>
<th style="width:200px" class="unseen text-center">Total des personnes</th>
<th class="text-left">Services</th>
<th style="width:140px" class="text-right">Prix</th>
<th style="width:90px" class="text-right">TOTAL</th>
</tr>
</thead>
<tbody>
<tr>
<td class="unseen text-center">1</td>
<td>Coiffure - Brushing</td>
<td class="text-right">50.00</td>
<td class="text-right">50.00</td>
</tr>
<tr>
<td class="unseen text-center">2</td>
<td>Maquillage</td>
<td class="text-right">34.00</td>
<td class="text-right">34.00</td>
</tr>
<tr>
<td colspan="2" rowspan="4">
<h4 class="semi-bold">Les options de services</h4>
<table>
  <thead>
  <th>Qté</th>
  <th>Option</th>
  <th>Prix</th>
</thead>
<tbody>
  <td>1</td>
  <td>Capsule Kératine</td>
  <td>10</td>
</tbody>
</table>

<h5 class="text-right semi-bold"></h5></td>
<td class="text-right"><strong>Sous-total</strong></td>
<td class="text-right">94.00 Dt</td>
</tr>
<tr>
<td class="text-right no-border"><strong>Free de livraison</strong></td>
<td class="text-right">0.00 Dt</td>
</tr>
<tr>
<td class="text-right no-border"><strong>TVA</strong></td>
<td class="text-right">0.00 Dt</td>
</tr>
<tr>
<td class="text-right no-border">
<div class="well well-small green"><strong>Total</strong></div>
</td>
<td class="text-right"><strong>94.00 Dt</strong></td>
</tr>
</tbody>
</table>
<br>
<br>
<h5 class="text-right text-black">Signature Tap4glam</h5>
<h5 class="text-right semi-bold text-black"></h5>
<br>
<br>
</div>
</div>
</div>        
</div>
</div>
</div>
<?php } ?>