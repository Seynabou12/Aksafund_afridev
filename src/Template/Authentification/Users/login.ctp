<div class="col-md-12 p-5">
  <div class="row justify-content-center">

    <div class="col-md-8 col-12 cnx align-self-center  text-center">
        <?= $this->Flash->render() ?>
        <div class="row cnx_contenu">
            <div class="col-md-6 col-12 cnx_contenu_left">
                <!-- <img src="<?= $this->Url->Image('logo.png') ?>" width="180px"> -->
                <h4 class="title text-center font-weight-bold" style="color:#f26522;text-decoration:underline ">Connectez-vous</h4>
                <br>
                <form method="post">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="formGroupExampleInput">Email</label>
                                <input type="text" class="form-control" name="email" id="formGroupExampleInput" placeholder="Saisissez votre email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="formGroupExampleInput2 ">Mot de passe</label>
                                <input type="password" class="form-control" name="password" id="formGroupExampleInput2" placeholder="Saisissez votre mot de passe">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-orange btn-sm m-0">Connexion</button>
                                <!-- <span class="text-right forgetpwd">
                                    <a href="http://" target="_blank" rel="noopener noreferrer">Mot de passe oublié</a>
                                </span> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6 text-center cnx_contenu_right">
                <a href="/">
                    <img src="<?= $this->Url->Image('aksafund-logo.png') ?>" width="200px"><br>
                    <img src="<?= $this->Url->Image('aksafund_texte.png') ?>" width="170px"><br><br>
                </a>
                <!-- <p>Vous n'avez pas de compte. <br>Merci de vous inscrire et soummettre vos campagnes</p>
                <a href="/authentification/inscription" class="btn btn-primary mt-2 font-weight-bold">Inscrivez-vous</a> -->
            </div>
        </div>
    </div>
  </div>
</div>
