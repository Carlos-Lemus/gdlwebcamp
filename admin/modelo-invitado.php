<?php 

$nombre = $_POST["nombre_invitado"];
$apellido = $_POST["apellido_invitado"];
$descripcion = $_POST["descripcion_invitado"];

if($_POST["registro"] == "nuevo") {
    
    // $respuesta = array(
    //     "post" => $_POST,
    //     "file" => $_FILES
    // );

    // die(json_encode($respuesta));

    $directorio = "../img/invitados/";
    $url_imagen = "";
    $resultado_imagen = "";


    if(!is_dir($directorio)) {
        mkdir($directorio, 0755, true);
    }

    if(move_uploaded_file($_FILES["archivo_imagen"]["tmp_name"], $directorio.$_FILES["archivo_imagen"]["name"])) {
        
        $resultado_imagen = "se subio correctamente";
        $url_imagen = $_FILES["archivo_imagen"]["name"];
        
    } else {
        $respuesta = array(
            "respuesta" => error_get_last()
        );
    }

    try {

        require_once("funciones/funciones.php"); 

        $sql = "INSERT INTO invitados(nombre_invitado, apellido_invitado, descripcion, url_imagen) VALUES(?, ?, ?, ?)";

        if($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("ssss", $nombre, $apellido, $descripcion, $url_imagen);
            $stmt->execute();

            if($stmt->affected_rows > 0) {
                $respuesta = array(
                    "respuesta" => "exito",
                    "id_invitado" => $stmt->insert_id,
                    "resultado_imagen" => $resultado_imagen
                );
            } else {
                $respuesta = array(
                    "error" => $conn->errno." ".$conn->error
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

    // $respuesta = array(
    //     "post" => $_POST,
    //     "file" => $_FILES
    // );

    // die(json_encode($respuesta));


    try {

        require_once("funciones/funciones.php");

        if(empty($_FILES)) {

            $sql = "UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ? WHERE id_invitado = ?";

            if($stmt = $conn->prepare($sql)) {

                $stmt->bind_param("sssi", $nombre, $apellido, $descripcion, $id);
                
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

        } else {
            
            $directorio = "../img/invitados/";
            $url_imagen = "";
            $resultado_imagen = "";

            if(!is_dir($directorio)) {
                mkdir($directorio, 0755, true);
            }

            if(move_uploaded_file($_FILES["archivo_imagen"]["tmp_name"], $directorio.$_FILES["archivo_imagen"]["name"])) {
                
                $resultado_imagen = "se subio correctamente";
                $url_imagen = $_FILES["archivo_imagen"]["name"];
                
            } else {
                $respuesta = array(
                    "respuesta" => error_get_last()
                );
            }

            $sql = "UPDATE invitados SET nombre_invitado = ?, apellido_invitado = ?, descripcion = ?, url_imagen = ? WHERE id_invitado = ?";

            if($stmt = $conn->prepare($sql)) {

                $stmt->bind_param("ssssi", $nombre, $apellido, $descripcion, $url_imagen, $id);
                
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

        $sql = "DELETE FROM invitados WHERE id_invitado = ?";
        
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