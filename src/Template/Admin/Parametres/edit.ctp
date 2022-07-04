<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Parametre $parametre
 */
    $this->assign('title', 'Modifier - Parametre');
    $this->assign('edit', 'edition');
    $this->assign('action', $this->Url->build(['action' => 'edit', $parametre->id]));
    $this->extend('/Cell/Admin/parametre/ajout'); 

?>