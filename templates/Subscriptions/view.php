<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Subscription $subscription
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Subscription'), ['action' => 'edit', $subscription->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Subscription'), ['action' => 'delete', $subscription->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Subscriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Subscription'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="subscriptions view content">
            <h3><?= h($subscription->name) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= h($subscription->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Name') ?></th>
                    <td><?= h($subscription->name) ?></td>
                </tr>
                <tr>
                    <th><?= __('Netto') ?></th>
                    <td><?= $this->Number->format($subscription->netto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Brutto') ?></th>
                    <td><?= $this->Number->format($subscription->brutto) ?></td>
                </tr>
                <tr>
                    <th><?= __('Vat') ?></th>
                    <td><?= $this->Number->format($subscription->vat) ?></td>
                </tr>
                <tr>
                    <th><?= __('Months') ?></th>
                    <td><?= $this->Number->format($subscription->months) ?></td>
                </tr>
                <tr>
                    <th><?= __('Filters Max') ?></th>
                    <td><?= $this->Number->format($subscription->filters_max) ?></td>
                </tr>
                <tr>
                    <th><?= __('Discount') ?></th>
                    <td><?= $this->Number->format($subscription->discount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($subscription->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($subscription->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Active') ?></th>
                    <td><?= $subscription->active ? __('Yes') : __('No'); ?></td>
                </tr>
                <tr>
                    <th><?= __('Removed') ?></th>
                    <td><?= $subscription->removed ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Users Email') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($subscription->users_email)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Notes') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($subscription->notes)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($subscription->description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
