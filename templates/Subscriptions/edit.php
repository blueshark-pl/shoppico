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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subscription->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subscription->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Subscriptions'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="subscriptions form content">
            <?= $this->Form->create($subscription) ?>
            <fieldset>
                <legend><?= __('Edit Subscription') ?></legend>
                <?php
                    echo $this->Form->control('name');
                    echo $this->Form->control('users_email');
                    echo $this->Form->control('netto');
                    echo $this->Form->control('brutto');
                    echo $this->Form->control('vat');
                    echo $this->Form->control('months');
                    echo $this->Form->control('filters_max');
                    echo $this->Form->control('notes');
                    echo $this->Form->control('description');
                    echo $this->Form->control('active');
                    echo $this->Form->control('discount');
                    echo $this->Form->control('removed');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
