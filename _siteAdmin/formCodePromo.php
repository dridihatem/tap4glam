<?php 
$code = new Code_promo();
$code->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminCodePromo" class="active">Gestion des codes promo</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminCodePromo"><i class="icon-custom-left"></i></a>

<h3>Contenu - <span class="semi-bold">Modifier / Ajouter un code</span></h3>

</div>

    <div class="row">

       

      <div class="col-md-12">

          <?php require("msg.php");?>

<ul class="nav nav-tabs" role="tablist">

<li class="active">

    <a href="#fr" role="tab" data-toggle="tab"><img src="images/fr.png" style="width:17px;"/> Français</a>

</li>



</ul>

<form action="controller/code_promo_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">



<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="date_depart" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $code->getDate_depart();}?>"/>
<input name="date_echeance" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $code->getDate_echeance();}?>"/>
<input name="etat" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $code->getEtat();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-6">
                   



<div class="form-group">

    <label for="nom">Bon de réduction</label>

     <input type="text" name="code" class="form-control input-sm" id="nom" required placeholder="" value="<?php if ($_GET["id"]!= 0) echo $code->getCode();?>" />

</div> 
    <div class="form-group">

    <label for="valeur">Valeur en %</label>

    <input type="text" name="valeur" class="form-control input-sm" id="nom"  required placeholder="" value="<?php if ($_GET["id"]!= 0) echo $code->getValeur();?>" />

</div> 


<div class="form-group">

<label for="contenu">Date De</label>
<input type="date" name="date_depart" class="form-control input-sm" id="contenu" required placeholder="" value="<?php if ($_GET["id"]!= 0) echo $code->getDate_depart();?>" />

</div>
<div class="form-group">

<label for="contenu">Date A</label>
<input type="date" name="date_echeance" class="form-control input-sm" id="contenu" required placeholder="" value="<?php if ($_GET["id"]!= 0) echo $code->getDate_echeance();?>" />

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



