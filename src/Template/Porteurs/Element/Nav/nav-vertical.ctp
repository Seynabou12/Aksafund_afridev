<style>
.test{
  color: red !important;
  background: #f8f8f8;
  border-right: 3px solid #337ab7 !important;
  height: 53.5px !important;
}
li .test li a{
    color: #fff !important
}
</style>
<div class="panel-group" id="accordion">
    <div class="panel panel-default">
        
        <div class="panel-heading">
            <h4 class="panel-title active">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                <i class="fas fa-list"></i>
                </span>Dashbord</a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-pencil text-primary"></span><a href="http://www.jquery2dotnet.com">Articles</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-flash text-success"></span><a href="http://www.jquery2dotnet.com">News</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-file text-info"></span><a href="http://www.jquery2dotnet.com">Newsletters</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-comment text-success"></span><a href="http://www.jquery2dotnet.com">Comments</a>
                            <span class="badge">42</span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                <i class="fa fa-paper-plane"></i>
                </span>Campagnes</a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Orders</a> <span class="label label-success">$ 320</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Invoices</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Shipments</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Tex</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                <i class="fa fa-bullhorn"></i>
                </span>Participations</a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Change Password</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Notifications</a> <span class="label label-info">5</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href="http://www.jquery2dotnet.com">Import/Export</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-trash text-danger"></span><a href="http://www.jquery2dotnet.com" class="text-danger">
                                Delete Account</a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                <i class=" fa fa-users"></i>
                </span>Utilisateurs
                <!-- <i class="fa fa-chevron-right icone"></i> -->
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                <table class="table">
                    <tr>
                        <td>
                            <span class=""></span><a href="<?= $this->Url->Build(['controller'=>'Users','action'=>'index']) ?>">Liste</a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="glyphicon glyphicon-usd"></span><a href="<?= $this->Url->Build(['controller'=>'Roles','action'=>'add']) ?>">Rôles</a>
                        </td>
                    </tr>

                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- <nav class="navbar navbar-default menu" >
    <ul class="nav nav-pills nav-stacked">
        <li role="presentation" class="direction" ><a href="<?=$this->Url->Build('/dashbord')?>"><i class="fas fa-th-list"></i>  Tableau de bord</a></li>
        <li role="presentation" class="direction" ><a href="<?=$this->Url->Build('/direction')?>"><i class="fas fa-tachometer-alt"></i>  Directions</a></li>
        <li role="presentation" class="service" ><a href="<?=$this->Url->Build('/service')?>"><i class="fas fa-users-cog"></i>   Services</a></li>
        <li role="presentation" class="collaborateurs" ><a href="<?=$this->Url->Build('/collaborateurs')?>"><i class="fas fa-users"></i>  Collaborateurs</a></li>
     </ul>
</nav> -->
<?php
$this->Html->css([
    // "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css",
    // "https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css",
  ],
  ['block' => 'css']);

$this->Html->script([
    // "https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js",
    // "https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js",
],
['block' => 'script']);
?>
<?php $this->start('script'); ?>

<script>
$("document").ready(function(){
$(function() {
    $('.'+url+'').removeClass('test');
    var url = location.pathname.split("/")[location.pathname.split("/").length-1];
    // $('.cssmenu a[href="' + location.pathname.split("/")[location.pathname.split("/").length-1] + '"]').parent().addClass('test');
    $('.'+url+'').addClass('test');
});

});
$(document).ready(function() {

    // $('.current').click(function(){
    //     alert(this.id);
    //     $('.card-header .btn').removeClass('btn-success').addClass('btn-warning');
    //     $('#'+this.id+'').addClass('selected');
    // })
} );

</script>
<?php $this->end(); ?>
