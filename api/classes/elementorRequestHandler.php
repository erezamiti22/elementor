<?php

require_once('router.php');
require_once('requestHandler.php');

class ElementorRequestHandler extends RequestHandler
{
  private $_URI;
  private $_method;
  private $_rawInput;
  private $requests = array();

  function __construct($inputs) {
    //HTTP inputs
    $this->_URI = $this->_checkKey('URI', $inputs);
    $this->_rawInput = $this->_checkKey('raw_input', $inputs);
    $this->_method = $this->_checkKey('method', $inputs);
  }

  //Return NULL if the key does not exist
  private function _checkKey($key, $array) {
    return array_key_exists($key, $array) ? $array[$key] : NULL;
  }

  public function handleRequest($method, $path, $function) {
    $request = array();
    $request['method'] = $method;
    $request['path'] = $path;
    $request['function'] = $function;
    $this->requests[] = $request;
  }

  public function listen() {

    $router = new Router();
    foreach ($this->requests as $request) {
      $router->addRoute($request['method'], $request['path'], $request['function']);
    }
    $router->run($this->_method, $this->_URI);
  }
}
