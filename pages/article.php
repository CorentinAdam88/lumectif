


<!--===== navBar =====-->
<?php
include('composants/bibliotheque.php');
htmlDebut("Lumectif-article");
?>
    <?php
    navBar();
    ?>
<!--===== carousel =====-->

<!--===== BLOC ASTUCE =====-->
<?php
    $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
    $okcharset = mysqli_set_charset ($connect, 'utf8');
    $requete = "SELECT * FROM `lum_astuce` ORDER BY rand()";
    $resSQL = mysqli_query ($connect, $requete);
    $nbrEnr = mysqli_num_rows ( $resSQL );
    $tab = mysqli_fetch_array($resSQL);
    echo'
<section class="bg-black text-light p-5 f-genos">
    <h1>Le saviez vous ?</h1>
    <p class="col-sm-16 col-md-6">'.$tab['texte_as'].'</p>
</section>';
?>
<!--===== ARTICLE =====-->
<section class="d-sm-bloc d-md-flex">

    <!--=== FILTRE ===-->
    <article class="col-sm-10 col-md-3 mx-5">
    <form class="m-0" id="formFab" action="article.php" method="GET">
        <div class="accordion" id="accordionExample">


                    <!--= FILTRE MARQUE =-->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">

                        <button class="accordion-button f-poiretOne fs-3 bg-white fs-green" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Marque
                        </button>
                        
                </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  
                    <!--= CONTENUE FILTRE MARQUE =-->
                    <?php
                    $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
                    $okcharset = mysqli_set_charset ($connect, 'utf8');
                    $requete = "SELECT `nom_f`,`id_f` FROM `lum_fabricant`";
                    $resSQL = mysqli_query ($connect, $requete);
                    $nbrEnr = mysqli_num_rows ( $resSQL );
    
                    for ($num=1; $num <= $nbrEnr ; $num++){
                        $tab = mysqli_fetch_array($resSQL);
                        $nameFab = $tab['nom_f'];
                        echo '<div class="d-flex align-items-center form-check-inline">
                        <input class="form-check-input mx-3 formFabInput'.$num.'" id="'.$tab['id_f'].'" type="checkbox" name="marque[]" value="'.$tab['id_f'].'">
                        <label class="form-check-label f-genos fs-4" for="'.$tab['id_f'].'">'.$nameFab.'</label>
                    </div>';
                }
                    ?>

                </div>
              </div>
            </div>


            <!--=== FILTRE PRIX ===-->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button f-poiretOne fs-3 bg-white fs-green" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Prix
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    
                      <!--= CONTENUE FILTRE PRIX =-->
                      <div class="input-group mb-3">
                        <span class="input-group-text">Prix max €</span>
                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)" name="prix">
                      </div>
                      
  
                  </div>
                </div>
              </div>

              <!--=== FILTRE AVIS ===-->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed f-poiretOne fs-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  avis
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <!--= CONTENUE FILTRE ETOILE =-->
                  <div  id="note" class="d-flex justify-content-evenly">
                  </div>

                  <!--Script étoile-->
                    <script>
                        var content =""     /* ---> initialisation*/
                        var etat = "Vide"

                        for(i=0; i<5; i++){
                            content = content+'<div class="fas fa-star over-star" onclick="note(this.id)" style="color:#4B5C35" id="'+i+'"></div>';     /* ---> création de cinq étoiles*/
                        }
                /* ---> fonction qui permet de selectionner un nombre X d'étoile. Chaque fois qu'une étoile est cliquée
                les étoiles precedente sont automatiquement selectionnées*/
                        function note(etoileId){
                                var note = eval(etoileId) + 1;
                                if (typeof(evaluer) == "undefined"){
                                    evaluer = false
                                }
                                if(evaluer == false){
                                    evaluer = true
                                    for(n=0; n<note; n++){
                                        document.getElementById(String(n)).style.color = "gold"; /* ---> changement couleur*/
                                    }
                            }
                            else{
                                    for (n=0; n<5; n++){
                                        document.getElementById(String(n)).style.color = "#4B5C35";/* ---> changement couleur*/
                                    }
                                    for(n=0; n<note; n++){
                                        document.getElementById(String(n)).style.color = "gold";/* ---> changement couleur*/
                                    }
                                    
                                }
                                document.getElementById("submitForm").value = note;
                        }
                        var Contenu = document.getElementById("note");
                        Contenu.innerHTML= content;
                    </script>

                </div>
              </div>
              </div>
            <button id="submitForm" type="submit" name="note" value="" class="btn btn-primary justify-content-center w-100 mt-1 f-genos fs-4">Filtrer</button>

            </div>

          </form>
    </article>



<!--==== LISTE PRODUIT =====-->

    <article class="row justify-content-evenly col-lg-8 m-auto">

    <!--=== DYNAMISATION DES ARTICLES ===-->
            <?php

$connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
                $okcharset = mysqli_set_charset ($connect, 'utf8');
                $onOff = 0;

                if(isset($_GET['marque'])){
                    $marqueFiltre = implode(",",$_GET['marque']);
                }
                if(isset($_GET['prix'])){
                    $prixFiltre = $_GET['prix'];
                }

                if(isset($_GET['note'])){
                    $noteFiltre = $_GET['note'];
                }
                if(isset($_GET['categorie'])){
                    $categorieFiltre = $_GET['categorie'];
                }


                $requete = "SELECT *
                FROM `lum_article`
                LEFT JOIN `lum_avis`
                ON lum_avis.id_a = lum_article.id_a
                JOIN `lum_categorie`
                ON lum_article.id_ca = lum_categorie.id_ca
                LEFT JOIN `lum_propose`
                ON lum_article.id_a = lum_propose.id_a
                LEFT JOIN `lum_fabricant`
                ON lum_propose.id_f = lum_fabricant.id_f
