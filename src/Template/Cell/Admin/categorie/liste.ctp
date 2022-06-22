<div class="col-md-12">
        <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
            <h1 class="h4 text-gray-800">
                <?= $this->fetch('title') ?>
            </h1>
            <a href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn-sm btn-primary text-white">Ajouter une catégorie<i class="fas fa-plus-circle ml-2"></i></a>
        </div>
    </div>
        
    <div class="col-md-12 page_body">
        <table id="datatable" class="table table-striped table-bordered dt-responsive" width="100%">
            <thead>
                <tr>
                    <th > Nom</th>
                    <th > Status</th>
                    <th > Icone</th>
                    <th > Type</th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categorys as $category): ?>
                <tr>
                    <td><?= h($category->name) ?></td>
                    <td><?= $this->Statut->getStatut($category->status) ?></td>
                    <td><?= h($category->icone) ?></td>
                    <td><?= $category->has('typecategory') ? $this->Html->link($category->typecategory->name, ['controller' => 'Typecategorys', 'action' => 'view', $category->typecategory->id]) : '' ?></td>
                
                    <td class="actions">
                        <a href="<?= $this->Url->Build([ 'action' => 'view', $category->id]) ?>" class="btn btn-sm btn-sm1 btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= $this->Url->Build([ 'action' => 'edit', $category->id]) ?>" class="btn btn-sm btn-sm1 btn-info">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?= $this->Form->postLink(__('<i class="fas fa-trash-alt "></i>'), [ 'action' => 'delete', $category->id], ['escape' => false, 'class' => 'btn btn-sm btn-sm1 btn-danger', 'confirm' => __('Voulez vous supprimer l\'category n° :  {0}?', $category->id)]) ?>
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