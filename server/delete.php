<?php
require_once '../conexion.php';

if (isset($_REQUEST['eliminar'])) {
    $id = $_REQUEST['id'];
    $sql = mysqli_query($conexion, "DELETE FROM `animes` WHERE id_anime='$id'");
    if ($sql) {
        $menseje = [
            'mensaje' => 'se elimino correctamente',
            'id' => $id
        ];
    } else {
        $menseje = [
            'mensaje' => 'error al eliminar',
            'id' => $id

        ];
    }
    echo json_encode($menseje);
}
