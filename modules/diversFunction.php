<?php

header('Content-Type: text/html; charset=utf-8');

$mod="";

$url = $_SERVER['REQUEST_URI'];



if(isset($_GET['m']))

{

$mod = $_GET['m'];	

	if(!is_numeric($mod)){$p = 'includes/Main/home'.$_SESSION['lng'].'.php';}

		else{

		$row_type = mysqli_fetch_assoc($conn->query(sprintf("select * from ".$_SESSION['pfx']."_module where id =%d",mysqli_real_escape_string($conn,$mod))));
       

			if(file_exists("includes/".$row_type['type']."/contentFormat".$_SESSION['lng'].".php"))
                { 
                    $p = "includes/".$row_type['type']."/contentFormat".$_SESSION['lng'].".php";
                } 
            else { $p = 'includes/Main/home'.$_SESSION['lng'].'.php';}

		}

		}else{$p = 'includes/Main/home'.$_SESSION['lng'].'.php';}

/////////////////////////////

function getNomDeDomaine($url) {

    

    $hostname = parse_url($url, PHP_URL_HOST);

    $hostParts = explode('.', $hostname);

    $numberParts = sizeof($hostParts);

    $domain='';

    

    if(1 === $numberParts) {

        $domain = current($hostParts);

    }

    elseif($numberParts>=2) {

        $hostParts = array_reverse($hostParts);

        $domain = $hostParts[2] .'.'. $hostParts[1] .'.'.$hostParts[0];

    }

    return $domain;

}

////////////////////////////

function urlRewrite($pg,$m,$sm,$ssm,$sssm){

if(isset($sssm)&&$sssm!=NULL)	$newUrl = "index.php?pg=".renameTitre($pg)."&m=".$m."&sm=".$sm."&ssm=".$ssm."&sssm=".$sssm;

else if(isset($ssm)&&$ssm!=NULL)	$newUrl = "index.php?pg=".renameTitre($pg)."&m=".$m."&sm=".$sm."&ssm=".$ssm;

	else if(isset($sm)&&$sm!=NULL)	$newUrl = "index.php?pg=".renameTitre($pg)."&m=".$m."&sm=".$sm;

		else $newUrl = "index.php?pg=".renameTitre($pg)."&m=".$m;

	//else $newUrl = renameTitre($pg);

	//$newUrl = $pg.",".$m.",".$sm."html";

		

return $newUrl;

}

///////////calcul date/////////////////

 function nbJours($debut, $fin) {

        //60 secondes X 60 minutes X 24 heures dans une journée

        $nbSecondes= 60*60*24;

 

        $debut_ts = strtotime($debut);

        $fin_ts = strtotime($fin);

        $diff = $fin_ts - $debut_ts;

        return round($diff / $nbSecondes);

    }

////////////////////////////

////////////////////////////

function extraireTxt($txt,$max){

return (strlen($txt) > $max ? substr(substr($txt,0,$max),0,strrpos(substr($txt,0,$max)," "))."&hellip;" : $txt);

}



////////////////////////////

function extraireAct($txt,$max,$url,$style){

	if (strlen($txt)>$max) {$newTxt = substr($txt, 0, $max );

	$newTxt .= '&hellip; ';

	$newTxt .= '  <a href="'.$url.'" class="'.$style.'" title="Lire la suite" >Lire la suite&raquo;</a>';	

	}

	else {$newTxt = $txt;}

return $newTxt;

}



////////////////////////////

function extraireActEn($txt,$max,$url,$style){

	if (strlen($txt)>$max) {$newTxt = substr($txt, 0, $max );

	$newTxt .= '&hellip; ';

	$newTxt .= '  <a href="'.$url.'" class="'.$style.'">Read more</a>';	

	}

	else {$newTxt = $txt;}

return $newTxt;

}



////////////////////////////

function extraireEv($txt,$max){

	if (strlen($txt)>$max) {$newTxt = substr($txt, 0, $max );

	$newTxt .= '&hellip; ';

	}

	else {$newTxt = $txt;}

return $newTxt;

}



////////////////////////////

function extraireEvEn($txt,$max,$url,$style){

	if (strlen($txt)>$max) {$newTxt = substr($txt, 0, $max );

	$newTxt .= '&hellip; ';

	}

	else {$newTxt = $txt;}

return $newTxt;

}



