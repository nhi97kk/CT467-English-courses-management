<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Students</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="animate__animated animate__fadeInLeft">Add your student here.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <form action="/dashboard/student" method="POST" class="col-md-6 offset-md-3">

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255" id="name" placeholder="Enter Name" value="<?= isset($old['name']) ? $this->e($old['name']) : '' ?>" />

                    <?php if (isset($errors['name'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control<?= isset($errors['email']) ? ' is-invalid' : '' ?>" maxlen="255" id="email" placeholder="Enter email" value="<?= isset($old['email']) ? $this->e($old['email']) : '' ?>" />

                    <?php if (isset($errors['email'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['email']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" name="phone" class="form-control<?= isset($errors['phone']) ? ' is-invalid' : '' ?>" maxlen="255" id="phone" placeholder="Enter Phone" value="<?= isset($old['phone']) ? $this->e($old['phone']) : '' ?>" />

                    <?php if (isset($errors['phone'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['phone']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="address">address </label>
                    <input type="text" name="address" class="form-control<?= isset($errors['address']) ? ' is-invalid' : '' ?>" maxlen="255" id="address" placeholder="Enter address" value="<?= isset($old['address']) ? $this->e($old['address']) : '' ?>" />

                    <?php if (isset($errors['address'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['address']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>


                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Add student</button>
            </form>

        </div>
    </div>
</div>
<?php $this->stop() ?>