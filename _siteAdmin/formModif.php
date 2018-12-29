<h4 class="page-title"><?php if($_GET['id']==0) echo 'Ajouter un nouvelle Utilisateur'; else echo 'Modifier l\'utilisateur';?> </h4>
<?php require("msg.php");?>
<div class="block-area" id="basic">
<?php 
    
        $admin = new Administrator();
        $admin->getFromDB($_GET["id"]);
?>
  
<form action="controller/admin_save.php?op=<?php if($_GET["id"]== 0){echo "1";}else{echo "2";}?>" method="post" enctype="multipart/form-data" name="frm_taille">

<input name="id" type="hidden" id="id" value="<?php if ($_GET["id"]!= 0){echo $_GET['id'];}?>"/>

<div class="tab-container tile">
                        <ul class="nav tab nav-tabs tab-left">
                            <li class="active"><a href="#fr">Fr</a></li>
                           
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="fr">

<div class="form-group">
    <label for="titre">UserName</label>
     <input type="text" style="width:300px;" name="login" class="form-control input-sm" id="titre" placeholder="Username" value="<?php if ($_GET["id"]!= 0) echo $admin->getLogin();?>" />
</div> 
<div class="form-group">
    <label for="titre">Mot de passe</label>
     <input type="password" style="width:300px;" name="password" class="form-control input-sm" id="titre" placeholder="Mot de passe" value="<?php if ($_GET["id"]!= 0) echo $admin->getPass();?>" />
</div> 
</div>
<input type="submit" value="&nbsp;&nbsp;&nbsp;Valider&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-sm"/>

                         
                         </div>
                        </div>
</div>
</form>
</div>