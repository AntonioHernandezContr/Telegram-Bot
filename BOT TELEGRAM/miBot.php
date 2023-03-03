<?php
// Ruta para la API de Telegram
$path = "https://api.telegram.org/bot6281861623:AAFTLtxlKuRSSQL6TKDJCSk8YYQ2JIMPrqo";

// Leemos los datos que se envian
$update = json_decode(file_get_contents("php://input"), TRUE);

// identificamos el Chat Id
$chatId = $update["message"]["chat"]["id"];

// Identificamos el mensaje
$message = $update["message"]["text"];

// Mensaje de Bienvenida
file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Bienvenido a AntoBot. Puedes consultar el tiempo con el comando /tiempo.");

// Si el mensaje es /tiempo le enviamos una respuesta al Chat
if (strpos($message, "/tiempo") === 0) {
    $jsonTiempo = json_decode(file_get_contents("https://www.el-tiempo.net/api/json/v2/provincias/17"));
    file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=".$jsonTiempo['today']);    
}

// En caso de cualquier otra cosa enviamos Una respuesta diferente
else{
file_get_contents($path."/sendmessage?chat_id=".$chatId."&text=Gracias por usar AntoBot!");
}
?>