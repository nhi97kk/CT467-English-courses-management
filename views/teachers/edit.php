<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Teachers</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="animate__animated animate__fadeInLeft">Update your Teacher here.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <form action="<?= '/dashboard/teacher/' . $this->e($teacher['id']) ?>" method="POST" class="col-md-6 offset-md-3">

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255" id="name" placeholder="Enter Name" value="<?= $this->e($teacher['name']) ?>" />

                    <?php if (isset($errors['name'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control<?= isset($errors['email']) ? ' is-invalid' : '' ?>" maxlen="255" id="email" placeholder="Enter email" value="<?= $this->e($teacher['email']) ?>" />

                    <?php if (isset($errors['email'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['email']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
                
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" name="phone" class="form-control<?= isset($errors['phone']) ? ' is-invalid' : '' ?>" maxlen="255" id="phone" placeholder="Enter phone" value="<?= $this->e($teacher['phone']) ?>" />

                    <?php if (isset($errors['phone'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['phone']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="major">Major</label>
                    <input type="text" name="major" class="form-control<?= isset($errors['major']) ? ' is-invalid' : '' ?>" maxlen="255" id="major" placeholder="Enter major" value="<?= $this->e($teacher['major']) ?>" />

                    <?php if (isset($errors['major'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['major']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="exp">Exp</label>
                    <input type="text" name="exp" class="form-control<?= isset($errors['exp']) ? ' is-invalid' : '' ?>" maxlen="255" id="exp" placeholder="Enter exp" value="<?= $this->e($teacher['exp']) ?>" />

                    <?php if (isset($errors['exp'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['exp']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Update Teacher</button>
            </form>

        </div>
    </div>
</div>
<?php $this->stop() ?>