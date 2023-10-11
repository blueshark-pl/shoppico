<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Filter $filter
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $filter->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $filter->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Filters'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filters form content">
            <?= $this->Form->create($filter) ?>
            <fieldset>
                <legend><?= __('Edit Filter') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('title');
                    echo $this->Form->control('notification');
                    echo $this->Form->control('removed');
                    echo $this->Form->control('status');
                    echo $this->Form->control('priority');
                    echo $this->Form->control('private_tab');
                    echo $this->Form->control('link');
                    echo $this->Form->control('interval');
                    echo $this->Form->control('last_update', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
