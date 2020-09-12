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

    else if(isset($_POST["login-admin"])) {
        
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];

        try {
            
            require_once("funciones/funciones.php"); 

            $sql = "SELECT * FROM admins WHERE usuario = ?";
            
            if($stmt = $conn->prepare($sql)) {

                $stmt->bind_param("s", $usuario);
                $stmt->execute();
                $stmt->bind_result($id_admin, $usuario_admin, $nombre_admin, $password_admin);

                if($stmt->affected_rows) {
                    $existe = $stmt->fetch();
                    if($existe) {
                        if(password_verify($_POST["password"], $password_admin)) {

                            session_start();
                            $_SESSION["usuario"] = $usuario_admin;
                            $_SESSION["nombre"] = $nombre_admin;

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

    else if($_POST["registro"] == "actualizar") {
        die(json_encode($_POST));
    }

?>