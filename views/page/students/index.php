<?php $this->layout("page/students/default", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<h2 class="text-center animate__animated animate__bounce">Courses</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <p class="animate__animated animate__fadeInLeft"></p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <!-- Table Starts Here -->
                <table id="course" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Teacher</th>
                            <th scope="col">Your result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td>
                                    <?= $this->e($course->name) ?>
                                </td>
                                <td>
                                    <?= $this->e($course->desc) ?>
                                </td>
                                <td>
                                    <?= $this->e($course->start) ?>
                                </td>
                                <td>
                                    <?= $this->e($course->end) ?>
                                </td>
                                <td>
                                    <?php $teacher = \App\Models\Teacher::where('id',$course->teacher_id)->first() ?>
                                    <?= $teacher->name ?>
                                </td>
                                <td>
                                    <?php $result = \App\Models\Result::where('student_id',$studentId)->where('course_id',$course->id)->first() ?>
                                    <?= $result->result ? $result->result : '' ?>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
                <!-- Table Ends Here -->
            </div>
        </div>
<?php $this->stop() ?>