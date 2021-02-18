<section class="mt-5 pt-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <iframe src="<?php echo SITE_URL; ?>uploads/agreement/agreement-<?php is($data['id'], 'show') ?>.pdf#toolbar=0&navpanes=0&scrollbar=0" style="width: 100%; height:100vh"></iframe>
            </div>
            <div class="col-md-6">
                <form action="" method="post" enctype="multipart/form-data">
                    <h1 class="text-center mb-4">Agreement Letter</h1>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="signature" id="signature">
                            <label class="custom-file-label" for="signature">Choose Signature</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="signature_1" id="signature_1">
                            <label class="custom-file-label" for="signature_1">Choose Thumb Print
                            </label>
                        </div>
                    </div>
                    <button type="submit" name="aagreeSubmit" value="sdsfs" class="btn btn-primary">Accept</button>
                </form>
            </div>
        </div>
    </div>
</section>