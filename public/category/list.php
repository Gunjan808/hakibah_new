<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start($categoryData->type, 'add/category', 'category_add'); ?>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6">
			<!-- <div class="row">
				<div class="col-1">
					<h3>Filters</h3>
				</div>
				<div class="col-3">
					<select class="form-control">
						<option>Select Post Type</option>
						<option>All</option>
						<option>Document</option>
						<option>Blog</option>
						<option>FAQ</option>
					</select>
				</div>
				<div class="col-3"></div>
				<div class="col-3"></div>
				<div class="col-2"></div>
			</div> -->
			<div class="table-responsive mb-4 mt-4">

				<table id="multi-column-ordering" class="style-3 table table-hover" style="width:100%">
					<thead>
						<tr class="text-center">
							<th>#</th>
							<th>Image</th>
							<th>Name / Slug </th>
							<th>Post Type </th>
							<th>Created By</th>
							<th>Status</th>
							<th>Created date</th>
							<?php if (user_can('category_edit') or user_can('category_delete')) : ?>
								<th>Action</th>
							<?php endif; ?>
						</tr>
					</thead>
					<tbody>
						<?php $i = 1;
						if (is($categoryData, 'json') and is($categoryData->data, 'array')) :

							foreach ($categoryData->data as $key => $value) : ?>
								<tr class="text-center">
									<td><?php echo $i++; ?>.</td>
									<td>
										<div class="mr-2 mx-auto rounded-lg">
											<?php if (is($value->image)) : ?>
												<img src="<?php is($value->image, 'show'); ?>" class="img-fluid shadow rounded-lg" alt="<?php is($value->title, 'show'); ?>" style="max-width: 50px; max-height: 50px;">
											<?php else : ?>
												<p>Not Found</p>
											<?php endif; ?>
										</div>
									</td>
									<td>
										<p class=" mb-0 admin-name">
											<?php is($value->title, 'showCapital'); ?>
										</p>
										<p class="mb-0">
											<?php is($value->slug, 'show'); ?>
										</p>
									</td>
									<td>
										<?php
										if ($value->post_type == 'BLOG') {
											$badge = 'info';
										} else if ($value->post_type == 'FAQ') {
											$badge = 'warning';
										} else {
											$badge = 'danger';
										} ?>

										<span class="badge px-2 py-1 badge-<?= $badge; ?>">
											<?php is($value->post_type, 'show'); ?>
										</span>
									</td>
									<td>
										<p class=" mb-0 admin-name">
											<?php is($value->created_by, 'show'); ?>
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
									<?php if (user_can('category_edit') or user_can('category_delete')) : ?>
										<td>
											<ul class="table-controls">
												<?php if (user_can('category_edit')) : ?>
													<li>
														<a href="<?php echo SITE_URL . 'edit/category/' . $value->slug; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
															<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-6 mb-1">
																<path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
																</path>
															</svg>
														</a>
													</li>
												<?php endif; ?>

												<?php if (user_can('category_delete')) : ?>
													<li>
														<a href="<?php echo SITE_URL . 'delete/category/' . $value->slug; ?>" class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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
							<th>Image</th>
							<th>Name / Slug </th>
							<th>Post Type </th>
							<th>Created By</th>
							<th>Status</th>
							<th>Created date</th>
							<?php if (user_can('category_edit') or user_can('category_delete')) : ?>
								<th>Action</th>
							<?php endif; ?>
						</tr>
					</tfoot>
				</table>
			</div>