<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Day-Times</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="animate__animated animate__fadeInLeft">Update your Day-Time here.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <form action="<?= '/dashboard/time/' . $this->e($time['id']) ?>" method="POST" class="col-md-6 offset-md-3">

                <!-- Name -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control<?= isset($errors['name']) ? ' is-invalid' : '' ?>" maxlen="255" id="name" placeholder="Enter name" value="<?= $this->e($time['name']) ?>" />

                    <?php if (isset($errors['name'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['name']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-group">
                    <label for="day">Day</label>
                    <input type="text" name="day" class="form-control<?= isset($errors['day']) ? ' is-invalid' : '' ?>" maxlen="255" id="day" placeholder="Enter day here" value="<?= $this->e($time['day']) ?>" />

                    <?php if (isset($errors['day'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['day']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="start">Start</label>
                    <input type="text" name="start" class="form-control<?= isset($errors['start']) ? ' is-invalid' : '' ?>" maxlen="255" id="start" placeholder="Enter start" value="<?= $this->e($time['start']) ?>" />

                    <?php if (isset($errors['start'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['start']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>
                
                <div class="form-group">
                    <label for="end">End</label>
                    <input type="text" name="end" class="form-control<?= isset($errors['end']) ? ' is-invalid' : '' ?>" maxlen="255" id="end" placeholder="Enter end" value="<?= $this->e($time['end']) ?>" />

                    <?php if (isset($errors['end'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['end']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Update day-time</button>
            </form>

        </div>
    </div>
</div>
<?php $this->stop() ?>