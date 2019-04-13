<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 30/03/2019
 * Time: 11:19
 */

class MUsers
{
    private $conn;

    public function __construct()
    {
        // Connexion à la Base de Données
        $this->conn = new PDO(DATABASE, LOGIN, PASSWORD);

        return;

    } // __construct()

    public function __destruct(){}

    public function VerifUser($_value)
    {
        $query = 'select ID_USER,
                     NOM, 
                     PRENOM,
                     AUTORISATION
              from USERS
              where LOGIN = :LOGIN
              and PASSWORD = :PASSWORD';

        $result = $this->conn->prepare($query);

        $result->bindValue(':LOGIN', $_value['LOGIN'], PDO::PARAM_STR);
        $result->bindValue(':PASSWORD', $_value['PASSWORD'], PDO::PARAM_STR);

        $result->execute();

        return $result->fetch();

    } // VerifUser($_value)

} // MUsers
