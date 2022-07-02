<div class="header_top container p-0 card mb-4 mt-4">
    <div class="col-md-12 bg-orange p-2">
        <div class="row">
            <div class="col-md-12 text-white text-center">

                <h1 class="h4">
                <a href="/" class="typewrite text-white" data-period="2000" data-type='[ "Bienvenue, à Aksafund", "Faites un geste simple"]'>
                    <span class="wrap"></span>
                </a>
                </h1>
            </div>
        </div>
    </div>
    <div class="col-md-12 p-2 pl-3 pr-3 d-none d-md-block">
        <div class="row">
            <div class="col-md-4">
                <a class="navbar-brand d-none d-md-block" href="/">
                    <?= $this->Html->image("logo.png", ['style' => 'width:170px']) ?>
                </a>
            </div>
            <div class="col-md-8 text-right locations">
                <span> <span>Service</span > <i class="fas fa-phone"></i> <a href="tel:774623352" style="color: #6c757d !important;"> +221 77 462 33 52</a> </span><br>
                <span>
                    <span>Localisation</span> <i class="fas fa-enveloppe" aria-hidden="true"></i>
                    <a href='mailto:contact@aksafund.com' style="color: #6c757d !important;"> contact@aksafund.com </a>
                    </span>
            </div>
        </div>
    </div>
    <div class="col-12 p-0 header_top_bottom">
        <div class="container p-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-light2 p-0 pl-4 pr-3 navbar-scrolled" id="mainNav">
                <div class="container p-0">
                <a class="navbar-brand js-scroll-trigger d-block d-sm-none" href="/">
                    <?= $this->Html->image("logo.png", ['style' => 'width:120px']) ?>
                </a>
                <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse" id="navbarResponsive" >
                    <ul class="navbar-nav ml-0 mr-auto menu">
                        <li class="nav-item">
                            <a class="nav-link home active" href="<?= $this->Url->Build('/')?>">Accueil</a>
                        </li>
                        <?php foreach ($types as $key => $value) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link categorie categorie<?=$value->id ?>" href="<?= $this->Url->Build(['controller'=>'Campagnes','action'=>'categorie',$value->id]) ?>">
                                <?= $value->name ?>
                                </a>
                                
                            </li>
                        <?php  }?>
                     
                        <li class="nav-item">
                            <a class="nav-link categorie3" href="#about">A propos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link categorie4" href="#contact">Contact</a>
                        </li>

                    </ul>
                    <ul class="navbar-nav nav-flex-icons">
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" href="#">
                                <i class="fab fa-twitter header-rs"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" target="_blank" href="#">
                                <i class="fab fa-facebook header-rs"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" target="_blank" href="#">
                                <i class="fab fa-youtube header-rs"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link waves-effect waves-light" target="_blank" href="#">
                                <i class="fab fa-linkedin header-rs"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <?php
                            if(isset($current)):
                                if($current->roles[0]->profil_id == 1):
                            ?>
                                <a class="active nav-link btn-sm" href="/admin/dashboard" style="border-radius: 50px;">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Espace Admin
                                </a>
                            <?php
                                elseif($current->roles[0]->profil_id == 2):
                            ?>
                                <a class="active nav-link btn-sm" href="/porteurs/users/" style="border-radius: 50px;">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Mon Espace
                                </a>
                            <?php endif;?>
                            <?php
                                else:
                            ?>
                                <a class="active nav-link btn-sm" href="/authentification/login" style="border-radius: 50px;">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    Se connecter
                                </a>
                            <?php endif;?>

                        </li>
                    </ul>
                </div>
                </div>
            </nav>

        </div>
    </div>

</div>
<script>
$("document").ready(function(){

$(function() {
    $('.'+url+'').removeClass('active');
    var url = location.pathname.split("/")[location.pathname.split("/").length-1];
    console.log(location.pathname);
    if(url > 0){
        $('.home').removeClass('active');
        $('.categorie'+url+'').addClass('active');
        $('.categorie3').click(function(){
            $('.categorie4').removeClass('active');
            $('.categorie').removeClass('active');
            $('.categorie3').addClass('active');
        });
        $('.categorie4').click(function(){
            $('.categorie3').removeClass('active');
            $('.categorie').removeClass('active');
            $('.categorie4').addClass('active');
        });
    }
    console.log(url);
    // $('.cssmenu a[href="' + location.pathname.split("/")[location.pathname.split("/").length-1] + '"]').parent().addClass('test');
});
});
</script>
