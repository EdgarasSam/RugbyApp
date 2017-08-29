<?php
include 'Database.php';
$sql = mysql_query("SELECT * FROM media_video");
$Media_video_id = "Media_video_id";
$Video_url = "Video_url";
$Video_photo_url = "Video_photo_url";
$Video_title = "Video_title";
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
          <h4 class="title"><b>Vaizdo įrašo pridėjimas</b></h4>
      </div>
                <thead>
                  <tr>
                    <th>Video_id</th>
                    <th>Video url</th>
                    <th>Video photo url</th>
                    <th>Pavadinimas</th>
                    <th>Mediateka_id</th>
                  </tr>
                </thead>
                <tbody>';
              while($rows = mysql_fetch_assoc($sql)){
                echo '
                <tr>
                      <td>'.$rows[$Media_video_id].'</td>
                      <td>'.$rows[$Video_url].'</td>
                      <td>'.$rows[$Video_photo_url].'</td>
                      <td>'.$rows[$Video_title].'</td>
                      <td>'.$rows[$Mediateka_id].'</td>
                      <td width="5%"></td>
                      <td width="5%"><a  video_url="'.$rows[$Video_url].'" data-toggle="modal"  class="btn btn-primary perziura">Peržiūrėti</a></td>
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

  <div id="myModal2" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Peržiūrėti video</h4>
              </div>
              <div class="modal-body">
              <iframe title="YouTube video player" class="youtube-player" type="text/html"
                width="550" height="350" src="" frameborder="0" allowFullScreen></iframe>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
              </div>
              </form>
          </div>
      </div>
  </div>





<script type="text/javascript">
var sra;
    $(".perziura").unbind().click(function(){
        var sra = $(this).attr("video_url")
        var res = sra.substring(sra.length -11);
        $("#myModal2").modal("show");
        $(".youtube-player").attr("src", "https://www.youtube.com/embed/"+ res);
        });
</script>

<script type="text/javascript">

  var id;
  $(".Salinti").unbind().click(function() {
      var id = $(this).attr("delete_reiksme");
      $(".Salinti").css("background-color", "red");
      console.log($(this).attr("delete_reiksme"));
      if (confirm("Ar tikrai norite ištrinti įrašą?"))
         location.href="delete.php?delvid=" + id;
  });
        </script>


';


 ?>
