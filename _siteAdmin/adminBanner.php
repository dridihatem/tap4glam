 <h4 class="page-title">Gestion des Banners</h4>
 <?php require("msg.php");?>
 <div class="block-area">
  <form action="index.php?pg=formBanner&id=0" method="post" enctype="multipart/form-data" name="frm_module">
  <input type="submit" value="Ajouter un nouvelle Banniere"  class="btn m-r-5"/>
</form>
<br />
 <div class="table-responsive overflow">
                        <table class="table table-bordered table-hover tile" id="data_table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Etat</th>
                                    <th>Ordre</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
$rst1 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_banner  order by id DESC"));

  $i=0;
  
  while($row=mysql_fetch_object($rst1)){  
  
    $i++;
?>
<tr>
<td><?php echo $i;?></td>
<td><?php  if(($row->publication)==1){;?>
            <a  class="confirmation"  href="controller/banner_save.php?id=<?php echo $row->id;?>&amp;op=4&amp;pub=0" title="Rendre invisible"><img src="images/icons/lightbulbo_16.png" width="13" height="16" alt="Oui" /></a>
            <?php } else {?>
            <a  class="confirmation" href="controller/banner_save.php?id=<?php echo $row->id;?>&amp;op=4&amp;pub=1" title="Rendre visible"><img src="images/icons/-lightbulb_no_16.png" width="13" height="16" alt="Non" /></a>
            <?php }?></td>
<td>
<?php 
echo '<a href="index.php?pg=formBanner&id='.$row->id.'" title="Modifier">'.stripslashes($row->ordre).'</a>';
?>
</td>
<td align="center"> 
<?php 
$image_principale =$row->image;
if(isset($image_principale) && !empty($image_principale) && file_exists('../images/ressources/'.$image_principale.'')){
  echo  '<img src="../images/ressources/'.$image_principale.'" style="height:100px;"  class="img-rounded img-shadowed m-b-10"/>';
}
else echo NULL;
?>
 
   </td>
   
<td><a href="index.php?pg=formBanner&id=<?php echo $row->id;?>" title="Modifier"><img src="img/icon/Edit-icon.png" alt="Modifier" border="0" title="Modifier"/></a>&nbsp;<a href="controller/banner_save.php?idMod=<?php echo $row->id;?>&op=3" class="confirmation" title="Supprimer"><img src="img/icon/delete.png" alt="Supprimer" border="0" title="Supprimer" /></a></td>
</tr>

<?php } ?>
                            </tbody>
                        </table>
                    </div>
</div>
