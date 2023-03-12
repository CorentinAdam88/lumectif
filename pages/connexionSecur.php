<?php session_start();
if($_SESSION['statut'] == true){     /*  ---> verifie si l'utilisateur est déjà connecter*/
    header('location:connexion.php');
}
else{
if (empty($_GET['login']) == false && empty($_GET['mdp']) == false){    /*---> verification que les champs sont remplie*/
    /*=== CONNECTION BASE DE DONNEES ===*/
$connect = mysqli_connect('mysql-lumectif.alwaysdata.net','lumectif','SAE203bdd','lumectif_bdd') or die (mysqli_connect_error());
$okcharset = mysqli_set_charset ($connect, 'utf8');
$loginSQL = htmlentities($_GET['login'], ENT_COMPAT, 'ISO-8859-1');                         /*  ---> empche l'injection de code SQL*/
$requete = "SELECT * FROM `lum_utilisateur` WHERE lum_utilisateur.mail_ut = '$loginSQL'"; /*  ---> requete pour retrouver le mot de passe de l'utilisateur X*/
$resSQL = mysqli_query ($connect, $requete);
$tab = mysqli_fetch_array($resSQL);

/*=== VERIFICATION DU MOT DE PASSE ===*/
if(empty($tab['mdp_ut']) == false){                                     /*  ---> si l'utilisateur existe*/
$login = htmlentities($_GET['login'], ENT_COMPAT, 'ISO-8859-1');        /*  ---> empche l'injection de code SQL*/
$mdp = $tab['mdp_ut'];
if($_GET['login'] === $login && hash('sha256', $_GET['mdp']) === $mdp){ /*  ---> verification de mot de passe hasher*/
    $_SESSION['statut'] = true;                                         /*  ---> Session valide*/
    $_SESSION['id_ut'] = $tab['id_ut'];                                 /*  ---> recuperation de l'utilisateur connecté*/
    header('location:connexion.php');                                   /*  ---> redirection page d'acceuil*/
    unset($_GET);                                                       /*  ---> vide la vaiable $_GET*/
}
/*=== GESTION DES ERREURS ===*/
else{
    $_SESSION['statut'] = "error";                      /*---> si le mot de passe est incorect*/
    $_SESSION['message'] = "Mot de passe incorect";
    unset($_GET);
    header('location:connexion.php');
}
unset($_POST);
}
else{
    header('location:connexion.php');                   /*---> si l'utilisateur n'existe pas*/
    $_SESSION['statut'] = "error";
    $_SESSION['message'] = "Vous n'êtes pas inscrit";
}
}
else{
    header('location:connexion.php');
    $_SESSION['statut'] = "error";
    $_SESSION['message'] = "Veuillez remplir les champs";/*---> si l'utilisateur à remplit tout les champs*/
}
}
?>