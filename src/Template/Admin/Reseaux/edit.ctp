<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Reseau $reseau
 */
    $this->assign('title', 'Modifier - Reseau');
    $this->assign('edit', 'edition');
    $this->assign('action', $this->Url->build(['action' => 'edit', $reseau->id]));
    $this->extend('/Cell/Admin/reseau/ajout'); 

?>