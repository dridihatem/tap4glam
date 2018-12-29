<?php 
$code = new Code_vip();
$code->getFromDB($_GET["id"]);
?>

<div class="page-content">

<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="index.php?pg=adminCodeVip" class="active">Gestion des codes VIP</a> </li>

</ul>

    <div class="page-title"> <a href="index.php?pg=adminCodeVip"><i class="icon-custom-left"></i></a>

<h3>Contenu - <span class="semi-bold">Modifier / Ajouter un code VIP</span></h3>

</div>

    <div class="row">

       

      <div class="col-md-12">

          <?php require("msg.php");?>

<ul class="nav nav-tabs" role="tablist">

<li class="active">

    <a href="#fr" role="tab" data-toggle="tab"><img src="images/fr.png" style="width:17px;"/> Français</a>

</li>



</ul>

<form action="controller/code_vip_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_modules">



<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>
<input name="date_echeance" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $code->getDate_echeance();}?>"/>
<input name="etat" type="hidden" id="image" value="<?php if ($_GET["id"]!= 0){echo $code->getEtat();}?>"/>

<div class="tab-content">

<div class="tab-pane active" id="fr">

<div class="row column-seperation">

<div class="col-md-6">
                   



<div class="form-group">

    <label for="nom">Code VIP</label>

     <input type="text" name="code" class="form-control input-sm" id="nom" required placeholder="" value="<?php if ($_GET["id"]!= 0) echo $code->getCode();?>" />

</div> 
  

<div class="form-group">

<label for="contenu">Date d'écheance</label>
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



