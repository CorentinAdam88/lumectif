<?php
include('composants/bibliotheque.php');
htmlDebut("Lumectif-connexion");
navBar();
?>
<!--FORMULAIRE D'INSCRIPTION-->
<form id="form" action="inscriptionSecur.php" method="GET">
    <p>nom <input type="text" class="input" id="nom" name="nom" required></p>
    <p>address_mail <input type="mail" id="mail" name="mail" required></p>
    <p>mot de passe <input type="password" class="input" name="mdp" id="mdp1" required></p>
    <p>confirmer mot de passe <input class="" type="password" class="input" name="mdp2" id="mdp2" required></p>
</form>

<!--VERIFICATION QUE TOUT LES CHAMPS NE SOIT PAS VIDE-->
<button onclick="verif()">s'inscrire</button>
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