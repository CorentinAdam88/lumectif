<?php
/*Bibliotheque*/
include('composants/bibliotheque.php');
htmlDebut("Lumectif-connexion");

?>

<body class="bg-image-connexion img-fluid">
  <?php
    navBar();
  ?>
<main class="form-signin w-100 p-5">
  <!--========== FORMULAIRE DE CONNEXION ==========-->
  <form class=" col-md-5 col-lg-3 mx-5 my-5 text-center text-md-start" action="connexionSecur.php" method="GET">
    <h1 class="h3 mb-3 fw-normal f-poiretOne fs-1 text-white">CONNEXION</h1>

<!--===== GESTION DES ERREURS =====-->
  <?php
  /*=====encadrer les champs de text quand il y a une erreur=====*/
  if(!isset($_SESSION['statut'])){
    $feedback="";
  }
  else{
    if($_SESSION['statut'] === "error"){
      $feedback ="border-danger-subtle border-3";
    }
    else{
      $feedback="";
    }
  }
  /*=====code html qui encadre ou non les inputs=====*/
    echo'<div class="form-floating my-2">
    <input type="text" class="form-control '.$feedback.' rounded-0 mb-3" id="floatingInput" name="login" placeholder="name@example.com">
    <label for="floatingInput" class="f-genos">Adresse mail</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control '.$feedback.' rounded-0" id="floatingPassword" name="mdp" placeholder="Password">
    <label for="floatingPassword" class="f-genos">Mot de passe</label>
  </div>';
/*=====verifie si il y a eu une erreur et appel la modal erreur de la bibliotheque=====*/
  if (isset($_GET['error'])){
    if ($_GET['error'] == true){
      includeinclude('composants/bibliotheque.php');
      error ("Votre adresse mail n'existe pas dans notre base de données veuillez-vous inscrire");
      unset($_SESSION);
    }
  }
  if (isset($_SESSION['statut'])){
    if ($_SESSION['statut'] === 'error'){
      error ($_SESSION['message']);
      $_SESSION['statut'] = false;
    }
  }
  ?>

<!--===== BOUTON DE CONNEXION - INSCRIPTION - MOT DE PASSE OUBLIE =====-->
    <button class="w-75 btn btn-lg btn-primary my-4 f-genos fs-3 p-0 rounded-0" type="submit">connexion</button>
    <p class="f-genos fs-5 p-0 text-white">Pas encore de compte: <span><a href="inscription.php" class="text-white text-decoration-underline">s'inscrire</a></span></p>
    <button type="button" class="btn f-genos fs-5 p-0 text-white text-decoration-underline" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Mot de passe oublié ?
</button>
  </form>

  <!-- Button trigger modal -->


<!--===== MODAL DU FORMULAIRE DE L'ENVOI DE MAIL =====-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content rounded-0">
      <div class="modal-header">
        <h1 class="modal-title fs-4 f-genos" id="exampleModalLabel">Récupération du mot de passe</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form action="envoiMail.php" id="form" method="GET">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label f-5 f-genos">Adresse mail</label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="mail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text fs-5 f-genos">Vous allez recevoir un mail (vérifiez dans les spams)</div>
          </div>
          </div>
          <button type="submit" class="btn btn-primary col-3 my-3 m-auto">Envoyer</button>
      </form>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
</main>
<!--===== Script Bootsrap =====-->
<script src="../dist/js/bootstrap.min.js"></script>
<?php
    footer();
    ?>
</body>
</html>