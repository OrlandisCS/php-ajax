<?php
require_once 'conexion.php';

if (isset($_POST['insertar'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $fecha = $_POST['fecha'];
    $estado = $_POST['estado'];
    $temporada = $_POST['temporada'];

    $inserta = mysqli_query($conexion, "INSERT INTO `animes`(`titulo`, `descripcion`, `fecha`, `estado`, `temporada`) 
                                            VALUES ('$titulo','$descripcion','$fecha', '$estado', '$temporada')");


    if ($inserta) {
        $mensaje = [
            'mensaje' => 'los datos se insertarón correctamente'
        ];
    } else {
        $mensaje = [
            'mensaje' => 'los datos no se insertarón correctamente'
        ];
    }

    echo json_encode($mensaje);
}
