<?php 
$db = new Conexion();

$sql = $db->query("SELECT * FROM filial ");
//echo "<select name='' class='form-control' id=''>";
while($row = $db->recorrer($sql)){

echo '<option value="'.$row['DesFilial'].'">'.$row['DesFilial'].'</option>';

}
//echo "</select>";
$db->liberar($sql);
$db->close();


 ?>