h2><img src="images/icons/images.png" alt="GALERIE" width="32" height="32" /> Gestion des galeries</h2>
<?php require("msg.php");?>

<div class="content-box">
<div class="content-box-content">
<form action="index.php?pg=formGalerie&id=0" method="post" enctype="multipart/form-data" name="frm_galerie">
  <input type="submit" value="Ajouter un nouveau galerie" />
</form>
</div>
</div>
<div class="content-box">
<div class="content-box-content">
  <table width="100%" class="pagination" rel="15">
    <thead>
      <thead>
      <tr>
        <th>N</th>
        <th><div align="left">Id</div></th>
        <th><div align="left">ordre</div></th>
        <th><div align="left">Photo</div></th>
        <th><div align="center"></div></th>
        <th><div align="left">menuParent</div></th>
        
      
        <th align="center"><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;Actions&nbsp;&nbsp;&nbsp;&nbsp;</div></th>
	  </thead>
							<tfoot>
								<tr>
									<td colspan="7">		
										<div class="bulk-actions"></div>									</td>
								</tr>
							</tfoot>
<tbody>
 <?php 
$rst1 = mysql_query(sprintf("SELECT * FROM ".$_SESSION['pfx']."_galerie ORDER BY date_inscription DESC"));
$nb_lignes = mysql_num_rows($rst1);
if ($nb_lignes>0){
	$i=0;
	while($row=mysql_fetch_object($rst1)){	
		$i++;
?>		<tr>
        <td width="2%"><?php echo $i;?></td>
        <td><div align="left">
            <?php  if(($row->publish)==1){;?>
            <a href="controller/galerie_save.php?id=<?php echo $row->id;?>&amp;op=4&amp;pub=0" title="Rendre invisible"><img src="images/icons/lightbulbo_16.png" width="13" height="16" alt="Oui" /></a>
            <?php } else {?>
            <a href="controller/galerie_save.php?id=<?php echo $row->id;?>&amp;op=4&amp;pub=1" title="Rendre visible"><img src="images/icons/-lightbulb_no_16.png" width="13" height="16" alt="Non" /></a>
            <?php }?>
            </div></td>
        <td><div align="left"><img src="../images/ressources/<?php echo $row->image; ?>"  width="50px" height="50px"/></div></td>
        <td><div align="center"><a href="index.php?pg=formGalerie&amp;id=<?php echo $row->id;?>" title="Modifier">
          <?php  echo stripslashes($row->id);?>
        </a></div></td>
        
        
        
         
        <td align="center"><div align="center"><a href="index.php?pg=formGalerie&id=<?php echo $row->id;?>" title="Modifier"><img src="images/icons/icon_edit.png" alt="Modifier" border="0" title="Modifier"/></a>&nbsp;<a href="controller/galerie_save.php?idMod=<?php echo $row->id;?>&op=3" class="confirmation" title="Supprimer"><img src="images/icons/cross.png" alt="Supprimer" border="0" title="Supprimer" /></a>
        </div></td>
      </tr>
<?php }}else{?>
		<tr>
			<td colspan="7"><div align="center">Aucun enregistrement trouv&eacute; !!<br />
<img src="images/icons/ajouter.png" alt="Ajouter" width="14" height="14" title="Ajouter"/><a href="index.php?pg=formGalerie&id=0" title="Ajouter"> Ajouter un nouveau</a></div></td>
		</tr>
<?php }?>	  
    </tbody>
  </table>
</div>
</div>
