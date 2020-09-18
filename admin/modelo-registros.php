<?php 

if($_POST["accion"] == "nuevo") {

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $regalo = $_POST["regalo"];   
    $fecha = date("Y-m-d H:i:s"); 
    $total = $_POST["total_pedido"];
    $pagado = $_POST["pagado"];

    // pedidos 
    $pedidoExtra = $_POST["pedido_extra"];
    $camisas = $_POST["pedido_extra"]["camisas"]["cantidad"];
    $precioCamisas = $_POST["pedido_extra"]["camisas"]["precio"];
    $etiquetas = $_POST["pedido_extra"]["etiquetas"]["cantidad"];
    $precioEtiquetas = $_POST["pedido_extra"]["etiquetas"]["precio"];

    $boletos = $_POST["boletos"];

    try {
        
            require("funciones/funciones.php");
            
            $pedido = productos_json($boletos, $camisas, $etiquetas);
            $eventos = $_POST["registro"];
            $registro = eventos_json($eventos);
            
            $sql = "INSERT INTO registros(nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalos, total_pagado, pagado) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?);";

        if($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssssisi", $nombre, $apellido, $email ,$fecha, $pedido, $registro, $regalo, $total, $pagado);
            $stmt->execute();
            
            if($stmt->affected_rows > 0) {
                $respuesta = array(
                    "respuesta" => "exito",
                    "id_insertado" => $stmt->insert_id
                );
            } else {
                $respuesta = array(
                    "respuesta" => $conn->errno." ".$conn->error
                );
            }

            $stmt->close();
            $conn->close();

        } else {
             $error = $conn->errno." ".$conn->error;
             echo $error; 
        }

    } catch(\Exception $exception) {
        echo $exception->getMessage();
    }

    echo json_encode($respuesta);

}

else if($_POST["accion"] == "actualizar") {
    $id = (int) $_POST["id_registro"];
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $regalo = $_POST["regalo"];   
    $fecha = date("Y-m-d H:i:s"); 
    $total = $_POST["total_pedido"];
    $pagado = $_POST["pagado"];

    // pedidos 
    $pedidoExtra = $_POST["pedido_extra"];
    $camisas = $_POST["pedido_extra"]["camisas"]["cantidad"];
    $precioCamisas = $_POST["pedido_extra"]["camisas"]["precio"];
    $etiquetas = $_POST["pedido_extra"]["etiquetas"]["cantidad"];
    $precioEtiquetas = $_POST["pedido_extra"]["etiquetas"]["precio"];

    $boletos = $_POST["boletos"];

    try {

        require_once("funciones/funciones.php");

        $pedido = productos_json($boletos, $camisas, $etiquetas);
        $eventos = $_POST["registro"];
        $registro = eventos_json($eventos);

        $sql = "UPDATE registros SET nombre_registrado = ?, apellido_registrado = ?, email_registrado = ?, fecha_registro = ?, pases_articulos = ?, talleres_registrados = ?, regalos = ?, total_pagado = ?, pagado = ? WHERE ID_Registrado = ?";

        if($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("ssssssisii", $nombre, $apellido, $email ,$fecha, $pedido, $registro, $regalo, $total, $pagado, $id);
            
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

        $sql = "DELETE FROM registros WHERE ID_Registrado = ?";
        
        if($stmt = $conn->prepare($sql)) {

            $stmt->bind_param("i", $id_borrar);
            $stmt->execute();
            
            if($stmt->affected_rows > 0) {
                $respuesta = array(
                    "respuesta" => "exito",
                    "id_eliminado" => $id_borrar
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

?>