<?php 

    require "paypal/autoload.php";

    define("URL_SITIO", "http://localhost/GDLWebCamp/");

    $apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
            'AYjPTJzkv-6p5TRRnQSdvUhx2iAuE9jN9Wq8rYRHZgYRQ5oCptUn3A3XN_DHsVstZT8MvTaa-H8k2C93', // ClienteID
            'EIk1iddc3inHCapukRWrAo3w7lJ0Lm8XnvMrkMN-UM8MCzDel6Vl80uk0zAxq88Zg4h8MOF26QapbBl_' // Secret
        )
    );
    
?>