<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filter $filter
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Filter'), ['action' => 'edit', $filter->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Filter'), ['action' => 'delete', $filter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filter->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Filters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Filter'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filters view content">
            <h3><?= h($filter->title) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $filter->has('user') ? $this->Html->link($filter->user->id, ['controller' => 'Users', 'action' => 'view', $filter->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Title') ?></th>
                    <td><?= h($filter->title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($filter->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notification') ?></th>
                    <td><?= $this->Number->format($filter->notification) ?></td>
                </tr>
                <tr>
                    <th><?= __('Removed') ?></th>
                    <td><?= $this->Number->format($filter->removed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($filter->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Priority') ?></th>
                    <td><?= $this->Number->format($filter->priority) ?></td>
                </tr>
                <tr>
                    <th><?= __('Private Tab') ?></th>
                    <td><?= $this->Number->format($filter->private_tab) ?></td>
                </tr>
                <tr>
                    <th><?= __('Interval') ?></th>
                    <td><?= $this->Number->format($filter->interval) ?></td>
                </tr>
                <tr>
                    <th><?= __('Last Update') ?></th>
                    <td><?= h($filter->last_update) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($filter->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($filter->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Link') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($filter->link)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Filter Details') ?></h4>
                <?php if (!empty($filter->filter_details)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Filter Id') ?></th>
                            <th><?= __('Ad Id Out') ?></th>
                            <th><?= __('Ad Img') ?></th>
                            <th><?= __('Ad Title') ?></th>
                            <th><?= __('Ad Link') ?></th>
                            <th><?= __('Ad Price') ?></th>
                            <th><?= __('Ad City') ?></th>
                            <th><?= __('Ad Pro') ?></th>
                            <th><?= __('Ad Featured') ?></th>
                            <th><?= __('Favourite') ?></th>
                            <th><?= __('Removed') ?></th>
                            <th><?= __('View Status') ?></th>
                            <th><?= __('Notification Status') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($filter->filter_details as $filterDetails) : ?>
                        <tr>
                            <td><?= h($filterDetails->id) ?></td>
                            <td><?= h($filterDetails->filter_id) ?></td>
                            <td><?= h($filterDetails->ad_id_out) ?></td>
                            <td><?= h($filterDetails->ad_img) ?></td>
                            <td><?= h($filterDetails->ad_title) ?></td>
                            <td><?= h($filterDetails->ad_link) ?></td>
                            <td><?= h($filterDetails->ad_price) ?></td>
                            <td><?= h($filterDetails->ad_city) ?></td>
                            <td><?= h($filterDetails->ad_pro) ?></td>
                            <td><?= h($filterDetails->ad_featured) ?></td>
                            <td><?= h($filterDetails->favourite) ?></td>
                            <td><?= h($filterDetails->removed) ?></td>
                            <td><?= h($filterDetails->view_status) ?></td>
                            <td><?= h($filterDetails->notification_status) ?></td>
                            <td><?= h($filterDetails->created) ?></td>
                            <td><?= h($filterDetails->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'FilterDetails', 'action' => 'view', $filterDetails->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'FilterDetails', 'action' => 'edit', $filterDetails->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'FilterDetails', 'action' => 'delete', $filterDetails->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filterDetails->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
