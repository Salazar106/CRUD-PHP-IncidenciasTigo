<?php
include("conexion.php");
$con = conectar();

$sql = "SELECT i.id, i.cedula , i.fecha,i.descripcion, u.nombre, if(estado=0,'Cerrado','Abierto') as estado, i.estado as nestado, i.asesor FROM incidencias i join usuarios u on u.id = i.asesor";
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

    <?php if (isset($_GET['message']) && $_GET['message'] == 'success') { ?>
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            Incidencia Agregada correctamente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'faltanDatos') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Faltan por llenar algunos campos, porfavor Verifica
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'errorRegistro') { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Algo sucedio mal, vuelve a intentar
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <?php if (isset($_GET['message']) && $_GET['message'] == 'update') { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            se actualizo la incidencia correctamente
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php } ?>
    <div class="row justify-content-center mt-5">

        <div class="col-5">
            <div class="card">
                <h5 class="card-header">NUEVA INCIDENCIA</h5>
                <div class="card-body">
                    <h5 class="card-title">Diligencie los siguientes datos:</h5>
                    <form action="crearIncidencia.php" method="POST">

                        <div class="row justify-content-center">
                            <div class="col-auto">
                                <div class="mb-3">
                                    <label for="cedula" class="form-label">Cedula Cliente</label>
                                    <input type="number" name="cedula" class="form-control" id="cedula">
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="mb-3">
                                    <label for="fecha" class="form-label">Fecha</label>
                                    <input type="text" name="fecha" class="form-control" id="fecha" value="<?php echo date("o"), '/', date('m'), '/', date('d'), ', ', date('G'), ':', date('i'); ?>">
                                </div>
                            </div>



                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción de la INCIDENCIA</label>
                            <textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Programador</label>
                            <select name="asesor" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione un Programador</option>
                                <option value="1">Andres</option>
                                <option value="2">Jose</option>
                                <option value="3">julian</option>                             
                               
                            </select>
                        </div>
                        <p class="card-text">Verifique que todos los campos esten correctamente diligenciados.</p>
                        
                        <input type="submit" class="btn btn-primary" value="Crear Incidencia"></input>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-auto text-center">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Incidencia</th>
                        <th scope="col">Cedula Cliente</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Asesor</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($query)) {
                    ?>
                        <tr>
                            <th>#<?php echo $row['id'] ?></th>
                            <td><?php echo $row['cedula'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td><?php echo $row['descripcion'] ?></td>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['estado'] ?></td>
                            <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a></th>
                        </tr>
                    <?php
                    }
                    ?>
                    <?php ?>
                </tbody>
            </table>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>