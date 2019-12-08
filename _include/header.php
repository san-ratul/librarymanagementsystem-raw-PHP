<?php  
    $filepath = realpath(dirname(__FILE__));
    include_once $filepath."/db/Session.php";
    include_once $filepath."/db/User.php";
    Session::init();
    $user = new User();
    $user->setDue();
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Elibrary</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
        <script src="js/vendor/jquery-3.1.1.min.js"></script>
    </head>
        <?php 
            if (isset($_GET["action"]) && $_GET["action"] == "logout") {
                Session::destroy();
            }
        ?>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-custom">

            <div class="container">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand el-brand">
                    <a href="index.php">ELibrary</a>
                </div>
                <div class="pull-right collapse navbar-collapse navbar-container" id="navbar-collapse">
                    <ul class="nav navbar-nav nav-custom">
                        <?php
                            $id = Session::get("id");
                            $login = Session::get("login");
                            $type = Session::get("type");
                            if($login == true && $type == "admin"){
                        ?>
                                <li><a class="nav-active" href="index.php">Home</a></li>
                                <li><a href="#">Edit Book List</a></li>
                                <li><a class="reserve-book" href="#">Reserve Book</a></li>
                                <li><a href="profile?id=<?php echo $id ?>">Profile</a></li>   
                                <li><a href="?action=logout">Logout</a></li>   
                        <?php } else if($login == true && $type == "student"){ ?>
                                <li><a class="nav-active" href="index.php">Home</a></li>
                                <li><a class="s-book-list" href="#">Book List</a></li>
                                <li><a class="s-profile" href="profile?id=<?php echo $id ?>">Profile</a></li> 
                                <li><a href="?action=logout">Logout</a></li>
                        <?php } else{ ?>
                                <li><a href="login.php">Login</a></li>
                        <?php     
                            } 
                        ?>
                    </ul>
                </div>
            </div>
        </nav>