<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->assign('title', 'Modifier -  utilisateur');
$this->assign('action', $this->Url->build(['action' => 'edit',$user->id]));
$this->assign('edit', 'action');
$this->extend('/Cell/Admin/user/ajout'); ?>
?>

