<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start($universityData->type, 'add/university', 'university_add'); ?>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6">

			<div class="table-responsive mb-4 mt-4">
				<table id="universityTable" class="style-3 table table-hover" style="width:100%">
					<thead>
						<tr class="text-center">
							<th>#</th>
							<th class="text-left ">Name</th>
							<th>Country</th>
							<th>Created By</th>
							<th>Status</th>
							<th>Created date</th>
							<?php if (user_can('university_edit') or user_can('university_delete')) : ?>
								<th>Action</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tfoot>
						<tr class="text-center">
							<th>#</th>
							<th class="text-left ">Name</th>
							<th>Country</th>
							<th>Created By</th>
							<th>Status</th>
							<th>Created date</th>
							<?php if (user_can('university_edit') or user_can('university_delete')) : ?>
								<th>Action</th>
							<?php endif; ?>
						</tr>
					</tfoot>
				</table>
			</div>