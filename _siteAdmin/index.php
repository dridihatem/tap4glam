<?php
error_reporting(0);
session_start();
$_SESSION['pfx'] = "tap";

require_once("../modules/connection.class.php");
$db = new DB();
$conn = $db->connect();
	require_once("controller/diversFunction.php");
	require_once("../modules/administrator.class.php");
	require_once("../modules/modules.class.php");
	require_once("../modules/contact.class.php");
	require_once("../modules/client.class.php");
	require_once("../modules/slide.class.php");
	require_once("../modules/actualite.class.php");
	require_once("../modules/configuration.class.php");
	require_once("../modules/categorie.class.php");
	require_once("../modules/sous_categorie.class.php");
	require_once("../modules/service.class.php");
	require_once("../modules/prix_service.class.php");
	require_once("../modules/code_promo.class.php");
	require_once("../modules/code_vip.class.php");
	require_once("../modules/prestataire.class.php");
	require_once("../modules/fournisseur.class.php");
	require_once("../modules/pack.class.php");
	require_once("../modules/option_service.class.php");
    require_once("../modules/promotion.class.php");
    require_once("../modules/reservation.class.php");
if(isset($_GET['disconnect'])){ unset($_SESSION["idadmin"]);}
header('Content-Type: text/html; charset= utf-8', true);

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<title>Tableau de bord Tap4glam</title>
<link href="assets/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="assets/assets/plugins/shape-hover/css/demo.css" />
<link rel="stylesheet" type="text/css" href="assets/assets/plugins/shape-hover/css/component.css" />
<link rel="stylesheet" type="text/css" href="assets/assets/plugins/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="assets/assets/plugins/owl-carousel/owl.theme.css" />
<link href="assets/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen" />
<link rel="stylesheet" href="assets/assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen">
<link rel="stylesheet" href="assets/assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen">

<link href="assets/assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />



<link href="assets/assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="assets/assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />

<link href="assets/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="assets/assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
<link href="assets/webarch/css/webarch.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
</head>

        <body <?php if(!isset($_SESSION['idadmin']) && empty($_SESSION['idadmin'])){echo ' class="error-body no-top lazy" data-original="assets/assets/img/work.jpg" style="background-image: url(\'assets/assets/img/work.jpg\')" ';} ?>>
            
		<?php
                
                if(isset($_SESSION['idadmin']) && (!empty($_SESSION['idadmin']))){
                

                    require ("header.php");
                    echo '<div class="page-container row-fluid">';
                    require("menu.php");
                    if(file_exists($_GET["pg"].".php")){require($_GET["pg"].".php");}
                    else {require("tableau-de-bord.php");}
                    echo '</div>';
                
          }else {require("formAuthentification.php");}
				
			?>

</div>


		<!-- end #footer -->

<script src="assets/assets/plugins/pace/pace.min.js" type="text/javascript"></script>

<script src="assets/assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="js/multiselect.js" type="text/javascript"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#multiselect1').multiselect();
    $('#multiselect2').multiselect();
});
</script>

<script src="assets/webarch/js/webarch.js" type="text/javascript"></script>
<script src="assets/assets/js/chat.js" type="text/javascript"></script>


<script src="assets/assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
<script src="assets/assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
<script src="assets/assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
<script src="assets/assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="assets/assets/plugins/skycons/skycons.js"></script>
<script src="assets/assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=true"></script>
<script src="assets/assets/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script>
<script src="assets/assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
<script src="assets/assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>


<?php
if($_GET['pg'] =="tableau-de-bord"){ ?>

<script src="assets/assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>
<script src="assets/assets/plugins/Mapplic/mapplic/mapplic.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
<script src="assets/assets/js/dashboard_v2.js" type="text/javascript"></script>
<?php } ?>


<script src="assets/assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>

<script src="assets/assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="assets/assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<script src="assets/assets/js/datatables.js" type="text/javascript"></script>

<script type="text/javascript">
function deleteConfirm(){
    var result = confirm("Do you really want to delete records?");
    if(result){
        return true;
    }else{
        return false;
    }
}
</script>
<script language="javascript" type="text/javascript">
var select_all = document.getElementById("checkAll"); //select all checkbox
var checkboxes = document.getElementsByClassName("checklist"); //checkbox items

//select all checkboxes
select_all.addEventListener("change", function(e){
    for (i = 0; i < checkboxes.length; i++) { 
        checkboxes[i].checked = select_all.checked;
    }
});


for (var i = 0; i < checkboxes.length; i++) {
    checkboxes[i].addEventListener('change', function(e){ //".checkbox" change 
        //uncheck "select all", if one of the listed checkbox item is unchecked
        if(this.checked == false){
            select_all.checked = false;
        }
        //check "select all" if all checkbox items are checked
        if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
            select_all.checked = true;
        }
    });
}

    


</script>

<script>
                   $(document).ready(function () {

                var counter = 1;

                $("#addrow").on("click", function () {

                    var newRow = $("<tr>");
                    var cols = "";
                    cols += ' <td class="col-sm-2"><div class="input-append success"> <input type="hidden" name="count[]" ><input type="color" name="color[]"  class="form-control" id="bg' +counter+ '" value=""/></div><span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span></td>';
                    cols += '<td class="col-sm-6"><div class="input-append success"> <input type="file" class="form-control" name="fichier_couleur[]"   accept="image/*" /></td>';
                            cols += '<td class="col-sm-4"><input type="number" class="form-control" name="ordre[]" value="" /></div></td>';

                    cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Supprimer"></td>';
                    newRow.append(cols);
                    $("table.order-list").append(newRow);


                         $('#bg'+counter).change(function(){
                            $('#bg'+counter).css('background-color',$('#bg'+counter).val());
                            $('#bg'+counter).attr('value', $('#bg'+counter).val());
                        });

                    counter++;
                });
                    var counterdimension =1;
                    $("#ajouterdimension").on("click", function () {

                            var newRowdimension = $("<tr>");
                            var colsdimension = "";
                            colsdimension += ' <td class="col-sm-2"> <div class="input-append success"> <input type="date" name="date_debut[]"  class="form-control" value="" style="width: 87%;"/><span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span></div></td>';
                            colsdimension += '<td class="col-sm-2"><div class="input-append success"> <input type="date" class="form-control" name="date_fin[]" value="" style="width: 87%;"/><span class="add-on"><span class="arrow"></span><i class="fa fa-calendar"></i></span></div></td>';
                            colsdimension += ' <td class="col-sm-2"> <input type="text" name="prix[]"  class="form-control" value=""/></td>';
                            colsdimension += '<td class="col-sm-2"><input type="text" class="form-control" name="prix_promo[]" value="" /></td>';

                            colsdimension += '<td class="col-sm-2"><input type="button" class="ibtnDeldimension btn btn-md btn-danger "  value="X"></td>';
                            newRowdimension.append(colsdimension);
                            $("table.order-listdimension").append(newRowdimension);
                        });

                            counterdimension++;
                    });


                $("table.order-list").on("click", ".ibtnDel", function (event) {
                    $(this).closest("tr").remove();
                    counter -= 1
                });
                    $("table.order-listdimension").on("click", ".ibtnDeldimension", function (event) {
                            $(this).closest("tr").remove();
                            counterdimension -= 1
                    });




                   </script>

</body>
</html>
