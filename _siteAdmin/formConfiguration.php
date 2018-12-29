<h4 class="page-title">Configuration</h4>
<?php require("msg.php");?>
<div class="block-area" id="basic">
<?php 
    
       $sponsor = new Configuration();
       $sponsor->getFromDB(1);
?>
  
<form action="controller/configuration_save.php?op=2" method="post" enctype="multipart/form-data" name="frm_modules">
<input name="id" type="hidden" id="id" value="1"/>
<div class="tab-container tile">
                        <ul class="nav tab nav-tabs tab-left">
                            <li class="active"><a href="#fr">Fr</a></li>
                            
                        </ul>
                        <div class="tab-content">
                          <div class="tab-pane active" id="fr">

                            <div class="form-group">
                              <label for="email">Email</label>

                               <input type="text" name="email" class="form-control input-sm" id="lien" placeholder="E-mail" value="<?php echo $sponsor->getEmail();?>" />
                          </div> 
                          <div class="form-group">
                              <label for="lien">Facebook</label>

                               <input type="text" name="facebook" class="form-control input-sm" id="lien" placeholder="Page Facebook" value="<?php echo $sponsor->getFacebook();?>" />
                          </div> 
                          <div class="form-group">
                              <label for="gplus">Gplus</label>

                               <input type="text" name="gplus" class="form-control input-sm" id="gplus" placeholder="Google plus" value="<?php echo $sponsor->getGplus();?>" />
                          </div> 
                           <div class="form-group">
                              <label for="twitter">Twitter</label>

                               <input type="text" name="twitter" class="form-control input-sm" id="twitter" placeholder="Twitter" value="<?php echo $sponsor->getTwitter();?>" />
                          </div> 
                           <div class="form-group">
                              <label for="coordonnee">Nos coordonnées</label>
                              <textarea id="coordonnee" name="coordonne" class="wysiwye-editor"><?php echo $sponsor->getCoordonne();?></textarea>
                              
                          </div> 



<div class="form-group">
 <div class="row m-container">
         <div class="col-md-7">
              


        <input type="submit" value="&nbsp;&nbsp;&nbsp;Valider&nbsp;&nbsp;&nbsp;" class="btn btn-gr-gray btn-sm"/>
        </div>
    </div>
</div>
</div>
 


 
</form> 
</div>






