<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
    <!-- SECTION HEADING -->
    <h2 class="text-center animate__animated animate__bounce">Students</h2>
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <p class="animate__animated animate__fadeInLeft">View your all students here.</p>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <!-- FLASH MESSAGES -->

            <a href="/dashboard/student/create" class="btn btn-primary mb-3">
                <i class="fa fa-plus"></i> New Student</a>

            <!-- Table Starts Here -->
            <table id="course" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Teacher</th>
                        <th scope="col">Course</th>
                        <th scope="col">Room</th>
                        <th scope="col">Day</th>
                        <th scope="col">Start</th>
                        <th scope="col">End</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $result): ?>
                        <tr>
                            <td>
                                <?php $course = \App\Models\Course::where("id", $result->course_id)->first();
                                $teacher = \App\Models\Teacher::where("id", $course->teacher_id)->first();
                                ?>
                                <?= $this->e($teacher->name) ?>
                            </td>
                            <td>
                                <?php $course = \App\Models\Course::where("id", $result->course_id)->first(); ?>
                                <?= $this->e($course->name) ?>
                            </td>
                            <td>
                                <?php $course = \App\Models\Course::where("id", $result->course_id)->first();
                                $teacher = \App\Models\Teacher::where("id", $course->teacher_id)->first();

                                $schedule = \App\Models\Schedule::where("course_id", $course->id)->where("teacher_id", $teacher->id)->first();
                                if (isset($schedule)) {
                                    $room = \App\Models\Room::where("id", $schedule->room_id)->first();
                                } else {
                                    $room = null;
                                }
                                ?>
                                <?= isset($room->num) ? $this->e($room->num) : '' ?>
                            </td>
                            <td>
                            <?php $course = \App\Models\Course::where("id", $result->course_id)->first();
                                $teacher = \App\Models\Teacher::where("id", $course->teacher_id)->first();

                                $schedule = \App\Models\Schedule::where("course_id", $course->id)->where("teacher_id", $teacher->id)->first();
                                if (isset($schedule)) {
                                    $time = \App\Models\time::where("id", $schedule->time_id)->first();
                                } else {
                                    $time = null;
                                }
                                ?>
                                <?= isset($time->day) ? $this->e($time->day) : '' ?>
                            </td>
                            <td>
                            <?php $course = \App\Models\Course::where("id", $result->course_id)->first();
                                $teacher = \App\Models\Teacher::where("id", $course->teacher_id)->first();

                                $schedule = \App\Models\Schedule::where("course_id", $course->id)->where("teacher_id", $teacher->id)->first();
                                if (isset($schedule)) {
                                    $time = \App\Models\time::where("id", $schedule->time_id)->first();
                                } else {
                                    $time = null;
                                }
                                ?>
                                <?= isset($time->start) ? $this->e($time->start) : '' ?>
                            </td>
                            <td>
                            <?php $course = \App\Models\Course::where("id", $result->course_id)->first();
                                $teacher = \App\Models\Teacher::where("id", $course->teacher_id)->first();

                                $schedule = \App\Models\Schedule::where("course_id", $course->id)->where("teacher_id", $teacher->id)->first();
                                if (isset($schedule)) {
                                    $time = \App\Models\time::where("id", $schedule->time_id)->first();
                                } else {
                                    $time = null;
                                }
                                ?>
                                <?= isset($time->end) ? $this->e($time->end) : '' ?>
                            </td>

                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <!-- Table Ends Here -->
        </div>
    </div>
</div>
<div id="delete-confirm" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">Do you want to delete this course?</div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-danger" id="delete">Delete</button>
                <button type="button" data-dismiss="modal" class="btn btn-default">Cancel</button>
            </div>
        </div>
    </div>
</div>
<?php $this->stop() ?>