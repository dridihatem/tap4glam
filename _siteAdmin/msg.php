<?php 
if(isset($_REQUEST['info'])){
if($_REQUEST['info']=='done')
	{echo '
<div class="alert alert-success">Op&eacute;ration effectu&eacute;e avec succ&egrave;s!</div>';}
elseif($_REQUEST['info']=='err')
	{echo '<div class="alert alert-danger">Op&eacute;ration echou&eacute;e!</div>';}
}
?>
