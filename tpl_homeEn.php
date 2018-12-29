

        <!-- Flat imagebox -->
        <div class="flat-row parallax-style parallax1">
            <div class="overlay bg-scheme1"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3 style="color:#dcb008;">TRACKER</h3>
                        <p class="text-white"><span style="font-size: 22px;font-weight: bold;">Have exactly where your cargo / cargo is at all times</span><br />
                        Enter your tracking code below and click on the "Follow" button to find out exactly where your cargo is and when it will arrive at its final destination.</p>
                    </div>
                   
                        
                        <form class="inline-form tracking" >
                             <div class="col-md-4 pad-top60px" style="padding-left: 0; padding-right:0;">
                            <input type="text" name="" class="form-control" placeholder="Entre your code here"  style="background: #FFF" />
                            
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12 pad-top60px"  style="padding-left: 0; padding-right:0;"><input type="submit" value="ok" name="" style="width: 100%;"></div>
                        </form>
                    
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->
<?php
$fret = new Module();
$fret->getFromDB(4);
$routier = new Module();
$routier->getFromDB(5);
$maritime = new Module();
$maritime->getFromDB(6);
$express = new Module();
$express->getFromDB(7);
$douane = new Module();
$douane->getFromDB(7);
$accompagnement = new Module();
$accompagnement->getFromDB(8);

