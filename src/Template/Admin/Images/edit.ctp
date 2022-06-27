<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Image $image
 */
    $this->assign('title', 'Modifier - Image');
    $this->assign('edit', 'edition');
    $this->assign('action', $this->Url->build(['action' => 'edit', $image->id]));
    $this->extend('/Cell/Admin/image/ajout'); 

?>