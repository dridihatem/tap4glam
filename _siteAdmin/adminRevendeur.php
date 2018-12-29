 <h4 class="page-title">Gestion des Revendeurs </h4>
 <?php require("msg.php");?>
 <div class="block-area">
  <form action="index.php?pg=formRevendeur&id=0" method="post" enctype="multipart/form-data" name="frm_module">
  <input type="submit" value="Ajouter un nouvelle revendeur"  class="btn m-r-5"/>
</form>
<br />
 <div class="table-responsive overflow">
                        <table class="table table-bordered table-hover tile" id="data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Etat</th>
                                    <th>Raison sociale</th>
                                    <th>Nom de revendeur</th>
                                    <th>Date Inscription</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
$rst1 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_revendeur  order by date_inscription DESC"));

$nb_lignes = mysql_num_rows($rst1);
if ($nb_lignes>0){
  $i=0;
  
  while($row=mysql_fetch_object($rst1)){  
  
    $i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php  if(($row->etat)==1){;?>
            <a href="controller/revendeur_save.php?id=<?php echo $row->id;?>&amp;op=4&amp;pub=0" title="Rendre invisible"><img src="images/icons/lightbulbo_16.png" width="13" height="16" alt="Oui" /></a>
            <?php } else {?>
            <a href="controller/revendeur_save.php?id=<?php echo $row->id;?>&amp;op=4&amp;pub=1" title="Rendre visible"><img src="images/icons/-lightbulb_no_16.png" width="13" height="16" alt="Non" /></a>
            <?php }?></td>
            <td><a href="index.php?pg=formRevendeur&amp;id=<?php echo $row->id;?>" title="Modifier">
          <?php  echo stripslashes($row->raison);?>
        </a></td>
<td><a href="index.php?pg=formRevendeur&amp;id=<?php echo $row->id;?>" title="Modifier">
          <?php  echo stripslashes($row->nom).' '.stripslashes($row->prenom);?>
        </a></td>
        <td>
          <?php  echo datefr($row->date_inscription);?>
    </td>

<td><a href="index.php?pg=formRevendeur&id=<?php echo $row->id;?>" title="Modifier"><img src="img/icon/Edit-icon.png" alt="Modifier" border="0" title="Modifier"/></a>&nbsp;<a href="controller/revendeur_save.php?idMod=<?php echo $row->id;?>&op=3" class="confirmation" title="Supprimer"><img src="img/icon/delete.png" alt="Supprimer" border="0" title="Supprimer" /></a></td>
</tr>
<?php } }?>
                            </tbody>
                        </table>
                    </div>
</div>
