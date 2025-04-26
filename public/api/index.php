<?php

use App\Database;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require dirname(__DIR__, 2) . '/vendor/autoload.php';

$app = AppFactory::create();

// $db = new Database("")

$app->get('/api', function (Request $request, Response $response, array $args) {
  $response->getBody()->write("This is a web api only!");
  return $response->withHeader("Content-Type", "application/json");
});

$app->get('/api/jokes', function (Request $request, Response $response, array $args) {
  $response->getBody()->write("Jokes");
  return $response;
});

$app->get('/api/vote/{direction}/{id}', function (Request $request, Response $response, array $args) {
  $voteUp = strtolower($args["direction"] ?? "up") === "up";
  $id = max(-1, $args["id"] ?? -1);

  $response->getBody()->write("Vote #$id " . ($voteUp ? "up" : "down"));
  return $response;
});

$app->run();
