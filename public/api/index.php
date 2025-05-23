<?php

use App\Database;
use App\Helper;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$rootDir = dirname(__DIR__, 2);
require "$rootDir/vendor/autoload.php";

// Configuration ---------------------------------------------------------------
$prodConfigFile = "$rootDir/config/Production.php";
$devConfigFile = "$rootDir/config/Development.php";
$configFile = file_exists($prodConfigFile) ? $prodConfigFile : $devConfigFile;
$config = include $configFile;

// App & DB --------------------------------------------------------------------
$app = AppFactory::create();
$db = new Database($config["db.dsn"], $config["db.user"], $config["db.password"]);

// Middlewares -----------------------------------------------------------------
// true adds the trailing slash (false removes it)
$app->add(new Middlewares\TrailingSlash(trailingSlash: true));

// Report Exception as JSON response
$app->add((new Middlewares\JsonExceptionHandler())
  ->includeTrace(false)
  ->jsonOptions(JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

// Routes ----------------------------------------------------------------------

$app->get('/api/', function (Request $request, Response $response, array $args) {
  return Helper::sendJson(
    $response,
    [
      "Welcome to the HeyHai Web API.",
      "Available routes:",
      "GET /api/jokes",
      "GET /api/vote/up/123",
      "GET /api/vote/down/123"
    ]
  );
});

$app->get('/api/jokes/', function (Request $request, Response $response, array $args) use ($db) {
  $data = $db->getJokes();
  return Helper::sendJson($response, $data);
});

$app->get('/api/vote/{direction}/{id}/', function (Request $request, Response $response, array $args) {
  $voteUp = strtolower($args["direction"] ?? "up") === "up";
  $id = max(-1, $args["id"] ?? -1);

  $response->getBody()->write("Vote #$id " . ($voteUp ? "up" : "down"));
  return $response;
});

// Go for it -------------------------------------------------------------------
$app->run();
