<?php breadcrumb_start($this->uri->segment(3), 'list/cpt/' . $this->uri->segment(3), 'post_list'); ?>
<div class="row" id="cancel-row">

	<div class="col-lg-8 col-sm-12 col-md-8 offset-md-2 layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">
			<form class="p-3 py-5" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="title" name="title" placeholder="Post Title *" require>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group mb-4">
							<select class="selectpicker form-control" name="cat" data-live-search="true" title=" Select Category " require>
								<?php if (!empty($category)) foreach ($category as $value) : ?>
									<option value="<?php echo $value->id; ?>">
										<?php echo ucwords($value->title); ?>
									</option>
								<?php endforeach; ?>
							</select>
							<small class="form-text text-muted"><span class="text-danger mr-1">*</span>Required Fields</small>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="short_des" name="short_des" placeholder="Post Short Description *">
							<small class="form-text text-muted">
								<!-- <span class="text-danger mr-1">*</span>Required Fields -->
							</small>
						</div>

					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group mb-4">
							<textarea id="editor1" name="description"></textarea>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>
				<!-- Post Image -->
				<div class="row">
					<div class="col-md-4">
						<div class="form-group mb-4">
							<label>Featured Image</label>
							<?php file_input('post_image'); ?>
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
							<?php checkbox_input('postCheck', '1', 'Pin Post', '', 'warning'); ?>
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
						<input type="text" class="form-control r_price" id="r_price" name="r_price" placeholder="Online Regular Price">
						<small class="form-text text-muted">
							<!-- <span class="text-danger mr-1">*</span>Required Fields -->
						</small>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control s_price" id="s_price" name="s_price" placeholder="Online Sale Price">
						<small class="form-text text-muted">
							<!-- <span class="text-danger mr-1">*</span>Required Fields -->
						</small>
					</div>
				</div>

				<div class="row">
					<div class="col-md-12">
						<label>Printed Price :</label>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control r_price" id="pr_price" name="pr_price" placeholder="Printed Regular Price">
						<small class="form-text text-muted">
							<!-- <span class="text-danger mr-1">*</span>Required Fields -->
						</small>
					</div>
					<div class="col-md-6">
						<input type="text" class="form-control s_price" id="ps_price" name="ps_price" placeholder="Printed Sale Price">
						<small class="form-text text-muted">
							<!-- <span class="text-danger mr-1">*</span>Required Fields -->
						</small>
					</div>
				</div>


				<div class="row">
					<div class="col-md-6">
						<button type="submit" name="addPost" value="sfddsfs" class="btn btn-primary mt-4">
							Add <?= ucfirst($this->uri->segment(3)); ?>
						</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>