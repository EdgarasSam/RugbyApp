<?php
include'Database.php';
//Database priskirimas
$sql = mysql_query("SELECT * FROM komanda");
$id = "id";
$numeris =  "numeris";
$zaidejo_vardas = "zaidejo_vardas";
$zaidejo_pavarde = "zaidejo_pavarde";
$amzius = "amzius";
echo '
<div class="content table-responsive table-full-width">
<table class="table table-hover">
<div class="row">
  <div class="col-md-12">
  <div class="col-md-3" width="5%">
  <div class="komandapop">
      <!-- Button HTML (to Trigger Modal) -->
      <a href="#myModal"  class="btn btn-primary" data-toggle="modal">Pridėti</a>
</div>
  </div>
      <div class="card">
      <div class="header">
          <h4 class="title"><b>RC Vairas komandos žaidėjai</b></h4>
      </div>
                <thead>
                  <tr>
                    <th>Žaidėjo numeris</th>
                    <th>Vardas</th>
                    <th>Pavardė</th>
                    <th>Amžius</th>
                  </tr>
                </thead>
                <tbody>';
              while($rows = mysql_fetch_assoc($sql)){
                echo '
                <tr>
                      <td>'.$rows[$numeris].'</td>
                      <td>'.$rows[$zaidejo_vardas].'</td>
                      <td>'.$rows[$zaidejo_pavarde].'</td>
                      <td>'.$rows[$amzius].'</td>
                      <td width="5%"><a class="btn btn-warning Salinti" delete_reiksme="'.$rows[$id].'">Ištrinti</a></td>
                      <td width="5%"><a href="edit.php?upd='.$rows[$id].'&name='.$rows[$zaidejo_vardas].'&pav='.$rows[$zaidejo_pavarde].'&amz='.$rows[$amzius].'&num='.$rows[$numeris].'" onClick="next()" data-toggle="modal"  class="btn btn-primary">Atnaujinti</a></td>
                    </tr>

                    ';
                  }
                  echo '
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
                      <h4 class="modal-title">Naujo žaidėjo pridėjimas</h4>
                  </div>
                  <div class="modal-body">
                  <table class="table">
                  <form action="insert.php" method="POST">
                  <tr><td>Žaidejo nr.: <input type="number" class="resizedzaidejonr" size="20px" name="numeris"></td></tr>
                  <tr><td>Žaidejo vardas: <input type="text" class="resizedzaidejovar" name="zaidejo_vardas"></td></tr>
                  <tr><td>Žaidejo pavardė: <input type="text"class="resizedzaidejopav"  name="zaidejo_pavarde"></td></tr>
                  <tr><td>Amžius: <input type="number"  class="resizedamzius" name="amzius"></td></tr>
                  </table>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                      <input type="submit" value="Pridėti" class="btn btn-primary" name="komandains">
                  </div>
                  </form>
              </div>
          </div>
      </div>
  <script type="text/javascript">
  var id;
  $(".Salinti").unbind().click(function() {
      var id = $(this).attr("delete_reiksme");
      $(".Salinti").css("background-color", "red");
      console.log($(this).attr("delete_reiksme"));
      if (confirm("Ar tikrai norite ištrinti įrašą?"))
         location.href=href="delete.php?del=" + id;
  });
        </script>
                 //Koreguota

                //$(".ATNAUJ").unbind().click(function() {
                //	console.log("Paspaustas atnaujinimo id: " + $(this).attr("id"));
                //	$("#KREIPTIS_I").attr("action", "update.php");
                //	$(".modal-title").text("Atnaujinti varžybų informaciją");
                //});
      <script type="text/javascript">
        function nxt()
        {

            location.href="edit.php";

                 return false;
        }
  </script>
';

?>
