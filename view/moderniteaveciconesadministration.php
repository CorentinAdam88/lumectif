<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Site @Home : maisons de la catégorie modernité">
    <meta name="author" content="Jean-Luc Husson">

    <title>@Home - Maisons "Modernité"</title>
  
    <link href="dist53/css/bootstrap.min.css" rel="stylesheet">    
  </head>

  <body>

<!-- etape 1 -->

   <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
      <a class="navbar-brand" href="index.html">@Home</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Accueil</a>
          </li>
          <li class="nav-item dropdown active">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="modernite.html">Modernité</a>
              <a class="dropdown-item" href="tradition.html">Tradition</a>
              <a class="dropdown-item" href="design.html">Design</a>
              </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tarifs.html">Tarifs</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="contacts.html">Nous contacter</a>
          </li>          
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Que cherchez-vous ?">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
      </div>
    </nav>



<div class="container">

		
		<div class="page-header">
		  <h1>Nos maisons "Modernité" <small>Retrouver nos 6 offres !</small></h1>
		  <p><img src="medias/icones/inserer.png" alt="insérer" /> Inserer un nouveau bien dans cette catégorie</p>
		  <hr />
		</div>
		
		
		<div class="row">
			
			
			
		<!-- ============================================================ -->	
		<!-- MAISON 1 -->
		<!-- ============================================================ -->	

        <div class="col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img-top" src="medias/biens/maison_5.jpg" alt="Image maison 5">
              <div class="card-body">
                <h5 class="card-title">Zenith</h5>
                <p class="card-text">Grande maison construite en L, avec pignon...</p>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal1">Détails</button>
                <div class="float-right"><img src="medias/icones/supprimer.png" alt="supprimer" />&nbsp;<img src="medias/icones/modifier.png" alt="modifier" /></div>
              </div>
            </div>		
        </div>

           <!-- CODE FENETRE MODALE MAISON 1 -->
            <div class="modal" id="myModal1" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Maison "Zenith"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><img src="medias/biens/maison_5.jpg" alt="maison 1" /></p>
                    <p>Grande maison construite en L, avec pignon avancé et croupe de toit. Linteaux lorrains avec sous-sol semi enterré.</p>
                    <p><b>Indice de performance énergétique: C</b></p> 
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 62%" aria-valuenow="62" aria-valuemin="0" aria-valuemax="100">62</div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
		 
		 
		<!-- ============================================================ -->	
		<!-- MAISON 2 -->
		<!-- ============================================================ -->	

        <div class="col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img-top" src="medias/biens/maison_6.jpg" alt="Image maison 2">
              <div class="card-body">
                <h5 class="card-title">Equateur</h5>
                <p class="card-text">Grande maison de plein pied en L à combles. Le garage...</p>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal2">Détails</button>
                <div class="float-right"><img src="medias/icones/supprimer.png" alt="supprimer" />&nbsp;<img src="medias/icones/modifier.png" alt="modifier" /></div>
              </div>
            </div>		
        </div>

           <!-- CODE FENETRE MODALE -->
            <div class="modal" id="myModal2" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Maison "Equateur"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><img src="medias/biens/maison_6.jpg" alt="maison 1" /></p>
                    <p>Grande maison de plein pied en L à combles. Le garage traversant est dans le volume de la maison. Un vaste comble est à aménager.</p>
                    <p><b>Indice de performance énergétique : C</b></p> 
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100">69</div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
		 
		 
		<!-- ============================================================ -->	
		<!-- MAISON 3 -->
		<!-- ============================================================ -->	

        <div class="col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img-top" src="medias/biens/maison_7.jpg" alt="Image maison 1">
              <div class="card-body">
                <h5 class="card-title">Alysée</h5>
                <p class="card-text">Cette maison de 120 à 130 m2 est la première qui...</p>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal3">Détails</button>
                 <div class="float-right"><img src="medias/icones/supprimer.png" alt="supprimer" />&nbsp;<img src="medias/icones/modifier.png" alt="modifier" /></div>
             </div>
            </div>		
        </div>

           <!-- CODE FENETRE MODALE MAISON -->
            <div class="modal" id="myModal3" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Maison "Alysée"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><img src="medias/biens/maison_7.jpg" alt="maison 1" /></p>
                    <p>Pignon en décroché, avec combles aménageables ou totalement aménagés, cette maison bien structurée propose un garage en sous-sol.</p>
                    <p><b>Indice de performance énergétique : A</b></p> 
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90</div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
		 
		 
		<!-- ============================================================ -->	
		<!-- MAISON 4 -->
		<!-- ============================================================ -->	

        <div class="col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img-top" src="medias/biens/maison_9.jpg" alt="Image maison 1">
              <div class="card-body">
                <h5 class="card-title">Confort'house</h5>
                <p class="card-text">Deux chambres, une salle de bain avec wc indépendant ainsi qu'une...</p>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal4">Détails</button>
                <div class="float-right"><img src="medias/icones/supprimer.png" alt="supprimer" />&nbsp;<img src="medias/icones/modifier.png" alt="modifier" /></div>
              </div>
            </div>		
        </div>

           <!-- CODE FENETRE MODALE MAISON -->
            <div class="modal" id="myModal4" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Maison Confort's house</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><img src="medias/biens/maison_9.jpg" alt="maison 1" /></p>
                    <p>Deux chambres, une salle de bain avec wc indépendant ainsi qu'une mezzanine prennent place à l'étage. Pour un plus grand confort, le garage bénéficie d'un accès direct à la maison par le cellier.</p>
                    <p><b>Indice de performance énergétique : B</b></p> 
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100">78</div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
		 
		 
		<!-- ============================================================ -->	
		<!-- MAISON 5 -->
		<!-- ============================================================ -->	

        <div class="col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img-top" src="medias/biens/maison_10.jpg" alt="Image maison 1">
              <div class="card-body">
                <h5 class="card-title">Lego house</h5>
                <p class="card-text">Lignes originales, architecture contemporaine : vous serez séduit...</p>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal5">Détails</button>
                <div class="float-right"><img src="medias/icones/supprimer.png" alt="supprimer" />&nbsp;<img src="medias/icones/modifier.png" alt="modifier" /></div>
              </div>
            </div>		
        </div>

           <!-- CODE FENETRE MODALE MAISON -->
            <div class="modal" id="myModal5" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Maison "Lego house"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><img src="medias/biens/maison_10.jpg" alt="maison 1" /></p>
                    <p>Lignes originales, architecture contemporaine : vous serez séduit par ce modèle offrant de beaux et grands volumes de vie.</p>
                    <p><b>Indice de performance énergétique : A</b></p> 
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 93%" aria-valuenow="93" aria-valuemin="0" aria-valuemax="100">93</div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
		 
		 
		<!-- ============================================================ -->	
		<!-- MAISON 6 -->
		<!-- ============================================================ -->	

        <div class="col-sm-6 col-md-4">
            <div class="card">
              <img class="card-img-top" src="medias/biens/maison_19.jpg" alt="Image maison 1">
              <div class="card-body">
                <h5 class="card-title">Lego house</h5>
                <p class="card-text">Une surface habitable évolutive en aménagement les combles dans un deuxième...</p>
                 <button class="btn btn-primary" data-toggle="modal" data-target="#myModal5">Détails</button>
                <div class="float-right"><img src="medias/icones/supprimer.png" alt="supprimer" />&nbsp;<img src="medias/icones/modifier.png" alt="modifier" /></div>
              </div>
            </div>		
        </div>

           <!-- CODE FENETRE MODALE MAISON -->
            <div class="modal" id="myModal5" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Maison "Lego house"</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p><img src="medias/biens/maison_19.jpg" alt="maison 1" /></p>
                    <p>Une surface habitable évolutive en aménagement les combles dans un deuxième temps, pas besoin de déménager. Une maison où le charme opère : plafonds rampants, poutres apparentes. Nombreuses possibilités d’aménagement de l’espace de l’étage.</p>
                    <p><b>Indice de performance énergétique : B</b></p> 
                    <div class="progress">
                      <div class="progress-bar bg-success" role="progressbar" style="width: 71%" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100">71</div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                  </div>
                </div>
              </div>
            </div>
		 
		 

	
		
      </div>  <!-- row -->
	
    
    
      <!-- Site footer -->
      <hr/>
      <div class="footer">
        <p>&copy; MMI IUTSD</p>
      </div>
    
   </div>  <!-- container -->
	





    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as JL needed -->
    <script src="dist53/js/bootstrap.min.js"></script>


  </body>
</html>
