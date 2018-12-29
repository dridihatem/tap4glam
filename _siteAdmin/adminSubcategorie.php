 <h4 class="page-title">Gestion des Sous cat&eacute;gories</h4>
 <?php require("msg.php");?>
 <div class="block-area">
  <form action="index.php?pg=formSubcategorie&id=0" method="post" enctype="multipart/form-data" name="frm_module">
  <input type="submit" value="Ajouter un nouvelle sous cat&eacute;gorie"  class="btn m-r-5"/>
</form>
<br />
 <div class="table-responsive overflow">
                        <table class="table table-bordered table-hover tile" id="data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Image</th>
                                    <th>Cat&eacute;gorie</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
$rst1 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_sous_categorie  order by id DESC"));

$nb_lignes = mysql_num_rows($rst1);
if ($nb_lignes>0){
  $i=0;

  while($row=mysql_fetch_object($rst1)){

    $i++;
?>
<tr>
<td><?php echo $i;?></td>

<td><a href="index.php?pg=formSubcategorie&amp;id=<?php echo $row->id;?>" title="Modifier">
          <?php  echo stripslashes($row->titreFr);?>
        </a></td>
<td align=center>
<?php
$image_principale =$row->image;
if(isset($image_principale) && !empty($image_principale) && file_exists('../images/ressources/'.$image_principale.'')){
  echo  '<img src="../images/ressources/'.$image_principale.'" style="height:100px;" class="img-rounded img-shadowed m-b-10"/>';
}
else echo NULL;
?>

   </td>
     <td>
<?php
$cate = mysql_fetch_object(mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_categorie WHERE id=".$row->id_categorie."")));
echo $cate->titreFr; ?>
   </td>

<td><a href="index.php?pg=formSubcategorie&id=<?php echo $row->id;?>" title="Modifier"><img src="img/icon/Edit-icon.png" alt="Modifier" border="0" title="Modifier"/></a>&nbsp;<a href="controller/sub_categorie_save.php?idMod=<?php echo $row->id;?>&op=3" class="confirmation" title="Supprimer"><img src="img/icon/delete.png" alt="Supprimer" border="0" title="Supprimer" /></a></td>
</tr>
<?php } }?>
                            </tbody>
                        </table>
                    </div>
</div>
