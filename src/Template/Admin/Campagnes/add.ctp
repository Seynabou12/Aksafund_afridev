<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campagne $campagne
 */
$this->assign('title', 'Ajout - Nouvelle campagne');
    $this->assign('view', 'action');
    $this->assign('action', $this->Url->build(['action' => 'add']));
    $this->extend('/Cell/Admin/campagne/ajout'); ?>
?>

