<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start($this->uri->segment(3), 'list/cpt/' . $this->uri->segment(3), 'post_list'); ?>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">
			<form class="p-3 py-5" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="filterTitle" name="title" value="<?php is($PostData->title, 'show') ?>" placeholder="Title *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>

					</div>

					<div class="col-md-6">
						<select class="selectpicker form-control tagging" name="category" data-live-search="true" title=" Select Category ">
							<?php if (is($category, 'array'))
								foreach ($category as $value) : ?>
								<option <?php check_selected($value->id, $PostData->category_id, 'selected') ?> value="<?php is($value->id, 'show'); ?>">
									<?php is($value->title, 'showCapital'); ?>
								</option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-md-12">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="short_des" name="short_des" placeholder="Post Short Description *" value="<?php is($PostData->short_description, 'show') ?>">
							<small class="form-text text-muted">
								<!-- <span class="text-danger mr-1">*</span>Required Fields -->
							</small>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group mb-4">
							<textarea class="form-control" rows="0" id="editor1" name="description" placeholder="Description"><?php is($PostData->description, 'show') ?></textarea>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group mb-4">
							<label>Featured Image</label>
							<?php file_input('post_image', true, $PostData->post_image); ?>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group mb-4">
							<label>Attachments</label>
							<input type="file" name="attachment">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group mb-4">
							<?php checkbox_input('postCheck', '1', 'Pin Post', is($PostData->is_pinned) and $PostData->is_pinned === '1', 'warning'); ?>
							<small>
								Tick The Box For Pinned This Post.
							</small>
						</div>
					</div>
				</div>

				<div class="row mb-3">
					<div class="col-md-12">
						<label>Online Price :</label>
					</div>
					<div class="col-md-6">
						<input type="number" class="form-control r_price" id="r_price" name="r_price" placeholder="Online Regular Price" value="<?php is($PostData->regular_price, 'show') ?>">
					</div>
					<div class="col-md-6">
						<input type="number" class="form-control s_price" id="s_price" name="s_price" placeholder="Online Sale Price" value="<?php is($PostData->sale_price, 'show') ?>">
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label>Printed Price :</label>
					</div>
					<div class="col-md-6">
						<input type="number" class="form-control r_price" id="pr_price" name="pr_price" placeholder="Printed Regular Price" value="<?php is($PostData->psm_regular_price, 'show') ?>">
					</div>
					<div class="col-md-6">
						<input type="number" class="form-control s_price" id="ps_price" name="ps_price" placeholder="Printed Sale Price" value="<?php is($PostData->psm_sale_price, 'show') ?>">
					</div>
				</div>

				<div class="row">
					<div class="col-md-6">
						<button type="submit" name="editPost" value="sfddsfs" class="btn btn-primary mt-4">
							Update <?php echo $this->uri->segment(3); ?>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>