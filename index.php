<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datatables y sweetAlert</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.10.23/datatables.min.css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/ju/dt-1.10.23/datatables.min.css" />
</head>

<body>
    <div class="container mt-3">
        <h2 class="text-center text-uppercase">Inserserción mediante ajax</h2>

        <table id="example" class="display" style="width:100%">
            <button type="button" class='btn btn-info' data-toggle="modal" data-target="#exampleModal">Nuevo</button>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Temporada</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'conexion.php';
                $sql = mysqli_query($conexion, "SELECT * FROM animes");
                while ($anime = mysqli_fetch_array($sql)) :
                ?>
                    <tr>
                        <td><?php echo $anime['id_anime'] ?></td>
                        <td><?php echo $anime['titulo'] ?></td>
                        <td><?php echo $anime['fecha'] ?></td>
                        <td><?php echo $anime['temporada'] ?></td>
                        <td>
                            <button class="btn btn-danger" type="button" onclick="alerta_eliminar(<?php echo $anime['id_anime'] ?>)"><i class="fas fa-trash"></i></button>
                            <button class="btn btn-success"><i class="fas fa-pencil-alt"></i></button>
                        </td>
                    </tr>
                <?php
                endwhile;
                ?>
            </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Nuevo elemento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="formulario_animes">
                            <div class="form-outline">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" id="titulo" class='form-control'>
                            </div>
                            <div class="form-outline">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <input type="text" id="descripcion" class='form-control'>
                            </div>
                            <div class="form-outline">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" id="fecha" class='form-control'>
                            </div>
                            <div class="form-outline">
                                <label for="estado" class="form-label">Estado</label>
                                <select name="" id="estado" class="form-control">
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En Emisión">En Emisión</option>
                                </select>
                            </div>
                            <div class="form-outline">
                                <label for="temporada" class="form-label">Temporada</label>
                                <input type="number" id="temporada" class='form-control'>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="subtmit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/ju/dt-1.10.23/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/main.js"></script>


</body>

</html>