";


                if(isset($marqueFiltre)){
                    if(isset($textRequete)){
                        $textRequete = "AND lum_fabricant.id_f IN ($marqueFiltre)";
                        $requete.= $textRequete;
                    }
                    else{
                        $textRequete = "WHERE lum_fabricant.id_f IN ($marqueFiltre)";
                        $requete.= $textRequete;
                    }
                }

                if(isset($prixFiltre)){
                    if($prixFiltre!=""){
                        if(isset($textRequete) or isset($textRequeteNote)){
                            $textRequetePrix = ' AND lum_article.prix_a < '.$prixFiltre.'';
                            $requete.=$textRequetePrix;
                        }
                        else{
                            $textRequetePrix = ' WHERE lum_article.prix_a < '.$prixFiltre.'';
                            $requete.=$textRequetePrix;
                        }
                }
                }
                if(isset($noteFiltre) or isset($prixFiltre) or isset($marqueFiltre)){
                    if($noteFiltre!=""){
                        if(isset($textRequete) or isset($textRequetePrix) or isset($textRequeteCat)){
                            $textRequeteNote = ' AND lum_avis.note_av >= '.$noteFiltre.'';
                            $requete.=$textRequeteNote;
                        }
                        else{
                            $textRequeteNote = ' WHERE lum_avis.note_av >= '.$noteFiltre.'';
                            $requete.=$textRequeteNote;
                        }
                }
                }

                if(isset($categorieFiltre)){
                    if($categorieFiltre!=""){
                        if(isset($textRequete) or isset($textRequetePrix) or isset($textRequeteCat)){
                            $textRequeteCat = ' AND lum_categorie.id_ca = '.$categorieFiltre.'';
                            $requete.=$textRequeteCat;
                        }
                        else{
                            $textRequeteCat = ' WHERE lum_categorie.id_ca = '.$categorieFiltre.'';
                            $requete.=$textRequeteCat;
                        }
                }
                }
                $requete.=" ORDER BY rand()";
                $resSQL = mysqli_query ($connect, $requete);
                $nbrEnr = mysqli_num_rows ( $resSQL );
                echo'<h2 class="text-muted f-genos">Il y\'a '.$nbrEnr.' articles selectionnés</h2>';

                for ($num=1; $num <= $nbrEnr ; $num++){
                    $tab = mysqli_fetch_array($resSQL);
                    $nameArt = $tab['nom_a'];
                    $prixArt = $tab['prix_a'];
                    $promoPour = $tab ['promo_a'];
                    $promo = "";
                    $prixPromo = 0;
                    $note = $tab ['note_av'];
                    $noteTxt = "";
            /*=== DETECTION D'UNE PROMO AVEC ACIENNE ET NOUVELLE NOTE ===*/
                    if($promoPour != 0){
                        $prixPromo = ($prixArt-$prixArt*$promoPour/100);
                        $promo = '<span class="fs-2">'.$prixPromo.'€</span> <span class="fs-4 text-decoration-line-through text-muted">'.$prixArt.'€</span>';
                    }
                    else{
                        $promo = '<span class="fs-2">'.$prixArt.'€</span>';
                    };
                    if(isset($note)){               /* ---> dynamisation des notes*/
                        for($n=0; $n<$note; $n++){
                            $noteTxt .= '<div class="fas fa-star" style="color: gold"></div>';
                        }
                        for($n=0; $n<5-$note; $n++){
                            $noteTxt .= '<div class="fas fa-star" style="color: #4B5C35;"></div>';
                        }
                    }
        /*---CARTE DES ARTICLES---*/
        if($tab['dispo_a'] == 0){
            $textRupture = ' <div class="w-100 position-absolute top-50 start-30 bg-danger py-2 pointer-events-none text-white text-center f-genos fs-3 rounded-1 text-decoration-underline">rupture de stock</div>';
            $classe = 'rupture';
        }
        else{
            $textRupture ="";
            $classe = '';
        }
                echo '
                <div class="card m-3" style="width: 18rem;">
                <figure class="position-relative overflow-hidden ">
                  <a href="produit.php?idProduit='.$tab['id_a'].'&categorie='.$tab['id_ca'].'&name='.$tab['nom_a'].'">
                      <img src="../medias/materiel/'.$tab['image_a'].'" class="card-img-top imageHover '.$classe.'" alt="l\'image de '.$tab['image_a'].'">
                     '.$textRupture.'
                      </a>
                      </figure>
                      <div class="card-body border-top">
                          <div class="d-flex-column text-center f-genos">
                              <a href="#" class="text-muted text-decoration-none">'.$tab['titre_ca'].'</a>
                              <h2 class="m-0">'.$nameArt.'</h2>
                              <div class=" d-flex justify-content-evenly align-items-center">'.$promo.'
                              </div>
                              </div>
                              <ul class="d-flex list-none justify-content-evenly ">
                                  <li>
                                      <a href="#"><img src="../medias/icon/like.svg" class="tailleIcon" alt="icon like"></a>
                                  </li>
                                  <li>
                                      <a href="panierSecur.php?panier='.$tab['id_a'].'"><img src="../medias/icon/panier.svg" class="tailleIcon" alt="icon panier"></a>
                                  </li>
                                  <li>
                                      '.$noteTxt.'
                                  </li>
                              </ul>
                              </div>
                        </div>';
                        }
?>





    </article>
</section>

<!--===== Script Bootsrap =====-->
    <script src="../dist/js/bootstrap.min.js"></script>
    <?php
    footer("");
    ?>
</body>
</html>