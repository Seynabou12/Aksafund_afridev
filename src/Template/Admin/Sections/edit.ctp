<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Section $section
 */
    $this->assign('title', 'Modifier - Section');
    $this->assign('edit', 'edition');
    $this->assign('action', $this->Url->build(['action' => 'edit', $section->id]));
    $this->extend('/Cell/Admin/section/ajout'); 

?>