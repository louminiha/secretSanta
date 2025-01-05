<?php

namespace app\controllers;

use app\models\DepotModel;
use app\models\ClientModel;
use app\models\CadeauxModel;

use Flight;

class CadeauxController
{

    public function __construct() {}

    public function getCadeaux()
    {
        // if (session_status() == PHP_SESSION_NONE) {
        //     session_start();
        // }

        // if (!isset($_SESSION['cadeau'])) {
        $cadeauM = new CadeauxModel(Flight::db());
        $Model = new ClientModel(Flight::db());
        $argent = $Model->getArgent($_SESSION['id_client']);
        if(!$argent) $argent=0;
        //  echo empty($argent['somme']);
        // if(empty($argent['somme'])) $argent['somme']=0;
        //  $argent=$argent['somme'];
        //  echo $argent;
        $cadeauFille = $cadeauM->getGiftsGirls($_GET['nb_fille']);
        $_SESSION['nb_fille']=$_GET['nb_fille'];
        $cadeauGarcon = $cadeauM->getGiftsBoys($_GET['nb_garcon']);
        $_SESSION['nb_garcon']=$_GET['nb_garcon'];
        $_SESSION['cadeau'] = array_merge($cadeauFille, $cadeauGarcon);
        $connect = true;
        $data = ['cadeaux' => $_SESSION['cadeau'], 'argent' => $argent, 'view' => "result", 'connected' => $connect,'nbfille'=>$_SESSION['nb_fille'],'nbgarcon'=>$_SESSION['nb_garcon']];

        Flight::render('page', $data);
        // }
        // else {
        //     $data = ['cadeaux' => $_SESSION['cadeau'], 'page' => "AfficherCadeaux"];
        //     Flight::render('acceuil',$data);
        // }
    }
    public function ChangerCadeau($idCadeau, $id_category)
    {
        $cadeauM = new CadeauxModel(Flight::db());
        $_SESSION['cadeau'][$idCadeau] = $cadeauM->refaireChoix($id_category);
        $data = ['cadeaux' => $_SESSION['cadeau'], 'page' => "AfficherCadeaux"];
        Flight::render('acceuil', $data);
    }

    public function achat_cadeaux()
    {
        $cadeauM = new CadeauxModel(Flight::db());
        $Model = new ClientModel(Flight::db());
        $somme = $_POST['somme'];
        $argent = $_POST['argent'];
        if (!$somme) $somme = 0;
        if ($somme <= $argent) {
            $Model->faire_achat($_SESSION['id_client'], $somme);
            $connect = true;
            $data = ["view" => "gift", 'connected' => $connect];
            Flight::render('page', $data);
        } else {
            $_SESSION['message'] = "montant insuffisant";
            $connect = true;
            $data = ['cadeaux' => $_SESSION['cadeau'],'total'=>$somme, 'argent' => $argent, 'view' => "alert", 'connected' => $connect,'nbfille'=>$_SESSION['nb_fille'],'nbgarcon'=>$_SESSION['nb_garcon']];
            Flight::render('page', $data);
        }
    }
    public function ChangerProduitsSelectionne()
    {
        $cadeauM = new CadeauxModel(Flight::db());
        $Model = new ClientModel(Flight::db());
        $argent = $Model->getArgent($_SESSION['id_client']);
        if(!$argent) $argent=0;
        for ($i = 0; $i < count($_SESSION['cadeau']); $i++) {
            if (isset($_GET['choix' . $i . ''])) {
                $_SESSION['cadeau'][$i] = $cadeauM->refaireChoix($_SESSION['cadeau'][$i]['id_category']);
                $connect = true;
                $data = ['cadeaux' => $_SESSION['cadeau'], 'argent' => $argent, 'view' => "result", 'connected' => $connect,'nbfille'=>$_SESSION['nb_fille'],'nbgarcon'=>$_SESSION['nb_garcon']];
                Flight::render('page', $data);
            }
        }
    }
    public function ChangerTousLesProduits()
    {
        $cadeauM = new CadeauxModel(Flight::db());
        $Model = new ClientModel(Flight::db());
        $argent = $Model->getArgent($_SESSION['id_client']);
        if(!$argent) $argent=0;
        for ($i = 0; $i < count($_SESSION['cadeau']); $i++) {
          
                $_SESSION['cadeau'][$i] = $cadeauM->refaireChoix($_SESSION['cadeau'][$i]['id_category']);
                $connect = true;
                $data = ['cadeaux' => $_SESSION['cadeau'], 'argent' => $argent, 'view' => "result", 'connected' => $connect,'nbfille'=>$_SESSION['nb_fille'],'nbgarcon'=>$_SESSION['nb_garcon']];
                Flight::render('page', $data);
        }
    }
    public function Affichage_cadeau()
    {
        $connect = true;
        $Model = new ClientModel(Flight::db());
        $argent = $Model->getArgent($_SESSION['id_client']);
        if(!$argent) $argent=0;
        $data = ['cadeaux' => $_SESSION['cadeau'], 'argent' => $argent, 'view' => "result", 'connected' => $connect,'nbfille'=>$_SESSION['nb_fille'],'nbgarcon'=>$_SESSION['nb_garcon']];
        Flight::render('page', $data);
    }
}
