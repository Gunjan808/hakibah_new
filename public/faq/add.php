<?php breadcrumb_start('faqs', 'list/faqs', 'post_list'); ?>
<div class="row" id="cancel-row">

	<div class="offset-lg-2 offset-md-1 col-md-10 col-xl-8 col-lg-8  col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">
			<form class="p-3 py-5" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="title" name="title" placeholder="Faq Title *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>

					</div>

					<div class="col-md-6">
						<div class="form-group mb-4">
							<select class="selectpicker form-control  withoutTagging" name="category_id" data-live-search="true" title=" Select Category ">
								<?php if (is($categories, 'array'))
									foreach ($categories as $category) : ?>
									<option value="<?php is($category->id, 'show'); ?>">
										<?php is($category->title, 'showCapital'); ?>
									</option>
								<?php endforeach; ?>
							</select>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group mb-4">
							<textarea class="form-control" rows="0" id="editor1" name="description" placeholder="Description"></textarea>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>

						</div>
						<div class="mb-4">
							<?php checkbox_input('postCheck', '1', 'Pin Faq', '', 'warning'); ?>
							<small>
								Tick The Box For Pinned This Faq.
							</small>
						</div>
					</div>
				</div>

				<!-- Faq Image -->
				<?php file_input('post_image'); ?>

				<div class="ml-xl-5">
					<button type="submit" name="addFaq" value="sfddsfs" class="ml-xl-4 btn btn-primary mt-4">Add Faq</button>
				</div>
			</form>
		</div>
	</div>
</div>