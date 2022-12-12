<?php
include ('../app/config.php');

$cuviculo = $_GET['cuviculo'];
$estado_espacio = "OCUPADO";

date_default_timezone_set("America/Lima");
$fechaHora = date("Y-m-d h:i:s");

//echo $nombres."-".$email."-".$password_user;

$sentencia = $pdo->prepare("UPDATE tb_mapeos SET
estado_espacio = :estado_espacio,
fyh_actualizacion = :fyh_actualizacion
WHERE id_map = :id_map");

$sentencia->bindParam(':estado_espacio',$estado_espacio);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_map',$cuviculo);

if ($sentencia->execute()){
	echo "Se actualizo el registro de la manera correcta";
	?>
<!-- <script>location.href = "index.php";</script> -->
<?php
}else{
	echo "Error al actualizar el registro";
}

?>