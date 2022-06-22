<nav class="navbar navbar-expand-lg menu-horizontal">
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav d-block d-sm-none menu">
            <li><a href="<?= $this->Url->Build('/dashbord') ?>">Tableau de bord</a></li>
            <li><a href="<?= $this->Url->Build('/achats') ?>"><i class="fa fa-shopping-bag"></i> Achats</a></li>
            <li><a href="<?= $this->Url->Build('/produits') ?>"><i class="fa fa-tasks" aria-hidden="true"></i> Produits</a></li>
            <li><a href="<?= $this->Url->Build('/commandes') ?>"><i class="fa fa-shopping-basket" aria-hidden="true"></i> Commandes</a></li>
            <li><a href="<?= $this->Url->Build('/employes') ?>"><i class="fa fa-user"></i> Employés</a></li>
            <li><a href="<?= $this->Url->Build('/clients') ?>"><i class="fa fa-users"></i> Clients</a></li>
            <li><a href="<?= $this->Url->Build('/comptabilite') ?>"><i class="fa fa-university"></i> Comptabilité</a></li>
            <li><a href="<?= $this->Url->Build('/utilisateurs') ?>"><i class="fa fa-users"></i> Utilisateurs</a></li>

        </ul>
    </div>
    <div class="pull-right d-none d-sm-block" >
        <a href="<?= $this->Url->Build(['controller'=>'Users','action'=>'logout','prefix'=>'authentification']) ?>" class="btn btn-light btn-sm" >
            <i class="fa fa-sign-out"></i> Déconnexion
        </a>
    </div>
</nav>