?>
        <!-- Flat iconbox style -->
        <div class="flat-row pad-top60px pad-bottom10px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="flat-title-section title-center">Services</h2>
                    </div><!-- /.col-md-12 -->
                    <div class="col-md-12">
                        <h2 class="flat-title-section style">A few reasons to <span class="scheme">differentiate ourselves.</span></h2>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
                <div class="flat-divider d40px"></div>
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="flat-iconbox-style clearfix">
                            <div class="flat-item item-three-column">
                                <div class="iconbox style1">
                                    <div class="box-header">
                                        <div class="box-icon"><i class="fa fa-plane"></i></div>
                                        <h5 class="box-title"><a href="<?php echo urlRewrite($fret->getNomEn(), $fret->getId(), NULL, NULL, NULL); ?>"><?php echo $fret->getNomEn(); ?></a></h5>
                                    </div>
                                    <div class="box-content">
                                        <?php echo extraireTxt(formatedTxt(stripslashes($fret->getContenuEn())),181); ?>                                        
                                    </div>
                                </div>
                            </div><!-- /.item-three-column -->

                            <div class="flat-item item-three-column">
                                <div class="iconbox style1">
                                    <div class="box-header">
                                        <div class="box-icon"><i class="fa fa-truck"></i></div>
                                        <h5 class="box-title"><a href="<?php echo urlRewrite($routier->getNomEn(), $routier->getId(), NULL, NULL, NULL); ?>"><?php echo $routier->getNomEn(); ?></a></h5>
                                    </div>
                                    <div class="box-content">
                                        <?php echo extraireTxt(formatedTxt(stripslashes($routier->getContenuEn())),181); ?>                                      
                                    </div>
                                </div>
                            </div><!-- /.item-three-column -->

                            <div class="flat-item item-three-column">
                                <div class="iconbox style1">
                                    <div class="box-header">
                                        <div class="box-icon"><i class="fa fa-ship"></i></div>
                                        <h5 class="box-title"><a href="<?php echo urlRewrite($maritime->getNomEn(), $maritime->getId(), NULL, NULL, NULL); ?>"><?php echo $maritime->getNomEn(); ?></a></h5>
                                    </div>
                                    <div class="box-content">
                                        <?php echo extraireTxt(formatedTxt(stripslashes($maritime->getContenuEn())),181); ?>                                       
                                    </div>
                                </div>
                            </div><!-- /.item-three-column -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="flat-wrapper">
                        <div class="flat-iconbox-style clearfix">

                            <div class="flat-item item-three-column">
                                <div class="iconbox style1">
                                    <div class="box-header">
                                        <div class="box-icon"><i class="fa fa-paper-plane"></i></div>
                                        <h5 class="box-title"><a href="<?php echo urlRewrite($express->getNomEn(), $express->getId(), NULL, NULL, NULL); ?>"><?php echo $express->getNomEn(); ?></a></h5>
                                    </div>
                                    <div class="box-content">
                                        <?php echo extraireTxt(formatedTxt(stripslashes($express->getContenuEn())),181); ?>                                          
                                    </div>
                                </div>
                            </div><!-- /.item-three-column -->

                            <div class="flat-item item-three-column">
                                <div class="iconbox style1">
                                    <div class="box-header">
                                        <div class="box-icon"><i class="fa fa-vcard"></i></div>
                                        <h5 class="box-title"><a href="<?php echo urlRewrite($douane->getNomEn(), $douane->getId(), NULL, NULL, NULL); ?>"><?php echo $douane->getNomEn(); ?></a></h5>
                                    </div>
                                    <div class="box-content">
                                        <?php echo extraireTxt(formatedTxt(stripslashes($douane->getContenuEn())),181); ?>                                     
                                    </div>
                                </div>
                            </div><!-- /.item-three-column -->

                            <div class="flat-item item-three-column">
                                <div class="iconbox style1">
                                    <div class="box-header">
                                        <div class="box-icon"><i class="fa fa-handshake-o"></i></div>
                                        <h5 class="box-title"><a href="<?php echo urlRewrite($accompagnement->getNomEn(), $accompagnement->getId(), NULL, NULL, NULL); ?>"><?php echo $accompagnement->getNomEn(); ?></a></h5>
                                    </div>
                                    <div class="box-content">
                                        <?php echo extraireTxt(formatedTxt(stripslashes($accompagnement->getContenuEn())),181); ?>                                         
                                    </div>
                                </div>
                            </div><!-- /.item-three-column -->
                        </div><!-- /.flat-iconbox-style -->
                    </div><!-- /.flat-wrapper -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->


          <div class="flat-row parallax parallax5 pad-top60px pad-bottom60px">
            <div class="overlay bg-scheme5"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="flat-title-section title-center">Key figures</h2>
                    </div><!-- /.col-md-12 -->
                     <div class="col-md-12 text-center">
                         <p class="text-black">Smart and sustainable business requires the skills of logistics experts who are able to think ahead.</p>
                     </div>
                 </div>
                 <div class="row  pad-top60px">
                                        <div class="col-md-3 text-center">
                                            <div class="counter">
                                                <div class="counter-image"><img src="images/template/icon/money.svg"  style="width:70px;" /></div>
                                                <div class="numb-count  text-black" data-to="23" data-speed="3000" data-waypoint-active="yes">23</div>
                                                <div class="counter-title">
                                                  Millions Dinars Turnover
                                                </div>
                                            </div>
                                        </div><!-- /.col-md-4 -->

                                        <div class="col-md-3 text-center">
                                            <div class="counter ft-style1">
                                                <div class="counter-image"><img src="images/template/icon/stat.svg"  style="width:70px;" /></div>
                                                <div class="numb-count  text-black" data-to="14" data-speed="3000" data-waypoint-active="yes">14</div>
                                                <div class="counter-title">
                                                    Millios Dinars Investments
                                                </div>
                                            </div>
                                        </div><!-- /.col-md-4 -->

                                        <div class="col-md-3 text-center">
                                            <div class="counter ft-style2">
                                                <div class="counter-image"><img src="images/template/icon/plane.svg"  style="width:70px;" /></div>
                                                <div class="numb-count text-black" data-to="15" data-speed="3000" data-waypoint-active="yes">15</div>
                                                <div class="counter-title">
                                                    Thousand Air Tonnage
                                                </div>
                                            </div>
                                        </div><!-- /.col-md-4 -->
                                        <div class="col-md-3 text-center">
                                            <div class="counter ft-style2">
                                                <div class="counter-image"><img src="images/template/icon/bateau.svg"  style="width:70px;" /></div>
                                                <div class="numb-count text-black" data-to="15" data-speed="3000" data-waypoint-active="yes">15</div>
                                                <div class="counter-title">
                                                    Thousand Sea Tonnage
                                                </div>
                                            </div>
                                        </div><!-- /.col-md-4 -->
                                    </div><!-- /.row -->
                   
                </div><!-- /.row -->
            </div><!-- /.container -->
      

<?php
$perrisable = new Module();
$perrisable->getFromDB(11);
$pharmacie = new Module();
$pharmacie->getFromDB(12);
$aerospace = new Module();
$aerospace->getFromDB(13);
$oil = new Module();
$oil->getFromDB(14);
$automotive = new Module();
$automotive->getFromDB(15);
$hitech = new Module();
$hitech->getFromDB(16);

