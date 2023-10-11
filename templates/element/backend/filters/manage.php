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
                        
                            <button type="button" class="btn <?= ($filter->status == 1)? "btn-success": "btn-outline-success"?>"><i class="fa fa-power-off"></i></button>
                            <button type="button" class="btn btn-info <?= ($filter->priority == 1)? "btn-indigo": "btn-outline-indigo"?>"><i class="fa fa-certificate"></i></button>
                            <button type="button" class="btn <?= ($filter->notification == 1)? "btn-danger": "btn-outline-danger"?>" data-id="<?= $filter->id; ?>"><i class="fa fa-envelope"></i></button>
                        <!-- </div> -->
                    </td>
                    <td class="actions">
                        <div class="btn-group" role="group">
                            <!-- <button type="button" class="btn btn-success"><i class="fa fa-phone"></i></button> -->
                            <!-- <button type="button" class="btn btn-info btn-light-info add-to-fav" data-id="<?= $filter->id; ?>"><i class="fa fa-edit"></i></button> -->
                            <button type="button" class="btn btn-danger add-to-trash" data-id="<?= $filter->id; ?>"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
