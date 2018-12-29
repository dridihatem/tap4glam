<?php
   class Pagination{
		public static function affiche($chemin,$nomget,$total,$courante=1,$affichage=2){
			$html = '';
			if($total<=1)
				return $html;
			$precedent = $courante-1;
			$suivant = $courante+1;
			$textePrecedent = '<<';
			$texteSuivant = '>>';
			$html .= '   <ul class="pagination">';
			if ($courante == 2) 	$html.= Pagination::lien($chemin,$textePrecedent);
       		elseif($courante > 2) 	$html.= Pagination::lien($chemin,$textePrecedent,$nomget,$precedent);
        	else 					$html.= '<a href="">'.$textePrecedent.'</a>';
			
			if($total < 7 + $affichage*2){

				$html.= ($courante == 1) ? '<a href="">1</a>' : Pagination::lien($chemin,'1',$nomget,1);

	            for ($i = 2; $i <= $total; $i++){
	                if ($i == $courante) 	$html.= '<a href="">'.$i.'</a>';
	                else 	$html.= Pagination::lien($chemin,$i,$nomget,$i);
	            }
			} elseif($total > 5 + ($affichage * 2)){
				if($courante < 1+($affichage * 2)){
				$html.= ($courante == 1) ? '<a href="">1</a>' : Pagination::lien($chemin,'1',$nomget,1);

		           for($i = 2; $i < 4 + ($affichage * 2); $i++){
		                if ($i == $courante) 	$html.= '<a href="">'.$i.'</a>';
		                else 					$html.= Pagination::lien($chemin,$i,$nomget,$i);
					}
                	$html.= " ... ";

	                $html.= Pagination::lien($chemin,$total-1,$nomget,$total-1);
	                $html.= Pagination::lien($chemin,$total,$nomget,$total);
				}elseif($total - ($affichage * 2) > $courante && $courante > ($affichage * 2)){
	                $html.= Pagination::lien($chemin,'1',$nomget,1);
	                $html.= Pagination::lien($chemin,'2',$nomget,2);
	                $html.= " ... ";
	
	                for ($i= $courante - $affichage; $i<= $courante + $affichage; $i++){
	                    if ($i== $courante)
	                        $html.= '<a href="">'.$i.'</a>';
	                    else
	                        $html.= Pagination::lien($chemin,$i,$nomget,$i);
	                }
	
	                $html.= " ... ";

                	$html.= Pagination::lien($chemin,$total-1,$nomget,$total-1);
                	$html.= Pagination::lien($chemin,$total,$nomget,$total);
            	}
				 else{
	                $html.= Pagination::lien($chemin,'1',$nomget,1);
	                $html.= Pagination::lien($chemin,'2',$nomget,2);
	                $html.= " ... ";
	
	                for ($i = $total - (2 + ($affichage * 2)); $i <= $total; $i++){
	                    if ($i == $courante)
	                        $html.= '<a href="">'.$i.'</a>';
	                    else
	                        $html.= Pagination::lien($chemin,$i,$nomget,$i);
	                }
 	           }
			}
            
			if ($courante < $total)
            	$html.= Pagination::lien($chemin,$texteSuivant,$nomget,$suivant);
        	else
			    $html.= '<a href="" >'.$texteSuivant.'</a>';
				$html .= '</ul>';
			echo $html;
   		}
		
		public static function lien($chemin,$texte,$parametre='',$valeur=''){
			$lien = '<li class="active"><a href="'.$chemin;
			if(!empty($parametre))	$lien .= '&'.$parametre.'='.$valeur;
			$lien .= '" title="'.$texte.'">'.$texte.'</a></li>';
			return $lien;
		}
		
   }
?>
