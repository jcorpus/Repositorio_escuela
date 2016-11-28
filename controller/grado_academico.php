<?php 
$db = new Conexion();

$sql = $db->query("SELECT * FROM gradoacademico ");
//echo "<select name='' class='form-control' id=''>";
while($row = $db->recorrer($sql)){

echo '<option value="'.$row['idGradoAcademico'].'">'.$row['DesGradoAcademico'].'</option>';

}
//echo "</select>";
$db->liberar($sql);
$db->close();


 ?>