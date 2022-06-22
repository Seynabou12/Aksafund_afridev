<div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
        <h1 class="h4 text-gray-800">
            <?= $this->fetch('title') ?>
        </h1>
        <a href="<?= $this->Url->build(['controller'=>'Themes','action'=>'add']) ?>" class="btn-sm btn-primary text-white">Ajouter un Théme<i class="fas fa-plus-circle ml-2"></i></a>
    </div>
</div>

<div class="col-md-12 page_body">
    <table id="datatable" class="table table-striped table-bordered dt-responsive" width="100%">
        <thead>
            <tr>
                <th > Nom du théme</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($themes as $theme): ?>
            <tr>
                <td><?= h($theme->nomTheme) ?></td>
                
                <td class="actions">
                    <a href="<?= $this->Url->Build(['controller' => 'Themes', 'action' => 'view', $theme->idTheme]) ?>" class="btn btn-sm btn-sm1 btn-primary">
                        <i class="fas fa-edit"></i>
                    </a>
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
