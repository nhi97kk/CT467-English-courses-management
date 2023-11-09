<?php $this->layout("layouts/default", ["title" => APPNAME]) ?>

<?php $this->start("page") ?>
<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Rooms</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="animate__animated animate__fadeInLeft">Add your room here.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <form action="/dashboard/room" method="POST" class="col-md-6 offset-md-3">

                <!-- num -->
                <div class="form-group">
                    <label for="num">Number</label>
                    <input type="text" name="num" class="form-control<?= isset($errors['num']) ? ' is-invalid' : '' ?>" maxlen="255" id="num" placeholder="Enter number" value="<?= isset($old['num']) ? $this->e($old['num']) : '' ?>" />

                    <?php if (isset($errors['num'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['num']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>

                <!-- Phone -->
                <div class="form-group">
                    <label for="notes">Notes</label>
                    <input type="notes" name="notes" class="form-control<?= isset($errors['notes']) ? ' is-invalid' : '' ?>" maxlen="255" id="notes" placeholder="Enter notes" value="<?= isset($old['notes']) ? $this->e($old['notes']) : '' ?>" />

                    <?php if (isset($errors['notes'])) : ?>
                        <span class="invalid-feedback">
                            <strong><?= $this->e($errors['notes']) ?></strong>
                        </span>
                    <?php endif ?>
                </div>


                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Add room</button>
            </form>

        </div>
    </div>
</div>
<?php $this->stop() ?>