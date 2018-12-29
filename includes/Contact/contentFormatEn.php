
					 <?php
                                         if(isset($_POST['submit'])){
$result = "";

    $contact = new Contact();
    $contact->setContact(NULL,$_POST["nom"],$_POST["email"],$_POST['societe'],$_POST['tel'],$_POST['sujet'],$_POST["message"],date("Y-m-d H:i:s"),0);
      if($contact->saveToDB()){

            $headers ='From:  '.$_POST['nom'].'<'.$_POST['email'].'>'."\n"; 
            $headers  .= 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
            $headers .= "X-Priority: 1 (Higuest)\n"; 
            $headers .= "X-MSMail-Priority: High\n"; 
            $headers .= "Importance: High\n"; 
            $body = '
            <p><img src="http://www.wfs.com.tn/images/template/logo.png" /><br>
            </p>
           
           <p><b>Société </b>: '.$_POST['societe'].'</p>
            <p><b>Nom de client </b> :'.$_POST['nom'].'</p>
           <p><b>E-mail </b> :<a href="mailto:'.$_POST['email'].'">'.$_POST['email'].'</a></p>
           <p><b>Téléphone </b> : '.$_POST['email'].'</p>
            <p><b>Sujet de Message </b> : '.$_POST['sujet'].'</p>
            <p><b>Message  </b> : '.$_POST['message'].'</p>
            <p>
            ';
            @mail("contact@wfs.com.tn",'Contact wfs',$body,$headers);

       $result ='<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>Thank you :) </strong>Message sent successfully!</div>';}
      else{$result = '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Danger!</strong> erreur SQL
</div>';}
    
                                         }


?>
                    <div class="col-md-3 text-black">
                        <h5 class="mag-top0px">TUNIS HQ - <span class="scheme">Tunisia</span></h5>
                        <p class="text-black">
                            <strong>MBG Building</strong><br>
                            Industrial Zone, El Kram 2015, Tunis, Tunisia.<br>
                            Tel: +216 71 182 142<br>
                            Fax: +216 71 281 145<br>
                            Email: <a class="scheme" href="mailto:info@wfs.com.tn">info@wfs.com.tn</a>
                        </p>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3 text-black">
                        <h5 class="mag-top0px">CASABLANCA BRANCH - <span class="scheme">MARROCCO</span></h5>
                        <p class="text-black">
                            <strong>Résidencela perle de </strong><br>
                            6-8 Spring St, Marrocco<br>
                            Tel: +012 222 989888<br>
                            Fax: +012 222 989899<br>
                            Email: <a class="scheme" href="mailto:info@yourdomain.com">info@wfs.com.tn</a>
                        </p>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3">
                        <h5 class="mag-top0px">FRANCE - <span class="scheme">PARIS</span></h5>
                        <p class="text-black">
                            <strong>Headquarters (Rome Office)</strong><br>
                            7 Mario Der Rossi, Roma<br>
                            Tel: +012 222 989888<br>
                            Fax: +012 222 989899<br>
                            Email: <a class="scheme" href="mailto:info@yourdomain.com">info@wfs.com.tn</a>
                        </p>
                    </div><!-- /.col-md-3 -->

                    <div class="col-md-3 text-black">
                        <h5 class="mag-top0px">ISTANBUL - <span class="scheme">Turkey</span></h5>
                        <p class="text-black">
                            <strong>Headquarters (Munich Office)</strong><br>
                            Schwanthaler Straße 75a<br>
                            Tel: +012 222 989888<br>
                            Fax: +012 222 989899<br>
                            Email: <a class="scheme" href="mailto:info@yourdomain.com">info@wfs.com.tn</a>
                        </p>
                    </div><!-- /.col-md-3 -->	
                    
                    
        
        <div class="flat-row pad-bottom40px">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="flat-contact-us">
                            <h4 class="flat-title-section style mag-top0px">Opening <span>hours</span></h4>
                            <p>Find out opening hours and information for WFS Transport. Thank you !</p>
                        </div>
                        <div class="flat-divider d20px"></div>
                        <ul class="iconlist">
                            <li><i class="fa fa-clock-o"></i> <strong>Monday:</strong> 08:00 a.m – 06:00 p.m</li>
                            <li><i class="fa fa-clock-o"></i> <strong>Tuesday:</strong> 08:00 a.m – 06:00 p.m</li>
                            <li><i class="fa fa-clock-o"></i> <strong>Wednesday:</strong> 08:00 a.m – 06:00 p.m</li>
                            <li><i class="fa fa-clock-o"></i> <strong>Thursday:</strong> 08:00 a.m – 06:00 p.m</li>
                            <li><i class="fa fa-clock-o"></i> <strong>Friday:</strong> 08:00 a.m – 06:00 p.m</li>
                            <li><i class="fa fa-clock-o"></i> <strong>Saturday – Sunday:</strong> Closed</li>
                        </ul>

                        <div class="flat-divider d20px"></div>
                    </div><!-- /.col-md-4 -->

                    <div class="col-md-8">
                        <p>Please fill out the following form and a representative will contact you.</p>
                        <div class="flat-divider d10px"></div>
                        <form id="contactform" method="post" action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <p><input id="name" name="name" type="text" value="" placeholder="Name" required="required"></p>

                                    <p><input id="email" name="email" type="email" value="" placeholder="Email" required="required"></p>

                                    <p><select class="wpcf7-form-control wpcf7-select"><option value="Transport">Transport</option><option value="Logistics">Logistics</option></select></p>

                                    <p><input id="phone" name="phone" type="text" value="" placeholder="Phone Number" required="required"></p>                                
                                </div><!-- /.col-md-6 -->

                                <div class="col-md-6">
                                    <p><textarea name="message" placeholder="Comment" required="required"></textarea></p>
                                    <span class="form-submit"><input name="submit" type="submit" id="submit" class="submit" value="Sent Mail">
                                    </span>
                                </div><!-- /.col-md-6 -->
                            </div><!-- /.row -->
                        </form>
                    </div><!-- /.col-md-8 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->