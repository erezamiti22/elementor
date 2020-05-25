<?php

require_once('classes/SimpleRequestHandler.php');

$handler = new SimpleRequestHandler('GET');

if($handler->checkMethod()){
  $data = array();
  $data['header'] = 'Lorem Ipsum';
  $data['subHeader'] = 'Porro quisquam';
  $data['content'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consequat felis lobortis posuere posuere. Proin eget felis non nulla lacinia vestibulum. Vivamus luctus nisl at enim dapibus consectetur. Curabitur molestie faucibus consectetur.
';
  $handler->resolve($data);
} else {
  $handler->error(405, 'Method Not Allowed');
}