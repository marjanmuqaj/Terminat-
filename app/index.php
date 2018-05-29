<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 23 Mar 2018
 * Time: 18:43
 */
require 'functions.php';
require 'ajax.php';
check_user();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shto Termin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .table-bordered > thead > tr > th, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > tbody > tr > td, .table-bordered > tfoot > tr > td {
            border: 1px solid #000;
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
                <li><a href="data.php">Terminat Sod</a></li>
                <li><a href="calendari.php">Calendari</a></li>
                <li><a href="blacklist.php">Lista e Zez</a></li>
                <li><a href="createdtoday.php">Tkrijun sod</a></li>
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

<div class="container-fluid text-center">
    <ul class="pager">
        <input style="float: center " type="button" class="btn btn-success" id="addNew" value="Shto Termin">
    </ul>

    <div id="tableManager" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">+Termini</h2>
                </div>

                    <div class="modal-body">
                        <div id="editContent">
                            <input type="text" class="form-control" placeholder="Emri i Plote..." id="countryName"><br>
                            <input type="text" name="Numri" class="form-control" id="numri" placeholder="Numri i Telefonit"><br>
                            <input type="date"  name="data" class="form-control" id="data" placeholder="data"><br>

                                    <!--  Regullo daten me kan responzive ne telefon-->


                            <input type="time" name="ora"  class="form-control" id="ora" placeholder="Ora"><br>
                            <input type="Number" name="kapari" class="form-control" id="kapari" placeholder="kapari"><br>

                            <label class="checkbox-inline" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Grim">Grim</label>
                            <label class="checkbox-inline" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Frizur">Frizur</label>
                            <label class="checkbox-inline" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Fenerim">Fenerim</label>

                            <!--<textarea class="form-control" id="shortDesc" placeholder="Short Country Description"></textarea><br>-->

                            <input type="hidden" id="editRowID" value="0">

                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="button" class="btn btn-danger" data-dismiss="modal" value="Anulo" id="closeBtn">
                        <input type="button" id="manageBtn" onclick="manageData('addNew')" value="Ruaj" class="btn btn-success">
                    </div>
                </div>
            </div>
        </div>

    <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <br><br>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" width="100%" style="background-color: white;">
                        <thead>
                        <tr style="background-color:#167f92; color: white">
                            <td>ID</td>
                            <td>Emri</td>
                            <td>Ora</td>
                            <td>Data</td>
                            <td>Kategoria</td>
                            <td>Numri i Tel</td>
                            <td>Kapari</td>
                            <td>Edit/Black/Delete</td>
                        </tr>
                        </thead>
                        <tbody >

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<footer class="container-fluid text-center" style="background: -webkit-linear-gradient(left, #000000, #8f1750, #000000);">
    <p>Footer Text</p>
    <div id="iko">
        <p>The serial number is: </p>
    </div>
</footer>
</div>



</body>
<script type="text/javascript">
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
            $("#manageBtn").attr('value', 'Ruaj').attr('onclick', "manageData('addNew')").fadeIn();
        });
        getExistingData(0, 50);
    });

    //$(document).ready(function(){
      //  var date_input=$('input[name="data"]'); //our date input has the name "date"
        //var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        //var options={
          //  format: 'dd-mm-yyyy',
            //container: container,
            //todayHighlight: true,
            //autoclose: true,
        //};
        //date_input.datepicker(options);
    //})

    function addMinutes(time/*"hh:mm"*/, minsToAdd/*"N"*/)
    {
        function z(n)
        {
            return (n<10? '0':'') + n;
        }
        var bits = time.split(':');
        var mins = bits[0]*60 + (+bits[1]) + (+minsToAdd);
        return z(mins%(24*60)/60 | 0) + ':' + z(mins%60);
    }

    function deleteRow(rowID) {
        if (confirm('A jeni i Sigurt??')) {
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'deleteRow',
                    rowID: rowID
                }, success: function (response) {
                    $("#terminat_"+rowID).parent().remove();
                    alert(response);
                }
            });
        }
    }
    function blackList(rowID) {
        var x=prompt("Sheno Passwordin");
        if (x=="janijani") {
            var arsyea=prompt("Sheno Arsyen Se Pse Po e Dergon ne Listtzez?");
            $.ajax({
                url: 'ajax.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    arsyea:arsyea,
                    key: 'blacklist',
                    rowID: rowID
                }, success: function (response) {
                    $("#terminat_"+rowID).parent().remove();
                    alert(response);
                }
            });
        }
        else if(x!="janijani") {

            alert("Passwordi gabim");
        }
    }

    function viewORedit(rowID, type) {
        $.ajax({
            url: 'ajax.php',
            method: 'POST',
            dataType: 'json',
            data: {
                key: 'getRowData',
                rowID: rowID
            }, success: function (response) {
                if (type == "view") {
                    $("#showContent").fadeIn();
                    $("#editContent").fadeOut();
                    $("#countryName").val(response.fullname);
                    $("#numri").val(response.numri);
                    $("#data").val(response.data);
                    $("#ora").val(response.ora);
                    $("#kapari").val(response.kapari);
                    $("#kategoria").val(response.borgji);
                    $("#manageBtn").fadeOut();
                    $("#closeBtn").fadeIn();
                } else {
                    $("#editContent").fadeIn();
                    $("#editRowID").val(rowID);
                    //$(".modal-title").html(response.fullname);
                    $("#showContent").fadeOut();
                    $("#countryName").val(response.fullname);
                    $("#numri").val(response.numri);
                    $("#data").val(response.data);

                    $("#ora").val(response.ora);
                    $("#kapari").val(response.kapari);
                    $("#kategoria").val(response.borgji);
                    // $("#borgji").val(response.borgji);

                    $("#closeBtn").fadeIn();
                    $("#manageBtn").attr('value', 'Ruaj Ndryshimin').attr('onclick', "manageData('updateRow')");
                }

                $(".modal-title").html("Termini");
                $("#tableManager").modal('show');
            }
        });

    }

    function getExistingData(start, limit) {
        $.ajax({
            url: 'ajax.php',
            method: 'POST',
            dataType: 'text',
            data: {
                key: 'getExistingData',
                start: start,
                limit: limit
            }, success: function (response) {
                if (response != "reachedMax") {
                    $('tbody').append(response);
                    start += limit;
                    getExistingData(start, limit);
                } else
                    $(".table").DataTable();
            }
        });
    }
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
       // var username='helllo';

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
</html>