<?php
    use Cake\Utility\Text;
?>
<div class="table-responsive shoppico" id="filter-table-<?= isset($filter_id)? $filter_id : ""?>">
<?php if(isset($filterDetails) && $filterDetails->toArray()): ?>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= __('Finding Time')?></th>
                <th scope="col"><?= __('Ad Image'); ?></th>
                <th scope="col"><?= __('Ad Title'); ?></th>
                <th scope="col"><?= __('Filter Name'); ?></th>
                <th scope="col"><?= __('Ad Price'); ?></th>
                <th scope="col"><?= __('Ad Localisation'); ?></th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filterDetails as $filterDetail): 
                $img_link = $filterDetail->ad_img;
                preg_match_all('#\bhttps?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $img_link, $match);
                $img_link = $match[0][0];
            ?>
            <tr class="<?= ($filterDetail->filter->priority == 1)? "priority": ""; ?> <?= ($filterDetail->favourite == 1)? "favourite": ""; ?>">
                <td scope="row"><?= $this->String->findingTimeDateFormat($filterDetail->created); ?></td>
                <td>
                    <a target="_blank" href="<?= $filterDetail->ad_link; ?>" title="Przejdź do ogłoszenia" class="thumb">
                        <img src="<?= $img_link; ?>">
                    </a>
                </td>
                <td style="max-width:280px;">
                    <a target="_blank" href="<?= $filterDetail->ad_link; ?>">
                        <?= Text::truncate($filterDetail->ad_title, 80, ['html' => false]); ?>
                    </a>
                </td>
                <td><?= ($filterDetail->filter->priority == 1)? '<i class="fas fa-certificate pri-color"></i>': ""; ?> <?= $filterDetail->has('filter') ? $filterDetail->filter->title : '' ?></td>
                <td><?= $filterDetail->ad_price; ?> zł</td>
                <td><?= $filterDetail->ad_city; ?></td>
                <td>
                    <button type="button" class="btn <?= ($filterDetail->favourite == 0)? "btn-info":"btn-outline-info"; ?> add-to-fav" data-id="<?= $filterDetail->id; ?>"><i class="fa fa-heart"></i></button>
                    <button type="button" class="btn <?= ($filterDetail->removed == 0)? "btn-danger":"btn-outline-danger"; ?> add-to-trash" data-id="<?= $filterDetail->id; ?>"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
        <tr>
            <th colspan="7" class="text-center">
                <?= $this->element('flash/info', ['message' => __('There are currently no records in the given category.')]); ?>
            </td>
        </tr>
    <?php endif; ?>
</div>