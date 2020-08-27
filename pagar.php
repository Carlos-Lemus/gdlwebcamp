<?php 

    if(!isset($_POST['submit'])){
        exit("hubo un error");
    } 

    // importamos las clases
    use PayPal\Api\Payer; 
    use PayPal\Api\Item; 
    use PayPal\Api\ItemList; 
    use PayPal\Api\Details; 
    use PayPal\Api\Amount; 
    use PayPal\Api\Transaction; 
    use PayPal\Api\RedirectUrls; 
    use PayPal\Api\Payment; 

    require "includes/paypal.php";

    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $email = $_POST["email"];
    $regalo = $_POST["regalo"];   
    $fecha = date("Y-m-d H:i:s"); 
    $total = $_POST["total_pedido"];

    // pedidos 
    $pedidoExtra = $_POST["pedido_extra"];
    $camisas = $_POST["pedido_extra"]["camisas"]["cantidad"];
    $precioCamisas = $_POST["pedido_extra"]["camisas"]["precio"];
    $etiquetas = $_POST["pedido_extra"]["etiquetas"]["cantidad"];
    $precioEtiquetas = $_POST["pedido_extra"]["etiquetas"]["precio"];

    $boletos = $_POST["boletos"];
    $numeroBoletos = $boletos;

    include_once("includes/funciones/funciones.php");
    $pedido = productos_json($boletos, $camisas, $etiquetas);

    $eventos = $_POST["registro"];

    $registro = eventos_json($eventos);


    try {

            require_once("includes/funciones/conexion.php");
            $sql = "INSERT INTO registros(nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalos, total_pagado) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";

        if($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssssis", $nombre, $apellido, $email ,$fecha, $pedido, $registro, $regalo, $total);
            $stmt->execute();
            
            $ID_registro = $stmt->insert_id;

            $stmt->close();
            $conn->close();

        } else {
             $error = $conn->errno." ".$conn->error;
             echo $error; 
        }

    } catch(\Exception $exception) {
        echo $exception->getMessage();
    }

    $compra = new Payer();

    $compra->setPaymentMethod("paypal");
    
    $i = 0;
    $arreglo_pedido = array();

    foreach($numeroBoletos as $key => $value) {
        
        if((int) $value["cantidad"]>0) {
            ${"articulo$i"} = new Item();
            $arreglo_pedido[] = ${"articulo$i"};
            ${"articulo$i"}->setName("Pase: ".$key)
                    ->setCurrency("USD")
                    ->setQuantity((int) $value["cantidad"])
                    ->setPrice((int) $value["precio"]);

            $i++;
        }
    }

    foreach($pedidoExtra as $key => $value) {
        
        if((int) $value["cantidad"]>0) {

            if($key == "camisas") {
                $descuento = (float)$value["precio"]*0.25;
                $precio = (float)$value["precio"] - $descuento;
            } else {
                $precio = (float)$value["precio"];
            }

            ${"articulo$i"} = new Item();
            $arreglo_pedido[] = ${"articulo$i"};
            ${"articulo$i"}->setName("Pase: ".$key)
                    ->setCurrency("USD")
                    ->setQuantity((int) $value["cantidad"])
                    ->setPrice($precio);

            $i++;
        }
    }

    $listaArticulos = new ItemList();
    $listaArticulos->setItems($arreglo_pedido);

    $cantidad = new Amount();
    $cantidad->setCurrency("USD")
            ->setTotal($total);

    $trasaccion = new Transaction();
    $trasaccion->setAmount($cantidad)
                ->setItemList($listaArticulos)
                ->setDescription("Pago GDLWEBCAMP")
                ->setInvoiceNumber($ID_registro);

    echo  $trasaccion->getInvoiceNumber();

    $redireccionar = new RedirectUrls();
    $redireccionar->setReturnUrl(URL_SITIO."/pago_realizado.php?id_pago={$ID_registro}")
                  ->setCancelUrl(URL_SITIO."/pago_realizado.php?id_pago={$ID_registro}");

    $pago = new Payment();
    $pago->setIntent("sale")
        ->setPayer($compra)
        ->setRedirectUrls($redireccionar)
        ->setTransactions(array($trasaccion));

    try {
        $pago->create($apiContext);
    } catch(PayPal\Exception\PayPalConnectionException $paypalException) {
        echo "<pre>";
        print_r(json_decode($paypalException->getData));
        echo "</pre>";
    }

    $aprobado = $pago->getApprovalLink();

    header("location: {$aprobado}");

?>