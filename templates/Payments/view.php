<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payments view content">
            <h3><?= h($payment->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($payment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $payment->has('user') ? $this->Html->link($payment->user->id, ['controller' => 'Users', 'action' => 'view', $payment->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Operation') ?></th>
                    <td><?= h($payment->id_operation) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operation Number') ?></th>
                    <td><?= h($payment->operation_number) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operation Type') ?></th>
                    <td><?= h($payment->operation_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operation Status') ?></th>
                    <td><?= h($payment->operation_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operation Currency') ?></th>
                    <td><?= h($payment->operation_currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operation Original Currency') ?></th>
                    <td><?= h($payment->operation_original_currency) ?></td>
                </tr>
                <tr>
                    <th><?= __('Control') ?></th>
                    <td><?= h($payment->control) ?></td>
                </tr>
                <tr>
                    <th><?= __('Description') ?></th>
                    <td><?= h($payment->description) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($payment->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('P Email') ?></th>
                    <td><?= h($payment->p_email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Signature') ?></th>
                    <td><?= h($payment->signature) ?></td>
                </tr>
                <tr>
                    <th><?= __('Filter Limit') ?></th>
                    <td><?= $this->Number->format($payment->filter_limit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Month Limit') ?></th>
                    <td><?= $this->Number->format($payment->month_limit) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operation Amount') ?></th>
                    <td><?= $this->Number->format($payment->operation_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operation Original Amount') ?></th>
                    <td><?= $this->Number->format($payment->operation_original_amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('OrderId') ?></th>
                    <td><?= $payment->orderId === null ? '' : $this->Number->format($payment->orderId) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Mail Campain') ?></th>
                    <td><?= $payment->is_mail_campain === null ? '' : $this->Number->format($payment->is_mail_campain) ?></td>
                </tr>
                <tr>
                    <th><?= __('Channel') ?></th>
                    <td><?= $payment->channel === null ? '' : $this->Number->format($payment->channel) ?></td>
                </tr>
                <tr>
                    <th><?= __('Invoice Id') ?></th>
                    <td><?= $payment->invoice_id === null ? '' : $this->Number->format($payment->invoice_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Is Verify') ?></th>
                    <td><?= $payment->is_verify === null ? '' : $this->Number->format($payment->is_verify) ?></td>
                </tr>
                <tr>
                    <th><?= __('Operation Datetime') ?></th>
                    <td><?= h($payment->operation_datetime) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($payment->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($payment->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('P Info') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($payment->p_info)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
