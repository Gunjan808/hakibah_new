<?php breadcrumb_start('categories', 'list/categories', 'category_list'); ?>
<div class="row" id="cancel-row">
	<div class="col-xl-6 col-lg-6 col-sm-6 offset-3 layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">

			<form class="p-3" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="title" name="title" placeholder="Category Title *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>

				<!-- Category Image -->
				<?php file_input('catImg'); ?>

				<div class="row">
					<div class="col-md-12">
						<div class="form-group mb-4">
							<select class="selectpicker form-control withoutTagging" name="post_type" title=" Select Category Type ">
								<option value="BLOG">Blogs</option>
								<option value="FAQ">FAQs</option>
								<option value="DOCUMENT">Documents</option>
							</select>
						</div>
					</div>
				</div>

				<button type="submit" name="addCategory" value="sfddsfs" class="btn btn-primary mt-4">Add Category</button>
			</form>
		</div>
	</div>
</div>