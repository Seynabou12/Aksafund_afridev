<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>

<div class="col-md-12">
    <div class="mb-3">
        
        <h1 class="h4 text-gray-800">
            <span class="h6 collapse-header text-primary">
                Visualisation des informations
            </span><br>
            Affichage
        </h1>
        
    </div>
</div>

<div class="col-md-7 col-lg-7 col-xs-7">
    <div class="card mb-2">
        <div class="card-header bg-primary text-white">
                Informations Personnelles
        </div>
        <div class="card-body">
            <div class="form-group mb-2 d-flex">
                <label class="text-primary col-md-5" for="">Nom & Prénom</label>  <span class="col-md-10"><?= h($user->lname.''.$user->fname); ?></span> </h4>
            </div>
            <div class="form-group mb-2 d-flex">
                <label class="text-primary col-md-5" for="">Email</label>  <span class="col-md-10"><?= h($user->email); ?></span> 
            </div>
            <div class="form-group mb-2 d-flex">
                <label class="text-primary col-md-5" for="">Adresse</label>  <span class="col-md-10"><?= h($user->adresse); ?></span> 
            </div>
            <div class="form-group mb-2 d-flex">
                <label class="text-primary col-md-5" for="">Rôle</label> 
                <?php if (!empty($user->roles)): ?>
                    <?php foreach ($user->roles as $roles): ?>
                        <span class="col-md-10"><?= h($roles->profil->name) ?></span>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-5">
    <div class="card mb-2">
        <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" width="100%" height="250px" />
    </div>
</div>
<div class="col-md-12 mb-2">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Mes Campagnes
        </div>
        <div class="card-body">
        <?php if (!empty($user->campagnes)): ?>
            <table id="datatable" class="table table-striped table-bordered dt-responsive datatable" width="100%">
                <thead>
                <tr>
                    <th><?= __('Référence') ?></th>
                    <th><?= __('Nom Campagne') ?></th>
                    <th><?= __('Date de création') ?></th>
                    <th><?= __('Lien') ?></th>
                    <th><?= __('Statut') ?></th>
                    <th><?= __('Objectif') ?></th>
                    <th><?= __('Montant collecté') ?></th>
                    <th><?= __('Categorie') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>

                <tbody>
                    <?php foreach ($user->campagnes as $campagne):?>
                    <tr>
                        <td>REF-00<?= h($campagne->id) ?></td>
                        <td><?= h($campagne->name) ?></td>
                        <td><?= $campagne->created->nice('Europe/Paris','fr-Fr')?></td>
                        <td><?= h($campagne->lien) ?></td>
                        <td><?= $this->Statut->getStatut($campagne->status) ?></td>
                        <td><?= $this->Number->format($campagne->montant) ?> <span>XOF</span> </td>
                        <td></td>
                        <td><?= h($campagne->Categorys['name']) ?></td>
                        <td class="actions">
                            <a href="<?= $this->Url->Build(['controller'=>'Campagnes','action' => 'view', $campagne->id]) ?>" class="btn btn-sm btn-sm1 btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="<?= $this->Url->Build(['controller'=>'Campagnes','action' => 'edit', $campagne->id]) ?>" class="btn btn-sm btn-sm1 btn-info">
                                <i class="fas fa-edit"></i>
                            </a>
                            <?= $this->Form->postLink(__('<i class="fas fa-trash-alt "></i>'), ['controller'=>'Campagnes','action' => 'delete', $campagne->id], ['escape' => false, 'class' => 'btn btn-sm btn-sm1 btn-danger', 'confirm' => __('Voulez vous supprimer la campagne n° :  {0}?', $campagne->id)]) ?>
                    
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
    
            </table>
        <?php endif; ?>
        </div>
    </div>
</div>

<div class="users view large-9 medium-8 columns content" style="display:none">
    <div class="related">
        <h4><?= __('Related Campagnes') ?></h4>
        <?php if (!empty($user->campagnes)): ?>
        <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Desc Courte') ?></th>
                <th scope="col"><?= __('Desc Longue') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Lien') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('Montant') ?></th>
                <th scope="col"><?= __('Category Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($user->campagnes as $campagnes): ?>
            <tr>
                <td><?= h($campagnes->id) ?></td>
                <td><?= h($campagnes->name) ?></td>
                <td><?= h($campagnes->desc_courte) ?></td>
                <td><?= h($campagnes->desc_longue) ?></td>
                <td><?= h($campagnes->created) ?></td>
                <td><?= h($campagnes->lien) ?></td>
                <td><?= h($campagnes->status) ?></td>
                <td><?= h($campagnes->montant) ?></td>
                <td><?= h($campagnes->category_id) ?></td>
                <td><?= h($campagnes->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Campagnes', 'action' => 'view', $campagnes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Campagnes', 'action' => 'edit', $campagnes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Campagnes', 'action' => 'delete', $campagnes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $campagnes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>   
        </tbody>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Participants') ?></h4>
        <?php if (!empty($user->participants)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Fname') ?></th>
                <th scope="col"><?= __('Lname') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->participants as $participants): ?>
            <tr>
                <td><?= h($participants->id) ?></td>
                <td><?= h($participants->status) ?></td>
                <td><?= h($participants->user_id) ?></td>
                <td><?= h($participants->fname) ?></td>
                <td><?= h($participants->lname) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Participants', 'action' => 'view', $participants->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Participants', 'action' => 'edit', $participants->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Participants', 'action' => 'delete', $participants->id], ['confirm' => __('Are you sure you want to delete # {0}?', $participants->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">

    </div>
</div>

<?php $this->start('script'); ?>
<!-- Page le*vel plugins -->
<?= $this->Element('Admin/datatable') ?>
<?php $this->end(); ?>