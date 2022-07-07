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
            <div class="card shadow">
                <a href="#collapseModif" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseModif">
                    <h6 class="m-0 font-weight-bold text-primary">Remplir les reseaux sociaux</h6>
                </a>
                <div class="collapse show" id="collapseModif">
                    <div class="card-body row">
                        <div class="col-md-12">
                            <?php
                                echo $this->Form->control('nom',['class'=>'form-control','label'=>'Nom Reseau Social','default'=>$reseau->nom]);
                                echo $this->Form->control('logo',['class'=>'form-control','value'=>$reseau->logo, 'multiple', 'label'=>"logo(vous pouvez enregistrer plusieurs logo)",'type'=>'file', 'placeholder'=>'Entrer logo des reseaux sociaux']);
                                echo $this->Form->control('lien',['class'=>'form-control','value'=>$reseau->lien,'label'=>"Lien",'type'=>'url', 'placeholder'=>'Entrer lien vers le réseau']);
                            ?>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group mt-4 text-right">
                                <button type="submit" class="btn btn-primary text-white"><i class="fas fa-plus-circle mr-2"></i>Ajouter</button>
                            </div>
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
           
        });
        $(document).ready(function() {
            var description = $('#description').val();
            $('#description').change(function() {
                description = $(this).val();
            });

        });
    </script>
<?php $this->end(); ?>