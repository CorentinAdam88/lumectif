<?php
session_start();
$connect = mysqli_connect('mysql-lumectif.alwaysdata.net','lumectif','SAE203bdd','lumectif_bdd') or die (mysqli_connect_error());
$mail = $_SESSION['mailReset'];
$newMdp = htmlentities($_GET['newMdp'], ENT_COMPAT, 'ISO-8859-1');
var_dump($newMdp);
$hashMdp = hash('sha256', $newMdp);
var_dump($hashMdp);
$requete = "UPDATE `lum_utilisateur` SET `mdp_ut` = '$hashMdp'  WHERE lum_utilisateur.mail_ut = '$mail'";
$resSQL = mysqli_query ($connect, $requete);
header('location:connexion.php');

?>