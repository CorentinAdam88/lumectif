
<?php
        session_start();
        $_SESSION['mailReset'] = $_GET['recupMail'];
include('composants/bibliotheque.php');
htmlDebut("Lumectif-connexion");
?>
<body class="bg-image-connexion img-fluid">
    <?php
        navBar();
    ?>
    <h1 class="fs-1 f-poiretOne ms-5 text-white">Récuperation du mot de passe</h1>
    <form action="resetMdpSecur.php" id="form" method="GET" class=" col-md-5 col-lg-3 mx-5 my-5">
    <div class="form-floating my-2">
    <input type="password" class="form-control rounded-0 mb-3 input" name="newMdp" id="mdp1" placeholder="Password" required>
    <label for="floatingInput" class="f-genos">Nouveau mot de passe</label>
  </div>
  <div class="form-floating">
    <input type="password" class="form-control rounded-0" id="mdp2" required placeholder="Password">
    <label for="floatingPassword" class="f-genos">Confirmation du mot de passe</label>
  </div>
    </form>
    <button onclick="verif()" class="w-25 ms-5 btn btn-lg btn-primary my-4 f-genos fs-3 p-0 rounded-0" type="submit">connexion</button>
    <script>
                    /*verification de la confirmation de mot de passe*/
    function verif(){
    if(document.getElementById('mdp1').value == document.getElementById('mdp2').value){
        document.getElementById('form').submit()
            }
    else{
        document.getElementById('mdp2').classList.add("border-danger-subtle");
            }
        }
    </script>
</body>