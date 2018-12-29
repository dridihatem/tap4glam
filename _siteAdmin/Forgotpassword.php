
<section id="login">

            <header>
                <h1>IDENTIFIANT</h1>
                <?php
                    if(isset($_POST['username']) && isset($_POST['submit'])){
                        $back = mysql_fetch_array(mysql_query("SELECT * FROM ".$_SESSION['pfx']."_administrator WHERE login LIKE '%".$_POST['username']."%'"));
                        // Plusieurs destinataires
                        $configuration = new Configuration();
                        $configuration->getFromDB(1);
     $to  = $configuration->getEmail();

     // Sujet
     $subject = 'Reinitialisation de mot de passe - Alliance Distribution';

     // message
     $message = '
     <html>
      <head>
       <title>Reinitialisation de mot de passe - Alliance Distribution</title>
      </head>
      <body>
      <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-qffz{font-size:11px;color:#cb0000;vertical-align:top}
.tg .tg-amwm{font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-q19q{font-size:11px;vertical-align:top}
.tg .tg-r8vz{font-weight:bold;font-size:11px;vertical-align:top}
.tg .tg-dx8v{font-size:12px;vertical-align:top}
.tg .tg-25al{font-size:10px;vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-amwm" colspan=2>Votre mot de passe</th>
    
  </tr>
  <tr>
    <td class="tg-qffz">Login : </td>
    <td class="tg-yw4l">'.strtolower($_POST['username']).'</td>
  </tr>
  <tr>
    <td class="tg-q19q">Mot de passe :</td>
    <td class="tg-yw4l">'.stripslashes($back['pass']).'</td>
  </tr>
  <tr>
    <td class="tg-r8vz" colspan=2>Message :</td>
    
  </tr>
  <tr>
    <td class="tg-dx8v">Veuillez utiliser le mot de passe ci-dessus pour vous connecter à votre compte sur Alliance Distribution</td>
    
  </tr>
  <tr>
  <hr>
    <td class="tg-25al">Cet notification est un message automatique envoyé par Alliance Distribution pour la re-initialisation de votre mot de passe.</td>
    
  </tr>
</table>
     
      </body>
     </html>
     ';

     // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
     $headers  = 'MIME-Version: 1.0' . "\r\n";
     $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

     // En-têtes additionnels
     $headers .= 'To: '.$_POST['username'].'' . "\r\n";
     $headers .= 'From: Alliance Distribution <'.$configuration->getEmail().'>' . "\r\n";
     // Envoi
     @mail($to, $subject, $message, $headers);
                    }
                ?>

<p>Veuillez saisir votre Identifiant  pour pouvoir récuperer votre mot de passe.</p>
 
            </header>
        
            <div class="clearfix"></div>
            
            <!-- Login -->

            <form class="box tile animated active" id="box-login" action="#" method="post">
                <h2 class="m-t-0 m-b-15">Login</h2>
                <input type="text" class="login-control m-b-10" placeholder="Username" name="username" />
                <button class="btn btn-sm m-r-5" type="submit" name="submit">Envoyer par E-mail</button>
                <p><a href="index.php">Retour</a>
                
            </form>
            
            
        </section>     