<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Par d'index du site @home">
    <meta name="author" content="JL Husson">

    <title>@Home - version Bootstrap 5</title>

    <!-- Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../css/produits.css">
    <link rel="stylesheet" href="../css/common.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.cdnfonts.com/css/el-messiri" rel="stylesheet">
</head>

<body class="font-family-messiri body-background">
    <?php include './composants/navbar.php'; ?>

    <div class="d-flex p-2 background-dark text-white">
        <div class="p-4 mx-auto my-auto">
            <h1 class="mb-4">Le saviez vous ?</h1>
            <p class="text-justify">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate quae, cupiditate earum cumque mollitia qui ex odio similique recusandae nulla autem iste quis laudantium. 
                Harum, et totam vero blanditiis repellat, voluptas explicabo autem esse fugit, molestiae obcaecati deleniti provident nobis corrupti voluptatibus rem nemo ab nam. 
                Corrupti natus aspernatur vel!
            </p>
        </div>
    </div>

    <div class="row mt-2 mx-0 h-100">
        <div class="col-4 h-100">
            One of three columns
        </div>
        <div class="col-8 h-100">
            <div class="d-flex flex-wrap justify-content-start h-100">
                <?php
                    require_once '../model/produit.php';
                    $produits = array();
                    // faire requête sql; => $produits = resultat de la requête
                    $produits[] = new Produit(0, 1222, "nanone", 1);
                    $produits[] = new Produit(1, 1287, "pixel", 0.5);
                    $produits[] = new Produit(2, 3244, "hp", 0.9);
                    $produits[] = new Produit(3, 100, "asus", 0.2);
                    $produits[] = new Produit(4, 5400, "apple", 0.8);
                ?>

                <?php foreach($produits as $produit): ?>
                    <div class="card mx-2 my-2" style="width: 18rem;">
                        <img class="card-img-top" src="../medias/maréiel/objectif.jpg" alt="Card image cap">
                        <div class="card-body w-100">
                            <div class="d-flex justify-content-center text-secondary">
                                <h5><?php echo $produit->nom; ?></h5>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h4>NSTAB</h4>
                            </div>
                            <div class="d-flex justify-content-center">
                                <h4><?php echo $produit->prix * $produit->reduction?> $</h4>
                                <h5 class="ml-4 text-secondary" style="text-decoration: line-through;"><?php echo $produit->prix?> $</h5>
                            </div>
                            <hr/>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-outline-secondary bg-white input-border icon" type="button">
                                <i class="fa fa-heart"></i>
                                </button>
                                <button class="btn btn-outline-secondary bg-white input-border icon mx-2" type="button">
                                <i class="fa fa-cart-plus"></i>
                                </button>
                                <?php include './composants/étoiles.php'; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php include './composants/footer.php'; ?>
</body>

</html>

