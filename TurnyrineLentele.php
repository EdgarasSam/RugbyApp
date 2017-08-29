<?php
include'Database.php';
$sql = mysql_query("SELECT * FROM turnyro_lentele ORDER BY vieta");
$id = "id";
$komandos_pav =  "komandos_pav";
$zaista = "zaista";
$laimeta = "laimeta";
$pralaimeta  = "pralaimeta";
$lygiasios  = "lygiasios";
$tasku_santykis  = "tasku_santykis";
$vieta  = "vieta";
$Taskai  = "Taskai";

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
              <h4 class="title"><b>Lietuvos regbio r-15 turnyrinė lentelė</b></h4>
          </div>
    <thead>
      <tr>
        <th>Vieta</th>
        <th>Komanda</th>
        <th>Žaista</th>
        <th>Pergalės</th>
        <th>Lygiasios</th>
        <th>Pralaimėjimai</th>
        <th>Taškų santykis</th>
        <th>Taškai</th>
      </tr>
    </thead>';
    while($rows = mysql_fetch_assoc($sql)){
      echo'
    <tbody>
    <tr>
      <td>'.$rows[$vieta].'</td>
      <td>'.$rows[$komandos_pav].'</td>
      <td>'.$rows[$zaista].'</td>
      <td>'.$rows[$laimeta].'</td>
      <td>'.$rows[$pralaimeta].'</td>
      <td>'.$rows[$lygiasios].'</td>
      <td>'.$rows[$tasku_santykis].'</td>
      <td>'.$rows[$Taskai].'</td>
      <td><a class="btn btn-warning SALINTI" salinimo_reiksme="'.$rows[$id].'"">Ištrinti</a></td>
      <td width="5%"><a href="editlentele.php?upde='.$rows[$id].'&vieta='.$rows[$vieta].'&komandos_pav='.$rows[$komandos_pav].'&zaista='.$rows[$zaista].'&laimeta='.$rows[$laimeta].'&pralaimeta='.$rows[$pralaimeta].'&lygiasios='.$rows[$lygiasios].'&tasku_santykis='.$rows[$tasku_santykis].'&Taskai='.$rows[$Taskai].'" class="btn btn-primary" data-toggle="modal">Atnaujinti</a></td>
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
    </div>
<!-- Modal HTML -->
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Pridėti komandą į turnyrinę lentelę</h4>
            </div>
            <div class="modal-body">
            <table class="table">
            <form action="insert.php" method="POST">
            <tr><td>Vieta: <input type="number" class="resizedvieta" name="vieta"></td></tr>
            <tr><td>Komandos pavadinimas: <input type="text" class="resizedkomandos_pav" name="komandos_pav"></td></tr>
            <tr><td>Žaista: <input type="text" class="resizedzaista" name="zaista"></td></tr>
            <tr><td>Laimėta: <input type="number" class="resizedlaimeta" name="laimeta"></td></tr>
            <tr><td>Pralaimėta: <input type="text"  class="resizedpralaimeta" name="pralaimeta"></td></tr>
            <tr><td>Lygiasios: <input type="text" class="resizedlygiasios" name="lygiasios"></td></tr>
            <tr><td>Taškų santykis: <input type="text" class="resizedtasku_santykis" name="tasku_santykis"></td></tr>
            <tr><td>Taškai: <input type="number" class="resizedtaskai" name="Taskai"></td></tr>
            </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Uždaryti</button>
                <input type="submit" class="btn btn-primary" value="Pridėti" name="turna">
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<script type="text/javascript">
var id;
$(".SALINTI").click(function() {
    var id = $(this).attr("salinimo_reiksme");
    if (confirm("Ar tikrai norite ištrinti įrašą?"))
       location.href=href="delete.php?delt=" + id;
});
</script>
';


?>
