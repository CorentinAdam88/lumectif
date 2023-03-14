<?php
session_start();
    if(isset($_SESSION['statut'])){
    if($_SESSION['statut'] == true){
        $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
        $okcharset = mysqli_set_charset ($connect, 'utf8');
        $idArticle = htmlentities($_GET['panier'], ENT_COMPAT, 'ISO-8859-1');
        $idUser = htmlentities($_SESSION['id_ut'], ENT_COMPAT, 'ISO-8859-1');
        $requete = "INSERT INTO lum_achete(id_a, id_ut) VALUES ('$idArticle', '$idUser')";
        $resSQL = mysqli_query ($connect, $requete);
        header('location:panier.php');
    }
    else{
        header('location:connexion.php');
    }
}
else{
    header('location:connexion.php');
}
?>