<div class="col-md-12">
        <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
            <h1 class="h4 text-gray-800">
                <?= $this->fetch('title') ?>
            </h1>
            <a href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn-sm btn-primary text-white">Ajouter des Paramétres<i class="fas fa-plus-circle ml-2"></i></a>
        </div>
    </div>
        
    <div class="col-md-12 page_body">
        <table id="datatable" class="table table-striped table-bordered dt-responsive" width="100%">
            <thead>
                <tr>
                    <th > Nom de la Plateforme</th>
                    <th > Email</th>
                    <th > Téléphone</th>
                    <th > Adresse</th>
                    <th > Code Postal</th>
                    <th > Ville</th>
                    <th > Pays</th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parametres as $parametre): ?>
                <tr>
                    <td><?= h($parametre->nomPlateforme) ?></td>
                    <td><?= h($parametre->email) ?></td>
                    <td><?= h($parametre->telephone) ?></td>
                    <td><?= h($parametre->adresse) ?></td>
                    <td><?= h($parametre->code_postal) ?></td>
                    <td><?= h($parametre->ville) ?></td>
                    <td><?= h($parametre->pays) ?></td>
                   
                    <td class="actions">
                        <a href="<?= $this->Url->Build([ 'action' => 'view', $parametre->id]) ?>" class="btn btn-sm btn-sm1 btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= $this->Url->Build([ 'action' => 'edit', $parametre->id]) ?>" class="btn btn-sm btn-sm1 btn-info">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?= $this->Form->postLink(__('<i class="fas fa-trash-alt "></i>'), [ 'action' => 'delete', $parametre->id], ['escape' => false, 'class' => 'btn btn-sm btn-sm1 btn-danger', 'confirm' => __('Voulez vous supprimer le parametre n° :  {0}?', $parametre->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?php $this->start('script'); ?>
<!-- Page le*vel plugins -->
<?= $this->Element('Admin/datatable') ?>
<?php $this->end(); ?>