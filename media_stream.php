<?php
include 'Database.php';
$sql = mysql_query("SELECT * FROM media_stream");
$Media_stream_id = "Media_stream_id";
$Stream_url = "Stream_url";
$Stream_url2 = "Stream_url2";
$Stream_title = "Stream_title";
$Mediateka_id = "Mediateka_id";
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
          <h4 class="title"><b>Streaming</b></h4>
      </div>
                <thead>
                  <tr>
                    <th>Strem_id</th>
                    <th>Stream_url</th>
                    <th>Stream_url2</th>
                    <th>Pavadinimas</th>
                    <th>Mediateka_id</th>
                  </tr>
                </thead>
                <tbody>';
              while($rows = mysql_fetch_assoc($sql)){
                echo '
                <tr>
                      <td>'.$rows[$Media_stream_id].'</td>
                      <td>'.$rows[$Stream_url].'</td>
                      <td>'.$rows[$Stream_url2].'</td>
                      <td>'.$rows[$Stream_title].'</td>
                      <td>'.$rows[$Mediateka_id].'</td>
                      <td width="5%"><a class="btn btn-warning Salinti" delete_reiksme="'.$rows[$Media_stream_id].'">Ištrinti</a></td>
                      <td width="5%"><a href="edit.php?upd='.$rows[$Media_stream_id].'" onClick="next()" data-toggle="modal"  class="btn btn-primary">Atnaujinti</a></td>
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
                  <tr><td>Stream URl: <input type="text" class="resizedzaidejovar" size="20px" name="Stream_url"></td></tr>
                  <tr><td>Stream URL2: <input type="text" class="resizedzaidejovar" name="Stream_url2"></td></tr>
                  <tr><td>Pavadinimas: <input type="text"class="resizedzaidejopav"  name="Stream_title"></td></tr>
                  <tr><td>Mediatekos id: <input type="text"  class="resizedzaidejonvar" name="Mediateka_id"></td></tr>
                  </table>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                      <input type="submit" value="Pridėti" class="btn btn-primary" name="stream">
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
         location.href=href="delete.php?delstr=" + id;
  });
        </script>


';


 ?>
