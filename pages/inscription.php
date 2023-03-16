<?php
include('composants/bibliotheque.php');
htmlDebut("Lumectif-connexion");
navBar();
?>
<body class="bg-image-connxion img-fluid">
<!--FORMULAIRE D'INSCRIPTION-->
<div class="d-flex justify-content-center">
        
        <form class="row col-md-6 col-11 m-5 f-genos fs-4" action="inscriptionSecur.php" method="GET">

          
        <div class="col">
                <label for="lastName" class="form-label" id="nom" name="nom">Nom</label>

                <input
                    type="text"
                    class="form-control"
                    placeholder="Prénom"
                    aria-label="Last name">
            </div>

            <div class="col-md-12 my-2">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" class="form-control mail" id="inputEmail4" name="mail" required>
            </div>

            <div class="col-md-12 my-2">
                <label for="inputEmail4" class="form-label">mot de passe</label>
                <input type="password" class="form-control input" id="inputEmail4" name="mdp" id="mdp1" required>
            </div>

            <div class="col-md-12 my-2">
                <label for="inputEmail4" class="form-label">Confirmation du mot de passe</label>
                <input type="password" class="form-control input" id="inputEmail4" name="mdp" id="mdp1" required>
            </div>

            <div class="col-12 my-2">
                <label for="inputAddress" class="form-label">Adresse</label>
                <input
                    type="text"
                    class="form-control"
                    id="inputAddress"
                    placeholder="30 rue codeapick">
            </div>
            <div class="col-md-6 my-2">
                <label for="inputCity" class="form-label">Ville</label>
                <input type="text" class="form-control" id="inputCity">
            </div>
            <div class="col-md-4 my-2">
                <label for="inputState" class="form-label">Pays</label>
                <select id="inputState" class="form-select">
                    <option selected="selected">Choisissez votre pays...</option>
                    <option>France</option>
                    <option>USA</option>
                    <option>Maroc</option>

                </select>
            </div>

            <div class="col-12 my-2">
                <button onclick="verif()" type="submit" class="btn btn-primary">Envoyer</button>
            </div>
          </div>
        </form>
      </div>

<!--VERIFICATION QUE TOUT LES CHAMPS NE SOIT PAS VIDE-->
    <script>
        function verif(){
            if(
            document.getElementById('mdp1').value === ""
            ||
            document.getElementById('mdp2').value === ""
            ||
            document.getElementById('nom').value === ""
            ||
            document.getElementById('mail').value === ""
            ){
        }
        else{
            /*verification de la confirmation de mot de passe*/
            if(document.getElementById('mdp1').value == document.getElementById('mdp2').value){
            }
            else{
                document.getElementById('mdp2').classList.add("border-danger-subtle")
            }
            document.getElementById('form').submit()
        }
        }
    </script>

<?php
    footer("position-absolute bottom-0 w-100");
    ?>
</body>
</html>