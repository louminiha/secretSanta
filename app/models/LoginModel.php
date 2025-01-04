<?php 
namespace app\models;

class LoginModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function VerificationLogin($mail, $password)
    {
        // $sql="select *from user where mail=".$mail." and password=".$password."";
        // $stmt = $this->db->prepare($sql);
        // $stmt->execute();
        // while ($stmt->fetch()) {
        //     return true;
        // }
        // return false;
        if($mail=="mimi" && $password="mimi") 
        {
            return true;
        }
        return false;
    }
   

  
}

?>