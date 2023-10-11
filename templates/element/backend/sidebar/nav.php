<nav class="sidebar-nav">
    <ul id="sidebarnav">
        <li class="sidebar-item"> 
            <a class="sidebar-link sidebar-link" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#new-filter-modal" aria-expanded="false">
                <i data-feather="link" class="feather-icon"></i>
                <span class="hide-menu"><?= __('Add a new filter'); ?></span>
            </a>
        </li>
        <li class="sidebar-item"> 
            <a class="sidebar-link sidebar-link" href="javascript:void(0)" data-bs-toggle="modal"
                                        data-bs-target="#manage-filter-modal"  aria-expanded="false">
                <i data-feather="shuffle" class="feather-icon"></i>
                <span class="hide-menu"><?= __('Manage filters'); ?></span>
            </a>
        </li>
        <li class="sidebar-item"> 
            <a class="sidebar-link sidebar-link" href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Filters', 'action' => 'index']);?>" >
                <i data-feather="list" class="feather-icon"></i>
                <span class="hide-menu"><?= __('My searches'); ?></span>
            </a>
        </li>
        <li class="list-divider"></li>
        <li class="sidebar-item"> 
            <a class="sidebar-link" href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Pages', 'action' => 'faq']);?>" aria-expanded="false"><i data-feather="info" class="feather-icon"></i>
                <span class="hide-menu"><?= __('FAQ'); ?> </span>
            </a>
        </li>
        <li class="sidebar-item">
            <a class="sidebar-link sidebar-link" href="<?= $this->Url->build(['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout']);?>"
                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                    class="hide-menu"><?= __('Logout'); ?></span>
            </a>
        </li>
    </ul>
</nav>