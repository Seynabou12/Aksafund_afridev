    <!-- Page le*vel plugins -->
    <?= $this->Html->script('admin/vendor/datatables/jquery.dataTables.min.js');?>
    <?= $this->Html->script('admin/vendor/datatables/dataTables.bootstrap4.min.js');?>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#datatable, .critere-table').DataTable( {
            "language": {
                "lengthMenu": "Affiche _MENU_ enregistrement(s) par page",
                "zeroRecords": "Aucune données - désolé",
                "info": "affichage page _PAGE_ sur _PAGES_",
                "infoEmpty": "Pas de données trouvée",
                "infoFiltered": "(filtered from _MAX_ total records)",
                "paginate": {
                    "previous": "Précédent",
                    "next": "Suivant",
                    "first": "Première",
                    "last": "Dernière"
                }
            },
        } );
    } );
    </script>