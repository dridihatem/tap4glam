 <div class="page-content">





<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="#" class="active">Gestion des codes de promotion</a> </li>

</ul>

<div class="page-title"> <i class="icon-custom-left"></i>

<h3>Module - <span class="semi-bold">Gestion des codes de promotion</span></h3>

</div>

<div class="row-fluid">

<div class="span12">

<div class="grid simple ">

<div class="grid-title">

     <?php require("msg.php");?>

<h4>Ajouter <span class="semi-bold">Modifier</span> le code</h4>

<div class="tools">

<a href="javascript:;" class="collapse"></a>

<a href="javascript:;" class="reload"></a>

<a href="javascript:;" class="remove"></a>

</div>

</div>

     <div class="col-md-12 text-right p-b-10">

            <form action="index.php?pg=formCodePromo&id=0" method="post" enctype="multipart/form-data" name="frm_module">

  <input type="submit" value="Ajouter un nouveau code"  class="btn btn-info btn-cons"/>

</form>

            

        </div>

<div class="grid-body ">

 <!--<form action="index.php?pg=formModule&id=0" method="post" enctype="multipart/form-data" name="frm_module">

  <input type="submit" value="Ajouter un nouveau module"  class="btn btn-primary"/>

</form>-->

 

<table class="table table-striped" id="table">

<thead>

<tr>



                                <tr>

                                    <th>#</th>

                                    <th>Etat</th>

                                    <th>Code Promos</th>

                                    <th>Valeur</th>

                                    <th>Date Début</th>

                                    <th>Date Fin</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                               <?php 

$rst1 = $conn->query(" select * from ".$_SESSION['pfx']."_code_promo  order by date_echeance ASC");



$nb_lignes = $rst1->num_rows;

if ($nb_lignes>0){

  $i=0;

  

  while($row= mysqli_fetch_assoc($rst1)){  

  

    $i++;

?>

<tr>

<td><?php echo $i;?></td>

<td><?php  if(($row['etat'])==1){;?>

            <a class="confirmation" href="controller/code_promo_save.php?id=<?php echo $row['id'];?>&amp;op=4&amp;pub=0" title="Rendre invisible"><i class="fa fa-check"  style="color:green;"></i></a>

            <?php } else {?>

            <a  class="confirmation" href="controller/code_promo_save.php?id=<?php echo $row['id'];?>&amp;op=4&amp;pub=1" title="Rendre visible"><i class="fa fa-check" style="color:red;"></i></a>

            <?php }?></td>

<td><a href="index.php?pg=formCodePromo&amp;id=<?php echo $row['id'];?>" title="Modifier">

          <?php  echo stripslashes($row['code']);?>

        </a></td>
        <td><a href="index.php?pg=formCodePromo&amp;id=<?php echo $row['id'];?>" title="Modifier">

          <?php  echo stripslashes($row['valeur']);?>

        </a> %</td>

        
        <td>
            <?php 
            if($row['date_depart'] > date("Y-m-d")){echo '<span class="badge badge-success">'.datefr($row['date_depart']).'</span>';}
            else if($row['date_depart'] < date("Y-m-d")){echo '<span class="badge badge-danger">'.datefr($row['date_depart']).'</span>';}
            else if($row['date_depart'] == date("Y-m-d")){echo '<span class="badge badge-warning">'.datefr($row['date_depart']).'</span>';}
            ?>
        </td>
        
        <td>
            <?php 
            if($row['date_echeance'] > date("Y-m-d")){echo '<span class="badge badge-success">'.datefr($row['date_echeance']).'</span>';}
            else if($row['date_echeance'] < date("Y-m-d")){echo '<span class="badge badge-danger">'.datefr($row['date_echeance']).'</span>';}
            else if($row['date_echeance'] == date("Y-m-d")){echo '<span class="badge badge-warning">'.datefr($row['date_echeance']).'</span>';}
            ?>
        </td>
         
   
<td><a href="index.php?pg=formCodePromo&id=<?php echo $row['id'];?>" title="Modifier"><span class="label label-success">Modifier</span></a>&nbsp;<a href="controller/code_promo_save.php?idMod=<?php echo $row['id'];?>&op=3"  class="confirmation" title="Supprimer"><span class="label label-important">Supprimer</span></a></td>

</tr>



<?php } }?>

                            </tbody>

                        </table>

                    </div>

</div>

</div>

</div>

</div>

</div>