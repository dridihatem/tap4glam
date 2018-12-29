<?php 
				$contact = new Contact();
				$contact->getFromDB($_GET["id"]);
				$contact->setLu(true);
				$contact->updateToDB();
				
?>
<h4 class="page-title b-0">Messages</h4>
                
                <div class="listview list-click">
                    

<h2 class="page-title">Email : <a href="mailto:<?php echo stripslashes($contact->getEmail()); ?>"><?php echo stripslashes($contact->getEmail()); ?></a> </h2>
 <h4  class="page-title">Sujet de message : <?php echo stripslashes($contact->getSujet()); ?></h4>

                    <div class="media message-header o-visible">
                        <img src="img/icon/message@2x.png" alt="" class="pull-left" width="40">
                        
                        <div class="media-body">

                            <span class="f-bold pull-left m-b-5"><?php echo stripslashes($contact->getNom_prenom()); ?></span>
                            <div class="clearfix"></div>
                            <span class="f-bold pull-left m-b-5">Société : <?php echo stripslashes($contact->getSociete()); ?></span>
                            <div class="clearfix"></div>
                            <span class="dropdown m-t-5">
                                To <a href="#" class="underline">Me</a> on <?php echo datefr($contact->getDate_insertion()); ?>
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-15">
                        <?php echo stripslashes($contact->getMessage()); ?>
                    </div>
                    

</div>








