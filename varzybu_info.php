<?php
include'Database.php';
$sql = mysql_query("SELECT * FROM varzybu_vieta");
$id = "id";
$Salis = "Salis";
$Miestas = "Miestas";
$Data = "Data";
$Adresas = "Adresas";
$Kord_ilg = "Kord_ilg";
$Kord_plot = "Kord_plot";
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
              <h4 class="title"><b>Rungtynių informacija</b></h4>
          </div>
  <thead>
    <tr>
      <th>Šalis</th>
      <th>Miestas</th>
      <th>Data</th>
      <th>Adresas</th>
      <th>Kord_ilgis</th>
      <th>Kord_plotis</th>
    </tr>
  </thead>
  <tbody>';
while($rows = mysql_fetch_assoc($sql)){
  echo '
      <tr>
        <td>'.$rows[$Salis].'</td>
          <td>'.$rows[$Miestas].'</td>
          <td>'.$rows[$Data].'</td>
          <td>'.$rows[$Adresas].'</td>
          <td>'.$rows[$Kord_ilg].'</td>
          <td>'.$rows[$Kord_plot].'</td>
        <td width="5%"><a class="btn btn-warning SALINTI" salinimo_reiksme="'.$rows[$id].'">Ištrinti</a></td>
        <td width="5%"><a href="editinfo.php?updin='.$rows[$id].'&salis='.$rows[$Salis].'&miestas='.$rows[$Miestas].'&data='.$rows[$Data].'&adres='.$rows[$Adresas].'&kodi='.$rows[$Kord_ilg].' &kodp='.$rows[$Kord_plot].'" data-toggle="modal"  class="btn btn-primary">Atnaujinti</a></td>';

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
            <tr><td>Šalis: <input type="text" class="resizedkomandos_pav" name="Salis"></td></tr>
            <tr><td>Miestas: <input type="text" class="resizedkomandos_pav" name="Miestas"></td></tr>
            <tr><td>Data: <input type="text" class="resizedkomandos_pav" name="Data"></td></tr>
            <tr><td>Adresas: <input type="text" class="resizedkomandos_pav" name="Adresas"></td></tr>
            <tr><td>Kord_ilgis: <input type="text" class="resizedkomandos_pav" name="Kord_ilg"></td></tr>
            <tr><td>Kord_plotis: <input type="text" class="resizedkomandos_pav" name="Kord_plot"></td></tr>
            </table>
			</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                <div id="pridejimo_atnaujinimo_mygtukas" class="btn btn-primary" name="info">Pridėti</div>
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
		$(".modal-title").text("Pridėti varžybų informacija");
    $("#pridejimo_atnaujinimo_mygtukas").text("Pridėti");

    $("#pridejimo_atnaujinimo_mygtukas").unbind().click(function(){
			console.log("kreipiamas i insert.php per ajax");

      var Miestas_reiksme = $("input[name=Miestas]").val();
  		var Salis_reiksme = $("input[name=Salis]").val();
  		var Adresas_reiksme = $("input[name=Adresas]").val();
  		var Data_reiksme = $("input[name=Data]").val();
  		var Kord_ilg_reiksme = $("input[name=Kord_ilg]").val();
      var Kord_plot_reiksme = $("input[name=Kord_plot]").val();

      var params = {
  			info:"",
  			id: id,
        Miestas : Miestas_reiksme,
        Salis : Salis_reiksme,
        Adresas : Adresas_reiksme,
        Data : Data_reiksme,
        Kord_ilg : Kord_ilg_reiksme,
        Kord_plot : Kord_plot_reiksme
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

	$(".ATNAUJINTI").click(function() {
		id = $(this).attr("id");
    console.log("Atnaujinti")
		$("#KREIPTIS_I").attr("action", "update.php");
		$(".modal-title").text("Atnaujinti varžybų informaciją");
		$("#pridejimo_atnaujinimo_mygtukas").text("Atnaujinti");

		$("#pridejimo_atnaujinimo_mygtukas").unbind().click(function(){
			console.log("Kreipsis i php per ajax");

    var Miestas_reiksme = $("input[name=Miestas]").val();
    var Salis_reiksme = $("input[name=Salis]").val();
    var Adresas_reiksme = $("input[name=Adresas]").val();
    var Data_reiksme = $("input[name=Data]").val();
    var Kord_ilg_reiksme = $("input[name=Kord_ilg]").val();
    var Kord_plot_reiksme = $("input[name=Kord_plot]").val();

		var params = {
			updateinfo:"",
			id: id,
      Miestas : Miestas_reiksme,
      Salis : Salis_reiksme,
      Adresas : Adresas_reiksme,
      Data : Data_reiksme,
      Kord_ilg : Kord_ilg_reiksme,
      Kord_plot : Kord_plot_reiksme

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
	});

            	/*$(".komanda").click(function() {
            		$.ajax({
            			url: komanda.php
            		});
            		$(".main-panel").html(response);
            	});*/
	$(".SALINTI").click(function() {
		  var id = $(this).attr("salinimo_reiksme");
		  if (confirm("Ar tikrai norite ištrinti įrašą?"))
			   location.href=href="delete.php?delinfo=" + id;
	});
});

</script>

';
?>
