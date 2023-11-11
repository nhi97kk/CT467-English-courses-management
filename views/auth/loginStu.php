<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <!-- FLASH MESSAGES -->

            <div class="card mt-3">
                <div class="card-header font-weight-bold text-uppercase">Login Student</div>
                <div class="card-body">

                    <form method="POST" action="/loginStudent">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control <?= isset($errors['email']) ? 'is-invalid' : '' ?>" name="email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" required autofocus>

                                <?php if (isset($errors['email'])) : ?>
                                    <span class="invalid-feedback">
                                        <strong><?= $this->e($errors['email']) ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="/register">
                                    You are a new teacher?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>