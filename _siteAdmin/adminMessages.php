 <h4 class="page-title">Gestion des Messages</h4>
 <?php require("msg.php");?>
 <div class="block-area">
  
<br />
 <div class="table-responsive overflow">
                        <table class="table table-bordered table-hover tile" id="data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lu</th>

                                    <th>E-mail</th>
				<th>Sujet</th>
				<th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
$rst1 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_contact order by date_insertion DESC"));

$nb_lignes = mysql_num_rows($rst1);
if ($nb_lignes>0){
  $i=0;
  
  while($row=mysql_fetch_object($rst1)){  
  
    $i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php  if(($row->lu)==1){;?><img src="images/icons/message_information.png" width="16" height="16" alt="message lu" />
<?php } else {?><img src="images/icons/message_delete.png" width="16" height="16" alt="Message non lu" /><?php }?></td>
<td><a href="index.php?pg=formMessages&amp;id=<?php echo $row->id;?>" title="Modifier">
          <?php  echo stripslashes($row->email);?>
        </a></td>
<td><?php  echo extraireTxt(formatedTxt(stripslashes($row->sujet)),100);?></td>

<td><a href="index.php?pg=formMessages&id=<?php echo $row->id;?>" title="Modifier"><img src="img/icon/Edit-icon.png" alt="Modifier" border="0" title="Modifier"/></a>&nbsp;<a href="controller/contact_save.php?idMod=<?php echo $row->id;?>&op=3"   class="confirmation" title="Supprimer"><img src="img/icon/delete.png" alt="Supprimer" border="0" title="Supprimer" /></a></td>
</tr>
<?php } }?>
                            </tbody>
                        </table>
                    </div>
</div>
