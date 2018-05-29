<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 23 Mar 2018
 * Time: 18:41
 */

require 'functions.php';
check_user();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Terminat e Krijun Sod</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .navbar-inverse .navbar-nav>li>a {
            color: #ffffff;
        }
        .navbar-inverse .navbar-nav>li>a:focus, .navbar-inverse .navbar-nav>li>a:hover {
            color: #fff;
            border: 14%;
            /* border-radius: 20%; */
            background-color: #68113a;
            border-color: black;
            /* background-color: transparent; */
        }
        .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 1px solid black;
        }
    </style>
</head>
<body>
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
                <li><a href="index.php">Shto Termin</a></li>
                <li><a href="data.php">Terminat Sot</a></li>
                <li><a href="calendari.php">Kalendari</a></li>
                <li><a href="blacklist.php">Lista e Zez</a></li>
                <li><a href="createdtoday.php">Te krijun sot</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="" style="height: 50px;"><a href="#" style="height: 50px;"><?php
                        // session_start();
                        ?>

                        <?php if(isset($_SESSION['username'])): ?>
                            <p><span class="glyphicon glyphicon-user"></span> <link href="index.php"><?php echo $_SESSION['username']; ?></link>
                            </p>
                        <?php endif; ?></a></li>
                <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>LogOut</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container text-center">
    <div class="col-md-3">
        <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Kerko Specifik Oren.." title="Type in a name">
    </div>
    <div style="clear:both"></div>
    <br />
    <div id="order_table">
        <div class="table-responsive">
            <table class="table table-bordered" style="border: #0f0f0f;text-align: center;">
                <tr>
                    <th width="2%">ID</th>
                    <th width="20%">Emri dhe Mbiemri</th>
                    <th width="15%">Lloji</th>
                    <th width="10%">Data</th>
                    <th width="5%" id="mi">Ora</th>
                    <th  width="10%"">Numri</th>
                    <th width="5%">Kapari</th>
                    <th width="5%">Data e Krijimit</th>
                    <th width="7%">Krijuar Nga</th>
                </tr>

            </table>
        </div>
    </div>
</div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#mm tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    $(document).ready(function () {
        $.ajax({
            url: 'createdtodayajax.php',
            success: function(data)
            {
                $('#order_table').html(data);
                //$(".table").DataTable();
            }
        });

    });
</script>





