<body>
    <?php
        session_start();
        $_SESSION['mailReset'] = $_GET['recupMail'];
    ?>
    <form action="resetMdpSecur.php" id="form" method="GET">
        <p>Nouveau mot de passe <input type="password" class="input" name="newMdp" id="mdp1" required></p>
        <p>confirmer mot de passe <input class="" type="password" class="input" id="mdp2" required></p>
    </form>
    <button onclick="verif()">Changer mot de passe</button>
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