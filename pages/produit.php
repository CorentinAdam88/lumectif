<!--===== navBar =====-->
<?php
$connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
$okcharset = mysqli_set_charset ($connect, 'utf8');
$requete = "SELECT * FROM `lum_article` WHERE lum_article.id_a = 2";
$resSQL = mysqli_query ($connect, $requete);
$nbrEnr = mysqli_num_rows ( $resSQL );
$tab = mysqli_fetch_array($resSQL);
include('composants/bibliotheque.php');
htmlDebut("Lumectif-".$tab['nom_a']."");
navBar();
?>
<body>
    <section class="d-md-flex col-md-10 col-12 m-md-auto my-5 m-3 border-bottom border-4">
        <article class="d-flex align-items-center col-md-8">
            <ul class="list-unstyled col-1 border-end border-1 pe-2">
                <li>
                    <figure onclick="imageArt('camera01.jpg')">
                        <img class="w-100" src="../medias/materiel/camera01.jpg"  alt="">
                     </figure>
                </li>

                <li>
                    <figure onclick="imageArt('objectif.jpg')">
                        <img class="w-100" src="../medias/materiel/objectif.jpg"  alt="">
                     </figure>
                </li>

                <li>
                    <figure onclick="imageArt('light.jpeg')">
                        <img class="w-100" src="../medias/materiel/light.jpeg" alt="">
                     </figure>
                </li>
            </ul>
            <figure class="col-md-12 col-sm-10 col-10 d-flex justify-content-center text-md-start">
                <img id="imageCAT" class="col-md-8 col-lg-6 col-8 border border-1 p-2" src="" alt="">
            </figure>
            <script>
                function imageArt (source){
                    document.getElementById("imageCAT").src ="../medias/materiel/"+source+"";
                    console.log(document.getElementById("imageCAT").src);
                }
            </script>
        </article>
        <article class="col-lg-7 col-md-5 justify-content-center text-md-start text-center">
            <div class="f-genos">
                <?php
                    $nameArt = $tab['nom_a'];
                    $prixArt = $tab['prix_a'];
                    $promoPour = $tab ['promo_a'];
                    $promo = "";
                    $prixPromo = 0;
                    $noteTxt = "";
                    if($promoPour != 0){
                        $prixPromo = ($prixArt-$prixArt*$promoPour/100);
                        $promo = '<h2 class="prix">'.$prixPromo.'€</h2>
                        <h2 class="text-muted ms-4 text-decoration-line-through">'.$prixArt.'€</h2>';
                    }
                    else{
                        $promo = '<h2 class="prix">'.$prixArt.'€</h2>';
                    };
                    echo '<h2><a class="text-decoration-none text-muted m-0" href="#">camera</a></h2>
                    <h1 class="fs-h1 m-0">'.$tab['nom_a'].'</h1>
                    <div class="d-flex justify-content-md-start justify-content-center align-items-center">
                    '.$promo.'
                    </div>';
                    ?>
                    <div class="d-flex">
                    </div>
                    <button type="button" class="btn m-auto m-md-0 btn-success d-flex align-items-center f-genos fs-4 bg-green border-green">Ajouter au panier <span class="px-2"><a href="#"><img width="30px" src="../medias/icon/panier_blanc.svg" alt=""></a></span></button>
                    <ul class="list-unstyled f-genos fs-2 d-flex flex-column">
                        <?php
                        $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
                        $requeteCat = "SELECT `column_name` FROM information_schema.columns WHERE `table_name` = 'lum_camera'";
                        $resSQLCat = mysqli_query ($connect, $requeteCat);
                        $nbrEnrCat = mysqli_num_rows ( $resSQLCat );

                        $requete = "SELECT lum_camera.* FROM lum_camera JOIN lum_article ON lum_article.id_a = lum_camera.id_a WHERE lum_camera.id_a = 3";
                        $resSQL = mysqli_query ($connect, $requete);
                        $nbrEnr = mysqli_num_rows ( $resSQL );
                        $tab = mysqli_fetch_array($resSQL);
                        for($n=0; $n<$nbrEnrCat; $n++){
                            $tabCat = mysqli_fetch_array($resSQLCat);
                            if (strpos($tabCat['COLUMN_NAME'], "id" ) === false) {
                                $categorie = $tabCat['COLUMN_NAME'];
                            echo'<li>'.str_replace("_cam","",$tabCat['COLUMN_NAME']).': <span>'.$tab[$categorie].'</span></li>';
                            }
                        }
                ?>
<!--COLUMN_NAME-->
            </div>
        </article>
    </section>
   
</body>
</html>