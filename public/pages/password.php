<section class="bg-light">
    <div class="container">
        <div class="row mx-auto py-3">
            <div class="col-md-12 text-center mb-3">
                <h1 class="text-success font-weight-bold">Password Update</h1>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="hidden" name="id" value="<?php is($data['id'], 'show') ?>">
                                <input type="hidden" name="token" value="<?php is($data['token'], 'show') ?>">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                            </div>
                            <button type="submit" name="updatePass" value="sdfdesf" class="btn btn-block btn-primary">
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>