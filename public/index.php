<?php

// import slim
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteContext;
use Psr\Http\Server\RequestHandlerInterface;

require __DIR__ . '/../vendor/autoload.php';

// bdd connexion local
//$pdo = new PDO('mysql:host=localhost; dbname=webdoc;charset=utf8', 'root2');

// bdd connexion online
$pdo = new PDO('mysql:host=custom-x5lq.mysql.eu2.frbit.com; dbname=custom-x5lq;charset=utf8', 'custom-x5lq', 'I8SIS0.rKUSCWdRH8kQ7HWCq');

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$app = AppFactory::create();
$app->addBodyParsingMiddleware();

// This middleware will append the response header Access-Control-Allow-Methods with all allowed methods

$app->add(function (Request $request, RequestHandlerInterface $handler): Response {


  $routeContext = RouteContext::fromRequest($request);
  $routingResults = $routeContext->getRoutingResults();
  $methods = $routingResults->getAllowedMethods();
  $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');
  $response = $handler->handle($request);
  //if in online 
  $response = $response->withHeader('Access-Control-Allow-Origin', 'https://canwebreathenow.netlify.app');
  //if in production
  $response = $response->withHeader('Access-Control-Allow-Origin', '*');
  $response = $response->withHeader('Access-Control-Allow-Methods', implode(',', $methods));
  $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);
  // Optional: Allow Ajax CORS requests with Authorization header
  // $response = $response->withHeader('Access-Control-Allow-Credentials', 'true');
  return $response;
});


$app->addRoutingMiddleware();

// For create a json with all information for all countries / [{country1:...},{country2...},ect]
$app->get('/countries/{country_name}', function (Request $request, Response $response, $args) use ($pdo): Response {
  $req = $pdo->prepare("SELECT * FROM countries WHERE country=:name");
  $req->bindValue(":name", $args["country_name"]);
  $req->execute();
  $countries = $req->fetch(PDO::FETCH_ASSOC);
  $payload = json_encode($countries);
  $response->getBody()->write($payload);
  return $response->withHeader('Content-Type', 'application/json');
});

// For create a json with all information for one country / {country1:...}
$app->get('/countries', function (Request $request, Response $response, $args) use ($pdo) {
  $req = $pdo->prepare("SELECT * FROM countries ");
  $req->execute();
  $countries = $req->fetchAll(PDO::FETCH_CLASS);
  $payload = json_encode($countries);
  $response->getBody()->write($payload);
  return $response->withHeader('Content-Type', 'application/json');
});

// For create a json with all information for all defintion / [{defintion1:...},{definition2...},ect]
$app->get('/definition', function (Request $request, Response $response, $args) use ($pdo) {
  $req = $pdo->prepare("SELECT * FROM definition");
  $req->execute();
  $definition = $req->fetchAll(PDO::FETCH_CLASS);
  $payload = json_encode($definition);
  $response->getBody()->write($payload);
  return $response->withHeader('Content-Type', 'application/json');
});

$app->run();
