<?php

namespace app\models;

use Flight;

class CadeauxModel
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // public  function getProduit()
    // {
    //     $produit = ['nom' => 'iphone 15', 'prix' => 1290];
    //     return $produit;
    // }

    // public  function test()
    // {
    //     $stmt = $this->db->query("SELECT * FROM etudiant");
    //     return $stmt->fetch();
    // }

    // public function getAllProduct()
    // {
    //     $stmt = $this->db->query("SELECT * FROM produits");
    //     return $stmt->fetchAll();
    // }
    // public function getProductDetails($i)
    // {
    //     $sql = "SELECT * FROM produits where id_produit=" . $i . "";
    //     $stmt = $this->db->query($sql);
    //     $result = $stmt->fetch();
    //     echo $sql;
    //     if ($result === false) {
    //         echo "Aucun produit trouvé pour l'ID " . $i;
    //     }
    //     return $result;
    // }

    public function getAllGiftsByCategory($idCategory)
    {
        $sql = "SELECT * FROM produits WHERE id_category =". $idCategory ."";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $cadeaux = array();
        while ($cadeau = $stmt->fetch()) {
            $cadeaux[] = $cadeau;
        }
        return $cadeaux;
    }


    //retourne un tableau associe a chaque enfant 
    function getRandNumber($min, $max) {}

    function verify($tab, $indice)
    {
        for ($i = 0; $i < count($tab); $i++) {
            if ($tab[$i] == $indice) {
                return true;
            }
        }
        return false;
    }
    public function getGiftsGirls($nbfille)
    {
        $cadeauFille = $this->getAllGiftsByCategory(1);
        $cadeauNeutre = $this->getAllGiftsByCategory(3);
        //pour savoir combien d'enfant aura de cadeau neutre 
        $nbCadeauNeutreF = rand(0, $nbfille);
        //nombre de cadeaux pour chaque categorie
        echo $nbCadeauNeutreF;
        $nbF = $nbfille - $nbCadeauNeutreF;
        echo $nbF;
        $indice = rand(0, count($cadeauFille) - 1);
        $tab = array();
       // $tab[0] = $indice;
        $gifts = array();
        //$gifts[0] = $cadeauFille[$indice];
        $i=0;
       while($i <$nbF) {
            $indice = rand(0, count($cadeauFille) - 1);
            if (!$this->verify($tab, $indice)) {
                $tab[] = $indice;
                $gifts[] = $cadeauFille[$indice];
                $i++;
                //var_dump($cadeauFille[$indice]);
            }
        }
        $indice = rand(0, count($cadeauNeutre) - 1);
        $tab = array();
        
        // $gifts[] = $cadeauNeutre[$indice];
        $j=0;
        while($j < $nbCadeauNeutreF) {
            $indice = rand(0, count($cadeauNeutre) - 1);
            if (!$this->verify($tab, $indice)) {
                $tab[] = $indice;
                $gifts[] = $cadeauNeutre[$indice];
                $j++;
            }
            
        }
        echo count($gifts);
        return $gifts;
    }
    public function getGiftsBoys($nbgarcon)
    {
        $cadeauGarcon = $this->getAllGiftsByCategory(2);
        $cadeauNeutre = $this->getAllGiftsByCategory(3);
        //pour savoir combien d'enfant aura de cadeau neutre 
        $nbCadeauNeutreG = rand(0, $nbgarcon);
        //nombre de cadeaux pour chaque categorie
        echo " -- ".$nbCadeauNeutreG;
        $nbG = $nbgarcon - $nbCadeauNeutreG;
        echo " -- ".$nbG;
        $indice = rand(0, count($cadeauGarcon) - 1);
        $tab = array();

        $gifts = array();
        $i=0;
        while($i  < $nbG) {
            $indice = rand(0, count($cadeauGarcon) - 1);
            if (!$this->verify($tab, $indice)) {
                $tab[] = $indice;
                $gifts[] = $cadeauGarcon[$indice];
                $i++;
            }
        }
       // $indice = rand(0, count($cadeauNeutre) - 1);
        $tab = array();
        $j=0;
        while($j < $nbCadeauNeutreG) {
            $indice = rand(0, count($cadeauNeutre) - 1);
            if (!$this->verify($tab, $indice)) {
                $tab[] = $indice;
                $gifts[] = $cadeauNeutre[$indice];
                $j++;
            }
        }
        echo count($gifts);
        return $gifts;
    }
    function choix($num1, $num2)
{
    // Utilise rand() pour choisir un nombre aléatoire entre 0 et 1
    return rand(0, 1) === 0 ? $num1 : $num2;
}

    function refaireChoix($id_category)
    {
        if($id_category==3)
        {
            $id_category=$this->choix($id_category,3);
        }
        $cadeaux=$this->getAllGiftsByCategory($id_category);
        $indice= rand(0, count($cadeaux)-1);
        return $cadeaux[$indice];
    }
    
}