?>

        <div class="flat-row parallax parallax4 pad-top60px pad-bottom60px">
            <div class="overlay bg-scheme1"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="flat-title-section title-center text-white">Expertise & know-how</h2>
                    </div><!-- /.col-md-12 -->
                    <div class="col-md-12 text-white">
                        WFS has specialized logistics solutions to meet your needs. Your sensitive goods will reach their destination as fresh as they were at the start.
                    </div>
                    <div class="col-md-4 text-center bg-scheme2 pad-top20px pad-bottom20px mar-right15px">
                        <div class="icon">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 32" style="enable-background:new 0 0 27.8 32;" xml:space="preserve">

                        <path id="perrisable" class="st0" d="M14.7,10.5c0.5-0.8,1.3-2,2.3-3.2c0.8-1,2.5-2.2,2.5-2.2c0.2-0.2,0.2-0.4-0.1-0.6l-2-0.9
                            c-0.3-0.1-0.7,0-0.9,0.2c0,0-0.9,1.4-2.2,4.2c0-0.7-0.2-2.5-1.5-3.8c-1.7-1.7-4.1-1.5-4.1-1.5c-0.3,0-0.6,0.3-0.6,0.6
                            c0,0-0.2,2.4,1.5,4.1C11.3,9.2,13.7,9,13.7,9c0.1,0,0.2,0,0.2-0.1c-0.2,0.5-0.4,1-0.6,1.6C8,8,2.9,11.4,2.9,17.4
                            c0,6.2,4.8,15.6,11.2,12.7c6.8,2.9,11.2-6.5,11.2-12.7C25.2,11.4,20.6,7.9,14.7,10.5z"/>
                        </svg>
                    </div>
                    <h4><a href="<?php echo urlRewrite($perrisable->getNomEn(), $perrisable->getId(), NULL, NULL, NULL); ?>"><?php echo $perrisable->getNomEn(); ?></a></h4>
                    <p class="text-black"><?php echo extraireTxt(formatedTxt(stripslashes($perrisable->getContenuEn())),181); ?></p>
                    <a class="button black sm" href="<?php echo urlRewrite($perrisable->getNomEn(), $perrisable->getId(), NULL, NULL, NULL); ?>">Read more<i class="fa fa-chevron-right"></i></a>
                    </div>
                    <div class="col-md-4 text-center bg-scheme2 pad-top20px pad-bottom20px mar-right15px">
                        <div class="icon">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 32" style="enable-background:new 0 0 27.8 32;" xml:space="preserve">

                       <g id="perrisable">
    <path id="perrisable" class="st0" d="M21.8,19.2c-1-0.9-2.6-0.8-3.6,0.3L18,19.7v-5.1l-2-3h-0.5v-1.2h1.3V7.8H7.9v2.6h1.3v1.2H8.7
        L7,14.2v1.3v6.3V23v2.5h8.7c0.1,0.1,0.2,0.2,0.3,0.3c1,0.9,2.6,0.8,3.5-0.3l0.8-1l-3.7-3.2l0.9-0.9l3.6,3.1l0.8-1
        C23,21.7,22.8,20.1,21.8,19.2z M8.6,18.1h1.3v-1.3h1.3v1.3h1.3v1.3h-1.3v1.3H9.8v-1.3H8.6V18.1z"/>
    <polygon id="perrisable" class="st0" points="9.8,20.6 11.1,20.6 11.1,19.4 12.3,19.4 12.3,18.1 11.1,18.1 11.1,16.8 9.8,16.8 
        9.8,18.1 8.6,18.1 8.6,19.4 9.8,19.4     "/>
