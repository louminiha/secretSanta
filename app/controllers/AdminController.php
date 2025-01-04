<?php

namespace app\controllers;
use app\models\LoginModel;
use app\models\DepotModel;
use Flight;

class AdminController {
	public function __construct() {

	}
    public function verificationConnexionAdmin() {
        $mail= $_POST['mail'];
        $password=$_POST['password'];
        $loginModel = new LoginModel(Flight::db());
       if($loginModel->VerificationLogin($mail,$password))
       {
        Flight::render('acceuil');
       }
        else {
            Flight::render('LoginAdmin');
        }
    }
    public function valider_depot( $id)
    {
       
        $depot_M= new DepotModel(Flight::db());
        $alldepot= $depot_M->getDepot();
        $depot_M->validerDepot($id);
        $data=["view"=>"deposits-validation",'depots'=>$alldepot];
        Flight::redirect('../deposits-validation');
        // Flight::render('admin',$data);
    }
    public function afficher_depot()
    {
        $depot_M= new DepotModel(Flight::db());
        $alldepot= $depot_M->getDepot();
        $data=["view"=>'deposits-validation','depots'=>$alldepot];
        Flight::render('admin',$data);

    }
   
	
}