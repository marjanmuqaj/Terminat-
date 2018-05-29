<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 23 Mar 2018
 * Time: 18:43
 */
require 'functions.php';
check_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript">
    </script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<bodyn>
    <nav class="navbar navbar-inverse" style="background: -webkit-linear-gradient(left, #000000, #8f1750, #000000);">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="home.php"><img src="fonts/logo.png" style="margin-top: -7.2%;height: 51px;margin-left: -7%;width: 77%;"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">

                <ul class="nav navbar-nav">

                    <li class="active"><a href="home.php">Menu</a></li>

                    <li class="" style="height: 50px;"><a href="#" style="height: 50px;"><?php
                            // session_start();
                            ?>

                            <?php if(isset($_SESSION['username'])): ?>
                                <p><span class="glyphicon glyphicon-user"></span> <link href="index.php"><?php echo $_SESSION['username']; ?></link>
                                </p>
                            <?php endif; ?></a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="home.php">Menu</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="index.php">Shto Termin</a></li>
                            <li><a href="data.php">Terminat Sod</a></li>
                            <li><a href="Calendari">Calendari</a></li>
                            <li><a id="verifikim" href="blacklist.php">Lista e Zez</a></li>
                            <li><a href="createdtoday.php">Tkrujm sod</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="logout.php">Dil</a></li>
                        </ul>
                    </li>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>LogOut</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="jumbotron" style="background-color: white;">

        <div class="container center">

            <div class="button">
                <input type="button" class="btn-block" class="deko" id="login-button" value="Shto Termin" onclick="window.location='index.php';"  />
                <input type="button" class="btn-block" class="deko" id="login-button" value="Terminat Sod" onclick="window.location='data.php';"/>
                <input type="button" class="btn-block" class="deko" id="login-button" value="Calendari" onclick="window.location='calendari.php';"/>
                <input type="button" class="btn-block" class="black" id="loginn-buttonn" value="Lista e Zez" onclick="window.location='blacklist.php';"/>
                <input type="button" class="btn-block" class="deko" id="login-button" value="Terminat e Krijun Sod" onclick="window.location='createdtoday.php';"/>
            </div>
        </div>

    </div>


</bodyn>
</html>

