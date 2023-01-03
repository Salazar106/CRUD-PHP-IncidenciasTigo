<?php

include("../conexion.php");
$con=conectar();

$id=$_GET['id'];
$id2=$_POST['id'];
$cedula=$_POST['cedula'];
$descripcion=$_POST['descripcion'];
$asesor=$_POST['asesor'];
$estado=$_POST['estado'];


$sql="UPDATE incidencias SET  cedula='$cedula', descripcion= '$descripcion', asesor='$asesor', estado='$estado' WHERE id ='$id2'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: ../index.php?message=update");
    }else{
        header("Location: ../actualizar.php?message=updateError");
    }
?>