</g>
                        </svg>
                    </div>
                    <h4><a href="<?php echo urlRewrite($pharmacie->getNomEn(), $pharmacie->getId(), NULL, NULL, NULL); ?>"><?php echo $pharmacie->getNomEn(); ?></a></h4>
                    <p class="text-black"><?php echo extraireTxt(formatedTxt(stripslashes($pharmacie->getContenuEn())),181); ?></p>
                    <a class="button black sm" href="<?php echo urlRewrite($pharmacie->getNomEn(), $pharmacie->getId(), NULL, NULL, NULL); ?>">Read more<i class="fa fa-chevron-right"></i></a>
                    </div>

                    <div class="col-md-4 text-center bg-scheme2 pad-top20px pad-bottom20px mar-right15px">
                        <div class="icon">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 32" style="enable-background:new 0 0 27.8 32;" xml:space="preserve">

                       <polygon id="perrisable" class="st0" points="1,14.4 6.5,17.1 6.5,22.6 11.2,19.9 8.5,18.5 7.1,21.3 7.1,17.4 7.1,16.9 7.8,16.7 
    25.4,11.1 10,17.6 8.7,18.2 9.3,18.5 11.6,19.6 17.2,22.4 26.9,10.4 "/>
                        </svg>
                    </div>
                    <h4><a href="<?php echo urlRewrite($aerospace->getNomEn(), $aerospace->getId(), NULL, NULL, NULL); ?>"><?php echo $aerospace->getNomEn(); ?></a></h4>
                    <p class="text-black"><?php echo extraireTxt(formatedTxt(stripslashes($aerospace->getContenuEn())),181); ?></p>
                    <a class="button black sm" href="<?php echo urlRewrite($aerospace->getNomEn(), $aerospace->getId(), NULL, NULL, NULL); ?>">Read more<i class="fa fa-chevron-right"></i></a>
                    </div>
                    <div class="col-md-4 text-center bg-scheme2 pad-top20px pad-bottom20px mar-right15px">
                        <div class="icon">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 32" style="enable-background:new 0 0 27.8 32;" xml:space="preserve">

                        <path id="perrisable" class="st0" d="M13.9,20.8c-1.7,0-3.1-1.4-3.1-3.1c0-2.5,3.1-5.8,3.1-5.8s3.1,3.3,3.1,5.8
        C16.9,19.4,15.6,20.8,13.9,20.8L13.9,20.8z M23.7,5.7L23.7,5.7c0-0.7-0.5-1.2-1.2-1.2H5.3C4.6,4.5,4.1,5,4.1,5.7l0,0
        c0,0.6,0.4,1.1,1,1.2v8c-0.6,0.1-1,0.6-1,1.2c0,0.6,0.4,1.1,1,1.2v8c-0.6,0.1-1,0.6-1,1.2l0,0c0,0.7,0.5,1.2,1.2,1.2h17.2
        c0.7,0,1.2-0.5,1.2-1.2l0,0c0-0.6-0.4-1.1-1-1.2v-8c0.6-0.1,1-0.6,1-1.2c0-0.6-0.4-1.1-1-1.2v-8C23.2,6.8,23.7,6.3,23.7,5.7
        L23.7,5.7z"/>
                        </svg>
                    </div>
                    <h4><a href="<?php echo urlRewrite($oil->getNomEn(), $oil->getId(), NULL, NULL, NULL); ?>"><?php echo $oil->getNomEn(); ?></a></h4>
                    <p class="text-black"><?php echo extraireTxt(formatedTxt(stripslashes($oil->getContenuEn())),181); ?></p>
                    <a class="button black sm" href="<?php echo urlRewrite($oil->getNomEn(), $oil->getId(), NULL, NULL, NULL); ?>">Read more<i class="fa fa-chevron-right"></i></a>
                    </div>

                    <div class="col-md-4 text-center bg-scheme2 pad-top20px pad-bottom20px mar-right15px">
                        <div class="icon">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 32" style="enable-background:new 0 0 27.8 32;" xml:space="preserve">

                       <path id="perrisable" class="st0" d="M7,18.5c-1.3,0-2.3,1-2.3,2.3c0,0,0,0.1,0,0.1c0.1,1.2,1.1,2.2,2.3,2.2c1.2,0,2.2-1,2.3-2.2
    c0,0,0-0.1,0-0.1C9.3,19.5,8.2,18.5,7,18.5z M7.7,20.9c-0.1,0.4-0.4,0.6-0.7,0.6c-0.4,0-0.7-0.3-0.7-0.6c0,0,0-0.1,0-0.1
    C6.2,20.4,6.6,20,7,20c0.4,0,0.7,0.3,0.7,0.7C7.7,20.8,7.7,20.8,7.7,20.9z M21.2,18.5c-1.3,0-2.3,1-2.3,2.3c0,0,0,0.1,0,0.1
    c0.1,1.2,1.1,2.2,2.3,2.2c1.2,0,2.2-1,2.3-2.2c0,0,0-0.1,0-0.1C23.5,19.5,22.4,18.5,21.2,18.5z M21.9,20.9c-0.1,0.4-0.4,0.6-0.7,0.6
    c-0.4,0-0.7-0.3-0.7-0.6c0,0,0-0.1,0-0.1c0-0.4,0.3-0.7,0.7-0.7c0.4,0,0.7,0.3,0.7,0.7C21.9,20.8,21.9,20.8,21.9,20.9z M27.1,17.6
    H26c-0.4,0-0.7-0.3-0.7-0.7c0-0.4,0.3-0.7,0.7-0.7H27l0-0.6c0-1.5-3.1-2.5-5-3l-3.2-3.2c-1-1-2.5-1.8-4.5-1.8H2.2
    C1.4,7.4,0.7,8,0.7,8.9v7.2h0.7c0.4,0,0.7,0.3,0.7,0.7c0,0.4-0.3,0.7-0.7,0.7H0.7V19c0,1.1,0.8,1.8,1.9,1.8h1.4c0,0,0-0.1,0-0.1
    c0-1.7,1.4-3,3-3c1.7,0,3,1.4,3,3c0,0,0,0.1,0,0.1h8.1c0,0,0-0.1,0-0.1c0-1.7,1.4-3,3-3c1.7,0,3,1.4,3,3c0,0,0,0.1,0,0.1h0.6
    c1.5,0,2.3-1.1,2.3-2.6L27.1,17.6z M15.1,15.3h-1c-0.2,0-0.4-0.2-0.4-0.4c0-0.2,0.2-0.4,0.4-0.4h1c0.2,0,0.4,0.2,0.4,0.4
    C15.5,15.2,15.4,15.3,15.1,15.3z M19.6,13.6c-0.5,0-4.1,0-4.1,0c-1.1,0-2.1-0.9-2.1-2.1c0,0,0-1.5,0-1.9c0-0.4,0.4-0.5,0.4-0.5h0.7
    c1.1,0,2.1,0.4,2.9,1.2l2.6,2.7C20.1,13,20.1,13.6,19.6,13.6z"/>
                        </svg>
                    </div>
                    <h4><a href="<?php echo urlRewrite($automotive->getNomEn(), $automotive->getId(), NULL, NULL, NULL); ?>"><?php echo $automotive->getNomEn(); ?></a></h4>
                    <p class="text-black"><?php echo extraireTxt(formatedTxt(stripslashes($automotive->getContenuEn())),181); ?></p>
                    <a class="button black sm" href="<?php echo urlRewrite($automotive->getNomEn(), $automotive->getId(), NULL, NULL, NULL); ?>">Read more<i class="fa fa-chevron-right"></i></a>
                    </div>

                    <div class="col-md-4 text-center bg-scheme2 pad-top20px pad-bottom20px mar-right15px">
                        <div class="icon">
                        <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 27.8 32" style="enable-background:new 0 0 27.8 32;" xml:space="preserve">

                        <g id="perrisable">
    <rect id="perrisable" x="12" y="21.9" class="st0" width="3.7" height="0.8"/>
    <rect id="perrisable" x="5.4" y="10.2" class="st0" width="16.9" height="9.4"/>
    <path id="perrisable" class="st0" d="M26.2,21.1C26.2,21.1,26.2,21.1,26.2,21.1l-2.2,0c0-0.1,0-0.1,0-0.2V9c0-0.3-0.2-0.5-0.5-0.5
        H4.2C3.9,8.5,3.7,8.7,3.7,9v11.9c0,0.1,0,0.1,0,0.2H1.6c0,0-0.1,0-0.1,0c0,0,0,0.1,0,0.1c0,0,0.4,2.3,3.2,2.3H23
        c2.9,0,3.2-2.3,3.2-2.3C26.3,21.2,26.3,21.2,26.2,21.1z M5.4,10.2h16.9v9.4H5.4V10.2z M15.7,22.7H12v-0.8h3.7V22.7z"/>
