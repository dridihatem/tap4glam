 <div class="page-content">





<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="#" class="active">Gestion des réservations</a> </li>

</ul>

<div class="page-title"> <i class="icon-custom-left"></i>

<h3>Module - <span class="semi-bold">Gestion des réservations</span></h3>

</div>

<div class="row-fluid">

<div class="span12">

<div class="grid simple ">

<div class="grid-title">

     <?php require("msg.php");?>

<h4>Ajouter <span class="semi-bold">Modifier</span> la réservation</h4>

<div class="tools">

<a href="javascript:;" class="collapse"></a>

<a href="javascript:;" class="reload"></a>

<a href="javascript:;" class="remove"></a>

</div>

</div>

     <div class="col-md-12 text-right p-b-10">

<form action="index.php?pg=formReservation&id=0" method="post" enctype="multipart/form-data" name="frm_module">
  <input type="submit" value="Ajouter une réservation"  class="btn btn-info btn-cons"/>
</form>

        </div>

<div class="grid-body ">
   
    
<table class="table table-striped" id="table">

<thead>

<tr>
<tr>
                      
                                    <th>#</th>

                                    <th>Etat</th>

                                    <th>Ref réservation</th>

                                    <th>Date et heure de réservation</th>

                                    <th>Client</th>
                                    
                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                               <?php 

$rst1 = $conn->query(" select * from ".$_SESSION['pfx']."_reservation  order by date_reservation ASC");



$nb_lignes = $rst1->num_rows;

if ($nb_lignes>0){

  $i=0;

  

  while($row= $rst1->fetch_assoc()){  
    $i++;

?>

<tr>
 <td><?php echo $i;?></td>

<td><?php  if(($row['etat_reservation'])==1){;?>

            <a class="confirmation" href="controller/reservation_save.php?id=<?php echo $row['id'];?>&amp;op=4&amp;pub=0" title="Rendre invisible"><span  style="color:green;">Confirmer</span></a>

            <?php } else {?>

            <a  class="confirmation" href="controller/reservation_save.php?id=<?php echo $row['id'];?>&amp;op=4&amp;pub=1" title="Rendre visible"><span style="color:red;">Annuler</span></a>

            <?php }?></td>

<td><a href="index.php?pg=formReservation&amp;id=<?php echo $row['id'];?>" title="Modifier">

          <?php  echo stripslashes($row['ref_commande']);?>

        </a></td>

        <td>

          <?php 


          echo datefr($row['date_reservation']).' - '.$row['heure_reservation']; ?>



        </td>
        <td><?php
echo stripslashes($row['nom_prenom']);
        ?>
</td>

   

<td><a href="index.php?pg=formReservation&id=<?php echo $row['id'];?>" title="Modifier"><span class="label label-success">Modifier</span></a>&nbsp;<a href="controller/reservation_save.php?idMod=<?php echo $row['id'];?>&op=3"  class="confirmation" title="Supprimer"><span class="label label-important">Supprimer</span></a></td>

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
