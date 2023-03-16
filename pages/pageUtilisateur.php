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
<button class="px-3 py-1 btn btn-lg btn-primary my-4 f-genos fs-3 p-0 rounded-0 m-auto justify-content-center d-flex align-items-center" type="submit">deconnexion</button>
</form>

<?php
    footer();
    ?>
</body>
</html>
