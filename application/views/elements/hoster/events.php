<div class="events-main">
	<table class="table" id="tb2" data-rt-breakpoint="600">
		<thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col" class="th-date">Type</th>
                <th scope="col" class="th-agent">Event User</th>
                <th scope="col">Schedule Date</th>
                <th scope="col" class="th-details">Details</th>
            </tr>
        </thead>
        <tbody>
			<?php
				foreach($events as $event) {
					$this->load->view('elements/hoster/subView/event', $event);
				}
			?>
		</tbody>
	</table>
</div>