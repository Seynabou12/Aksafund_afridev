<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Campagne $campagne
 */
$this->assign('title', 'Modifier - campagne');
$this->assign('edit', 'edition');
$this->assign('action', $this->Url->build(['action' => 'edit', $campagne->id]));
$this->extend('/Cell/Porteurs/campagne/ajout'); ?>
?>

