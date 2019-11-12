<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RED || Emergencies</title>
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
       
    </head>

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
              Emergencies
            </a>
            <ul class="ml-auto d-flex align-items-center list-unstyled mb-0">
                
                <li class="nav-item dropdown ml-auto">
                    <a id="userInfo" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle"><img src="img/siren.png" alt="user" style="max-width: 2.5rem;" class="img-fluid rounded-circle shadow"></a>
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
                <li class="sidebar-list-item"><a href="index.php" class="sidebar-link text-muted"><i class="o-home-1 mr-3 text-gray"></i><span>Home</span></a></li>
                
                </li>
                <li class="sidebar-list-item"><a href="emergencies.php" class="sidebar-link text-muted active"><i class="o-medical-chart-1 mr-3 text-gray"></i><span>Emergencies</span></a></li>
                
                </li>
                <li class="sidebar-list-item"><a href="contacts.php" class="sidebar-link text-muted"><i class="o-user-1 mr-3 text-gray"></i><span>Contacts</span></a></li>
                
                </li>
                <li class="sidebar-list-item"><a href="logout.php" class="sidebar-link text-muted"><i class="o-exit-1 mr-3 text-gray"></i><span>Log Out</span></a></li>
            </ul>

        </div>
        <div class="page-holder w-100 d-flex flex-wrap">
            <div class="container-fluid px-xl-5" id="table_area">
            <table class="table table-striped table-hover" id="table_body">
                                            <thead>
                                                <tr style="background:rgba(0,0,30,0.4);color:#fff;">
                                                    <td colspan="6"><b>Emergencies : </b></td>
                                                </tr>
                                                <tr>
                                                    <th class="bb-2">Date</th>
                                                    <th class="bb-2">Description</th>
                                                    <th class="bb-2">Title</th>
                                                    <th class="bb-2">Location</th>
                                                    <th class="bb-2">Time</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                          
                                              </tbody>
                                    </table>
               
            </div>
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