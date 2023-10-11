<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\UserProfile $userProfile
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $userProfile->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $userProfile->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List User Profiles'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="userProfiles form content">
            <?= $this->Form->create($userProfile) ?>
            <fieldset>
                <legend><?= __('Edit User Profile') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('company_name');
                    echo $this->Form->control('nip');
                    echo $this->Form->control('regon');
                    echo $this->Form->control('postal_code');
                    echo $this->Form->control('city');
                    echo $this->Form->control('street');
                    echo $this->Form->control('local_number');
                    echo $this->Form->control('phone');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
