<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Schedule</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="animate__animated animate__fadeInLeft">Add your schedule here.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <form action="/dashboard/schedule" method="POST" class="col-md-6 offset-md-3">
                <div class="form-group">
                    <label for="teacher_id">Teacher</label>
                    <select name="teacher_id" id="teacher_id"
                        class="form-control<?= isset($errors['teacher']) ? ' is-invalid' : '' ?>">
                        <option value="">Select teacher</option>
                        <?php $teachers = \App\Models\Teacher::where('role', 0)->get();?>
                        <?php foreach ($teachers as $teacher): ?>
                            <option value="<?= $teacher->id ?>" >
                                <?= $teacher->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['teacher'])): ?>
                        <span class="invalid-feedback">
                            <strong>
                            <?= $this->e($errors['teacher']) ?>
                            
                            </strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="room_id">room</label>
                    <select name="room_id" id="room_id"
                        class="form-control<?= isset($errors['room']) ? ' is-invalid' : '' ?>">
                        <option value="">Select room</option>
                        <?php $rooms = \App\Models\Room::all();?>
                        <?php foreach ($rooms as $room): ?>
                            <option value="<?= $room->id ?>" >
                                <?= $room->num ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['room'])): ?>
                        <span class="invalid-feedback">
                            <strong>
                            <?= $this->e($errors['room']) ?>
                            
                            </strong>
                        </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label for="time_id">time</label>
                    <select name="time_id" id="time_id"
                        class="form-control<?= isset($errors['time']) ? ' is-invalid' : '' ?>">
                        <option value="">Select time</option>
                        <?php $times = \App\Models\Time::all();?>
                        <?php foreach ($times as $time): ?>
                            <option value="<?= $time->id ?>" >
                                <?= $time->name ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (isset($errors['time'])): ?>
                        <span class="invalid-feedback">
                            <strong>
                            <?= $this->e($errors['time']) ?>
                            
                            </strong>
                        </span>
                    <?php endif; ?>
                    
                </div>
                <!-- Submit -->
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Add schedule</button>
            </form>

        </div>
    </div>
</div>
<?php $this->stop() ?>