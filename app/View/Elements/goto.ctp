<div class="inner">
	<div class="grid-1-2 fleft" style="line-height: 64px;">
		<?php
			echo $this->Paginator->counter(
				array(
				    'format' => __('Found <strong>{:count}</strong> records, pag. <strong>{:page}/{:pages}</strong> ({:current} records/page)')
		        )
            );
		?>
	</div>

	<div class="horizontal-form grid-1-2 fleft" style="text-align: right; padding: 10px 0;">
		<strong>Go to page: </strong>
		<input type="text" id="input-goto" style="width: 50px; display: inline; position: relative; top: 2px; ">
		<input type="button" id="<?php echo $prefix; ?>Goto" data-count="<?php echo $this->Paginator->counter(array('format' => __('{:pages}'))); ?>" class="btn" value="GO" style="min-width: 60px;">
	</div>
</div>
