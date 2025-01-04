<?php

use app\controllers\ApiExampleController;
use app\controllers\WelcomeController;
use app\controllers\ClientController;
use app\controllers\CadeauxController;
use app\controllers\AdminController;
use flight\Engine;
use flight\net\Router;
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */
/*$router->get('/', function() use ($app) {
	$Welcome_Controller = new WelcomeController($app);
	$app->render('welcome', [ 'message' => 'It works!!' ]);d
});*/

$Welcome_Controller = new WelcomeController();
$client_controller= new ClientController();
$cadeau_controller= new CadeauxController();
//$router->get('/', [ $Welcome_Controller, 'home' ]); 
$Welcome_Controller = new WelcomeController();
$router->get('/', [ $Welcome_Controller, 'home' ]); 
$router->get('/home', [ $Welcome_Controller, 'acceuil' ]); 
$router->get('/deposit', [ $Welcome_Controller, 'deposit' ]); 
$router->get('/result', [ $Welcome_Controller, 'result' ]); 
$router->get('/faire_depot', [  $client_controller, 'insererDepot' ]); 

//$router->get('/', [ $client_controller, 'loginPage']); 
$router->post('/inscription', [ $client_controller, 'SingInPage']); 
$router->get('/deconnexion', [$Welcome_Controller, 'deco']); 
$router->post('/connexion', [ $client_controller, 'verificationConnexionClient' ]); 
$router->post('/inserer_client', [ $client_controller, 'InsererClient' ]); 
$router->get('/generer', [ $cadeau_controller, 'getCadeaux']); 
$router->post('/achat', [ $cadeau_controller, 'achat_cadeaux']); 




// $router->get('/homedb', [ $Welcome_Controller, 'homedb' ]); 
// $router->get('/testdb', [ $Welcome_Controller, 'testdb' ]); 
// $router->get('/home-template', [ $Welcome_Controller, 'homeTemplate' ]); 
// $router->get('/product-template', [ $Welcome_Controller, 'productTemplate' ]);
//$router->get('/product-template/@id', [ $Welcome_Controller, 'afficherDetailProduit' ]);


//$router->get('/', \app\controllers\WelcomeController::class.'->home'); 

$router->get('/hello-world/@name', function($name) {
	echo '<h1>Hello world! Oh hey '.$name.'!</h1>';
});

$router->group('/api', function() use ($router, $app) {
	$Api_Example_Controller = new ApiExampleController($app);
	$router->get('/users', [ $Api_Example_Controller, 'getUsers' ]);
	$router->get('/users/@id:[0-9]', [ $Api_Example_Controller, 'getUser' ]);
	$router->post('/users/@id:[0-9]', [ $Api_Example_Controller, 'updateUser' ]);
});