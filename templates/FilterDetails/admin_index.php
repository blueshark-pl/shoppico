<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\FilterDetail> $filterDetails
 */
?>
<div class="filterDetails index content">
    <?= $this->Html->link(__('New Filter Detail'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Filter Details') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('filter_id') ?></th>
                    <th><?= $this->Paginator->sort('ad_id_out') ?></th>
                    <th><?= $this->Paginator->sort('ad_title') ?></th>
                    <th><?= $this->Paginator->sort('ad_price') ?></th>
                    <th><?= $this->Paginator->sort('ad_city') ?></th>
                    <th><?= $this->Paginator->sort('ad_featured') ?></th>
                    <th><?= $this->Paginator->sort('favourite') ?></th>
                    <th><?= $this->Paginator->sort('removed') ?></th>
                    <th><?= $this->Paginator->sort('view_status') ?></th>
                    <th><?= $this->Paginator->sort('notification_status') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filterDetails as $filterDetail): ?>
                <tr>
                    <td><?= $this->Number->format($filterDetail->id) ?></td>
                    <td><?= $filterDetail->has('filter') ? $this->Html->link($filterDetail->filter->title, ['controller' => 'Filters', 'action' => 'view', $filterDetail->filter->id]) : '' ?></td>
                    <td><?= h($filterDetail->ad_id_out) ?></td>
                    <td><?= h($filterDetail->ad_title) ?></td>
                    <td><?= $this->Number->format($filterDetail->ad_price) ?></td>
                    <td><?= h($filterDetail->ad_city) ?></td>
                    <td><?= h($filterDetail->ad_featured) ?></td>
                    <td><?= $this->Number->format($filterDetail->favourite) ?></td>
                    <td><?= $this->Number->format($filterDetail->removed) ?></td>
                    <td><?= $this->Number->format($filterDetail->view_status) ?></td>
                    <td><?= $this->Number->format($filterDetail->notification_status) ?></td>
                    <td><?= h($filterDetail->created) ?></td>
                    <td><?= h($filterDetail->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filterDetail->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filterDetail->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filterDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filterDetail->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
