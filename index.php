<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RED || Admin Panel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <!-- Google fonts - Popppins for copy-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,800">
    <!-- orion icons-->
    <link rel="stylesheet" href="css/orionicons.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png?3">
    <!-- Tweaks for older IEs-->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

        <script src="https://www.gstatic.com/firebasejs/4.9.0/firebase.js"></script>
       
        
        <script type="text/javascript">
         
      </script>
    </head>
    
<!-- <body onload="displayStat()"> -->
<body onload="displayStat()">
    <?php
    if (isset($_COOKIE['name'])) {
        if(!empty($_SESSION['name'])){
            ?>
            <script type="text/JavaScript">
            </script>
            <?php
        }
    }
    else {
        header("Location:login.php");
        exit();
    }
    
    ?>
    <!-- navbar-->
    <header class="header">
        <nav class="navbar navbar-expand-lg px-4 py-2 bg-white shadow">
            <a href="#" class="sidebar-toggler text-gray-500 mr-4 mr-lg-5 lead">
                <i class="fas fa-align-left"></i>
            </a>
            <a href="index.php" class="navbar-brand font-weight-bold text-uppercase text-base">
              R.E.D Dashboard
            </a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
                
                <li class="nav-item dropdown ml-auto">
                    <a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="img/siren.png" alt="Jason Doe" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
                    <div aria-labelledby="userInfo" class="dropdown-menu"><a href="#" class="dropdown-item"><strong class="d-block text-uppercase headings-font-family"><?php echo $_COOKIE['name'];?></strong><small>RED admin</small></a>
                        <div class="dropdown-divider"></div><a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
    </header>
    <div class="d-flex align-items-stretch">
        <div id="sidebar" class="sidebar py-3">
            <div class="text-gray-400 text-uppercase px-3 px-lg-4 py-4 font-weight-bold small headings-font-family">MAIN</div>
            <ul class="sidebar-menu list-unstyled">
                <li class="sidebar-list-item"><a href="index.php" class="sidebar-link text-muted active"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
                
                </li>
                <li class="sidebar-list-item"><a href="emergencies.php" class="sidebar-link text-muted"><i class="o-medical-chart-1 mr-3 text-gray"></i><span>Emergencies</span></a></li>
                
                </li>
                <li class="sidebar-list-item"><a href="contacts.php" class="sidebar-link text-muted"><i class="o-user-1 mr-3 text-gray"></i><span>Contacts</span></a></li>
                
                </li>
                <li class="sidebar-list-item"><a href="logout.php" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Log Out</span></a></li>
            </ul>

        </div>
        <div class="page-holder w-100 d-flex flex-wrap">
            <div class="container-fluid px-xl-5">
                <section class="py-5">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 mb-4 mb-xl-0">
                            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <div class="dot mr-4 bg-red"></div>
                                    <div class="text">
                                        <a style="text-decoration:none" href="emergencies.php"><h2 class="mb-0"><span id="emer">-</span></h6><span class="text-gray">Emergencies Today</span></a>
                                    </div>
                                </div>
                                <div class="icon text-white bg-red"><i class="fas fa-error"></i></div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 mb-4 mb-xl-0">
                            <div class="bg-white shadow roundy p-4 h-100 d-flex align-items-center justify-content-between">
                                <div class="flex-grow-1 d-flex align-items-center">
                                    <div class="dot mr-3 bg-green"></div>
                                    <div class="text">
                                        <h2 class="mb-0"><span id="users">-</span></h6><span class="text-gray">Total Users</span>
                                    </div>
                                </div>
                                <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
                            </div>
                        </div>
                    </div>
                </section>
                <section>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class="h6 text-uppercase mb-0">Locations</h2>
                                </div>
                                <div class="card-body col-lg-12">
                                    <div id="mapholder"  class="col-lg-12">
                                    <div style="background:url('img/staticmap.png') no-repeat;display:flex;flex-direction:column;width:100%;height:600px;align-content:center"/>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
               
            </div>
            <footer class="footer bg-white shadow align-self-end py-3 px-xl-5 w-100">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-left text-primary">
                            
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script>
    
    </script>
    <!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="/__/firebase/6.0.2/firebase-app.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#reserved-urls -->

<!-- Initialize Firebase -->
<script src="/__/firebase/init.js"></script>
<script src="js/fetch.js"></script>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js">
    </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js">
    </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@2/src/js.cookie.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
</body>

</html>