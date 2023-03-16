<?php
include('composants/bibliotheque.php');
htmlDebut("Lumectif-");
navBar();
?>

<body class="fond">

<?php   $connect = mysqli_connect('localhost','root','','lumectif') or die (mysqli_connect_error());
                    $okcharset = mysqli_set_charset ($connect, 'utf8');
                    $requete = "SELECT* FROM `lum_astuce`";
                    $resSQL = mysqli_query ($connect, $requete);
                    $nbrEnr = mysqli_num_rows ( $resSQL );
                    for ($num=0;$num<$nbrEnr;$num++)
                    {     $tab = mysqli_fetch_array($resSQL);
                    echo'     
                      <article class="d-flex align-items-center justify-content-between bg-white border-bottom border-black border-5">

<div class="f-genos w-50 d-flex flex-column ps-5 fs-1">
  <p class="mb-5 fs-1"></p>
  <p class="mt-5 fs-4">'.$tab['texte_as'].'</p>
  <p class="mt-5 fs-2">  <a href="article.php"><u class="text-black">voir nos produits</u></a></p>
</div>
<figure class="m-0">
 <img  src="../medias/materiel/'.$tab['image_as'].'"  alt="...">
  
</figure>
</article>';
                    }


?>
    <?php
    footer("");
    ?>
</body>
</html>