function assign_rand_value($num) {



    // accepts 1 - 36

    switch($num) {

        case "1"  : $rand_value = "a"; break;

        case "2"  : $rand_value = "b"; break;

        case "3"  : $rand_value = "c"; break;

        case "4"  : $rand_value = "d"; break;

        case "5"  : $rand_value = "e"; break;

        case "6"  : $rand_value = "f"; break;

        case "7"  : $rand_value = "g"; break;

        case "8"  : $rand_value = "h"; break;

        case "9"  : $rand_value = "i"; break;

        case "10" : $rand_value = "j"; break;

        case "11" : $rand_value = "k"; break;

        case "12" : $rand_value = "l"; break;

        case "13" : $rand_value = "m"; break;

        case "14" : $rand_value = "n"; break;

        case "15" : $rand_value = "o"; break;

        case "16" : $rand_value = "p"; break;

        case "17" : $rand_value = "q"; break;

        case "18" : $rand_value = "r"; break;

        case "19" : $rand_value = "s"; break;

        case "20" : $rand_value = "t"; break;

        case "21" : $rand_value = "u"; break;

        case "22" : $rand_value = "v"; break;

        case "23" : $rand_value = "w"; break;

        case "24" : $rand_value = "x"; break;

        case "25" : $rand_value = "y"; break;

        case "26" : $rand_value = "z"; break;

        case "27" : $rand_value = "0"; break;

        case "28" : $rand_value = "1"; break;

        case "29" : $rand_value = "2"; break;

        case "30" : $rand_value = "3"; break;

        case "31" : $rand_value = "4"; break;

        case "32" : $rand_value = "5"; break;

        case "33" : $rand_value = "6"; break;

        case "34" : $rand_value = "7"; break;

        case "35" : $rand_value = "8"; break;

        case "36" : $rand_value = "9"; break;

    }

    return $rand_value;

}



function get_rand_numbers($length) {

    if ($length>0) {

        $rand_id="";

        for($i=1; $i<=$length; $i++) {

            mt_srand((double)microtime() * 1000000);

            $num = mt_rand(27,36);

            $rand_id .= assign_rand_value($num);

        }

    }

    return $rand_id;

}

////////////////////////////

function extraireActAr($txt,$max,$url,$style){

	if (strlen($txt)>$max) {$newTxt = substr($txt, 0, $max );

	$newTxt .= '&hellip; ';

	$newTxt .= '  <a href="'.$url.'" class="'.$style.'">&#1605;&#1586;&#1610;&#1583; &#1605;&#1606; &#1575;&#1604;&#1578;&#1601;&#1575;&#1589;&#1610;&#1604;</a>';	

	}

	else {$newTxt = $txt;}

return $newTxt;

}





////////////////////////////

function extraireArt($txt,$max){

	if (strlen($txt)>$max) {$newTxt = substr($txt, 4, $max);}

	else {$newTxt = $txt;}

return $newTxt;

}



////////////////////////////

function showTxt($txt,$min){

	$newTxt = substr($txt, $min);

return $newTxt;

}

////////////////////////////

function extraireTitle($title){

	if (strlen($title)>70) {$newTitle = substr($title, 0, 70);	$newTitle .= "&hellip;";}

	else {$newTitle = $title;}

return $newTitle;

}





///////////////////////////

function datefr($date) { 

	$split = explode(" ",$date);

	$dte = $split[0];

	$split = explode("-",$dte);

	$annee = $split[0];

	$mois = $split[1];

	$jour = $split[2];

return $jour."/".$mois."/".$annee; 

}



///////////////////////////

function dateEn($date) { 

	$split = explode(" ",$date);

	$dte = $split[0];

	$split = explode("-",$dte);

	$annee = $split[0];

	$mois = $split[2];

	$jour = $split[1];

return $jour."-".$mois."-".$annee; 

}

///////////////////////////

function dateAr($date) { 

	$split = explode(" ",$date);

	$dte = $split[0];

	$split = explode("-",$dte);

	$annee = $split[0];

	$mois = $split[1];

	$jour = $split[2];

return $jour."-".$mois."-".$annee; 

}



///////////////////

function sendMail($mail,$titre,$body){

mail ($mail,$titre,$body);

return $mail;

}

////////////////////////////////



function VerifierAdresseMail($adresse)

