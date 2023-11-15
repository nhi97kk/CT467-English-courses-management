<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

    <div class="container">
        <!-- SECTION HEADING -->
        <h2 class="text-center animate__animated animate__bounce">Courses</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3 text-center">
                <p class="animate__animated animate__fadeInLeft">View your all courses here.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">

                <!-- FLASH MESSAGES -->

                <!-- <a href="/dashboard/course/create" class="btn btn-primary mb-3">
                    <i class="fa fa-plus"></i> New Contact</a> -->

                <!-- Table Starts Here -->
                <table id="course" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Start</th>
                            <th scope="col">End</th>
                            <th scope="col">Teacher</th>
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
                                <td>
                                    <?php $teacher = \App\Models\Teacher::where('id',$course->teacher_id)->first() ?>
                                    <?= $teacher->name ?>
                                </td>
                                <td class="d-flex justify-content-center">
                                    
                                    <form class="form-inline ml-1" action="<?= '/dashboard/course/delete/' . $this->e($course->id) ?>"
                                        method="POST">
                                        <button type="submit" class="btn btn-xs btn-danger" name="delete-course">
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


<!-- <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
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
</script> -->
