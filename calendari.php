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
    <title>Calendari</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
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
        @media (max-width: 767px) {

            .col-md-1
            {
                margin-bottom: 4%;
            }
            .col-md-3 {
                margin-bottom: 2%;
            }

            .btn {
                display: inline-block;
                padding: 6px 12px;
                margin-bottom: 0;
                /* margin-top: -1%; */
                margin-bottom: 0%;
            }
        }
        @media screen and (max-width: 767px){
            .table-responsive {
                width: 100%;
                margin-top: -11%;
                margin-bottom: 77px;
                overflow-y: hidden;
                -ms-overflow-style: -ms-autohiding-scrollbar;
                border: 1px solid #000;
            }
            .modal-dialog {
                position: relative;
                width: auto;
                margin: 25px;
            }
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
    <div class="col-md-3">
        <input type="text" name="from_date" id="from_date" class="form-control" placeholder="Nga Data?"/>
    </div>
    <div class="col-md-1">
        <input type="button" name="filter" id="filter"    value="Buttoni i Filtrimit" class="btn btn-info" />
        <!-- <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" />-->
    </div>
    <div class="col-md-3">
        <input style="float: center " type="button" class="btn btn-success" id="addNew" value="Shto Termin" ><br><br><br><br>
    </div>
    <div style="clear:both"></div>
    <br />
    <div id="order_table">

        <div class="table-responsive">
            <div class="col-md-2" style="margin-bottom: 1%;">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Kerko Specifik Oren.." title="Type in a name">
            </div>
            <table class="table table-bordered" style="border: #0f0f0f;border: 1.5px solid #000; text-align: center;">
                <thead style="border: #0f0f0f;background-color: #1acaff;">
                <tr>
                    <th width="5%">ID</th>
                    <th width="20%">Emri dhe Mbiemri</th>
                    <th width="10%">Ora</th>
                    <th width="15%">Data</th>
                    <th width="15%">Rregullimi</th>
                    <th  width="12%">Numri</th>
                    <th width="12%">Kapari</th>
                    <th width="12%">Krijuar Nga</th>
                </tr>
                </thead>
                <tr>
                    <td colspan="8" align="left" style="color: red;">............Per te Shfaqur te Dhena Filtro se Pari...........</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<!--<footer class="container-fluid text-center" style="background: -webkit-linear-gradient(left, #000000, #8f1750, #000000);">
    <p style="color: white;">Salloni Marigona</p>
    <div id="iko">
        <p>Contact:</p>
    </div>
</footer>-->

</body>
</html>
<script>
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
        });
    });
    $(document).ready(function(){
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#mm tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
    $(document).ready(function(){
        $.datepicker.setDefaults({
            dateFormat: 'dd/mm/yy'
        });
        $(function(){
            $("#from_date").datepicker();
            //$("#to_date").datepicker();
        });
        $('#filter').click(function (){
            var from_date = $('#from_date').val();
            //var to_date = $('#to_date').val();
            if(from_date != '')
            {

                    $.ajax({
                        url: "filter.php",
                        method: "POST",
                        data: {from_date: from_date},
                        success: function (data) {
                            $('#order_table').html(data);
                        }
                    });

            }
            else
            {
                alert("Ju lutem shenoni Daten");
            }
        });
    });
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

        if (isNotEmpty(name)  && isNotEmpty(numri) && isNotEmpty(data)&& isNotEmpty(ora)&& isNotEmpty(kapari))
        {
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

    function isNotEmpty(caller) {
        if (caller.val() == '') {
            caller.css('border', '2px solid red');
            return false;
        } else
            caller.css('border', '');

        return true;
    }


</script>