<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilterDetail $filterDetail
 * @var \Cake\Collection\CollectionInterface|string[] $filters
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Filter Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filterDetails form content">
            <?= $this->Form->create($filterDetail) ?>
            <fieldset>
                <legend><?= __('Add Filter Detail') ?></legend>
                <?php
                    echo $this->Form->control('filter_id', ['options' => $filters]);
                    echo $this->Form->control('ad_id_out');
                    echo $this->Form->control('ad_img');
                    echo $this->Form->control('ad_title');
                    echo $this->Form->control('ad_link');
                    echo $this->Form->control('ad_price');
                    echo $this->Form->control('ad_city');
                    echo $this->Form->control('ad_pro');
                    echo $this->Form->control('ad_featured');
                    echo $this->Form->control('favourite');
                    echo $this->Form->control('removed');
                    echo $this->Form->control('view_status');
                    echo $this->Form->control('notification_status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
