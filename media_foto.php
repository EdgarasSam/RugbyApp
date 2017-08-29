<?php
include 'Database.php';
$sql = mysql_query("SELECT * FROM media_foto");
$Media_foto_id = "Media_foto_id";
$File_dir = "File_dir";
$File_name = "File_name";
$Foto_title = "Foto_title";
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
          <h4 class="title"><b>Nuotraukos</b></h4>
      </div>
                <thead>
                  <tr>
                    <th>Foto_id</th>
                    <th>File_dir</th>
                    <th>File_name</th>
                    <th>Pavadinimas</th>
                    <th>Mediateka_id</th>
                  </tr>
                </thead>
                <tbody>';
              while($rows = mysql_fetch_assoc($sql)){
                echo '
                <tr>
                      <td>'.$rows[$Media_foto_id].'</td>
                      <td>'.$rows[$File_dir].'</td>
                      <td>'.$rows[$File_name].'</td>
                      <td>'.$rows[$Foto_title].'</td>
                      <td>'.$rows[$Mediateka_id].'</td>
                      <td width="5%"><a class="btn btn-warning Salinti" href="delete.php?delfot='.$rows[$Media_foto_id].'&pav='.$rows[$File_name].'">Ištrinti</a></td>
                      <td width="5%"><a href="gallery.php"   class="btn btn-primary">Peržiūrėti</a></td>
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
                      <h4 class="modal-title">Pridėti nuotrakas</h4>
                  </div>
                  <div class="modal-body">
                  <table class="table">
                  <form action="uploadphoto.php" method="post" enctype="multipart/form-data">
                  <tr><td>Select image to upload:<input type="file" name="fileToUpload" id="fileToUpload"></td></tr>
                  <tr><td>Failo direktorija: <input type="text" name="File_dir" class="resizedzaidejovar"></td></tr>
                  <tr><td>Failo pavadinimas: <input type="text" name="File_name" class="resizedzaidejovar"></td></tr>
                  <tr><td>Foto pavadinimas:<input type="text" name="Foto_title" class="resizedzaidejovar"></td></tr>
                  <tr><td>Mediateka id: <input type="number" name="Mediateka_id" class=resizedzaidejonr></td></tr>

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
  var id;
  var pav;
  $(".Salinti").unbind().click(function() {
      var id = $(this).attr("delete_reiksme");
      var pav = $(this).attr("pavadinimas");
      $(".Salinti").css("background-color", "red");
      console.log($(this).attr("delete_reiksme"));
      if (confirm("Ar tikrai norite ištrinti įrašą?"))
         location.href="delete.php?delfot=" + id + pav;
  });
        </script>
      <script type="text/javascript">
        function nxt()
        {

            location.href="edit.php";

                 return false;
        }
  </script>
<!--   <script type="text/javascript">

      $("#submit_form").on.("submit" ,function(e){
         e.preventDefault();
         console.log("kreipiamas i insert.php per ajax");
         var File_dir_reiksme = $("input[name=File_dir]").val();
         var File_name_reiksme = $("input[name=File_name]").val();
         var Foto_title_reiksme = $("input[name=Foto_title]").val();
         var Mediateka_id_reiksme = $("input[name=Mediateka_id]").val();
         var params = {
           fotos:"",
           Media_foto_id: id,
           File_dir: File_dir_reiksme,
           File_name: File_name_reiksme,
           Foto_title: Foto_title_reiksme,
           Mediateka_id: Mediateka_id_reiksme,


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





       $(document).on("click", "#remove_button", function(){
            if(confirm("Are you sure you want to remove this image?"))
            {
                 var path = $("#remove_button").data("path");
                 $.ajax({
                      url:"photos/delete.php",
                      type:"POST",
                      data:{path:path},
                      success:function(data){
                           if(data != "")
                           {
                                $("#image_preview").html("");
                           }
                      }
                 });
            }
            else
            {
                 return false;
            }
       });
  });
  </script> -->

';

 ?>
