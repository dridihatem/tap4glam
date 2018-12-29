 <div class="page-content">





<div class="clearfix"></div>

<div class="content">

<ul class="breadcrumb">

<li>

<p>VOUS ETES ICI</p>

</li>

<li><a href="#" class="active">Gestion des services</a> </li>

</ul>

<div class="page-title"> <i class="icon-custom-left"></i>

<h3>Module - <span class="semi-bold">Gestion des services</span></h3>

</div>

<div class="row-fluid">

<div class="span12">

<div class="grid simple ">

<div class="grid-title">

     <?php require("msg.php");?>

<h4>Ajouter <span class="semi-bold">Modifier</span> le services</h4>

<div class="tools">

<a href="javascript:;" class="collapse"></a>

<a href="javascript:;" class="reload"></a>

<a href="javascript:;" class="remove"></a>

</div>

</div>

     <div class="col-md-12 text-right p-b-10">

<form action="index.php?pg=formServices&id=0" method="post" enctype="multipart/form-data" name="frm_module">
  <input type="submit" value="Ajouter un service"  class="btn btn-info btn-cons"/>
</form>

        </div>

<div class="grid-body ">
   <form action="update_service.php" method="POST" name="" onsubmit="return deleteConfirm();">
    
<table class="table table-striped" id="table">

<thead>

<tr>



                                <tr>
                        <th><input type="checkbox" id="checkAll"  name="check_produit" value="">

                        </th>
                                    <th>#</th>

                                    <th>Etat</th>

                                    <th>Nom service</th>

                                    <th>Catégorie</th>

                                    <th>Préstataire</th>
                                    
                                    <th>Image</th>
                                    
                                    <th>Is VIP</th>
                                    
                                    <th>Prix en Dt</th>

                                    <th>Action</th>

                                </tr>

                            </thead>

                            <tbody>

                               <?php 

$rst1 = $conn->query(" select * from ".$_SESSION['pfx']."_service  order by id ASC");



$nb_lignes = $rst1->num_rows;

if ($nb_lignes>0){

  $i=0;

  

  while($row= $rst1->fetch_assoc()){  
  echo '<input type="hidden" name="prix_default[]" value="'.$row['prix'].'">';
  

    $i++;

?>

<tr>
 <td><input type="checkbox" class="checklist"  name="check_produit[]" value="<?php echo $row['id']; ?>">
 </td>
<td><?php echo $i;?></td>

<td><?php  if(($row['etat'])==1){;?>

            <a class="confirmation" href="controller/service_save.php?id=<?php echo $row['id'];?>&amp;op=4&amp;pub=0" title="Rendre invisible"><i class="fa fa-check"  style="color:green;"></i></a>

            <?php } else {?>

            <a  class="confirmation" href="controller/service_save.php?id=<?php echo $row['id'];?>&amp;op=4&amp;pub=1" title="Rendre visible"><i class="fa fa-check" style="color:red;"></i></a>

            <?php }?></td>

<td><a href="index.php?pg=formServices&amp;id=<?php echo $row['id'];?>" title="Modifier">

          <?php  echo stripslashes($row['titreFr']);?>

        </a></td>

        <td>

          <?php 

          $module_par = mysqli_fetch_array($conn->query("SELECT * FROM ".$_SESSION['pfx']."_categorie WHERE id  = ".$row['id_categorie'].""));

          echo stripslashes($module_par['titreFr']); ?>



        </td>
        <td><?php $prestataire_pars = mysqli_fetch_array($conn->query("SELECT * FROM ".$_SESSION['pfx']."_prestataire WHERE id  = ".$row['id_prestataire'].""));
echo stripslashes($prestataire_pars['nom_prenom']); ?>
</td>
<td >
<?php
$image_principale =$row['image'];

if(isset($image_principale) && !empty($image_principale) && file_exists('../images/ressources/'.$image_principale.'')){

  echo  '<img src="../images/ressources/'.$image_principale.'" style="height:100px;"  class="img-rounded img-shadowed m-b-10"/>';
}
else echo NULL;
?>
   </td>
   <td>
     <?php 
     $isVip = $row['isVip'];
     if($isVip == 1){
      echo "<span class=\"label label-warning\">VIP</span>";
     }
     else {
      echo NULL;
     }
     ?>
   </td>
   <td>
            <?php
            $prix = $row['prix'];
            $prix_promo = $row['prix_promo'];
            if(!empty($prix_promo)){
                echo '<span style="text-decoration: line-through;">'.number_format($prix, 2, ',', ' ').'</span>'.' '.number_format($prix_promo, 2, ',', ' ');
            }
                else {
                echo number_format($row['prix'], 2, ',', ' ');
                }
            ?>
            
        </td>

<td><a href="index.php?pg=formServices&id=<?php echo $row['id'];?>" title="Modifier"><span class="label label-success">Modifier</span></a>&nbsp;<a href="controller/services_save.php?idMod=<?php echo $row['id'];?>&op=3"  class="confirmation" title="Supprimer"><span class="label label-important">Supprimer</span></a></td>

</tr>



<?php } }?>
<input type="number" name="promotion" class="form-control">
<input type="submit" name="delete"   class="btn btn-danger pull-right" value="Appliquer la promotion" />
                            </tbody>

                        </table>
                      </form>

                    </div>

</div>

</div>

</div>

</div>

</div>
