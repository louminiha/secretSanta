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
        $connected=true;
        Flight::render('page', ['view' => 'gift','connected'=>$connected]);
    }
    public function result() {
        $connected=true;
        $Model = new ClientModel(Flight::db());
        Flight::render('page', ['view' => 'result','connected'=>$connected]);
    }
    public function alert() {
        Flight::render('page', ['view' => 'alert']);
    }
    public function admin() {
        Flight::render('admin', ['view' => 'admin-home']);
    }
    public function depositsValidation() {
        Flight::render('admin', ['view' => 'deposits-validation']);
    }
    public function deco()
    {
        session_destroy();
        $connected=false;
        Flight::render('page', ['view' => 'home','connected'=>$connected]);
    }
}