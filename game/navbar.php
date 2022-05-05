<!-- Patchnotes -->
<div class="offcanvas offcanvas-end bg-dark text-white" tabindex="-1" id="stats" aria-labelledby="offcanvasRightLabel">
      <div class="offcanvas-header">
          <h5 id="offcanvasRightLabel">Stats</h5>
          <button type="button" class="btn-close btn-close-white text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
          <div class="row mb-5">
            <?php include("pages/stats.php"); ?>
          </div>
      </div>
  </div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand d-xs-block d-lg-none" href="<?= GAME_URL; ?>">Ttigraas</a>
    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mt-3 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="?page=free_guild">Free Guild</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=free_guild">Market</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=stables">Stables</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=inventory">Inventory</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=labyrinth">Labyrinth</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=guild">Guild</a>
        </li>
        <?php 
          $user = new User($_SESSION["user_id"]);
          if($user->isAdmin()){ 
        ?>
          <li class="nav-item">
            <a class="nav-link" href="?page=admin">Administration</a>
          </li>
        <?php } ?>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="offcanvas" data-bs-target="#stats" aria-controls="offcanvasRight" href="#">Stats <span class="badge rounded-pill bg-danger" style="font-size: 12px">!</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?page=logout">Logout</a>
        </li>
    </div>
  </div>
</nav>
<div class="text-center text-white bg-dark " id="sidebar" style="height:100vh">
  <div id="sidebar_full">
    <a href="<?= GAME_URL; ?>" class="text-center text-decoration-none">
      <div class="fs-4 mb-5">Ttigraas</div>
    </a>
      <?php 
      
            include("./pages/stats.php");
      
      ?>
      <div class="mt-5" style="width:100%">
        <a href="?page=free_guild" class="align-center d-block">
            Free Guild
        </a>
        <a href="?page=shop" class="align-center d-block">
            Market
        </a>
        <a href="?page=stables" class="align-center d-block">
            Stables
        </a>
        <a href="?page=inventory" class="align-center d-block">
            Inventory
        </a>
        <a href="?page=town" class="align-center d-block">
            Town
        </a>
        <a href="?page=labyrinth" class="align-center d-block">
            Labyrinth
        </a>
        <a href="?page=guild" class="align-center d-block">
            Guild
        </a>
        <?php 
          $user = new User($_SESSION["user_id"]);
        if($user->isAdmin()){ ?>
          <a href="?page=admin" class="align-center d-block">
            Administration
          </a>
        <?php } ?>
        <a href="?page=logout" class="mb-3 align-center d-block">
            Logout
        </a>
      </div>
    </div>
    <div id="sidebar_small" class="align-items-center">
      <div class="logo"></div>
    </div>
</div>