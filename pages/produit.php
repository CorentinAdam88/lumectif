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
        /*Recuperation de la categorie de l'article selectionner*/
        /*initialisation des variables depuis la requette en haut de page*/
                    $nameArt = $tab['nom_a'];
                    $prixArt = $tab['prix_a'];
                    $promoPour = $tab ['promo_a'];
                    $promo = "";
                    $prixPromo = 0;
                    $noteTxt = "";
            /*calcule du prix en promotion ou non*/
                    if($promoPour != 0){
                        $prixPromo = ($prixArt-$prixArt*$promoPour/100);
                        $promo = '<h2 class="prix">'.$prixPromo.'€</h2>
                        <h2 class="text-muted ms-4 text-decoration-line-through">'.$prixArt.'€</h2>';
                    }
                    else{
                        $promo = '<h2 class="prix">'.$prixArt.'€</h2>';
                    };
                    echo '<h2><a class="text-decoration-none text-muted m-0" href="#">camera</a></h2>
                    <h1 class="fs-h1 m-0">'.$_GET['name'].'</h1>
                    <div class="d-flex justify-content-md-start justify-content-center align-items-center">
                    '.$promo.'
                    </div>';
                    ?>
                    <div class="d-flex">
                    </div>
                    
            <!--Recuperation de l'id de l'article pour la mettre en valeur de bouton pour l'ajouter au panier-->
                    <?php
                        echo ' <form action="panierSecur.php" method="GET">
                        <button type="submit" name="panier" value="'.$_GET['idProduit'].'" class="btn m-auto m-md-0 btn-success d-flex align-items-center f-genos fs-4 bg-green border-green">Ajouter au panier <span class="px-2"><a href="#"><img width="30px" src="../medias/icon/panier_blanc.svg" alt=""></a></span></button>
                        </form>';
                    ?>

                    <ul class="list-unstyled f-genos fs-2 d-flex flex-column">
                        <?php
            /*verifier de quelle categorie est l'article pour pouvoir faire la requète des caractèristique */
                    if(isset($_GET['categorie'])){
                        $categorieSelec = $_GET['categorie'];

                        if ($categorieSelec == 1){
                            $categorieSQL = "lum_steadicam";
                        }
                        if($categorieSelec == 4){
                            $categorieSQL = "lum_camera";
                        }
                        if($categorieSelec == 5){
                            $categorieSQL = "lum_light";
                        }
                        if($categorieSelec == 6){
                            $categorieSQL = "lum_objectif";
                        }
                    }

                        $requeteCat = "SELECT `column_name` FROM information_schema.columns WHERE `table_name` = '$categorieSQL'";
                        $resSQLCat = mysqli_query ($connect, $requeteCat);
                        $nbrEnrCat = mysqli_num_rows ( $resSQLCat );
                        $produit = intval($_GET['idProduit']);

                        $requete = "SELECT $categorieSQL.* FROM $categorieSQL JOIN lum_article ON lum_article.id_a = $categorieSQL.id_a WHERE $categorieSQL.id_a = $produit";
                        $resSQL = mysqli_query ($connect, $requete);
                        $nbrEnr = mysqli_num_rows ( $resSQL );
                        $tab = mysqli_fetch_array($resSQL);
                        for($n=0; $n<$nbrEnrCat; $n++){
                            $tabCat = mysqli_fetch_array($resSQLCat);
                            if (strpos($tabCat['COLUMN_NAME'], "id" ) === false) {
                                $categorie = $tabCat['COLUMN_NAME'];
                                $strSuppr = substr($tabCat['COLUMN_NAME'], -4);
                            echo'<li>'.str_replace($strSuppr,"",$tabCat['COLUMN_NAME']).': <span>'.$tab[$categorie].'</span></li>';
                            }
                        }
                ?>
<!--COLUMN_NAME-->
            </div>
        </article>
    </section>

    <section>
        <?php
 $requete = "SELECT lum_utilisateur.pseudo_ut, lum_avis.* , lum_article.id_a
 FROM lum_avis
 JOIN lum_article
 ON lum_article.id_a = lum_avis.id_ut
 JOIN lum_utilisateur
 ON lum_avis.id_ut = lum_utilisateur.id_ut
 WHERE lum_avis.id_a = $produit";
 $resSQL = mysqli_query ($connect, $requete);
 $nbrEnr = mysqli_num_rows ( $resSQL );

for($num = 0; $num<$nbrEnr; $num++){
    $tab = mysqli_fetch_array($resSQL);
    $note = $tab['note_av'];

    if(isset($note)){               /* ---> dynamisation des notes*/
        for($n=0; $n<$note; $n++){
            $noteTxt .= '<div class="fas fa-star" style="color: gold"></div>';
        }
        for($n=0; $n<5-$note; $n++){
            $noteTxt .= '<div class="fas fa-star" style="color: #4B5C35;"></div>';
        }
    }
echo'
        <!--Avis card-->
    <div class="card f-genos m-5 col-md-8 col-10 rounded-0">
  <h5 class="card-header fs-2">'.$tab['pseudo_ut'].'</h5>
  <div class="d-flex m-3">
  '.$noteTxt.'
  </div>
  <div class="card-body">

    <p class="card-text fs-3 m-0">'.$tab['avis_av'].'</p>
    '.$produit.'
  </div>
</div>';
$noteTxt ="";
}
?>

        <form action="insertAv.php" class="m-5" method="GET">
                    <div id="note">

                    </div>

                    <script>
                        var content =""     /* ---> initialisation*/

                        for(i=0; i<5; i++){
                            content = content+'<div class="fas fa-star over-star m-2" onclick="note(this.id)" style="color:#4B5C35" id="'+i+'"></div>';     /* ---> création de cinq étoiles*/
                        }
                        function note(etoileId){                    /* ---> fonction du changement d'étoile*/
                                var note = eval(etoileId) + 1;
                                if (typeof(evaluer) == "undefined"){
                                    evaluer = false
                                }
                                if(evaluer == false){
                                    evaluer = true
                                    for(n=0; n<note; n++){
                                        document.getElementById(String(n)).style.color = "gold";
                                    }
                            }
                            else{
                                    for (n=0; n<5; n++){
                                        document.getElementById(String(n)).style.color = "#4B5C35";
                                    }
                                    for(n=0; n<note; n++){
                                        document.getElementById(String(n)).style.color = "gold";
                                    }
                                    
                                }
                                document.getElementById("subAv").value = note;
                            console.log("ggg");
                        }
                        var Contenu = document.getElementById("note");
                        Contenu.innerHTML= content;
                    </script>
                    <script>
                        note("3");
                    </script>

        <div class="form-floating w-50">
            <?php
    echo'<input type="text" class="d-none" name="produit" value="'.$_GET['idProduit'].'">';
            ?>
            <textarea class="form-control w-100" placeholder="Leave a comment here" id="floatingTextarea2" name="avis" ></textarea>
            <label for="floatingTextarea2">Commentaire...</label>
        </div>
        <button type="submit" name="note" value="4" id="subAv" class="btn btn-primary btn-lg m-2">Envoyer</button>

        </form>
    </section>
   
</body>
</html>