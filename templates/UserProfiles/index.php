<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\UserProfile> $userProfiles
 */
?>
<div class="userProfiles index content">
    <?= $this->Html->link(__('New User Profile'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('User Profiles') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('company_name') ?></th>
                    <th><?= $this->Paginator->sort('nip') ?></th>
                    <th><?= $this->Paginator->sort('regon') ?></th>
                    <th><?= $this->Paginator->sort('postal_code') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('street') ?></th>
                    <th><?= $this->Paginator->sort('local_number') ?></th>
                    <th><?= $this->Paginator->sort('phone') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userProfiles as $userProfile): ?>
                <tr>
                    <td><?= h($userProfile->id) ?></td>
                    <td><?= $userProfile->has('user') ? $this->Html->link($userProfile->user->id, ['controller' => 'Users', 'action' => 'view', $userProfile->user->id]) : '' ?></td>
                    <td><?= h($userProfile->company_name) ?></td>
                    <td><?= h($userProfile->nip) ?></td>
                    <td><?= h($userProfile->regon) ?></td>
                    <td><?= h($userProfile->postal_code) ?></td>
                    <td><?= h($userProfile->city) ?></td>
                    <td><?= h($userProfile->street) ?></td>
                    <td><?= $userProfile->local_number === null ? '' : $this->Number->format($userProfile->local_number) ?></td>
                    <td><?= h($userProfile->phone) ?></td>
                    <td><?= h($userProfile->created) ?></td>
                    <td><?= h($userProfile->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $userProfile->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userProfile->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userProfile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userProfile->id)]) ?>
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
