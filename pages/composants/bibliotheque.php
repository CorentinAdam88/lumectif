<?php

function htmlDebut ($titre){
    $titre = htmlentities($titre, ENT_COMPAT, 'ISO-8859-1');
echo '
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
    
</body>
</html>';
}
function navBar (){
    echo '<header>
    <!--===== nav bar du haut =====-->
            <nav class="navHaut mt-2" id="navHautId">
                <div class="navHautGauche">
                    <div id="burger"> <img src="../medias/icon/burger.svg" alt=""></div>
                    <div class="logo">L</div>
                 </div>
                <form class="formHaut" action="">
                    <input placeholder="Recherche" type="text">
                </form>
                    <ul class="itemNav">
                        <li class="user"><a href="#"><img src="../medias/icon/user.svg" alt=""></a></li>
                        <li class="like"><a href="#"><img src="../medias/icon/like.svg" alt=""></a></li>
                        <li class="panier"><a href="#"><img src="../medias/icon/panier.svg" alt=""></a></li>
                    </ul>
            </nav>
    <!--===== nav bar du bas =====-->
            <nav class="navBas" id="navBasId">
                <ul>
                    <li>
                        <form class="formBas" action="">
                            <input placeholder="Recherche" type="text">
                        </form>
                    </li>
                    <li><a href="#">accueil</a></li>
                    <li><a href="#">produit</a></li>
                    <li><a href="#">astuce</a></li>
                    <li><a href="#">contact</a></li>
                </ul>
            </nav>
    <!--===== Script JS =====-->
            <script>
    /*===== deplit au repli du menu =====*/
                var click = false
                const menu = document.getElementById("navBasId");
                const menuBurger = document.getElementById("burger");
                menuBurger.onclick = function(){ 
                    if(click == false){
                        click = true;
                        console.log("test");
                        menu.style.height = "330px";
                        console.log (click)
                    }else{
                        click = false;
                        console.log (click)
                        menu.style.height = "2px";
                    }
                }
    
    /*===== repli le menu quand on clique à coté =====*/
                    document.addEventListener("click", function(event){
                        if (!menu.contains(event.target) && !document.getElementById("navHautId").contains(event.target) && click == true){
    
                        click = false;
                        menu.style.height = "2px";
                    }
                })
            </script>
    
        </header>';
}
?>
