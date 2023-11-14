<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Schedules</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="animate__animated animate__fadeInLeft">View your all Schedules here.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <!-- FLASH MESSAGES -->

            <a href="/dashboard/schedule/create" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i> New Schedule</a>

            <!-- Table Starts Here -->
            <table id="schedule" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Teacher</th>
                        <th scope="col">Room</th>
                        <th scope="col">Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schedules as $schedule): ?>
                        <tr>
                            <td>
                                <?php $teacher = \App\Models\Teacher::where('id', $schedule->teacher_id)->first(); ?>
                                <?= $teacher->name ?>
                            </td>
                            <td>
                                <?php $room = \App\Models\room::where('id', $schedule->room_id)->first(); ?>
                                    <?= $room->num ?>
                            </td>
                            <td>
                                <?php $time = \App\Models\time::where('id', $schedule->time_id)->first(); ?>
                                    <?= $time->name ?>
                            </td>

                            <td class="d-flex justify-content-center">
                                <a href="<?= '/dashboard/schedule/edit/' . $this->e($schedule->id) ?>"
                                    class="btn btn-xs btn-warning">
                                    <i alt="Edit" class="fa fa-pencil"></i> Edit</a>
                                <form class="form-inline ml-1"
                                    action="<?= '/dashboard/schedule/delete/' . $this->e($schedule->id) ?>" method="POST">
                                    <button type="submit" class="btn btn-xs btn-danger" name="delete-schedule">
                                        <i alt="Delete" class="fa fa-trash"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- Table Ends Here -->
        </div>
    </div>
</div>

<?php $this->stop() ?>