<?php
/*Bibliotheque*/
include('composants/bibliotheque.php');
htmlDebut("Lumectif-connexion");

?>
<body class="bg-image-connexion img-fluid">
<?php
    navBar();
  ?>
<form action="decoSecur.php">
<input class="form-control" type="text" placeholder="Nom" aria-label="default input example">

<button class="w-75 btn btn-lg btn-primary my-4 f-genos fs-3 p-0 rounded-0" type="submit">deconnexion</button>
</form>

</body>
