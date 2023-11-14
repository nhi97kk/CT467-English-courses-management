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
            <li>
                <a href="/dashboard"><i class="fa fa-dashboard"></i> <span>Dashboard</span> </a>

            </li>

            <li class="nav-header" style="font-size: 1.5rem;
    background-color: black;
    color: white;">
                <span class="">Appearance</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/course"><i class="fa fa-file-text"></i> <span>Course</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/teacher"><i class="fa-solid fa-chalkboard-user"></i> <span>Teacher</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/student"><i class="fa fa-users"></i> <span>Student</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/room"><i class="fa-solid fa-door-open"></i><span>Room</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/time"><i class="fa-solid fa-clock"></i><span>Day-Time</span>
            </li>
            <li class="has-children">
                <a href="/dashboard/schedule"><i class="fa-solid fa-calendar-days"></i> Schedule<span></span>
            </li>
            <li class="has-children">
                <a href="/dashboard/result"><i class="fa-solid fa-marker"></i> <span>Result</span>
            <li><a href="/dashboard/change-password"><i class="fa fa fa-server"></i> <span> Admin Change Password</span></a>
            </li>

            </li>
    </div>

    
        <!-- SECTION HEADING -->
        <?= $this->section("pagee") ?>
    
</div>
<?php $this->stop() ?>

<?php $this->start("page_specific_js") ?>
<script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
    
<?php $this->stop() ?>