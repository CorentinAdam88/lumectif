<?php
include('composants/bibliotheque.php');
htmlDebut("Lumectif-");
navBar();
?>




<body class="fond">

  <article class="bg-photo">
  <div class="f-poiretOne text-white w-md-50 w-100 d-flex flex-column ps-5 pb-5 fs-1 position-fixed top-25 start-50 z-0">
    <p class="mb-5 fs-1">Bienvenue sur lumectif </br>la reference du materiel audiovisuel</p>
    <p class="mt-5 fs-1">  <a href="article.php" class="text-white"> <u>voir nos produits</u></a></p>
  </div>
  </article>


  <article class="d-md-flex d-block align-items-center justify-content-between bg-white border-bottom border-black border-5 position-relative z-1">

<div class="f-genos w-50 d-md-flex d-block flex-column ps-5 fs-1">
  <p class="mb-5 fs-1">Les cameras</p>
  <p class="mt-5 fs-2">Une caméra est un appareil de prise de vues destiné à enregistrer ou à transmettre des images photographiques successives afin de restituer l'impression de mouvement pour le cinéma, la télévision, la recherche, la télésurveillance, l'imagerie industrielle et médicale, ou bien pour d'autres applications, ... </p>
  <p class="mt-5 fs-2">  <a href="article.php?categorie=4"><u class="text-black">Voir les cameras...</u></a></p>
</div>
<figure class="m-0">
 <img  src="../medias/materiel/caméra.webp"  alt="...">
  
</figure>
</article>

<article class="d-flex align-items-center justify-content-between bg-white border-bottom border-black border-5 position-relative z-1">
<figure class="col-md-5 m-0">
<img src="../medias/materiel/obj.webp"  alt="...">    
</figure>
<div class="f-genos w-50 d-flex flex-column ps-5 my-10 ">
  <p class="mb-5 fs-1">Bienvenue sur lumectif</p>
  <p class="mt-5 fs-1">Autant en photo qu'en cinéma, l'objectif est une pièce vitale de l'appareil car il c'est par lui que la lumière passe.</p>
  <p class="mt-5 fs-1">  <a href="article.php?categorie=6"><u class="text-black">Voir les objectifs...</u></a></p>
</div>
</article>

<article class="d-flex align-items-center justify-content-between bg-dark text-white position-relative z-1">

<div class="f-genos w-50 d-flex flex-column ps-5">
  <p class="mt-5 fs-2">L'éclairage est un élément essentiel de la production vidéo. Les caméras ont besoin de beaucoup de lumière pour produire une image de qualité et créer la bonne atmosphère, mais cela peut être délicat selon le type de vidéo que vous souhaitez réaliser.</p>
  <p class="mt-5 fs-2">  <a href="article.php?categorie=5" class="text-white"> <u>Voir les lumière...</u></a></p>
</div>

<figure class=" m-0 " >
<img src="../medias/materiel/ligth.webp" alt="...">    
</figure>

</article>

 
  <?php
    footer("");
    ?>
</body>
</html>