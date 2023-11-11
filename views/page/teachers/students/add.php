<?php $this->layout("page/teachers/default", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce"><?= $this->e($course->name) ?></h2>

        <div class="row">
            <div class="col-12">

                <!-- Table Starts Here -->
                <table id="student" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Actions</th>
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
                                    <?= $this->e($student->phone) ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <form class="form-inline ml-1" action="/teacher/manage/add" method="POST">

                                            <input type="hidden" name="courseId" value="<?= $this->e($course->id) ?>">
                                            <input type="hidden" name="studentId" value="<?= $this->e($student->id) ?>">
                                            
                                            <button type="submit" class="btn btn-xs btn-success" name="delete-student">
                                                <i class="fa-solid fa-plus"></i> Add student
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