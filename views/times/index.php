<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

    <div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce">Times</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <p class="animate__animated animate__fadeInLeft">View your all Times here.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <!-- FLASH MESSAGES -->

                <a href="/dashboard/time/create" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New Day-Time</a>

                <!-- Table Starts Here -->
                <table id="time" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Day</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($times as $time): ?>
                            <tr>
                                <td>
                                    <?= $this->e($time->name) ?>
                                </td>
                                <td>
                                    <?= $this->e($time->day) ?>
                                </td>
                                <td>
                                    <?= $this->e($time->start) ?>
                                </td>
                                <td>
                                    <?= $this->e($time->end) ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    <a href="<?= '/dashboard/time/edit/' . $this->e($time->id) ?>"
                                        class="btn btn-xs btn-warning">
                                        <i alt="Edit" class="fa fa-pencil"></i> Edit</a>
                                    <form class="form-inline ml-1"
                                        action="<?= '/dashboard/time/delete/' . $this->e($time->id) ?>" method="POST">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-time">
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