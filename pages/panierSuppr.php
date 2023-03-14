<?php
session_start();
if($_SESSION['statut'] == true){
    $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
    $okcharset = mysqli_set_charset ($connect, 'utf8');
    $idCommande = htmlentities($_GET['panierSuppr'], ENT_COMPAT, 'ISO-8859-1');
    $requete = "DELETE FROM `lum_achete` WHERE lum_achete.commande_a = '$idCommande'";
    $resSQL = mysqli_query ($connect, $requete);
    header('location:panier.php');
}
else{
header('connexion.php');
}
?>