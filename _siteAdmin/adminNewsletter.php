 <h4 class="page-title">Gestion des Newsletters</h4>
 <?php require("msg.php");?>
 <div class="panel-heading">
                                 
                                    <div class="pull-right">
                                        <button class="btn btn-danger toggle" data-toggle="exportTable"><i class="fa fa-bars"></i> Export Data</button>
                                    </div>
                                </div>
                                <div class="panel-body" id="exportTable" style="display:none">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#data_table').tableExport({type:'json',escape:'false'});"><img src='images/icons/json.png' width="24"/> JSON</a>
                                                <a href="#" class="list-group-item" onClick ="$('#data_table').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='images/icons/json.png' width="24"/> JSON (ignoreColumn)</a>
                                                <a href="#" class="list-group-item" onClick ="$('#data_table').tableExport({type:'json',escape:'true'});"><img src='images/icons/json.png' width="24"/> JSON (with Escape)</a>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#data_table').tableExport({type:'xml',escape:'false'});"><img src='images/icons/xml.png' width="24"/> XML</a>
                                                <a href="#" class="list-group-item" onClick ="$('#data_table').tableExport({type:'sql'});"><img src='images/icons/sql.png' width="24"/> SQL</a>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick="doExport('#data_table', {type: 'csv'});"><img src='images/icons/csv.png' width="24"/> CSV</a>
                                                <a href="#" class="list-group-item" onClick ="$('#data_table').tableExport({type:'txt',escape:'false'});"><img src='images/icons/txt.png' width="24"/> TXT</a>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="list-group border-bottom">
                                                <a href="#" class="list-group-item" onClick ="$('#data_table').tableExport({type:'excel',escape:'false'});"><img src='images/icons/xls.png' width="24"/> XLS</a>
                                                <a href="#" class="list-group-item" onClick ="$('#data_table').tableExport({type:'doc',escape:'false'});"><img src='images/icons/word.png' width="24"/> Word</a>
                                            </div>
                                        </div>
                                        
                                    </div>                               
                                </div>
 <div class="block-area">
  
<br />
 <div class="table-responsive overflow">
                        <table class="table table-bordered table-hover tile" id="data_table">
                            <thead>
                                <tr>
                                    <th>E-mail</th>
                  									<th>Nom &nbsp; pr&eacute;nom </th>
                                    <th>Data inscription</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php 
$rst1 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_revendeur order by date_inscription DESC"));

$nb_lignes = mysql_num_rows($rst1);
if ($nb_lignes>0){

  
  while($row=mysql_fetch_object($rst1)){  
  

?>
<tr>


<td>
          <?php  echo stripslashes($row->email);?>
        </td>
<td><?php  echo stripslashes($row->nom);?></td>
<td><?php echo datefr($row->date_inscription); ?></td>
</tr>
<?php } }?>
   <?php 
$rst2 = mysql_query(sprintf(" select * from ".$_SESSION['pfx']."_suggestion order by date_insertion DESC"));

$nb_lignes1 = mysql_num_rows($rst2);
if ($nb_lignes1>0){

  
  while($row1=mysql_fetch_object($rst2)){  
  
?>
<tr>


<td>
          <?php  echo stripslashes($row1->email);?>
        </td>
<td><?php  echo stripslashes($row1->nom);?></td>
<td><?php echo datefr($row1->date_insertion); ?></td>
</tr>
<?php } }?>


                            </tbody>
                        </table>
                    </div>
</div>
