<?= $this->Html->css('custom.css') ?>

<div class="row p-2 m-2">
    <div class="col-md-8">
        <div class="card-presentation mb-2">
            <div class="h5 h-title bg-white">
                <?= $campagne->name; ?>
                <div class="shadowTop"></div>
            </div> 
            <div class="card card-orange bg-orange campagne">
                <div class="card-body">
                    <h3 class="h5 text-white font-weight-600">Présentation</h3> 
                    <p class="paragraphe paragraphe1"><?= $campagne->desc_courte; ?></p>
                    <label class="ml-0 mr-auto text-white"> <i class="fa fa-tags"></i> <?= $campagne->category->name; ?><br>
                    <?php if($campagne->lien): echo '<a class="text-white" href="'.$campagne->lien.'"> Visitez notre site web: '.$campagne->lien.'</a>'; endif; ?></label>
                    <label class="float-right text-white"><?= $campagne->created->nice('Europe/Paris','fr-Fr'); ?></label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card  bg-bleu">
            <div class="card-body">
                <div class="paragraphe text-white">
                    <h4 class="h6 libelle">SOMME COLLECTÉE</h4>
                    <h3 class="font-weight-600 montant"><?php $somme=0; foreach($contributions as $contribution) {$somme += $contribution->montant;} echo $this->Number->format($somme,['locale'=>'fr_FR','after'=>' FCFA']);?></h1>
                    <h4 class="h6 libelle">OBJECTIF</h4>
                    <h3 class="font-weight-600 montant"><?= $this->Number->format($campagne->montant ,['locale'=>'fr_FR','after'=>' FCFA'])?></h1>
                </div>
                <div class="col-md-12 text-center">
                    <a href="<?= $this->Url->Build(['action'=>'contribution',$campagne->id])?>" id="soutenir" class="btn btn-sm bg-white text-orange font-weight-bold"> soutenir cette campagne</a>
                </div>
                <div class="col-md-12 text-white text-center">
                <span class="f12">ou appeler le </span>  <br> 
                <span class="font-weight-bold">77 462 33 52</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row p-2 m-2">
    <div class="col-md-12">
        <h3 class="h6 text-orange">Liste des contributions</h3> 
    </div>
    <div class="col-md-12 mb-5">
        <div class="">
            <table class="table table-bordered table-sm table-striped" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="bg-color-sidebar">
                        <th>N°</th>
                        <th>Prénom & Nom</th>
                        <th>Téléphone</th>
                        <th>Date</th>
                        <th>Montant</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i =1; foreach($contributions as $contribution):
                        ?>
                    <tr>  
                        <td><?=$i; ?></td>
                        <td><?php if($contribution->anonyme != 1){
                            echo h($contribution->prenom." ".$contribution->nom); 
                        }else{ echo "Anonyme";}  ?></td>
                        <td><?php if($contribution->anonyme != 1){ echo h($contribution->telephone); }else{ echo "Anonyme";} ?></td>
                        <td><?= $contribution->created->nice('Europe/Paris','fr-Fr'); ?></td>
                        <td><?= $this->Number->format($contribution->montant,['locale'=>'fr_FR','after'=>' FCFA']) ?></td>

                    </tr>
                    <?php $i++; endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>


<?= $this->Html->script('admin/vendor/datatables/jquery.dataTables.min.js');?>
<?= $this->Html->script('admin/vendor/datatables/dataTables.bootstrap4.min.js');?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTable').DataTable( {
            "paging": true,
            "pageLength": 10,
            "info": false,
            "lengthChange": false,
            "ordering": true,
            "searching": true,
            "language": {
                "lengthMenu": "&nbsp; Afficher _MENU_ par page &nbsp;",
                "zeroRecords": "Pas d'enregistrement trouvé !",
                "info": "Page _PAGE_ sur _PAGES_",
                "infoEmpty": "Pas d'enregistrement disponible",
                "infoFiltered": "(filtrés sur _MAX_ enregistrements)",
                "search":         "Recherche",
                "scrollX": true,
                "paginate": {
                    "first":      "<<",
                    "last":       ">>",
                    "next":       ">",
                    "previous":   "<"
                }
            }
        });
    });
</script>