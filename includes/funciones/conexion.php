<?php 
    //datos de la base de datos
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "gdlwebcamp";

    //campos de las tablas
    $eventoId = "evento_id";
    $nombreEvento = "nombre_evento";
    $fechaEvento = "fecha_evento";
    $horaEvento = "hora_evento";
    $categoriaEvento = "categoria_evento";
    $nombreInvitado = "nombre_invitado";
    $apellidoInvitado = "apellido_invitado";
    $categoriaId = "id_categoria";
    $invitadosId = "id_invitado";
    $icono = "icono";

    $conn = new mysqli($host, $username, $password, $database);

    if($conn->connect_error) {
        echo $error->$conn->connect_error;
    }


?>