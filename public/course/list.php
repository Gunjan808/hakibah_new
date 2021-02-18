<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start($courseData->type, 'add/course', 'course_add'); ?>
<?php
// print_r($courseData);
// die;
?>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6">

			<div class="table-responsive mb-4 mt-4">
				<table id="multi-column-ordering" class="style-3 table table-hover course-list " style="width:100%">
					<thead>
						<tr class="text-center">
							<th>#</th>
							<th>Name / Slug </th>
							<th>University</th>
							<th>Followers</th>
							<th>Documents</th>
							<th>Created By</th>
							<th>Status</th>
							<th>Created date</th>
							<?php if (user_can('course_edit') or user_can('course_delete')) : ?>
								<th>Action</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						if (is($courseData, 'json') and is($courseData->data, 'array')) :
							foreach ($courseData->data as $key => $value) : ?>
								<tr class="text-center">
									<td><?php echo $i++; ?>.</td>
									<td>
										<p class=" mb-0 admin-name">
											<a href="<?= SITE_URL . 'list/documents/' . $value->university_id . '/' . $value->id; ?>"><?php is($value->title, 'showCapital'); ?></a>
										</p>
										<p class="mb-0">
											<?php is($value->slug, 'show'); ?>
										</p>
									</td>
									<td>
										<p class=" mb-0 admin-name">
											<?php is($value->university, 'showCapital'); ?>
										</p>
									</td>
									<td>
										<p class=" mb-0 admin-name">
										<?php if (!empty($value->course_followers)) : ?>
												<?php is($value->course_followers, 'show'); ?>
											<?php else: ?>
												0
											<?php endif; ?>
										</p>
									</td>
									<td>
										<p class=" mb-0 admin-name">
											<?php if (!empty($value->course_doc)) : ?>
												<?php is($value->course_doc, 'show'); ?>
											<?php else: ?>
												0
											<?php endif; ?>
										</p>
									</td>

									<td>
										<p class=" mb-0 admin-name">
											<?php is($value->created_by, 'showCapital'); ?>
										</p>
									</td>
									<td>
										<span class="badge px-2 py-1 badge-<?php is(get_status($value->status)->class, 'show'); ?>">
											<?php is(get_status($value->status)->title, 'show'); ?>
										</span>
									</td>
									<td>
										<?php is($value->created_date, 'datetime'); ?>
									</td>
									<?php if (user_can('course_edit') or user_can('course_delete')) : ?>
										<td>
											<ul class="table-controls">
												<?php if (user_can('course_edit')) : ?>
													<li>
														<a href="<?php echo SITE_URL . 'edit/course/' . $value->slug; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1">
																<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
																</path>
															</svg>
														</a>
													</li>
												<?php endif; ?>

												<?php if (user_can('course_delete')) : ?>
													<li>
														<a href="<?php echo SITE_URL . 'delete/course/' . $value->slug; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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
							<th>Name / Slug</th>
							<th>University</th>
							<th>Created By</th>
							<th>Status</th>
							<th>Created date</th>
							<?php if (user_can('course_edit') or user_can('course_delete')) : ?>
								<th>Action</th>
							<?php endif; ?>
						</tr>
					</tfoot>
				</table>
			</div>