<?php $this->layout("layouts/defaultAdmin", ["title" => 'MyE']) ?>

<?php $this->start("pagee") ?>

    <div class="container">
        <section class="section mt-3">
            <div class="container-fluid">
                <div class="row">
                    <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a style="height: 10rem;" class="rounded align-items-center justify-content-around text-decoration-none text-white text-center d-flex bg-primary" href="/dashboard/student">

                           <div class="d-flex flex-column justify-content-center align-items-center" >
                                <span style="font-size: 3rem;" class="animate__animated animate__wobble">
                                    <?php echo $studentsCount ?>
                                </span>
                                <span style="font-size: 2.5rem;" class="name">Students</span>
                           </div>
                            <span style="font-size: 5rem;" class=""><i class="fa fa-users"></i></span>
                        </a>
                    </div>

                    <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a style="height: 10rem;" class="rounded align-items-center justify-content-around text-decoration-none text-white text-center d-flex bg-danger" href="/dashboard/course">
                            <div class="d-flex flex-column justify-content-center align-items-center" >
                                <span style="font-size: 3rem;" class="animate__animated animate__wobble">
                                <?php echo $teachersCount-1 ?>
                                </span>
                                <span style="font-size: 2.5rem;" class="name">Teachers</span>
                           </div>
                            <span style="font-size: 5rem;" class=""><i class="fa fa-ticket"></i></span>
                        </a>
                    </div>

                    <div class=" col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a style="height: 10rem;" class="rounded align-items-center justify-content-around text-decoration-none text-white text-center d-flex bg-warning" href="/dashboard/teacher">
                            <div class="d-flex flex-column justify-content-center align-items-center" >
                                <span style="font-size: 3rem;" class="animate__animated animate__wobble">
                                <?php echo $coursesCount ?>
                                </span>
                                <span style="font-size: 2.5rem;" class="name">Courses</span>
                           </div>
                            <span style="font-size: 5rem;" class=""><i class="fa fa-bank"></i></span>
                        </a>
                    </div>


                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </div>


<?php $this->stop() ?>