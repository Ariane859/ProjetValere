<?php 
    session_start();
    require("connexion.php");
    $message="";
    $id=$_GET['id'];
    $sqlDetails = 'SELECT distinct* FROM compteclient WHERE idPersonne=:idPersonne';
    if($stmt = $pdo->prepare($sqlDetails)){
        $stmt->bindParam(":idPersonne", $param_id);
        $param_id = $id;
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
        }
    }
            
    // if (isset($_POST['submit']) && isset($_POST['nomClient']) && isset($_POST['prenomClient']) && isset($_POST['pays']) && isset($_POST['ville']) &&
    // isset($_POST['email']) && isset($_POST['telPrincipal']) && isset($_POST['telFixe']) && isset($_POST['sexe']) && isset($_POST['metier'])) 
    // {
    //     $nom=trim($_POST['nomClient']);
    //     $prenom=trim($_POST['prenomClient']);
    //     $pays=trim($_POST['pays']);
    //     $ville=trim($_POST['ville']);
    //     $email=trim($_POST['email']);
    //     $telPrincipal=trim($_POST['telPrincipal']);
    //     $telFixe=trim($_POST['telFixe']);
    //     $sexe=trim($_POST['sexe']);
    //     $metier=trim($_POST['metier']);
    //     $observation=trim($_POST['observation']);
    //     $createur=$_SESSION['username'];
    //     $date=date('Y-m-d H:i:s');
    
    //     $sqlInsertClient="INSERT INTO compteclient (nomPersonne,prenomPersonne,email,numeroFixe,telephone,sexe,metier,paysDeResidence,ville,typeClient,estActif,dateCreation,dateModification,observation,supprimer,createur)
    //     VALUES(:nomPersonne,:prenomPersonne,:email,:numeroFixe,:telephone,:sexe,:metier,:paysDeResidence,:ville,:typeClient,:estActif,:dateCreation,:dateModification,:observation,:supprimer,:createur)";
    //     $statement=$pdo->prepare($sqlInsertClient);
        
    //     $result=$statement->execute(array(
    //         ":nomPersonne"=>$nom,
    //         ":prenomPersonne"=>$prenom,
    //         ":email"=>$email,
    //         ":numeroFixe"=>$telFixe,
    //         ":telephone"=>$telPrincipal,
    //         ":sexe"=>$sexe,
    //         ":metier"=>$metier,
    //         ":paysDeResidence"=>$pays,
    //         ":ville"=>$ville,
    //         ":typeClient"=>'',
    //         ":estActif"=>1,
    //         ":dateCreation"=>$date,
    //         ":dateModification"=>$date,
    //         ":observation"=>$observation,
    //         ":supprimer"=>0,
    //         "createur"=>$createur
    //     ));
    //     if ($result) 
    //     {
    //         $message='<div class="alert alert-success alert-dismissible fade show" role="alert">
    //         <strong>Enregistrement effectué avec succès</strong>
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>';
    //     }
    //     else 
    //     {
    //         $message='<div class="alert alert-danger alert-dismissible fade show" role="alert">
    //         <strong>Une erreur s\'est produite.Veuillez réessayer !!!</strong>
    //         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //           <span aria-hidden="true">&times;</span>
    //         </button>
    //       </div>';
    //     }
    // }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AFG - Clients</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/addclient.css">
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center" href="dashboard.php">
                    <!-- <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div> -->
                    <div class="sidebar-brand-text mx-2" style="font-size:1.25em;"><span style="font-size:1.5em;">A</span>FRIC'ACTION</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Components</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Components:</h6>
                        <a class="collapse-item" href="buttons.html">Buttons</a>
                        <a class="collapse-item" href="cards.html">Cards</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Utilities</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="utilities-color.html">Colors</a>
                        <a class="collapse-item" href="utilities-border.html">Borders</a>
                        <a class="collapse-item" href="utilities-animation.html">Animations</a>
                        <a class="collapse-item" href="utilities-other.html">Other</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item active">
                <a class="nav-link" href="client.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Clients</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline small" style="color:black;"><?php echo $_SESSION['username'] ?></span>
                                    <!-- text-gray-600  -->
                                    <img class="img-profile rounded-circle"
                                        src="img/undraw_profile.svg">
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                    aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="Monprofil.php">
                                        <i class="fas fa-user fa-sm fa-fw mr-2"></i>
                                        Profile
                                    </a>
                                    <!-- <a class="dropdown-item" href="#">
                                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Settings
                                    </a> -->
                                    <!-- <a class="dropdown-item" href="#">
                                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Activity Log
                                    </a> -->
                                    <div class="dropdown-divider"></div>
                                    <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Se déconnecter
                                    </a> -->
                                    <a class="dropdown-item" href="logout.php">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2"></i>
                                        Se déconnecter
                                    </a>
                                </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                        <!-- <div class="card shadow mb-4">
                            <div class="card-header">
                                <h1 class="h3 mb-2 text-gray-800">Liste Clients</h1>
                            <div>
                        </div> -->
                        <div class="row">
                            <div class="col-md-12">
                                <nav aria-label="breadcrumb" style="height:60px;">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="client.php">Clients</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Détails</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        
                    <div class="row" style="height:30px;">
                        <!-- <div class="col-md-2">
                            <h2 class="pull-left" style="font-weight:bold;">Nouveau Client</h2>
                        </div> -->
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <a href="client.php" class="btn btn-primary pull-right"><i class="fa fa-alt"></i>Liste Clients</a>
                        </div>
                    </div>
                    <!-- <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>-->
                    <div class="form-group">
                            <?php echo $message; ?>    
                    </div>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Details Client</h6>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nomClient">Nom&nbsp;<span style="color:red">*</span></label>
                                            <input type="text" value="<?php echo $row['nomPersonne'] ?>" class="form-control" name="nomClient" id="nomClient" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="prenomClient">Prénom&nbsp;<span style="color:red">*</span></label>
                                            <input type="text" value="<?php echo $row['prenomPersonne'] ?>" class="form-control" name="prenomClient" id="prenomClient" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pays">Pays De Résidence&nbsp;<span style="color:red">*</span></label>
                                            <input type="pays" value="<?php echo $row['paysDeResidence'] ?>" class="form-control" name="pays" id="pays" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ville">Ville&nbsp;<span style="color:red">*</span></label>
                                            <input type="text" value="<?php echo $row['ville'] ?>" class="form-control" name="ville" id="ville" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" value="<?php echo $row['email'] ?>" class="form-control" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telPrincipal">Tel Principal&nbsp;<span style="color:red">*</span></label>
                                            <input type="text" value="<?php echo $row['telephone'] ?>" class="form-control" name="telPrincipal" id="telPrincipal" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="telFixe">Tel Fixe</label>
                                            <input type="text" value="<?php echo $row['numeroFixe'] ?>" class="form-control" name="telFixe" id="telFixe">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="sexe">Sexe&nbsp;<span style="color:red">*</span></label>
                                            <select name="sexe" id="sexe" class="form-control">
                                                <option value="M">Masculin</option>
                                                <option value="F">Féminin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="metier">Métier&nbsp;<span style="color:red">*</span></label>
                                            <select name="metier" class="form-control" name="metier" id="metier" placeholder="Cliquez ici">
                                                <option value="Etudiant">Etudiant(e)</option>
                                                <option value="Commercant">Commercant(e)</option>
                                                <option value="Artisant">Artisant</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="observation">Observation</label>
                                            <textarea name="observation" id="observation" cols="3" rows="2" class="form-control"><?php echo $row['observation'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-info" id="ModifierClient">Modifier</button>
                                    <!-- <input type="submit" name="submit" id="submit" class="form-submit btn btn-primary" value="Enregistrer"/> -->
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/file.js"></script>
</body>

</html>