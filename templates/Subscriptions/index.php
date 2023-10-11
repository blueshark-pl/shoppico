<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-4">
                        <h4 class="card-title"><?= __('Subscriptions'); ?></h4>
                   
                        <div class="ms-auto">
                            <div class="dropdown sub-dropdown">
                                <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1" style="">
                                    <?= $this->Html->link(__('New Subscription'), ['action' => 'add'], ['class' => 'dropdown-item']) ?>
                                </div>
                            </div>
                        </div>      
                    </div>
                    <h6 class="card-subtitle"><?= __("The <code>Subscriptions</code> table enables effective storage, management and analysis of subscription data, allowing access to relevant information about users' subscriptions."); ?></h6>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th><?= $this->Paginator->sort('id', __('#')) ?></th>
                                    <th><?= $this->Paginator->sort('name', __('Name')) ?></th>
                                    <th><?= $this->Paginator->sort('netto', __('Costs')) ?></th>
                                    <th><?= $this->Paginator->sort('months', __('Months')) ?></th>
                                    <th><?= $this->Paginator->sort('filters_max', __('Filters Max')) ?></th>
                                    <th><?= $this->Paginator->sort('active', __('Status')) ?></th>
                                    <th><?= $this->Paginator->sort('discount') ?></th>
                                    <th class="actions"><?= __('Actions') ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($subscriptions as $k => $subscription): ?>
                                <tr>
                                    <td><?= h($k+1) ?>.</td>
                                    <td><?= h($subscription->name) ?></td>
                                    <td>
                                        <div class="text-dark mb-0">
                                            <?= $this->Number->format($subscription->netto, ['places' => 2, 'after' => ' zł']) ?>
                                        </div>       
                                        <span class="text-muted font-14"><?= __('with {0}% tax:', $this->Number->format($subscription->vat)) ?> <?= $this->Number->format($subscription->brutto, ['places' => 2, 'after' => ' zł']) ?></span>
                                    </td>
                                    <td><?= $this->Number->format($subscription->months) ?></td>
                                    <td><?= $this->Number->format($subscription->filters_max) ?></td>
                                    <td><?= h($subscription->active == 1)? '<span class="badge badge-success">'.__('Active').'</span>': '<span class="badge badge-danger">'.__('Unactive').'</span>' ?></td>
                                    <td><?= ($this->Number->format($subscription->discount) == 0)? '<span class="badge badge-secondary">'.__('No Discout').'</span>': '<span class="badge badge-info">'.($this->Number->format($subscription->discount, ['after' => ' %'])).'</span>' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $subscription->id], ['class' => 'btn btn-info', 'escape' => false]) ?>
                                        <?= $this->Form->postLink('<i class="fa fa-trash"></i>', ['action' => 'delete', $subscription->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => __('Are you sure you want to delete # {0}?', $subscription->id)]) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <?= $this->element('backend/pagination'); ?>
                </div>
            </div>
        </div>
    </div>
</div>