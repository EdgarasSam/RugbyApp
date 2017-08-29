<?php
include 'Database.php';
$sql = mysql_query("SELECT DISTINCT mediateka.Mediateka_id,(SELECT COUNT(*) FROM media_stream WHERE Mediateka_id = mediateka.Mediateka_id) AS Media_stream_id,(SELECT COUNT(*) FROM media_foto WHERE Mediateka_id = mediateka.Mediateka_id) AS Media_foto_id,(SELECT COUNT(*) FROM media_video WHERE Mediateka_id = mediateka.Mediateka_id) AS Media_video_id FROM mediateka");
$Mediateka_id = "Mediateka_id";
$Media_foto_id = "Media_foto_id";
$Media_video_id = "Media_video_id";
$Media_stream_id = "Media_stream_id";
//$Title = "Title";
//$Header = "Header";
//$Timestamp = "Timestamp";
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
                    <th>Media_id</th>
                    <th>Foto_id(kiekis)</th>
                    <th>Video_id(kiekis)</th>
                    <th>Strem_id(kiekis)</th>
                    <!--<th>Pavadinimas</th>
                    <th>Antraste</th>
                    <th>Timestamp</th> -->
                  </tr>
                </thead>
                <tbody>';
              while($rows = mysql_fetch_assoc($sql)){
                echo '
                <tr>
                      <td>'.$rows[$Mediateka_id].'</td>
                      <td>'.$rows[$Media_foto_id].'</td>
                      <td>'.$rows[$Media_video_id].'</td>
                      <td>'.$rows[$Media_stream_id].'</td>

                      <td width="5%"><a class="btn btn-warning Salinti" delete_reiksme="'.$rows[$Mediateka_id].'">Ištrinti</a></td>
                      <td width="5%"><a href="#" nuoroda="media.php?media='.$rows[$Mediateka_id].'"  class="btn btn-primary Media">Peržiūrėti</a></td>
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
                      <h4 class="modal-title">Pridėti Mediatekos įrašą</h4>
                  </div>
                  <div class="modal-body">
                  <table class="table">
                  <form action="insert.php" method="POST">
                  <tr><td>Pavadinimas: <input type="text" class="resizedzaidejovar" size="20px" name="Title"></td></tr>
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

      <script type="text/javascript">
        function nxt()
        {

            location.href="edit.php";

                 return false;
        }
  </script>

  <script>
  var link;
  $(".Media").unbind().click(function(){
  var link = $(this).attr("nuoroda");
  console.log(link);
window.open(link,"win1","status=no,toolbar=no,scrollbars=yes,titlebar=no,menubar=no,resizable=yes,width=800,height=600,directories=no,location=no")
  });

</script>

';


 ?>
