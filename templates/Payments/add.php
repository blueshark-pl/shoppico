<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Payments'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="payments form content">
            <?= $this->Form->create($payment) ?>
            <fieldset>
                <legend><?= __('Add Payment') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('id_operation');
                    echo $this->Form->control('filter_limit');
                    echo $this->Form->control('month_limit');
                    echo $this->Form->control('operation_number');
                    echo $this->Form->control('operation_type');
                    echo $this->Form->control('operation_status');
                    echo $this->Form->control('operation_amount');
                    echo $this->Form->control('operation_currency');
                    echo $this->Form->control('operation_original_amount');
                    echo $this->Form->control('operation_original_currency');
                    echo $this->Form->control('operation_datetime');
                    echo $this->Form->control('orderId');
                    echo $this->Form->control('control');
                    echo $this->Form->control('description');
                    echo $this->Form->control('email');
                    echo $this->Form->control('p_info');
                    echo $this->Form->control('p_email');
                    echo $this->Form->control('is_mail_campain');
                    echo $this->Form->control('channel');
                    echo $this->Form->control('signature');
                    echo $this->Form->control('invoice_id');
                    echo $this->Form->control('is_verify');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
