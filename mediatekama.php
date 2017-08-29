<?php
include'Database.php';
//Database priskirimas
$sql = mysql_query("SELECT * FROM mediatekama");
$id = "id";
$pavadinimas =  "pavadinimas";
$data = "data";
$antraste = "antraste";
$video = "video";
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
          <h4 class="title"><b>Mediateka</b></h4>
      </div>
                <thead>
                  <tr>
                    <th>Pavadinimas</th>
                    <th>Data</th>
                    <th>Antraštė</th>
                    <th>Video/URL</th>
                  </tr>
                </thead>
                <tbody>';
              while($rows = mysql_fetch_assoc($sql)){
                echo '
                <tr>
                      <td>'.$rows[$pavadinimas].'</td>
                      <td>'.$rows[$data].'</td>
                      <td>'.$rows[$antraste].'</td>
                      <td>'.$rows[$video].'</td>
                      <td width="5%"><a class="btn btn-warning Salinti" delete_reiksme="'.$rows[$id].'">Ištrinti</a></td>
                      <td width="5%"><a href="edit.php?upd='.$rows[$id].'&pavad='.$rows[$pavadinimas].'&data='.$rows[$data].'&antr='.$rows[$antraste].'&vid='.$rows[$video].'" onClick="next()" data-toggle="modal"  class="btn btn-primary">Atnaujinti</a></td>
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
                      <h4 class="modal-title">Pridėti tiesioginę transliaciją</h4>
                  </div>
                  <div class="modal-body">
                  <table class="table">
                  <form action="insert.php" method="POST">
                  <tr><td>Pavadinimas: <input type="text" class="resizedzaidejovar" size="20px" name="pavadinimas"></td></tr>
                  <tr><td>Data: <input type="text" class="resizedzaidejovar" name="data"></td></tr>
                  <tr><td>Antraštė: <input type="text"class="resizedzaidejopav"  name="antraste"></td></tr>
                  <tr><td>Video: <input type="text"  class="resizedzaidejonvar" name="video"></td></tr>
                  </table>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                      <input type="submit" value="Pridėti" class="btn btn-primary" name="media">
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
         location.href=href="delete.php?delm=" + id;
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
