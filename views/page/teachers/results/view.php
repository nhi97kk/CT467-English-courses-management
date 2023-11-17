<?php $this->layout("page/teachers/default", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce"><?= $this->e($course->name) ?></h2>

        <div class="row">
            <div class="col-12">

                <!-- Table Starts Here -->
                <table id="course" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($students as $student): ?>
                            <tr>
                                <td>
                                    <?= $this->e($student->name) ?>
                                </td>
                                <td>
                                    <?= $this->e($student->email) ?>
                                </td>
                                <td>
                                <?php
                                    $result = \App\Models\Result::where('course_id', $course->id)
                                        ->where('student_id', $student->id)
                                        ->first();

                                    $resultValue = $result ? $result->result : '';
                                    ?>
                                    <?= $this->e($resultValue) ?>
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