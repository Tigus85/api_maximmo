<?php


use Slim\Factory\AppFactory;
use Slim\Routing\RouteContext;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require __DIR__ . '/../config/config.inc.php'; 
require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();


$app->add(function (Request $request, RequestHandlerInterface $handler): Response {
    $routeContext = RouteContext::fromRequest($request);
    $routingResults = $routeContext->getRoutingResults();
    $methods = $routingResults->getAllowedMethods();
    $requestHeaders = $request->getHeaderLine('Access-Control-Request-Headers');
    $response = $handler->handle($request);
    $response = $response->withHeader('Access-Control-Allow-Origin', '*');
    $response = $response->withHeader('Access-Control-Allow-Methods', implode(',', $methods));
    $response = $response->withHeader('Access-Control-Allow-Headers', $requestHeaders);
    return $response;
});
$app->addRoutingMiddleware();

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello World");
    return $response;
});


// area_types

$app->get('/area_types', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM area_types");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/area_types/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM area_types where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

// area_types_products

$app->get('/area_types_products', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM area_types_products");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/area_types_products/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM area_types_products where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

// charges_products

$app->get('/charges_products', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM charges_products");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/charges_products/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM charges_products where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

// "charge_types",
$app->get('/charge_types', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM charge_types");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/charge_types/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM charge_types where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

// "localizations",
$app->get('/localizations', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM localizations");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/localizations/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM localizations where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});
// "option_types",
$app->get('/option_types', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM option_types");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/option_types/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM option_types where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});
// "pictures",
$app->get('/pictures', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM pictures");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/pictures/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM pictures where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});
// "products",
$app->get('/products', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM products");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/products/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM products where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});
// "product_options",
$app->get('/product_options', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM product_options");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/product_options/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM product_options where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});
// "product_prestations",
$app->get('/product_prestations', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM product_prestations");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/product_prestations/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM product_prestations where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});
// "product_types",
$app->get('/product_types', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT * FROM product_types");
    $req->execute();
    $data = $req->fetchAll(PDO::FETCH_ASSOC);
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});

$app->get('/product_types/{id}', function (Request $request, Response $response, $args) {
    global $bdd;
    $userID = $args['id']; // On récupère ici l'ID passé en paramètres d'URL
    $req = $bdd->prepare("SELECT * FROM product_types where id = ?");
    $req->execute([$userID]);
    $data = $req->fetch(PDO::FETCH_ASSOC); // Nous n'attendons qu'un résultat => fetch ! et pas fetchAll
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");
});


// requete produit page


$app->get('/prod', function (Request $request, Response $response, $args) {
    global $bdd;
    $req = $bdd->prepare("SELECT *
    FROM products
    INNER JOIN pictures ON products.id = pictures.product_id
    INNER JOIN localizations ON products.id = localizations.product_id
    INNER JOIN area_types_products ON products.id = area_types_products.product_id");
    $req->execute();
    $data[""] = $req->fetchAll(PDO::FETCH_ASSOC);
    
    $response->getBody()->write(json_encode($data));
    return $response->withHeader("Content-type", "application/json");


});


$app->run();