<?php

try {
    $conexion = new mysqli("localhost", "root", "",  "animes");
} catch (Throwable $th) {
    throw $th;
}