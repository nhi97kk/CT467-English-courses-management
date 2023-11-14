<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>


    <div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce">Teachers</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <p class="animate__animated animate__fadeInLeft">View your all teachers here.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <!-- FLASH MESSAGES -->

                <a href="/dashboard/teacher/create" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New Teacher</a>

                <!-- Table Starts Here -->
                <table id="teacher" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teachers as $teacher): ?>
                            <tr>
                                <td>
                                    <?= $this->e($teacher->name) ?>
                                </td>
                                <td>
                                    <?= $this->e($teacher->email) ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= '/dashboard/teacher/edit/' . $this->e($teacher->id) ?>" class="btn btn-xs btn-warning">
                                        <i alt="Edit" class="fa fa-pencil"></i> Edit</a>
                                    <form class="form-inline ml-1" action="<?= '/dashboard/teacher/delete/' . $this->e($teacher->id) ?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-teacher">
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