<div id="subscription-modal" class="modal fade" tabindex="-1" role="dialog"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <?= __('Extend subscription'); ?>
                </div>
                <div class="row g-0 align-items-center justify-content-center">
                    <?php foreach($subscriptions as $k => $subscription): ?>
                        <div class="col-lg-4 col-md-6 col-sm-10">
                            <div
                                class="ud-single-pricing <?= ($k == 0)? 'first-item' : ""; ?> <?= ($k == 1)? 'active' : ""; ?> <?= ($k == 2)? 'last-item' : ""; ?> wow fadeInUp"
                                data-wow-delay=".15s"
                                >
                                <div class="ud-pricing-header">
                                    <h3><?= $subscription->notes; ?></h3>
                                    <h4><?= $this->Number->format($subscription->brutto, ['places' => 2, 'after' => ' zł']) ?> / <?= __('miesiąc'); ?></h4>
                                </div>
                                <div class="ud-pricing-body">
                                    <?= $subscription->description; ?>
                                </div>
                                <div class="ud-pricing-footer">
                                    <a href="<?= $this->Url->build(['plugin' => false, 'controller' => 'Payments', 'action' => 'create', $subscription->id]);?>" class="ud-main-btn ud-border-btn">
                                        <?= __('Subscribe'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<style>
    .ud-pricing {
	 padding-top: 120px;
	 padding-bottom: 90px;
}
 @media (max-width: 767px) {
	 .ud-pricing {
		 padding-top: 80px;
		 padding-bottom: 40px;
	}
}
 .ud-single-pricing {
	 margin-bottom: 40px;
	 background: #fff;
	 border: 2px solid #d4deff;
	 border-radius: 8px;
	 text-align: center;
	 padding: 45px 30px;
	 position: relative;
}
 .ud-single-pricing.active {
	 background: -webkit-gradient(linear, left top, left bottom, from(#3056d3), to(#179bee));
	 background: linear-gradient(180deg, #3056d3 0%, #179bee 100%);
	 border: none;
	 padding: 55px 30px;
}
 .ud-single-pricing.active .ud-pricing-header h3, .ud-single-pricing.active .ud-pricing-header h4 {
	 color: #fff;
}
 .ud-single-pricing.active .ud-pricing-body li {
	 color: #fff;
}
 .ud-single-pricing.first-item::after, .ud-single-pricing.last-item::after {
	 content: "";
	 position: absolute;
	 width: 55px;
	 height: 55px;
	 z-index: 1;
}
 .ud-single-pricing.first-item::after {
	 background: #3056d3;;
	 left: -2px;
	 bottom: -2px;
	 border-radius: 0px 55px 0px 8px;
}
 .ud-single-pricing.last-item::after {
	 background: #13c296;
	 top: -2px;
	 right: -2px;
	 border-radius: 0px 8px 0px 55px;
}
 .ud-single-pricing .ud-popular-tag {
	 display: inline-block;
	 padding: 10px 25px;
	 background: #fff;
	 border-radius: 30px;
	 color: #3056d3;;
	 margin-bottom: 20px;
	 font-weight: 600;
}
 .ud-single-pricing .ud-pricing-header h3 {
	 font-weight: 500;
	 font-size: 15px;
	 margin-bottom: 8px;
}
 .ud-single-pricing .ud-pricing-header h4 {
	 font-weight: 600;
	 font-size: 26px;
	 color: #3056d3;;
	 margin-bottom: 40px;
}
 .ud-single-pricing .ud-pricing-body {
	 margin-bottom: 40px;
}
 .ud-single-pricing .ud-pricing-body li {
	 font-size: 15px;
	 margin-bottom: 18px;
}
 .ud-single-pricing .ud-main-btn {
	 border-radius: 30px;
	 padding: 15px 40px;
}
 .ud-single-pricing .ud-border-btn {
	 border: 1px solid #d4deff;
	 color: #3056d3;;
	 background: #fff;
}
 .ud-single-pricing .ud-border-btn:hover {
	 color: #fff;
	 border-color: #3056d3;;
	 background: #3056d3;;
}
 .ud-single-pricing .ud-white-btn {
	 background: #fff;
	 color: var(--heading-color);
}
 .ud-single-pricing .ud-white-btn:hover {
	 color: #fff;
	 background: var(--heading-color);
}

</style>