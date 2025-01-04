<?php
namespace app\controllers;


use app\models\ClientModel;
use Flight;

class WelcomeController {

	public function __construct() {

	}

	public function home() {
        $connected=false;
        Flight::render('page', ['view' => 'home','connected'=>$connected]);
    }
    public function acceuil() {
        $connected=true;
        Flight::render('page', ['view' => 'home','connected'=>$connected]);
    }
	public function deposit() {
        $connected=true;
        $Model = new ClientModel(Flight::db());
        $argent= $Model->getArgent($_SESSION['id_client']);
        Flight::render('page', ['view' => 'deposit','connected'=>$connected,'argent'=>$argent]);
    }
    public function gift() {
        Flight::render('page', ['view' => 'gift']);
    }
    public function result() {
        $connected=true;
        $Model = new ClientModel(Flight::db());
        Flight::render('page', ['view' => 'result','connected'=>$connected]);
    }
    public function deco()
    {
        session_destroy();
        $connected=false;
        Flight::render('page', ['view' => 'home','connected'=>$connected]);
    }
}