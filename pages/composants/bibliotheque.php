<header>
  <!--===== nav bar du haut =====-->
          <nav class="navHaut" id="navHautId">
              <div class="navHautGauche">
                  <div id="burger"> <img src="media/burger.svg" alt=""></div>
                  <div class="logo">L</div>
               </div>
              <form class="formHaut" action="">
                  <input placeholder="Recherche" type="text">
              </form>
                  <ul class="itemNav">
                      <li class="user"><a href="#"><img src="media/user.svg" alt=""></a></li>
                      <li class="like"><a href="#"><img src="media/like.svg" alt=""></a></li>
                      <li class="panier"><a href="#"><img src="media/panier.svg" alt=""></a></li>
                  </ul>
          </nav>
  <!--===== nav bar du bas =====-->
          <nav class="navBas" id="navBasId">
              <ul>
                  <li>
                      <form class="formBas" action="">
                          <input placeholder="Recherche" type="text">
                      </form>
                  </li>
                  <li><a href="#">accueil</a></li>
                  <li><a href="#">produit</a></li>
                  <li><a href="#">astuce</a></li>
                  <li><a href="#">contact</a></li>
              </ul>
          </nav>
  <!--===== Script JS =====-->
          <script>
  /*===== deplit au repli du menu =====*/
              var click = false
              const menu = document.getElementById('navBasId');
              const menuBurger = document.getElementById("burger");
              menuBurger.onclick = function(){ 
                  if(click == false){
                      click = true;
                      console.log("test");
                      menu.style.height = "330px";
                      console.log (click)
                  }else{
                      click = false;
                      console.log (click)
                      menu.style.height = "2px";
                  }
              }
  
  /*===== repli le menu quand on clique à coté =====*/
                  document.addEventListener('click', function(event){
                      if (!menu.contains(event.target) && !document.getElementById('navHautId').contains(event.target) && click == true){
  
                      click = false;
                      menu.style.height = "2px";
                  }
              })
          </script>
  
      </header>