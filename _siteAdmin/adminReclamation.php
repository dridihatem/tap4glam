 <h4 class="page-title">Gestion des Reclamations Clients </h4>
 <?php require("msg.php");?>
 <div class="block-area">
 
<br />
 <div class="table-responsive overflow">
                        <table class="table table-bordered table-hover tile" id="data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Etat</th>
                                    <th>Poste</th>
                                    <th>Nom de client</th>
                                    <th>Date de reclamation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
$rst1 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_reclamation  order by date_insertion DESC"));


$nb_lignes = mysql_num_rows($rst1);
if ($nb_lignes>0){
  $i=0;
  
  while($row=mysql_fetch_object($rst1)){  

$membre = mysql_fetch_object(mysql_query("SELECT * FROM ".$_SESSION['pfx']."_revendeur WHERE id=".$row->id_membre.""));

    $i++;
    $poste = $row->poste;
    if($poste == 1){$type="Service Commercial";}
    else if($poste ==2) {$type="Service Technique";}
?>
<tr>
<td><?php echo $i;?></td>
<td><?php  if(($row->lu)==1){;?><img src="images/icons/message_information.png" width="16" height="16" alt="message lu" />
<?php } else {?><img src="images/icons/message_delete.png" width="16" height="16" alt="Message non lu" /><?php }?></td>

    
<td><a href="index.php?pg=formReclamation&amp;id=<?php echo $row->id;?>" title="Modifier">
          <?php  echo $type;?>
        </a></td>
<td><a href="index.php?pg=formReclamation&amp;id=<?php echo $row->id;?>" title="Modifier">
          <?php  echo stripslashes($membre->nom).' '.stripslashes($membre->prenom);?>

        <td>
          <?php  echo datefr($row->date_insertion);?>
       </td>
<td><a href="index.php?pg=formReclamation&id=<?php echo $row->id;?>" title="Modifier"><img src="img/icon/Edit-icon.png" alt="Modifier" border="0" title="Modifier"/></a>&nbsp;<a href="controller/reclamation_save.php?idMod=<?php echo $row->id;?>&op=3" class="confirmation" title="Supprimer"><img src="img/icon/delete.png" alt="Supprimer" border="0" title="Supprimer" /></a></td>
</tr>
<?php }}?>
                            </tbody>
                        </table>
                    </div>
</div>
