<?php
$connect = mysqli_connect("localhost", "root", "root", "app");
//filter.php
    if (isset($_POST["from_date"])) {
        $ngaData =$connect->real_escape_string($_POST['from_date']);
        //$derData = $_POST['to_date'];
        $output = '';
        $query = "  
           SELECT id, fullname, numri,data,ora,kapari,borgji,users_of_created FROM terminat WHERE data='$ngaData'";
       // $query = " SELECT * FROM terminat WHERE data BETWEEN '" . $_POST["from_date"] . "' AND '" . $_POST["to_date"] . "'";
        $result = mysqli_query($connect, $query);
        $output .= '  
        <div class="table-responsive">
        <div class="col-md-2" style="margin-bottom: 1%;">
                <input type="text" id="myInput" onkeyup="myFunction()" class="form-control" placeholder="Kerko Specifik Oren.." title="Type in a name">
            </div>
          <table class="table table-bordered" style="border: 1.5px solid #000; text-align: center;">  
           <h4 align="right">Terminat me daten (' . $ngaData . ')</h4>
                <thead style="background-color:#1acaff";>
                <tr>  
                     <th width="5%">ID</th>  
                     <th width="20%">Emri dhe Mbiemri</th>  
                     <th width="10%">Ora</th>  
                     <th width="15%">Data</th>  
                     <th width="15%">Rregullimi</th>  
                     <th  width="12%">Numri</th>
                     <th width="12%">Kapari</th> 
                     <th width="10%">Krijuar Nga</th>    
                </tr>
                </thead>
      ';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $output .= '  
                <tbody id="mm">
                     <tr>  
                          <td>' . $row["id"] . '</td>
                          <td>' . $row["fullname"] . '</td>  
                          <td id="mi">' . $row["ora"] . '</td>  
                          <td>' . $row["data"] . '</td>  
                          <td>' . $row["borgji"] . '</td>  
                          <td>' . $row["numri"] . '</td>  
                          <td>' . $row["kapari"] . '€</td>
                          <td>' . $row["users_of_created"] . '</td>
                     </tr>  
            </tbody>
                ';
            }
        } else {
            $output .= '  
                <tr>  
                     <td colspan="8" align="center">Nuk u gjend asnje Termin me kete date</td>  
                </tr>  
           ';
        }

        $output .= '</table></div>';
        echo $output;
    }

?>