</g>
                    </div>
                    <h4><a href="<?php echo urlRewrite($hitech->getNomEn(), $hitech->getId(), NULL, NULL, NULL); ?>"><?php echo $hitech->getNomEn(); ?></a></h4>
                    <p class="text-black"><?php echo extraireTxt(formatedTxt(stripslashes($hitech->getContenuEn())),181); ?></p>
                    <a class="button black sm" href="<?php echo urlRewrite($hitech->getNomEn(), $hitech->getId(), NULL, NULL, NULL); ?>">Read more<i class="fa fa-chevron-right"></i></a>
                    </div>
                    
                    <!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->

        <!-- Promobox -->
        <div class="flat-row bg-scheme1 pad-top0px pad-bottom0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="promobox style1 style2 clearfix">
                            <h5 class="promobox-title">Contact us now to get quote for all your global shipping and cargo need.</h5>
                            <a class="button black sm" href="<?php echo urlRewrite("contact", 28, NULL, NULL, NULL); ?>">contact us<i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->

        <div class="flat-row blog-shortcode blog-home pad-top60px pad-bottom0px">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="flat-title-section style mag-bottom0px">Latest <span class="scheme">news.</span> <a href="<?php echo urlRewrite("news", 29, NULL, NULL, NULL); ?>" style="font-size: 13px;">View all &raquo;</a></h2>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->

                <div class="row">
                    <div class="content-wrap">
                        <div class="main-content">
                            <div class="main-content-wrap">
                                <div class="content-inner clearfix">
                                    <?php 
                                    $news = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_actualite WHERE publication ORDER BY date_insertion DESC LIMIT 0,4");
                                    $num_news = mysql_num_rows($news);
                                    if($num_news == 0){
                                        echo 'No news available';
                                    }
                                   
                                    while($res_news = mysql_fetch_array($news)){
                                         $img = $res_news['image'];
                                         if(isset($img) && !empty($img)){
                                             $img ='<img src="images/ressources/'.$res_news['image'].'" alt="'. stripslashes($res_news['titreEn']).'" title="'. stripslashes($res_news['titreEn']).'" style="width:613px; height:413px;"/>';
                                         }
                                         else {$img='<img src="images/template/no-image.jpg" />';}
                                        echo '<article class="flat-item item-four-column blog-post">
                                        <div class="entry-wrapper">
                                            <div class="entry-cover">
                                                <a href="'. urlRewrite($res_news['titreEn'], 29, $res_news['id'], NULL, NULL).'" title="'. stripslashes($res_news['titreEn']).'">
                                                '.$img.'
                                                </a>
                                            </div><!-- /.entry-cover --> 
                                            <div class="entry-header" style="margin-bottom: 2px;">                                                
                                                <div class="entry-header-content">
                                                    
                                                    <h4 class="entry-title">
                                                        <a href="'. urlRewrite($res_news['titreEn'], 29, $res_news['id'], NULL, NULL).'">'. extraireTxt(stripslashes($res_news['titreEn']),50).'</a>
                                                    </h4>
                                                    <span style="font-size:11px;color:#7b7878;"><i class="fa fa-calendar"></i> '. dateEn($res_news['date_insertion']).'</span>
                                                </div><!-- /.entry-header-content -->
                                            </div><!-- /.entry-header -->

                                            <div class="entry-content">
                                                <p class="text-black">'.extraireTxt(formatedTxt(stripslashes($res_news['titreEn'])),180).'</p>
                                            </div><!-- /.entry-content -->
                                            
                                        </div><!-- /.entry-wrapper -->
                                    </article><!-- /.blog-post -->';
                                        
                                    }
                                    ?>
                                    

                                   

                                   
                                </div><!-- /.content-inner -->                                
                            </div><!-- /.main-content-wrap -->
                        </div><!-- /.main-content -->
                    </div><!-- /.content-wrap  -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->

        
        <!-- Promobox -->
        <div class="flat-row bg-scheme pad-top20px pad-bottom20px">
            <div class="container">
                <div class="row">
                    <?php 
                    $reference = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_reference WHERE publication = 1 ORDER BY rand() LIMIT 0,6");
                    while($res_ref = mysql_fetch_array($reference)){
                        echo '<div class="col-md-2">
                        <div class="clients-image style">
                            <div class="item-img">
                                <img src="images/ressources/'.$res_ref['logo'].'" alt="'.$res_ref['titre'].'" alt="'.$res_ref['titre'].'">
                            </div>
                            <p class="tooltip">'.$res_ref['titre'].'</p>
                        </div>
                    </div><!-- /.col-md-2 -->';
                        
                    }
                    ?>
                   
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.flat-row -->
