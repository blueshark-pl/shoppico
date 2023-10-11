<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <ul class="filter-nav nav nav-tabs">
                <li class="nav-item nav-item-shoppico home-tab important-tab" rel="home">
                    <a href="#home" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                        <i class="fas fa-home"></i> <span class="d-none d-lg-inline"> <?= __('Home'); ?></span>
                    </a>
                </li>
                <li class="nav-item nav-item-shoppico pri-tab important-tab" rel="pri">
                    <a href="#profile" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="fas fa-certificate"></i> <span class="d-none d-lg-inline"> <?= __('Priority'); ?></span>
                    </a>
                </li>
                <li class="nav-item nav-item-shoppico fav-tab important-tab" rel="fav">
                    <a href="#settings" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="fas fa-heart"></i> <span class="d-none d-lg-inline">  <?= __('Favorite'); ?></span>
                    </a>
                </li>
                <li class="nav-item nav-item-shoppico trash-tab" rel="trash">
                    <a href="#trash" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                        <i class="fas fa-trash"></i> <span class="d-none d-lg-inline"> </span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                    <span class="d-none d-lg-inline">   
                        <?= __('My Filter Tabs'); ?>
                    </span>  
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down svg-icon"><polyline points="6 9 12 15 18 9"></polyline></svg></a>
                    <ul class="dropdown-menu">
                    <?php foreach($filters as $filter_id => $filter_title): ?>
                        <li class="nav-item nav-item-shoppico dynamic-tab" rel="<?= $filter_id; ?>">
                            <a href="#dynamic-<?= $filter_id; ?>" data-bs-toggle="tab" aria-expanded="false" class="dropdown-item">
                                <?= $filter_title; ?> <span class="badge text-bg-info notify-no"><?= $filterCounter[$filter_id]; ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </li>
            </ul>
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="home">
                            <?= $this->element('backend/filters/table', ['filter_id' => 'home', 'filterDetails' => $homeTabFilters]); ?>
                        </div>
                        <div class="tab-pane" id="profile">
                            <?= $this->element('backend/filters/table', ['filter_id' => 'pri']); ?>
                        </div>
                        <div class="tab-pane" id="settings">
                            <?= $this->element('backend/filters/table', ['filter_id' => 'fav']); ?>
                        </div>
                        <div class="tab-pane" id="trash">
                            <?= $this->element('backend/filters/table', ['filter_id' => 'trash']); ?>
                        </div>
                        <?php foreach($filters as $filter_id => $filter_title): ?>
                            <div class="tab-pane" id="dynamic-<?= $filter_id; ?>">
                                <?= $this->element('backend/filters/table', ['filter_id' => $filter_id]); ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>