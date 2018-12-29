 <!-- Footer -->
        <footer class="footer">
            <div class="footer-widgets">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="widget widget_recent_entries">
                                 <h4 class="widget-title">About us</h4>
                                <div class="textwidget">
                                  
                                    <p class="text-white"><?php $module = new Module();$module->getFromDB(2); echo extraireTxt(formatedTxt($module->getContenuEn()),200); ?><a href="<?php echo urlRewrite($module->getNomEn(), 2, NULL, NULL, NULL); ?>" title="<?php echo $module->getNomEn(); ?>">Read more &raquo;</a></p>
                                </div>
                                
                            </div><!-- /.widget_text -->
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="widget widget_recent_entries">
                                <h4 class="widget-title">Recent News</h4>
                                <ul>
                                    <?php 
                                    $neww = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_actualite WHERE publication = 1 ORDER BY date_insertion DESC LIMIT 0,2");
                                    while($res_newss = mysql_fetch_array($neww)){
                                        echo '<li>
                                        <a href="'. urlRewrite($res_newss['titreEn'], 29, $res_newss['id'], NULL, NULL).'" title="'.$res_newss['titreEn'].'">'. stripslashes($res_newss['titreEn']).'</a>
                                        <span class="post-date">'. dateEn($res_newss['date_insertion']).'</span>
                                    </li>';
                                        
                                    }
                                    ?>
                                    
                                </ul>
                            </div><!-- /.widget_recent_entries -->
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="widget widget_nav_menu">
                                <h3 class="widget-title">Information</h3>
                                <div class="menu-footer-menu-container">
                                    <ul class="menu-footer-menu">
                                        <?php 
                                        $module_information = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_module WHERE moduleParent <>0 LIMIT 0,7");
                                        while($res_module = mysql_fetch_array($module_information)){
                                        echo '<li><a href="'.urlRewrite($res_module['nomEn'], $res_module['id'], NULL, NULL, NULL).'">'.$res_module['nomEn'].'</a></li>';
                                            
                                        }
                                        ?>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.col-md-3 -->

                        <div class="col-md-3">
                            <div class="widget widget_text information">
                                <h3 class="widget-title">Contact Us</h3>
                                <div class="textwidget">
                                    <p><strong>MBG Building Industrial Zone, El Kram 2015, Tunis, Tunisia.</strong></p>
                                    <p>
                                        <i class="fa fa-phone"></i>  Tel: +216 71 182 142<br>
                                        <i class="fa fa-envelope"></i>info@wfs.com.tn
                                    </p>
                                    <p>
                                        <i class="fa fa-phone"></i>  Fax: +216 71 281 145<br>
                                        <i class="fa fa-envelope"></i>info@wfs.com.tn
                                    </p>
                                </div>          
                            </div>
                        </div><!-- /.col-md-3 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-content -->

            <div class="footer-content">
                <div class="container">
                    <div class="row">
                        <div class="flat-wrapper">
                            <div class="ft-wrap clearfix">
                                 <div class="social-links">
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-facebook-official"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-pinterest"></i></a>
                                </div>
                                <div class="copyright">
                                    <div class="copyright-content">
                                        Copyright © 2018 WFS. Theme by <a href="#">Synapseconsulting</a>   
                                    </div>
                                </div>
                            </div><!-- /.ft-wrap -->
                        </div><!-- /.flat-wrapper -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.footer-content -->
        </footer>

        <!-- Go Top -->
        <a class="go-top">
            <i class="fa fa-chevron-up"></i>
        </a>   