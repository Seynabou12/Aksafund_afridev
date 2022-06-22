    <div class="col-md-12">
        <div class="d-sm-flex align-items-center justify-content-between mb-2 mt-2">
            <h1 class="h4 text-gray-800">
                <?= $this->fetch('title') ?>
            </h1>
            <a href="<?= $this->Url->build(['action'=>'add']) ?>" class="btn-sm btn-primary text-white">Ajouter une campagne<i class="fas fa-plus-circle ml-2"></i></a>
        </div>
    </div>
        
    <div class="col-md-12 page_body">
        <table id="datatable" class="table table-striped table-bordered dt-responsive" width="100%">
            <thead>
                <tr>
                    <th > Nom Campagne</th>
                    <th > Statut</th>
                    <th > Objectif</th>
                    <th > Catégorie</th>
                    <th > Autheur</th>

                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th > Nom Campagne</th>
                    <th > Statut</th>
                    <th > Objectif</th>
                    <th > Catégorie</th>
                    <th > Autheur</th>

                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </tfoot>
            <tbody>
                <?php foreach ($campagnes as $campagne): ?>
                <tr>
                    <td class="td_nowrap"><?= h($campagne->name) ?></td>
                    <td><?= $this->Statut->getStatut($campagne->status) ?></td>
                    <td><?= $this->Number->format($campagne->montant) ?> FCFA</td>
                    <td><?= $campagne->has('category') ? $this->Html->link($campagne->category->name, ['controller' => 'Categorys', 'action' => 'view', $campagne->category->id]) : '' ?></td>
                    <td><?= $campagne->has('user') ? $this->Html->link($campagne->user->nomComplet, [ 'action' => 'view', $campagne->user->id]) : '' ?></td>
                
                    <td class="actions">
                        <a href="<?= $this->Url->Build(['action' => 'view', $campagne->id]) ?>" title="Afficher" class="btn btn-sm btn-sm1 btn-primary">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= $this->Url->Build([ 'action' => 'edit', $campagne->id]) ?>" title="Editer" class="btn btn-sm btn-sm1 btn-info">
                            <i class="fas fa-edit"></i>
                        </a>
                        <?php if($campagne->status == 0 || $campagne->status == 3):?>
                            <?= $this->Form->postLink(__('<i class="fas fa-lock "></i>'), ['action' => 'delete', $campagne->id], ['title'=>"Activer  cette campagne",'escape' => false, 'class' => 'btn btn-sm btn-sm1 btn-danger', 'confirm' => __('Voulez vous activer la campagne n° :  {0}?', $campagne->id)]) ?>
                        <?php else:?>
                            <?= $this->Form->postLink(__('<i class="fas fa-unlock "></i>'), ['action' => 'delete', $campagne->id], ['title'=>"Désactiver  cette campagne",'escape' => false, 'class' => 'btn btn-sm btn-sm1 btn-danger', 'confirm' => __('Voulez vous désactiver la campagne n° :  {0}?', $campagne->id)]) ?>
                        <?php endif?>
                        
                        <?php if($campagne->status == 1):?>
                            <?= $this->Form->postLink(__('<i class="fas fa-trash-alt"></i>'), ['action' => 'cloturer', $campagne->id], ['title'=>"Voulez vous clôturer cette campagne",'escape' => false, 'class' => 'btn btn-sm btn-sm1 btn-danger', 'confirm' => __('Voulez vous clôturer la campagne n° :  {0}?', $campagne->id)]) ?>
                        <?php endif?>
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