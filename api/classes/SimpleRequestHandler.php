<?php

include_once('RequestHandler.php');

class SimpleRequestHandler extends RequestHandler
{
  public function __construct($method) {
    $this->method = $method;
  }

  public function checkMethod(){
    return $_SERVER['REQUEST_METHOD'] === $this->method;
  }

  public function resolve($data) {
   $response = array('status' => 200, 'data' => $data);
   echo json_encode($response);
   exit;
  }

  public function error($status_code, $message) {
    $response = array('status' => $status_code, 'data' => $message);
    echo json_encode($response);
    exit;
  }
}