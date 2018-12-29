<?php 
if(isset($_GET['sm']) && !empty($_GET['sm']) && is_numeric($_GET['sm'])){ 
    $news = new Actualite();
    $news->getFromDB($_GET['sm']);
    $img = $news->getImage();
    if(isset($img) && !empty($img)){
        $imgg = '<img src="images/ressources/'.$img.'" alt="'.$news->getTitreEn().'" title="'.$news->getTitreEn().'"/>';
    }
    else $imgg =NULL;
    ?> 

<div class="content-wrap">
                        <div class="main-content">
                            <div class="main-content-wrap">
                                <div class="content-inner">
                                    <article class="blog-post">
                                        <div class="entry-wrapper">
                                            <div class="entry-cover">
                                                <?php echo $imgg; ?>
                                            </div><!-- /.entry-cover -->
                                            <h4 class="entry-time">
                                               <?php echo $news->getTitreEn(); ?>
                                            </h4>

                                            <div class="entry-header">                                                
                                                <div class="entry-header-content">
                                                    <div class="entry-meta">
                                                        <i class="fa fa-user"></i>
                                                        <span class="entry-author"><a href="#">admin</a></span>
                                                        <i class="fa fa-calendar"></i>
                                                        <span class="entry-author"><?php echo dateEn($news->getDate_insertion()); ?></span>
                                                        
                                                    </div>
                                                </div><!-- /.entry-header-content -->
                                            </div><!-- /.entry-header -->

                                            <div class="entry-content">
                                                <?php
                                                echo $news->getDescriptionEn();
                                                ?>
                                            </div><!-- /.entry-content -->

                                            
                                        </div><!-- /.entry-wrapper -->
                                    </article><!-- /.blog-post -->
                                </div><!-- /.content-inner -->  

                                <div class="navigation post-navigation">
                                    <ul class="nav-links">
                                        <li class="previous-post"><a href="<?php echo urlRewrite("news", 29, NULL, NULL, NULL); ?>"><span class="meta-nav">Back to news list</a></li>
                                      
                                    </ul>
                                </div><!-- /.navigation -->  

                                
                            </div><!-- /.main-content-wrap -->
                        </div><!-- /.main-content -->
</div>
    
<?php } else if(isset($_GET['m']) && !empty($_GET['m']) && is_numeric($_GET['m'])){ ?> 


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
                                         echo '<article class="flat-item item-three-column blog-post">
                                        <div class="entry-wrapper">
                                            <div class="entry-cover">
                                                <a href="'. urlRewrite($res_news['titreEn'], 29, $res_news['id'], NULL, NULL).'">
                                                    '.$img.'
                                                </a>
                                            </div><!-- /.entry-cover --> 
                                            <div class="entry-header">                                                
                                                <div class="entry-header-content">
                                                    <h4 class="entry-title">
                                                        <a href="'. urlRewrite($res_news['titreEn'], 29, $res_news['id'], NULL, NULL).'" title="'. stripslashes($res_news['titreEn']).'">'. extraireTxt(stripslashes($res_news['titreEn']),50).'</a>
                                                    </h4> 
                                                    <span style="font-size:11px;color:#7b7878;"><i class="fa fa-calendar"></i> '. dateEn($res_news['date_insertion']).'</span>
                                                </div><!-- /.entry-header-content -->
                                            </div><!-- /.entry-header -->

                                            <div class="entry-content">
                                                <p>'.extraireTxt(formatedTxt(stripslashes($res_news['titreEn'])),180).'<br /><a href="'. urlRewrite($res_news['titreEn'], 29, $res_news['id'], NULL, NULL).'" class="more-link">Read more &raquo;</a></p>
                                            </div><!-- /.entry-content -->
                                            
                                        </div><!-- /.entry-wrapper -->
                                    </article><!-- /.blog-post -->';
                                    }
                                         ?>
                                    
                                    
                                </div>
                            </div>
                        </div>
    </div>
<?php } ?>