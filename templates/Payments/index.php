<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Payment> $payments
 */
?>
<div class="payments index content">
    <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Payments') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('id_operation') ?></th>
                    <th><?= $this->Paginator->sort('filter_limit') ?></th>
                    <th><?= $this->Paginator->sort('month_limit') ?></th>
                    <th><?= $this->Paginator->sort('operation_number') ?></th>
                    <th><?= $this->Paginator->sort('operation_type') ?></th>
                    <th><?= $this->Paginator->sort('operation_status') ?></th>
                    <th><?= $this->Paginator->sort('operation_amount') ?></th>
                    <th><?= $this->Paginator->sort('operation_currency') ?></th>
                    <th><?= $this->Paginator->sort('operation_original_amount') ?></th>
                    <th><?= $this->Paginator->sort('operation_original_currency') ?></th>
                    <th><?= $this->Paginator->sort('operation_datetime') ?></th>
                    <th><?= $this->Paginator->sort('orderId') ?></th>
                    <th><?= $this->Paginator->sort('control') ?></th>
                    <th><?= $this->Paginator->sort('description') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('p_email') ?></th>
                    <th><?= $this->Paginator->sort('is_mail_campain') ?></th>
                    <th><?= $this->Paginator->sort('channel') ?></th>
                    <th><?= $this->Paginator->sort('signature') ?></th>
                    <th><?= $this->Paginator->sort('invoice_id') ?></th>
                    <th><?= $this->Paginator->sort('is_verify') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($payments as $payment): ?>
                <tr>
                    <td><?= h($payment->id) ?></td>
                    <td><?= $payment->has('user') ? $this->Html->link($payment->user->id, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?></td>
                    <td><?= h($payment->id_operation) ?></td>
                    <td><?= $this->Number->format($payment->filter_limit) ?></td>
                    <td><?= $this->Number->format($payment->month_limit) ?></td>
                    <td><?= h($payment->operation_number) ?></td>
                    <td><?= h($payment->operation_type) ?></td>
                    <td><?= h($payment->operation_status) ?></td>
                    <td><?= $this->Number->format($payment->operation_amount) ?></td>
                    <td><?= h($payment->operation_currency) ?></td>
                    <td><?= $this->Number->format($payment->operation_original_amount) ?></td>
                    <td><?= h($payment->operation_original_currency) ?></td>
                    <td><?= h($payment->operation_datetime) ?></td>
                    <td><?= $payment->orderId === null ? '' : $this->Number->format($payment->orderId) ?></td>
                    <td><?= h($payment->control) ?></td>
                    <td><?= h($payment->description) ?></td>
                    <td><?= h($payment->email) ?></td>
                    <td><?= h($payment->p_email) ?></td>
                    <td><?= $payment->is_mail_campain === null ? '' : $this->Number->format($payment->is_mail_campain) ?></td>
                    <td><?= $payment->channel === null ? '' : $this->Number->format($payment->channel) ?></td>
                    <td><?= h($payment->signature) ?></td>
                    <td><?= $payment->invoice_id === null ? '' : $this->Number->format($payment->invoice_id) ?></td>
                    <td><?= $payment->is_verify === null ? '' : $this->Number->format($payment->is_verify) ?></td>
                    <td><?= h($payment->created) ?></td>
                    <td><?= h($payment->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $payment->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $payment->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id)]) ?>
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
