<?php
include("conexion.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT i.id, i.cedula , i.fecha,i.descripcion, u.nombre, if(estado=0,'cerrado','abierto') as estado, i.estado as nestado, i.asesor FROM incidencias i join usuarios u on u.id = i.asesor WHERE i.id ='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);

$sql2 = "SELECT *  FROM usuarios";
$query2 = mysqli_query($con, $sql2);
$rowUsers = mysqli_fetch_array($query2);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link href="styles/style.css" rel="stylesheet">
    <title>Test Tigo</title>
</head>

<body>
    <header class="justify-content-center">
        <img class="img-logo" src="img/Logo_une.png" alt="">
    </header>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'updateError') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Algo sucedio mal, vuelve a intentar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <div class="row justify-content-center mt-5">
        <div class="col-auto">
            <div class="card">
                <h5 class="card-header">ACTUALIZAR-INCIDENCIA</h5>
                <div class="card-body">
                    <h5 class="card-title">Diligencie los siguientes datos:</h5>
                    <form action="funciones/actualizar.php" method="POST">


                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="mb-3">
                                    <label for="cedula" class="form-label">Cedula Cliente</label>
                                    <input type="number" name="cedula" class="form-control" id="cedula" value="<?php echo $row['cedula'] ?>">
                                </div>
                            </div>


                        </div>


                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción de la INCIDENCIA</label>
                            <textarea class="form-control" name="descripcion" id="descripcion"><?php echo $row['descripcion'] ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Programador</label>
                            <select name="asesor" class="form-select" aria-label="Default select example" value='<?php echo $row['asesor'] ?>'>
                                <option selected value='<?php $row['asesor'] ?>'><?php echo $row['nombre'] ?></option>
                                <option value="1">Andres</option>
                                <option value="2">Jose</option>
                                <option value="3">julian</option>

                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Estado</label>
                            <select name="estado" class="form-select" aria-label="Default select example">
                                <option value="1" selected>Abierta</option>
                                <option value="0">Cerrada</option>
                            </select>
                        </div>
                        <label for="">id</label>
                        <input type='number' name="id" value="<?php echo $id  ?>">

                        <input type="submit" class="btn btn-primary" value="Actualizar">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>