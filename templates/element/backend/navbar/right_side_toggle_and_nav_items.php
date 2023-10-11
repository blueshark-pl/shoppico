<ul class="navbar-nav float-end">
    <li class="nav-item d-none d-md-block">
        <a class="nav-link" href="javascript:void(0)">
            <form>
                <div class="customize-input">
                    <input class="form-control custom-shadow border-0 bg-white"
                        type="search" placeholder="<?= __('Add new filter with AI'); ?>" aria-label="Search">
                    <i class="form-control-icon" data-feather="search"></i>
                </div>
            </form>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="https://robohash.org/<?= $this->request->getAttribute('identity')->id; ?>?set=set3" alt="user" class="rounded-circle" width="40">
            <span class="ms-2 d-none d-lg-inline-block"><span><?= __('Hello'); ?>, </span> 
            <?php 
                if($this->request->getAttribute('identity')->first_name) {
                    echo '<span class="text-dark">'.$this->request->getAttribute('identity')->first_name.' '.$this->request->getAttribute('identity')->last_name.'</span> ';
                }else{
                    echo __('Guest');
                }
            ?>
            <i data-feather="chevron-down" class="svg-icon"></i></span>
        </a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
        <a class="dropdown-item" href="<?= $this->Url->build(['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'profile']);?>">
                <i data-feather="user" class="svg-icon me-2 ms-1"></i><?= __('My Profile'); ?>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Questions', 'action' => 'add']);?>">
                <i data-feather="mail" class="svg-icon me-2 ms-1"></i><?= __('Report a problem'); ?>
            </a>
            <a class="dropdown-item" href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Questions', 'action' => 'index']);?>">
                <i data-feather="list" class="svg-icon me-2 ms-1"></i><?= __('My submissions'); ?>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= $this->Url->build(['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'logout']);?>">
                <i data-feather="power" class="svg-icon me-2 ms-1"></i><?= __('Logout'); ?>
            </a>
        </div>
    </li>
</ul>