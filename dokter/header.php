<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Puskesmas | <?php echo $_SESSION['sebagai'] ?> </title>


    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="../dist/css/bootstrap.min.css" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../dist/css/style4.css">

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css">

    <!-- Font Awesome JS -->
    <script src="../dist/js/solid.js" crossorigin="anonymous"></script>
    <script src="../dist/js/fontawesome.js" crossorigin="anonymous"></script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="../dist/js/jquery.min.js" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="../dist/js/popper.min.js" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="../dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3> Puskesmas Halong </h3>
                <strong>dist</strong>
            </div>

            <ul class="list-unstyled components">
                <li>
                    </a>
                    <a href="menu.php?halaman=info">
                        <i class="fas fa-briefcase"></i>
                        Rekam Medis
                    </a>
                </li>
            </ul>

        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span> Menu </span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../keluar.php"> Keluar </a>
                            </li>
                        </ul>
                        </ul>
                    </div>

                </div>
            </nav>