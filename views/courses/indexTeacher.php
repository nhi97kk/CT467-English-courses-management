<?php $this->layout("layouts/default", ["title" => 'MyE']) ?>

<?php $this->start("page_specific_css") ?>
<style>
    .side-nav>li {
        padding: 0.5rem;
        border-bottom: 1px solid #c1a67b;
    }
</style>
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">
<?php $this->stop() ?>

<?php $this->start("page") ?>

<div class="d-flex">
    <div class="sidebar-nav">
        <ul class="side-nav color-gray" style="list-style-type: none;
    font-size: 1.1rem;
    background-color: #ccc;
    padding: 0;">
            <li class="nav-header" style="font-size: 1.5rem;
    background-color: black;
    color: white;">
                <span class="">Main Category</span>
            </li>

            <li class="has-children">
                <a href="/teacher/course"><i class="fa fa-file-text"></i> <span>Course</span>
            </li>
            <li class="has-children">
                <a href="/teacher/info"><i class="fa-solid fa-chalkboard-user"></i> <span>Teacher</span>
            </li>
            <li class="has-children">
                <a href="/teacher/student"><i class="fa fa-users"></i> <span>Student</span>
            </li>
            <li class="has-children">
                <a href="/teacher/schedule"><i class="fa-solid fa-calendar-days"></i> Schedule<span></span>
            </li>
            <li class="has-children">
                <a href="/teacher/result"><i class="fa-solid fa-marker"></i> <span>Result</span>
            <li><a href="/teacher/change-password"><i class="fa fa fa-server"></i> <span> Teacher Change Password</span></a>
            </li>

            </li>
    </div>

    <div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce">Courses</h2>

        <div class="row">
            <div class="col-12">

                <!-- FLASH MESSAGES -->

                <a href="/teacher/course/create" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New Course</a>

                <!-- Table Starts Here -->
                <table id="course" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
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
                                    <?= $this->e($course->desc) ?>
                                </td>
                                <td>
                                    <?= $this->e($course->start) ?>
                                </td>
                                <td>
                                    <?= $this->e($course->end) ?>
                                </td>
                                
                                <td class="d-flex justify-content-center">
                                    <a href="<?= '/teacher/course/edit/' . $this->e($course->id) ?>" class="btn btn-xs btn-warning">
                                        <i alt="Edit" class="fa fa-pencil"></i> Edit</a>
                                    <form class="form-inline ml-1" action="<?= '/teacher/course/delete/' . $this->e($course->id) ?>"
                                        method="POST">
                                        <!-- <button type="submit" class="btn btn-xs btn-danger" name="delete-course">
                                            <i alt="Delete" class="fa fa-trash"></i> Delete
                                        </button> -->
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
</div>

<!-- <div id="delete-confirm" class="modal fade" tabindex="-1">
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
</div> -->
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        new DataTable('#course');
        $('button[name="delete-course"]').on('click', function (e) {
            e.preventDefault();
            const form = $(this).closest('form');
            const nameTd = $(this).closest('tr').find('td:first');
            if (nameTd.length > 0) {
                $('.modal-body').html(
                    `Do you want to delete "${nameTd.text()}"?`
                );
            }
            $('#delete-confirm')
                .modal({
                    backdrop: 'static',
                    keyboard: false
                })
                .one('click', '#delete', function () {
                    form.trigger('submit');
                });

        });
    });
</script>
<?php $this->stop() ?>