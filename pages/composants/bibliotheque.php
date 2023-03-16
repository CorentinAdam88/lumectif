<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

/*=====INITIALISATION PAGE HTML =====*/
function htmlDebut ($titre){
echo '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>'.$titre.'</title>
    <meta name="author" content="ADAM Corentin / ANASS Chattah">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Genos:ital,wght@0,300;0,400;0,600;1,400&family=Poiret+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@500&display=swap" rel="stylesheet">
    <!--lien etoile-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">

    <!--===== CSS Bootsrap =====-->
        <!--<link href="../dist/css/bootstrap.min.css" rel="stylesheet">-->
    <!--Lien scss-->
        <link rel="stylesheet" href="../css/perso.css">

    <!--common css-->
    <link rel="stylesheet" href="../css/common.css">
    <!-- barNav -->
    <link rel="stylesheet" href="../css/barNav.css">
</head>
<body>
';

/*===== BARRE DE NAVIGATION =====*/
}
function navBar (){
    /*affiche le nom de l'utilisateur dans la barre de navigation*/
    $nbrEnrNotif = "";
    if(!isset($_SESSION['statut'])){
        $statutConect = "connexion";
        $statutConectLink = "connexion";
    }
    else{
        if($_SESSION['statut'] === true){
            $connect = mysqli_connect('mysql-lumectif.alwaysdata.net','lumectif','SAE203bdd','lumectif_bdd') or die (mysqli_connect_error());
            $okcharset = mysqli_set_charset ($connect, 'utf8');
            $id_utSQL = $_SESSION['id_ut'];
            $requete = "SELECT * FROM `lum_utilisateur` WHERE lum_utilisateur.id_ut = '$id_utSQL'";
            $resSQL = mysqli_query ($connect, $requete);
            $tab = mysqli_fetch_array($resSQL);
            $statutConect = $tab['pseudo_ut'];
            $statutConectLink = "pageUtilisateur";

            $utilisateur = $_SESSION['id_ut'];
            $requeteNotif = "SELECT lum_achete.*
            FROM `lum_article`
            JOIN `lum_achete`
            ON lum_article.id_a = lum_achete.id_a
            JOIN `lum_utilisateur`
            ON lum_achete.id_ut = lum_utilisateur.id_ut
            WHERE lum_utilisateur.id_ut = $utilisateur";
            $resSQLNotif = mysqli_query ($connect, $requeteNotif);
            $tabNotif = mysqli_fetch_array($resSQLNotif);
            $nbrEnrNotif = mysqli_num_rows ( $resSQLNotif );
        }
        else{
        $statutConect = "connexion";
        $statutConectLink = "connexion";
        }
    }
    if(isset($_SESSION['statut'])){
        if($_SESSION['statut'] == true ){
            $linkPan = "panier";
        }
        else{
            $linkPan = "connexion";
        }
    }
    else{
        $linkPan = "connexion";
    }
    /*code HTML de la barre de navigation*/
    echo '<header>
    <!--===== nav bar du haut =====-->
            <nav class="navHaut" id="navHautId">
                <div class="navHautGauche">
                    <div id="burger"> <img id="burgerImg" src="../medias/icon/burger.svg" alt="burgerMenu"></div>
                    <div class="logo">L</div>
                 </div>
                <form class="formHaut">
                    <input placeholder="Recherche" type="text">
                </form>
                    <ul class="itemNav">
                        <li class="user"><a href="'.$statutConectLink.'.php"><span id="connexion" class="me-2 f-genos fs-5">'.$statutConect.'</span><img src="../medias/icon/user.svg" alt="compte utilisateur"></a></li>
                        <li class="like"><a href="#"><img src="../medias/icon/like.svg" alt="j\'aime"></a></li>
                        <li class="panier"><a href="'.$linkPan.'.php"><img src="../medias/icon/panier.svg" alt="panier"> <span id="panierNotif">'.$nbrEnrNotif.'</span></a></li>
                    </ul>
            </nav>
    <!--===== nav bar du bas =====-->
            <nav class="navBas" id="navBasId">
                <ul>
                    <li>
                        <form class="formBas">
                            <input placeholder="Recherche" type="text">
                        </form>
                    </li>
                    <li><a href="index.php">accueil</a></li>
                    <li><a href="article.php">shop</a></li>
                    <li><a href="astuce.php">astuce</a></li>
                    <li><a href="#">contact</a></li>
                </ul>
            </nav>
    <!--===== Script JS =====-->
            <script>
    /*===== deplit au repli du menu =====*/
                var click = false
                const menu = document.getElementById("navBasId");
                const menuBurger = document.getElementById("burger");
                const burgerImg = document.getElementById("burgerImg");
                menuBurger.onclick = function(){ 
                    if(click == false){
                        burgerImg.src = "../medias/icon/croixBurger.svg";
                        click = true;
                        console.log("test");
                        menu.style.height = "330px";
                        console.log (click)
                    }else{
                        click = false;
                        burgerImg.src = "../medias/icon/burger.svg";
                        console.log (click)
                        menu.style.height = "0px";
                    }
                }
    
    /*===== repli le menu quand on clique à coté =====*/
                    document.addEventListener("click", function(event){
                        if (!menu.contains(event.target) && !document.getElementById("navHautId").contains(event.target) && click == true){
    
                        click = false;
                        burgerImg.src = "../medias/icon/Burger.svg";
                        menu.style.height = "0px";
                    }
                })
            </script>
    
        </header>';
}
/*===== MODAL DES ERREURS =====*/
/*$ Message erreur --> var STRING*/
function error ($MessageErreur){
echo '<div class="bg-secondary position-fixed z-3 w-100 h-100 top-50 start-50 translate-middle bg-opacity-75" id="errorModal">
<div class="w-50 position-fixed z-0 p-3 bg-danger border border-1 border-white rounded-5 text-white fs-2 w-25 h-25 d-flex justify-content-center align-items-center flex-column f-genos top-50 start-50 translate-middle">
  <p>'.$MessageErreur.'</p>
  <button type="button" onclick="closeModal()" class="btn btn-secondary fs-3">Close</button>
  <script>
    function closeModal(){
      const errorModal = document.getElementById(\'errorModal\');
      errorModal.remove();

    }
  </script>
</div>
</div>';
}

function footer ($position){
    if(isset($position)){
        $positionValue= $position;
    }
    else{
        $positionValue ="";
    }
    echo'<footer class="bg-dark py-3 f-poiretOne fs-5 px-5 border-top border-light '.$positionValue.' ">
    <ul class="list-none text-white d-flex justify-content-between">
      <li>Auteur Corentin ADAM / ANASS Chattah</li>
      <li>&copy Lumectif 2023</li>
      <li>SAE 203 : Site web et Base de données</li>
    </ul>
    <ul class="list-none text-white d-flex justify-content-evenly fs-4">
      <li><a class="text-white text-decoration-underline" href="index.php">accueil</a></li>
      <li><a class="text-white text-decoration-underline" href="article.php">boutique</a></li>
      <li><a class="text-white text-decoration-underline" href="astuce.php">astuce</a></li>
      <li><a class="text-white text-decoration-underline" href="contact.php">contact</a></li>
      <li><a class="text-white text-decoration-underline" href="conexion.php">connexion</a></li>
    
    </ul>
    </footer>';
}
?>
