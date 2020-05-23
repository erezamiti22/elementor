<?php

require_once('classes/elementorRequestHandler.php');

$inputs = array();
$post = array();

//Collecting relevant inputs
$scriptName = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']) );
$inputs['URI'] = '/'.substr_replace($_SERVER['REQUEST_URI'], '', 0, strlen($scriptName));
$inputs['URI'] = str_replace('//', '/', $inputs['URI']);
$inputs['method'] = @$_SERVER['REQUEST_METHOD'];
$inputs['raw_input'] = @file_get_contents('api://input');
@parse_str($inputs['raw_input'] , $post);
$inputs = array_merge($inputs,$post);

$app = new ElementorRequestHandler($inputs);

$app->handleRequest('GET', '/content', function () {
  $content = array();
  $content['header'] = 'Lorem Ipsum';
  $content['subHeader'] = 'Porro quisquam';
  $content['content'] = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla consequat felis lobortis posuere posuere. Proin eget felis non nulla lacinia vestibulum. Vivamus luctus nisl at enim dapibus consectetur. Curabitur molestie faucibus consectetur.
';
  echo json_encode($content);
});

$app->listen();