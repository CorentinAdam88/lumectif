<?php
    $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
    $okcharset = mysqli_set_charset ($connect, 'utf8');
    $nom = $_GET['nom'];
    $mail = $_GET['mail'];
    $mdp = hash('sha256', $_GET['mdp']);
    $requete = "INSERT INTO lum_utilisateur(pseudo_ut, mdp_ut, mail_ut) VALUES ('$nom', '$mdp', '$mail')";
    $resSQL = mysqli_query ($connect, $requete);
    header('location:connexion.php');
?>