 <h4 class="page-title">Gestion des Commandes </h4>
 <?php require("msg.php");?>
 <div class="block-area">
 
<br />
 <div class="table-responsive overflow">
                        <table class="table table-bordered table-hover tile" id="data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code commande</th>
                                    <th>Nom de client</th>
                                    <th>Date de commande</th>
                                    <th>Montant</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
$rst1 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_commande_produit  order by date_insertion DESC"));


$nb_lignes = mysql_num_rows($rst1);
if ($nb_lignes>0){
  $i=0;
  
  while($row=mysql_fetch_object($rst1)){  
$membre = new Revendeur();
$membre->getFromDB($row->idClient);
    $i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><a href="../detailFactureConfirmFr.php?id=<?php echo $row->id;?>" title="Consulter" target="_blank"><?php echo $row->idcommande; ?></a></td>
<td><a href="../detailFactureConfirmFr.php?id=<?php echo $row->id;?>" title="Consulter" target="_blank">
          <?php  echo stripslashes($membre->getNom()).' '.stripslashes($membre->getPrenom());?>
        </a></td>

        <td>
          <?php  echo datefr($row->date_insertion);?>
       </td>
      


<td><?php echo number_format($row->montant,3,","," "); ?></td>
<td><a href="controller/commande_save.php?idMod=<?php echo $row->id;?>&op=3" class="confirmation" title="Supprimer"><img src="img/icon/delete.png" alt="Supprimer" border="0" title="Supprimer" /></a></td>

</tr>
<?php }}?>
                            </tbody>
                        </table>
                    </div>
</div>
