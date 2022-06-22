<?php

use Cake\Routing\Router;

$current = Router::normalize($this->request->getAttribute('here'));
// dd(explode("/",$current));
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" style="position: relative" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand bg-white" href="/" style="height: auto">
      <img src="<?= $this->Url->image("logo.png") ?>" style="max-width: 80%">
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  <?php if (isset($_sidebar)) : ?>
    <?php foreach ($_sidebar->principals as $key => $header) : ?>
      <li class="nav-item <?= $current == Router::normalize($this->Url->Build(['controller' => $header->controller, 'action' => $header->action])) || ($current == "/" && $key == 0) ? 'active' : '' ?>">
        <a class="nav-link" href="<?= $this->Url->Build(['controller' => $header->controller, 'action' => $header->action]) ?>">
          <i class="fas fa-fw <?= $header->fa ?>"></i>
          <span><?= $header->name ?></span></a>
      </li>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
    <?php endforeach; ?>

    <?php foreach ($_sidebar->secondaires as $key => $second) : ?>
      <!-- Nav Item - Utilities Collapse Menu -->
      <?php if (isset($second->items) && count($second->items) > 0) : ?>
        <li class="nav-item <?= in_array(explode('/', $current)[2], $second->refs) ? "active" : '' ?>">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse<?= $key ?>" aria-expanded="true" aria-controls="collapse<?= $key ?>">
          <?php else : ?>
        <li class="nav-item <?= $current == $this->Url->Build(['controller' => $second->controller, 'action' => $second->action]) ? "active" : '' ?>">
          <a class="nav-link collapsed" href="<?= $this->Url->Build(['controller' => $second->controller, 'action' => $second->action]) ?>">
          <?php endif; ?>
          <i class="fas fa-fw <?= $second->fa ?>"></i>
          <span><?= $second->name ?></span>
          </a>
          <?php if (isset($second->items) && count($second->items) > 0) : ?>
            <div id="collapse<?= $key ?>" class="collapse" aria-labelledby="heading<?= $key ?>" data-parent="#accordionSidebar">
              <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header"><?= $second->header ?></h6>
                <?php foreach ($second->items as $item) : if(isset($item->params)): ?>
                  <a class="collapse-item" href="<?= $this->Url->Build(['controller' => $item->controller, 'action' => $item->action, '?' => $item->params]) ?>"><?= $item->name ?></a>
                  <?php else : ?>
                    <a class="collapse-item" href="<?= $this->Url->Build(['controller' => $item->controller, 'action' => $item->action]) ?>"><?= $item->name ?></a>
                  <?php endif; endforeach; ?>
              </div>
            </div>
          <?php endif; ?>
        </li>
      <?php endforeach; ?>
    <?php endif; ?>
    <!-- Divider -->
    <hr class="sidebar-divider mb-3">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>