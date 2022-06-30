<div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
        <h1 class="h4 text-gray-800">
            <?= $this->fetch('title') ?>
        </h1>
        <a href="<?= $this->Url->build(['controller'=>'Images','action'=>'add']) ?>" class="btn-sm btn-primary text-white">Ajouter une image<i class="fas fa-plus-circle ml-2"></i></a>
    </div>
</div>
<div class="col-md-12 page_body">
    <table id="datatable" class="table table-striped table-bordered dt-responsive" width="100%">
        <thead>
            <tr>
                <th> Image</th>
                <th> Section</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($images as $image): ?>
            <tr>
                <td><?= h($image->image) ?></td>
                <td><?= $image->has('section') ? $this->Html->link($image->section->nom, ['controller' => 'Sections', 'action' => 'view', $image->section->id]) : '' ?></td>
                    
                <td class="actions">
                    <a href="<?= $this->Url->Build(['controller' => 'Images', 'action' => 'view', $image->id]) ?>" class="btn btn-sm btn-sm1 btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= $this->Url->Build(['controller'=> 'Images', 'action'=> 'edit', $image->id]) ?>" class="btn btn-sm btn-sm1 btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
                    <?= $this->Form->postLink(__('<i class="fas fa-trash-alt "></i>'), ['controller' => 'Images', 'action' => 'delete', $image->id], ['escape' => false, 'class' => 'btn btn-sm btn-sm1 btn-danger', 'confirm' => __('Voulez vous supprimer type n° :  {0}?', $image->id)]) ?>
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