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


<form class="col-md-<?php if ($this->fetch('edit') !== "") {echo "7";} else {echo "12";} ?>" method="post" enctype="multipart/form-data" action="<?= $this->fetch('action') ?>">
    <!-- Collapsable Card Example -->
    <div class="card shadow mb-4">
        <!-- Card Header - Accordion -->
        <a href="#collapseModif" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseModif">
            <h6 class="m-0 font-weight-bold text-primary">Remplir les informations de l'utilisateur</h6>
        </a>
        <!-- Card Content - Collapse -->
        <div class="collapse show" id="collapseModif">
            <div class="card-body row">
                <div class="col-md-12">
                    <?php
                        echo $this->Form->control('fname',['class'=>'form-control','label'=>'Nom','value'=>$user->fname]);
                        echo $this->Form->control('lname',['class'=>'form-control','label'=>'Prénom','value'=>$user->lname]);
                        echo $this->Form->control('email',['class'=>'form-control','value'=>$user->email]);
                        echo $this->Form->control('password',['class'=>'form-control','value'=>$user->password]);
                        echo $this->Form->control('adresse',['class'=>'form-control','value'=>$user->adresse]);
                        echo $this->Form->control('telephone',['class'=>'form-control','value'=>$user->telephone]);
                    ?>
                    <label>Rôle</label>
                    <select name="status" id="" class="form-control">
                        <option value="1">Admin</option>
                        <option value="2">Simple</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group mt-4 text-right">
                    <button type="submit" class="btn btn-primary text-white"><i class="fas fa-plus-circle mr-2"></i>Enregistrer</button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php if ($this->fetch('edit') !== "") : ?>
    <form class="col-md-5" method="post" action="<?= $this->Url->build(['controller' => 'roles', 'action' => 'add']) ?>">
        <div class="card">
            <div class="card-header">
                <i class="fas fa-user mr-2"></i>
                Rôles
            </div>
            <div class="card-body">
                <input type="hidden" name="user_id" value="<?= $user->id ?>">
                <?php if ($user->roles && count($user->roles) > 0) : ?>
                    <form action="" class="hidden"></form>
                    <?php foreach ($user->roles as $role) : ?>
                        <label class="label-radio-gray" style="font-size: 12px">
                            <span>
                                <?= $role->profil->name ?>
                                <?php echo $this->Form->postLink(__('<i class="fas fa-times text-danger ml-2"></i>'), ['controller' => 'roles', 'action' => 'delete', $role->id], ['escape' => false, 'confirm' => __('Voulez vous supprimer le rôle suivant :  {0}?', $role->profil->name)]) ?>
                            </span>
                        </label>
                <?php endforeach;
                endif; ?>
            </div>
            <div class="card-footer d-sm-flex align-items-center justify-content-between">
                <?= $this->form->select('profil_id',$profils,['class'=>'form-control']) ?>
                <button type="submit" class="btn btn-sm" id="addRole">Ajouter</button>
            </div>
        </div>
    </form>
<?php endif; ?>

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