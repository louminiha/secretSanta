<?php
namespace app\controllers;
session_start();
use app\models\DepotModel;
use app\models\ClientModel;

use Flight;

class ClientController {

	public function __construct() {

	}

    //controllerur de redirection
    public function loginPage()
    {
        Flight::render('Login');
    }
    public function SingInPage()
    {
        Flight::render('inscription');
    }
	public function verificationConnexionClient() {
        $mail= $_POST['mail'];
        $password=$_POST['password'];
        $loginModel = new ClientModel(Flight::db());
        echo $mail==="";
       if($loginModel->VerificationLogin($mail,$password))
       {
        $_SESSION['id_client']=$loginModel->setIdSession($mail,$password);
        $_SESSION['mail']=$mail;
        $connect=true;
        $data=["view"=>"home",'connected'=>$connect];
        Flight::render('page',$data);
    //    }else if(isset($_SESSION['erreur']))
    //    {
        
    //     unset($_SESSION['erreur']);
    //     Flight::render('login');
       }else if($mail==="" || $password==="")
       {
        $_SESSION['erreur']="erreur, veuillez reessayer";
         Flight::render('page',['view'=>'home']);
        //  Flight::redirect('/connexion');

       // unset($_SESSION['erreur']);
       }
        else {
            $_SESSION['erreur']="Identifiant invalide";
        //  Flight::redirect('/connexion');

        Flight::render('page',['view'=>'home']);
        }
    }
    public function InsererClient() {
        $mail= $_POST['mail'];
        $password=$_POST['password'];
        $loginModel = new ClientModel(Flight::db());
        $loginModel->insertUser($mail,$password);
        $_SESSION['mail']=$mail;
        $_SESSION['id_client']=$loginModel->setIdSession($mail,$password);
        $connect=true;
        $data=["view"=>"home",'connected'=>$connect];
        Flight::render('page',$data);
      
    }
	public function insererDepot()
    {
        $depotM= new DepotModel(Flight::db());
        $montant=$_GET['montant_depot'];
        echo $montant;
        $idCLient=  $_SESSION['id_client'];
        $depotM->InsertDepot($idCLient,$montant);
        $connect=true;
        $data=["view"=>"deposit",'connected'=>$connect];
       Flight::render('page',$data);
    }
    public function returnSommeArgent()
    {
        $Model = new ClientModel(Flight::db());
        $argent= $Model->getArgent($_SESSION['id_client']);
       Flight::render('page',['view'=>'deposit','argent'=>$argent]);


    }
    
    
}