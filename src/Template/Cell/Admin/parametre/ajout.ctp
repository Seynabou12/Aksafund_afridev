<?php 
    $this->assign('title', $this->fetch('title'));
    $this->start('script'); ?>
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <?php $this->end(); ?>
    <?= $this->Html->css('admin/slick.css',['block' => 'css']) ?>
<!-- Page Heading -->
<div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-start mb-2 mt-2">
        <h1 class="h4 text-gray-800">
        <a href="<?= $this->Url->build(['action' => 'index']); ?>" class="btn btn-sm btn-primary text-white px-3 text-white mr-2"><i class="fas fa-arrow-left"></i></a>
            <?= $this->fetch('title') ?>
        </h1>
    </div>
</div>

<form class="col-md-12" method="post" enctype="multipart/form-data" action="<?= $this->fetch('action') ?>">
    <div class="row">
        <div class="col-md-12">
            
            <div class="card shadow mb-4">
              
                <a href="#collapseModif" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseModif">
                    <h6 class="m-0 font-weight-bold text-primary">Remplir les Paramétres Généraux</h6>
                </a>
               
                <div class="collapse show" id="collapseModif">
                    <div class="card-body row">
                        <div class="col-md-12">
                        <?php
                        
                            echo $this->Form->control('nomPlateforme',['class'=>'form-control','label'=>'Nom de la Plateforme','default'=>$parametre->nomPlateforme]);
                            echo $this->Form->control('email',['class'=>'form-control','label'=>'Email','default'=>$parametre->email]);
                            echo $this->Form->control('telephone',['class'=>'form-control','label'=>'telephone','default'=>$parametre->telephone]);
                            echo $this->Form->control('adresse',['class'=>'form-control','label'=>'adresse','default'=>$parametre->adresse]);
                            echo $this->Form->control('code_postal',['class'=>'form-control','label'=>'code_postal','default'=>$parametre->code_postal]);
                            echo $this->Form->control('ville',['class'=>'form-control','label'=>'ville','default'=>$parametre->ville]);
                            echo $this->Form->control('pays',['class'=>'form-control','label'=>'pays','default'=>$parametre->pays]);
                            echo $this->Form->control('logo',['class'=>'form-control','label'=>'logo','type'=>'file','default'=>$parametre->logo]);
                        ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mt-4 text-right">
                            <button type="submit" class="btn btn-primary text-white"><i class="fas fa-plus-circle mr-2"></i>Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $this->start('script_bottom'); ?>
    <script>
        CKEDITOR.replace('description', {
            // language: 'fr',
            //uiColor: '#2C80BE'
        });
        $(document).ready(function() {
            var description = $('#description').val();
            //Bind value description
            $('#description').change(function() {
                description = $(this).val();
            });

        });
    </script>
<?php $this->end(); ?>