{

   $Syntaxe='#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,5}$#';

   if(preg_match($Syntaxe,$adresse))

      return true;

   else

     return false;

}

////////////////////////

//////////////////

function renameTitre($str, $charset='utf-8')

{

    $str = htmlentities($str, ENT_NOQUOTES, $charset);

    $str = preg_replace('#\&([A-za-z])(?:acute|cedil|circ|grave|ring|tilde|uml)\;#', '\1', $str);

    $str = preg_replace('#\&([A-za-z]{2})(?:lig)\;#', '\1', $str);

    $str = preg_replace('#\&[^;]+\;#', '', $str);

	$str = preg_replace('#[^a-zA-Z0-9\-\._]#', '-', $str);

    return strtolower($str);

}



/////////////////

function tailleFichier($fichier)

{

	$taille_fichier = filesize($fichier);



	if ($taille_fichier >= 1073741824) {$taille_fichier = round($taille_fichier / 1073741824 * 100) / 100 . " Go";}

	elseif ($taille_fichier >= 1048576){ $taille_fichier = round($taille_fichier / 1048576 * 100) / 100 . " Mo";}

	elseif ($taille_fichier >= 1024) {$taille_fichier = round($taille_fichier / 1024 * 100) / 100 . " Ko";}

	else {$taille_fichier = $taille_fichier . " o";} 

	return $taille_fichier;

}

///////////////////////////////

function extraireDate($dte,$min,$max){

	$dte = substr($dte, $min, $max);

return $dte;

}

////////////////////////

/////////////////////////////



function formatedTxt($txt){

 $txtFormated = preg_replace(" /<[^>]*>/", "", trim(strip_tags($txt))); 

 return $txtFormated;

}

////////////////////////////

///////////////////////



function formatDate($date) { 

	$split = split(" ",$date);

	$dte = $split[0];

	$split = split("-",$dte);

	$annee = $split[0];

	$mois = $split[1];

	$jour = $split[2];

return $annee.$mois.$jour; 

}



function formatInverseDate($date) { 

	$date = extraireDate($date,0,4)."-".extraireDate($date,4,2)."-".extraireDate($date,6,2);

	return $date;

}

////////////////////////////

function deleteLastChar($str) { 



$newStr=array();

for ($i=0;$i<(strlen($str)-1);$i++) {

$newStr[$i]=$str[$i];

}

$newChaine = NULL;

for ($i=0;$i<count($newStr);$i++) {

$newChaine .= $newStr[$i];

}

return $newChaine;

}



/////////////////////////////

 function youtubeId($url){

	$parsed_url = parse_url($url);	

	if (strpos($parsed_url['query'], "v=") === false) {

		$query = $parsed_url[path]; 

		$debut = strpos($query, "v/")+2; 

		$temp = substr($query, $debut, strlen($query));

		$pos = strpos($temp, "/");

		$fin = ($pos === false)?strlen($query):$pos; 

		$youtubeId = substr($query, $debut, $fin);

	} else {

		$query = $parsed_url[query];

		parse_str($query, $output);

		$youtubeId =  $output['v'];

	}

	return $youtubeId;

}







//////////////////////add date month////////

function add_date($date_str, $months)

{

    $date = new DateTime($date_str);

    $start_day = $date->format('j');



    $date->modify("+{$months} month");

    $end_day = $date->format('j');



    if ($start_day != $end_day)

        $date->modify('last day of last month');



    return $date;

}

////////// la partie numeric

function keepOnlyNumeric($text){ 

   $validChars = "0123456789"; 

   $strOnlyNumeric = ""; 

   $longueurtext = strlen($text); 

   for($i=0;$i<$longueurtext;$i++) { 

      $lettre = substr($text,$i,1); 

      $pos = strpos($validChars, $lettre); 

      if($pos !== FALSE) { 

          $strOnlyNumeric .= $lettre; 

      } 

   } 

 return $strOnlyNumeric; 

} 

function curPageURL() {

 $pageURL = 'http';

 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}

 $pageURL .= "://";

 if ($_SERVER["SERVER_PORT"] != "80") {

  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];

 } else {

  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];

 }

 return $pageURL;

}



///////////keyword SEO///////////

function unaccent($text)

