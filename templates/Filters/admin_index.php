<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Filter> $filters
 */
?>
<div class="filters index content">
    <?= $this->Html->link(__('New Filter'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Filters') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('title') ?></th>
                    <th><?= $this->Paginator->sort('notification') ?></th>
                    <th><?= $this->Paginator->sort('removed') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('priority') ?></th>
                    <th><?= $this->Paginator->sort('private_tab') ?></th>
                    <th><?= $this->Paginator->sort('interval') ?></th>
                    <th><?= $this->Paginator->sort('last_update') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filters as $filter): ?>
                <tr>
                    <td><?= $this->Number->format($filter->id) ?></td>
                    <td><?= $filter->has('user') ? $this->Html->link($filter->user->id, ['controller' => 'Users', 'action' => 'view', $filter->user->id]) : '' ?></td>
                    <td><?= h($filter->title) ?></td>
                    <td><?= $this->Number->format($filter->notification) ?></td>
                    <td><?= $this->Number->format($filter->removed) ?></td>
                    <td><?= $this->Number->format($filter->status) ?></td>
                    <td><?= $this->Number->format($filter->priority) ?></td>
                    <td><?= $this->Number->format($filter->private_tab) ?></td>
                    <td><?= $this->Number->format($filter->interval) ?></td>
                    <td><?= h($filter->last_update) ?></td>
                    <td><?= h($filter->created) ?></td>
                    <td><?= h($filter->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $filter->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $filter->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $filter->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filter->id)]) ?>
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
