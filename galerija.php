<?php
include'Database.php';
//Database priskirimas
$sql = mysql_query("SELECT * FROM galerija");
$id = "id";
$galerijos_id =  "galerijos_id";
$pavadinimas = "pavadinimas";
$nuotraukos = "nuotraukos";
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
          <h4 class="title"><b>Galerija</b></h4>
      </div>
                <thead>
                  <tr>
                    <th>Galerijos_ID</th>
                    <th>Pavadinimas</th>
                    <th>Nuotraukos </th>
                  </tr>
                </thead>
                <tbody>';
              while($rows = mysql_fetch_assoc($sql)){
                echo '
                <tr>
                      <td>'.$rows[$galerijos_id].'</td>
                      <td>'.$rows[$pavadinimas].'</td>
                      <td>Nuotrau</td>
                      <td width="5%"><a class="btn btn-warning Salinti" delete_reiksme="'.$rows[$id].'">Ištrinti</a></td>
                      <td width="5%"><a href="edit.php?upd='.$rows[$id].'&gaid='.$rows[$galerijos_id].'&dpavad='.$rows[$pavadinimas].'&nuotr=nuotrauka" onClick="next()" data-toggle="modal"  class="btn btn-primary">Atnaujinti</a></td>
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
                  <form action="insert.php" enctype="multipart/form-data" method="POST">
                  <tr><td>Galerijos_ID: <input type="text" class="resizedzaidejovar" size="20px" name="galerijos_id"></td></tr>
                  <tr><td>Pavadinimas: <input type="text" class="resizedzaidejovar" name="pavadinimas"></td></tr>
                  <tr><td>Pavadinimas: <input type="file" multiple name="nuotraukos[]"></td></tr>
                  </table>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                      <input type="submit" value="Pridėti" class="btn btn-primary" name="galerija">
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
         location.href=href="delete.php?delga=" + id;
  });
        </script>
                 
      <script type="text/javascript">
        function nxt()
        {

            location.href="edit.php";

                 return false;
        }
  </script>
';
?>
