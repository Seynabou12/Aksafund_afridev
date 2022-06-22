<div class="col-md-12">
    <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
        <h1 class="h4 text-gray-800">
            <?= $this->fetch('title') ?>
        </h1>
    </div>
</div>

<div class="col-md-12 page_body">
    <table id="datatable" class="table table-striped table-bordered dt-responsive" width="100%">
        <thead>
            <tr>
                <th > Prénom</th>
                <th > Nom</th>
                <th > Email</th>
                <th > adresse</th>
                <th > telephone</th>
                <th > status</th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?= h($user->fname) ?></td>
                <td><?= h($user->lname) ?></td>
                <td><?= h($user->email) ?></td>
                <td><?= h($user->adresse) ?></td>
                <td><?= h($user->telephone) ?></td>
                <td>
                    <?php
                    $name = "Actif";
                    $cls = 'badge badge-success';

                    if($user->status == 0){
                        $name = "Inactif";
                        $cls = 'badge badge-danger';
                    }  ?>
                    <span class="<?= $cls ?>"><?= $name;?></span>
                </td>
                <td class="actions">
                    <a href="<?= $this->Url->Build(['controller' => 'Users', 'action' => 'view', $user->id]) ?>" class="btn btn-sm btn-sm1 btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= $this->Url->Build(['controller' => 'Users', 'action' => 'edit', $user->id]) ?>" class="btn btn-sm btn-sm1 btn-info">
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
