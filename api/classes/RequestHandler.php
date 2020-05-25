<?php


abstract class RequestHandler
{
  abstract public function resolve($data);
  abstract public function error($status_code, $message);
}