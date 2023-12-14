<?php

require 'vendor/autoload.php';
require 'src/RdhSocketClient.php';

// Instantiate the RdhSocketClient
$rdhSocketClient = new RdhArchipoint\RdhSocketClient([
    'app_id' => "2_1702479942123",
    'app_key' => "70376759ac0b54d18e53dcfbd23878806d031147",
    'token' => "99831bf4e019dfdcc2a6bc66fc1ebba6343f3e3b"
]);

// Call the getResponse method
$response = $rdhSocketClient->emit("messages","NewMessage", ["content"=>"Coucou"]);
echo "Get Response: \n";
var_dump($response);