{

$trans = get_html_translation_table(HTML_ENTITIES);

foreach ($trans as $literal => $entity)

{

if (ord($literal) >= 192) {

$replace[] = substr($entity, 1, 1);

$search[] = $literal;

}

}

return str_replace($search, $replace, $text);

}

/* Fonction qui génère les keywords */

function keywords($string, $max_length_keywords)

{

$noTag = html_entity_decode(strip_tags(trim($noTag))); // On nettoie la chaine

$noTag = preg_replace('/[\n\r\t]/', ' ', $noTag); // On élimine les retours chariot, retours à la ligne et tabulations



$string = strtolower($string); // Met tout en minuscule

$string = unaccent($string); // Enleve les accents

$string = eregi_replace("[^A-Z\']", " ", $string); // Enlève tout ce qui n'est pas alphabétique ou une apostrophe

$string = preg_replace('#(^| +)[a-zA-Z]{1,2}\'#', ' ', $string); // Enleve les apostrophes



$words = explode(' ', $string); // Scinde la chaine en tableau



/* Effacement des mots non significatifs (Tableau exemple à compléter) */

$bad_word = array ('des', 'est', 'avec', 'les', 'une', 'sur', 'nous', 'qui', 'que', 'par', 'pas', 'dans', 'leur', 'ont', 'pour', 'sont', 'plus', 'ndlr', 'ceux', 'ceci', 'cela','cette');

$words = array_diff($words, $bad_word);



/* Suppression des entrées de moins de trois caractères */

foreach($words as $cle=>$valeur)

{

if(strlen($valeur) > 2)

{

$words2[]=$words[$cle];

}

}



$freq = array_count_values($words2); // Calcul du nombre d'occurences de chaque entrée

arsort($freq); // Tri du tableau associatif en fonction des valeurs



/* Création de la chaine de sortie */

$keywords='';

foreach ($freq as $tk => $tv)

{

	if($keywords!='') $keywords .= ', '.$tk;

	else $keywords=$tk;

}



if(strlen($keywords)>$max_length_keywords)

{

	$keywords=substr($keywords,1,$max_length_keywords); // On coupe à $max_length_keywords caractères

	$keywords=substr($keywords,0,strlen($keywords)-strlen(strrchr($keywords,','))); // Coupe propre après le dernier mot clé

}



return $keywords;

}



define('SALT_LENGTH', 15);

	function HashMe($phrase, &$salt = null)

	{

	$key = '!@#$%^&*()_+=-{}][;";/?<>.,';

	    if ($salt == '')

	    {

	        $salt = substr(hash('sha512',uniqid(rand(), true).$key.microtime()), 0, SALT_LENGTH);

	    }

	    else

	    {

	        $salt = substr($salt, 0, SALT_LENGTH);

	    }

	 

	    return hash('sha512',$salt . $key .  $phrase);

	}

/////exemple : $chaine="Ce texte, <br />rédigé aujourd'hui,<b>HTML</b> !!!";echo keywords($chaine,1000);///////

/////////////////////





function shinra_gplus_count( $url ) {

    /* get source for custom +1 button */

    $contents = file_get_contents( 'https://plusone.google.com/_/+1/fastbutton?url=' .  $url );

 

    /* pull out count variable with regex */

    preg_match( '/window\.__SSR = {c: ([\d]+)/', $contents, $matches );

 

    /* if matched, return count, else zed */

    if( isset( $matches[0] ) ) 

        return (int) str_replace( 'window.__SSR = {c: ', '', $matches[0] );

    return 0;

}



function shinra_twitter_count( $url ) {

    /* build the pull URL */

    $url = 'http://cdn.api.twitter.com/1/urls/count.json?url=' . urlencode( $url );

  

    /* get json */

    $json = json_decode( file_get_contents( $url ), false );

    if( isset( $json->count ) ) return (int) $json->count;

  

    return 0; // else zed

}

function shinra_fb_count( $url_or_id ) {

    /* url or id (for optional validation) */

    if( is_int( $url_or_id ) ) $url = 'http://graph.facebook.com/' . $url_or_id;

    else $url = 'http://graph.facebook.com/' .  $url_or_id;

 

    /* get json */

    $json = json_decode( file_get_contents( $url ), false );

 

    /* has likes or shares? */

    if( isset( $json->likes ) ) return (int) $json->likes;

    elseif( isset( $json->shares ) ) return (int) $json->shares;

 

    return 0; // otherwise zed

}

?>

