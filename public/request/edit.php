<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start('requests', 'list/requests', 'category_list'); ?>
<div class="row" id="cancel-row">
	<div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">
			<form class="p-3" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="text" class="form-control" id="subject" name="subject" placeholder="Request Subject *" value="<?php is($requestData->subject, 'show') ?>">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>

					<div class="col-md-6">
						<div class="form-group mb-4">
							<input type="email" class="form-control" id="email" name="email" placeholder="Request Email *" value="<?php is($requestData->email, 'show') ?>">
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group mb-4">
							<textarea class="form-control" id="desc" name="desc" placeholder="Request Description *"><?php is($requestData->description, 'show') ?></textarea>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>

				<!-- Request Image -->
				<?php file_input('catImg', true, $requestData->image); ?>

				<button type="submit" name="editRequest" value="sfddsfs" class="btn btn-primary mt-4">Update Request</button>
			</form>
		</div>
	</div>
</div>
