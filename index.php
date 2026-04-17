<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

$response = [
    "status" => "success",
    "message" => "API is working!",
    "time" => date("Y-m-d H:i:s")
];

echo json_encode($response);
?>
