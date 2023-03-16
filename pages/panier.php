<?php
/*Bibliotheque*/
include('composants/bibliotheque.php');
htmlDebut("Lumectif-connexion");

?>

<body>
  <?php
    navBar();
    if (isset($_SESSION['id_ut'])){
    $utilisateur = $_SESSION['id_ut'];
    $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
    $okcharset = mysqli_set_charset ($connect, 'utf8');
    $requete = "SELECT lum_article.*, lum_achete.*
    FROM `lum_article`
    JOIN `lum_achete`
    ON lum_article.id_a = lum_achete.id_a
    JOIN `lum_utilisateur`
    ON lum_achete.id_ut = lum_utilisateur.id_ut
    WHERE lum_utilisateur.id_ut = $utilisateur";
    $resSQL = mysqli_query ($connect, $requete);
    $nbrEnr = mysqli_num_rows ( $resSQL );
    }
  ?>
<div>

    <div class="d-md-flex d-bloc col-11">


        <div class="col-md-8 col-12 m-3">
        <?php
        if (isset($_SESSION['id_ut'])){
            $prixFinal = 0;
                    for($num = 0; $num<$nbrEnr; $num++){
                        $tab = mysqli_fetch_array($resSQL);
                        $nameArt = $tab['nom_a'];
                    $prixArt = $tab['prix_a'];
                    $promoPour = $tab ['promo_a'];
                    $promo = "";
                    $prixPromo = 0;
                    if($promoPour != 0){
                        $prixPromo = ($prixArt-$prixArt*$promoPour/100);
                        $promo = '<span class="fs-2">'.$prixPromo.'€</span> <span class="fs-4 text-decoration-line-through text-muted">'.$prixArt.'€</span>';
                        $prixFinal += $prixPromo;
                    }
                    else{
                        $promo = '<span class="fs-2">'.$prixArt.'€</span>';
                        $prixFinal +=$prixArt;
                    };
                    if($tab['dispo_a'] == 0){
                      $dispo = '<p class="text-danger">Rupture de stock</p>';
                    }
                    else{
                        $dispo = '<p class="text-primary">En stock</p>';
                    }
                        echo'<div class="card rounded-0 f-genos fs-4">
                        <div class="card-body d-flex">
                          <figure class="me-3">
                            <img src="../medias/materiel/camera01.jpg" width="100px" alt="">
                          </figure>
                          <div class="d-flex justify-content-between w-100">
                            <div>
                              <h1 class="card-title fs-2">'.$tab['nom_a'].'</h1>
                            '.$dispo.'
                            </div>
                            <p class="card-text">'.$promo.'</p>
                          </div>
                        </div>
                        <form action="panierSuppr.php" method="GET">
                        <button name="panierSuppr" value="'.$tab['commande_a'].'" class="btn btn-primary w-25 m-2">Supprimer</button>
                        </form>
                      </div>';
                    }
                    }
                    ?>
            </div>

            <div class="card w-100">
                <div class="card-body">
                    <h2 class="card-title f-poiretOne">TOTAL DE VOTRE PANIER</h2>
                    <h3 class="f-genos">
                        <?php
                        if($nbrEnr==1){
                            echo $nbrEnr.' Article dans votre panier';
                        }
                        else{
                            echo $nbrEnr.' Articles dans votre panier';
                        }
                        ?>
                    </h3>
                    <?php
                       echo' <p class="card-text fs-1 f-genos">'.$prixFinal.'€</p>'
                    ?>
                    <a href="#" class="btn btn-primary f-genos fs-5">Commander</a>
                </div>
            </div>

        </div>
</body>
</html>