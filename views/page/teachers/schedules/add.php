<?php $this->layout("page/teachers/default", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce">Chose Course</h2>

        <div class="row">
            <div class="col-12">

                <!-- Table Starts Here -->
                <table id="course" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Course Name</th>
                            <th scope="col">Day Start</th>
                            <th scope="col">Day End</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td>
                                    <?= $this->e($course->name) ?>
                                </td>
                                <td>
                                <?= $this->e($course->start) ?>
                                </td>
                                <td>
                                <?= $this->e($course->end) ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <form class="form-inline ml-1" action="<?= '/teacher/schedule/set'?>" method="POST">

                                            <input type="hidden" name="courseId" value="<?= $this->e($course->id) ?>">
                                            <input type="hidden" name="scheduleId" value="<?= $this->e($scheduleId) ?>">

                                            <button type="submit" class="btn btn-xs btn-success" name="">
                                                <i class="fa-solid fa-plus"></i> Set for this course
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