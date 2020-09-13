<?php 

    if($_POST["registro"] == "login") {
        
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        try {
            
            require_once("funciones/funciones.php"); 

            $sql = "SELECT * FROM admins WHERE usuario = ?";
            
            if($stmt = $conn->prepare($sql)) {

                $stmt->bind_param("s", $usuario);
                $stmt->execute();
                $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin, $editado);

                if($stmt->affected_rows) {
                    $existe = $stmt->fetch();
                    if($existe) {
                        if(password_verify($_POST["password"], $password_admin)) {

                            session_start();
                            $_SESSION["usuario"] = $usuario_admin;
                            $_SESSION["nombre"] = $nombre_admin;
                            $_SESSION["id"] = $id_admin;

                            $respuesta = array(
                                "respuesta" => "exitoso",
                                "usuario" => $usuario_admin
                            );
                        } else {
                            $respuesta = array(
                                "respuesta" => "password_incorrecto"

                            );
                        }
                        
                    } else {
                        $respuesta = array(
                            "respuesta" => "no_existe"
                        );
                    }

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