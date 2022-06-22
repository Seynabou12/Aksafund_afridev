<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Theme $theme
 */
    $this->assign('title', 'Modifier - Theme');
    $this->assign('edit', 'edition');
    $this->assign('action', $this->Url->build(['action' => 'edit', $theme->idTheme]));
    $this->extend('/Cell/Admin/theme/ajout'); 

?>