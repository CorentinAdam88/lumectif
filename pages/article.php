


<!--===== navBar =====-->
<?php
include('composants/bibliotheque.php');
htmlDebut("Lumectif-article");
navBar();
?>
<body>
<!--===== carousel =====-->

<section class="bg-black text-light p-5 f-genos">
    <h1>Le saviez vous ?</h1>
    <p class="col-sm-16 col-md-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis accusantium natus laudantium quasi officia vero sapiente velit quod. Quas, nulla reprehenderit harum enim numquam ullam accusantium at recusandae animi in, a asperiores labore totam. Assumenda, a minima! Ipsam quisquam voluptate temporibus, voluptatum esse magni dolores nemo. Aliquam doloribus alias voluptates!</p>
</section>

<section class="d-sm-bloc d-md-flex">
    <article class="col-sm-10 col-md-3 mx-5">
    <form class="m-0" id="formFab" action="article.php" method="GET">
        <div class="accordion" id="accordionExample">
                    <!--section-->
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button f-poiretOne fs-3 bg-white fs-green" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Marque
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  
                    <!--Content-->
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
                        <input class="form-check-input mx-3 formFabInput'.$num.'" id="'.$nameFab.'" type="checkbox" id="inlineCheckbox1" name="'.$tab['id_f'].'">
                        <label class="form-check-label f-genos fs-4" for="inlineCheckbox1">'.$nameFab.'</label>
                    </div>';
                }
                    ?>

                <script>/*
                  const input = document.querySelector('.formFabInput2');
                  input.addEventListener('change', function(){
                    document.getElementById('formFab').submit();
                  })*/
                </script>

                </div>
              </div>
            </div>
            <!--section-->
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                  <button class="accordion-button f-poiretOne fs-3 bg-white fs-green" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    Prix
                  </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                  <div class="accordion-body">
                    
                      <!--Content-->
                      <div class="input-group mb-3">
                        <span class="input-group-text">Prix max €</span>
                        <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                      </div>
                      
  
                  </div>
                </div>
              </div>
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed f-poiretOne fs-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  avis
                </button>
              </h2>
              <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                  <div  id="note" class="d-flex justify-content-evenly">
                  </div>
                    <script>
                        var content =""
                        var etat = "Vide"
                        for(i=0; i<5; i++){
                            content = content+'<div class="fas fa-star over-star" onclick="note(this.id)" style="color:#4B5C35" id="'+i+'"></div>';
                        }
                        function note(etoileId){
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
                                    console.log(note)
                                    
                                }
                        }
                        var Contenu = document.getElementById("note");
                        Contenu.innerHTML= content;
                    </script>

                </div>
              </div>
              <div>
              </div>
              <!--fin-->
            </div>
          </div>
          </form>
    </article>

<!--==== articles =====-->

    <article class="row justify-content-evenly col-lg-8 m-auto">
            <?php

$connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
                $okcharset = mysqli_set_charset ($connect, 'utf8');
                $onOff = 0;
                for ($n=1;$n<=count($_GET); $n++){
                  if(isset($_GET[strval($n)])){
              }
                }
                $requete = "SELECT *
                FROM `lum_article`
                JOIN `lum_avis`
                ON lum_avis.id_a = lum_article.id_a
                JOIN `lum_categorie`
                ON lum_categorie.id_ca = lum_article.id_ca";
                $resSQL = mysqli_query ($connect, $requete);
                $nbrEnr = mysqli_num_rows ( $resSQL );

                for ($num=1; $num <= $nbrEnr ; $num++){
                    $tab = mysqli_fetch_array($resSQL);
                    $nameArt = $tab['nom_a'];
                    $prixArt = $tab['prix_a'];
                    $promoPour = $tab ['promo_a'];
                    $promo = "";
                    $prixPromo = 0;
                    $note = $tab ['note_av'];
                    $noteTxt = "";
                    if($promoPour != 0){
                        $prixPromo = ($prixArt-$prixArt*$promoPour/100);
                        $promo = '<span class="fs-2">'.$prixPromo.'€</span> <span class="fs-4 text-decoration-line-through text-muted">'.$prixArt.'€</span>';
                    }
                    else{
                        $promo = '<span class="fs-2">'.$prixArt.'€</span>';
                    };
                    if(isset($note)){
                        for($n=0; $n<$note; $n++){
                            $noteTxt .= '<div class="fas fa-star" style="color: gold"></div>';
                        }
                        for($n=0; $n<5-$note; $n++){
                            $noteTxt .= '<div class="fas fa-star" style="color: #4B5C35;"></div>';
                        }
                    }
                echo '
                <!--card-->
                <div class="card mt-3" style="width: 18rem;">
                  <a href="produit.php?idProduit='.$tab['id_a'].'&categorie='.$tab['id_ca'].'">
                      <img src="../medias/materiel/camera01.jpg" class="card-img-top" alt="...">
                      <div class="card-body border-top">
                          <div class="d-flex-column text-center f-genos">
                              <a href="#" class="text-muted text-decoration-none">'.$tab['titre_ca'].'</a>
                              <h2 class="m-0">'.$nameArt.'</h2>
                              <div class=" d-flex justify-content-evenly align-items-center">'.$promo.'
                              </div>
                              </div>
                              <ul class="d-flex list-none justify-content-evenly ">
                                  <li>
                                      <a href="#"><img src="../medias/icon/like.svg" width="25px" height="25px" alt=""></a>
                                  </li>
                                  <li>
                                      <a href="#"><img src="../medias/icon/panier.svg" width="25px" height="25px" alt=""></a>
                                  </li>
                                  <li>
                                      '.$noteTxt.'
                                  </li>
                              </ul>
                              </div>
                            </a>
                        </div>';
                        }
?>





    </article>
</section>

<!--===== Script Bootsrap =====-->
    <script src="../dist/js/bootstrap.min.js"></script>
</body>
</html>