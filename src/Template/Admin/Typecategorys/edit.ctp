<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Typecategory $typecategory
 */
    $this->assign('title', 'Modifier - Type');
    $this->assign('edit', 'edition');
    $this->assign('action', $this->Url->build(['action' => 'edit', $typecategory->id]));
    $this->extend('/Cell/Admin/type/ajout'); ?>
?>

