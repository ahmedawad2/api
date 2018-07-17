<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

//$app->get('/hello/{fname}/{lname}', function (Request $request, Response $response, array $args) {
//    $fname = $args['fname'];
//    $lname = $args['lname'];
//    $third = $request->getQueryParams()['third'];
//    $response->getBody()->write("Hello, ($fname $lname), the 3rd param is $third");
//
//    return $response;
//});


//$app->any('/post', function(Request $req, Response $res){
//    $data = $req->getParsedBody();
//    $name = $data['name'];
//    $phone = $data['phone'];
//    $res->getBody()->write("welcome $name, your phone is : $phone");
////    return $res;
//
//});



$app->get('/hello/{fname}/{lname}', function(Request $req, Response $res, array $args){
    $fname = $req->getAttribute('fname');
    $lname = $args['lname'];
    $third = $req->getQueryParams()['third'];

    $res->getBody()->write("hello ($fname $lname), the third parameter is: $third");
    return $res;
});

$app->post('/testPost', function(Request $req, Response $res){
    $data = $req->getParsedBody();
    $name = $data['name'];
    $phone = $data['phone'];

    $res->getBody()->write("welcomme $name, your phone is: $phone");
});


$app->run();