<?php

// currently unused but will be used in the future for reporting errors that occour.

function report_exception($exception)
{
    if (!isset($config['wehook_error']) || strlen($config['wehook_error']) < 1)
        return;
    send_websocket_message(["content" => '```json\n'
    . json_encode([
        'REQUEST_METHOD' => $_SERVER['REQUEST_METHOD'],
        'QUERY_STRING' => $_SERVER['QUERY_STRING'],
        'REQUEST_URI' => $_SERVER['REQUEST_URI'],
        'REMOTE_ADDR' => $_SERVER['REMOTE_ADDR']
    ], JSON_PRETTY_PRINT) . '\n'
    . '```'
    . 'exception\n'
    . '```\n'
    . print_r($exception, TRUE) . '\n'
    . '```']);
}
function send_websocket_message($msg)
{
    $webhook_url = $config['wehook_error'];
    $headers = array('Content-Type: application/json'); 
  
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, $webhook_url );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $msg ) );
    $response = curl_exec( $ch );
    curl_close( $ch );
}