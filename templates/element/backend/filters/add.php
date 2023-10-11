<div id="new-filter-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <?= __('Add a new filter'); ?>
                </div>
                <?= $this->Form->create($filterForm, ['id' => 'FilterAddForm','class' => 'ps-3 pe-3', 'url' => ['controller' => 'Filters', 'action' => 'add']]) ?>
                    <div class="form-group mb-3">
                        <?= $this->Form->control('link', ['placeholder' => __('ex. https://olx.pl/motoryzacja/samochody/...'), 'class' => 'form-control', 'label' => ['class' => 'form-label', 'text' =>  __("Url to monit")]]); ?>
                    </div>
                    <div class="form-group mb-3">
                        <?= $this->Form->control('title', ['placeholder' => __('ex. konsole olx, diesel 90k'), 'class' => 'form-control', 'label' => ['class' => 'form-label', 'text' =>  __("Filter name")]]); ?>
                    </div>
                    <div class="form-group mb-3 text-center">
                        <?= $this->Form->button(__('Save Filter'), ['id' => 'add-filter-button', 'class' => 'btn btn-primary']) ?>
                    </div>
                <?= $this->Form->end() ?>
                <div id="ajax-response"></div>
            </div>
        </div>
    </div>
</div>
