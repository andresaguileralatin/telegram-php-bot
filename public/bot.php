<?php

$contenido = file_get_contents("php://input");
$update = json_decode($contenido, true);

file_put_contents("debug.txt", print_r($update, true)); // para ver qué llega

if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $mensaje = $update["message"]["text"];

    $token = "TU_TOKEN_AQUI";
    $url = "https://api.telegram.org/bot$token/sendMessage";

    $respuesta = [
        'chat_id' => $chat_id,
        'text' => "Hola! Recibí tu mensaje: $mensaje"
    ];

    file_get_contents($url . "?" . http_build_query($respuesta));
}
