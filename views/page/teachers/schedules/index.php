<?php $this->layout("page/teachers/default", ["title" => 'MyE']) ?>

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

            <table id="schedule" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Day</th>
                        <th scope="col">Room</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                        <th scope="col">Course</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($schedules as $schedule): ?>
                        <tr>
                            <td>
                                <?php $time = \App\Models\Time::where('id', $schedule->time_id)->first(); ?>
                                <?= $time->day ?>
                            </td>
                            <td>
                                <?php $room = \App\Models\room::where('id', $schedule->room_id)->first(); ?>
                                <?= $room->num ?>
                            </td>
                            <td>
                                <?php $time = \App\Models\time::where('id', $schedule->time_id)->first(); ?>
                                <?= $time->start ?>
                            </td>
                            <td>
                                <?php $time = \App\Models\time::where('id', $schedule->time_id)->first(); ?>
                                <?= $time->end ?>
                            </td>
                            <td>
                                <?php $course = \App\Models\Course::where('id', $schedule->course_id)->first(); ?>
                                <?= isset($course) ? $course->name : '' ?>
                            </td>

                            <td class="d-flex justify-content-center">
                                <a href="<?= '/teacher/schedule/set/' . $this->e($schedule->id) ?>"
                                    class="btn btn-xs btn-warning">
                                    <i class="fa-solid fa-plus"></i> Add</a>
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