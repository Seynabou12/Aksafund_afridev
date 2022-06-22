<div class="col-md-12 p-5">
  <div class="row justify-content-center">
    <div class="col-md-8 col-12">
        <?= $this->Flash->render() ?>
        <div class="row cnx_contenu cnx">
            <div class="col-md-6 col-12 ">
                <h4 class="title text-center font-weight-bold" style="color:#f26522;text-decoration:underline ">Inscivez-vous</h4>
                <br>
                <form method="post" enctype="multipart/form-data" action="<?=  $this->Url->buil(['prefix'=>'authentification','controller'=>'Users','action'=>'inscription'])?>">
                    <div class="row">
                        <div class="col-md-6">
                            <?php
                                echo $this->Form->control('fname',['class'=>'form-control','label'=>'Nom','placeholder'=>'Saisir votre nom']);
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                                echo $this->Form->control('lname',['class'=>'form-control','label'=>'Prénom','placeholder'=>"Saisir votre prénom"]);
                            ?>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="email">Email</label>

                            <?php
                                echo $this->Form->control('email',['class'=>'form-control','placeholder'=>"ex: adrese-eamil@domaine.com","label"=>false]);
                            ?>
                        </div>
                        <div class="col-md-12 mt-2">
                            <label for="password">Mot de passe</label>
                            <?php
                                echo $this->Form->control('password',['class'=>'form-control','placeholder'=>"Saisir votre mot de passe","label"=>false]);
                            ?>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-orange btn-sm text-white m-0"><i class="fas fa-plus-circle mr-2"></i>Valider</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="col-md-6 text-center cnx_contenu_right">
                <a href="/">
                    <img src="<?= $this->Url->Image('aksafund-logo.png') ?>" width="130px"><br>
                    <img src="<?= $this->Url->Image('aksafund_texte.png') ?>" width="100px"><br><br>
                </a>
                <h5><strong>Créez votre compte</strong></h5>
                <p>La plateforme de collecte de fonds <br>et de suivi en temps réel de vos participations</p>
            </div>
        </div>
    </div>
  </div>
</div>


