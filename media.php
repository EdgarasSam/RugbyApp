<?php
include 'medijos.html';
include 'Database.php';
if(isset($_GET["media"])){
$id = $_GET["media"];
$sql = mysql_query("SELECT media_foto.Media_foto_id,media_foto.File_dir,media_foto.File_name,media_foto.Foto_title,media_foto.Mediateka_id,media_foto.Tipas from media_foto WHERE media_foto.Mediateka_id = $id   UNION ALL SELECT media_video.Media_video_id,media_video.Video_url,media_video.Video_photo_url,media_video.Video_title,media_video.Mediateka_id,media_video.Tipas from media_video WHERE media_video.Mediateka_id = $id  UNION ALL SELECT media_stream.Media_stream_id,media_stream.Stream_url,media_stream.Stream_url2,media_stream.Stream_title,media_stream.Mediateka_id,media_stream.Tipas from media_stream WHERE media_stream.Mediateka_id = $id ");
$Media_foto_id = "Media_foto_id";
$File_dir = "File_dir";
$File_name = "File_name";
$Foto_title = "Foto_title";
$Mediateka_id = $id;
$Media_video_id = "Media_video_id";
$Video_url = "Video_url";
$Video_photo_url = "Video_photo_url";
$Video_title = "Video_title";
$Media_stream_id = "Media_stream_id";
$Stream_url = "Stream_url";
$Stream_url2 = "Stream_url2";
$Stream_title = "Stream_title";
$Tipas = "Tipas";
echo '
<div class="content table-responsive table-full-width">
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#fotkes"  class="btn btn-primary" data-toggle="modal">Pridėti nuotraukas</a>
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#videoModal"  class="btn btn-primary" data-toggle="modal">Pridėti video</a>
    <!-- Button HTML (to Trigger Modal) -->
    <a href="#streamModal"  class="btn btn-primary" data-toggle="modal">Pridėti stream</a>
<table class="table table-hover">
<div class="header">
    <h4 class="title"><b>Nuotraukos</b></h4>
</div>';
while($rows = mysql_fetch_assoc($sql)){
  if($rows[$Tipas] == "foto"){
  echo'
  <tr><td><a href="mediateka/Dideles/'.$rows[$File_name].'"><img src="mediateka/Mazos/'.$rows[$File_name].'"/></a></td><td><span>Nuotraukos pavadinimas: '.$rows[$Foto_title].' </span><a href="gallery.php?id='.$id.'"   class="btn btn-primary">Peržiūrėti</a><a class="btn btn-warning foto_del" foto_reiksme="'.$rows[$Media_foto_id].'" failo_pav="'.$rows[$File_name].'" del_id="'.$id.'">Ištrinti</a></td></tr>


    ';}
    if($rows[$Tipas] == "video"){
      echo '
      <td><h4 class="title"><b>Video</b></h4></td>
      <tr><td> Video URL : '.$rows[$File_dir].'</td>  </tr>
      <tr> <td>Video foto URL: '.$rows[$File_name].'</td></tr>
      <tr><td><span>Pavadinimas: '.$rows[$Foto_title].'  </span><a  video_url="'.$rows[$File_dir].'" data-toggle="modal"  class="btn btn-primary perziura">Peržiūrėti</a><a class="btn btn-warning Video_delete" delete_reiksme="'.$rows[$Media_foto_id].'" medi="'.$id.'">Ištrinti</a></td></tr>

    ';}
    if($rows[$Tipas] == "stream")
    {
      echo '

      <td><h4 class="title"><b>Stream</b></h4></td>
      <tr><td> Stream URL : '.$rows[$File_dir].'</td>  </tr>
      <tr> <td>Stream URL2: '.$rows[$File_name].'</td></tr>
      <tr><td>Pavadinimas: '.$rows[$Foto_title].'<a class="btn btn-warning Stream" delete_reiksme="'.$rows[$Media_foto_id].'" medijos_reiksme="'.$id.'">Ištrinti</a></td></tr>

    ';}

};

echo '
</table>
</div>
<!-- stream modal -->
<div id="streamModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pridėti tiesioginę transliaciją</h4>
            </div>
            <div class="modal-body">
            <table class="table">
            <form action="insert.php?stream='.$id.'" method="POST">
            <tr><td>Stream URl: <input type="text" class="resizedzaidejovar" size="20px" name="Stream_url"></td></tr>
            <tr><td>Stream URL2: <input type="text" class="resizedzaidejovar" name="Stream_url2"></td></tr>
            <tr><td>Pavadinimas: <input type="text"class="resizedzaidejopav"  name="Stream_title"></td></tr>
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

<!-- Video modal -->
<div id="videoModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pridėti vaizdo įrašą</h4>
            </div>
            <div class="modal-body">
            <table class="table">
            <form action="insert.php?id='.$id.'" method="POST">
            <tr><td>Video url: <input type="text" class="resizedzaidejovar" size="20px" name="Video_url"></td></tr>
            <tr><td>Video photo url: <input type="text" class="resizedzaidejovar" name="Video_photo_url"></td></tr>
            <tr><td>Pavadinimas: <input type="text"class="resizedzaidejopav"  name="Video_title"></td></tr>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                <input type="submit" value="Pridėti" class="btn btn-primary" name="video">
            </div>
            </form>
        </div>
    </div>
</div>

<!-- foto modal -->
<div id="fotkes" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pridėti nuotrakas</h4>
            </div>
            <div class="modal-body">
            <table class="table">
            <form action="uploadphoto.php?submit='.$id.'" method="post" enctype="multipart/form-data">
            <tr><td>Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload"></td></tr>
            <tr><td>Foto pavadinimas:<input type="text" name="Foto_title" class="resizedzaidejovar"></td></tr>


            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                <input type="submit" value="Pridėti" class="btn btn-primary" name="submit">
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
var mid;
  $(".Stream").unbind().click(function() {
      var id = $(this).attr("delete_reiksme");
      var mid= $(this).attr("medijos_reiksme");
      $(".Salinti").css("background-color", "red");
      if (confirm("Ar tikrai norite ištrinti įrašą?"))
         location.href="delete.php?delstr=" + id + "&id=" + mid;
  });
        </script>

        <script type="text/javascript">
        var id;
        var mid;
          $(".Video_delete").unbind().click(function() {
              var id = $(this).attr("delete_reiksme");
              var mid= $(this).attr("medi");
              $(".Salinti").css("background-color", "red");
              if (confirm("Ar tikrai norite ištrinti įrašą?"))
                 location.href="delete.php?delvid=" + id + "&id=" + mid;
          });
                </script>

        <script type="text/javascript">
        var id;
        var mid;
        var fot_pa;
        $(".foto_del").unbind().click(function() {
            var id = $(this).attr("foto_reiksme");
            var fot_pa = $(this).attr("Failo_pav");
            var mid = $(this).attr("del_id");
            $(".Salinti").css("background-color", "red");
            console.log($(this).attr("delete_reiksme"));
            if (confirm("Ar tikrai norite ištrinti įrašą?"))
               location.href="delete.php?delfot=" + id + "&pav=" + fot_pa + "&id=" + mid;
        });


        </script>


';
}


include 'footeris.html';
 ?>
