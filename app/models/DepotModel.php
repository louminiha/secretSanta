<?php 
namespace app\models;

class DepotModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
//fonction get depot non-valide
    public function getDepot(){
        $sql = "SELECT id_depot,c.id_client,montant_depot,nom FROM depot d join compte_client c on d.id_client=c.id_client where validation=FALSE";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll();
    }
    public function validerDepot($id)
    {
        $sql = "update depot set validation=TRUE where id_depot=".$id."";
        $stmt = $this->db->prepare($sql);
        // $stmt->bindParam(':id_vehicule', $idVehicule, \PDO::PARAM_INT);
        // $stmt->bindParam(':date_panne', $datePanne,);
        return $stmt->execute();
    }
    public function InsertDepot($idclient,$montant)
    {
        $sql = "insert into depot (id_client,montant_depot,validation) values (".$idclient.",".$montant.",FALSE)";
        $stmt = $this->db->prepare($sql);
        // $stmt->bindParam(':id_vehicule', $idVehicule, \PDO::PARAM_INT);
        // $stmt->bindParam(':date_panne', $datePanne,);
        return $stmt->execute();
    }

}