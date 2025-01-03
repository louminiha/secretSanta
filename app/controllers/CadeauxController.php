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
            $argent= $Model->getArgent($_SESSION['id_client']);
             echo empty($argent['somme']);
            if(empty($argent['somme'])) $argent['somme']=0;
             $argent=$argent['somme'];
            //  echo $argent;
            $cadeauFille = $cadeauM->getGiftsGirls($_GET['nb_fille']);
            $cadeauGarcon = $cadeauM->getGiftsBoys($_GET['nb_garcon']);
            $_SESSION['cadeau']=array_merge($cadeauFille,$cadeauGarcon);
            $data = ['cadeaux' => $_SESSION['cadeau'],'argent'=>$argent,'page' => "Allgifts"];
            $_SESSION['cadeau']=true;
            Flight::render('acceuil', $data);
        // }
        // else {
        //     $data = ['cadeaux' => $_SESSION['cadeau'], 'page' => "AfficherCadeaux"];
        //     Flight::render('acceuil',$data);
        // }
    }
    public function ChangerCadeau($idCadeau,$id_category) {
        $cadeauM = new CadeauxModel(Flight::db());
        $_SESSION['cadeau'][$idCadeau]=$cadeauM->refaireChoix($id_category);
        $data = ['cadeaux' => $_SESSION['cadeau'], 'page' => "AfficherCadeaux"];
        Flight::render('acceuil',$data);
    }

    public function achat_cadeaux()
    {
        $cadeauM = new CadeauxModel(Flight::db());
        $Model = new ClientModel(Flight::db());
        $somme= $_POST['somme'];
        $argent=$_POST['argent'];
        if($somme<=$argent)
        {
            $Model->faire_achat($_SESSION['id_client'],$somme);
            $data=["page"=>"none"];
            Flight::render('acceuil',$data);
        }else{
            $_SESSION['message']="montant insuffisant";
            $data = ['cadeaux' => $_SESSION['cadeau'],'argent'=>$argent,'page' => "Allgifts"];
            Flight::render('acceuil', $data);
        }
    }

}
