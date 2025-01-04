<?php
namespace app\models;


class ClientModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }
    public function setIdSession($mail, $password)
    {
        $sql = "select id_client from Compte_Client where nom='" . $mail . "' and password='" . $password . "'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        while ($id = $stmt->fetch()) {
            return $id['id_client'];
        }
    }
    public function VerificationLogin($mail, $password)
    {
        $sql = "select *from Compte_Client where nom='" . $mail . "' and password='" . $password . "'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($stmt->fetch()) {
                $this->setIdSession($mail, $password);
                return true;
            }
        }
        return false;
    }
    public function setSessionErreur()
    {
        $_SESSION['erreur'] = "Identifiant invalide";
    }
    public function insertUser($mail, $password)
    {
        $sql = "INSERT INTO Compte_Client (nom,password) VALUES (?,?)";
        $stmt = $this->db->prepare($sql);
        // $stmt->bindParam(':id_vehicule', $idVehicule, \PDO::PARAM_INT);
        // $stmt->bindParam(':date_panne', $datePanne,);
        return $stmt->execute([$mail, $password]);
    }
    //prendre l'argent du client
    public function getArgent($idClient)
    {
        $sql = "select d.id_client,sum(montant_depot)-somme_argent somme
                 from compte_client c join 
                depot d on d.id_client=c.id_client where d.validation=true and d.id_client=".$idClient."";
        $stmt = $this->db->query($sql);
        return $stmt->fetch()['somme'];
        
    }
    function faire_achat($id_client,$somme)
    {
        $sql= "update compte_client set somme_argent= somme_argent+".$somme." where id_client=".$id_client."";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
    }
}
