<?php
    $this->assign('title', $this->fetch('title'));
    $this->start('script'); ?>
    <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
    <?php $this->end(); ?>
    <?= $this->Html->css('admin/slick.css',['block' => 'css']) ?>
<!-- Page Heading -->
<style>
.remove{
    float: right;
    margin-top:-44px;
    margin-right:5px
}
.clone{
    margin:10px 0;
}
.add-row{
    cursor:pointer;
}
</style>
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
            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Accordion -->
                <a href="#collapseModif" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseModif">
                    <h6 class="m-0 font-weight-bold text-primary">Remplir les informations </h6>
                </a>
                <!-- Card Content - Collapse -->
                <div class="collapse show" id="collapseModif">
                    <div class="card-body row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <?php
                                        echo $this->Form->control('name',['class'=>'form-control','label'=>'Nom campagne','required','default'=>$campagne->name]);
                                        echo $this->Form->control('lien',['class'=>'form-control','label'=>'lien','default'=>$campagne->lien]);
                                        ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                        echo '<label>Catégorie</label>';
                                        echo $this->Form->select('category_id',$categorys, ['default' => $campagne->category_id,'class'=>'form-control','label'=>'Catégorie','required']);
                                        echo $this->Form->control('montant',['class'=>'form-control','required','default'=>$campagne->montant]);
                                        echo $this->Form->select('user_id',$users, ['default' => $campagne->user_id,'class'=>'form-control d-none','required']);
                                    ?>
                                </div>
                                <div class="col-md-12">
                                    <?php
                                        echo '<label>Description Courte</label>';
                                        echo $this->Form->textarea('desc_courte',['class'=>'form-control','label'=>'Description Courte','required','default'=>$campagne->desc_courte]);
                                        echo '<br><label>Description Longue</label>';
                                        echo $this->Form->textarea('desc_longue',['class'=>'form-control','label'=>'Description Longue','required','default'=>$campagne->desc_longue,'name'=>'desc_longue']);
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label>Images</label>
                            <ul id="personal-details3" class="sea-service" style="margin-left:-80px">
                                <li style="display:block">
                                    <ul class="column">
                                        <li style="display:block">
                                            <input id="NameOfVessel" type="file" name="image[]" class="form-control clone" />
                                        </li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="personal-details1" style="margin-left:-40px"></ul>
                            <span class="add-row btn btn-success btn-sm">
                                charger plus d'images <i class=" fa fa-clone"></i>
                            </span>
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
<div class="col-md-12">
    <div class=""></div>
    <?php if ($this->fetch('edit') !== ""): ?>
        <div class="mt-4">
            <?php foreach ($campagne->fichiers as $key => $value) {?>
                <img src="<?= $this->Url->Image($value->name); ?>" alt="" srcset="" width="100px">
                <?= $this->Form->postLink(__('Delete'), ['controller'=>'Fichiers','action' => 'delete', $value->id],['class'=>'fa fa-times','confirm' => __('Voulez-vous supprimer le fichier # {0}?', $value->id)]) ?>
            <?php  } ?>
        </div>
    <?php endif; ?>
</div>
<?php $this->start('script_bottom'); ?>
    <script>
        $(function () {
            $( ".add-row" ).click(function(){
                $( "ul.sea-service" ).first().clone().appendTo( ".personal-details1" ).append('<button class="remove btn btn-danger btn-sm">X</button>').find('input').val('');
            });
            $( "body" ).on('click', '.remove', function(){
                $(this).closest('.sea-service').remove();
            });
        });
        CKEDITOR.replace('desc_longue', {
           
        });
        $(document).ready(function() {
            var description = $('#desc_longue').val();
           
            $('#desc_longue').change(function() {
                description = $(this).val();
            });

            });
    </script>
<?php $this->end(); ?>
