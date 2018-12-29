<?php 
				$reclamation = new Sav();
				$reclamation->getFromDB($_GET["id"]);
				$reclamation->setLu(true);
				$reclamation->updateToDB();

$membre = mysql_fetch_object(mysql_query("SELECT * FROM ".$_SESSION['pfx']."_revendeur WHERE id=".$reclamation->getId_membre().""));


				
?>
<h4 class="page-title b-0">Espace SAV</h4>
                
                <div class="listview list-click">
                    
<h2 class="page-title">Repondre a  : <a href="mailto:<?php echo stripslashes($membre->email); ?>"><?php echo stripslashes($membre->email); ?></a></h2>
 <h4  class="page-title">Sujet de message : <?php echo stripslashes($reclamation->getSujet()); ?></h4>
 <h4 class="page-title">Tel : <a href="tel:<?php echo $membre->mobile; ?>"><?php echo stripslashes($membre->mobile); ?></a></h4>
                    <div class="media message-header o-visible">
                        <img src="img/icon/form.png" alt="" class="pull-left">
                        
                        <div class="media-body">
                        <span class="f-bold pull-left m-b-5"   style="font-size: 14px;">Nom de point de vente : <?php echo stripslashes($membre->raison); ?></span> <p>
                            <span class="f-bold pull-left m-b-5"   style="font-size: 14px;"><?php echo stripslashes($membre->nom).' '.stripslashes($membre->prenom); ?></span> 

                            <div class="clearfix"></div>

                            <span class="dropdown m-t-5">
                                To <a href="#" class="underline">Me</a> on <?php echo datefr($reclamation->getDate_insertion()); ?>
                            </span>
                            <p>
                            
                            <p>
                            <span class="dropdown m-t-5" style="font-size: 14px;">
                            Ref : <?php echo stripslashes($reclamation->getRef()); ?>
                            </span>
                            <p>
                            <span class="dropdown m-t-5"  style="font-size: 14px;">
                            Appareil : <?php echo stripslashes($reclamation->getAppareil()); ?>
                            </span>
                            <p>
                            <span class="dropdown m-t-5"  style="font-size: 14px;">
                            Numero de serie : <?php echo stripslashes($reclamation->getSerie()); ?>
                            </span>
                            <p>
                            <span class="dropdown m-t-5"  style="font-size: 14px;">
                            Type de panne : <?php echo stripslashes($reclamation->getPanne()); ?>
                            </span>
                            <p>
                             <span class="dropdown m-t-5"  style="font-size: 14px;">
                             
                            Etat  : <?php
                            if($reclamation->getEtat()==1){
                             echo '<img src="img/23-1.png"  style="width:30px;"/>En attente';
                            }
                            else  if($reclamation->getEtat()==2){
                             echo '<img src="img/23-2.png"  style="width:30px;"/>Pré-confirmation';
                            }
                            else if($reclamation->getEtat()==3){
                             echo '<img src="img/23-3.png"  style="width:30px;"/>En réparation';
                            }
                            else if($reclamation->getEtat()==4){
                             echo '<img src="img/23-4.png"  style="width:30px;"/>En retour</span>';
                            }
                            ?>
                          
                            
                            </span>
                        </div>
                    </div>
                   
                    <div class="p-15" style="font-size: 14px;">
                        Message : <?php echo stripslashes($reclamation->getMessage()); ?>
                    </div>
                    

</div>








