<?php
include("conexion.php");
$con=conectar();

if(
    empty($cedula=$_POST['cedula'])||
    empty($fecha=$_POST['fecha'])||
    empty($descripcion=$_POST['descripcion'])||
    empty($asesor=$_POST['asesor'])
){
    header("Location: index.php?message=faltanDatos");
    exit;
}else{
    $sql="INSERT INTO incidencias (cedula, fecha, descripcion, asesor) VALUES('$cedula','$fecha','$descripcion','$asesor')";
    $query= mysqli_query($con,$sql);
    
    if($query){
        Header("Location: index.php?message=success");
        
    }else {
        header("Location: index.php?message=errorRegistro");
                
    }
}
