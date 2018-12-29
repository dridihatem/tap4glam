<div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                     <?php
$slide = mysql_query("SELECT * FROM ".$_SESSION['pfx']."_slide WHERE publication = 1 ORDER BY date_insertion");
while($res_slide = mysql_fetch_array($slide)){
     $link = $res_slide['lien'];
  if(!empty($link)){
    $res_link = ' <div class="tp-caption sfl flat-button-slider bg-button-slider-32bfc0" data-x="40" data-y="370" data-speed="1000" data-start="2000" data-easing="Power3.easeInOut"><a href="'.$link.'">Read more</a>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-chevron-right"></i></div>';
  }
  else $res_link = NULL;
    echo '<li data-transition="random-static" data-slotamount="7" data-masterspeed="1000" data-saveperformance="on">
                        <img src="images/ressources/'.$res_slide['image'].'" alt="'.$res_slide['titreEn'].'" />
                        <div class="tp-caption sfl title-slide center" data-x="40" data-y="100" data-speed="1000" data-start="1000" data-easing="Power3.easeInOut">                            
                            '.stripslashes($res_slide['titreEn']).'
                        </div>  
                        <div class="tp-caption sfr desc-slide center" data-x="40" data-y="240" data-speed="1000" data-start="1500" data-easing="Power3.easeInOut">                       
                            '.stripslashes($res_slide['descriptionEn']).'
                        </div>    
                        '.$res_link.'
                    </li>';
}
?>              </ul>
            </div>
        </div>