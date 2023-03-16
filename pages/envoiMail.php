<?php
session_start();
$mail = $_GET['mail'];
$connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
$requete = "SELECT mail_ut FROM lum_utilisateur WHERE lum_utilisateur.mail_ut = '$mail'";
$resSQL = mysqli_query ($connect, $requete);
$nbrEnr = mysqli_num_rows ( $resSQL );
if($nbrEnr != 0){
    $MailClient = $_GET['mail'];
    $sujet = "Recuperation mot de passe";
    $message = '<html><body><h1>Bonjour !</h1><form action="lumectif.alwaysdata.net/lumectif/pages/resetMDP.php" method="GET">
                Pour recupérer votre mot de passe
                <button type="submit" name="recupMail" value="'.$mail.'">Cliquez ici</button>
                </form></body></html>';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: LUMECTIF' . "\r\n";
    mail($MailClient,$sujet,$message,$headers);
    echo 'L\'e-mail a été envoyé avec succès à'.$MailClient;
}
else{
    $_GET['error'] = true;
    header('location:connexion.php');
}
?>

<body>
    
<?php
    footer();
    ?>
</body>
</html>

