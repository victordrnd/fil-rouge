<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="/"><i class="fas fa-globe-americas"></i></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Accueil <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/continent/Europe">Europe</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/continent/Asia">Asie</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/continent/North%20America">Amérique du Nord</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/continent/South%20America">Amérique du sud</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/couche8">Erreur 404</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="/city/search">
      <input class="form-control mr-sm-2 rounded-0" type="search" name="keyword" placeholder="Rechercher" aria-label="Search">
      <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Rechercher</button>
    </form>

    <a class="mx-2 pointer text-white text-decoration-none" href="/auth/signin">
      <i class="fa fa-user"></i> <?php if (isset($_SESSION['nom'])) {
                                    echo $_SESSION['nom'];
                                  } else {
                                    echo "Se connecter";
                                  }
                                  ?>
    </a>
    <?php
    if (isset($_SESSION['nom'])) {
      ?>
      <a href="/logout" class="text-light"><i class="fas fa-power-off"></i></a>
    <?php
    }
    ?>
  </div>
</nav>