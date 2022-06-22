<?php
use Cake\Routing\Router;
  $active = explode('/',Router::normalize($this->request->getAttribute('here')))[1];
?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
  <i class="fa fa-bars"></i>
</button>

<!-- Topbar Navbar -->
<ul class="navbar-nav ml-auto">

  <!-- Nav Item - Search Dropdown (Visible Only XS) -->
  <li class="nav-item dropdown no-arrow d-sm-none">
    <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-search fa-fw"></i>
    </a>
    <!-- Dropdown - Messages -->
    <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
      <form class="form-inline mr-auto w-100 navbar-search">
        <div class="input-group">
          <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary text-white" type="button">
              <i class="fas fa-search fa-sm"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </li>

  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <span class="mr-2 d-none d-lg-inline text-gray-600 small">
        <?= $utilisateur->fname.' '.$utilisateur->lname; ?>
      </span>
      <i class="fas fa-user-circle"></i>
    </a>
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
      <!-- <a class="dropdown-item" href="<?= $this->Url->Build(['controller' => 'Dashboard', 'action' => 'index']) ?>">
        <i class="fas fa-tachometer-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Dashbord
      </a>
      <a class="dropdown-item" href="<?= $this->Url->Build(['controller' => "Pois", 'action' => 'cartographie']) ?>">
        <i class="fas fa-map-marked-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Cartographie
      </a>
      <?php if($active == "admin"): ?>
      <?php endif; ?> -->
      <a class="dropdown-item" href="<?= $this->Url->Build(['controller' => "Users", 'action' => 'view',$current->id]) ?>">
        <i class="fas fa-cog fa-sm fa-fw mr-2 text-gray-400"></i>
        Mon Profil
      </a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="<?= $this->Url->Build(['prefix' => 'authentification', 'controller' => 'Users', 'action' => 'logout']) ?>">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Deconnexion
      </a>
    </div>
  </li>

</ul>
</nav>
