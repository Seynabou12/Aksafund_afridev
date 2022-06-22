<?php
    $this->layout = false;
?>
<div class="col-md-12 " style="text-align:center;padding-top:100px">
    <div class="row">
        
        <a class="" href="<?= $this->Url->Build('/')?>">
            <?= $this->Html->image("logo.png", ['style' => 'width:200px']) ?>
        </a>
        <h3 style="text-align:center"><i class="fas fa-exclamation-triangle"></i></h3>
        <div class="jumbotron" style="text-align: center;background:#fff !important">
            <h2>Page non trouvée</h2>
            <p>Retourner <i class="fa fa-arrow-right"></i>  <a href="<?= $this->Url->Build('/') ?>">à la page d'accueil</a></p>
        </div>
    </div>
</div>
