<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<?php breadcrumb_start('reports', 'list/reports', 'course_list'); ?>
<div class="row" id="cancel-row">
	<div class="offset-lg-2 offset-md-1 col-md-10 col-xl-8 col-lg-8  col-sm-12  layout-spacing">
		<div class="widget-content widget-content-area br-6 shadow">
			<form class="p-3" method="POST" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group mb-4">
							<select class="selectpicker form-control" name="user_id" data-live-search="true" title=" Select User ">
								<?php if (is($users, 'array'))
									foreach ($users as $user) : ?>
									<option <?php check_selected_option($user->id, $reportData->user_id) ?> value="<?php echo $user->id; ?>">
										<?php echo ucwords($user->first_name); ?>
									</option>
								<?php endforeach; ?>
							</select>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group mb-4">
							<select class="selectpicker form-control" name="document_id" data-live-search="true" title=" Select Document ">
								<?php if (is($documents, 'array'))
									foreach ($documents as $document) : ?>
									<option <?php check_selected_option($document->id, $reportData->study_doc_id) ?> value="<?php echo $document->id; ?>">
										<?php echo ucwords($document->title); ?>
									</option>
								<?php endforeach; ?>
							</select>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group mb-4">
							<textarea class="form-control" id="reason" name="reason" placeholder="Report Reason *" minlength="3"><?php is($reportData->reason, 'showCapital'); ?></textarea>
							<small class="form-text text-muted">
								<span class="text-danger mr-1">*</span>Required Fields
							</small>
						</div>
					</div>
				</div>

				<button type="submit" name="editReport" value="sfddsfs" class="btn btn-primary mt-4">Update Report</button>
			</form>
		</div>
	</div>
</div>
