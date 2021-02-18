<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start('faq', 'list/faqs', 'post_list');
?>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">
			<form class="p-3 py-5" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="filterTitle" name="title" value="<?php is($FaqData->title, 'show') ?>" placeholder="Title *">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>

					</div>

					<div class="col-md-6">
						<div class="form-group mb-4">
							<select class="selectpicker form-control" name="category_id" data-live-search="true" title=" Select Category ">
								<?php if (is($categories, 'array'))
									foreach ($categories as $category) : ?>
									<option <?php check_selected_option($category->id, $FaqData->category_id) ?> value="<?php is($category->id, 'show'); ?>">
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
							<textarea class="form-control" rows="0" id="editor1" name="description" placeholder="Description"><?php is($FaqData->description, 'show') ?></textarea>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
						<div class="mb-4">
							<?php checkbox_input(
								'postCheck',
								'1',
								'Pin Faq',
								is($FaqData->is_pinned) and $FaqData->is_pinned === '1',
								'warning'
							); ?>

							<small>
								Tick The Box For Pinned This Faq.
							</small>
						</div>
					</div>
				</div>

				<!-- Category Image -->
				<?php file_input('postImg', true, $FaqData->post_image); ?>

				<div class="ml-xl-5">
					<button type="submit" name="editFaq" value="sfddsfs" class="ml-xl-4 btn btn-primary mt-4">Update Faq</button>
				</div>
			</form>
		</div>
	</div>
</div>
