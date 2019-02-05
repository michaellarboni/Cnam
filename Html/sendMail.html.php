<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 03/02/2019
 * Time: 19:50
 */

error_reporting(-1);
ini_set('display_errors', '1');

require '../PHPMailer/_lib/class.phpmailer.php';
//require '../PHPMailer/_lib/PHPMailerAutoload.php';

$mail = new PHPmailer();
$mail->IsSMTP();
//$mail->IsMail();
$mail->Host='smtp.gmail.com';
$mail->From='michael.larboni@gmail.com';
$mail->AddAddress('mike2mars@hotmail.com');
$mail->AddReplyTo('michael.larboni@gmail.com');
$mail->Subject='Exemple trouvé sur DVP';
$mail->Body='Voici un exemple d\'e-mail au format Texte';
if(!$mail->Send()){ //Teste le return code de la fonction
  echo $mail->ErrorInfo; //Affiche le message d'erreur (ATTENTION:voir section 7)
}
else{
  echo 'Mail envoyé avec succès';
}
$mail->SmtpClose();
unset($mail);

?>

<?php



/*
// S'il y des données de postées
if ($_SERVER['REQUEST_METHOD']=='POST')
{
    $nombreErreur = 0;

    if (!isset($_POST['mail']))
    {
        $nombreErreur++;
        $erreur1 = '<p>Il y a un problème avec la variable "email".</p>';
    }

    else
    {
        if (empty($_POST['mail']))
        { // Si la variable est vide
            $nombreErreur++;
            $erreur2 = '<p>Veuillez entrer votre adresse mail.</p>';
        }
        else
        {
            if (!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            {
                $nombreErreur++;
                $erreur3 = '<p>Format d\'email incorrect.</p>';
            }
        }
    }
    if (!isset($_POST['msg']))
    {
        $nombreErreur++;
        $erreur4 = '<p>Il y a un problème avec la variable "message".</p>';
    }
    else
    {
        if (empty($_POST['msg']))
        {
            $nombreErreur++;
            $erreur5 = '<p>Veuillez entrer votre message.</p>';
        }
        /*else
        {
            // Ici, il sera possible d'ajouter plus tard un code pour vérifier un captcha anti-spam.
        }
    }
    if ($nombreErreur==0)
    {
        // traiter l'envoi de l'email

        // Récupération des variables et sécurisation des données
        $nom     = htmlentities($_POST['nom']); // htmlentities() convertit des caractères "spéciaux" en équivalent HTML
        $email   = htmlentities($_POST['mail']);
        $message = htmlentities($_POST['msg']);

        // Variables concernant l'email

        $destinataire = 'michael.larboni@gmail.com'; // Adresse email du webmaster (à personnaliser)
        $sujet = 'Titre du message'; // Titre de l'email
        $contenu = '<html><head><title>Titre du message</title></head><body>';
        $contenu .= '<p>Bonjour, vous avez reçu un message à partir de votre site web.</p>';
        $contenu .= '<p><strong>Nom</strong>: '.$nom.'</p>';
        $contenu .= '<p><strong>Email</strong>: '.$email.'</p>';
        $contenu .= '<p><strong>Message</strong>: '.$message.'</p>';
        $contenu .= '</body></html>'; // Contenu du message de l'email (en XHTML)

        // Pour envoyer un email HTML, l'en-tête Content-type doit être défini
        $headers = 'MIME-Version: 1.0'."\r\n";
        //$headers .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8'."\r\n";

        // Envoyer l'email
        mail($destinataire, $sujet, $contenu, $headers); // Fonction principale qui envoi l'email
        echo '<h2><a href='.home().'>Message envoyé!</a></h2>';

    }

    else
    {
        echo '<div style="text-align: center; border:1px solid #ff0000; padding:5px;">';
        echo '<p style=" color:#ff0000;">Désolé, il y a eu '.$nombreErreur.' erreur(s). Voici le détail des erreurs:</p>';
        if (isset($erreur1)) echo '<p><a href="index.php?EX=home"></a>'.$erreur1.'</p>';
        if (isset($erreur2)) echo '<p>'.$erreur2.'</p>';
        if (isset($erreur3)) echo '<p>'.$erreur3.'</p>';
        if (isset($erreur4)) echo '<p>'.$erreur4.'</p>';
        if (isset($erreur5)) echo '<p>'.$erreur5.'</p>';
        // (4) Ici, il sera possible d'ajouter un code d'erreur supplémentaire si un captcha anti-spam est erroné.
        echo '</div>';
    }
}


/*
echo<<<HERE
<div>
    <h2>Confirmation</h2>
    <div>
        <p>Votre message a bien ete pris en compte.</p>
        <p class="bouton_retour">
            <a href="../Php/index.php?EX=home" title="Retour à l'accueil">Retour</a>
        </p>
    </div>
</div>
HERE;
*/
?>