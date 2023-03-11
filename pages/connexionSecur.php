<?php session_start();
if (empty($_GET['login']) == false && empty($_GET['mdp']) == false){
$connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
$okcharset = mysqli_set_charset ($connect, 'utf8');
$loginSQL = htmlentities($_GET['login'], ENT_COMPAT, 'ISO-8859-1');
$requete = "SELECT * FROM `lum_utilisateur` WHERE lum_utilisateur.pseudo_ut = '$loginSQL'";
$resSQL = mysqli_query ($connect, $requete);
$tab = mysqli_fetch_array($resSQL);
var_dump(hash('sha256', $_GET['mdp']));
if(empty($tab['mdp_ut']) == false){
$login = htmlentities($_GET['login'], ENT_COMPAT, 'ISO-8859-1');
$mdp = $tab['mdp_ut'];
if($_GET['login'] === $login && hash('sha256', $_GET['mdp']) === $mdp){
    $_SESSION['statut'] = true;
    $_SESSION['id_ut'] = $tab['id_ut'];
    header('location:connexion.php');
    unset($_GET);
}
else{
    $_SESSION['statut'] = "error";
    unset($_GET);
    header('location:connexion.php');
}
unset($_POST);
}
else{
    header('location:connexion.php');
    $_SESSION['statut'] = "error";
}
}
else{
    header('location:connexion.php');
    $_SESSION['statut'] = "error";
}
?>