<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;


require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();

class Database
{
  function __construct($ip, $user, $password)
  {
    $pdo = new PDO("mysql:host='$ip'; dbname=webdoc;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}


class DatabaseFactory
{
  public function getDevelopmentServerConnection(): Database
  {
    return new Database('localhost', 'root2', '');
  }

  public function getProductionServerConnection(): Database
  {
    return new Database('123.1.2.3', 'app', 'secret');
  }
}


$app->get('/countries/{country_name}', function (Request $request, Response $response, $args) use ($pdo) {

  $req = $pdo->prepare("SELECT country, title FROM countries WHERE country='$args[country_name]'");
  $req->execute();
  $countries = print_r($req->fetch(PDO::FETCH_ASSOC));
  $response->getBody()->write($countries);
  return $response;
});

$app->get('/countries', function (Request $request, Response $response, $args) use ($pdo) {

  $req = $pdo->prepare("SELECT country,title,text,image,video FROM countries ");
  $req->execute();
  $countries = print_r($req->fetchAll(PDO::FETCH_CLASS));
  $response->getBody()->write($countries);
  return $response;
});

$app->get('/definition', function (Request $request, Response $response, $args) use ($pdo) {

  $req = $pdo->prepare("SELECT word,text FROM definition ");
  $req->execute();
  $definition = print_r($req->fetchAll(PDO::FETCH_CLASS));
  $response->getBody()->write($definition);
  return $response;
});

$app->run();
