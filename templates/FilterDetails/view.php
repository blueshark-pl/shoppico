<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FilterDetail $filterDetail
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Filter Detail'), ['action' => 'edit', $filterDetail->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Filter Detail'), ['action' => 'delete', $filterDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $filterDetail->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Filter Details'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Filter Detail'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="filterDetails view content">
            <h3><?= h($filterDetail->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Filter') ?></th>
                    <td><?= $filterDetail->has('filter') ? $this->Html->link($filterDetail->filter->title, ['controller' => 'Filters', 'action' => 'view', $filterDetail->filter->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Ad Id Out') ?></th>
                    <td><?= h($filterDetail->ad_id_out) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ad Title') ?></th>
                    <td><?= h($filterDetail->ad_title) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ad City') ?></th>
                    <td><?= h($filterDetail->ad_city) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ad Featured') ?></th>
                    <td><?= h($filterDetail->ad_featured) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($filterDetail->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ad Price') ?></th>
                    <td><?= $this->Number->format($filterDetail->ad_price) ?></td>
                </tr>
                <tr>
                    <th><?= __('Favourite') ?></th>
                    <td><?= $this->Number->format($filterDetail->favourite) ?></td>
                </tr>
                <tr>
                    <th><?= __('Removed') ?></th>
                    <td><?= $this->Number->format($filterDetail->removed) ?></td>
                </tr>
                <tr>
                    <th><?= __('View Status') ?></th>
                    <td><?= $this->Number->format($filterDetail->view_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notification Status') ?></th>
                    <td><?= $this->Number->format($filterDetail->notification_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($filterDetail->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($filterDetail->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Ad Img') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($filterDetail->ad_img)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Ad Link') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($filterDetail->ad_link)); ?>
                </blockquote>
            </div>
            <div class="text">
                <strong><?= __('Ad Pro') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($filterDetail->ad_pro)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
