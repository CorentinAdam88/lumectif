<?php
session_start();
$avis = $_GET['avis'];
$note = $_GET['note'];
$produit = $_GET['produit'];

if(isset($_SESSION['statut'])){
    if($_SESSION['statut'] == true){
        $idUser = htmlentities($_SESSION['id_ut'], ENT_COMPAT, 'ISO-8859-1');
        $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
        $okcharset = mysqli_set_charset ($connect, 'utf8');
        var_dump($note);
        var_dump($avis);
        var_dump($idUser);
        var_dump($produit);
        $requete = "INSERT INTO lum_avis(note_av, avis_av, id_ut, id_a) VALUES ('$note', '$avis', '$idUser','$produit')";
        $resSQL = mysqli_query ($connect, $requete);
        header('Location: '.$_SERVER["HTTP_REFERER"]);
    }
    else{
        header('Location: connexion.php');
    }
}
else{
    header('Location: connexion.php');
}
?>