<div class="col-md-12 page_body">
    <table id="datatable" class="table table-striped table-bordered dt-responsive" width="100%">
        <thead>
            <tr>
                <th > ID</th>
                <th > Participant</th>
                <th > Campagne</th>
                <th > Objectif</th>
                <th > Montant</th>
                <th > Etat Paiment</th>
                <th > Statut</th>
                <!-- <th >Actions</th> -->
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th > ID</th>
                <th > Participant</th>
                <th > Campagne</th>
                <th > Objectif</th>
                <th > Montant</th>
                <th > Etat Paiment</th>
                <th > Statut</th>
                <!-- <th >Actions</th> -->
            </tr>
        </tfoot>
        <tbody>
        <?php $i=0; foreach ($participations as $participation): $i++;?>
            <tr>
                <td><?=$i ?></td>
                <td><?php if($participation->anonyme == 0){
                    echo $this->Statut->getAnonyme($participation->anonyme );
                } else{ echo 
                    $participation->has('participant') ? $this->Html->link($participation->participant->fname.' '.$participation->participant->lname,
                     ['controller' => 'Participants', 'action' => 'view', $participation->participant->id]) : '';} ?></td>
                <td><?= $participation->has('campagne') ? $this->Html->link($participation->campagne->name, ['controller' => 'Campagnes', 'action' => 'view', $participation->campagne->id]) : '' ?></td>
                <td><?= $participation->has('campagne') ? $this->Html->link($this->Number->format($participation->campagne->montant).' FCFA', ['controller' => 'Campagnes', 'action' => 'view', $participation->campagne->id]) : '' ?></td>
                <td><?= $this->Number->format($participation->montant) ?> FCFA</td>
                <td><?= h($participation->etatpaiement) ?></td>
                <td><?= $this->Statut->getStatut($participation->status) ?></td>
                
                    <!--<td class="actions"> <a href="<?= $this->Url->Build([ 'action' => 'view', $participation->id]) ?>" class="btn btn-sm btn-sm1 btn-primary">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= $this->Url->Build(['action' => 'edit', $participation->id]) ?>" class="btn btn-sm btn-sm1 btn-info">
                        <i class="fas fa-edit"></i>
                    </a> -->
                    <!--</td> <?= $this->Form->postLink(__('<i class="fas fa-trash-alt "></i>'), ['action' => 'delete', $participation->id], ['escape' => false, 'class' => 'btn btn-sm btn-sm1 btn-danger', 'confirm' => __('Voulez vous supprimer la participation n° :  {0}?', $participation->id)]) ?> -->
                
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>