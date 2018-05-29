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
    <meta charset="UTF-8">
    <title>Lista e Zez</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-3.3.1.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script src="js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .table-hover > tbody > tr:hover {
            background-color: #f9f9f9;
            color: black;
            font-weight: bold;
            border: 1px solid;
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

    <div class="container-fluid text-center">
        <ul class="pager">
            <h1><b>Lista e Zez</b></h1>
        </ul>

        <div id="tableManager" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h2 class="modal-title">Termini Black</h2>
                    </div>

                    <div class="modal-body">
                        <div id="editContent">
                            <input type="text" class="form-control" placeholder="Emri i Plote..." id="countryName"><br>
                            <input type="text" name="Numri" class="form-control" id="numri" placeholder="Numri i Telefonit"><br>
                            <input type="text" name="data" class="form-control" id="data" placeholder="data"><br>
                            <input type="time" name="ora"  class="form-control" id="ora" placeholder="Ora"><br>
                            <input type="Number" name="kapari" class="form-control" id="kapari" placeholder="kapari"><br>

                            <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Grim">Grim&nbsp&nbsp</label>
                            <label class="checkbox-grup" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Frizur">Frizur&nbsp&nbsp</label>
                            <label class="checkbox-inline" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Fenerim">Fenerim&nbsp&nbsp</label>
                            <label class="checkbox-inline" style="font-weight: bold;"><input type="checkbox" name="kategoria[]" class="kategoria" value="Premje">Premje</label><br><br>
                            <textarea class="form-control" id="arsyea" name="arsyea" placeholder="Arsyea"></textarea>



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
                    <table id="a" class="table table-hover table-bordered iko" width="100%" style="background-color: white;">
                        <thead>
                        <tr style="background-color:black; color: white">
                            <td>ID</td>
                            <td>Emri</td>
                            <td>Numri i Tel</td>
                            <td>Data</td>
                            <td>Arsyea</td>
                            <td>Options</td>
                        </tr>
                        </thead>
                        <tbody style="background-color: black;color: white;">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center" style="background: -webkit-linear-gradient(left, #000000, #8f1750, #000000);">
        <p>Stafi</p>
        <div id="iko">
            <p>Sallon Bukurie Marigona</p>
        </div>
    </footer>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#addNew").on('click', function () {
                $("#tableManager").modal('show');
            });
            $("#closeBtn").on('click', function () {
                $("#tableManager").modal('hide');
            });
            getExistingDataOfBlackList(0, 50);
        });

        function deleteRowOfBlackList(rowID) {
            var x=prompt("Sheno Passwordin");
            if (x=="janijani") {
                $.ajax({
                    url: 'ajaxblacklist.php',
                    method: 'POST',
                    dataType: 'text',
                    data: {
                        key: 'deleteblacklist',
                        rowID: rowID
                    }, success: function (response) {
                        $("#blacklisttable_"+rowID).parent().remove();
                        alert(response);
                    }
                });
            }
            else
            {
                alert("Passwordi gabim");
            }
        }
        $(document).ready(function() {
            $.datepicker.setDefaults({
                dateFormat: 'dd-mm-yy'
            });
            $(document).ready(function() {
                $("#data").datepicker();
            });
        });

        function viewORedit(rowID, type) {
            $.ajax({
                url: 'ajaxblacklist.php',
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
                        $("#arsyea").val(response.arsyea);
                        // $("#borgji").val(response.borgji);

                        $("#closeBtn").fadeIn();
                        $("#manageBtn").attr('value', 'Ruaj Ndryshimin').attr('onclick', "manageData('updateRowIdOfBlackList')");
                    }
                    var x=prompt("Sheno Passwordin");
                    if(x=="janijani") {
                        $(".modal-title").html("Termini Black");
                        $("#tableManager").modal('show');
                    }else
                    {
                        alert("Passwordi gabim");
                    }
                }
            });

        }

        function getExistingDataOfBlackList(start, limit) {
            $.ajax({
                url: 'ajaxblacklist.php',
                method: 'POST',
                dataType: 'text',
                data: {
                    key: 'getExistingDataOfBlackList',
                    start: start,
                    limit: limit
                }, success: function (response) {
                    if (response != "reachedMax") {
                        $('tbody').append(response);
                        start += limit;
                        getExistingDataOfBlackList(start, limit);
                    } else
                        $(".table").DataTable();
                    //$('#order_table').html();
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
            var arsyea=$("#arsyea");
            $("input:checked").each(function()
            {
                kategoria.push($(this).val());
            });
            kategoria = kategoria.toString();

            var editRowID = $("#editRowID");

            if (isNotEmpty(name)  && isNotEmpty(numri) && isNotEmpty(data)&& isNotEmpty(ora)&& isNotEmpty(kapari) &&isNotEmpty(arsyea) &&isNotEmpty(arsyea))
            {
                $.ajax({
                    url: 'ajaxblacklist.php',
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
                        arsyea:arsyea.val(),
                        rowID: editRowID.val()
                    }, success: function (response) {
                        if (response != "success")
                        {
                            alert(response);
                        }
                        else
                        {
                            alert("Ndryshimi i Terminit ne Listen e Zez perfundoi me sukses");
                            $("#terminat_"+editRowID.val()).html(name.val());
                            name.val('');
                            numri.val('');
                            data.val('');
                            ora.val('');
                            kapari.val('');
                            kategoria.val('');
                            arsyea.val('');
                            // $("#tableManager").modal('hide');
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

</body>
</html>
