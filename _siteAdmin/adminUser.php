 <h4 class="page-title">Gestion des Utilisateurs</h4>
 <?php require("msg.php");?>
 <div class="block-area">
  <form action="index.php?pg=formUser&id=0" method="post" enctype="multipart/form-data" name="frm_module">
  <input type="submit" value="Ajouter un nouvelle utilisateur"  class="btn m-r-5"/>
</form>
<br />
 <div class="table-responsive overflow">
                        <table class="table table-bordered table-hover tile" id="data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Username</th>
                                    <th>Poste</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
$rst1 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_administrator  order by id DESC"));

$nb_lignes = mysql_num_rows($rst1);
if ($nb_lignes>0){
  $i=0;
  
  while($row=mysql_fetch_object($rst1)){  
  
    $i++;
?>
<tr>
<td><?php echo $i;?></td>

<td><a href="index.php?pg=formUser&amp;id=<?php echo $row->id;?>" title="Modifier">
          <?php  echo stripslashes($row->login);?>
        </a></td>
<td> 
    <?php
if($row->type == 1){echo 'Super Admin';}
else if($row->type == 2){echo 'Content manager';}
else if($row->type == 3){echo 'Sales Manager';}
?>
  </td>
<td><a href="index.php?pg=formUser&id=<?php echo $row->id;?>" title="Modifier"><img src="img/icon/Edit-icon.png" alt="Modifier" border="0" title="Modifier"/></a>&nbsp;<a href="controller/user_save.php?idMod=<?php echo $row->id;?>&op=3" class="confirmation" title="Supprimer"><img src="img/icon/delete.png" alt="Supprimer" border="0" title="Supprimer" /></a></td>
</tr>
<?php } }?>
                            </tbody>
                        </table>
                    </div>
</div>
