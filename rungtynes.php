<?php
include'Database.php';
$sql = mysql_query("SELECT * FROM varzybos");
$id = "id";
$komanda1 =  "komanda1";
$taskai1 = "taskai1";
$laikas= "laikas";
$taskai2 = "taskai2";
$komanda2 = "komanda2";
echo '
<div class="content table-responsive table-full-width">
<table class="table table-hover">
<div class="row">
  <div class="col-md-12">
  <div class="col-md-3">
  <div class="komandapop">
      <!-- Button HTML (to Trigger Modal) -->
      <a href="#myModal" class="btn btn-primary PRIDETI" data-toggle="modal">Pridėti</a>
</div>
  </div>
      <div class="card">
          <div class="header">
              <h4 class="title"><b>Rungtynės</b></h4>
          </div>
  <thead>
    <tr>
      <th>Komandos pavadinimas</th>
      <th>Taškai</th>
      <th>Laikas</th>
      <th>Taškai</th>
      <th>Komandos pavadinimas</th>
    </tr>
  </thead>
  <tbody>';
while($rows = mysql_fetch_assoc($sql)){
  echo '
      <tr>
      <td style="display:none;"></td>
          <td>'.$rows[$komanda1].'</td>
          <td>'.$rows[$taskai1].'</td>
          <td>'.$rows[$laikas].'</td>
          <td>'.$rows[$taskai2].'</td>
          <td>'.$rows[$komanda2].'</td>
        <td width="5%"><a class="btn btn-warning SALINTI" salinimo_reiksme="'.$rows[$id].'">Ištrinti</a></td>
        <td width="5%"><a href="editvarz.php?upd='.$rows[$id].'&kom1='.$rows[$komanda1].'&tas1='.$rows[$taskai1].'&laikas='.$rows[$laikas].'&tas2'.$rows[$taskai2].'&kom2='.$rows[$komanda2].'" data-toggle="modal"  class="btn btn-primary">Atnaujinti</a></td>';

		//Koreguota
		//echo '<a href="#myModal" class="btn ATNAUJINTI" id="'.$rows[$id].'" data-toggle="modal">Atnaujinti</a>';

		echo '
		</td>
      </tr>
';
    }
    echo'
    </tbody>

  </table>
  </div>
  </div>
  </div>
  </div>
  </table>
  </div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				';

                //Koreguota
				echo '<h4 class="modal-title"></h4>'; //Pridėti komandas
				echo '
            </div>
            <div class="modal-body">
			<form id="pridejimo_atnaujinimo_forma">
            <table class="table">
            <tr><td> 1 Komandos Pavadinimas.: <input type="text" class="resizedkomandos_pav" name="komanda1"></td></tr>
            <tr><td>1 komandos taškai: <input type="number" class="resizedzaidejonr" name="taskai1"></td></tr>
            <tr><td> Varžybų Laikas: <input type="text"class="resizedtasku_santykis"  name="laikas"></td></tr>
            <tr><td>2 komandos taškai: <input type="number" class="resizedzaidejonr" name="taskai2"></td></tr>
            <tr><td>2 Komandos Pavadinimas.: <input type="text" class="resizedkomandos_pav" name="komanda2"></td></tr>
            </table>
			</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                <div id="pridejimo_atnaujinimo_mygtukas" class="btn btn-primary" name="rungtynes">Pridėti</div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function() {

	var id;

	//Koreguota
	$(".PRIDETI").unbind().click(function() {
		console.log("Prideti");
		$("#pridejimo_atnaujinimo_forma").attr("action", "insert.php");
		$(".modal-title").text("Pridėti varžybas");
    $("#pridejimo_atnaujinimo_mygtukas").text("Pridėti");

    $("#pridejimo_atnaujinimo_mygtukas").unbind().click(function(){
			console.log("kreipiamas i insert.php per ajax");

      var komanda1_reiksme = $("input[name=komanda1]").val();
  		var taskai1_reiksme = $("input[name=taskai1]").val();
  		var laikas_reiksme = $("input[name=laikas]").val();
  		var komanda2_reiksme = $("input[name=komanda2]").val();
  		var taskai2_reiksme = $("input[name=taskai2]").val();

      var params = {
  			rungtynes:"",
  			id: id,
  			komanda1: komanda1_reiksme,
  			taskai1: taskai1_reiksme,
  			laikas: laikas_reiksme,
  			komanda2: komanda2_reiksme,
  			taskai2: taskai2_reiksme,

              };

              console.log(params);
              $.ajax({
                type: \'POST\', //naudoju POST, nes kitos programos POST naudoja is formos duomenu paemimui ir atidavimui
                data: params, //data (duomenys) persiduoda i php su params (parametrais)
                // dataType: "json", //nenaudoju dabar nes man reikia uztenka perduoti ir grazinti paprastus duomenis, jeigu butu daugiau duomenu tuomet json naudoti reiktu
                url: \'insert.php\', //php skriptas i kuri kreipiasi ajax
                success: function(grazino) {
                   if( grazino == "Atnaujino"){
                     window.location.reload();
                   }
                },
                error:function(response){

                }
              });
      });
	});

	/*$(".ATNAUJINTI").click(function() {
		id = $(this).attr("id");
    console.log("Atnaujinti")
		$("#KREIPTIS_I").attr("action", "update.php");
		$(".modal-title").text("Atnaujinti varžybų informaciją");
		$("#pridejimo_atnaujinimo_mygtukas").text("Atnaujinti");

		$("#pridejimo_atnaujinimo_mygtukas").unbind().click(function(){
			console.log("Kreipsis i php per ajax");
		var komanda1_reiksme = $("input[name=komanda1]").val();
		var taskai1_reiksme = $("input[name=taskai1]").val();
		var laikas_reiksme = $("input[name=laikas]").val();
		var komanda2_reiksme = $("input[name=komanda2]").val();
		var taskai2_reiksme = $("input[name=taskai2]").val();


		var params = {
			updaterung:"",
			id: id,
			komanda1: komanda1_reiksme,
			taskai1: taskai1_reiksme,
			laikas: laikas_reiksme,
			komanda2: komanda2_reiksme,
			taskai2: taskai2_reiksme,
  

		};
		console.log(params);
		$.ajax({
			type: \'POST\', //naudoju POST, nes kitos programos POST naudoja is formos duomenu paemimui ir atidavimui
			data: params, //data (duomenys) persiduoda i php su params (parametrais)
			// dataType: "json", //nenaudoju dabar nes man reikia uztenka perduoti ir grazinti paprastus duomenis, jeigu butu daugiau duomenu tuomet json naudoti reiktu
			url: \'update.php\', //php skriptas i kuri kreipiasi ajax
			success: function(grazino) {
        if( grazino == "Atnaujino"){
          window.location.reload();
        }
			},
			error:function(response){

			}
		});

		});
	});*/

            	/*$(".komanda").click(function() {
            		$.ajax({
            			url: komanda.php
            		});
            		$(".main-panel").html(response);
            	});*/
	$(".SALINTI").click(function() {
		  var id = $(this).attr("salinimo_reiksme");
		  if (confirm("Ar tikrai norite ištrinti įrašą?"))
			   location.href=href="delete.php?deli=" + id;
	});
});

</script>

';
 ?>
