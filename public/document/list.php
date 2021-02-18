<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start($documentData->type, 'add/document', 'document_add'); ?>
<style>
	table.dataTable thead .sorting:before,
	table.dataTable thead .sorting_asc:before,
	table.dataTable thead .sorting_desc:before,
	table.dataTable thead .sorting_asc_disabled:before,
	table.dataTable thead .sorting_desc_disabled:before,
	table.dataTable thead .sorting:after,
	table.dataTable thead .sorting_asc:after,
	table.dataTable thead .sorting_desc:after,
	table.dataTable thead .sorting_asc_disabled:after,
	table.dataTable thead .sorting_desc_disabled:after {
		position: absolute;
		top: 35%;
	}
</style>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6">
			<!-- <form action="" method="post">
				<div class="row">
					<div class="col-1">Filter</div>
					<div class="col-2">
						<select class="form-control" id="university-search" name="university_id" data-live-search="true" title=" Select University "></select>
					</div>
					<div class="col-2">
						<select class="form-control" id="course-search" name="course_id" data-live-search="true" title=" Select University "></select>
					</div>
					<div class="col-2"><button type="submit" class="btn btn-primary mb-2">Search</button></div>
					<div class="col-2"></div>
					<div class="col-3"></div>
				</div>
			</form> -->
			<div class="table-responsive mb-4 mt-4">
				<table id="documentTable" class="style-3 table table-hover" style="width:100%">
					<thead>
						<tr class="text-center">
							<th style="vertical-align: middle; position: relative;">#</th>
							<th style="vertical-align: middle; position: relative;">Document Name / Slug </th>
							<th style="vertical-align: middle; position: relative;">University / Course</th>
							<th style="vertical-align: middle; position: relative;">Created By</th>
							<th style="vertical-align: middle; position: relative;">Status</th>
							<th style="vertical-align: middle; position: relative;">Created date</th>
							<?php if (user_can('document_edit') or user_can('document_delete')) : ?>
								<th style="vertical-align: middle; position: relative;">Action</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						if (is($documentData, 'json') and is($documentData->data, 'array')) :

							foreach ($documentData->data as $key => $value) : ?>
								<tr class="text-center">
									<td><?php echo $i++; ?>.</td>
									<td>
										<p class=" mb-0 admin-name">
											<?php is($value->title, 'showCapital'); ?>
										</p>
										<p class=" mb-0  text-dark-50">
											<?php is($value->category, 'showCapital'); ?>,
											<?php is($value->language, 'showCapital'); ?>
										</p>
									</td>
									<td>
										<p class=" mb-0 admin-name">
											<?php is($value->university, 'showCapital'); ?>
										</p>
										<p class="mb-0">
											<?php is($value->course, 'show'); ?>
										</p>
										<p class="mb-0">
											<?php is($value->academic_year, 'show'); ?>
										</p>
									</td>
									<td>
										<p class=" mb-0 admin-name">
											<?php is($value->created_by, 'show'); ?>
										</p>
									</td>
									<td>
										<?php isset($value->status) and $value->status == '0' and print('<a href="' . SITE_URL . 'update/document/' . $value->id . '">'); ?>
										<span class="badge px-2 py-1 badge-<?php isset($value->status) and $value->status == '0' and print('info'); ?><?php $value->status == '1' and print('success'); ?>">
											<?php isset($value->status) and $value->status == '0' and print('New'); ?><?php $value->status == '1' and print('Approved'); ?>
										</span>
										<?php isset($value->status) and $value->status == '0' and print('</a>'); ?>
									</td>
									<td>
										<?php is($value->created_date, 'datetime'); ?>
									</td>
									<?php if (user_can('document_edit') or user_can('document_delete')) : ?>
										<td>
											<ul class="table-controls">
												<?php if (user_can('document_delete')) : ?>
													<li>
														<a href="<?php echo SITE_URL . 'delete/document/' . $value->slug; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-6 mb-1">
																<polyline points="3 6 5 6 21 6"></polyline>
																<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
																</path>
															</svg>
														</a>
													</li>
												<?php endif; ?>
											</ul>
										</td>
									<?php endif; ?>
								</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
					<tfoot>
						<tr class="text-center">
							<th>#</th>
							<th>Document Name / Slug </th>
							<th>University / Course</th>
							<th>Created By</th>
							<th>Status</th>
							<th>Created date</th>
							<?php if (user_can('document_edit') or user_can('document_delete')) : ?>
								<th>Action</th>
							<?php endif; ?>
						</tr>
					</tfoot>
				</table>
			</div>