<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>MyE</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="/css/style.css" rel="stylesheet">
    <style>
    .side-nav>li {
        padding: 0.5rem;
        border-bottom: 1px solid #c1a67b;
    }
</style>
<link href="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.css" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-md sticky-top navbar-light bg-light">
        <!-- Branding Image -->
        <a class="navbar-brand" href="/student">
            <i class="fa-solid fa-graduation-cap"></i>
            <b>MyE</b>
        </a>

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <div class="navbar-nav">
                &nbsp;
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <?php if (!\App\SessionGuard::isUserLoggedInStu()) : ?>
                    <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
                <?php else : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                        <?= $this->e(\App\SessionGuard::student()->name) ?>
                             <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/logoutStudent" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" class="d-none" action="/logoutStudent" method="POST">
                            </form>
                        </div>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </nav>

    
    

    <div class="container">
        <!-- SECTION HEADING -->
        <?= $this->section("pagee") ?>
    </div>    


    <footer class="footer">
        <div class="container text-center">
            <p class="text-muted">Copyright &copy; 2023 Web Development Course</p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/v/bs4/dt-1.13.6/datatables.min.js"></script>
 
</body>

</html>