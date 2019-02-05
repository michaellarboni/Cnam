<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 07/11/2018
 * Time: 21:26
 */

class VAdmin
{
    public function __construct() {}
    public function __destruct()  {}

    function adminForm()
    {
        echo <<<HERE
        <form method="post" action="../Php/index.php?EX=verifAdmin">
            <p style="text-align: center">
            <input type="password" placeholder="mot de passe" name="PASSWORD" />
            <input type="submit" value="Valider" />
            </p>
        </form>
HERE;
    }

    public function verifAdmin()
    {
        $password = $_POST['PASSWORD'];
        // $email = $_POST['email'];

        if (isset($password) AND $password == 'kangourou')
        {
            echo '<p style="text-align: center"><a style=" color: #000" href="../Php/index.php?EX=admin">OK</a></p>' ;
        }

            elseif (empty($password))
            {
                $this->adminForm();
                echo '<p style="text-align: center">Mot de passe requis !</p>';
            }

            else
            {
                $this->adminForm();
                echo '<p style="text-align: center">Mot de passe incorrect !</p>';
            }
    }
}
