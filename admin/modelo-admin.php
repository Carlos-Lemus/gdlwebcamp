<?php 

    if($_POST["registro"] == "nuevo") {
        
        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];
        $password = $_POST["password"];

        $opciones = array (
            'cost' => 10
        );
        
        $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);

        try {

            require_once("funciones/funciones.php"); 

            $sql = "INSERT INTO admins(usuario, nombre, password) VALUES(?,?,?)";
            
            if($stmt = $conn->prepare($sql)) {

                $stmt->bind_param("sss", $usuario, $nombre, $hash_password);
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
        $usuario = $_POST["usuario"];
        $nombre = $_POST["nombre"];

        try {

            require_once("funciones/funciones.php");


            if(empty($_POST["password"])) {

                $sql = "UPDATE admins SET usuario = ?, nombre = ?, editado = NOW() WHERE id_admin = ?";

                if($stmt = $conn->prepare($sql)) {

                    $stmt->bind_param("ssi", $usuario, $nombre,$id);
        
                    $stmt->execute();
    
                    if($stmt->affected_rows > 0) {
                        $respuesta = array(
                            "respuesta" => "exito",
                            "id_actualizado" => $stmt->insert_id
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

                $password = $_POST["password"];

                $opciones = array (
                    'cost' => 10
                );
                
                $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
            
                $sql = "UPDATE admins SET usuario = ?, nombre = ?, password = ?, editado = NOW()  WHERE id_admin = ?";   

                if($stmt = $conn->prepare($sql)) {

                    $stmt->bind_param("sssi", $usuario, $nombre, $hash_password, $id);

                    $stmt->execute();
    
                    if($stmt->affected_rows > 0) {
                        $respuesta = array(
                            "respuesta" => "exito",
                            "id_actualizado" =>  $stmt->insert_id
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

            $sql = "DELETE FROM admins WHERE id_admin = ?";
            
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