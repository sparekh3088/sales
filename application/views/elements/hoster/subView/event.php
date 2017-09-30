<tr class="events-sub">
	<td>
		<strong><?= $title ?></strong>
	</td>
	<td>
		<?= $event_type ?>
	</td>
	<td>
		<?= $user_full_name ?>
	</td>
	<td>
		<strong>Start</strong>: <?= date($this->config->item("USER_DATE_FORMAT"), strtotime($start_date)); ?>
		<br />
		<strong>End</strong>: <?= date($this->config->item("USER_DATE_FORMAT"), strtotime($end_date)); ?>
	</td>
	<td class="td-btn">
		<a href="#" class="btn btn-default btn-sm table-toggle-tr">Details</a>
	</td>
</tr>
<tr class="table-collapsible">
	<td colspan="5">
    	<ul class="tickettable-meta">
    		<li>
            	<strong>Event ID</strong>
            	<a href="<?= base_url('event/') . $event_id ?>"><span>#<?= $event_id ?></span></a>
            </li>
            <?php if( $event_type === "Other" ) { ?>
	            <li>
	            	<strong>Other Title</strong>
	            	<span><?= $event_type_title ?></span>
	            </li>
            <?php } ?>
            <li>
            	<strong>Accept Payment</strong>
            	<span><?= $accept_payment?"YES":"NO" ?></span>
            </li>
            <?php if( $accept_payment ) { ?>
	            <li>
	            	<strong>Payment By</strong>
	            	<span><?= $payment_by ?></span>
	            </li>
            <?php } ?>
            <?php if( $merchant_account_id ) { ?>
	            <li>
	            	<strong>Merchant</strong>
	            	<a href="<?= base_url('merchant/') . $merchant_account_id ?>"><span><?= $merchant_full_name ?></span></a>
	            </li>
            <?php } ?>
            <li>
            	<strong>Status</strong>
            	<a href="#" data-event-id="<?= $event_id ?>" class="changeStatus"><span><?= $status ?></span></a>
            </li>
    	</ul>
	</td>
</tr>