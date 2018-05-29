<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 23 Mar 2018
 * Time: 17:50
 *
 */
$connect = mysqli_connect("localhost", "root", "root", "app");
$output = '';
$today = date('d/m/Y');
$query = "  
           SELECT * FROM terminat WHERE(data)='$today' ORDER BY ora";
$result = mysqli_query($connect, $query);
$output .= '  
  <div class="table-responsive">
           <table class="table table-bordered" style="font-weight: bold;">  
           <h3 align="center"><b>Terminet Sod</h3>
                <thead style="background-color: #4cae4c; font-weight: bold;">
                <tr>  
                     <th width="2%">ID</th>
                     <th width="20%">Emri dhe Mbiemri</th>
                     <th width="5%">Ora</th>
                     <th width="10%">Data</th>
                     <th width="15%">Lloji</th>
                     <th width="10%"">Numri</th>
                     <th width="5%">Kapari</th>    
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
                     </tr>  
            </tbody>
                ';
    }
} else {
    $output .= '  
                <tr>  
                     <td colspan="7" align="center">Nuk u gjend asnje Termin me kete date</td>  
                </tr>  
           ';
}

$output .= '</table></div>';
echo $output;
?>