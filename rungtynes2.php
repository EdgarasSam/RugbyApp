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
      <a href="#myModal" class="btn btn-primary" data-toggle="modal">Pridėti</a>
</div>
  </div>
      <div class="card">
          <div class="header">
              <h4 class="title"><b>Varžybų lentelė</b></h4>
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
      <td style="display:none;">'.$rows[$id].'</td>
        <td>'.$rows[$komanda1].'</td>
        <td>'.$rows[$taskai1].'</td>
        <td>'.$rows[$laikas].'</td>
        <td>'.$rows[$taskai2].'</td>
        <td>'.$rows[$komanda2].'</td>
        <td width="5%"><a class="btn btn-warning" onclick="ConfirmDelete()">Ištrinti</a></td>
        <td width="5%"><a href="editvarz.php?upd='.$rows[$id].'&kom1='.$rows[$komanda1].'&tas1='.$rows[$taskai1].'&laikas='.$rows[$laikas].'&tas2='.$rows[$taskai2].'&kom2='.$rows[$komanda2].'" class="btn btn-primary" data-toggle="modal">Atnaujinti</a></td>
      </tr>
      <script type="text/javascript">
        function ConfirmDelete()
        {
              if (confirm("Ar tikrai norite ištrinti įrašą?"))
                   location.href=href="delete.php?deli='.$rows[$id].'";
        }
    </script>';
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
                <h4 class="modal-title">Pridėti komandas</h4>
            </div>
            <div class="modal-body">
            <table class="table">
            <form action="insert.php" method="POST">
            <tr><td> 1 Komandos Pavadinimas.: <input type="text" class="resizedkomandos_pav" name="komanda1"></td></tr>
            <tr><td>1 komandos taškai: <input type="number" class="resizedzaidejonr" name="taskai1"></td></tr>
            <tr><td> Varžybų Laikas: <input type="text"class="resizedtasku_santykis"  name="laikas"></td></tr>
            <tr><td>2 komandos taškai: <input type="number" class="resizedzaidejonr" name="taskai2"></td></tr>
            <tr><td>2 Komandos Pavadinimas.: <input type="text" class="resizedkomandos_pav" name="komanda2"></td></tr>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                <input type="submit" value="Pridėti" class="btn btn-primary" name="rungtynes">
                </form>
            </div>
        </div>
    </div>
</div>
';
 ?>
