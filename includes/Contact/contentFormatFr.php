

					 <?php

                                         if(isset($_POST['submit'])){

$result = "";



    $contact = new Contact();

    $contact->setContact(NULL,$_POST["nom_prenom"],$_POST["email"],$_POST['tel'],$_POST['sujet'],$_POST["message"],date("Y-m-d H:i:s"),0);

      if($contact->saveToDB()){



            $headers ='From:  '.$_POST['nom_prenom'].'<'.$_POST['email'].'>'."\n"; 

            $headers  .= 'MIME-Version: 1.0' . "\r\n";

            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

            $headers .= "X-Priority: 1 (Higuest)\n"; 

            $headers .= "X-MSMail-Priority: High\n"; 

            $headers .= "Importance: High\n"; 

            $body = '

            <p><img src="http://www.tap4glam.tn/assets/img/logo/logo_tap4glam.png" /><br>

            </p>

            <p><b>Nom et prénom </b> :'.$_POST['nom_prenom'].'</p>

           <p><b>E-mail </b> :<a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a></p>

           <p><b>Téléphone </b> : '.$_POST['tel'].'</p>

            <p><b>Sujet de Message </b> : '.$_POST['sujet'].'</p>

            <p><b>Message  </b> : '.$_POST['message'].'</p>

            <p>

            ';

            @mail("hello@tap4glam.com",'Contact Tap4Glam',$body,$headers);



       $result ='<div class="alert alert-success">

  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

<strong>Merci </strong>Message envoy&eacute; avec succ&eacute;s!</div>';}

      else{$result = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

  <strong>Danger!</strong> erreur SQL

</div>';}

    

                                         }





?>
<!--contact area start-->
            <div class="contact_area">
                <div class="container">   
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                           <div class="contact_message content">
                                <h3>Contactez nous</h3>    
                                 <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human. qui sequitur mutationem consuetudium lectorum. Mirum est notare quam</p>
                                <ul>
                                    <li><i class="fa fa-fax"></i>  Adresse : Avenue du Japon - Immeuble Nozha - Bloc Amira - 4ème étage. Montplaisir. Tunisie.</li>
                                    <li><i class="fa fa-phone"></i> <a href="#">+216 71 902 953</a></li>
                                    <li><i class="fa fa-envelope-o"></i> hello@tap4glam.com</li>
                                </ul>             
                            </div> 
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3193.972955260624!2d10.188588314768623!3d36.819167979944666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd348b3ae425bb%3A0xd45cd857f4b0ca07!2sHELIOS+Immobili%C3%A8re+81!5e0!3m2!1sfr!2stn!4v1545958619630" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                        <div class="col-lg-6 col-md-12">
                           <div class="contact_message form">
                                <h3>Raconte nous ton projet</h3>   
                                <form id="contact-form" method="POST"  action="#">
                                    <p>  
                                       <label> Nom et prénom (obligatoire)</label>
                                        <input name="nom_prenom" placeholder="Nom *" type="text" required=""> 
                                    </p>
                                    <p>       
                                       <label>  Votre E-mail (obligatoire)</label>
                                        <input name="email" placeholder="Email *" type="email" required="">
                                    </p>
                                    <p>          
                                       <label>  Numéro de téléphone (obligatoire)</label>
                                        <input name="tel" placeholder="(+216) ** *** *** *" type="text" required="">
                                    </p> 
                                    <p>          
                                       <label>  Sujet (obligatoire)</label>
                                        <input name="sujet" placeholder="Sujet *" type="text" required="">
                                    </p>    
                                    <div class="contact_textarea">
                                        <label>  Votre message</label>
                                        <textarea placeholder="Message *" name="message"  class="form-control2" ></textarea>     
                                    </div>   
                                    <button type="submit" name="submit"> Envoyer</button>  
                                    <p class="form-messege"><?php echo $result; ?></p>
                                </form> 
                                   
                            </div> 
                        </div>
                    </div>
                </div>    
            </div>

            