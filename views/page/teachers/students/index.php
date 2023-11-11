
<?php $this->layout("page/teachers/default", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

<div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce">Manage Courses</h2>

        <div class="row">
            <div class="col-12">

                <!-- FLASH MESSAGES -->
                <!-- Table Starts Here -->
                <table id="course" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Student count</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $course): ?>
                            <tr>
                                <td>
                                    <?= $this->e($course->name) ?>
                                </td>
                                <td>
                                <?php 
                                 $studentCount = \App\Models\Result::where('course_id', $course->id)->count(); ?>
                                <?= $studentCount ?>
                                </td>
                                <td class="d-flex justify-content-center ">
                                    <a href="<?= '/teacher/view/' . $this->e($course->id) ?>" class="btn btn-xs btn-success">
                                    <i class="fa-solid fa-users-viewfinder"></i> View</a>
                                    <div style="width: 2rem;">

                                    </div>
                                    <a href="<?= '/teacher/manage/' . $this->e($course->id) ?>" class="btn btn-xs btn-warning">
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