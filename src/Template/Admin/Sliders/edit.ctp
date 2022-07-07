<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Slider $slicer
 */
    $this->assign('title', 'Modifier - Slider');
    $this->assign('edit', 'edition');
    $this->assign('action', $this->Url->build(['action' => 'edit', $slider->id]));
    $this->extend('/Cell/Admin/slider/ajout'); 

?>