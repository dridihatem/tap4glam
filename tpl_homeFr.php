<!--<section style="background: url(assets/img/mask.png);padding-top: 26px;padding-bottom: 26px;">                <div class="container">                    <div class="row  align-items-center">                    <div class="col-md-8">                        <h1 style="color:#FFF;font-size: 33; font-weight: bold; font-family: inherit; font-size: 30px;text-transform: uppercase;">Votre rendez-vous beauté,<br /><span style="font-size:24px;color: #dcb048;">Anytime, Anywhere...!</span></h1>                        <p style="color:#FFF;text-transform: uppercase;">Réservation de service de beauté et bien être à domicile 7J/7j de 7h à 22H</p>                    </div>                    <div class="col-md-3">                        <div class="product_button1 pt-0" style="margin-top: 0px;">                            <a href="#">PRENDRE UN RENDEZ-VOUS</a>                                </div>                    </div>                    </div>                </div>                            </section>-->             <section class="shipping_area shipping_seven blog_comment">                <div class="container">                                       <div class="row  align-items-center"">                        <div class="col-lg-4 col-md-4 text-center">                          <span>C’est très simple.</span>                          <h2 style="margin-top: 14px;">COMMENT ÇA MARCHE?</h2>                          <div class="block-text" style="margin-top: 74px;">                            <p style="font-size: 18px;">                            En trois étapes, vous recevez votre le service de visagistes, esthéticiennes, coachs, masseuses.                          </p>                        </div>                                                   </div>                        <div class="col-lg-8 col-md-8">                          <div class="003 text-center" style="float: left;width: 33.333%;position: relative;top: 47px;">                              <img src="images/template/003.png" />                              <p><b>Sélectionnez un soin</b> de 7h à 22h tous les jours de l’année.</p>                           </div>                           <div class="002 text-center" style="float: left;width: 33.333%;position: relative;top: 0px;">                              <img src="images/template/002.png" />                               <p>Sur notre site ou notre application, <b>le paiement en ligne</b> est sécurisé.</p>                           </div>                           <div class="001 text-center" style="float: left;width: 33.333%;position: relative;top: 47px;">                             <img src="images/template/001.png"/>                             <p>Recevez vos soins <b>directement là où vous êtes.</b></p>                           </div>                                                                              </div>                                            </div>                </div>                                            </section>                        <section class="blog_area blog_four">                <div class="container">                    <div class="section_title">                    <div class="row align-items-center">                        <div class="col-12 text-center">                            <h3 style="text-transform: uppercase;color:#b88038">Nos Services </h3>                        </div>                    </div>                    </div>                    <div class="row">                      <?php                       $categorie1 = new Categorie();                      $categorie1->getFromDB(3);                      echo '<div class="col-md-6 nopadding">                <div class="row news item-left">                    <div class="col-md-6 nopadding hidden-xs">                                              <a href="'.urlRewrite($categorie1->getTitreFr(),2,$categorie1->getId(),NULL,NULL,NULL).'"> <img src="images/ressources/'.$categorie1->getImage().'" alt="'.$categorie1->getTitreFr().'">                        <span class="img-overflow"></span>                        <div class="arrow-left"></div>                        </a>                    </div>                      <div class="col-md-6 nopadding"><!--  style="background: #f58696;"-->                        <div class="content text-center">                            <a href="'.urlRewrite($categorie1->getTitreFr(),2,$categorie1->getId(),NULL,NULL,NULL).'">                            <h2 style="color:#FFF;">'.stripslashes($categorie1->getTitreFr()).'</h2>                            <p>'.extraireTxt(formatedTxt($categorie1->getDescriptionFr()),200).'</p>                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->                            </a>                        </div>                    </div>                </div>            </div>';                      ?>                    <?php                       $categorie2 = new Categorie();                      $categorie2->getFromDB(4);                      echo '<div class="col-md-6 nopadding">                <div class="row news item-left">                    <div class="col-md-6 nopadding hidden-xs">                       <a href="'.urlRewrite($categorie2->getTitreFr(),2,$categorie2->getId(),NULL,NULL,NULL).'">                          <img src="images/ressources/'.$categorie2->getImage().'" alt="'.$categorie2->getTitreFr().'">                        <span class="img-overflow"></span>                        <div class="arrow-left"></div>                        </a>                    </div>                      <div class="col-md-6 nopadding"><!-- style="background: #978980;" -->                        <div class="content text-center">                             <a href="'.urlRewrite($categorie2->getTitreFr(),2,$categorie2->getId(),NULL,NULL,NULL).'">                               <h2 style="color:#FFF;">'.stripslashes($categorie2->getTitreFr()).'</h2>                            <p>'.extraireTxt(formatedTxt($categorie2->getDescriptionFr()),200).'</p>                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->                            </a>                        </div>                    </div>                </div>            </div>';                      ?>                                <?php                       $categorie3 = new Categorie();                      $categorie3->getFromDB(5);echo '<div class="col-md-6 nopadding">                <div class="row news item-right">                                        <div class="col-md-6 nopadding" ><!-- style="background: #bcadd3;" -->                        <div class="content text-center">                          <a href="'.urlRewrite($categorie3->getTitreFr(),2,$categorie3->getId(),NULL,NULL,NULL).'"> <h2 style="color:#FFF;">'.stripslashes($categorie3->getTitreFr()).'</h2>                            <p>'.extraireTxt(formatedTxt($categorie3->getDescriptionFr()),200).'</p>                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->                            </a>                        </div>                    </div>                    <div class="col-md-6 nopadding hidden-xs">                       <a href="'.urlRewrite($categorie3->getTitreFr(),2,$categorie3->getId(),NULL,NULL,NULL).'"> <img src="images/ressources/'.$categorie3->getImage().'" alt="'.$categorie3->getTitreFr().'">                        <span class="img-overflow"></span>                        <div class="arrow-right"></div>                        </a>                    </div>                </div>            </div>';                      ?>                                  <?php                      $categorie4 = new Categorie();                      $categorie4->getFromDB(6);                      echo '  <div class="col-md-6 nopadding">                <div class="row news item-right">                    <div class="col-md-6 nopadding"><!--  style="background: #bc7434;" -->                        <div class="content text-center">                         <a href="'.urlRewrite($categorie4->getTitreFr(),2,$categorie4->getId(),NULL,NULL,NULL).'">                            <h2 style="color:#FFF;">'.stripslashes($categorie4->getTitreFr()).'</h2>                            <p>'.extraireTxt(formatedTxt(stripslashes($categorie4->getDescriptionFr())),200).'</p>                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->                         </a>                         </div>                                           </div>                            <div class="col-md-6 nopadding hidden-xs">                         <a href="'.urlRewrite($categorie4->getTitreFr(),2,$categorie4->getId(),NULL,NULL,NULL).'"><img src="images/ressources/'.$categorie4->getImage().'" alt="'.$categorie4->getTitreFr().'">                        <span class="img-overflow"></span>                        <div class="arrow-right"></div>                     </a></div>                                   </div>                </div>';                       ?><?php                       $categorie5 = new Categorie();                      $categorie5->getFromDB(7);                      echo '<div class="col-md-6 nopadding">                <div class="row news item-left">                  <div class="col-md-6 nopadding hidden-xs">                          <a href="'.urlRewrite($categorie5->getTitreFr(),2,$categorie5->getId(),NULL,NULL,NULL).'"><img src="images/ressources/'.$categorie5->getImage().'" alt="'.$categorie5->getTitreFr().'">                        <span class="img-overflow"></span>                        <div class="arrow-left"></div>                    </a></div>                                          <div class="col-md-6 nopadding"><!-- style="background: #51281b;" -->                       <div class="content text-center">                             <a href="'.urlRewrite($categorie5->getTitreFr(),2,$categorie5->getId(),NULL,NULL,NULL).'">                             <h2 style="color:#FFF;">'.stripslashes($categorie5->getTitreFr()).'</h2>                            <p>'.extraireTxt(formatedTxt($categorie5->getDescriptionFr()),200).'</p>                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->                            </a>                        </div>                                            </div>                </div>            </div>';                      ?>                    <?php                       $categorie6 = new Categorie();                      $categorie6->getFromDB(8);                      echo '<div class="col-md-6 nopadding">                <div class="row news item-left">               <div class="col-md-6 nopadding hidden-xs"><a href="'.urlRewrite($categorie6->getTitreFr(),2,$categorie6->getId(),NULL,NULL,NULL).'"> <img src="images/ressources/'.$categorie6->getImage().'" alt="'.$categorie6->getTitreFr().'">                        <span class="img-overflow"></span>                        <div class="arrow-left"></div>                   </a> </div>                      <div class="col-md-6 nopadding"><!-- style="background: #6d6500;" -->                        <div class="content text-center">                            <a href="'.urlRewrite($categorie6->getTitreFr(),2,$categorie6->getId(),NULL,NULL,NULL).'">                             <h2 style="color:#FFF;">'.stripslashes($categorie6->getTitreFr()).'</h2>                            <p>'.extraireTxt(formatedTxt($categorie6->getDescriptionFr()),200).'</p>                            <!--<a href="#" class="btn blue small">Lire la suite</a>-->                            </a>                        </div>                                            </div>                </div>            </div>';                      ?>          </div>      </div>            </section>                       <section class="">                <div id="parallaxcmsblock" class="block parallax">   <!-- <div class="container">   -->                  <!-- <h2 class="h1 products-section-title text-uppercase">top categories</h2> -->                     <div class="parallax-wrapper">            <div class="parallax-left">            <ul class="parallax-text">            <li class="bg-block ">               <div class="block-img">                  <a href="#" class="para-img">                    01                  </a>               </div>               <div class="block-detail">                  <span class="text1">VOS ENVIES</span>                  <span class="text2">Des mains de fée ? Une coiffure de rêve ? Un corps entretenu ? Découvrez tous nos services à domicile et laissez-nous vous sublimer</span>               </div>               </li>            <li class="bg-block">               <div class="block-img">                  <a href="#" class="para-img">                     02                  </a>               </div>               <div class="block-detail">                  <span class="text1">ANYTIME, ANYWHERE...!</span>                  <span class="text2">Pas envie de sortir ? Marre de la circulation ou du mauvais temps ? Tap4glam.com s’occupe de tout et à tout moment.  Choisissez votre service, entrez votre adresse, payer en toute sécurité et laissez-vous tenter par l’expérience tap4glam.com</span>               </div>               </li>            <li class="bg-block">               <div class="block-img">                  <a href="#" class="para-img">                     03                  </a>               </div>               <div class="block-detail">                  <span class="text1">NOTRE ÉQUIPE</span>                  <span class="text2">On est en route ! Votre Glam Expert arrive en toute sérénité.</span>               </div>            </li>            </ul>         </div>            <div class="parallax-right">               <a href="#"><!-- <img alt="parallax1" title="parallax1" src="https://pixothemes.in/prestashop/PRS06/PRS060105/modules/pst_parallaxcmsblock/views/img/parallax_second.jpg" /> --></a>            </div>         </div>     </div>            <!-- </div> -->            </section>                                     <section class="blog_area blog_four" style="background: #f3e9e2;padding-bottom: 0;">                                <div class="container">                    <div class="section_title">                    <div class="row align-items-center">                        <div class="col-12 text-center">                            <h3 style="text-transform: uppercase;color: #000;">Notre Application </h3>                            <p style=" font-size: 17px;">Bientôt, notre application sera sur l’Apple store.<br />Abonnez-vous à notre newsletter pour être la première à l’essayer!</p>                        </div>                    </div>                    </div>                    <div class="row">                      <div class="col-md-12 col-lg-12 hidden-xs hidden-sm text-center">                      <img src="images/template/appli1.png"/> <img src="images/template/appli2.png"/> <img src="images/template/appli3.png"/>                     </div>                    <div class="hidden-md hidden-lg col-md-12 col-sm-12 text-center">                      <img src="images/template/appli_mobile.png"/>                    </div>                      <!--                        <div class="col-md-5"><img src="images/template/phone.png" ></div>                        <div class="col-md-7">                            <h3 style="color: #966729;margin-bottom: 20px;">RETROUVEZ-NOUS SUR IPHONE ET ANDROID</h3>                            <p style="margin-bottom: 20px;">                                <b>Il vous suffit seulement de cliquer sur le site internet ou directement sur votre smartphone et TAP4GLAM est prête à vous servir.</b>                            </p>                            <ul class="application">                                <li>Soyez le premier à connaître les promotions ou les services spéciaux</li>                                <li>Message avec professionnels et inspirations photos partagées</li>                                <li>Réserver et gérer vos nominations</li>                            </ul>                            <p>                                <a href=""><img src="images/template/app_iphone.png" ></a>  <a href=""><img src="images/template/app_android.png" ></a>                            </p>                        </div>                      -->                                            </div>                </div>             </section> <!--countdown section start-->                          <div class="newsletter_area news_four" style="/*background: #d09c52;*/background:url(images/template/news.jpg) center center/cover;padding: 300px 0 300px;    margin-bottom: 0;">                <div class="container">                    <div class="row">                        <div class="col-12">                            <div class="newsletter_content">                                <h2>Newsletter</h2>                                <p style="color:#FFF;">Vous souhaitez rester au courant de nos dernières nouveautés?<br />Introduisez ci-dessous votre adresse E-mail et inscrivez-vous à notre newsletter</p>                                <form action="#success" id="form-search" method="POST">                                    <input placeholder="Saisissez votre email" type="text" name="email" required>                                    <button type="submit" id="save">Inscription</button>                                </form>                                <span id="message_success" style="display: none;color:#FFF;" >Vous avez été abonné avec succès.</span>                                <p style="color:#FFF;font-size: 14px;margin-top: 24px;">Nous vous premettons de ne pas envoyer de courrier indésirable</p>                            </div>                        </div>                    </div>                </div>                </div>            <!--newsletter area end-->                        <!--custom product start-->                                    <!--blog area start-->                        <!--brand area start-->            