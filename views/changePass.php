<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <div class="card mt-3">
                <div class="card-header font-weight-bold text-uppercase">Change Password</div>
                <div class="card-body">

                    <form method="POST" action="/dashboard/change-password">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label">New Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control <?= isset($errors['password']) ? ' is-invalid' : '' ?>" name="password" required>

                                <?php if (isset($errors['password'])) : ?>
                                    <span class="invalid-feedback">
                                        <strong><?= $this->e($errors['password']) ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label">Confirm New Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control <?= isset($errors['password_confirmation']) ? ' is-invalid' : '' ?>" name="password_confirmation" required>

                                <?php if (isset($errors['password_confirmation'])) : ?>
                                    <span class="invalid-feedback">
                                        <strong><?= $this->e($errors['password_confirmation']) ?></strong>
                                    </span>
                                <?php endif ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Change
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->stop() ?>