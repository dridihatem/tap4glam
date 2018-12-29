<div class="general">
                        <h3 class="flat-title-section style mag-top0px">Get a quote from <span>WFS</span></h3>

                        <p>Need dependable, cost effective transportation of your commodities? Fill out our easy Quote Request Form below to get a fast quote on your job.</p>

                        <form id="contactform1" action="./contact/contact-process.php" method="post">
                            <div class="quick-form">
                                <h5 class="flat-title-section style3">Quote request</h5>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="" placeholder="Company*" required="required">
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="First Name*" required="required">
                                        <input type="text" value="" placeholder="Phone" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="Last name*" required="required">
                                        <input type="text" value="" placeholder="Fax" required="required">
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="" placeholder="Email*" required="required">
                                    </div>
                                </div><!-- /.row -->

                                <h5 class="flat-title-section style3">Product being shipped</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="" placeholder="Commodity*" required="required">
                                        <input type="text" value="" placeholder="Dimensions" required="required">
                                        <input type="text" value="" placeholder="Weight*" required="required">
                                    </div>
                                </div><!-- /.row -->

                                <h5 class="flat-title-section style3">Pickup address</h5>

                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" value="" placeholder="Street Address*" required="required">
                                    </div>
                                </div><!-- /.row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="City*" required="required">
                                         <input type="text" value="" placeholder="Pickup Date*" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="State / Province / Region*" required="required">
                                    </div>
                                </div><!-- /.row -->

                                <h5 class="flat-title-section style3">Drop-off address</h5>

                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="City*" required="required">
                                         <input type="text" value="" placeholder="Delivery Date*" required="required">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" value="" placeholder="State / Province / Region*" required="required">
                                    </div>
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <input name="submit" type="submit" id="submit" class="submit" value="submit">
                                    </div>
                                </div>
                            </div><!-- /.quick-form -->
                        </form>
                    </div>

<div class="general-sidebars">
                        <div class="sidebar-wrap">
                            <div class="sidebar">
                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <div class="content-text">
                                            <h4 class="title">Why choose us?</h4>
                                            <ul>
                                                <li><i class="fa fa-arrow-circle-right"></i> Over 20 years experience</li>
                                                <li><i class="fa fa-arrow-circle-right"></i>  Well over 100 Trucks</li>
                                                <li><i class="fa fa-arrow-circle-right"></i> Reliable Service</li>
                                                <li><i class="fa fa-arrow-circle-right"></i>  On Time Deliveries</li>
                                                <li><i class="fa fa-arrow-circle-right"></i>  Professional Drivers</li>
                                                <li><i class="fa fa-arrow-circle-right"></i> Excellent Customer Service</li>
                                            </ul>
                                        </div>
                                    </div><!-- /.textwidget -->
                                </div>
                                <div class="widget widget_text">
                                    <div class="textwidget">
                                        <a class="button lg bg-scheme2 download" href="#">Download Brochure <i class="fa fa-download"></i></a>
                                        <a class="button lg outline download" href="#">Ask Our Experts <i class="fa fa-question-circle"></i></a>
                                    </div><!-- /.textwidget -->
                                </div>
                                <div class="promobox">
                            <h5 class="promobox-title mag-top0px">Need dependable, cost effective transportation of your commodities? Fill out our easy Quote Request Form below to get a fast quote on your job</h5>
                            <div class="group-btn">
                                
                                <a class="button outline" href="<?php echo urlRewrite("request-quote", 30, NULL, NULL, NULL) ?>" title="">get request <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>

                                <div class="widget widget_recent_entries">
                                    <h4 class="widget-title">WFS news</h4>
                                    <ul>
                                        <?php 
                                    $neww = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_actualite WHERE publication = 1 ORDER BY date_insertion DESC LIMIT 0,4");
                                    while($res_newss = mysql_fetch_array($neww)){
                                        echo '<li>
                                        <a href="'. urlRewrite($res_newss['titreEn'], 29, $res_newss['id'], NULL, NULL).'" title="'.$res_newss['titreEn'].'">'. stripslashes($res_newss['titreEn']).'</a>
                                        <span class="post-date">'. dateEn($res_newss['date_insertion']).'</span>
                                    </li>';
                                        
                                    }
                                    ?>
                                        
                                    </ul>
                                </div><!-- /.widget_recent_entries -->

                               

                            </div><!-- /.sidebar -->
                        </div><!-- /.sidebar-wrap -->
                    </div><!-- /.general-sidebars -->
