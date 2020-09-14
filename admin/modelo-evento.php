<?php 

    if($_POST["registro"] == "nuevo") {

        
        $nombre = $_POST["nombre"];
        $hora = $_POST["hora"];
        $categoria =  $_POST["categoria_evento"];
        $invitado = $_POST["invitado"];

        $fecha = $_POST["fecha"];
        $fecha_formateada = date("Y-m-d", strtotime($fecha));

        $hora_formateada = date('H:i:s', strtotime($hora));

        try {

            require_once("funciones/funciones.php"); 

            $sql = "INSERT INTO eventos(nombre_evento, fecha_evento, hora_evento, id_categoria, id_invitado) VALUES(?,?,?,?,?)";
            
            if($stmt = $conn->prepare($sql)) {

                $stmt->bind_param("sssii", $nombre, $fecha_formateada, $hora_formateada, $categoria, $invitado);
                $stmt->execute();

                if($stmt->affected_rows > 0) {
                    $respuesta = array(
                        "respuesta" => "exito",
                        "id_evento" => $stmt->insert_id
                    );
                    
                } else {
                    $respuesta = array(
                        "respuesta" => $conn->errno." ".$conn->error
                );
                }
                
                $stmt->close();
                $conn->close();

            } else {
                $respuesta = array(
                        "respuesta" => $conn->errno." ".$conn->error
                );
            }

        } catch(Exception $ex) {
            $respuesta = array(
                "respuesta" => $ex->getMessage()
          );
        }

        echo json_encode($respuesta);

    }

    else if($_POST["registro"] == "actualizar") {
        $id = (int) $_POST["id_registro"];
        $nombre = $_POST["nombre"];
        $hora = $_POST["hora"];
        $categoria = (int) $_POST["categoria_evento"];
        $invitado = (int) $_POST["invitado"];

        $fecha = $_POST["fecha"];
        $fecha_formateada = date("Y-m-d", strtotime($fecha));

        $hora_formateada = date('H:i:s', strtotime($hora));

        try {

            require_once("funciones/funciones.php");

            $sql = "UPDATE eventos SET nombre_evento = ?, fecha_evento = ?, hora_evento = ?,id_categoria = ?, id_invitado = ? WHERE evento_id = ?";

            if($stmt = $conn->prepare($sql)) {

                $stmt->bind_param("sssiii", $nombre, $fecha_formateada,$hora_formateada,$categoria, $invitado, $id);
                
                $stmt->execute();
                
                if($stmt->affected_rows > 0) {
                    $respuesta = array(
                        "respuesta" => "exito",
                        "id_actualizado" => $id
                    );
                } else {
                    $respuesta = array(
                        "respuesta" => $conn->errno." ".$conn->error,
                        "nombre" => $nombre,
                        "fecha" => $fecha_formateada,
                        "hora" => $hora_formateada,
                        "cat" => $categoria,
                        "invitado" => $invitado,
                        "id" => $id 
                    );
                }
                
                $stmt->close();
                $conn->close();
                
            } else {
                $respuesta = array(
                        "respuesta" => $conn->errno." ".$conn->error
                );
            }
            
            

        } catch(Exception $ex) {
            $respuesta = array(
                "respuesta" => $ex->getMessage()
            );
        }

        echo json_encode($respuesta);
    }

    else if($_POST["registro"] == "eliminar") {
        
        $id_borrar = (int) $_POST["id"];

        try {

            require_once("funciones/funciones.php"); 

            $sql = "DELETE FROM eventos WHERE evento_id = ?";
            
            if($stmt = $conn->prepare($sql)) {

                $stmt->bind_param("i", $id_borrar);
                $stmt->execute();

                if($stmt->affected_rows > 0) {
                    $respuesta = array(
                        "respuesta" => "exito",
                        "id_eliminado" => $id_borrar
                    );
                }
                
                $stmt->close();
                $conn->close();

            } else {
                $respuesta = array(
                        "respuesta" => $conn->errno." ".$conn->error
                );
            }

        } catch(Exception $ex) {
            $respuesta = array(
                "respuesta" => $ex->getMessage()
          );
        }

        echo json_encode($respuesta);
    }

?>