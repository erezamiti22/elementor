<?php

abstract class RequestHandler
{
  abstract public function listen();
  abstract public function handleRequest($method, $path, $function);
}