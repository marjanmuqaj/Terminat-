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
<html>
<head>
    <title>Terminet Sod</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link type="text/javascript" src="css/font-awesome.css">
    <link type="text/javascript" src="fonts/">
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
        @media screen and (max-width: 767px){
            .btn-success {
                margin-left: 105%;
                margin-top: 0%
            }
            .col-md-3
            {
                margin-bottom: 1%;
            }
            .modal-dialog {
                position: relative;
                width: auto;
                margin: 25px;
            }
        }
        .col-md-6 {
            float: left;
            height: 30px;
            margin-bottom: -2%
        }
        .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
            border: 2px solid black;
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
    <div class="col-md-6">
        <input style="float: center " type="button" class="btn btn-success" id="addNew" value="Shto Termin" ><br><br><br>
    </div>



    <div style="clear:both"></div>
    <br />
    <div id="order_table">
        <div class="table-responsive">
        <table class="table table-bordered" style="margin-top: -5%; border: #0f0f0f;">
            <tr>
                <th width="2%">ID</th>
                <th width="20%">Emri dhe Mbiemri</th>
                <th width="15%">Lloji</th>
                <th width="10%">Data</th>
                <th width="5%" id="mi">Ora</th>
                <th  width="10%"">Numri</th>
                <th width="5%">Kapari</th>
            </tr>

        </table>
        </div>
    </div>

</div>
</div>
<div id="tableManager" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">+Termini</h2>
            </div>

            <div class="modal-body">
                <div id="editContent">
                    <input type="text" class="form-control" placeholder="Sheno Emrin dhe Mbiemrin" id="countryName"><br>
                    <input type="text" name="Numri" class="form-control" id="numri" placeholder="Numri i Telefonit"><br>
                    <input type="date" name="data" class="form-control" id="data" placeholder="Sheno Daten"><br>
                    <input type="time" name="ora"  class="form-control" id="ora" placeholder="Ora"><br>
                    <input type="Number" name="kapari" class="form-control" id="kapari" placeholder="kapari"><br>

                    <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Grim">Grim&nbsp&nbsp</label>
                    <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Frizur">Frizur&nbsp&nbsp</label>
                    <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Fenerim">Fenerim&nbsp&nbsp</label>
                    <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Premje">Premje&nbsp&nbsp</label>
                    <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Shatir">Shatir&nbsp&nbsp</label>
                    <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Ngjyrosje">Ngjyrosje&nbsp&nbsp</label>
                    <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Ombre">Ombre&nbsp&nbsp</label>
                    <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Thoj">Thoj&nbsp&nbsp</label>

                    <!--<textarea class="form-control" id="shortDesc" placeholder="Short Country Description"></textarea><br>-->

                    <input type="hidden" id="editRowID" value="0">

                </div>
            </div>

            <div class="modal-footer">
                <input type="button" class="btn btn-danger" data-dismiss="modal" value="Anulo" id="closeBtn">
                <input type="button" id="manageBtn" onclick="manageData('addNew')" value="Ruaj Terminin" class="btn btn-success">
            </div>
        </div>
    </div>
</div>

<!--<footer class="container-fluid text-center" style="background: -webkit-linear-gradient(left, #000000, #8f1750, #000000);">
    <p style="color: white;">Salloni Marigona</p>
    <div id="iko">
        <p>Contact:</p>
    </div>
</footer>-->
<script>
    //Ketu eshte nje funksion i cili realizohet permes buttonav per te shtu termin close plotesu e etj
    $(document).ready(function() {
        $("#addNew").on('click', function () {
            $("#tableManager").modal('show');
        });
        $("#closeBtn").on('click', function () {
            $("#tableManager").modal('hide');
        });

        $("#tableManager").on('hidden.bs.modal', function () {
            $("#showContent").fadeOut();
            $("#editContent").fadeIn();
            $("#editRowID").val(0);
            $("#numri").val("");
            $("#data").val("");
            $("#ora").val("");
            $("#kapari").val("");
            $("#kategoria").val("");
            $("#countryName").val("");
            $("#closeBtn").fadeIn();
            $("#manageBtn").attr('value', 'Ruaj Terminin').attr('onclick', "manageData('addNew')").fadeIn();
            $("#tableManager").modal('hide');
        });
    });
    //funksioni per filtirmin e te dhanav prej db
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
            url: 'terminatsodajax.php',
            success: function(data)
            {
                $('#order_table').html(data);
                //$(".table").DataTable();
            }
        });

    });
    //Ketu asht funksioni i cili i menagjon te dhanat dhe ban insertimin e te dhenav ne db
    function manageData(key) {
        var name = $("#countryName");
        var numri = $("#numri");
        var data = $("#data");
        var ora = $("#ora");
        var kapari =$("#kapari");
        var kategoria = new Array();
        $("input:checked").each(function()
        {
            kategoria.push($(this).val());
        });
        kategoria = kategoria.toString();
        var editRowID = $("#editRowID");
 //Funksioni per testtim i cili thirr metoden per validim
        if (isNotEmpty(name)  && isNotEmpty(numri) && isNotEmpty(data)&& isNotEmpty(ora)&& isNotEmpty(kapari))
        {
            //ajax forma per insertimin e te dhenav ne db
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: key,
                    name: name.val(),
                    numri: numri.val(),
                    data: data.val(),
                    ora: ora.val(),
                    kapari: kapari.val(),
                    kategoria:kategoria,
                    rowID: editRowID.val()
                    //borgji: borgji.val(),
                    //shortDesc: shortDesc.val(),
                    //longDesc: longDesc.val(),
                }, success: function (response) {
                    if (response != "success")
                    {
                        alert(response);
                        if(response =="Termini u Shtua me Sukses!")
                        {
                            $("#tableManager").modal('hide');
                        }
                    }
                    else
                    {
                        alert("Ndryshimi perfundoi me sukses");
                        $("#terminat_"+editRowID.val()).html(name.val());
                        name.val('');
                        numri.val('');
                        data.val('');
                        ora.val('');
                        kapari.val('');
                        kategoria.val(''),
                            $("#tableManager").modal('hide');
                        $("#manageBtn").attr('value', 'Add').attr('onclick', "manageData('addNew')",);

                    }
                }
            });
        }
    }
    //Ketu ashte ni funksion per validim te borderav
    function isNotEmpty(caller) {
        if (caller.val() == '') {
            caller.css('border', '2px solid red');
            return false;
        } else
            caller.css('border', '');

        return true;
    }
</script>
</body>
</html>
