<?php
use Cake\Core\Configure;
use Cake\Error\Debugger;

$this->layout = false;

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.ctp');

    $this->start('file');
?>
<?php if (!empty($error->queryString)) : ?>
    <p class="notice">
        <strong>SQL Query: </strong>
        <?= h($error->queryString) ?>
    </p>
<?php endif; ?>
<?php if (!empty($error->params)) : ?>
        <strong>SQL Query Params: </strong>
        <?php Debugger::dump($error->params) ?>
<?php endif; ?>
<?= $this->element('auto_table_warning') ?>
<?php
if (extension_loaded('xdebug')) :
    xdebug_print_function_stack();
endif;

$this->end();
endif;
?>
<!-- <h2><?= h($message) ?></h2>
<p class="error">
    <strong><?= __d('cake', 'Error') ?>: </strong>
    <?= __d('cake', 'The requested address {0} was not found on this server.', "<strong>'{$url}'</strong>") ?>
</p> -->
<div class="col-md-12 " style="text-align:center;padding-top:100px">
    <div class="row">
        
        <a class="" href="<?= $this->Url->Build('/')?>">
            <?= $this->Html->image("logo.png", ['style' => 'width:200px']) ?>
        </a>
        <h3 style="text-align:center"><i class="fas fa-exclamation-triangle"></i></h3>
        <div class="jumbotron" style="text-align: center;background:#fff !important">
            <h2>Page non trouvée</h2>
            <p>Retourner <i class="fa fa-arrow-right"></i>  <a href="<?= $this->Url->Build('/') ?>">à la page d'accueil</a></p>
        </div>
    </div>
</div>