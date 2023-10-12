<div id="manage-filter-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <?= __('Manage filters'); ?>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th><?= __('#') ?></th>
                            <th><?= __('Filter Name') ?></th>
                            <th><?= __('Options') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filtersManagment as $k => $filter): ?>
                        <tr>
                            <td><?= $k+1; ?></td>
                            <td><?= h($filter->title) ?></td>
                            <td>
                                <button type="button" class="btn <?= ($filter->status == 1)? "btn-success": "btn-outline-success"?> change-status" data-id="<?= $filter->id; ?>"><i class="fa fa-power-off"></i></button>
                                <button type="button" class="btn btn-info <?= ($filter->priority == 1)? "btn-indigo": "btn-outline-indigo"?> add-to-pri" data-id="<?= $filter->id; ?>"><i class="fa fa-certificate"></i></button>
                                <button type="button" class="btn <?= ($filter->notification == 1)? "btn-danger": "btn-outline-danger"?> add-to-notification" data-id="<?= $filter->id; ?>"><i class="fa fa-envelope"></i></button>
                            </td>
                            <td class="actions">
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-danger add-to-trash-filter" data-id="<?= $filter->id; ?>"><i class="fa fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a class="btn btn-primary w-100" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#new-filter-modal" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link feather-icon"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                    <span class="hide-menu">Add a new filter</span>
                </a>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
