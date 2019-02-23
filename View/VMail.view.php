<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 07/11/2018
 * Time: 21:26
 */

class VMail
{
    public function __construct(){}
    public function __destruct(){}

    public function sendMail()
    {
        // S'il y des données de postées
        if ($_SERVER['REQUEST_METHOD']=='POST')
        {
            $nombreErreur = 0;

            if (!isset($_POST['email']))
            {
                $nombreErreur++;
                $erreur1 = '<p>Il y a un problème avec la variable "email".</p>';
            }

            else
            {
                if (empty($_POST['email']))
                { // Si la variable est vide
                    $nombreErreur++;
                    $erreur2 = '<p>Veuillez entrer votre adresse mail.</p>';
                }
                else
                {
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                    {
                        $nombreErreur++;
                        $erreur3 = '<p>Format d\'email incorrect.</p>';
                    }
                }
            }
            if (!isset($_POST['message']))
            {
                $nombreErreur++;
                $erreur4 = '<p>Il y a un problème avec la variable "message".</p>';
            }
            else
            {
                if (empty($_POST['message']))
                {
                    $nombreErreur++;
                    $erreur5 = '<p>Veuillez entrer votre message.</p>';
                }
                /*else
                {
                    // Ici, il sera possible d'ajouter plus tard un code pour vérifier un captcha anti-spam.
                }*/
            }
            if ($nombreErreur==0)
            {
                // traiter l'envoi de l'email

                // Récupération des variables et sécurisation des données
                $nom     = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
                $email   = htmlentities($_POST['email']);
                $tel     = isset($_POST['tel']) ? htmlentities($_POST['tel']) : '';
                $sujet   = htmlentities($_POST['sujet']);
                $message = htmlentities($_POST['message']);


                // Variables concernant l'email destiné au webmaster

                $webmaster = 'michael.larboni@gmail.com'; // Adresse email du webmaster (à personnaliser)

                // Contenu du mail destiné au webmaster
                $contenu = '
     <html>
      <head>
       <title>Cat Clinic</title>
      </head>
      <body>
       <h3>Bonjour, vous avez reçu un message à partir de votre site web</h3>
       <div>
            <p><strong>Nom</strong>: '.$nom.'</p>
            <p><strong>Email</strong>: '.$email.'</p>
            <p><strong>Tel</strong>: '.$tel.'</p>
            <p><strong>Sujet</strong>: '.$sujet.'</p>
            <p><strong>Message</strong>: '.$message.'</p>
       </div>
      </body>
     </html>
     ';

                // Contenu du mail destiné en copie
                $contenu2 = '
     <html>
      <head>
       <title>Cat Clinic</title>
      </head>
      <body>
       <h3>Bonjour, vous avez envoyez un mail à Cat Clinic</h3>
       <div>
            <p><strong>Sujet</strong>: '.$sujet.'</p>
            <p><strong>Message</strong>: '.$message.'</p>
       </div>
      </body>
     </html>
     ';

                // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
                $headers = 'MIME-Version: 1.0'."\r\n";
                //$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
                $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";

                $this->confirmMail();

                // Envoyer l'email
                mail($webmaster, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email


                if (isset($_POST['copyMail']))
                {
                    // Envoie une copie de l'email
                    mail($email, $sujet, $contenu2, $headers); // Fonction secondaire qui envoi une copie de l'email
                }


            }

            else
            {

                $erreur = ($nombreErreur >1) ? 'erreurs' : 'erreur';
                echo '<div style="text-align: center; border:1px solid #ff0000; padding:5px;">';
                echo '<p style=" color:#ff0000;">Désolé, il y a eu '.$nombreErreur.' '.$erreur.' . Voici le détail:</p>';
                //if (isset($erreur1)) echo '<p><a href="index.php?EX=home"></a>'.$erreur1.'</p>';
                if (isset($erreur1)) echo '<p>'.$erreur1.'</p>';
                if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
                if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
                if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
                if (isset($erreur5)) echo '<p>'.$erreur5.'</p>';
                // (4) Ici, il sera possible d'ajouter un code d'erreur supplémentaire si un captcha anti-spam est erroné.
                echo '</div>';
            }
        }
    }

    public function confirmMail()
    {
        echo<<<HERE
<div class="grid-x grid-padding-x align-center-middle text-center">
        <div>
            <h2>Message envoyé</h2>
        </div>
</div>
HERE;

    }
}

