<?php

namespace App;

use Psr\Http\Message\ResponseInterface as Response;

class Helper
{
  public static function sendJson(Response $response, array $message): Response
  {
    $response->getBody()->write(
      json_encode($message, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
    );
    return $response
      ->withHeader("Content-Type", "application/json")
      ->withStatus(200);
  }
}
