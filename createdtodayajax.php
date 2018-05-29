<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 23 Mar 2018
 * Time: 18:43
 */

$connect = mysqli_connect("localhost", "root", "root", "app");
$output = '';
$query = "  
           SELECT * FROM terminat WHERE DATE(`created`) = CURDATE() ORDER BY created";
$result = mysqli_query($connect, $query);
$output .= '  
  <div class="table-responsive">
           <table class="table table-bordered" style="font-weight: bold;">  
           <h3 align="center"><b>Terminet e Krijuara Sot</b></h3>
                <thead style="background-color: #4cae4c; font-weight: bold; text-align: center;">
                <tr>  
                     <th width="2%">ID</th>
                     <th width="10%">Emri dhe Mbiemri</th>
                     <th width="5%">Ora</th>
                     <th width="10%">Data</th>
                     <th width="10%">Lloji</th>
                     <th width="10%"">Numri</th>
                     <th width="5%">Kapari</th>  
                     <th width="10%">Data e Krijimit</th>
                     <th width="7%">Krijuar Nga</th>    
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
                          <td>' . $row["created"] . '</td>
                          <td>' . $row["users_of_created"] . '</td>     
                     </tr>  
            </tbody>
                ';
    }
} else {
    $output .= '  
                <tr>  
                     <td colspan="9" align="center">Nuk u gjend asnje Termin me kete date</td>  
                </tr>  
           ';
}

$output .= '</table></div>';
echo $output;
?>