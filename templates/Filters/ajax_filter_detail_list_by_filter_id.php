<?php
    $this->layout = 'ajax';
?>
<?= $this->element('backend/filters/table', ['filterDetails' => $currentfilters]); ?>