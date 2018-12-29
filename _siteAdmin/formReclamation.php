<?php 
				$reclamation = new Reclamation();
				$reclamation->getFromDB($_GET["id"]);
				$reclamation->setLu(true);
				$reclamation->updateToDB();

$membre = mysql_fetch_object(mysql_query("SELECT * FROM ".$_SESSION['pfx']."_revendeur WHERE id=".$reclamation->getId_membre().""));


				
?>
<h4 class="page-title b-0">Reclamation</h4>
                
                <div class="listview list-click">
                    

<h2 class="page-title">Repondre a  : <a href="mailto:<?php echo stripslashes($membre->email); ?>"><?php echo stripslashes($membre->email); ?></a></h2>
 <h4  class="page-title">Sujet de message : <?php echo stripslashes($reclamation->getSujet()); ?></h4>
 <h4 class="page-title">Tel : <a href="tel:<?php echo $membre->mobile; ?>"><?php echo stripslashes($membre->mobile); ?></a></h4>
                    <div class="media message-header o-visible">
                        <img src="img/icon/form.png" alt="" class="pull-left">
                        
                        <div class="media-body">
                            <span class="f-bold pull-left m-b-5"><?php echo stripslashes($membre->nom).' '.stripslashes($membre->prenom); ?></span> 

                            <div class="clearfix"></div>

                            <span class="dropdown m-t-5">
                                To <a href="#" class="underline">Me</a> on <?php echo datefr($reclamation->getDate_insertion()); ?>
                            </span>
                            <br>
                             <span class="dropdown m-t-5">
                               <a href="#" class="underline">Sujet</a>  <?php echo stripslashes($reclamation->getSujet()); ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-15">
                        <?php echo stripslashes($reclamation->getMessage()); ?>
                    </div>
                    

</div>








