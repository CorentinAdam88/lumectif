<?php
session_start();
include('composants/bibliotheque.php');
htmlDebut("Lumectif-connexion");
navBar();
?>
<body>
<main class="form-signin w-100 m-auto">
  <form class="text-center col-md-5 col-lg-3 mx-md-auto mx-5 my-5" action="connexionSecur.php" method="GET">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

  <?php
  if(!isset($_SESSION['statut'])){
    $feedback="";
    echo "ddddddddddddddddddddddddddddddd";
  }
  else{
    if($_SESSION['statut'] === "error"){
      $feedback ="border-danger-subtle border-3";
    }
    else{
      $feedback="";
    }
  }
    echo'<div class="form-floating my-2">
    <input type="text" class="form-control '.$feedback.'" id="floatingInput" name="login" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control '.$feedback.'" id="floatingPassword" name="mdp" placeholder="Password">
    <label for="floatingPassword">Password</label>
  </div>';
  ?>
    <button class="w-100 btn btn-lg btn-primary my-4" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>
<?php
if (isset($_SESSION['statut'])){
  if($_SESSION['statut'] == true)
  echo (string)$_SESSION['statut'].'<br>';
  echo hash('sha256', '0000');
}

?>
</body>