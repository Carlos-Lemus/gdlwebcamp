<?php 

if($_POST["registro"] == "nuevo") {

    $nombre = $_POST["nombre"];
    $icono = $_POST["icono"];

    try {

        require_once("funciones/funciones.php"); 

        $sql = "INSERT INTO categoria_eventos(categoria_evento, icono) VALUES(?,?)";
        
        if($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("ss", $nombre, $icono);
            $stmt->execute();

            if($stmt->affected_rows > 0) {
                $respuesta = array(
                    "respuesta" => "exito",
                    "id_admin" => $stmt->insert_id
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
    $icono = $_POST["icono"];

    try {

        require_once("funciones/funciones.php");

        $sql = "UPDATE categoria_eventos SET categoria_evento = ?, icono = ? WHERE id_categoria = ?";

        if($stmt = $conn->prepare($sql)) {


            $stmt->bind_param("ssi", $nombre, $_POST["icono"], $id);
            
            $stmt->execute();
            
            if($stmt->affected_rows > 0) {
                $respuesta = array(
                    "respuesta" => "exito",
                    "id_actualizado" => $id
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

else if($_POST["registro"] == "eliminar") {
        
    $id_borrar = (int) $_POST["id"];

    try {

        require_once("funciones/funciones.php"); 

        $sql = "DELETE FROM categoria_eventos WHERE id_categoria = ?";
        
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